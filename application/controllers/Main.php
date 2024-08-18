<?php
defined('BASEPATH') OR exit('No direct script access allowed');

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

        // Panggil API Lokasi dan Proyek secara bersamaan menggunakan Promise
        try {
            $promises = [
                'lokasi' => $this->client->getAsync('lokasi'),
                'proyek' => $this->client->getAsync('proyek'),
            ];

            $responses = \GuzzleHttp\Promise\Utils::settle($promises)->wait();

            // Mengolah data lokasi
            if ($responses['lokasi']['state'] === 'fulfilled') {
                $lokasiData = json_decode($responses['lokasi']['value']->getBody()->getContents(), true);
                $data['lokasi'] = $lokasiData['data'] ?? [];
                $data['jumlahLokasi'] = count($data['lokasi']);
            } else {
                $data['lokasi'] = [];
                $data['jumlahLokasi'] = 0;
            }

            // Mengolah data proyek
            if ($responses['proyek']['state'] === 'fulfilled') {
                $proyekData = json_decode($responses['proyek']['value']->getBody()->getContents(), true);
                $data['proyek'] = $proyekData['data'] ?? [];
                $data['jumlahProyek'] = count($data['proyek']);
            } else {
                $data['proyek'] = [];
                $data['jumlahProyek'] = 0;
            }
        } catch (Exception $e) {
            // Jika terjadi error pada seluruh API
            $data['lokasi'] = [];
            $data['jumlahLokasi'] = 0;
            $data['proyek'] = [];
            $data['jumlahProyek'] = 0;
        }

        // Load view
        $this->loadViews('main_view', $data);
    }

    // Helper method untuk memuat views secara konsisten
    private function loadViews($view, $data = []) {
        $this->load->view('layouts/header', $data);
        $this->load->view('layouts/sidebar', $data);
        $this->load->view('layouts/topbar', $data);
        $this->load->view($view, $data);
        $this->load->view('layouts/footer', $data);
    }
}
