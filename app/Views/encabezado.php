
<?php 
$user_session = session()?>
<!DOCTYPE html>
<html lang="es">
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>DISMAT</title>

    <!-- Custom fonts for this template -->
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
    
    
   
   

</head>


<body id="page-top"  >
    
 
    <!-- Page Wrapper -->
    <div id="wrapper"   >

        <!-- Sidebar -->
        <ul class="navbar-nav sidebar sidebar-dark accordion " id="accordionSidebar" style="background-color: #0000FF; " >

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?php echo base_url() ;?>">
                <div class="sidebar-brand-icon rotate-n-15"  style="background-color: #0000FF;">
                    <i class="fas fa-laugh-wink"></i>
                </div>
              
                <div class="sidebar-brand-text mx-3" href="<?php echo base_url() ;?>/">DISMAT</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0" style="background-color: #0000FF;" >

       
            <li class="nav-item">
                <a class="nav-link collapsed" href="" data-toggle="collapse" data-target="#collapseProducts"
                    aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fas fa-fw fa-cog"></i>
                    <span>PRODUCTOS</span>
                </a>
                <div id="collapseProducts" class="collapse" aria-labelledby="headingProducts" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="<?php echo base_url() ;?>categorias">Categoria</a>
                        <a class="collapse-item" href="<?php echo base_url() ;?>productos">Productos</a>
                        
                    </div>
               
            </li>
            
      
            <hr class="sidebar-divider">
            <li class="nav-item">
                <a class="nav-link " href="<?php echo base_url() ;?>clientes" data-toggle="#" data-target="#"
                    aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fas fa-fw fa-cog"></i>
                    <span  >CLIENTES</span>
                </a>
            </li>
            <hr class="sidebar-divider">
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseCompras"
                    aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fas fa-fw fa-cog"></i>
                    <span>compras</span>
                </a>
                <div id="collapseCompras" class="collapse" aria-labelledby="headingCompras" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="<?php echo base_url() ;?>compras/nuevo">nueva compra </a>
                        <a class="collapse-item" href="<?php echo base_url() ;?>compras">compras</a>
                    </div>
                
            </li>
            <hr class="sidebar-divider">
            <li class="nav-item">
                <a class="nav-link " href="#" data-toggle="collapse" data-target="#collapseVentas"
                    aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fa-solid fa-truck"></i>
                    <span  >VENTAS</span>
                </a>
                <div id="collapseVentas" class="collapse" aria-labelledby="headingVentas" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="<?php echo base_url() ;?>ventas/ventas">nueva venta </a>
                        <a class="collapse-item" href="<?php echo base_url() ;?>ventas/lista">lista ventas</a>
                    </div>
            </li>

            <!-- Nav Item - Utilities Collapse Menu -->
           
            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseConfig"
                    aria-expanded="true" aria-controls="collapsePages">
                    <i class="fas fa-fw fa-folder"></i>
                    <span>Configuracion</span>
                </a>
                <div id="collapseConfig" class="collapse" aria-labelledby="headingConfig" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                    <a class="collapse-item" href="<?php echo base_url() ;?>usuarios">usuarios</a>
                    <a class="collapse-item" href="<?php echo base_url() ;?>empleados">roles</a>
                        
                    </div>
              
            </li>

            <!-- Nav Item - Charts -->
           

            <!-- Nav Item - Tables -->
           

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

        </ul>
        <!-- End of Sidebar -->

      <!-- Content Wrapper -->
      <div id="content-wrapper" class="d-flex flex-column">

<!-- Main Content -->
<div id="content">

    <!-- Topbar -->
    <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">

        <!-- Sidebar Toggle (Topbar) -->
        <form class="form-inline">
            <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                <i class="fa fa-bars"></i>
            </button>
        

       

           
            <!-- Nav Item - User Information -->
            <ul class="navbar-nav ms-auto  me-3 me-lg-4 me-md-3 my-2 my-md-0">
                <li class="nav-item">
                    <a class="nav-link active" href=""></a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false"><?php echo $user_session->nombre; ?></a>
                    <div class="dropdown-menu">
                        <a class="dropdown-item" type="button" class="btn btn-info" data-bs-toggle="modal" data-bs-target="#modalCambioPasword">
                            Cambiar password</a>
                        <a class="dropdown-item" href="#">Otro</a>
                        <a class="dropdown-item" href="#">Otro</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="<?php echo base_url(); ?>/usuarios/logout">Cerrar sessión</a>
                    </div>
                </li>
            </ul>

        </ul>
</form>
    </nav>
