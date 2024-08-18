<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use GuzzleHttp\Client;

class Proyek extends CI_Controller {
    protected $client;

    public function __construct() {
        parent::__construct();
        $this->load->helper('url');
        $this->client = new Client([
            'base_uri' => 'http://localhost:8080/api/',
            'timeout'  => 2.0,
        ]);
    }

    // Method untuk menampilkan daftar proyek
    public function index() {
        $data['title'] = 'Daftar Proyek';

        try {
            // Panggil API untuk mendapatkan data proyek
            $responseProyek = $this->client->request('GET', 'proyek');
            $proyekData = json_decode($responseProyek->getBody()->getContents());

            if (isset($proyekData->data)) {
                $data['proyek'] = $proyekData->data;
            } else {
                $data['proyek'] = [];
                $data['error_message'] = 'Data proyek kosong.';
            }

        } catch (GuzzleHttp\Exception\ClientException $e) {
            // Tangani error
            $data['proyek'] = [];
            $data['error_message'] = 'Data proyek tidak ditemukan atau terjadi kesalahan saat mengambil data.';
        }

        // Load view untuk menampilkan daftar proyek
        $this->load->view('layouts/header', $data);
        $this->load->view('layouts/sidebar', $data);
        $this->load->view('layouts/topbar', $data);
        $this->load->view('proyek/proyek_view', $data);
        $this->load->view('layouts/footer', $data);
    }

    // Method untuk menampilkan form create proyek
    public function create() {
        $data['title'] = 'Tambah Proyek';

        try {
            // Panggil API untuk mendapatkan data lokasi
            $responseLokasi = $this->client->request('GET', 'lokasi');
            $lokasiData = json_decode($responseLokasi->getBody()->getContents());

            if (isset($lokasiData->data)) {
                $data['lokasi'] = $lokasiData->data;
            } else {
                $data['lokasi'] = [];
            }
        } catch (GuzzleHttp\Exception\ClientException $e) {
            // Tangani error
            $data['lokasi'] = [];
            $data['error_message'] = 'Gagal mendapatkan data lokasi.';
        }

        // Load view untuk menampilkan form tambah proyek
        $this->load->view('layouts/header', $data);
        $this->load->view('layouts/sidebar', $data);
        $this->load->view('layouts/topbar', $data);
        $this->load->view('proyek/proyek_create_view', $data);
        $this->load->view('layouts/footer', $data);
    }

    // Method untuk menyimpan data proyek baru
    public function store() {
        $data_proyek = array(
            'namaProyek' => $this->input->post('namaProyek'),
            'client' => $this->input->post('client'),
            'tglMulai' => $this->input->post('tglMulai'),
            'tglSelesai' => $this->input->post('tglSelesai'),
            'pimpinanProyek' => $this->input->post('pimpinanProyek'),
            'keterangan' => $this->input->post('keterangan')
        );

        $lokasiId = $this->input->post('lokasiId'); // Ambil lokasiId dari form

        try {
            $response = $this->client->request('POST', 'proyek', [
                'query' => ['lokasiId' => $lokasiId], // Kirim lokasiId sebagai parameter query
                'json' => $data_proyek
            ]);
            redirect('proyek');
        } catch (GuzzleHttp\Exception\ClientException $e) {
            // Tangani error
            $errorResponse = $e->getResponse()->getBody()->getContents();
            echo $errorResponse;
        }
    }

    // Method untuk menampilkan form edit proyek
    public function edit($id) {
        $data['title'] = 'Edit Proyek';

        // Panggil API untuk mendapatkan daftar proyek
        $responseProyek = $this->client->request('GET', 'proyek');
        $proyekData = json_decode($responseProyek->getBody()->getContents());

        // Panggil API untuk mendapatkan data lokasi
        $responseLokasi = $this->client->request('GET', 'lokasi');
        $lokasiData = json_decode($responseLokasi->getBody()->getContents());

        if (isset($proyekData->data) && isset($lokasiData->data)) {
            // Cari proyek berdasarkan ID
            $data['proyek'] = null;
            foreach ($proyekData->data as $proj) {
                if ($proj->id == $id) {
                    $data['proyek'] = $proj;
                    break;
                }
            }

            if ($data['proyek'] === null) {
                $data['error_message'] = 'Proyek tidak ditemukan.';
            }

            $data['lokasi'] = $lokasiData->data;
        } else {
            $data['error_message'] = 'Gagal mendapatkan data.';
        }

        // Load view untuk menampilkan form edit proyek
        $this->load->view('layouts/header', $data);
        $this->load->view('layouts/sidebar', $data);
        $this->load->view('layouts/topbar', $data);
        $this->load->view('proyek/proyek_edit_view', $data);
        $this->load->view('layouts/footer', $data);
    }


    // Method untuk update data proyek yang diedit
    public function update($id) {
        $data_proyek = array(
            'namaProyek' => $this->input->post('namaProyek'),
            'client' => $this->input->post('client'),
            'tglMulai' => $this->input->post('tglMulai'),
            'tglSelesai' => $this->input->post('tglSelesai'),
            'pimpinanProyek' => $this->input->post('pimpinanProyek'),
            'keterangan' => $this->input->post('keterangan')
        );

        $this->client->request('PUT', "proyek/{$id}", [
            'json' => $data_proyek
        ]);

        redirect('proyek');
    }

    // Method untuk menghapus data proyek
    public function delete($id) {
        $this->client->request('DELETE', "proyek/{$id}");
        redirect('proyek');
    }
}
