<!DOCTYPE html>
<html>
<?php $this->load->view('pages/css'); ?>
<style type="text/css"></style>
<body class="hold-transition skin-red sidebar-mini">
<div class="wrapper">

  <?php $this->load->view('pages/header'); ?>
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
        <img src="<?php echo base_url(); ?>assets/images/user.png" alt="user"/>
        </div>
        <div class="pull-left info">
          <p><?php echo $this->session->userdata('username');?></p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li>
          <a href="<?= base_url()?>/home/index_admin">
            <i class="fa fa-group"></i> <span>Home</span>
          </a>
        </li>
        <li>
          <a href="<?= base_url()?>/home/stokdarah_admin">
            <i class="fa fa-odnoklassniki"></i> </i> <span>Stok Darah</span>
          </a>
        </li>
        <li class="active">
           <a href="<?= base_url()?>/home/datapendonor_admin">
            <i class="fa fa-desktop"></i> <span>Data Pendonor</span>
          </a>
        </li>
        <li>
           <a href="<?= base_url()?>/home/datatranfusi_admin">
            <i class="fa fa-desktop"></i> <span>Data Tranfusi</span>
          </a>
        </li>
        <li>
           <a href="<?php echo site_url('home/logout'); ?>">
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
        <li><a href="<?= base_url()?>/home/stokdarah_admin">Form Data Pendonor</a></li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
    <div class="box box-primary" style="margin-top:30px;">
      <!-- form start -->
      <form action="<?php echo base_url(); ?>/home/input_datapendonor" method="post" role="form">
        <div class="box-body">
          <br>
          <br>
          <div class="form-group">
              <label>Tanggal Donor</label>
              <div class="date">
              <input type="date" class="form-control" id= "tgl_donor" name="tgl_donor">
          </div>
          <div class="form-group"> 
            <label for="nama_pendonor">Nama Pendonor</label>
            <input type="text" class="form-control" id="nama_pendonor" placeholder="Masukkan Nama Pendonor" name="nama_pendonor">
          </div>
          <div class="form-group">
            <label>Golongan Darah</label>
            <select class="form-control" style="width: 100%;" name="golongandarah">
              <option>-- Pilih Golongan Darah --</option>
              <option>A</option>
              <option>B</option>
              <option>O</option>
              <option>AB</option>
            </select>
          </div>
        </div>
        <!-- /.box-body -->
        <div class="box-footer" >
          <input type="submit" class="btn btn-primary" style="float: right;" name="submit" value="Tambahkan"></input>
        </div>
      </form>
    </div>
    <!-- /.box -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->

<!-- jQuery 3 -->
<script src="<?php echo base_url(); ?>assets/bower_components/jquery/dist/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="<?php echo base_url(); ?>assets/bower_components/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button);
</script>
<!-- Bootstrap 3.3.7 -->
<script src="<?php echo base_url(); ?>assets/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- Morris.js charts -->
<script src="<?php echo base_url(); ?>assets/bower_components/raphael/raphael.min.js"></script>
<script src="<?php echo base_url(); ?>assets/bower_components/morris.js/morris.min.js"></script>
<!-- Sparkline -->
<script src="<?php echo base_url(); ?>assets/bower_components/jquery-sparkline/dist/jquery.sparkline.min.js"></script>
<!-- jvectormap -->
<script src="<?php echo base_url(); ?>assets/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
<script src="<?php echo base_url(); ?>assets/plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
<!-- jQuery Knob Chart -->
<script src="<?php echo base_url(); ?>assets/bower_components/jquery-knob/dist/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="<?php echo base_url(); ?>assets/bower_components/moment/min/moment.min.js"></script>
<script src="<?php echo base_url(); ?>assets/bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>
<!-- datepicker -->
<script src="<?php echo base_url(); ?>assets/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="<?php echo base_url(); ?>assets/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
<!-- DataTables -->
<script src="<?php echo base_url(); ?>assets/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url(); ?>assets/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<!-- Slimscroll -->
<script src="<?php echo base_url(); ?>assets/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="<?php echo base_url(); ?>assets/bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url(); ?>assets/dist/js/adminlte.min.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="<?php echo base_url(); ?>assets/dist/js/pages/dashboard.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?php echo base_url(); ?>assets/dist/js/demo.js"></script>
<script>
function deleteConfrim(url) {
    $('#btn-delete').attr('href', url);
    $('#deleteModal').modal();
  }
  $(function () {
    $('#example1').DataTable({
      'paging'      : true,
      'lengthChange': true,
      'searching'   : true,
      'ordering'    : false,
      'info'        : true,
      'autoWidth'   : false
    })
  });
  
</script>
</body>
</html>