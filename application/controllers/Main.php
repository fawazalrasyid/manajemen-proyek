<?php

use GuzzleHttp\Client;

class Main extends CI_Controller {
    protected $client;

    public function __construct() {
        parent::__construct();
        $this->load->helper('url');
        $this->client = new Client([
            'base_uri' => 'http://localhost:8080/api/',
            'timeout'  => 2.0,
        ]);
    }

    public function index() {
        $data['title'] = 'Dashboard';

        try {
            // Panggil API Lokasi
            $responseLokasi = $this->client->request('GET', 'lokasi');
            $lokasiData = json_decode($responseLokasi->getBody()->getContents());

            // Cek apakah data lokasi valid
            if (isset($lokasiData->data)) {
                $data['lokasi'] = $lokasiData->data;
                $data['jumlahLokasi'] = count($lokasiData->data);
            } else {
                $data['lokasi'] = [];
                $data['jumlahLokasi'] = 0;
            }

        } catch (GuzzleHttp\Exception\ClientException $e) {
            // Jika API lokasi gagal, set jumlahLokasi ke 0
            $data['lokasi'] = [];
            $data['jumlahLokasi'] = 0;
        }

        try {
            // Panggil API Proyek
            $responseProyek = $this->client->request('GET', 'proyek');
            $proyekData = json_decode($responseProyek->getBody()->getContents());

            // Cek apakah data proyek valid
            if (isset($proyekData->data)) {
                $data['proyek'] = $proyekData->data;
                $data['jumlahProyek'] = count($proyekData->data);
            } else {
                $data['proyek'] = [];
                $data['jumlahProyek'] = 0;
            }

        } catch (GuzzleHttp\Exception\ClientException $e) {
            // Jika API proyek gagal, set jumlahProyek ke 0
            $data['proyek'] = [];
            $data['jumlahProyek'] = 0;
        }

        // Load view
        $this->load->view('layouts/header', $data);
        $this->load->view('layouts/sidebar', $data);
        $this->load->view('main_view', $data);
        $this->load->view('layouts/footer', $data);
    }

}
