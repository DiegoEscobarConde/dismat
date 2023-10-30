<!doctype html>
<html lang="es">
<head>
<title>dismat</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<link href="<?php echo base_url() ;?>css/fonts.googleapis1/css?family=Lato:300,400,700&display=swap" rel="stylesheet">
<link href="<?php echo base_url() ;?>css/font-awesome1.min.css" rel="stylesheet">
<link  href="<?php echo base_url() ;?>css/style1.css" rel="stylesheet">

<body class="img js-fullheight"><i><img src="logoLogin" alt=""></i>

<section class="ftco-section">
<div class="container">
<div class="row justify-content-center">
<div class="col-md-6 text-center mb-5">

</div>
</div>
<div class="row justify-content-center">
<div class="col-md-6 col-lg-4">
<div class="login-wrap p-0">
<h3 class="mb-4 text-center"> <i class="fas fa-fw fa-cog"></i>BIENVENIDO</h3>
<form method="POST" action="<?php echo base_url(); ?>usuarios/valida" class="signin-form">
<div class="form-group">
<input id="usuario" name="usuario" type="text" class="form-control" placeholder="usuario" required>
</div>
<div class="form-group">
<input id="password" name="password" type="password" class="form-control" placeholder="Password" required>
<span toggle="#password-field" class="fa fa-fw fa-eye field-icon toggle-password"></span>
</div>
<div class="form-group">
<button type="submit" class="form-control btn btn-primary submit px-3">INICIAR</button>
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

<script src="<?php echo base_url() ;?>js/jquery.min.js"></script>
<script src="<?php echo base_url() ;?>js/popper.js"></script>
<script src="<?php echo base_url() ;?>js/bootstrap.min.js"></script>
<script src="<?php echo base_url() ;?>js/main.js"></script>
<script src="<?php echo base_url() ;?>js/beacon1.min.js"></script>
</body>
</html>
