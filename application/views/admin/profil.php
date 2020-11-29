  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Profil
        <small>Profil</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Profil</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="flash-data" data-flashdata="<?php echo $this->session->flashdata('pesan') ?>"></div>


      <div class="box box-danger" style="margin-top: 15px">
        <div class="box-body">
          <form action="<?php echo base_url('index.php/admin/profil/update') ?>" method="POST">
            <div class="form-group">
              <h3>Edit Profil</h3>
            </div>
            <hr>
            <div class="form-group">
              <label>Nama Lengkap</label>
              <input type="text" name="nama" value="<?= $this->session->userdata('nama') ?>" class="form-control" placeholder="Nama Lengkap">
            </div>
            <div class="form-group">
              <label>Username</label>
              <input type="text" name="username" value="<?= $this->session->userdata('username') ?>" class="form-control" placeholder="Username">
            </div>
            <div class="form-group">
              <label>New Password</label>
              <input type="password" name="password" class="form-control" placeholder="Password">
            </div>
            <div class="form-group">
              <label>Terdaftar Pada</label>
              <input type="text" name="terdaftar" value="<?= $this->session->userdata('createDate') ?>" class="form-control" placeholder="Username" readonly>
            </div>
            <div class="form-group">
              <font color="red">*) Kosongkan jika tidak ingin diubah</font>
            </div>
            <button type="submit" class="btn btn-primary btn-sm"><i class="fa fa-save"></i> Simpan</button>
          </form>
        </div>
      </div>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->