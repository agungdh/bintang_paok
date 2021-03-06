<div class="app-title">
  <div>
    <h1><i class="fa fa-book"></i> Surat</h1>
  </div>
  <ul class="app-breadcrumb breadcrumb">
    <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
    <li class="breadcrumb-item">Surat</li>
  </ul>
</div>
<div class="row">
  <div class="col-md-12">
    <div class="tile">
      <div class="tile-body">
        <div class="tile-title-w-btn">
          <h3 class="title">Data Surat</h3>
          <p><a class="btn btn-primary icon-btn" href="<?php echo base_url('surat/tambah'); ?>"><i class="fa fa-plus"></i>Surat</a></p>
        </div>
        <table class="table table-hover table-bordered datatable" >
          <thead>
            <tr>
              <th>Waktu</th>
              <th>No Surat</th>
              <th>Pengirim</th>
              <th>Perihal</th>
              <th>Berkas</th>
              <th>Proses</th>
            </tr>
          </thead>
          <tbody>
            <?php
            $query = $this->db->query('SELECT *
                              FROM surat')->result();
            foreach ($query as $item) {
              ?>
              <tr>
                <td><?php echo $this->pustaka->tanggal_waktu_indo($item->waktu); ?></td>
                <td><?php echo $item->nosurat; ?></td>
                <td><?php echo $item->pengirim; ?></td>
                <td><?php echo $item->perihal; ?></td>
                <td><a href="<?php echo base_url('download/file/' . $item->id); ?>"><?php echo $item->nama_file; ?></a></td>
                <td>
                  <div class="btn-group">
                  <a class="btn btn-primary" href="<?php echo base_url('surat/ubah/' . $item->id); ?>" data-toggle="tooltip" title="Ubah"><i class="fa fa-edit"></i></a>
                  <a class="btn btn-primary" href="#" onclick="hapus('<?php echo $item->id; ?>')" data-toggle="tooltip" title="Hapus"><i class="fa fa-trash"></i></a>
                </div>
                </td>
              </tr>
              <?php
            }
            ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>