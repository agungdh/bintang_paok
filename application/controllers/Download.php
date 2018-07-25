<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use Apfelbox\FileDownload\FileDownload;
class Download extends CI_Controller {
	function __construct(){
		parent::__construct();

		$this->pustaka->auth($this->session->level, [1, 2, 3, 4, 5]);
	}

	function file($id) {
		$surat = $this->db->get_where('surat', ['id' => $id])->row();

		if ($surat->waktu_baca == null && $this->session->level == 2) {
			$this->db->update('surat', ['waktu_baca' => date('Y-m-d H:i:s')], ['id' => $id]);
		}

		$fileDownload = FileDownload::createFromFilePath('uploads/surat/' . $surat->id);
		$fileDownload->sendDownload($surat->nama_file);
	}

}