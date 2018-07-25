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
        </div>
        <table class="table table-hover table-bordered datatable" >
          <thead>
            <tr>
              <th>Waktu</th>
              <th>No Surat</th>
              <th>Pengirim</th>
              <th>Perihal</th>
              <th>Surat</th>
              <th>Status</th>
              <th>Proses</th>
            </tr>
          </thead>
          <tbody>
          </tbody>
        </table>
      </div>
    </div>
  </div>

  <!-- Modal -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Disposisi</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <label class="control-label">No Surat = <teks id="nosurat"></teks></label><br>
        <label class="control-label">Pengirim = <teks id="pengirim"></teks></label><br>
        <label class="control-label">Perihal = <teks id="perihal"></teks></label>
        
        <form action="<?php echo base_url('surat_r/disposisi'); ?>" method="post">

        <input type="hidden" name="surat_id" id="surat_id">

        <div class="form-group">
          <label class="control-label">Bidang</label>
          <select class="form-control select2" name="bidang_id">
            <option value="">Sekertaris</option>
            <?php
            foreach ($this->db->get('bidang')->result() as $item) {
              ?>
              <option value="<?php echo $item->id; ?>"><?php echo $item->bidang; ?></option>
              <?php
            }
            ?>
          </select>
        </div>

        <div class="form-group">
          <label class="control-label">Keterangan</label>
          <input class="form-control" type="text" required placeholder="Masukan Keterangan" name="isi">
        </div>

        </form>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
        <button type="button" class="btn btn-primary" onclick="submitdisposisi()">Disposisi</button>
      </div>
    </div>
  </div>
</div>