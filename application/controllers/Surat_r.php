<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Surat_r extends CI_Controller {
	function __construct(){
		parent::__construct();

		$this->pustaka->auth($this->session->level, [2, 3, 4]);
	}

	function index() {
		$data['isi'] = 'surat_r/index';
		$data['js'] = 'surat_r/index_js';

		$this->load->view('template/template', $data);
	}

	function proses($id) {
		$surat = $this->db->get_where('surat', ['id' => $id])->row();

		if ($surat->waktu_baca == null && $this->session->level == 2) {
			$this->db->update('surat', ['waktu_baca' => date('Y-m-d H:i:s')], ['id' => $id]);
		}

		$this->db->insert('proses', ['waktu_proses' => date('Y-m-d H:i:s')]);

		$this->db->update('surat', ['proses_id' => $this->db->insert_id()], ['id' => $id]);

		redirect(base_url('surat_r'));
	}

	function selesaiproses($id) {
		$this->db->update('proses', ['waktu_selesai' => date('Y-m-d H:i:s')], ['id' => $id]);

		redirect(base_url('surat_r'));
	}

	function disposisi() {
		$surat = $this->db->get_where('surat', ['id' => $this->input->post('surat_id')])->row();

		if ($surat->waktu_baca == null && $this->session->level == 2) {
			$this->db->update('surat', ['waktu_baca' => date('Y-m-d H:i:s')], ['id' => $this->input->post('id')]);
		}

		if ($this->input->post('bidang_id') != null) {
			$datainsert = ['surat_id' => $this->input->post('surat_id'),
										'waktu_disposisi' => date('Y-m-d H:i:s'),
										'bidang_id' => $this->input->post('bidang_id'),
										'isi' => $this->input->post('isi')];
		} else {
			$datainsert = ['surat_id' => $this->input->post('surat_id'),
										'waktu_disposisi' => date('Y-m-d H:i:s'),
										'isi' => $this->input->post('isi')];
		}

		$this->db->insert('disposisi', $datainsert);

		$this->db->update('surat', ['disposisi_id' => $this->db->insert_id()], ['id' => $surat->id]);

		redirect(base_url('surat_r'));
	}

	function ajax() {
		if ($this->session->level == 2) {
			$this->ajax_kadis();
		} elseif ($this->session->level == 3) {
			$this->ajax_sekertaris();
		} else {
			$this->ajax_kb();
		}
	}

	function ajax_disposisi($id) {
		$surat = $this->db->get_where('surat', ['id' => $id])->row();

		$data[0] = $surat->nosurat;
		$data[1] = $surat->pengirim;
		$data[2] = $surat->perihal;
		$data[3] = $surat->id;

		echo json_encode($data);
	}

	function ajax_kadis() {
	    foreach ($this->db->get_where('surat', ['disposisi_id' => null, 'proses_id' => null])->result() as $item) {
	      ?>
	      <tr>
	        <td><?php echo $this->pustaka->tanggal_waktu_indo($item->waktu_terima); ?></td>
	        <td><?php echo $item->nosurat; ?></td>
	        <td><?php echo $item->pengirim; ?></td>
	        <td><?php echo $item->perihal; ?></td>
	        <td><a href="<?php echo base_url('download/file/' . $item->id); ?>"><?php echo $item->nama_file; ?></a></td>
	        <td>Pesan Masuk</td>
	        <td>
	          <div class="btn-group">
	          <a class="btn btn-primary" href="#" onclick="disposisi('<?php echo $item->id; ?>')" data-toggle="tooltip" title="Disposisi"><i class="fa fa-share"></i></a>
	          <a class="btn btn-primary" href="#" onclick="proses('<?php echo $item->id; ?>')" data-toggle="tooltip" title="Proses"><i class="fa fa-cog"></i></a>
	        </div>
	        </td>
	      </tr>
	      <?php
	    }
	    $this->db->where('proses_id is NOT NULL', NULL, FALSE);
	    $this->db->where('disposisi_id', NULL);
	    foreach ($this->db->get('surat')->result() as $item) {
	    	if ($this->db->get_where('proses', ['id' => $item->proses_id])->row()->waktu_selesai == null) {
		      ?>
		      <tr>
		        <td><?php echo $item->waktu_terima; ?></td>
		        <td><?php echo $item->nosurat; ?></td>
		        <td><?php echo $item->pengirim; ?></td>
		        <td><?php echo $item->perihal; ?></td>
		        <td><a href="<?php echo base_url('download/file/' . $item->id); ?>"><?php echo $item->nama_file; ?></a></td>
		        <td>Pesan Diproses</td>
		        <td>
		          <div class="btn-group">
		          <a class="btn btn-primary" href="<?php echo base_url('surat_r/disposisi/' . $item->id); ?>" data-toggle="tooltip" title="Disposisi"><i class="fa fa-share"></i></a>
		          <a class="btn btn-primary" href="#" onclick="selesaiproses('<?php echo $item->proses_id; ?>')" data-toggle="tooltip" title="Proses"><i class="fa fa-check"></i></a>
		        </div>
		        </td>
		      </tr>
		      <?php
	    	}
	    }
	}

	function ajax_sekertaris() {
	    $query = $this->db->query('SELECT *
	                              FROM surat
	                              WHERE id NOT IN (SELECT surat_id
	                                               FROM disposisi)
	                              AND id NOT IN (SELECT surat_id
	                                               FROM proses)')->result();
	    foreach ($query as $item) {
	      ?>
	      <tr>
	        <td><?php echo $item->waktu_terima; ?></td>
	        <td><?php echo $item->nosurat; ?></td>
	        <td><?php echo $item->pengirim; ?></td>
	        <td><?php echo $item->perihal; ?></td>
	        <td><a href="<?php echo base_url('download/file/' . $item->id); ?>"><?php echo $item->nama_file; ?></a></td>
	        <td>
	          <div class="btn-group">
	          <a class="btn btn-primary" href="<?php echo base_url('surat_r/disposisi/' . $item->id); ?>" data-toggle="tooltip" title="Disposisi"><i class="fa fa-share"></i></a>
	          <a class="btn btn-primary" href="<?php echo base_url('surat_r/proses/' . $item->id); ?>" data-toggle="tooltip" title="Proses"><i class="fa fa-cog"></i></a>
	        </div>
	        </td>
	      </tr>
	      <?php
	    }
	}

	function ajax_kb() {
	    $query = $this->db->query('SELECT *
	                              FROM surat
	                              WHERE id NOT IN (SELECT surat_id
	                                               FROM disposisi)
	                              AND id NOT IN (SELECT surat_id
	                                               FROM proses)')->result();
	    foreach ($query as $item) {
	      ?>
	      <tr>
	        <td><?php echo $item->waktu_terima; ?></td>
	        <td><?php echo $item->nosurat; ?></td>
	        <td><?php echo $item->pengirim; ?></td>
	        <td><?php echo $item->perihal; ?></td>
	        <td><a href="<?php echo base_url('download/file/' . $item->id); ?>"><?php echo $item->nama_file; ?></a></td>
	        <td>
	          <div class="btn-group">
	          <a class="btn btn-primary" href="<?php echo base_url('surat_r/disposisi/' . $item->id); ?>" data-toggle="tooltip" title="Disposisi"><i class="fa fa-share"></i></a>
	          <a class="btn btn-primary" href="<?php echo base_url('surat_r/proses/' . $item->id); ?>" data-toggle="tooltip" title="Proses"><i class="fa fa-cog"></i></a>
	        </div>
	        </td>
	      </tr>
	      <?php
	    }
	}

}