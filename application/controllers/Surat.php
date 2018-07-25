<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Surat extends CI_Controller {
	function __construct(){
		parent::__construct();

		if ($this->session->login != true) {
			redirect(base_url());
		}
	}

	function index() {
		$data['isi'] = 'surat/index';
		$data['js'] = 'surat/index_js';

		$this->load->view('template/template', $data);
	}

	function tambah() {
		$data['isi'] = 'surat/tambah';
		$data['js'] = 'surat/tambah_js';

		$this->load->view('template/template', $data);
	}

	function ubah($id) {
		$data['isi'] = 'surat/ubah';
		$data['js'] = 'surat/ubah_js';
		$data['data']['surat'] = $this->db->get_where('surat', ['id' => $id])->row();

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

		$berkas = $_FILES['berkas'];

		$data['nama_file'] = $berkas['name'];
		$data['waktu'] = date('Y-m-d H:i:s');
		$data['bidang_id'] = 1;
		$data['selesai'] = 't';

		$this->db->insert('surat', $data);

		move_uploaded_file($berkas['tmp_name'], 'uploads/surat/' . $this->db->insert_id());

		redirect(base_url('surat'));
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

		$berkas = $_FILES['berkas'];

		if ($berkas['size'] != 0) {
			$data['nama_file'] = $berkas['name'];

			move_uploaded_file($berkas['tmp_name'], 'uploads/surat/' . $where['id']);			
		}


		$this->db->update('surat', $data, $where);

		redirect(base_url('surat'));
	}

	function aksi_hapus($id) {
		$this->db->delete('surat', ['id' => $id]);

		unlink('uploads/surat/' . $id);

		redirect(base_url('surat'));
	}

}