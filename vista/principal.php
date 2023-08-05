<!DOCTYPE html>
<html lang="es">
<head>
	<?php  require_once('comunes/cabecera.php');?>
</head>
<body id="page-top">
 
	<?php //require_once('comunes/menu.php'); ?>
	<div id="wrapper">	
		<?php require_once('comunes/menu-sidebar.php')?>

		<div class="d-flex flex-column">

			<?php require_once('comunes/menu-topbar.php')?>

			<div class="container-fluid">
				<div class="card shadow mb-4">
					<div class="card-body">
						<div class="h3 font-italic text-center">
							¡Bienvenido! <?php if (!empty($_SESSION['nombre'])) {
								echo $_SESSION['nombre'];
							}?>
						</div>
						<div class="container mt-3">
							
							<div class="card-body">
								<div class="h5">
									Reseña histórica de la Asociación de Artes Marciales Mixtas Lara.
								</div>
								<div class="mt-3">
									<p class="font-weight-normal text-justify">
										En el año 2015 luego de salir de la diligencia de la federación venezolana de lucha olímpica, el Doctor Fernando Lucena decide incursionar en el grapling realizando un seminario donde se encontraban el Sensei José Calderón, atleta olímpico de judo, el Maestro Henry Colmenares, Presidente de la Asociación Larense de Sambo, el Sensei Dany Lovera, practicante de judo, el Profesor Hernin Castillo, ex-selección nacional de lucha grecorromana, la Ing. Gladys, adjunta en la selección de taekwondo y el Ing. Edward Pereira de la selección de lucha grecorromana y deciden organizarse realizando el primer seminario para unificar los criterios, el 8 de julio de 2019 asistiendo más de 40 practicantes de artes marciales mixtas (MMA), paralelamente el Doctor Fernando Lucena hace contacto con el Sensei Mauricio para crear la Federación Venezolana de Artes Marciales Mixtas, una vez hecho estos trámites comienzan los clubes interesados a registrarse ante el ministerio del deporte y ante los entes municipales respectivos. 
									</p>
								</div>
								
								<div class="h5">
									Misión.
								</div>

								<div class="mt-3">
									<p class="font-weight-normal text-justify">
										Aglutinar escuelas y clubes del estado Lara que permitan formar seres humanos integrales en un entorno globalizado, a través de las artes marciales mixtas con principios de disciplina, respeto, perseverancia, autocontrol, cortesía y espíritu combativo poniéndolos en práctica en los diferentes torneos, seminarios planificados por esta asociación o por cualquier otra perteneciente a la federación venezolana de artes marciales mixtas, desarrollando en nuestros estudiantes capacidades para desempeñarse como líderes en sus campos profesionales en cualquier parte del mundo.
									</p>
								</div>

								<div class="h5">
									Visión.
								</div>

								<div class="mt-3">
									<p class="font-weight-normal text-justify">
										Aglutinar todos los clubes y escuelas de artes marciales mixtas que permitan formar lideres para el futuro profesionales destacados y caracterizados por su disciplina y perseverancia en sus áreas del conocimiento la Asociación de Artes Marciales Mixtas Lara se proyecta como un centro de alto rendimiento en la región larense a través de sus programas de enseñanzas realizados por entrenadores y metodólogos reconocidos a nivel mundial, con filiales en todos los municipios del estado que permiten el intercambio deportivo de nuestros practicantes y el mejoramiento de sus habilidades convirtiendo la institución en una formadora de líderes para el futuro en sus especialidades además de buscar la excelencia físico-táctico.
									</p>
								</div>

							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>
	<?php require_once('comunes/scripts.php')?>
</body>
</html>