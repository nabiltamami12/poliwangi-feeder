<?php

namespace App\Http\Controllers\API;

use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Kepegawaian\Kota;
use App\Models\Kepegawaian\Staff;
use App\Models\Kepegawaian\Jurusan;
use App\Models\Kepegawaian\Pangkat;
use App\Models\Kepegawaian\Pegawai;
use App\Http\Controllers\Controller;
use App\Models\Kepegawaian\Provinsi;
use Illuminate\Support\Facades\Hash;
use App\Models\Kepegawaian\Kecamatan;
use App\Models\Kepegawaian\Kelurahan;
use Yajra\DataTables\Facades\DataTables;

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
        $kota = Kota::all();
        $kecamatan = Kecamatan::all();
        $provinsi = Provinsi::all();
        $pangkat = Pangkat::all();
        $jurusan = Jurusan::all();
        $kelurahan = Kelurahan::all();
        // $jabatan = JabatanStruktural::all();
        $jabatan = Staff::all();
        return view('admin.masterKepegawaian.pegawai.create',[
                "id" => null,
                "title" => "kepegawaian",
                "jabatan" => $jabatan,
                "kota" => $kota,
                "kecamatan" => $kecamatan,
                "provinsi" => $provinsi,
                "pangkat" => $pangkat,
                "kelurahan" => $kelurahan,
                "jurusan" => $jurusan,

                
        ]);
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
            'id_jabatan' => 'nullable',
            'id_pangkat' => 'nullable',
            
        ]);

        $pegawai = Pegawai::create($request->all());

        //create user
        $user = User::create([
            'name' => Hash::make($request->get($request->nip)),
            'email' => $request->email,
            'password' => Hash::make($request->get('password'))
        ]);

        $pegawai->update([
            'id_user' => $user->id
        ]);
        // Pegawai::create([
        //     'id_user' => $user->id,
        //     'nip' =>$request->nip,
        //     'noid' =>$request->noid,
        //     'nama' =>$request->nama,
        //     'jurusan' =>$request->jurusan,
        //     'jenis_kelamin' =>$request->jenis_kelamin,
        //     'agama' =>$request->agama,
        //     'no_tlp' =>$request->no_tlp,
        //     'tmp_lahir' =>$request->tmp_lahir,
        //     'tgl_lahir' =>$request->tgl_lahir,
        //     'shift' =>$request->shift,
        //     'gol_darah' =>$request->gol_darah,
        //     'gelar_dpn' =>$request->gelar_dpn,
        //     'gelar_blk' =>$request->gelar_blk,
        //     'status_kawin' =>$request->status_kawin,
        //     'kelurahan' =>$request->kelurahan,
        //     'kecamatan' =>$request->kecamatan,
        //     'kabupaten' =>$request->kabupaten,
        //     'provinsi' =>$request->provinsi,
        //     'askes' =>$request->askes,
        //     'kode_dosen_sk034' =>$request->kode_dosen_sk034,
        //     'nip_lama' =>$request->nip_lama,
        //     'npwp' =>$request->npwp,
        //     'nidn' =>$request->nidn,
        //     'departemen' =>$request->departemen,
        //     'praktisi' =>$request->praktisi,
        //     'nama_instansi' =>$request->nama_instansi,
        //     'alamat_instansi' =>$request->alamat_instansi,
        //     'pendidikan_terakhir' =>$request->pendidikan_terakhir,
        //     'id_pangkat' =>$request->id_pangkat,
        // ]);

        return redirect()->route('list-pegawai')->with('status', 'Data Berhasil disimpan!');
    }

    public function edit($id)
    {
        $kota = Kota::all();
        $kecamatan = Kecamatan::all();
        $provinsi = Provinsi::all();
        $pangkat = Pangkat::all();
        $jabatan = Staff::all();
        $jurusan = Jurusan::all();
        $kelurahan = Kelurahan::all();
        // $jabatan = JabatanStruktural::all();

        $item = Pegawai::find($id);

        return view('admin.masterKepegawaian.pegawai.edit',[
                "id" => $id,
                "title" => "kepegawaian",
                "kota" => $kota,
                "kecamatan" => $kecamatan,
                "provinsi" => $provinsi,
                "pangkat" => $pangkat,
                "jabatan" => $jabatan,
                "item" => $item,
                "jurusan" => $jurusan,
                "kelurahan" => $kelurahan, 
        ]);
    }

    public function update(Request $request, $id)
    {
        $pgw = Pegawai::find($id);
        $pgw->update($request->all()); 


        return redirect()->route('data-pegawai');
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
