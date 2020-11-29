  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Profile
        <small>Profile</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Profile</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <!-- Alert -->
      <div class="flash-data" data-flashdata="<?php echo $this->session->flashdata('pesan') ?>"></div>

      <!-- Box Data -->
      <div class="box box-danger">

        <div class="box-header with-border">
          <h3 class="box-title">Edit Profile</h3>
        </div>

        <div class="box-body">
          <form action="<?php echo base_url('index.php/admin/profile/update') ?>" method="POST">
            
            <div class="form-group">
              <label>Nama Lengkap</label>
              <input type="text" name="nama" value="<?= $this->session->userdata('nama') ?>" class="form-control" placeholder="Nama Lengkap">
            </div>

            <div class="form-group">
              <label>Username</label>
              <input type="text" name="username" value="<?= $this->session->userdata('username') ?>" class="form-control" placeholder="Username">
            </div>
            
            <div class="form-group">
              <label>New Password <font color="red">*)</font></label>
              <input type="password" name="password" class="form-control" placeholder="New Password">
            </div>
            
            <div class="form-group">
              <label>Terdaftar Pada</label>
              <input type="text" name="terdaftar" value="<?= $this->session->userdata('createDate') ?>" class="form-control" placeholder="Username" readonly>
            </div>
            
            <p>
              <font color="red">*) Kosongkan jika tidak ingin diubah</font>
            </p>
            
            <div class="pull-right">
              <button type="reset" class="btn btn-danger">
                <i class="fa fa-trash"></i> Reset
              </button>
              <button type="submit" class="btn btn-primary">
                <i class="fa fa-save"></i> Update
              </button>
            </div>
          
          </form>
        </div>
        
      </div>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->