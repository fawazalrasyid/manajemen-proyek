<?php

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

    public function create() {
        $data['title'] = 'Tambah Proyek';
        $this->load->view('layouts/header', $data);
        $this->load->view('layouts/sidebar', $data);
        $this->load->view('proyek_create');
        $this->load->view('layouts/footer');
    }

    public function store() {
        $data_proyek = array(
            'namaProyek' => $this->input->post('namaProyek'),
            'client' => $this->input->post('client'),
            'tglMulai' => $this->input->post('tglMulai'),
            'tglSelesai' => $this->input->post('tglSelesai'),
            'pimpinanProyek' => $this->input->post('pimpinanProyek'),
            'keterangan' => $this->input->post('keterangan'),
            'lokasiId' => $this->input->post('lokasiId')
        );

        // Kirim data ke API Proyek
        $this->client->request('POST', 'proyek', [
            'json' => $data_proyek
        ]);

        redirect('proyek');
    }

    public function edit($id) {
        $data['title'] = 'Edit Proyek';

        // Panggil API untuk mendapatkan data Proyek
        $responseProyek = $this->client->request('GET', "proyek/{$id}");
        $data['proyek'] = json_decode($responseProyek->getBody()->getContents());

        $this->load->view('layouts/header', $data);
        $this->load->view('layouts/sidebar', $data);
        $this->load->view('proyek_edit', $data);
        $this->load->view('layouts/footer');
    }

    public function update($id) {
        $data_proyek = array(
            'namaProyek' => $this->input->post('namaProyek'),
            'client' => $this->input->post('client'),
            'tglMulai' => $this->input->post('tglMulai'),
            'tglSelesai' => $this->input->post('tglSelesai'),
            'pimpinanProyek' => $this->input->post('pimpinanProyek'),
            'keterangan' => $this->input->post('keterangan'),
            'lokasiId' => $this->input->post('lokasiId')
        );

        // Update data di API Proyek
        $this->client->request('PUT', "proyek/{$id}", [
            'json' => $data_proyek
        ]);

        redirect('proyek');
    }

    public function delete($id) {
        // Hapus data di API Proyek
        $this->client->request('DELETE', "proyek/{$id}");

        redirect('proyek');
    }
}
