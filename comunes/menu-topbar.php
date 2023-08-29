<!-- Topbar -->
<nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

    <!-- Sidebar Toggle (Topbar) -->
    <button id="sidebarToggleTop" class="btn btn-danger d-md-none rounded-circle mr-3">
        <i class="fa fa-bars"></i>
    </button>

    <!-- Topbar Navbar -->
    <ul class="navbar-nav ml-auto">
    <?php 
        if($usuario!==""){
    ?>
        
        <!-- Nav Item - Messages -->
        <li class="nav-item mx-1">
            <a class="nav-link" href="#" data-toggle="modal" data-target="#modal_mensajes" role="button" aria-haspopup="true" aria-expanded="false">
                <i class="bi bi-chat-fill mr-2"></i>
            </a>
        </li>

        <div class="topbar-divider d-none d-sm-block"></div>

        <!-- Nav Item - User Information -->
        <li class="nav-item dropdown no-arrow">
            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="mr-2 d-none d-lg-inline text-gray-600 small">
                    <?php if (!empty($_SESSION['nombre'])) {echo $_SESSION['nombre'];}?>
                </span>
                <img class="img-profile rounded-circle" src="img/undraw_profile.svg">
            </a>

            <!-- Dropdown - User Information -->
            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                aria-labelledby="userDropdown">
                <a class="dropdown-item" href="?pagina=perfil">
                    <i class="bi bi-person-fill mr-2 text-gray-900"></i>
                    Perfil
                </a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="?pagina=cerrar_sesion">
                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-900"></i>
                    Salir
                </a>
            </div>
        </li>
    <?php 
        } else {
            
    ?>
        <li class="nav-item mx-1">
            <a href="?pagina=inicio_sesion" class="btn btn-danger">
                <i class="bi bi-box-arrow-in-right mr-1"></i>
                Entrar
            </a>
        </li>
    <?php 
        }
    ?>
    </ul>

</nav>
<?php require_once("comunes/modales-socket.php");?>
<!-- End of Topbar -->