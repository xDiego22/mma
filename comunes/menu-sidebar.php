<?php  

    if(empty($_SESSION)){
        session_start();
    }

    if(isset($_SESSION['cedula'])){
        $usuario = $_SESSION['cedula'];
    }	  
    else{
        $usuario = "";
    }

    if(isset($_SESSION['modulo'])){
        $modulo = $_SESSION['modulo'];
    }	  
    else{
        $modulo = "";
    }

    if(!empty($modulo)){
        
        $contador = count($modulo);

        for ($i=0; $i <$contador ; $i++) {
            if ($modulo[$i]=="1") {

                $clubes=$modulo[$i];
                break;
            }else{
                $clubes="";
            }
        } 

        for ($i=0; $i <$contador ; $i++) {
            if ($modulo[$i]=="2") {

                $personal=$modulo[$i];
                break;
            }else{
                $personal="";
            }
        } 

        for ($i=0; $i <$contador ; $i++) {
            if ($modulo[$i]=="3") {

                $atleta=$modulo[$i];
                break;
            }else{
                $atleta="";
            }
        } 

        for ($i=0; $i <$contador ; $i++) {
            if ($modulo[$i]=="4") {

                $medico=$modulo[$i];
                break;
            }else{
                $medico="";
            }
        }

        for ($i=0; $i <$contador ; $i++) {
            if ($modulo[$i]=="5") {

                $socioeconomico=$modulo[$i];
                break;
            }else{
                $socioeconomico="";
            }
        }
        
        for ($i=0; $i <$contador ; $i++) {
            if ($modulo[$i]=="6") {

                $eventos=$modulo[$i];
                break;
            }else{
                $eventos="";
            }
        } 

        for ($i=0; $i <$contador ; $i++) {
            if ($modulo[$i]=="7") {

                $usuarios=$modulo[$i];
                break;
            }else{
                $usuarios="";
            }
        } 
        for ($i=0; $i <$contador ; $i++) {
            if ($modulo[$i]=="8") {

                $bitacora=$modulo[$i];
                break;
            }else{
                $bitacora="";
            }
        } 
        for ($i=0; $i <$contador ; $i++) {
            if ($modulo[$i]=="9") {

                $roles_permisos=$modulo[$i];
                break;
            }else{
                $roles_permisos="";
            }
        } 
        for ($i=0; $i <$contador ; $i++) {
            if ($modulo[$i]=="10") {

                $inscripcion=$modulo[$i];
                break;
            }else{
                $inscripcion="";
            }
        } 
        for ($i=0; $i <$contador ; $i++) {
            if ($modulo[$i]=="11") {

                $emparejamientos_combates=$modulo[$i];
                break;
            }else{
                $emparejamientos_combates="";
            }
        } 
        for ($i=0; $i <$contador ; $i++) {
            if ($modulo[$i]=="12") {

                $resultados_eventos=$modulo[$i];
                break;
            }else{
                $resultados_eventos="";
            }
        } 
        for ($i=0; $i <$contador ; $i++) {
            if ($modulo[$i]=="13") {

                $historial_atleta=$modulo[$i];
                break;
            }else{
                $historial_atleta="";
            }
        }
        for ($i=0; $i <$contador ; $i++) {
            if ($modulo[$i]=="15") {

                $reporte_atleta=$modulo[$i];
                break;
            }else{
                $reporte_atleta="";
            }
        } 
        for ($i=0; $i <$contador ; $i++) {
            if ($modulo[$i]=="16") {

                $reporte_personal=$modulo[$i];
                break;
            }else{
                $reporte_personal="";
            }
        } 
        for ($i=0; $i <$contador ; $i++) {
            if ($modulo[$i]=="17") {

                $reporte_eventos=$modulo[$i];
                break;
            }else{
                $reporte_eventos="";
            }
        } 
        for ($i=0; $i <$contador ; $i++) {
            if ($modulo[$i]=="18") {

                $reporte_resultados=$modulo[$i];
                break;
            }else{
                $reporte_resultados="";
            }
        } 
        for ($i=0; $i <$contador ; $i++) {
            if ($modulo[$i]=="19") {
                $reporte_emparejamientos=$modulo[$i];
                break;
            }else{
                $reporte_emparejamientos="";
            }
        } 
        for ($i=0; $i <$contador ; $i++) {
            if ($modulo[$i]=="20") {
                $reporte_historial=$modulo[$i];
                break;
            }else{
                $reporte_historial="";
            }
        } 

        for ($i=0; $i <$contador ; $i++) {
            if ($modulo[$i]=="21") {
                $reportes=$modulo[$i];
                break;
            }else{
                $reportes="";
            }
        }

    }
    
?>
 <!-- Sidebar -->
<ul class="navbar-nav bg-gradient-danger sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="?pagina=principal">
        <div class="sidebar-brand-icon">
            <img src="img/logo-menu.png" alt="icon" width="40px"><!--imagen de logo-->
        </div>
        <div class="sidebar-brand-text mx-3">MMA Lara</div>
    </a>

<?php 
	if($modulo !== "" and $usuario!==""){ 
?>
    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        items
    </div>

<?php 
    if($clubes == "1" or $personal == "2"){
?>
    <!-- Nav Item - Utilities Collapse Menu -->
        <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseClubes"
                aria-expanded="true" aria-controls="collapseClubes">
                <img src="img/iconos/clubes.png" style="width:30px;">
                <span>Clubes</span>
            </a>
            <div id="collapseClubes" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <?php
                        if($clubes == "1"){
                    ?>
                        <a class="collapse-item" href="?pagina=gestionar_clubes">
                            <img src="img/iconos/clubes.png" style="width:30px;">
                            Clubes
                        </a>
                    <?php
                        }
                        if($personal == "2"){
                    ?>
                        <a class="collapse-item" href="?pagina=gestionar_personal">
                            <img src="img/iconos/personal.png" style="width:30px;">
                            Personal
                        </a>
                    <?php 
                        }
                    ?>
                </div>
            </div>
        </li>
<?php 
    }
?>

<?php 
    if($atleta == "3" or $medico == "4" or $socioeconomico == "5" or $historial_atleta == "13"){
?>
    <!-- Nav Item Atletas - Utilities Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseAtletas"
            aria-expanded="true" aria-controls="collapseAtletas">
            <img src="img/iconos/atleta.png" style="width:30px;">
            <span>Atletas</span>
        </a>
        <div id="collapseAtletas" class="collapse" aria-labelledby="headingUtilities"
            data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <?php
                    if($atleta == "3"){
                ?>
                    <a class="collapse-item" href="?pagina=gestionar_atleta">
                        <img src="img/iconos/atleta.png" style="width:30px;">
                        Atletas
                    </a>
                <?php
                    }
                    if($medico == "4"){
                ?>
                    <a class="collapse-item" href="?pagina=medico_atleta">
                        <img src="img/iconos/salud.png" style="width:30px;">
                        Datos Medicos
                    </a>
                <?php
                    }
                    if($socioeconomico == "5"){
                ?>
                    <a class="collapse-item" href="?pagina=socioeconomico_atleta">
                        <img src="img/iconos/socioeconomico.png" style="width:30px;">
                        Datos Socioeconomicos</a>
                <?php
                    }
                    if($historial_atleta == "13"){
                ?> 
                    <a class="collapse-item" href="?pagina=historial_atleta">
                    <img src="img/iconos/historial.png" style="width:30px;">
                    Historial del Atleta
                </a>
                <?php 
                    }
                ?>
            </div>
        </div>
    </li>
<?php 
    }
?>
    <!-- Nav Item Eventos - Utilities Collapse Menu -->
<?php 
    if($eventos == "6" or $inscripcion == "10" or $emparejamientos_combates == "11" or $resultados_eventos == "12"){
?>
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseEventos" aria-expanded="true"
            aria-controls="collapseEventos">
            <img src="img/iconos/trofeo.png" style="width:30px;">
            <span>Eventos</span>
        </a>
        <div id="collapseEventos" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
            <?php
                if($eventos == "6"){
            ?>
                <a class="collapse-item" href="?pagina=gestionar_eventos">
                    <img src="img/iconos/trofeo.png" style="width:30px;">
                    Eventos
                </a>
            <?php
                }
                if($inscripcion == "10"){
            ?>
                <a class="collapse-item" href="?pagina=inscripcion_evento">
                    <img src="img/iconos/inscribir.png" style="width:30px;">Inscripcion a Eventos
                </a>
            <?php 
                }
                
                if($emparejamientos_combates == "11"){
            ?>
                <a class="collapse-item text-wrap" href="?pagina=emparejamiento_combates">
                    <img src="img/iconos/ring.png" style="width:30px;">
                    Emparejamientos y Combates
                </a>
            <?php 
                }
                
                if($resultados_eventos == "12"){
            ?>
                <a class="collapse-item text-wrap" href="?pagina=resultados_eventos">
                    <img src="img/iconos/ganador.png" style="width:30px">
                    Resultados de Eventos
                </a>
            <?php 
                }
            ?>
            </div>
        </div>
    </li>
<?php 
    }
?>




    <!-- falta hacer esta parte -->


<?php 
    if($reportes == "21"){
?>
    <!-- Nav Item - Utilities Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseReportes" aria-expanded="true"
            aria-controls="collapseReportes">
            <img src="img/iconos/reporte.png" style="width:30px;">
            <span>Reportes</span>
        </a>
        <div id="collapseReportes" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
    
                <a class="collapse-item" href="?pagina=reporte_atleta">
                    <img src="img/iconos/reporte.png" style="width:30px;">
                    Reporte de Atletas
                </a>
						
                <a class="collapse-item" href="?pagina=reporte_personal">
                    <img src="img/iconos/reporte.png" style="width:30px;">
                    Reporte de Personal
                </a>
                
                <a class="collapse-item" href="?pagina=reporte_eventos">
                    <img src="img/iconos/reporte.png" style="width:30px;">
                    Reporte de Eventos
                </a>
                
                <a class="collapse-item text-wrap" href="?pagina=reporte_resultados">
                    <img src="img/iconos/reporte.png" style="width:30px;">
                    Reporte de Resultados Eventos
                </a>
                
                <a class="collapse-item text-wrap" href="?pagina=reporte_historial_atleta">
                    <img src="img/iconos/reporte.png" style="width:30px;">
                    Reporte de Historial de Atletas
                </a>

                <a class="collapse-item text-wrap" href="?pagina=reporte_cantidad_participantes">
                    <img src="img/iconos/reporte.png" style="width:30px;">
                    Reporte Estadistico de Cantidad de Participantes
                </a>

                <a class="collapse-item text-wrap" href="?pagina=reporte_cantidad_vivienda">
                    <img src="img/iconos/reporte.png" style="width:30px;">
                    Reporte Estadistico de Cantidad Zona de Vivienda
                </a>
                
            </div>
        </div>
    </li>
<?php 
    }
?>


    <!-- Divider -->
    <hr class="sidebar-divider">

<?php  
    if($bitacora == "8" or $roles_permisos == "9" or $usuarios == "7"){
?>
    <!-- Heading -->
    <div class="sidebar-heading">
        Seguridad
    </div>

    <!-- Nav Item - Utilities Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseSeguridad" aria-expanded="true"
            aria-controls="collapseSeguridad">
            <img src="img/iconos/seguridad.png" style="width:30px;">
            <span>Seguridad</span>
        </a>
        <div id="collapseSeguridad" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">

                <a class="collapse-item text-wrap" href="?pagina=respaldo_bd">
                    <img src="img/iconos/database.png" style="width:30px;">
                    Respaldo BD
                </a>
            <?php 
                if($bitacora == "8"){
            ?>
                <a class="collapse-item" href="?pagina=bitacora_usuario">
                    <img src="img/iconos/bitacora.png" style="width:30px;">
                    Bitacora de usuario
                </a>
            <?php 
                }
                if($roles_permisos == "9"){
            ?>
                <a class="collapse-item" href="?pagina=roles_permisos">
                    <img src="img/iconos/rol.png" style="width:30px;">
                    Roles y Permisos
                </a>
            <?php 
                }

                if($usuarios == "7"){
            ?>
                <a class="collapse-item" href="?pagina=gestionar_usuarios">
                    <img src="img/iconos/usuario.png" style="width:30px;">
                    Usuarios
                </a>
            <?php  
                }
            ?>
            </div>
        </div>
    </li>
<?php 
    }
?>  

    <!-- Nav Item - Utilities Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities5" aria-expanded="true"
            aria-controls="collapseUtilities5">
            <i class="bi bi-book-half"></i>
            <span>Ayudas</span>
        </a>
        <div id="collapseUtilities5" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="?pagina=manual">
                    <img src="img/iconos/manual.png" style="width:20px;">
                    Manual interactivo</a>
            </div>
        </div>
    </li>

<?php 
    }
    if($usuario !== ""){
?>
    <!-- Nav Item - Tables -->
    <li class="nav-item">
        <a class="nav-link" href="?pagina=acerca">
            <i class="bi bi-info-circle-fill"></i>
            <span>Acerca de</span>
        </a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">
<?php 
    }
?>

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>
<!-- End of Sidebar -->
