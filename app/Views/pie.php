
<footer class="main-footer">
                <div class="container">
                    <div class="copyright text-center my-auto">
                        <span>Dismat &copy;  2023</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
   

    <!-- Bootstrap core JavaScript-->
    <script src="<?php echo base_url() ;?>js/jquery-3.7.1.min.js"></script>
    <script src="<?php echo base_url() ;?>/vendor/jquery/jquery.min.js"></script>
    <script src="<?php echo base_url() ;?>/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="<?php echo base_url() ;?>/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="<?php echo base_url() ;?>/js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="<?php echo base_url() ;?>/vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="<?php echo base_url() ;?>/vendor/datatables/dataTables.bootstrap4.min.js"></script>
    <script src="<?php echo base_url() ;?>/js/demo/datatables-demo.js"></script>
    <script src="<?php echo base_url() ;?>js/jquery-3.7.1.min.js"></script>
    <script src="<?php echo base_url() ;?>js/jquery-ui/external/jquery/jquery.js"></script>
    <script src="<?php echo base_url() ;?>js/jquery-ui/jquery-ui.min.js"></script>
    
    <script>
        $('#modal-confirma').on('show.bs.modal',function(e){
            $($this).find('.btn-ok').after('href',$(e.relatedTarget).data('href'));
        });
    </script>
    </footer>
</body>
</html>

