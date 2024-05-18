<?php

namespace App\Controllers;

use Firebase\Firebase;

class Confirebase extends BaseController
{
    public function index()
    {
        $firebase = new Firebase('Alamat_database', 'API_key');
        $data = $firebase->get('/notes');
        echo json_encode($data);
    }

    public function add_data()
    {
        $firebase = new Firebase('Alamat_database', 'API_key');
        $data = [
            "judul" => "Rapat Saja",
            "peserta" => "5",
        ];
        $result = $firebase->push('/notes', $data);
        echo json_encode($result);
    }

    public function update_data()
    {
        $key = $this->request->getGet("key");
        $firebase = new Firebase('Alamat_database', 'API_key');
        $data = [
            "judul" => "Rapat Evaluasi 2",
            "peserta" => "10",
        ];
        $result = $firebase->update('/notes/' . $key, $data);
        echo json_encode($result);
    }

    public function delete_data()
    {
        $key = $this->request->getGet("key");
        $firebase = new Firebase('Alamat_database', 'API_key');
        $result = $firebase->delete('/notes/' . $key);
        echo json_encode($result);
    }
}
