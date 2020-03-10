

<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
<i class="fas fa-angle-up"></i>
</a>

<!-- Logout Modal-->
<form action="<?= base_url('Auth/logout') ?>" method="post">
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog" role="document">
<div class="modal-content">
<div class="modal-header">
  <h5 class="modal-title" id="exampleModalLabel">Apakah Anda Ingin Keluar?</h5>
  <button class="close" type="button" data-dismiss="modal" aria-label="Close">
    <span aria-hidden="true">×</span>
  </button>
</div>
<div class="modal-body">Tekan tombol logut untuk keluar dari aplikasi.</div>
<div class="modal-footer">
  <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
  <button type="submit" class="btn btn-primary" type="button" >Logout</button>

</div>
</div>
</div>
</div>
</form>
<script src="<?php echo base_url('assets/vendor/sweetalert2/sweetalert2.min.js') ?>"></script>

<?php
if ($this->session->flashdata('alert')) {
    echo $this->session->flashdata('alert');
}
?>
<!-- Bootstrap core JavaScript-->
<script src="<?= base_url('assets/vendor/jquery/jquery.min.js') ?>"></script>
<script src="<?= base_url('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') ?>"></script>

<!-- Core plugin JavaScript-->
<script src="<?= base_url('assets/vendor/jquery-easing/jquery.easing.min.js') ?>"></script>

<!-- Custom scripts for all pages-->
<script src="<?= base_url('assets/js/sb-admin-2.min.js') ?>"></script>

  <!-- Page level plugins -->
  <script src="<?= base_url('assets/vendor/datatables/jquery.dataTables.min.js'); ?>"></script>
  <script src="<?= base_url('assets/vendor/datatables/dataTables.bootstrap4.min.js'); ?>"></script>

  <!-- Page level custom scripts -->
  <script src="<?= base_url('assets/js/demo/datatables-demo.js'); ?>"></script>

</body>

</html>
