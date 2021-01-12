<div id="wrapper">
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?= base_url();?>admin/index">
        <div class="sidebar-brand-text mx-3">Admin Perpustakaan</div>
      </a>
      <hr class="sidebar-divider my-0">
      <li class="nav-item ">
        <a class="nav-link" href="<?= base_url();?>admin/index">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Dashboard</span></a>
      </li>
      <hr class="sidebar-divider">
      <div class="sidebar-heading">
        Kelola Data
      </div>
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
        <i class="fas fa-book"></i>
          <span>Data Buku</span>
        </a>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <a class="collapse-item" href="<?= base_url();?>admin/data_kategori_buku">Kategori Buku</a>
            <a class="collapse-item" href="<?= base_url();?>admin/data_buku">Daftar Buku</a>
          </div>
          </div>
      </li>
      <hr class="sidebar-divider">
      <li class="nav-item">
        <a class="nav-link" href="<?= base_url();?>admin/data_pengunjung">
        <i class="fas fa-users"></i>
          <span>Data Pengunjung</span></a>
      </li>
      <hr class="sidebar-divider">
      <li class="nav-item">
        <a class="nav-link" href="<?= base_url();?>admin/data_supervisor">
        <i class="fas fa-user-tie"></i>
          <span>Data Supervisor</span></a>
      </li>
      <hr class="sidebar-divider">
      <li class="nav-item active">
        <a class="nav-link" href="<?= base_url();?>admin/data_admin">
        <i class="fas fa-user-tie"></i>
          <span>Data Admin</span></a>
      </li>
      <hr class="sidebar-divider d-none d-md-block">
    </ul>
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">
      <div id="content">
        <!-- Topbar -->
        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
          <!-- Sidebar Toggle (Topbar) -->
          <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
            <i class="fa fa-bars"></i>
          </button>
          <img src="<?php echo base_url('assets/admin/img/logo-bps.png')?>" width="55" height="40">Perpustakaan BPS Kota Malang
          <!-- Topbar Navbar -->
          <ul class="navbar-nav ml-auto">
            <div class="topbar-divider d-none d-sm-block"></div>
            <!-- Nav Item - User Information -->
            <li class="nav-item dropdown no-arrow">
              <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="mr-2 d-none d-lg-inline text-gray-600 small">Halo, <?= $this->session->userdata('admin');?></span>
              </a>
              <!-- Dropdown - User Information -->
              <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="<?= base_url();?>adminukm/logout" >
                  <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                  Logout
                </a>
              </div>
            </li>
          </ul>
        </nav>
        <!-- End of Topbar -->
  <!-- End of Page Wrapper -->

  <div class="container-fluid">
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Edit Data Buku Perpustakaan BPS Kota Malang</h6>
        </div>
        <div class="card-body">
            <?php if (validation_errors()): ?>
                <div class="alert alert-danger" role="alert">
                    <?php echo validation_errors(); ?>
                </div>
            <?php endif; ?>

            <form action="<?=base_url('admin/edit_data_buku/'.$buku['id_buku'])?>" method="post" enctype="multipart/form-data">
            <input type="hidden" name="id_buku" value="<?=$buku['id_buku'];?>">
                <div class="form-group">
                    <label for="judul_buku">Judul Buku</label>
                        <input type="text" class="form-control" id="judul_buku" name="judul_buku" value="<?=$buku['judul_buku'];?>">
                </div>
                <div class="form-group">
                    <label for="nomor_katalog">Nomor Katalog</label>
                        <input type="text" class="form-control" id="nomor_katalog" name="nomor_katalog" value="<?=$buku['nomor_katalog'];?>">
                </div>
                <div class="form-group">
                    <label for="id_kategori">Kategori Buku</label>
                    <select class="form-control" id="id_kategori" name="id_kategori">
                        <?php foreach($kategori as $kb) : ?>
                            <option value="<?=$kb["id_kategori"];?>"><?=$kb["nama_kategori"];?></option>
                        <?php endforeach;?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="isbn">ISBN</label>
                        <input type="text" class="form-control" id="isbn" name="isbn" value="<?=$buku['isbn'];?>">
                </div>
                <div class="form-group">
                    <label for="tahun_rilis">Tahun Rilis</label>
                        <input type="text" class="form-control" id="tahun_rilis" name="tahun_rilis" value="<?=$buku['tahun_rilis'];?>">
                </div>
                <div class="form-group">
                    <label for="jumlah_halaman">Jumlah Halaman</label>
                        <input type="text" class="form-control" id="jumlah_halaman" name="jumlah_halaman" value="<?=$buku['jumlah_halaman'];?>">
                </div>
                <div class="form-group">
                    <label for="letak">Letak</label>
                        <input type="text" class="form-control" id="letak" name="letak" value="<?=$buku['letak'];?>">
                </div>
                <div class="form-group">
                    <label for="status">Status</label>
                    <select class="form-control" id="status" name="status">
                        <?php foreach($status as $s) : ?>
                            <option value="<?=($s)?>" selected><?=($s)?></option>
                        <?php endforeach;?>
                    </select>
                </div>  
                <div class="form-group">
                    <label for="cover">Upload Cover Buku</label>
                    <input type="file" class="form-control" id="cover" name="cover">
                    <p>Format .jpg, .png Max Size : 500KB</p>
                </div>
                <button type="submit" name="submit" class="btn btn-primary float-right">Submit</button>
            </form>
        </div>
    </div>
</div>      