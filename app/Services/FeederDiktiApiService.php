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

  

    // public function UpdateData($data,$key)
    // {

    //      set_time_limit(2000);
        
    //     $client = new Client();
    //     $params = [
    //         "act" => "GetToken",
    //         "username" => $this->username,
    //         "password" => $this->password
    //     ];

    //     $req = $client->post( $this->url, [
    //         'headers' => [
    //             'Content-Type' => 'application/json',
    //             'Accept' => 'application/json',
    //         ],
    //         'body' => json_encode($params)
    //     ]);

    //     $response = $req->getBody();
    //     $result = json_decode($response,true);

    //     if($result['error_code'] == 0) {
    //         $token = $result['data']['token'];
    //         $params = [
    //             "token" => $token,
    //             "act" => $this->act,
    //             "key" => array('id_matkul' => $key),
    //             "record" =>  array(
    //               'nama_mata_kuliah'=> $data['nama_mata_kuliah'],
    //               'id_jenis_mata_kuliah'=> $data['id_jenis_mata_kuliah'],
    //               'sks_mata_kuliah'=> $data['sks_mata_kuliah'],
    //               'sks_tatap_muka'=> $data['sks_tatap_muka'],
    //               'sks_praktek'=> $data['sks_praktek'],
    //               'sks_praktek_lapangan'=> $data['sks_praktek_lapangan'],
    //               'sks_simulasi'=> $data['sks_simulasi'],
    //               'id_matkul'=> $data['id_matkul'],
    //               'kode_mata_kuliah'=> $data['kode_mata_kuliah'],
    //               'nama_program_studi'=> $data['nama_program_studi'],
    //               'tanggal_mulai_efektif'=> $data['tanggal_mulai_efektif'],
    //               'tanggal_akhir_efektif'=> $data['tanggal_akhir_efektif'],   ''
    //             ),
    //         ];
    //         $req = $client->post( $this->url, [
    //             'headers' => [
    //                 'Content-Type' => 'application/json',
    //                 'Accept' => 'application/json',
    //             ],
    //             'body' => json_encode($params)
    //         ]);

    //         $response = $req->getBody();
    //         $result = json_decode($response,true);
    //     }
    //         dd($params);

    //     return $result;

    // }


   
        
}
