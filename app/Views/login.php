<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Login - SB Admin</title>
        <link href="<?php echo base_url() ;?>/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="<?php echo base_url() ;?>/css/fonts.googleapis.css"
        rel="stylesheet">
        <link
        href="<?php echo base_url() ;?>vendor/fontawesome-free/css/all.min.css"
        rel="stylesheet">
      <link  href="<?php echo base_url() ;?>/css/font-awesome.min.css"
        rel="stylesheet">
        <link href="<?php echo base_url() ;?>/js/jquery-ui/jquery-ui.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="<?php echo base_url() ;?>/css/sb-admin-2.min.css" rel="stylesheet">
    <script src="<?php echo base_url() ;?>/js/sb-admin-2.min.js"></script>
  
   

    <!-- Custom styles for this page -->
    <link href="<?php echo base_url() ;?>vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
    
    <!-- <script src="<?php echo base_url() ;?>/js/jquery-3.7.1.min.js"></script>-->
    <script src="<?php echo base_url() ;?>/js/jquery.min.js"></script>
    <script src="<?php echo base_url() ;?>/js/all.min.js"></script>
    <script src="<?php echo base_url() ;?>/js/all.min1.js"></script>
    <script src="<?php echo base_url() ;?>js/jquery-3.7.1.min.js"></script>
    <script src="<?php echo base_url() ;?>js/jquery-ui/external/jquery/jquery.js"></script>
    <script src="<?php echo base_url() ;?>js/jquery-ui/jquery-ui.min.js"></script>
    
        <link href="<?php echo base_url() ;?>/css/stylecss.css" rel="stylesheet" />
        <script src="<?php echo base_url() ;?>/js/all.js" crossorigin="anonymous"></script>
    </head>
    <body class="bg-danger">
        <div id="layoutAuthentication">
            <div id="layoutAuthentication_content">
                <main>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-5">
                                <div class="card shadow-lg border-0 rounded-lg mt-5">
                                    <div class="card-header"><h3 class="text-center font-weight-light my-4">Login</h3></div>
                                    <div class="card-body">
                                        <form method="POST" action="<?php echo base_url();?>/usuarios/valida">
                                            <div class="form-floating mb-3">
                                                <input class="form-control" name="usuario" id="usuario" type="text" placeholder="usuario" />
                                                <label>usuarios</label>
                                            </div>
                                            <div class="form-floating mb-3">
                                                <input class="form-control" id="password" name="password" type="password" placeholder="Password" />
                                                <label >Password</label>
                                            </div>
                                          
                                            <div class="d-flex align-items-center justify-content-between mt-4 mb-0">
                                               
                                                <button class="btn btn-primary" type ="submit">Login</button>
                                            </div>
                                            <?php if (isset($validation)) { ?>
     <div class="alert alert-danger">
     <?php echo $validation->listErrors();?>
     </div>
 <?php }?>
 <?php if (isset($error)) { ?>
     <div class="alert alert-danger">
     <?php echo $error;?>
     </div>
 <?php }?>
                                        </form>
                                    </div>
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
            </div>
     
            </div>
           
                 
        <script src="<?php echo base_url() ;?>/js/bootstrap.bundle.min.js;" crossorigin="anonymous"></script>
        <script src="<?php echo base_url() ;?>js/scripts.js"></script>
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
    </body>
</html>
