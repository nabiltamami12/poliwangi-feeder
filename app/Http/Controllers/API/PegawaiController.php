<?php

namespace App\Http\Controllers\API;

use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Kepegawaian\Kota;
use App\Models\Kepegawaian\Staff;
use App\Models\Kepegawaian\Jurusan;
use App\Models\Kepegawaian\Pangkat;
use App\Models\Kepegawaian\Pegawai;
use App\Models\Kepegawaian\PegawaiStatus;
use App\Http\Controllers\Controller;
use App\Models\Kepegawaian\Provinsi;
use Illuminate\Support\Facades\Hash;
use App\Models\Kepegawaian\Kecamatan;
use App\Models\Kepegawaian\Kelurahan;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Validator;


class PegawaiController extends Controller
{
    public function getData(Request $request)
    {
        $data = Pegawai::orderBy('id', 'desc')->get();
        return DataTables::of($data)
            ->addColumn('Aksi', function($data) {
                return '<a href="'.route('data-edit', $data->id).'" class="btn btn-success btn-sm" id="getEditData" data-id="'.$data->id.'">Edit</a>
                    <button type="button" data-id="'.$data->id.'" onclick="delete_btn()" class="btn btn-danger btn-sm" id="getDeleteId">Delete</button>';
            })
            ->rawColumns(['Aksi'])
            ->make(true);
    }

    public function getPegawai()
    {
        $kelurahan = Kelurahan::orderBy('nama', 'ASC')->get();
        $kecamatan = Kecamatan::orderBy('nama', 'ASC')->get();
        $kota = Kota::orderBy('nama', 'ASC')->get();
        // $provinsi = Provinsi::orderBy('nama', 'ASC')->get();
        return response()->json(['kelurahan'=>$kelurahan,'kecamatan'=>$kecamatan, 'kota'=>$kota]);
    }

    public function create()
    {
        
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required | max:25',
            'email' => 'email | required | unique:users',
            'password' => 'required | confirmed',
            'nip' => 'required',
            'noid' => 'nullable',
            'nama' => 'nullable',
            'jurusan' => 'nullable',
            'jenis_kelamin' => 'nullable',
            'agama' => 'nullable',
            'no_tlp' => 'nullable',
            'tmp_lahir' => 'nullable',
            'tgl_lahir' => 'nullable',
            'shift' => 'nullable',
            'gol_darah' => 'nullable',
            'gelar_dpn' => 'nullable',
            'gelar_blk' => 'nullable',
            'status_kawin' => 'nullable',
            'kelurahan' => 'nullable',
            'kecamatan' => 'nullable',
            'kabupaten' => 'nullable',
            'provinsi' => 'nullable',
            'askes' => 'nullable',
            'kode_dosen_sk034' => 'nullable',
            'nip_lama' => 'nullable',
            'npwp' => 'nullable',
            'nidn' => 'nullable',
            'departemen' => 'nullable',
            'praktisi' => 'nullable',
            'nama_instansi' => 'nullable',
            'alamat_instansi' => 'nullable',
            'pendidikan_terakhir' => 'nullable',
            'staff' => 'nullable',
            'id_pangkat' => 'nullable',
            'nik' => 'nullable',
            'pegawai_status' => 'nullable',
        ]);


        $pegawai = Pegawai::create($request->all());
        $provinsi = Provinsi::where('id_provinsi', $request->provinsi)->first();
        $kabupaten = Kota::where('id_kabupaten', $request->kabupaten)->first();
        $kecamatan = Kecamatan::where('id_kecamatan', $request->kecamatan)->first();
        $kelurahan = Kelurahan::where('id_kelurahan', $request->kelurahan)->first();

        //create user
        $user = User::create([
            'name' => Hash::make($request->get($request->nip)),
            'email' => $request->email,
            'password' => Hash::make($request->get('password'))
        ]);

        $pegawai->update([
            'id_user' => $user->id,
            'provinsi' => $provinsi->nama,
            'kota' => $kabupaten->nama,
            'kecamatan' => $kecamatan->nama,
            'kelurahan' => $kelurahan->nama,
        ]);


        // if($request->pegawai_status != "None") {
            PegawaiStatus::create([
                'id_pegawai' => $pegawai->id,
                'status' => 'active',
                'status_karyawan' => $request->pegawai_status,
            ]);
        // }
       

        return redirect()->route('list-pegawai')->with('status', 'Data Berhasil disimpan!');
    }

    public function edit($id)
    {
        
    }

    public function update(Request $request, $id)
    {

        $pgw = Pegawai::find($id);

        if($request->provinsi != null) {

            $validator = Validator::make($request->all(), [
                'kelurahan' => 'required',
                'kecamatan' => 'required',
                'kabupaten' => 'required',
                'provinsi' => 'required',
            ]);

            if ($validator->fails()) {
                return back()->withErrors(['msg', 'Lengkapi form input provinsi, kabupaten, kecamatan, dan kelurahan']);
            }

            $provinsi = Provinsi::where('id_provinsi', $request->provinsi)->first();
            $kabupaten = Kota::where('id_kabupaten', $request->kabupaten)->first();
            $kecamatan = Kecamatan::where('id_kecamatan', $request->kecamatan)->first();
            $kelurahan = Kelurahan::where('id_kelurahan', $request->kelurahan)->first();
            $pgw->update($request->all()); 
            $pgw->update([
                'provinsi' => $provinsi->nama,
                'kota' => $kabupaten->nama,
                'kecamatan' => $kecamatan->nama,
                'kelurahan' => $kelurahan->nama,
            ]); 

            $status = PegawaiStatus::where('id_pegawai', $id)->first();
            $status->update([
                'status_karyawan' => $request->pegawai_status,
            ]);
        }  else {
            $pgw->update($request->all()); 
            $status = PegawaiStatus::where('id_pegawai', $id)->first();
            $status->update([
                'status_karyawan' => $request->pegawai_status,
            ]);
        }

        return redirect()->route('list-pegawai')->with('status', 'Data Berhasil diperbarui!');
    }

    public function destroy($id)
    {
        Pegawai::destroy($id);
 
        return response()->json(['success'=>'Pegawai berhasil dihapus !!']);
    }

    public function getPangkat(Request $request){
        $pangkat = Pangkat::orderBy('nama_pangkat', 'ASC')->get();
        return response()->json($pangkat);
    }

    public function getJurusan(Request $request){
        $jurusan = Jurusan::orderBy('jurusan', 'ASC')->get();
        return response()->json($jurusan);
    }

    public function getStaff(Request $request){
        $staff = Staff::orderBy('staf', 'ASC')->get();
        return response()->json($staff);
    }

    public function getProvinsi(Request $request){
        $provinsi = Provinsi::orderBy('nama', 'ASC')->get();
        return response()->json($provinsi);
    }
    public function getKabupaten(Request $request){
        $kota = Kota::where("id_provinsi", $request->id_provinsi)->pluck('nama', 'id_kabupaten');
        // dd($kota);
        return response()->json($kota);
    }
    public function getKecamatan(Request $request){
        $kecamatan = Kecamatan::where("id_kabupaten",$request->id_kabupaten)->pluck('nama','id_kecamatan');
        // dd($kecamatan);
        return response()->json($kecamatan);
    }
    public function getKelurahan(Request $request){
        $kelurahan = Kelurahan::where("id_kecamatan",$request->id_kecamatan)->pluck('nama','id_kelurahan');
        // dd($kelurahan);
        return response()->json($kelurahan);
    }
}
