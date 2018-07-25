<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Disposisi extends CI_Controller {
	function __construct(){
		parent::__construct();

		if ($this->session->login != true) {
			redirect(base_url());
		}
	}

	function index() {
		$data['isi'] = 'disposisi/index';
		$data['js'] = 'disposisi/index_js';

		$this->load->view('template/template', $data);
	}

	function proses($surat_id) {
		$this->db->insert('proses', ['surat_id' => $surat_id, 'waktu' => date('Y-m-d H:i:s'), 'bidang_id' => $this->session->bidang_id]);

		$this->db->update('surat', ['bidang_id' => $this->session->bidang_id], ['id' => $surat_id]);

		redirect(base_url('proses'));
	}

}