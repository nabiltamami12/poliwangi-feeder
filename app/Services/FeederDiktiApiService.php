<?php

namespace App\Services;

use GuzzleHttp\Client;
use App\Models\feeder\feeder_koneksi as fd;

  function run($data,$url, $type = 'json')
{
        set_time_limit(2000);
    
    $ch = curl_init();

    curl_setopt($ch, CURLOPT_POST, 1); 

    $headers = array();

    if ($type == 'xml')
      $headers[] = 'Content-Type: application/xml';
    else
      $headers[] = 'Content-Type: application/json';

    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

    if ($data) {
      if ($type == 'xml') {
        $data = stringXML($data);
      } else {
        $data = json_encode($data);
      }
      curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
    }
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

    $result = curl_exec($ch);
    curl_close($ch);

    dd($result);
    // dd("Wes ke run");
    return $result;
}

class FeederDiktiApiService {
    // url Feeder Dikti
    private $url;
    // Username Feeder Dikti
    private $username;
    // Password
    private $password;
    //data
    private $act;


    function __construct($act) {
        $konek = fd::first();
        
        $this->url = "http://18.141.224.253:8082/ws/live2.php";
        $this->username = "005035";
        $this->password = "KM13banyuwangi";
        
        // $this->url =    "http://" . $konek->url . ":" . $konek->port . "/ws/live2.php";
        // $this->username = $konek->username;
        // $this->password = $konek->password; 
        $this->act = $act;
    }

     public function runWS()
    {
        set_time_limit(2000);
        
        $client = new Client();
        $params = [
            "act" => "GetToken",
            "username" => $this->username,
            "password" => $this->password
        ];

        $req = $client->post( $this->url, [
            'headers' => [
                'Content-Type' => 'application/json',
                'Accept' => 'application/json',
            ],
            'body' => json_encode($params)
        ]);

        $response = $req->getBody();
        $result = json_decode($response,true);

        if($result['error_code'] == 0) {
            $token = $result['data']['token'];

            $params = [
                "token" => $token,
                "act" => $this->act,
            ];

            $req = $client->post( $this->url, [
                'headers' => [
                    'Content-Type' => 'application/json',
                    'Accept' => 'application/json',
                ],
                'body' => json_encode($params)
            ]);

            $response = $req->getBody();
            $result = json_decode($response,true);
        }

        return $result;
    }
    public function getToken()
    {

        $client = new Client();
        $params = [
            "act" => "GetToken",
            "username" => $this->username,
            "password" => $this->password
        ];

        $req = $client->post( $this->url, [
            'headers' => [
                'Content-Type' => 'application/json',
                'Accept' => 'application/json',
            ],
            'body' => json_encode($params)
        ]);
        
        $response = $req->getBody();
        $result = json_decode($response,true);

        return $result;

    }
  //update mata kuliah
    function UpdateMataKuliah($data_con)
    {
         $client = new Client();
        $params = [
            "act" => "GetToken",
            "username" => $this->username,
            "password" => $this->password
        ];

        $req = $client->post( $this->url, [
            'headers' => [
                'Content-Type' => 'application/json',
                'Accept' => 'application/json',
            ],
            'body' => json_encode($params)
        ]);
        
        $response = $req->getBody();
        $result = json_decode($response,true);
        
        $token = $result['data']['token'];
        $data = array();
        $data["act"]                               = "UpdateMataKuliah";
        $data["token"]                             = $token;
        $data["key"]["id_matkul"]                  = $data_con["id_matkul"];
        $data["record"]["kode_mata_kuliah"]        = $data_con["kode_mata_kuliah"];
        $data["record"]["nama_mata_kuliah"]        = $data_con["nama_mata_kuliah"];
        $data["record"]["id_jenis_mata_kuliah"]    = $data_con["id_jenis_mata_kuliah"];
        $data["record"]["sks_mata_kuliah"]         = $data_con["sks_mata_kuliah"];
        $data["record"]["sks_tatap_muka"]          = $data_con["sks_tatap_muka"];
        $data["record"]["sks_praktek"]             = $data_con["sks_praktek"];
        $data["record"]["sks_praktek_lapangan"]    = $data_con["sks_praktek_lapangan"];
        $data["record"]["sks_simulasi"]            = $data_con["sks_simulasi"];
        $data["record"]["tanggal_mulai_efektif"]   = $data_con["tanggal_mulai_efektif"];
        $data["record"]["tanggal_akhir_efektif"]   = $data_con["tanggal_akhir_efektif"];
        // dd($data);
        // dd("update data");
        $hasil = run($data,$this->url,'json');
        return $hasil;
    }

  //insert mata kuliah
    function InsertMataKuliah($data_con)
    {
         $client = new Client();
        $params = [
            "act" => "GetToken",
            "username" => $this->username,
            "password" => $this->password
        ];

        $req = $client->post( $this->url, [
            'headers' => [
                'Content-Type' => 'application/json',
                'Accept' => 'application/json',
            ],
            'body' => json_encode($params)
        ]);
        
        $response = $req->getBody();
        $result = json_decode($response,true);
        
        $token = $result['data']['token'];
        $data = array();
        $data["act"]                               = "InsertMataKuliah";
        $data["token"]                             = $token;
        $data["record"]["kode_mata_kuliah"]        = $data_con["kode_mata_kuliah"];
        $data["record"]["nama_mata_kuliah"]        = $data_con["nama_mata_kuliah"];
        $data["record"]["id_jenis_mata_kuliah"]    = $data_con["id_jenis_mata_kuliah"];
        $data["record"]["sks_mata_kuliah"]         = $data_con["sks_mata_kuliah"];
        $data["record"]["sks_tatap_muka"]          = $data_con["sks_tatap_muka"];
        $data["record"]["sks_praktek"]             = $data_con["sks_praktek"];
        $data["record"]["sks_praktek_lapangan"]    = $data_con["sks_praktek_lapangan"];
        $data["record"]["sks_simulasi"]            = $data_con["sks_simulasi"];
        $data["record"]["tanggal_mulai_efektif"]   = $data_con["tanggal_mulai_efektif"];
        $data["record"]["tanggal_akhir_efektif"]   = $data_con["tanggal_akhir_efektif"];
        $data["record"]["ada_sap"]                 = "";
        $data["record"]["ada_silabus"]             = "";
        $data["record"]["ada_bahan_ajar"]          = "";
        $data["record"]["ada_acara_praktek"]       = "";
        $data["record"]["ada_diktat"]              = "";
        // dd($data);
        // dd("insert data");
        $hasil = run($data,$this->url,'json');
        return $hasil;
    }

 //update kurikulum
    function UpdateKurikulum($data_con)
    {
         $client = new Client();
        $params = [
            "act" => "GetToken",
            "username" => $this->username,
            "password" => $this->password
        ];

        $req = $client->post( $this->url, [
            'headers' => [
                'Content-Type' => 'application/json',
                'Accept' => 'application/json',
            ],
            'body' => json_encode($params)
        ]);
        
        $response = $req->getBody();
        $result = json_decode($response,true);
        
        $token = $result['data']['token'];
        $data = array();
        $data["act"]                          = "UpdateKurikulum";
        $data["token"]                        = $token;
        $data["key"]["id_kurikulum"]          = $data_con["id_kurikulum"];
        $data["record"]["nama_kurikulum"]     = $data_con["nama_kurikulum"];
        $data["record"]["id_prodi"]           = $data_con["id_prodi"];
        $data["record"]["id_semester"]        = $data_con["id_semester"];
        $data["record"]["jumlah_sks_lulus"]   = $data_con["jumlah_sks_lulus"];
        $data["record"]["jumlah_sks_wajib"]   = $data_con["jumlah_sks_wajib"];
        $data["record"]["jumlah_sks_pilihan"] = $data_con["jumlah_sks_pilihan"];
        // dd($data);
        // dd("update data");
        $hasil = run($data,$this->url,'json');
        return $hasil;
    }
 //insert kurikulum

    function InsertKurikulum($data_con)
    {
         $client = new Client();
        $params = [
            "act" => "GetToken",
            "username" => $this->username,
            "password" => $this->password
        ];

        $req = $client->post( $this->url, [
            'headers' => [
                'Content-Type' => 'application/json',
                'Accept' => 'application/json',
            ],
            'body' => json_encode($params)
        ]);
        
        $response = $req->getBody();
        $result = json_decode($response,true);
        
        $token = $result['data']['token'];
        $data = array();
        $data["act"]                               = "InsertKurikulum";
        $data["token"]                             = $token;
        $data["record"]["nama_kurikulum"]     = $data_con["nama_kurikulum"];
        $data["record"]["id_prodi"]           = $data_con["id_prodi"];
        $data["record"]["id_semester"]        = $data_con["id_semester"];
        $data["record"]["jumlah_sks_lulus"]   = $data_con["jumlah_sks_lulus"];
        $data["record"]["jumlah_sks_wajib"]   = $data_con["jumlah_sks_wajib"];
        $data["record"]["jumlah_sks_pilihan"] = $data_con["jumlah_sks_pilihan"];
        // dd($data);
        // dd("insert data");
        $hasil = run($data,$this->url,'json');
        return $hasil;
    }
  
   //update kurikulum
    function UpdateMKKurikulum($data_con)
    {
         $client = new Client();
        $params = [
            "act" => "GetToken",
            "username" => $this->username,
            "password" => $this->password
        ];

        $req = $client->post( $this->url, [
            'headers' => [
                'Content-Type' => 'application/json',
                'Accept' => 'application/json',
            ],
            'body' => json_encode($params)
        ]);
        
        $response = $req->getBody();
        $result = json_decode($response,true);
        
        $token = $result['data']['token'];
        $data = array();
        $data["act"]                          = "UpdateMatkulKurikulum";
        $data["token"]                        = $token;
        $data["record"]["id_kurikulum"]         = $data_con["id_kurikulum"];
        $data["record"]["id_matkul"]            = $data_con["id_matkul"];
        $data["record"]["semester"]             = $data_con["semester"];
        $data["record"]["sks_mata_kuliah"]      = $data_con["sks_mata_kuliah"];
        $data["record"]["sks_tatap_muka"]       = $data_con["sks_tatap_muka"];
        $data["record"]["sks_praktek"]          = $data_con["sks_praktek"];
        $data["record"]["sks_praktek_lapangan"] = $data_con["sks_praktek_lapangan"];
        $data["record"]["sks_simulasi"]         = $data_con["sks_simulasi"];
        $data["record"]["apakah_wajib"]         = $data_con["apakah_wajib"];
        // dd($data);
        // dd("update data matkul kurikulums tidak ada");
        // $hasil = run($data,$this->url,'json');
        // return $hasil;
        $hasil = "update data matkul kurikulums tidak ada";
        return $hasil;
    }
 //insert kurikulum

    function InsertMKKurikulum($data_con)
    {
         $client = new Client();
        $params = [
            "act" => "GetToken",
            "username" => $this->username,
            "password" => $this->password
        ];

        $req = $client->post( $this->url, [
            'headers' => [
                'Content-Type' => 'application/json',
                'Accept' => 'application/json',
            ],
            'body' => json_encode($params)
        ]);
        
        $response = $req->getBody();
        $result = json_decode($response,true);
        
        $token = $result['data']['token'];
        $data = array();
        $data["act"]                               = "InsertMatkulKurikulum";
        $data["token"]                             = $token;
        $data["record"]["id_kurikulum"]         = $data_con["id_kurikulum"];
        $data["record"]["id_matkul"]            = $data_con["id_matkul"];
        $data["record"]["semester"]             = $data_con["semester"];
        $data["record"]["sks_mata_kuliah"]      = $data_con["sks_mata_kuliah"];
        $data["record"]["sks_tatap_muka"]       = $data_con["sks_tatap_muka"];
        $data["record"]["sks_praktek"]          = $data_con["sks_praktek"];
        $data["record"]["sks_praktek_lapangan"] = $data_con["sks_praktek_lapangan"];
        $data["record"]["sks_simulasi"]         = $data_con["sks_simulasi"];
        $data["record"]["apakah_wajib"]         = $data_con["apakah_wajib"];
        // dd($data);
        // dd("insert data");
        $hasil = run($data,$this->url,'json');
        return $hasil;
    }
        
     //update dosen pengajar
    function UpdateDosenAjar($data_con)
    {
         $client = new Client();
        $params = [
            "act" => "GetToken",
            "username" => $this->username,
            "password" => $this->password
        ];

        $req = $client->post( $this->url, [
            'headers' => [
                'Content-Type' => 'application/json',
                'Accept' => 'application/json',
            ],
            'body' => json_encode($params)
        ]);
        
        $response = $req->getBody();
        $result = json_decode($response,true);
        
        $token = $result['data']['token'];
        $data = array();
        $data["act"]                          = "UpdateDosenPengajarKelasKuliah";
        $data["token"]                        = $token;
        $data["key"]["id_aktivitas_mengajar"]   = $data_con["id_aktivitas_mengajar"];
        $data["record"]["id_registrasi_dosen"]  = $data_con["id_registrasi_dosen"];
        $data["record"]["id_kelas_kuliah"]      = $data_con["id_kelas_kuliah"];
        $data["record"]["id_substansi"]         = $data_con["id_substansi"];
        $data["record"]["sks_substansi_total"]  = $data_con["sks_substansi_total"];
        $data["record"]["rencana_minggu_pertemuan"]   = $data_con["rencana_tatap_muka"];
        $data["record"]["realisasi_minggu_pertemuan"] = $data_con["realisasi_tatap_muka"];
        $data["record"]["id_jenis_evaluasi"]    = $data_con["id_jenis_evaluasi"];
        // dd($data);
        // dd("update dosen ajar");
        $hasil = run($data,$this->url,'json');
        return $hasil;

    }
 //insert dosen pengajar

    function InsertDosenAjar($data_con)
    {
         $client = new Client();
        $params = [
            "act" => "GetToken",
            "username" => $this->username,
            "password" => $this->password
        ];

        $req = $client->post( $this->url, [
            'headers' => [
                'Content-Type' => 'application/json',
                'Accept' => 'application/json',
            ],
            'body' => json_encode($params)
        ]);
        
        $response = $req->getBody();
        $result = json_decode($response,true);
        
        $token = $result['data']['token'];
        $data = array();
        $data["act"]                               = "InsertDosenPengajarKelasKuliah";
        $data["token"]                             = $token;
        $data["record"]["id_registrasi_dosen"]  = $data_con["id_registrasi_dosen"];
        $data["record"]["id_kelas_kuliah"]      = $data_con["id_kelas_kuliah"];
        $data["record"]["id_substansi"]         = $data_con["id_substansi"];
        $data["record"]["sks_substansi_total"]  = $data_con["sks_substansi_total"];
        $data["record"]["rencana_minggu_pertemuan"]   = $data_con["rencana_tatap_muka"];
        $data["record"]["realisasi_minggu_pertemuan"] = $data_con["realisasi_tatap_muka"];
        $data["record"]["id_jenis_evaluasi"]    = $data_con["id_jenis_evaluasi"];
        // dd($data);
        // dd("insert dosen ajar");
        $hasil = run($data,$this->url,'json');
        return $hasil;
    }

   //update kelas
    function UpdateKelas($data_con)
    {
         $client = new Client();
        $params = [
            "act" => "GetToken",
            "username" => $this->username,
            "password" => $this->password
        ];

        $req = $client->post( $this->url, [
            'headers' => [
                'Content-Type' => 'application/json',
                'Accept' => 'application/json',
            ],
            'body' => json_encode($params)
        ]);
        
        $response = $req->getBody();
        $result = json_decode($response,true);
        
        $token = $result['data']['token'];
        $data = array();
        $data["act"]                          = "UpdateKelasKuliah";
        $data["token"]                        = $token;
        $data["key"]["id_kelas_kuliah"]         = $data_con["id_kelas_kuliah"];
        $data["record"]["id_prodi"]             = $data_con["id_prodi"];
        $data["record"]["id_semester"]          = $data_con["id_semester"];
        $data["record"]["id_matkul"]            = $data_con["id_matkul"];
        $data["record"]["nama_kelas_kuliah"]    = $data_con["nama_kelas_kuliah"];
        $data["record"]["bahasan"]              = $data_con["bahasan"];
        $data["record"]["tanggal_mulai_efektif"]= $data_con["tanggal_mulai_efektif"];
        $data["record"]["tanggal_akhir_efektif"]= $data_con["tanggal_akhir_efektif"];
        // dd($data);
        // dd("update kelas");
        $hasil = run($data,$this->url,'json');
        return $hasil;

    }
 //insert kelas

    function InsertKelas($data_con)
    {
         $client = new Client();
        $params = [
            "act" => "GetToken",
            "username" => $this->username,
            "password" => $this->password
        ];

        $req = $client->post( $this->url, [
            'headers' => [
                'Content-Type' => 'application/json',
                'Accept' => 'application/json',
            ],
            'body' => json_encode($params)
        ]);
        
        $response = $req->getBody();
        $result = json_decode($response,true);
        
        $token = $result['data']['token'];
        $data = array();
        $data["act"]                               = "InsertKelasKuliah";
        $data["token"]                             = $token;
        $data["record"]["id_prodi"]             = $data_con["id_prodi"];
        $data["record"]["id_semester"]          = $data_con["id_semester"];
        $data["record"]["id_matkul"]            = $data_con["id_matkul"];
        $data["record"]["nama_kelas_kuliah"]    = $data_con["nama_kelas_kuliah"];
        $data["record"]["bahasan"]              = $data_con["bahasan"];
        $data["record"]["tanggal_mulai_efektif"]= $data_con["tanggal_mulai_efektif"];
        $data["record"]["tanggal_akhir_efektif"]= $data_con["tanggal_akhir_efektif"];
        // dd($data);
        // dd("insert dosen ajar");
        $hasil = run($data,$this->url,'json');
        return $hasil;
    }


  //update skala nilai
    function UpdateSkalaNilai($data_con)
    {
         $client = new Client();
        $params = [
            "act" => "GetToken",
            "username" => $this->username,
            "password" => $this->password
        ];

        $req = $client->post( $this->url, [
            'headers' => [
                'Content-Type' => 'application/json',
                'Accept' => 'application/json',
            ],
            'body' => json_encode($params)
        ]);
        
        $response = $req->getBody();
        $result = json_decode($response,true);
        
        $token = $result['data']['token'];
        $data = array();
        $data["act"]                          = "UpdateSkalaNilaiProdi";
        $data["token"]                        = $token;
        $data["key"]["id_bobot_nilai"]           = $data_con["id_bobot_nilai"];      
        $data["record"]["id_prodi"]              = $data_con["id_prodi"];
        $data["record"]["nilai_huruf"]           = $data_con["nilai_huruf"];
        $data["record"]["nilai_indeks"]          = $data_con["nilai_indeks"];
        $data["record"]["bobot_minimum"]         = $data_con["bobot_minimum"];
        $data["record"]["bobot_maksimum"]        = $data_con["bobot_maksimum"];
        $data["record"]["tanggal_mulai_efektif"] = $data_con["tanggal_mulai_efektif"];
        $data["record"]["tanggal_akhir_efektif"] = $data_con["tanggal_akhir_efektif"];    
        // dd($data);
        // dd("update skala nilai");
        $hasil = run($data,$this->url,'json');
        return $hasil;

    }
 //insert skala nilai

    function InsertSkalaNilai($data_con)
    {
         $client = new Client();
        $params = [
            "act" => "GetToken",
            "username" => $this->username,
            "password" => $this->password
        ];

        $req = $client->post( $this->url, [
            'headers' => [
                'Content-Type' => 'application/json',
                'Accept' => 'application/json',
            ],
            'body' => json_encode($params)
        ]);
        
        $response = $req->getBody();
        $result = json_decode($response,true);
        
        $token = $result['data']['token'];
        $data = array();
        $data["act"]                               = "InsertSkalaNilaiProdi";
        $data["token"]                             = $token;
        $data["record"]["id_prodi"]              = $data_con["id_prodi"];
        $data["record"]["nilai_huruf"]           = $data_con["nilai_huruf"];
        $data["record"]["nilai_indeks"]          = $data_con["nilai_indeks"];
        $data["record"]["bobot_minimum"]         = $data_con["bobot_minimum"];
        $data["record"]["bobot_maksimum"]        = $data_con["bobot_maksimum"];
        $data["record"]["tanggal_mulai_efektif"] = $data_con["tanggal_mulai_efektif"];
        $data["record"]["tanggal_akhir_efektif"] = $data_con["tanggal_akhir_efektif"];   
        // dd($data);
        // dd("insert skala nilai");
        $hasil = run($data,$this->url,'json');
        return $hasil;
    }

  //update akm
    function UpdateAKM($data_con)
    {
         $client = new Client();
        $params = [
            "act" => "GetToken",
            "username" => $this->username,
            "password" => $this->password
        ];

        $req = $client->post( $this->url, [
            'headers' => [
                'Content-Type' => 'application/json',
                'Accept' => 'application/json',
            ],
            'body' => json_encode($params)
        ]);
        
        $response = $req->getBody();
        $result = json_decode($response,true);
        
        $token = $result['data']['token'];
        $data = array();
        $data["act"]                            = "UpdatePerkuliahanMahasiswa";
        $data["token"]                        = $token;
        $data["key"]["id_registrasi_mahasiswa"] = $data_con["id_registrasi_mahasiswa"];
        $data["key"]["id_semester"]             = $data_con["id_semester"];
        $data["record"]["id_status_mahasiswa"]  = $data_con["id_status_mahasiswa"];
        $data["record"]["ips"]                  = $data_con["ips"];
        $data["record"]["ipk"]                  = $data_con["ipk"];
        $data["record"]["sks_semester"]         = $data_con["sks_semester"];
        $data["record"]["total_sks"]            = $data_con["total_sks"];
        $data["record"]["biaya_kuliah_smt"]     = $data_con["biaya_kuliah_smt"];  
        // dd($data);
        // dd("update akm");
        $hasil = run($data,$this->url,'json');
        return $hasil;

    }
 //insert akm

    function InsertAKM($data_con)
    {
         $client = new Client();
        $params = [
            "act" => "GetToken",
            "username" => $this->username,
            "password" => $this->password
        ];

        $req = $client->post( $this->url, [
            'headers' => [
                'Content-Type' => 'application/json',
                'Accept' => 'application/json',
            ],
            'body' => json_encode($params)
        ]);
        
        $response = $req->getBody();
        $result = json_decode($response,true);
        
        $token = $result['data']['token'];
        $data = array();
        $data["act"]                            = "InsertPerkuliahanMahasiswa";
        $data["token"]                        = $token;
        // $data["key"]["id_registrasi_mahasiswa"] = $data_con["id_registrasi_mahasiswa"];
        // $data["key"]["id_semester"]             = $data_con["id_semester"];
        $data["record"]["id_status_mahasiswa"]  = $data_con["id_status_mahasiswa"];
        $data["record"]["ips"]                  = $data_con["ips"];
        $data["record"]["ipk"]                  = $data_con["ipk"];
        $data["record"]["sks_semester"]         = $data_con["sks_semester"];
        $data["record"]["total_sks"]            = $data_con["total_sks"];
        $data["record"]["biaya_kuliah_smt"]     = $data_con["biaya_kuliah_smt"];  
        // dd($data);
        // dd("insert akm");
        $hasil = run($data,$this->url,'json');
        return $hasil;
    }

}
