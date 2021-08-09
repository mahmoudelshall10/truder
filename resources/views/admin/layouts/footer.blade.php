
  <footer class="main-footer">
    <strong>Copyright &copy; {{ date('Y') }} </strong>
    All rights reserved.
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->
<!-- jQuery -->
<script src="{{ url('admin_design') }}/plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->

<script src="{{ url('admin_design') }}/plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="{{ url('admin_design') }}/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- ChartJS -->
<script src="{{ url('admin_design') }}/plugins/chart.js/Chart.min.js"></script>
<!-- Sparkline -->
<script src="{{ url('admin_design') }}/plugins/sparklines/sparkline.js"></script>
<!-- JQVMap -->
<script src="{{ url('admin_design') }}/plugins/jqvmap/jquery.vmap.min.js"></script>
<script src="{{ url('admin_design') }}/plugins/jqvmap/maps/jquery.vmap.world.js"></script>
<!-- jQuery Knob Chart -->
<script src="{{ url('admin_design') }}/plugins/jquery-knob/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="{{ url('admin_design') }}/plugins/moment/moment.min.js"></script>
<script src="{{ url('admin_design') }}/plugins/daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="{{ url('admin_design') }}/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Summernote -->
<script src="{{ url('admin_design') }}/plugins/summernote/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src="{{ url('admin_design') }}/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- FastClick -->
<script src="{{ url('admin_design') }}/plugins/fastclick/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="{{ url('admin_design') }}/dist/js/adminlte.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="{{ url('admin_design') }}/dist/js/pages/dashboard.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{ url('admin_design') }}/dist/js/demo.js"></script>
<!-- DataTables -->
<script src="{{ url('admin_design') }}/plugins/datatables/jquery.dataTables.js"></script>
<script src="{{ url('admin_design') }}/plugins/datatables/dataTables.bootstrap4.js"></script>
<!-- page script -->
<script>
  $(function () {
    $("#example1").DataTable();
  });
</script>
<script>
  $(function () {
    // Summernote
    $('.textarea').summernote()
  })
</script>
@stack('adminjs')
</body>
</html>