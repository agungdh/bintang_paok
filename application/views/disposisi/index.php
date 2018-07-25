<div class="app-title">
  <div>
    <h1><i class="fa fa-book"></i> Disposisi Surat</h1>
  </div>
  <ul class="app-breadcrumb breadcrumb">
    <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
    <li class="breadcrumb-item">Disposisi Surat</li>
  </ul>
</div>
<div class="row">
  <div class="col-md-12">
    <div class="tile">
      <div class="tile-body">
        <div class="tile-title-w-btn">
          <h3 class="title">Data Disposisi Surat</h3>
        </div>
        <table class="table table-hover table-bordered datatable" >
          <thead>
            <tr>
              <th>Waktu</th>
              <th>No Surat</th>
              <th>Pengirim</th>
              <th>Perihal</th>
              <th>Berkas</th>
              <th>Keterangan</th>
              <th>Proses</th>
            </tr>
          </thead>
          <tbody>
            <?php
            $query = $this->db->query('SELECT *, d.id disposisi_id
                                        FROM disposisi d, surat s
                                        WHERE d.surat_id = s.id
                                        AND s.selesai = ?
                                        AND d.bidang_id = ?
                                        ORDER BY d.id DESC
                                        LIMIT 1', ['t', $this->session->bidang_id])->result();
            foreach ($query as $item) {
              if ($this->db->get_where('proses', ['surat_id' => $item->id])->row() != null) {
                
              } else {

              }
             
             ?>
              <tr>
                <td><?php echo $this->pustaka->tanggal_waktu_indo($item->waktu); ?></td>
                <td><?php echo $item->nosurat; ?></td>
                <td><?php echo $item->pengirim; ?></td>
                <td><?php echo $item->perihal; ?></td>
                <td><a href="<?php echo base_url('download/file/' . $item->id); ?>"><?php echo $item->nama_file; ?></a></td>
                <td><?php echo $item->keterangan; ?></td>
                <td>
                  <div class="btn-group">
                  <a class="btn btn-primary" href="<?php echo base_url('disposisi/disposisi/' . $item->id); ?>" data-toggle="tooltip" title="Disposisi"><i class="fa fa-share"></i></a>
                  <a class="btn btn-primary" href="#" onclick="proses('<?php echo $item->id; ?>')" data-toggle="tooltip" title="Proses"><i class="fa fa-cog"></i></a>
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