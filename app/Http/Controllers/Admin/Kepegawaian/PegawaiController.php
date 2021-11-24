<?php

namespace App\Http\Controllers\Admin\Kepegawaian;

use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Kepegawaian\Kota;
use App\Models\Kepegawaian\Staff;
use App\Models\Kepegawaian\Pangkat;
use App\Models\Kepegawaian\Pegawai;
use App\Http\Controllers\Controller;
use App\Models\Kepegawaian\Provinsi;
use Illuminate\Support\Facades\Hash;
use App\Models\Kepegawaian\Kecamatan;
use Yajra\DataTables\Facades\DataTables;
use App\Models\Kepegawaian\DataStruktural;

class PegawaiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $pegawai = Pegawai::all();
        return view('admin.masterKepegawaian.pegawai.index',
        [
            "title" => "kepegawaian"
        ]
        );
    }
    public function getPegawai(Request $request)
    {
        $data = Pegawai::orderBy('id', 'desc')->get();
        return DataTables::of($data)
            ->addColumn('Aksi', function($data) {
                return '<a href="'.route('dataPegawai.edit', $data->id).'" type="button" class="btn btn-success btn-sm">Edit</a>
                    <button type="button" data-id="'.$data->id.'" onclick="delete_btn()" class="btn btn-danger btn-sm" id="getDeleteId">Delete</button>';
            })
            ->rawColumns(['Aksi'])
            ->make(true);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $kota = Kota::all();
        $kecamatan = Kecamatan::paginate(5);
        $provinsi = Provinsi::all();
        $pangkat = Pangkat::all();
        $jabatan = Staff::all();
        return view('admin.masterKepegawaian.pegawai.create',[
                "id" => null,
                "title" => "kepegawaian",
                "kota" => $kota,
                "kecamatan" => $kecamatan,
                "provinsi" => $provinsi,
                "pangkat" => $pangkat,
                "jabatan" => $jabatan,
                
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required | max:25',
            'email' => 'email | required | unique:users',
            'password' => 'required | confirmed',
            'nip' => 'required',
            'noid' => 'required',
            'nama' => 'required',
            'jurusan' => 'required',
            'jenis_kelamin' => 'required',
            'agama' => 'required',
            'no_tlp' => 'required',
            'tmp_lahir' => 'required',
            'tgl_lahir' => 'required',
            'shift' => 'required',
            'gol_darah' => 'required',
            'gelar_dpn' => 'required',
            'gelar_blk' => 'required',
            'status_kawin' => 'required',
            'kelurahan' => 'required',
            'kecamatan' => 'required',
            'kabupaten' => 'required',
            'provinsi' => 'required',
            'askes' => 'required',
            'kode_dosen_sk034' => 'required',
            'nip_lama' => 'required',
            'npwp' => 'required',
            'nidn' => 'required',
            'departemen' => 'required',
            'praktisi' => 'required',
            'nama_instansi' => 'required',
            'alamat_instansi' => 'required',
            'pendidikan_terakhir' => 'required',
            'id_jabatan' => 'required',
            'id_pangkat' => 'required',
            
        ]);

        //create user
        $user = User::create([
            'name' => Hash::make($request->get($request->nip)),
            'email' => $request->email,
            'password' => Hash::make($request->get('password'))
        ]);

        Pegawai::create([
            'id_user' => $user->id,
            'nip' =>$request->nip,
            'noid' =>$request->noid,
            'nama' =>$request->nama,
            'jurusan' =>$request->jurusan,
            'jenis_kelamin' =>$request->jenis_kelamin,
            'agama' =>$request->agama,
            'no_tlp' =>$request->no_tlp,
            'tmp_lahir' =>$request->tmp_lahir,
            'tgl_lahir' =>$request->tgl_lahir,
            'shift' =>$request->shift,
            'gol_darah' =>$request->gol_darah,
            'gelar_dpn' =>$request->gelar_dpn,
            'gelar_blk' =>$request->gelar_blk,
            'status_kawin' =>$request->status_kawin,
            'kelurahan' =>$request->kelurahan,
            'kecamatan' =>$request->kecamatan,
            'kabupaten' =>$request->kabupaten,
            'provinsi' =>$request->provinsi,
            'askes' =>$request->askes,
            'kode_dosen_sk034' =>$request->kode_dosen_sk034,
            'nip_lama' =>$request->nip_lama,
            'npwp' =>$request->npwp,
            'nidn' =>$request->nidn,
            'departemen' =>$request->departemen,
            'praktisi' =>$request->praktisi,
            'nama_instansi' =>$request->nama_instansi,
            'alamat_instansi' =>$request->alamat_instansi,
            'pendidikan_terakhir' =>$request->pendidikan_terakhir,
            'id_jabatan' =>$request->id_jabatan,
            'id_pangkat' =>$request->id_pangkat,
        ]);
        // dd($user);
        $user->save();
        


        return redirect()->route('dataPegawai.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $kota = Kota::all();
        $kecamatan = Kecamatan::paginate(5);
        $provinsi = Provinsi::all();
        $pangkat = Pangkat::all();
        $jabatan = Staff::all();

        $item = Pegawai::find($id);

        return view('admin.masterKepegawaian.pegawai.edit',[
                "id" => $id,
                "title" => "kepegawaian",
                "kota" => $kota,
                "kecamatan" => $kecamatan,
                "provinsi" => $provinsi,
                "pangkat" => $pangkat,
                "jabatan" => $jabatan,
                "item" => $item
                
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $pgw = Pegawai::find($id);
        $pgw->update($request->all()); 


        return redirect()->route('dataPegawai.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Pegawai::destroy($id);
 
        return response()->json(['success'=>'Pegawai berhasil dihapus !!']);
    }
}
