<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Surat_crud extends CI_Controller {
	function __construct(){
		parent::__construct();

		$this->pustaka->auth($this->session->level, [1, 5]);
	}

	function index() {
		$data['isi'] = 'surat_crud/index';
		$data['js'] = 'surat_crud/index_js';

		$this->load->view('template/template', $data);
	}

	function tambah() {
		$data['isi'] = 'surat_crud/tambah';
		$data['js'] = 'surat_crud/tambah_js';

		$this->load->view('template/template', $data);
	}

	function ubah($id) {
		$data['isi'] = 'surat_crud/ubah';
		$data['js'] = 'surat_crud/ubah_js';
		$data['data']['surat_crud'] = $this->db->get_where('surat', ['id' => $id])->row();

		$this->load->view('template/template', $data);
	}

	function aksi_tambah() {
		foreach ($this->input->post('data') as $key => $value) {
			switch ($key) {				
				default:
					$data[$key] = $value;
					break;
			}
		}

		$data['waktu_terima'] = date('Y-m-d H:i:s');

		$surat = $_FILES['surat'];
		
		$data['nama_file'] = $surat['name'];

		$this->db->insert('surat', $data);

		move_uploaded_file($surat['tmp_name'], 'uploads/surat/' . $this->db->insert_id());

		redirect(base_url('surat_crud'));
	}

	function aksi_ubah() {
		foreach ($this->input->post('data') as $key => $value) {
			switch ($key) {				
				default:
					$data[$key] = $value;
					break;
			}
		}

		foreach ($this->input->post('where') as $key => $value) {
			$where[$key] = $value;
		}

		$surat = $_FILES['surat'];
		
		$data['nama_file'] = $surat['name'];

		move_uploaded_file($surat['tmp_name'], 'uploads/surat/' . $where['id']);

		$this->db->update('surat', $data, $where);

		redirect(base_url('surat_crud'));
	}

	function aksi_hapus($id) {
		$this->db->delete('surat', ['id' => $id]);

		unlink('uploads/surat/' . $id);

		redirect(base_url('surat_crud'));
	}

}