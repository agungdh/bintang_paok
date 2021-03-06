<div class="app-title">
  <div>
    <h1><i class="fa fa-book"></i> Bidang</h1>
  </div>
  <ul class="app-breadcrumb breadcrumb">
    <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
    <li class="breadcrumb-item">Bidang</li>
  </ul>
</div>
<div class="row">
  <div class="col-md-12">
    <div class="tile">
      <div class="tile-body">
        <div class="tile-title-w-btn">
          <h3 class="title">Data Bidang</h3>
          <p><a class="btn btn-primary icon-btn" href="<?php echo base_url('bidang/tambah'); ?>"><i class="fa fa-plus"></i>Bidang</a></p>
        </div>
        <table class="table table-hover table-bordered datatable" >
          <thead>
            <tr>
              <th>Bidang</th>
              <th>Proses</th>
            </tr>
          </thead>
          <tbody>
            <?php
            $query = $this->db->query('SELECT *
                              FROM bidang')->result();
            foreach ($query as $item) {
              ?>
              <tr>
                <td><?php echo $item->bidang; ?></td>
                <td>
                  <div class="btn-group">
                  <a class="btn btn-primary" href="<?php echo base_url('bidang/ubah/' . $item->id); ?>" data-toggle="tooltip" title="Ubah"><i class="fa fa-edit"></i></a>
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