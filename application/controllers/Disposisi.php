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

}