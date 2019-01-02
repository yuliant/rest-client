<div class="container">
  <div class="row mt-3">
    <div class="col-md-6">

      <div class="card">
        <div class="card-header">
          Form Tambah Data Mahasiswa
        </div>
        <div class="card-body">
          <!-- <?php //if(validation_errors()): ?>
          <div class="alert alert-danger" role="alert">
            <?php //echo validation_errors(); ?>
          </div>
          <?php //endif ?> -->

          <form class="" action="" method="post">
            <div class="form-group">
              <label for="nama">Nama</label>
              <input type="text" class="form-control" id="nama" name="nama">
              <small class="form-text text-danger"><?php echo form_error('nama'); ?></small>
            </div>
            <div class="form-group">
              <label for="nim">NIM</label>
              <input type="text" class="form-control" id="nim" name="nim">
              <small class="form-text text-danger"><?php echo form_error('nim'); ?></small>
            </div>
            <div class="form-group">
              <label for="email">Email</label>
              <input type="text" class="form-control" id="email" name="email">
              <small class="form-text text-danger"><?php echo form_error('email'); ?></small>
            </div>
            <div class="form-group">
              <label for="jurusan">Jurusan</label>
              <select class="form-control" id="jurusan" name="jurusan">
                <option value="Informatika">Informatika</option>
                <option value="Teknik Industri">Teknik Industri</option>
                <option value="Teknik Elektro">Teknik Elektro</option>
                <option value="Teknik Mesin">Teknik Mesin</option>
              </select>
            </div>
            <button class="btn btn-primary float-right" type="submit" name="tambah" >Tambah Data</button>
          </form>

        </div>
      </div>

    </div>
  </div>
</div>
