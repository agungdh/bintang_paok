<div class="app-title">
  <div>
    <h1><i class="fa fa-edit"></i> User</h1>
  </div>
  <ul class="app-breadcrumb breadcrumb">
    <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
    <li class="breadcrumb-item">User</li>
  </ul>
</div>
<div class="row">
  <div class="col-md-12">
    <div class="tile">
      <h3 class="tile-title">Ubah User</h3>
      <div class="tile-body">
        <form method="post" action="<?php echo base_url('user/aksi_ubah'); ?>" id="fu">
          
          <input type="hidden" name="where[id]" value="<?php echo $data['user']->id; ?>">

          <div class="form-group">
            <label class="control-label">Username</label>
            <input class="form-control" type="text" required placeholder="Masukan Username" name="data[username]" value="<?php echo $data['user']->username; ?>">
          </div>

          <div class="form-group">
            <label class="control-label">Nama</label>
            <input class="form-control" type="text" required placeholder="Masukan Nama" name="data[nama]" value="<?php echo $data['user']->nama; ?>">
          </div>

          <div class="form-group">
            <label class="control-label">Level</label>
            <select class="form-control select2" name="data[level]">
              <option <?php echo $data['user']->level == 'a' ? 'selected' : null; ?> value="a">Administrator</option>
              <option <?php echo $data['user']->level == 'kd' ? 'selected' : null; ?> value="kd">Kepala Dinas</option>
              <option <?php echo $data['user']->level == 's' ? 'selected' : null; ?> value="s">Sekertaris</option>
              <option <?php echo $data['user']->level == 'kb' ? 'selected' : null; ?> value="kb">Kepala Bidang</option>
              <option <?php echo $data['user']->level == 'o' ? 'selected' : null; ?> value="o">Operator</option>
            </select>
          </div>

          <div class="form-group">
            <label class="control-label">Bidang</label>
            <select class="form-control select2" name="data[bidang_id]">
              <?php
              foreach ($this->db->get('bidang')->result() as $item) {
                if ($item->id == $data['user']->bidang_id) {
                  ?>
                  <option selected value="<?php echo $item->id; ?>"><?php echo $item->bidang; ?></option>
                  <?php
                } else {
                  ?>
                  <option value="<?php echo $item->id; ?>"><?php echo $item->bidang; ?></option>
                  <?php
                }
              }
              ?>
            </select>
          </div>

          </div>
          <div class="tile-footer">
            <button id="simpanu" class="btn btn-primary" type="button"><i class="fa fa-fw fa-lg fa-check-circle"></i>Simpan</button>
            &nbsp;&nbsp;&nbsp;
            <a class="btn btn-secondary" href="<?php echo base_url('user'); ?>"><i class="fa fa-fw fa-lg fa-times-circle"></i>Batal</a> <input type="submit" style="visibility: hidden;">
          </div>
        </form>
    </div>
  </div>

  <div class="col-md-12">
    <div class="tile">
      <h3 class="tile-title">Ubah Password</h3>
      <div class="tile-body">
        <form method="post" action="<?php echo base_url('user/aksi_ubah_password'); ?>" id="form_ubah_password">
          
          <input type="hidden" name="where[id]" value="<?php echo $data['user']->id; ?>">

          <div class="form-group">
            <label class="control-label">Password</label>
            <input class="form-control" type="password" required placeholder="Masukan Password" name="data[password]" id="pw1">
          </div>

          <div class="form-group">
            <label class="control-label">Password Lagi</label>
            <input class="form-control" type="password" required placeholder="Masukan Password Lagi" id="pw2">
          </div>

          </div>
          <div class="tile-footer">
            <button id="simpanp" class="btn btn-primary" type="button"><i class="fa fa-fw fa-lg fa-check-circle"></i>Simpan</button>
            &nbsp;&nbsp;&nbsp;
            <a class="btn btn-secondary" href="<?php echo base_url('user'); ?>"><i class="fa fa-fw fa-lg fa-times-circle"></i>Batal</a> <input type="submit" style="visibility: hidden;">
          </div>
        </form>
    </div>
  </div>
</div>