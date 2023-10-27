
<?php 
$user_session =session()?>
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
    <link href="<?php echo base_url() ;?>vendor/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="<?php echo base_url() ;?>vendor/css/fonts.googleapis.css"
        rel="stylesheet">
        <link href="<?php echo base_url() ;?>/js/jquery-ui-1.13.2.custom/jquery-ui.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="<?php echo base_url() ;?>/css/all.min.css" rel="stylesheet" type="text/css">
    
    <link href="<?php echo base_url() ;?>/css/sb-admin-2.min.css" rel="stylesheet">
    <link href="<?php echo base_url() ;?>/js/jquery-ui/jquery-ui.min.css" rel="stylesheet">
   

    <!-- Custom styles for this page -->
    <link href="<?php echo base_url() ;?>/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
    
    <!-- <script src="<?php echo base_url() ;?>/js/jquery-3.7.1.min.js"></script>-->
    <script src="<?php echo base_url() ;?>/js/jquery.min.js"></script>
    <script src="<?php echo base_url() ;?>/js/all.min.js"></script>
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
                        <a class="collapse-item" href="<?php echo base_url() ;?>prueba">Pr</a>
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
             <!--   <nav class="navbar navbar-expand navbar-light bg-blue topbar mb-4 static-top shadow">-->
              

                    <!-- Sidebar Toggle (Topbar) -->
                    <!-- <form class="form-inline">
                        <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                            <i class="fa fa-bars"></i>
                        </button>
                    </form> -->
  
                   

                       
                        <!-- Nav Item - User Information -->
                        
               <!-- <ul class="navbar-nav ml-auto ml-md-0  my-2 my-md-0">
                    <li class="nav-item dropdown">
                        <a class="nav-item dropdown" href=""        id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" >
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small"></span>
                                <img class="img-profile rounded-circle"
                                    src="img/undraw_profile.svg">-->
                          <!--</a>-->
                            <!-- Dropdown - User Information -->
                           <!-- <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                             <a class="dropdown-item" href="#">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                    perfil
                             </a>
                             <a class="dropdown-item" href="#">
                                    <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                                   configuracion
                             </a>
                             <a 
                                 class="dropdown-item" href="<?php echo base_url(); ?>/usuarios/logout" > <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>Cerrar Session
                            </a>                       
                     </li>
                 </ul>
                    </div>-->

                    	<!-- Topbar -->
				<nav class="navbar navbar-expand navbar-light bg-primary text-white topbar mb-4 static-top shadow">

<!-- Sidebar Toggle (Topbar) -->
<button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
    <i class="fa fa-bars"></i>
</button>
<div class="input-group">
    <h6>Sistema de Venta</h6>
    <p class="ml-auto"><strong>Cochabamba, </strong><?php echo fechaBolivia(); ?></p>
</div>

<!-- Topbar Navbar -->
<ul class="navbar-nav ml-auto">

    <div class="topbar-divider d-none d-sm-block"></div>

    <!-- Nav Item - User Information -->
    <li class="nav-item dropdown no-arrow">
        <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <span class="mr-2 d-none d-lg-inline small text-white"></span>
        </a>
        <!-- Dropdown - User Information -->
        <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
            <a class="dropdown-item" href="#">
                <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
               
            </a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="<?php echo base_url(); ?>/usuarios/logout" >
                <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                Salir
            </a>
        </div>
    </li>

</ul>

</nav>
<?php
	date_default_timezone_set('America/Lima');

	function fechaBolivia(){
		$mes = array("","Enero",
					  "Febrero",
					  "Marzo",
					  "Abril",
					  "Mayo",
					  "Junio",
					  "Julio",
					  "Agosto",
					  "Septiembre",
					  "Octubre",
					  "Noviembre",
					  "Diciembre");
		return date('d')." de ". $mes[date('n')] . " de " . date('Y');
	}


 ?>


                    

            
           
    
