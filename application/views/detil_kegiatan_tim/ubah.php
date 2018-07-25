<?php
$now = date('YmdHis');
?>
<div class="app-title">
  <div>
    <h1><i class="fa fa-edit"></i> Detil Kegiatan</h1>
  </div>
  <ul class="app-breadcrumb breadcrumb">
    <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
    <li class="breadcrumb-item" style="cursor: pointer;" onclick="window.location = '<?php echo base_url('kegiatan'); ?>'" data-toggle="tooltip" title="<?php echo $data['kegiatan']->kegiatan; ?>">Kegiatan</li>
    <li class="breadcrumb-item">Detil Kegiatan</li>
  </ul>
</div>
<div class="row">
  <div class="col-md-12">
    <div class="tile">
      <h3 class="tile-title">Ubah Detil Kegiatan</h3>
      <div class="tile-body">
        <form method="post" action="<?php echo base_url('detil_kegiatan_tim/aksi_ubah'); ?>" enctype="multipart/form-data">
          
          <input type="hidden" name="where[id]" value="<?php echo $data['detil_kegiatan_tim']->id; ?>">
          <input type="hidden" name="data[kegiatan_id]" value="<?php echo $data['kegiatan']->id; ?>">

          <div class="form-group">
            <label class="control-label">Tim</label>
            <input class="form-control" type="text" placeholder="Masukan Tim" name="data[tim]" value="<?php echo $data['detil_kegiatan_tim']->tim; ?>">
          </div>

          <div class="form-group">
            <label class="control-label">Foto Kegiatan</label>
            <br>
            <?php
            if (file_exists('uploads/kegiatan/tim/' . $data['detil_kegiatan_tim']->id)) {
              $foto = 'uploads/kegiatan/tim/' . $data['detil_kegiatan_tim']->id;
            } else {
              $foto = 'assets/th.jpeg';
            }
            ?>
            <td><img height="150px" width="200px" src="<?php echo base_url($foto . '?time=' . $now); ?>"></td>
            <input class="form-control" type="file" name="foto_kegiatan">
          </div>

          <div class="form-group">
            <label class="control-label">Prestasi</label>
            <input class="form-control" type="text" placeholder="Masukan Prestasi" name="data[prestasi]" value="<?php echo $data['detil_kegiatan_tim']->prestasi; ?>">
          </div>

          <div class="form-group">
            <label class="control-label">Foto Prestasi</label>
            <br>
            <?php
            if (file_exists('uploads/prestasi/tim/' . $data['detil_kegiatan_tim']->id)) {
              $foto = 'uploads/prestasi/tim/' . $data['detil_kegiatan_tim']->id;
            } else {
              $foto = 'assets/th.jpeg';
            }
            ?>
            <td><img height="150px" width="200px" src="<?php echo base_url($foto . '?time=' . $now); ?>"></td>
            <input class="form-control" type="file" name="foto_prestasi">
          </div>

          </div>
          <div class="tile-footer">
            <button id="simpan" class="btn btn-primary" type="button"><i class="fa fa-fw fa-lg fa-check-circle"></i>Simpan</button>
            &nbsp;&nbsp;&nbsp;
            <a class="btn btn-secondary" href="<?php echo base_url('detil_kegiatan_tim/index/' . $data['kegiatan']->id); ?>"><i class="fa fa-fw fa-lg fa-times-circle"></i>Batal</a> <input type="submit" style="visibility: hidden;">
          </div>
        </form>
    </div>
  </div>
</div>