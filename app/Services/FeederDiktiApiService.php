<?php

namespace App\Services;

use GuzzleHttp\Client;
use App\Models\feeder\feeder_koneksi as fd;
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
    public function runWS()
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
        
}
