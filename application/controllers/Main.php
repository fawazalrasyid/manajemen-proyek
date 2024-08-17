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

        // Panggil API Lokasi
        $responseLokasi = $this->client->request('GET', 'lokasi');
        $lokasiData = json_decode($responseLokasi->getBody()->getContents());

        // Hitung jumlah lokasi
        if (isset($lokasiData->data)) {
            $data['jumlahLokasi'] = count($lokasiData->data); // Menghitung jumlah lokasi
        } else {
            $data['jumlahLokasi'] = 0; // Set sebagai 0 jika tidak ada data
        }

        // Panggil API Proyek
        $responseProyek = $this->client->request('GET', 'proyek');
        $proyekData = json_decode($responseProyek->getBody()->getContents());

        // Hitung jumlah proyek
        if (isset($proyekData->data)) {
            $data['jumlahProyek'] = count($proyekData->data); // Menghitung jumlah proyek
        } else {
            $data['jumlahProyek'] = 0; // Set sebagai 0 jika tidak ada data
        }

        $this->load->view('layouts/header', $data);
        $this->load->view('layouts/sidebar', $data);
        $this->load->view('main_view', $data); // Load view dengan statistik
        $this->load->view('layouts/footer', $data);
    }
}
