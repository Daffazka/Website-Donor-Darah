<!DOCTYPE html>
<html>
<?= $this->include('pages/css'); ?>
<style type="text/css"></style>
<body class="hold-transition skin-red sidebar-mini">
<div class="wrapper">

  <?= $this->include('pages/header'); ?>
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
        <img src="<?= base_url('assets/images/user.png'); ?>" alt="user"/>
        </div>
        <div class="pull-left info">
          <p><?= session()->get('username'); ?></p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li>
          <a href="<?= site_url('/home/index_admin') ?>">
            <i class="fa fa-group"></i> <span>Home</span>
          </a>
        </li>
        <li class="active">
          <a href="<?= site_url('/home/stokdarah_admin') ?>">
            <i class="fa fa-odnoklassniki"></i> <span>Stok Darah</span>
          </a>
        </li>
        <li>
           <a href="<?= site_url('/home/datapendonor_admin') ?>">
            <i class="fa fa-desktop"></i> <span>Data Pendonor</span>
          </a>
        </li>
        <li>
           <a href="<?= site_url('/home/datatranfusi_admin') ?>">
            <i class="fa fa-desktop"></i> <span>Data Tranfusi</span>
          </a>
        </li>
        <li>
           <a href="<?= site_url('/home/logout') ?>">
            <i class="fa fa-sign-out"></i> <span>Logout</span>
          </a>
        </li>
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside> 

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <ol class="breadcrumb">
        <li><a href="<?= site_url('/home/edit_datapendonor') ?>">Form Data Pendonor</a></li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
    <div class="box box-primary" style="margin-top:30px;">
      <!-- form start -->
      <?php foreach($content->getResultArray() as $key):?>
      <form action="<?= site_url('/home/proses_edit_datapendonor') ?>" method="post" role="form">
        <div class="box-body">
          <br><br>
          <div class="form-group">
            <label for="tgl_donor">Tanggal Donor</label>
            <input type="date" class="form-control" id="tgl_donor" name="tgl_donor" value="<?= $key['tgl_donor'] ?>">
          </div>
          <div class="form-group">
            <label>Golongan Darah</label>
            <select class="form-control" style="width: 100%;" name="golongandarah">
              <option>-- Pilih Golongan Darah --</option>
              <option <?= $key['golongandarah'] == 'A' ? 'selected' : '' ?>>A</option>
              <option <?= $key['golongandarah'] == 'B' ? 'selected' : '' ?>>B</option>
              <option <?= $key['golongandarah'] == 'O' ? 'selected' : '' ?>>O</option>
              <option <?= $key['golongandarah'] == 'AB' ? 'selected' : '' ?>>AB</option>
            </select>
          </div>
          <div class="form-group">
            <label for="nama_pendonor">Nama Pendonor</label>
            <input type="text" class="form-control" id="nama_pendonor" placeholder="Masukkan Nama Pendonor" name="nama_pendonor" value="<?= $key['nama_pendonor'] ?>">
          </div>
          <?php endforeach ?>
        </div>
        <!-- /.box-body -->
        <div class="box-footer" >
          <input type="submit" class="btn btn-primary" style="float: right;" name="submit" value="Ubah"></input>
        </div>
      </form>
    </div>
    <!-- /.box -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.control-sidebar -->
  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->

<!-- Scripts -->
<script src="<?= base_url('assets/bower_components/jquery/dist/jquery.min.js'); ?>"></script>
<script src="<?= base_url('assets/bower_components/jquery-ui/jquery-ui.min.js'); ?>"></script>
<script>
  $.widget.bridge('uibutton', $.ui.button);
</script>
<script src="<?= base_url('assets/bower_components/bootstrap/dist/js/bootstrap.min.js'); ?>"></script>
<!-- Other scripts -->
<script>
function deleteConfrim(url) {
    $('#btn-delete').attr('href', url);
    $('#deleteModal').modal();
}
$(function () {
    $('#example1').DataTable({
      'paging': true,
      'lengthChange': true,
      'searching': true,
      'ordering': false,
      'info': true,
      'autoWidth': false
    });
});
</script>
</body>
</html>
