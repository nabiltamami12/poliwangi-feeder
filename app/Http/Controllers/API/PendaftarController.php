<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Pendaftar;
use Illuminate\Support\Facades\Validator;
use App\Http\Resources\JalurpendaftarResource;
use Illuminate\Database\QueryException;
// use Illuminate\Validation\Rules\Password;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Contracts\Encryption\DecryptException;
use BNI;

class PendaftarController extends Controller
{
    protected $status = null;
    protected $error = null;
    protected $data = null;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            $this->data = Pendaftar::get();
            $this->status = "success";
        } catch (QueryException $e) {
            $this->status = "failed";
            $this->error = $e;
        }
        return response()->json([
            "status" => $this->status,
            "data" => $this->data,
            "error" => $this->error
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
        //
        $data = $request->all();

        $validator = Validator::make($data, [
            'jalur_daftar' => 'required|exists:jalur_penerimaan,id',
            'program_studi' => 'required|exists:program_studi,nomor',
            'nama' => 'required|string|max:100',
            'tgllahir' => 'required|date',
            'smu' => 'required|string|max:50',
            'foto' => 'required|mimes:jpg,png,jpeg|max:2048',
            'ayah' => 'required|string|max:60',
            'ibu' => 'required|string|max:60',
            'notelp_ortu' => 'required|string|max:20',
            'email' => 'required|email',
            // 'password' => ['required', 'confirmed', Password::min(8)],
        ]);

        if ($validator->fails()) {
            return response(
                [
                    'status' => "failed",
                    'data' => ["message" => "data salah"],
                    'error' => $validator->errors(),
                ]
            );
        }
        $document = new Pendaftar();
        $document->jalur_daftar = $request->jalur_daftar;
        $document->program_studi = $request->program_studi;
        $document->nama = $request->nama;
        $document->tgllahir = date('Y-m-d', strtotime($request->tgllahir));
        $document->smu = $request->smu;
        $document->ayah = $request->ayah;
        $document->ibu = $request->ibu;
        $document->notelp_ortu = $request->notelp_ortu;
        $document->email = $request->email;
        // $document->password = Hash::make($request->password);
        $document->save();

        if ($fotos = $request->file('foto')) {
            $update_data = [];
            $namafile = md5($document->id.'f0to').'.'.$fotos->getClientOriginalExtension();
            $update_data['foto'] = $namafile;
            $update_data['nodaftar'] = date('Y').$document->id;
            $fotos->move(public_path() . '/pendaftar', $namafile);
            $check = Pendaftar::where('nomor', $document->id);
            $check->update($update_data);
        }

        return response()->json([
            "status" => 'success',
            "data" => Crypt::encrypt($document->id),
            "message" => "Sukses"
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        try {
            if ($id) {
                $jalurpendaftar = Pendaftar::where('nomor', $id)->get();
            } else {
                $jalurpendaftar = Pendaftar::get();
            }
            $this->data = $jalurpendaftar;
            $this->status = "success";
        } catch (QueryException $e) {
            $this->status = "failed";
            $this->error = $e;
        }
        return response()->json([
            "status" => $this->status,
            "data" => $this->data,
            "error" => $this->error
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
        //

        $validator = Validator::make($request->all(), [
            'foto' => 'required|mimes:jpg,png,jpeg|max:2048',
        ]);

        if ($validator->fails()) {
            $error = $validator->errors()->all()[0];
            return response()->json([
                'status' => 'failed',
                'message' => $error,
                'data' => []
            ]);
        } else {
            $document = Pendaftar::where('nomor', $id);


            $document->ummb = $request->ummb;
            $document->jurusan = $request->jurusan;
            $document->program = $request->program;
            $document->nodaftar = $request->nodaftar;
            $document->nama = $request->nama;
            $document->agama = $request->agama;
            $document->sex = $request->sex;
            $document->alamat = $request->alamat;
            $document->telp = $request->telp;
            $document->status = $request->status;
            $document->spi = $request->spi;
            $document->nrp = $request->nrp;
            $document->t_ajaran = $request->t_ajaran;
            $document->semester = $request->semester;
            $document->warga = $request->warga;
            $document->tgllahir = $request->tgllahir;
            $document->penghasilan = $request->penghasilan;
            $document->jumlah_anak = $request->jumlah_anak;
            $document->el = $request->el;
            $document->pmdk = $request->pmdk;
            $document->anak_ke = $request->anak_ke;
            $document->gelombang = $request->gelombang;
            $document->bebas_spp = $request->bebas_spp;
            $document->bebas_ikoma = $request->bebas_ikoma;
            $document->bebas_kemahasiswaan = $request->bebas_kemahasiswaan;
            $document->bebas_spi = $request->bebas_spi;
            $document->keterangan_bebas_spi = $request->keterangan_bebas_spi;
            $document->tempat_lahir = $request->tempat_lahir;
            $document->smu = $request->smu;
            $document->alamat_smu = $request->alamat_smu;
            $document->tahun_lulus_smu = $request->tahun_lulus_smu;
            $document->nilai_ijazah = $request->nilai_ijazah;
            $document->nilai_uan = $request->nilai_uan;
            $document->darah = $request->darah;
            $document->prestasi_olahraga = $request->prestasi_olahraga;
            $document->nun = $request->nun;
            $document->nijazah = $request->nijazah;
            $document->ayah = $request->ayah;
            $document->kerja_ayah = $request->kerja_ayah;
            $document->ibu = $request->ibu;
            $document->kerja_ibu = $request->kerja_ibu;
            $document->keterangan_ibu = $request->keterangan_ibu;
            $document->penghasilan_ibu = $request->penghasilan_ibu;
            $document->alamat_ortu = $request->alamat_ortu;
            $document->notelp_ortu = $request->notelp_ortu;
            $document->nisn = $request->nisn;
            $document->tanggal_ubah = $request->tanggal_ubah;
            $document->cadangan = $request->candangan;
            $document->ukt = $request->ukt;
            $document->bebas_ukt = $request->bebas_ukt;
            $document->sekolah = $request->sekolah;
            $document->kode_transaksi = $request->kode_transaksi;
            $document->publik = $request->publik;
            $document->mahasiswa_jalur_penerimaan = $request->mahasiswa_jalur_penerimaan;
            $document->kota = $request->kota;
            $document->kota_ortu = $request->kota_ortu;
            $document->pendaftaran = $request->pendaftaran;
            $document->ikoma = $request->ikoma;
            $document->kemahasiswaan = $request->kemahasiswaan;
            $document->subkampus = $request->subkampus;
            $document->tanggal_transfer_spp = $request->tanggal_transfer_spp;
            $document->kirim_email = $request->kirim_email;
            $document->kirim_sms = $request->kirim_sms;
            $document->email = $request->email;
            $document->nik = $request->nik;
            $document->kelas_pagi_sore = $request->kelas_pagi_sore;
            $document->ijasah = $request->ijasah;
            $document->status_kawin = $request->status_kawin;
            $document->ukuran_baju = $request->ukuran_baju;
            $document->pernahpt = $request->pernahpt;
            $document->tahunmasuk_pt = $request->tahunmasuk_pt;
            $document->jumlah_sks = $request->jumlah_sks;
            $document->pt_asal = $request->pt_asal;
            $document->nunmapel = $request->nunmapel;
            $document->nijazahmapel = $request->nijazahmapel;
            $document->status_smu = $request->status_smu;
            $document->jurusan_smu = $request->jurusan_smu;
            $document->thlahirayah = $request->thlahirayah;
            $document->pendidikanayah = $request->pendidikanayah;
            $document->thlahiribu = $request->thlahiribu;
            $document->pendidikanibu = $request->pendidikanibu;
            $document->sumberbiaya = $request->sumberbiaya;
            $document->lembaga = $request->lembaga;
            $document->jenis_lembaga = $request->jenis_lembaga;
            $document->jenis_tempattinggal = $request->jenis_tempattinggal;
            $document->transportasi = $request->transportasi;
            $document->minat = $request->minat;
            $document->infopolije = $request->infopolije;
            $document->biaya_lain = $request->biaya_lain;
            $document->ukt3 = $request->ukt3;
            $document->ukt4 = $request->ukt4;
            $document->ukt5 = $request->ukt5;
            $document->kelurahan = $request->kelurahan;
            $document->kecamatan = $request->kecamatan;
            $document->feeder_wilayah = $request->feeder_wilayah;
            $document->nomor_ukt = $request->nomor_ukt;
            $document->bidikmisi = $request->bidikmisi;
            $document->rata_sem_1 = $request->rata_sem_1;
            $document->rata_sem_2 = $request->rata_sem_2;
            $document->rata_sem_3 = $request->rata_sem_3;
            $document->rata_sem_4 = $request->rata_sem_4;
            $document->rata_sem_5 = $request->rata_sem_5;
            $document->rata_sem_6 = $request->rata_sem_6;
            $document->kap_bidikmisi = $request->kap_bidikmisi;
            $document->noref_bank = $request->noref_bank;
            $document->tanggal_transfer = $request->tanggal_transfer;
            $document->pembayaran = $request->pembayaran;
            $document->scan_pembayaran = $request->scan_pembayaran;
            $document->jurusan_asal = $request->jurusan_asal;
            $document->prestasi = $request->prestasi;
            if ($request->foto && $request->foto->isValid()) {
                $file_name = $request->foto->getClientOriginalName();
                $request->foto->move(public_path('pendaftar'), $file_name);
                $path = $file_name;
                $request->foto = $path;
            }
            $document->update($request->all());
            return response()->json([
                'status' => 'success',
                'data' => $document,
                'messagge' => 'data berhasil di update'
            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $jalurpendaftar = Pendaftar::where('nomor', $id);
            $jalurpendaftar->delete();
            $this->data = $jalurpendaftar;
            $this->status = "success";
        } catch (QueryException $e) {
            $this->status = "failed";
            $this->error = $e;
        }
        return response()->json([
            "status" => $this->status,
            "data" => $this->data,
            "error" => $this->error
        ]);
    }

    public function va(Request $request)
    {
        $token = $request->header('token');
        try{
            $id = Crypt::decrypt($token);
            $document = Pendaftar::select('is_lunas')->where('nomor', $id)->get()->first();
            if ($document->is_lunas == 1) {
                return response()->json([
                    "status" => 'success',
                    "data" => [
                        'is_lunas' => 1
                    ],
                    "error" => $this->error
                ]);
            }
            /*
            $BniEnc = new BNI();
            $raw = array(
                'type' => 'createbilling',
                'trx_id' => mt_rand(), // fill with Billing ID
                'trx_amount' => 10000,
                'billing_type' => 'c',
                'datetime_expired' => date('c', time() + 2 * 3600), // billing will be expired in 2 hours
                'virtual_account' => '',
                'customer_name' => 'Mr. X',
                'customer_email' => '',
                'customer_phone' => '',
            );

            $response = $BniEnc->getContent($raw);
            $response_json = json_decode($response, true);

            if ($response_json['status'] !== '000') {
                // handling jika gagal
                var_dump($response_json);
            }
            else {
                $data_response = $BniEnc->decrypt($response_json['data'], $client_id, $secret_key);
                // $data_response will contains something like this: 
                // array(
                //  'virtual_account' => 'xxxxx',
                //  'trx_id' => 'xxx',
                // );
                var_dump($data_response);
            }*/

            $this->data = [
                'is_lunas' => 0,
                'trx_amount' => 201500,
                'virtual_account' => '80010000'.$id.'187',
                'datetime_expired_iso8601' => '2021-10-05T16:00:00+07:00',
                'document' => $document
            ];
            $this->status = 'success';
        }catch(DecryptException $e){
            $this->status = 'failed';
            $this->error = $e;
        }
        return response()->json([
            "status" => $this->status,
            "data" => $this->data,
            "error" => $this->error
        ]);
    }

    public function login(Request $request)
    {
        $data = $request->all();

        $validator = Validator::make($data, [
            'nodaftar' => 'required',
            'password' => 'required',
        ]);

        if ($validator->fails()) {
            return response(
                [
                    'status' => "failed",
                    'data' => null,
                    'error' => $validator->errors(),
                ]
            );
        }
        $document = Pendaftar::select('password', 'nomor')->where('nodaftar', $data['nodaftar'])->get()->first();
        $hashedPassword = $document->password;
        if (Hash::check($request->password, $hashedPassword)) {
            return response()->json([
                "status" => 'success',
                "data" => Crypt::encrypt($document->nomor),
                "message" => "Sukses"
            ]);
        }
        return response()->json([
            "status" => 'failed',
            "data" => null,
            "message" => "Gagal"
        ]);
    }
}
