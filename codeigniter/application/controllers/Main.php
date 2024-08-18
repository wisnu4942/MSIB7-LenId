<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Main extends CI_Controller {

    public function index() {
        // Mendapatkan data proyek dan lokasi dari REST API
        $data['lokasi'] = $this->get_api_data('http://localhost:8080/lokasi');
        $data['proyek'] = $this->get_api_data('http://localhost:8080/proyek');

        // Menampilkan data di view
        $this->load->view('main', $data);
    }

    private function get_api_data($url) {
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_URL, $url);
        $result = curl_exec($curl);
        curl_close($curl);
        return json_decode($result, true);
    }

    public function create_lokasi() {
        $this->load->view('form_lokasi');
    }
    
    public function create_proyek() {
        $data['lokasi'] = $this->get_api_data('http://localhost:8080/lokasi');
        $this->load->view('form_proyek', $data);
    }
    
    public function store_lokasi() {
        $data = array(
            'nama_lokasi' => $this->input->post('nama_lokasi'),
            'negara' => $this->input->post('negara'),
            'provinsi' => $this->input->post('provinsi'),
            'kota' => $this->input->post('kota')
        );
        $this->post_api_data('http://localhost:8080/lokasi', $data);
        redirect('/');
    }
    
    public function store_proyek() {
        $data = array(
            'nama_proyek' => $this->input->post('nama_proyek'),
            'client' => $this->input->post('client'),
            'tgl_mulai' => $this->input->post('tgl_mulai'),
            'tgl_selesai' => $this->input->post('tgl_selesai'),
            'pimpinan_proyek' => $this->input->post('pimpinan_proyek'),
            'keterangan' => $this->input->post('keterangan'),
            'lokasi_id' => $this->input->post('lokasi_id')
        );
        $this->post_api_data('http://localhost:8080/proyek', $data);
        redirect('/');
    }
    
    private function post_api_data($url, $data) {
        $curl = curl_init($url);
        curl_setopt($curl, CURLOPT_POST, true);
        curl_setopt($curl, CURLOPT_POSTFIELDS, json_encode($data));
        curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type:application/json'));
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        $result = curl_exec($curl);
        curl_close($curl);
        return json_decode($result, true);
    }
    
    // Edit
    public function edit_lokasi($id) {
        $data['lokasi'] = $this->get_api_data('http://localhost:8080/lokasi/'.$id);
        $this->load->view('edit_lokasi', $data);
    }
    
    public function update_lokasi($id) {
        $data = array(
            'nama_lokasi' => $this->input->post('nama_lokasi'),
            'negara' => $this->input->post('negara'),
            'provinsi' => $this->input->post('provinsi'),
            'kota' => $this->input->post('kota')
        );
        $this->put_api_data('http://localhost:8080/lokasi/'.$id, $data);
        redirect('/');
    }
    
    public function delete_lokasi($id) {
        $this->delete_api_data('http://localhost:8080/lokasi/'.$id);
        redirect('/');
    }
    
    private function put_api_data($url, $data) {
        $curl = curl_init($url);
        curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "PUT");
        curl_setopt($curl, CURLOPT_POSTFIELDS, json_encode($data));
        curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type:application/json'));
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        $result = curl_exec($curl);
        curl_close($curl);
        return json_decode($result, true);
    }
    
    private function delete_api_data($url) {
        $curl = curl_init($url);
        curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "DELETE");
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        $result = curl_exec($curl);
        curl_close($curl);
        return json_decode($result, true);
    }
    
}
