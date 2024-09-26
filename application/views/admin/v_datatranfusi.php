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
        <li>
           <a href="<?= base_url()?>/home/datapendonor_admin">
            <i class="fa fa-desktop"></i> <span>Data Pendonor</span>
          </a>
        </li>
        <li class="active">
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
        <li><a href="<?= base_url();?>home/index_admin"> Data Tranfusi </a></li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="box" style="margin-top:30px;">
        <div class="box-header">
          <a href="<?php echo base_url(); ?>home/tambah_datatranfusi" style="float:right;">
                  <button type="button" class="btn btn-primary"  style="background-color:#27ae60;"> Tambah Data </button>
          </a>    
        </div> 
        <!-- /.box-header -->
        <div class="box-body">
          <div class="table-responsive">  
            <table id="example1" class="table table-bordered table-striped">
              <thead>
                <tr>
                    <th>NIK</th>
                    <th>Nama Pasien</th>
                    <th>Tanggal Lahir</th>
                    <th>Alamat Pasien</th>
                    <th>Nomor Telepon</th>
                    <th>Tanggal Tranfusi</th>
                    <th>Golongan Darah</th>
                    <th>Jumlah</th>
                    <th>Rumah Sakit</th>
                    <th>Alamat Rumah Sakit</th>
                    <th>No.Telp Rumah Sakit</th>
                    <th></th>
                </tr>
              </thead>
              <tbody>
              
              <?php
              foreach ($user as $a) : ?> 
              <tr>
                <td><?php echo $a->nik ?></td>
                <td><?php echo $a->nama_pasien ?></td>
                <td><?php echo $a->tgl_lahir ?></td>
                <td><?php echo $a->alamat_pasien ?></td>
                <td><?php echo $a->nomor_pasien ?></td>
                <td><?php echo $a->tgl_tranfusi ?></td>
                <td><?php echo $a->golongandarah ?></td>
                <td><?php echo $a->jumlah ?></td>
                <td><?php echo $a->rumahsakit ?></td>
                <td><?php echo $a->alamat_rs ?></td>
                <td><?php echo $a->nomor_rs ?></td>
                <td></td>
                <td>
                  <a href="<?php echo base_url(); ?>/home/edit_datatranfusi/<?php echo $a->id?>">
                    <button type="button" class="btn btn-primary">Edit</button>
                  </a>
                  <a onclick="deleteConfrim('<?php echo site_url('home/delete_datatranfusi/'.$a->id) ?>')"
                  href="#!" class="btn btn-danger">Delete
                  </a>
                </td>
              </tr>
              <?php endforeach ?>
            </table>
          </div>
        </div>
      </div>
      <!-- /.box -->
      <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h3 class="modal-title" id="exampleModalLabel">Apa Anda Ingin Menghapus Data Ini?</h3>
              <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">x</span>
              </button>
            </div>
            <div class="modal-footer">
              <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
              <a id="btn-delete" class="btn btn-danger" href="<?php echo site_url('home/index')?>">Delete</a>
            </div>
          </div>
        </div>
      </div>   
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
      'searching'   : false,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : false
    })
  });
  
</script>
</body>
</html>