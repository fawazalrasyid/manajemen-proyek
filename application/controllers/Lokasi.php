<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use GuzzleHttp\Client;

class Lokasi extends CI_Controller {
    protected $client;

    public function __construct() {
        parent::__construct();
        $this->load->helper('url');
        $this->client = new Client([
            'base_uri' => 'http://localhost:8080/api/',
            'timeout'  => 2.0,
        ]);
    }

    // Method untuk menampilkan daftar lokasi
    public function index() {
        $data['title'] = 'Daftar Lokasi';

        // Panggil API untuk mendapatkan data lokasi
        $responseLokasi = $this->client->request('GET', 'lokasi');
        $lokasiData = json_decode($responseLokasi->getBody()->getContents());

        if (isset($lokasiData->data)) {
            $data['lokasi'] = $lokasiData->data;
        } else {
            $data['lokasi'] = [];
        }

        // Load view untuk menampilkan daftar lokasi
        $this->load->view('layouts/header', $data);
        $this->load->view('layouts/sidebar', $data);
        $this->load->view('lokasi/lokasi_view', $data);
        $this->load->view('layouts/footer', $data);
    }

    // Method untuk menampilkan form create lokasi
    public function create() {
        $data['title'] = 'Tambah Lokasi';

        // Load view untuk menampilkan form tambah lokasi
        $this->load->view('layouts/header', $data);
        $this->load->view('layouts/sidebar', $data);
        $this->load->view('lokasi/lokasi_create_view', $data);
        $this->load->view('layouts/footer', $data);
    }

    // Method untuk menyimpan data lokasi baru
    public function store() {
        $data_lokasi = array(
            'namaLokasi' => $this->input->post('namaLokasi'),
            'negara' => $this->input->post('negara'),
            'provinsi' => $this->input->post('provinsi'),
            'kota' => $this->input->post('kota')
        );

        $this->client->request('POST', 'lokasi', [
            'json' => $data_lokasi
        ]);

        redirect('lokasi');
    }

    // Method untuk menampilkan form edit lokasi
    public function edit($id) {
        $data['title'] = 'Edit Lokasi';

        // Panggil API untuk mendapatkan data lokasi
        $responseLokasi = $this->client->request('GET', 'lokasi');
        $lokasiData = json_decode($responseLokasi->getBody()->getContents());

        if (isset($lokasiData->data)) {
            $data['lokasi'] = null;
            foreach ($lokasiData->data as $loc) {
                if ($loc->id == $id) {
                    $data['lokasi'] = $loc;
                    break;
                }
            }

            if ($data['lokasi'] === null) {
                $this->session->set_flashdata('error', 'Data lokasi tidak ditemukan.');
                redirect('lokasi');
            }
        } else {
            $this->session->set_flashdata('error', 'Gagal mendapatkan data lokasi.');
            redirect('lokasi');
        }

        // Load view untuk menampilkan form edit lokasi
        $this->load->view('layouts/header', $data);
        $this->load->view('layouts/sidebar', $data);
        $this->load->view('lokasi/lokasi_edit_view', $data);
        $this->load->view('layouts/footer', $data);
    }

    // Method untuk update data lokasi yang diedit
    public function update($id) {
        $data_lokasi = array(
            'namaLokasi' => $this->input->post('namaLokasi'),
            'negara' => $this->input->post('negara'),
            'provinsi' => $this->input->post('provinsi'),
            'kota' => $this->input->post('kota')
        );

        $this->client->request('PUT', "lokasi/{$id}", [
            'json' => $data_lokasi
        ]);

        redirect('lokasi');
    }

    // Method untuk menghapus data lokasi
    public function delete($id) {
        $this->client->request('DELETE', "lokasi/{$id}");
        redirect('lokasi');
    }
}
