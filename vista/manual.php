<!DOCTYPE html>
<html lang="es">
<head>
   <?php require_once('comunes/cabecera.php') ?>
</head>
<body id="page-top">

	<?php require_once('comunes/modal.php') ?>
  
   <div id="wrapper">

      <?php require_once('comunes/menu-sidebar.php')?>

         <div id="content-wrapper" class="d-flex flex-column">
            <div id="content"> 
               <?php require_once('comunes/menu-topbar.php')?>
   
               <div class="container-fluid border mt-4 shadow p-3 mb-4 bg-white rounded" style="width:95%;">
                  
                  <div class="container mt-3">	
                     <div class="h2 text-center">
                        MANUAL INTERACTIVO.
                     </div>
   
                     <div class="mt-1">
                        <p class="font-weight-normal text-justify">
                        Este manual se ha diseñado como una valiosa herramienta que te guiará a través del completo
                        proceso de navegación y utilización del sistema web. Con el propósito de garantizar que puedas
                        aprovechar al máximo todas las funciones y características disponibles, este manual te
                        proporcionará instrucciones claras y detalladas para cada una de las acciones que se encuentran
                        en la plataforma. Gracias a su enfoque paso a paso, acompañado por imágenes ilustrativas,
                        podrás comprender de manera efectiva cómo funciona el sistema y llevar a cabo las tareas con
                        confianza y precisión.
                        </p>
                     </div>
                  </div>

                  <div class="container-fluid my-4 pt-4 shadow bg-white rounded" style="width:95%;">
                  <div class="container p3">
   
                     <div class="row mt-3">
                        <div class="col-md-12">
                           <div class="h3 text-dark">GESTION DE CLUBES</div>
                        </div>       
                     </div>
   
                     <div class="row">
                        <div class="col">
                              <p class="font-weight-normal text-justify">
                                 Para llegar al gestionar clubes dele click al boton <button class="btn btn-outline-dark btn-sm"><img src="img/iconos/clubes.png" style="width:30px;margin-right:10px;">Clubes</button> al presionar sobre el boton se abrira un menu desplegable, ahi le vuelve a dar al boton 
                                 <button class="btn btn-outline-dark btn-sm"><img src="img/iconos/clubes.png" style="width:30px;margin-right:10px;">Clubes</button>
                                 y asi habra llegado a la pagina principal de clubes que se vera algo asi:
                              </p>

			
					         <div class="container-fluid mt-4 mb-3">
						         <div class="row justify-content-between">
							         <div class="col-auto mr-auto mb-2">
								         <div class="h4 text-dark">Gestionar Clubes</div>

                                 <button type="button" class="btn btn-success"  data-toggle="modal" data-target="#modal_gestion" id="boton_nuevo" onclick="modalregistrar()">
									<i class="bi bi-plus-circle mr-1"></i>Nuevo registro
                                 </button><br>
                                 
					<br><div class="container-fluid">
						<div class="row">
							<div class="col-md-12">
								<div class="table-responsive">
									<table class="table table-striped table-hover table-borderless" id="tablaconsulta" width="100%" cellspacing="0">
										<thead class="thead-dark">
											<tr> 
												<th>#Codigo</th>
												<th>Nombre</th>
												<th>Telefono</th>
												<th>Deporte Base</th>
												<th>Direccion</th>
												<th>Acciones</th>
												
											</tr>
										</thead>
										<tbody>
												<tr>
													<td>JMK991</td>
                                       <td>Los peleoneros</td>
                                       <td>0414082938</td>
                                       <td>Boxeo</td>
                                       <td>El Cuji, via hacia la veritas</td>
                                       <td><button type="button" class="btn btn-primary mb-1 mr-1" data-toggle="modal" data-target="#modal_gestion" onclick="modalmodificar(this)" id="boton_modificar"><i class="bi bi-pencil-fill"></i></button>
                                          <button type="button" class="btn btn-danger mb-1 " onclick="elimina(this)"><i class="bi bi-x-lg"></i></button></td>
												</tr>

                                    <tr>
                                       <td>TLT782</td>
                                       <td>Luisardos MT</td>
                                       <td>0416842063</td>
                                       <td>Taekwondo</td>
                                       <td>Cabudare, Urbanizacion El paraiso</td>
                                       <td><button type="button" class="btn btn-primary mb-1 mr-1" data-toggle="modal" data-target="#modal_gestion" onclick="modalmodificar(this)" id="boton_modificar"><i class="bi bi-pencil-fill"></i></button>
                                       <button type="button" class="btn btn-danger mb-1 " onclick="elimina(this)"><i class="bi bi-x-lg"></i></button> </td>
                                    </tr>
										</tbody>
									</table>
								</div>
								
							</div>
						</div>
					</div>
                        
							</div>
                        </div>
                           </div>
   
                     <div class="mt-3 mb-5">
                        <p class="font-weight-normal text-justify text-center">
                           Se muestra la pantalla Gestion de clubes. Si hay clubes registrados, Aparecerán en la lista.
                        </p>
                     </div>
   
                     <div class="row mb-2">
                           <div class="col-md-12">
                              <div class="h4 text-dark text-center">Para REGISTRAR</div>
                           </div>  
                     </div>
   
                     <div class="row mb-3">
                        <div class="col-md-12">
                           <p class="font-weight-normal text-justify">
                           Para registrar un nuevo Club deberá presionar sobre <button type="button" id="modalform" class="btn btn-success "><i class="bi bi-plus-circle mr-1"></i>Nuevo registro</button>
                           y le aparecera un formulario como este el cual debe llenar con los datos correspondientes</p>
                        </div>               
                     </div>

                     <div class="container">
       <form id="formulario_gestion">
        <div class="row">
            <div class="col-md-6">
                <label for="codigo_club">Codigo del Club</label>
                <input class="form-control" maxlength="10" type="text" name="codigo_club" id="codigo_club">
                <span class="texto" id="scodigo_club" style="color: #ff0000;"></span>
            </div>

            <div class="col-md-6">
                <label for="nombre_club">Nombre del Club</label>
                <input class="form-control" maxlength="20" type="text" name="nombre_club" id="nombre_club">
                <span class="texto" id="snombre_club" style="color: #ff0000;"></span>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6">
                <label for="telefono_club">Telefono</label>
                <input class="form-control" maxlength="11" type="text" name="telefono_club" id="telefono_club" placeholder="Ej: &quot;04141234567&quot;">
                <span class="texto" id="stelefono_club" style="color: #ff0000;"></span>
            </div>
            <div class="col-md-6">
                <label for="deporte_club">Deporte Base</label>
                <select class="form-control" name="deporte_club" id="deporte_club">
                    <option value="" hidden="" selected="hidden">Seleccionar Opcion</option>
                    <option value=""></option>
                    <option>Taekwondo</option>
                    <option>Karate</option>
                    <option>Kapoeira</option>
                    <option>Judo</option>
                    <option>Boxeo</option>
                </select>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <label for="direccion_club">Direccion del Club</label>
                <input class="form-control" maxlength="30" type="text" name="direccion_club" id="direccion_club">
                <span class="texto" id="sdireccion_club" style="color: #ff0000;"></span>
            </div>
        </div><br>
    </form>
</div>

                    
                     <div class="container text-center mt-3">
                        <p class="font-weight-normal text-justify  text-center">
                        El usuario deberá rellenar correctamente cada uno de los espacios en blanco del formulario.
                        </p>
                     </div> 
                     <div class="mt-3">  
                        <p class="font-weight-normal text-justify text-center">
                           Luego presiona en el boton registrar donde aparecera el siguiente mensaje. <b>Presione el boton</b> <button type="button" id="registrar" class="btn btn-danger ml-2"><i class="bi bi-check-lg mr-1"></i>Registrar</button>
                        </p>
                     </div>
   
                     <div class="container text-center mt-3">
                        <p class="font-weight-normal text-justify  text-center">
                        OJO: si tiene un error ya sea en el formulario o en algún dato registrado, se mostrará
                        un mensaje que le dirá dónde está el error y no podrá registrar la información hasta 
                        Que lo ingrese correctamente.
                        </p>
                     </div> 
                     
   
                     <div class="row mb-3">
                        <div class="col-md-12">
                           <p class="font-weight-normal text-justify">
                           Una vez registrado el Club aparecerá en la lista. Donde podrá modificar o eliminar su información 
                        </div>
                     </div>
                     
                     <div class="container-fluid">
						<div class="row">
							<div class="col-md-12">
								<div class="table-responsive">
									<table class="table table-striped table-hover table-borderless" id="tablaconsulta" width="100%" cellspacing="0">
										<thead class="thead-dark">
											<tr> 
												<th>#Codigo</th>
												<th>Nombre</th>
												<th>Telefono</th>
												<th>Deporte Base</th>
												<th>Direccion</th>
												<th>Acciones</th>
												
											</tr>
										</thead>
										<tbody>
												<tr>
													<td>JMK991</td>
                                       <td>Los peleoneros</td>
                                       <td>0414082938</td>
                                       <td>Boxeo</td>
                                       <td>El Cuji, via hacia la veritas</td>
                                       <td><button type="button" class="btn btn-primary mb-1 mr-1" data-toggle="modal" data-target="#modal_gestion" onclick="modalmodificar(this)" id="boton_modificar"><i class="bi bi-pencil-fill"></i></button>
                                          <button type="button" class="btn btn-danger mb-1 " onclick="elimina(this)"><i class="bi bi-x-lg"></i></button></td>
												</tr>

                                    <tr>
                                       <td>TLT782</td>
                                       <td>Luisardos MT</td>
                                       <td>0416842063</td>
                                       <td>Taekwondo</td>
                                       <td>Cabudare, Urbanizacion El paraiso</td>
                                       <td><button type="button" class="btn btn-primary mb-1 mr-1" data-toggle="modal" data-target="#modal_gestion" onclick="modalmodificar(this)" id="boton_modificar"><i class="bi bi-pencil-fill"></i></button>
                                       <button type="button" class="btn btn-danger mb-1 " onclick="elimina(this)"><i class="bi bi-x-lg"></i></button> </td>
                                    </tr>

                                    <tr>
                                       <td>NC111</td>
                                       <td>Nuevo Club</td>
                                       <td>0412930759</td>
                                       <td>Karate</td>
                                       <td>Sarare, La miel</td>
                                       <td><button type="button" class="btn btn-primary mb-1 mr-1" data-toggle="modal" data-target="#modal_gestion" onclick="modalmodificar(this)" id="boton_modificar"><i class="bi bi-pencil-fill"></i></button>
                                       <button type="button" class="btn btn-danger mb-1 " onclick="elimina(this)"><i class="bi bi-x-lg"></i></button><td>
                                    </tr>
										</tbody>
									</table>
								</div>
								
							</div>
						</div>
					</div>
   
                     <div class="row mb-2">
                        <div class="col-md-12">
                           <div class="h4 text-dark text-center">Para MODIFICAR</div>
                        </div>  
                     </div>
   
                     <div class="row mb-3">
                        <div class="col-md-12">
                           <p class="font-weight-normal text-justify">
                           Para modificar la informacion de un  Club deberá presionar sobre <button type='button' class='btn btn-primary mb-1 mr-1 ml-2' id='boton_modificar'><i class='bi bi-pencil-fill'></i></button> y le aparecera un formulario como este:
                           </p>
                        </div>   
                       
   
                     <div class="container">
                     <form id="formulario_gestion">
        <div class="row">
            <div class="col-md-6">
                <label for="codigo_club">Codigo del Club</label>
                <input class="form-control" maxlength="10" type="text" name="codigo_club" id="codigo_club">
                <span class="texto" id="scodigo_club" style="color: #ff0000;"></span>
            </div>

            <div class="col-md-6">
                <label for="nombre_club">Nombre del Club</label>
                <input class="form-control" maxlength="20" type="text" name="nombre_club" id="nombre_club">
                <span class="texto" id="snombre_club" style="color: #ff0000;"></span>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6">
                <label for="telefono_club">Telefono</label>
                <input class="form-control" maxlength="11" type="text" name="telefono_club" id="telefono_club" placeholder="Ej: &quot;04141234567&quot;">
                <span class="texto" id="stelefono_club" style="color: #ff0000;"></span>
            </div>
            <div class="col-md-6">
                <label for="deporte_club">Deporte Base</label>
                <select class="form-control" name="deporte_club" id="deporte_club">
                    <option value="" hidden="" selected="hidden">Seleccionar Opcion</option>
                    <option value=""></option>
                    <option>Taekwondo</option>
                    <option>Karate</option>
                    <option>Kapoeira</option>
                    <option>Judo</option>
                    <option>Boxeo</option>
                </select>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <label for="direccion_club">Direccion del Club</label>
                <input class="form-control" maxlength="30" type="text" name="direccion_club" id="direccion_club">
                <span class="texto" id="sdireccion_club" style="color: #ff0000;"></span>
            </div>
        </div><br>
    </form>
</div> 
                     <div class="container text-center mt-3"> 
                        <p class="font-weight-normal text-justify text-center">
                           Despues de haber modificado los datos del club que desee puede <b>presionar el boton</b> <button type="button" class="btn btn-danger" id="modifica"><i class="bi bi-pencil-fill mr-1"></i>Modificar</button>
                        </p>
                     </div>          
                     <div class="row mb-2">
                           <div class="col-md-12">
                              <div class="h4 text-dark text-center">Para Eliminar</div>
                           </div>  
                     </div>
   
                     <div class="row mb-3">
                        <div class="col-md-12">
                           <p class=" text-center font-weight-normal text-justify">
                           Para eliminar un Club solo debe presionar sobre el boton <button type='button' class='btn btn-danger mb-1'><i class='bi bi-x-lg'></i></button> que esta se encuentra en las tablas y aparecera el siguiente mensaje. <b>Presione el boton</b> <button type='button'  class='btn btn-danger mb-1' id="eliminar"><i class='bi bi-x-lg'></i></button>
                           </p>
                        </div>               
                     </div>
   
   
                     <div class="container p3">
   
                        <div class="row mt-3">
                           <div class="col-md-12">
                              <div class="h3 text-dark">GESTION DEL PERSONAL</div>
                           </div>       
                        </div>
   
                        <div class="row">
                           <div class="col">
                                 <p class="font-weight-normal text-justify">
                                 Para llegar al gestionar personal dele click al boton <button class="btn btn-outline-dark btn-sm"><img src="img/iconos/clubes.png" style="width:30px;margin-right:10px;">Clubes</button>
                                  y despues click al boton: <button class="btn btn-outline-dark btn-sm"><img src="img/iconos/personal.png" style="width:30px;margin-right:10px;">Personal</button> y asi estara en el modulo de gestion de personal.
                              </p>
                                 </p>
                           </div>
                           </div>
		
         <div class="container-fluid mt-4 mb-3">
            <div class="row">
               <div class="col-auto mr-auto mb-2">
                  <div class="h4 text-dark">Gestionar Personal</div>
               </div>
               <div class="col-auto">
                  <button type="button" class="btn btn-success">
                     <i class="bi bi-plus-circle mr-1"></i>Nuevo registro
                  </button>
               </div>
            </div>
         </div>
            

                  <div class="table-responsive">
                     <table class="table table-striped table-hover table-borderless" id="tablaconsulta" width="100%" cellspacing="0">
                        <thead class="thead-dark">
                           <tr> 
                              <th>Club</th>
                              <th>Cedula</th>
                              <th>Nombre</th>
                              <th>Telefono</th>
                              <th>Cargo</th>
                              <th>Direccion</th>
                              <th>Acciones</th>
                           </tr>
                        </thead>
                        <tbody>
                        <tr>
                           <td>Luisardos TM</td>
                           <td>20057923</td>
                           <td>Pedro Gonzales</td>
                           <td>041608795</td>
                           <td>Asistente</td>
                           <td>Carrera 34 entre calles 27 y 28</td>
                           <td><button type="button" class="btn btn-primary mb-1 mr-1" id="boton_modificar"><i class="bi bi-pencil-fill"></i></button>
                                       <button type="button" class="btn btn-danger mb-1"><i class="bi bi-x-lg"></i></button> </td>
                        </tr>
                        </tbody>
                     </table>
                  </div>
   
                        <div class="mt-3 mb-5">
                           <p class="font-weight-normal text-justify text-center">
                              Se muestra la pantalla Gestion del Personal. Si hay algun personal registrados, Aparecerán en la lista.
                           </p>
                        </div>
   
                        <div class="row mb-2">
                              <div class="col-md-12">
                                 <div class="h4 text-dark text-center">Para REGISTRAR</div>
                              </div>  
                        </div>
   
                        <div class="row mb-3">
                           <div class="col-md-12">
                              <p class="font-weight-normal text-justify">
                              Para registrar un personal deberá presionar sobre <button class="btn btn-success "><i class="bi bi-plus-circle mr-1"></i>Nuevo registro</button> y se le abrira el formulario de registro:
                              </p>
                           </div>               
                        </div>
   
                        <div class="container">
    <form id="formulario_personal">
        <div class="row">
            <div class="col-md-12">
                <label for="club_personal">Seleccionar el Club</label>
                <select class="form-control" name="club_personal" id="club_personal">
                    <option value="" hidden="" selected="hidden">Seleccionar Opcion</option>
                    <option value=""></option>
                    <option>Luisardos TM</option>
                </select>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6">
                <label for="cedula_personal">Cedula</label>
                <input class="form-control" maxlength="8" type="text" name="cedula_personal" id="cedula_personal" placeholder="Ej: &quot;15345987&quot;">
                <span class="texto" id="scedula_personal" style="color: #ff0000;"></span>
            </div>
            <div class="col-md-6">
                <label for="nombres_personal">Nombres</label>
                <input class="form-control" maxlength="20" type="text" name="nombres_personal" id="nombres_personal" placeholder="Ej: &quot;Diego Alejandro&quot;">
                <span class="texto" id="snombres_personal" style="color: #ff0000;"></span>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6">
                <label for="apellidos_personal">Apellidos</label>
                <input class="form-control" maxlength="20" type="text" name="apellidos_personal" id="apellidos_personal" placeholder="Ej: &quot;Aguilar Suarez&quot;">
                <span class="texto" id="sapellidos_personal" style="color: #ff0000;"></span>
            </div>
            <div class="col-md-6">
                <label for="telefono_personal">Telefono</label>
                <input class="form-control" maxlength="11" type="text" name="telefono_personal" id="telefono_personal" placeholder="Ej: &quot;04141234567&quot;">
                <span class="texto" id="stelefono_personal" style="color: #ff0000;"></span>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6">
                <label for="cargo_personal">Cargo</label>
                <select class=" form-control" name="cargo_personal" id="cargo_personal">
                    <option value="" hidden="" selected="hidden">Seleccionar Opcion</option>
                    <option value=""></option>
                    <option>Presidente</option>
                    <option>Administrador</option>
                    <option>Secretaria</option>
                    <option>Entrenador</option>
                </select>
            </div>

            <div class="col-md-6">
                <label for="direccion_personal">Direccion</label>
                <input class="form-control" maxlength="30" type="text" name="direccion_personal" id="direccion_personal">
                <span class="texto" id="sdireccion_personal" style="color: #ff0000;"></span>
            </div>
         </div>
    </form>
</div>
   
                        <div class="container text-center mt-3">
                           <p class="font-weight-normal text-justify  text-center">
                           El usuario deberá rellenar correctamente cada uno de los espacios en blanco del formulario con los datos correspondientes.
                           <br>Luego presiona en el boton registrar donde aparecera el siguiente mensaje. <b>Presione el boton</b> <button type="button" id="registrar1" class="btn btn-danger ml-2"><i class="bi bi-check-lg mr-1"></i>Registrar</button>
                           </p>
                        </div>
   
                        <div class="container text-center mt-3">
                           <p class="font-weight-normal text-justify  text-center">
                           OJO: si tiene un error ya sea en el formulario o en algún dato registrado, se mostrará
                           un mensaje que le dirá dónde está el error y no podrá registrar la información hasta 
                           Que lo ingrese correctamente.
                           </p>
                        </div> 
   
   
                        <div class="row mb-3">
                           <div class="col-md-12">
                              <p class="font-weight-normal text-justify">
                              Una vez registrado el Personal aparecerá en la lista. Donde podrá modificar o eliminar su información 
                           </div>
                        </div>
   
                        <div class="table-responsive">
                     <table class="table table-striped table-hover table-borderless" id="tablaconsulta" width="100%" cellspacing="0">
                        <thead class="thead-dark">
                           <tr> 
                              <th>Club</th>
                              <th>Cedula</th>
                              <th>Nombre</th>
                              <th>Telefono</th>
                              <th>Cargo</th>
                              <th>Direccion</th>
                              <th>Acciones</th>
                           </tr>
                        </thead>
                        <tbody>
                        <tr>
                           <td>Luisardos TM</td>
                           <td>20057923</td>
                           <td>Pedro Gonzales</td>
                           <td>041608795</td>
                           <td>Asistente</td>
                           <td>Carrera 34 entre calles 27 y 28</td>
                           <td><button type="button" class="btn btn-primary mb-1 mr-1" id="boton_modificar"><i class="bi bi-pencil-fill"></i></button>
                                       <button type="button" class="btn btn-danger mb-1"><i class="bi bi-x-lg"></i></button> </td>
                        </tr>

                        <tr>
                           <td>Tortugas Luchonas</td>
                           <td>23057103</td>
                           <td>Juan Gomez</td>
                           <td>0412075906</td>
                           <td>Entrenador</td>
                           <td>Cabudare</td>
                           <td><button type="button" class="btn btn-primary mb-1 mr-1" id="boton_modificar"><i class="bi bi-pencil-fill"></i></button>
                                       <button type="button" class="btn btn-danger mb-1"><i class="bi bi-x-lg"></i></button></td>
                        </tr>
                        </tbody>
                     </table>
                  </div>
   
                        <div class="row mb-2">
                           <div class="col-md-12">
                              <div class="h4 text-dark text-center">Para MODIFICAR</div>
                           </div>  
                        </div>
   
                        <div class="row mb-3">
                           <div class="col-md-12">
                              <p class="font-weight-normal text-justify">
                              Para modificar la informacion del personal deberá presionar sobre <button type='button' class='btn btn-primary mb-1 mr-1 ml-2' id='boton_modificar'><i class='bi bi-pencil-fill'></i></button>
                              </p>
                           </div>   
                              <div>  
                                 
                              <form id="formulario_personal">
        <div class="row">
            <div class="col-md-12">
                <label for="club_personal">Seleccionar el Club</label>
                <select class="form-control" name="club_personal" id="club_personal">
                    <option value="" hidden="" selected="hidden">Seleccionar Opcion</option>
                    <option value=""></option>
                    <option>Luisardos TM</option>
                    <option>Tortugas Luchonas</option>
                </select>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6">
                <label for="cedula_personal">Cedula</label>
                <input class="form-control" maxlength="8" type="text" name="cedula_personal" id="cedula_personal" placeholder="Ej: &quot;15345987&quot;">
                <span class="texto" id="scedula_personal" style="color: #ff0000;"></span>
            </div>
            <div class="col-md-6">
                <label for="nombres_personal">Nombres</label>
                <input class="form-control" maxlength="20" type="text" name="nombres_personal" id="nombres_personal" placeholder="Ej: &quot;Diego Alejandro&quot;">
                <span class="texto" id="snombres_personal" style="color: #ff0000;"></span>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6">
                <label for="apellidos_personal">Apellidos</label>
                <input class="form-control" maxlength="20" type="text" name="apellidos_personal" id="apellidos_personal" placeholder="Ej: &quot;Aguilar Suarez&quot;">
                <span class="texto" id="sapellidos_personal" style="color: #ff0000;"></span>
            </div>
            <div class="col-md-6">
                <label for="telefono_personal">Telefono</label>
                <input class="form-control" maxlength="11" type="text" name="telefono_personal" id="telefono_personal" placeholder="Ej: &quot;04141234567&quot;">
                <span class="texto" id="stelefono_personal" style="color: #ff0000;"></span>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6">
                <label for="cargo_personal">Cargo</label>
                <select class=" form-control" name="cargo_personal" id="cargo_personal">
                    <option value="" hidden="" selected="hidden">Seleccionar Opcion</option>
                    <option value=""></option>
                    <option>Presidente</option>
                    <option>Administrador</option>
                    <option>Secretaria</option>
                    <option>Entrenador</option>
                </select>
            </div>

            <div class="col-md-6">
                <label for="direccion_personal">Direccion</label>
                <input class="form-control" maxlength="30" type="text" name="direccion_personal" id="direccion_personal">
                <span class="texto" id="sdireccion_personal" style="color: #ff0000;"></span>
            </div>
         </div>
    </form>
</div>
   
                              <div class="mt-3">  
                                 <p class="font-weight-normal text-justify text-center">
                                    Aparece el formulario con la información del personal, Se modifica el dato que se desee y presiona en moficicar. <b>Presione el boton</b> <button type="button" class="btn btn-danger" id="modifica1"><i class="bi bi-pencil-fill mr-1"></i>Modificar</button>
                                 </p>
                              </div>
   
                              <div class="row mb-2">
                                    <div class="col-md-12">
                                       <div class="h4 text-dark text-center">Para Eliminar</div>
                                    </div>  
                              </div>
   
                              <div class="row mb-3">
                                 <div class="col-md-12">
                                    <br><p class=" text-center font-weight-normal text-justify">
                                    Para eliminar un personal solo debe presionar sobre el boton <button type='button'  class='btn btn-danger mb-1'><i class='bi bi-x-lg'></i></button> y aparecera el siguiente mensaje. <b>Presione el boton</b> <button type='button'  class='btn btn-danger mb-1' id="eliminar1"><i class='bi bi-x-lg'></i></button>
                                    </p>
                                 </div>               
                              </div>
                  <div class="container p3">
   
                  <div class="row mt-3">
                     <div class="col-md-12">
                        <div class="h3 text-dark">GESTION DE ATLETAS</div>
                     </div>       
                  </div>
   
                  <div class="row">
                     <div class="col">
                           <p class="font-weight-normal text-justify">
                              En el menu desplegable, Al presionar sobre la opcion: 
                              <button class="btn btn-outline-dark btn-sm">
                                 <img src="img/iconos/atleta.png" style="width:30px;margin-right:10px;">
                                 Atletas</button> y de nuevo darle a <button class="btn btn-outline-dark btn-sm">
                                 <img src="img/iconos/atleta.png" style="width:30px;margin-right:10px;">
                                 Atletas</button> y se mostrara la pantalla de gestion de atletas:
                           </p>
                     </div>
                  </div>
                   
					<div class="container-fluid mt-4 mb-3">
						<div class="row justify-content-between">
							<div class="col-auto mr-auto mb-2">
								<div class="h4 text-dark">Gestionar Atletas</div>
							</div>
							<div class="col-auto"> 
								<button type="button" class="btn btn-success" id="boton_nuevo">
									<i class="bi bi-plus-circle mr-1"></i>Nuevo registro
								</button>
							</div>
						</div>
					</div>
               
               <div class="row">
						<div class="col-md-12" >
							<div class="table-responsive">
								<table class="table table-striped table-hover table-borderless" id="tablaconsulta" width="100%" cellspacing="0">
									<thead class="thead-dark">
										<th>Club</th>
										<th>foto</th>
										<th>Cedula</th>
										<th>Nombre</th>
										<th>Apellido</th>
										<th>Peso</th>
										<th>Estatura</th>
										<th>F. nacimiento</th>
										<th>Telefono</th>
										<th>Sexo</th>
										<th>Deporte</th>
										<th>Categoria</th>
										<th>F. Ingreso</th>
										<th>Entrenador</th>
										<th>Acciones</th>
									</thead>
									<tbody id="resultadoconsulta">
											<tr>
												<td>Luisardos</td>
												<td></td>
												<td>25431977</td>
												<td>Juan</td>
												<td>Dominguez</td>
												<td>87Kg</td>
												<td>1.90</td>
												<td>12/01/2000</td>
                                    <td>04168332764</td>
												<td>Masculino</td>
												<td>Taekwondo</td>
												<td>Categoria 2</td>
												<td>20/08/2015</td>
												<td>Edward Pereira</td>
												<td><button type="button" class="btn btn-primary mb-1 mr-1" id="boton_modificar"><i class="bi bi-pencil-fill"></i></button>
                                       <button type="button" class="btn btn-danger mb-1"><i class="bi bi-x-lg"></i></button></td>		
											</tr>
                                 <tr>
                                    <td>Tortugas Luchonas</td>
                                    <td></td>
                                    <td>23821654</td>
                                    <td>Julio</td>
                                    <td>Jimenez</td>
                                    <td>93Kg</td>
                                    <td>1.70</td>
                                    <td>01/05/2003</td>
                                    <td>04247429421</td>
                                    <td>Masculino</td>
                                    <td>Boxeo</td>
                                    <td>Categoria 1</td>
                                    <td>13/09/2017</td>
                                    <td>Miguel Gonzalez</td>
                                    <td><button type="button" class="btn btn-primary mb-1 mr-1" id="boton_modificar"><i class="bi bi-pencil-fill"></i></button>
                                       <button type="button" class="btn btn-danger mb-1"><i class="bi bi-x-lg"></i></button></td>
                                 </tr>
									</tbody>
								</table>
							</div>						
						</div>
					</div>

                                
                  <div class="mt-3 mb-5">
                     <p class="font-weight-normal text-justify text-center">
                        Se muestra la pantalla Gestion de Atleta. Si hay algun atleta registrados, Aparecerán en la lista.
                     </p>
                  </div>
               
                  <div class="row mb-2">
                        <div class="col-md-12">
                           <div class="h4 text-dark text-center">Para REGISTRAR</div>
                        </div>  
                  </div>
   
                  <div class="row mb-3">
                     <div class="col-md-12">
                        <p class="font-weight-normal text-justify">
                        Para registrar un Atleta deberá presionar sobre <button class="btn btn-success "><i class="bi bi-plus-circle mr-1"></i>Nuevo registro</button>
                        y le aparecera el siguiente formulario:</p>
                     </div>               
                  </div>
   
                  <div class="container-fluid">
						<div class="row">
							<div class="col-md-12">
								<center>
									<label for="archivo" style="cursor:pointer">
										<img src="img/atletas/icono_persona.png" id="imagen" class="img-fluid rounded my-4 centered" style="object-fit:scale-down;width:80px">
											Click aqui para subir foto
									</label>
									<input type="file" id="archivo" name="imagenarchivo" style="display:none" accept=".png,.jpg,.jpeg">
								</center>
							</div>
						</div>

						<div class="row"> 
							<div class="col-md-12 mb-2">
								<label for="club_atleta">Club del Atleta</label>
								<select class=" form-control" name="club_atleta" id="club_atleta">
									<option value="" hidden="" selected="hidden">Seleccione un club</option>
                           <option value=""></option>
									<option value="Luisardos">Luisardos</option>
                           <option value="Tortugas Luchonas">Tortugas Luchonas</option>
								</select>
							</div>
						</div>

						<div class="row">
							<div class="col-md-6 mb-2">
								<label for="cedula_atleta">Cedula</label>
								<input class="form-control" maxlength="8" type="text" name="cedula_atleta" id="cedula_atleta" placeholder="Ej: &quot;15345987&quot;">
								<span class="texto" id="scedula_atleta" style="color: #ff0000;"></span>
							</div>
							<div class="col-md-6 mb-2">
								<label for="nombres_atleta">Nombre</label>
								<input class="form-control" maxlength="24" type="text" name="nombres_atleta" id="nombres_atleta" placeholder="Ej: &quot;Luis Gustavo&quot;">
								<span class="texto" id="snombres_atleta" style="color: #ff0000;"></span>
							</div>
						</div>

						<div class="row">
							<div class="col-md-6 mb-2">
								<label for="apellidos_atleta">Apellido</label>
								<input class="form-control" maxlength="25" type="text" name="apellidos_atleta" id="apellidos_atleta" placeholder="Ej: &quot;Perdomo Perez&quot;">
								<span class="texto" id="sapellidos_atleta" style="color: #ff0000;"></span>
							</div>
							<div class="col-md-6 mb-2">
								<label for="peso_atleta">Peso (Kg)</label>
								<input class="form-control" maxlength="5" type="text" name="peso_atleta" id="peso_atleta" placeholder="Ej: &quot;56.4&quot;">
								<span class="texto" id="speso_atleta" style="color: #ff0000;"></span>
							</div>
						</div>

						<div class="row">							
							<div class="col-md-6 mb-2">
								<label for="estatura_atleta">Estatura (Metros)</label>
								<input class="form-control" maxlength="4" type="text" name="estatura_atleta" id="estatura_atleta" placeholder="Ej: &quot;1.68&quot;">
								<span class="texto" id="sestatura_atleta" style="color: #ff0000;"></span>
							</div>
							<div class="col-md-6 mb-2">
								<label for="fecha_atleta">Fecha de Nacimiento</label>
								<input class="form-control" type="date" name="fecha_atleta" id="fecha_atleta">
							</div>
						</div> 

						<div class="row">				
							<div class="col-md-6 mb-2">
								<label for="telefono_atleta">Telefono</label>
								<input class="form-control" maxlength="11" type="text" name="telefono_atleta" id="telefono_atleta" placeholder="Ej: &quot;04141234567&quot;">
								<span class="texto" id="stelefono_atleta" style="color: #ff0000;"></span>
							</div>
							<div class="col-md-6 mb-2">
								<label for="sexo_atleta">Sexo</label>
								<select class="form-control"  name="sexo_atleta" id="sexo_atleta">
									<option value="" hidden="" selected="hidden">Seleccionar Opcion</option>
									<option value=""></option>
									<option value="Masculino">Masculino</option>
									<option value="Femenino">Femenino</option>
								</select> 
							</div>
						</div>
						
						<div class="row">
							<div class="col-md-6 mb-2">
								<label for="deporte_atleta">Deporte Base del Atleta</label>
								<select class="form-control" name="deporte_atleta" id="deporte_atleta">
									<option value="" hidden="" selected="hidden">Seleccionar Opcion</option>
									<option value=""></option>
									<option value="Taekwondo">Taekwondo</option>
									<option value="Karate">Karate</option>
									<option value="Kapoeira">Kapoeira</option>
									<option value="Judo">Judo</option>
									<option value="Boxeo">Boxeo</option>
								</select>
							</div>
							<div class="col-md-6 mb-2">
								<label for="categoria_atleta">Categoria del Atleta</label>
								<select class=" form-control" name="categoria_atleta" id="categoria_atleta">
									<option value="" hidden="" selected="hidden">Seleccionar Opcion</option>
									<option value=""></option>
									<option value="Categoria 1">Categoria 1</option>
									<option value="Categoria 2">Categoria 2</option>
									<option value="Categoria 3">Categoria 3</option>
								</select> 
							</div>
						</div>

						<div class="row">			
							<div class="col-md-6 mb-2">
								<label for="fecha_ingreso_atleta">Fecha de Ingreso al Club</label>
								<input class="form-control" type="date" name="fecha_ingreso_atleta" id="fecha_ingreso_atleta">
							</div>
							<div class="col-md-6 mb-2">
								<label for="entrenador_atleta">Entrenador del Atleta</label>
								<input class="form-control" maxlength="25" type="text" name="entrenador_atleta" id="entrenador_atleta">
								<span class="texto" id="sentrenador_atleta" style="color: #ff0000;"></span>
							</div>
						</div>
					</div>
   
                  <div class="container text-center mt-3">
                     <p class="font-weight-normal text-justify  text-center">
                     El usuario deberá rellenar correctamente cada uno de los espacios en blanco del formulario.
                     </p>
                  </div> 

                  <div class="mt-3">  
                     <p class="font-weight-normal text-justify text-center">
                        Luego de ingresar todos los datos del atleta se procede a presionar en el boton registrar donde aparecera el siguiente mensaje. <b>Presione el boton</b> <button type="button" id="registrar2" class="btn btn-danger ml-2"><i class="bi bi-check-lg mr-1"></i>Registrar</button>
                     </p>
                  </div>
   
                  <div class="container text-center mt-3">
                     <p class="font-weight-normal text-justify  text-center">
                     OJO: si tiene un error ya sea en el formulario o en algún dato registrado, se mostrará
                     un mensaje que le dirá dónde está el error y no podrá registrar la información hasta 
                     Que lo ingrese correctamente.
                     </p>
                  </div> 
   
   
                  <div class="row mb-3">
                     <div class="col-md-12">
                        <p class="font-weight-normal text-justify">
                        Una vez registrado el Atleta aparecerá en la lista. Donde podrá modificar o eliminar su información 
                     </div>
                  </div>
   
                  <div class="row">
						<div class="col-md-12" >
							<div class="table-responsive">
								<table class="table table-striped table-hover table-borderless" id="tablaconsulta" width="100%" cellspacing="0">
									<thead class="thead-dark">
										<th>Club</th>
										<th>foto</th>
										<th>Cedula</th>
										<th>Nombre</th>
										<th>Apellido</th>
										<th>Peso</th>
										<th>Estatura</th>
										<th>F. nacimiento</th>
										<th>Telefono</th>
										<th>Sexo</th>
										<th>Deporte</th>
										<th>Categoria</th>
										<th>F. Ingreso</th>
										<th>Entrenador</th>
										<th>Acciones</th>
									</thead>
									<tbody id="resultadoconsulta">
											<tr>
												<td>Luisardos</td>
												<td></td>
												<td>25431977</td>
												<td>Juan</td>
												<td>Dominguez</td>
												<td>87Kg</td>
												<td>1.90</td>
												<td>12/01/2000</td>
                                    <td>04168332764</td>
												<td>Masculino</td>
												<td>Taekwondo</td>
												<td>Categoria 2</td>
												<td>20/08/2015</td>
												<td>Edward Pereira</td>
												<td><button type="button" class="btn btn-primary mb-1 mr-1" id="boton_modificar"><i class="bi bi-pencil-fill"></i></button>
                                       <button type="button" class="btn btn-danger mb-1"><i class="bi bi-x-lg"></i></button></td>		
											</tr>
                                 <tr>
                                    <td>Tortugas Luchonas</td>
                                    <td></td>
                                    <td>23821654</td>
                                    <td>Julio</td>
                                    <td>Jimenez</td>
                                    <td>93Kg</td>
                                    <td>1.70</td>
                                    <td>01/05/2003</td>
                                    <td>04247429421</td>
                                    <td>Masculino</td>
                                    <td>Boxeo</td>
                                    <td>Categoria 1</td>
                                    <td>13/09/2017</td>
                                    <td>Miguel Gonzalez</td>
                                    <td><button type="button" class="btn btn-primary mb-1 mr-1" id="boton_modificar"><i class="bi bi-pencil-fill"></i></button>
                                       <button type="button" class="btn btn-danger mb-1"><i class="bi bi-x-lg"></i></button></td>
                                 </tr>
                                 <tr>
                                    <td>Peleotas Club</td>
                                    <td></td>
                                    <td>26418043</td>
                                    <td>Mario</td>
                                    <td>de las Casas</td>
                                    <td>85Kg</td>
                                    <td>1.72</td>
                                    <td>09/03/1998</td>
                                    <td>04128539526</td>
                                    <td>Masculino</td>
                                    <td>Boxeo</td>
                                    <td>Categoria 1</td>
                                    <td>28/05/2015</td>
                                    <td>Roberto Juica</td>
                                    <td><button type="button" class="btn btn-primary mb-1 mr-1" id="boton_modificar"><i class="bi bi-pencil-fill"></i></button>
                                       <button type="button" class="btn btn-danger mb-1"><i class="bi bi-x-lg"></i></button></td>
                                 </tr>
									</tbody>
								</table>
							</div>						
						</div>
					</div>
               <br>
   
                  <div class="row mb-2">
                     <div class="col-md-12">
                        <div class="h4 text-dark text-center">Para MODIFICAR</div>
                     </div>  
                  </div>
   
                  <div class="row mb-3">
                     <div class="col-md-12">
                           <p class="font-weight-normal text-justify">
                           Para modificar la informacion del Atleta deberá presionar sobre <button type='button' class='btn btn-primary mb-1 mr-1 ml-2' id='boton_modificar'><i class='bi bi-pencil-fill'></i></button>
                           y le volvera a aparecer un formulario donde podra editar los datos de los atletas ya registrados:</p>
                     </div>     

                     <div class="container-fluid">
						<div class="row">
							<div class="col-md-12">
								<center>
									<label for="archivo" style="cursor:pointer">
										<img src="img/atletas/icono_persona.png" id="imagen" class="img-fluid rounded my-4 centered" style="object-fit:scale-down;width:80px">
											Click aqui para subir foto
									</label>
									<input type="file" id="archivo" name="imagenarchivo" style="display:none" accept=".png,.jpg,.jpeg">
								</center>
							</div>
						</div>

						<div class="row"> 
							<div class="col-md-12 mb-2">
								<label for="club_atleta">Club del Atleta</label>
								<select class=" form-control" name="club_atleta" id="club_atleta">
									<option value="" hidden="" selected="hidden">Seleccione un club</option>
                           <option value=""></option>
									<option value="Luisardos">Luisardos</option>
                           <option value="Tortugas Luchonas">Tortugas Luchonas</option>
								</select>
							</div>
						</div>

						<div class="row">
							<div class="col-md-6 mb-2">
								<label for="cedula_atleta">Cedula</label>
								<input class="form-control" maxlength="8" type="text" name="cedula_atleta" id="cedula_atleta" placeholder="Ej: &quot;15345987&quot;">
								<span class="texto" id="scedula_atleta" style="color: #ff0000;"></span>
							</div>
							<div class="col-md-6 mb-2">
								<label for="nombres_atleta">Nombre</label>
								<input class="form-control" maxlength="24" type="text" name="nombres_atleta" id="nombres_atleta" placeholder="Ej: &quot;Luis Gustavo&quot;">
								<span class="texto" id="snombres_atleta" style="color: #ff0000;"></span>
							</div>
						</div>

						<div class="row">
							<div class="col-md-6 mb-2">
								<label for="apellidos_atleta">Apellido</label>
								<input class="form-control" maxlength="25" type="text" name="apellidos_atleta" id="apellidos_atleta" placeholder="Ej: &quot;Perdomo Perez&quot;">
								<span class="texto" id="sapellidos_atleta" style="color: #ff0000;"></span>
							</div>
							<div class="col-md-6 mb-2">
								<label for="peso_atleta">Peso (Kg)</label>
								<input class="form-control" maxlength="5" type="text" name="peso_atleta" id="peso_atleta" placeholder="Ej: &quot;56.4&quot;">
								<span class="texto" id="speso_atleta" style="color: #ff0000;"></span>
							</div>
						</div>

						<div class="row">							
							<div class="col-md-6 mb-2">
								<label for="estatura_atleta">Estatura (Metros)</label>
								<input class="form-control" maxlength="4" type="text" name="estatura_atleta" id="estatura_atleta" placeholder="Ej: &quot;1.68&quot;">
								<span class="texto" id="sestatura_atleta" style="color: #ff0000;"></span>
							</div>
							<div class="col-md-6 mb-2">
								<label for="fecha_atleta">Fecha de Nacimiento</label>
								<input class="form-control" type="date" name="fecha_atleta" id="fecha_atleta">
							</div>
						</div> 

						<div class="row">				
							<div class="col-md-6 mb-2">
								<label for="telefono_atleta">Telefono</label>
								<input class="form-control" maxlength="11" type="text" name="telefono_atleta" id="telefono_atleta" placeholder="Ej: &quot;04141234567&quot;">
								<span class="texto" id="stelefono_atleta" style="color: #ff0000;"></span>
							</div>
							<div class="col-md-6 mb-2">
								<label for="sexo_atleta">Sexo</label>
								<select class="form-control"  name="sexo_atleta" id="sexo_atleta">
									<option value="" hidden="" selected="hidden">Seleccionar Opcion</option>
									<option value=""></option>
									<option value="Masculino">Masculino</option>
									<option value="Femenino">Femenino</option>
								</select> 
							</div>
						</div>
						
						<div class="row">
							<div class="col-md-6 mb-2">
								<label for="deporte_atleta">Deporte Base del Atleta</label>
								<select class="form-control" name="deporte_atleta" id="deporte_atleta">
									<option value="" hidden="" selected="hidden">Seleccionar Opcion</option>
									<option value=""></option>
									<option value="Taekwondo">Taekwondo</option>
									<option value="Karate">Karate</option>
									<option value="Kapoeira">Kapoeira</option>
									<option value="Judo">Judo</option>
									<option value="Boxeo">Boxeo</option>
								</select>
							</div>
							<div class="col-md-6 mb-2">
								<label for="categoria_atleta">Categoria del Atleta</label>
								<select class=" form-control" name="categoria_atleta" id="categoria_atleta">
									<option value="" hidden="" selected="hidden">Seleccionar Opcion</option>
									<option value=""></option>
									<option value="Categoria 1">Categoria 1</option>
									<option value="Categoria 2">Categoria 2</option>
									<option value="Categoria 3">Categoria 3</option>
								</select> 
							</div>
						</div>

						<div class="row">			
							<div class="col-md-6 mb-2">
								<label for="fecha_ingreso_atleta">Fecha de Ingreso al Club</label>
								<input class="form-control" type="date" name="fecha_ingreso_atleta" id="fecha_ingreso_atleta">
							</div>
							<div class="col-md-6 mb-2">
								<label for="entrenador_atleta">Entrenador del Atleta</label>
								<input class="form-control" maxlength="25" type="text" name="entrenador_atleta" id="entrenador_atleta">
								<span class="texto" id="sentrenador_atleta" style="color: #ff0000;"></span>
							</div>
						</div>
                     
                     <div class="mt-3">  
                        <p class="font-weight-normal text-justify text-center">
                           Aparece el formulario con la información del Atleta, Se modifica el dato que se desee y presiona en modificar. <b>Presione el boton</b> <button type="button" class="btn btn-danger" id="modifica2"><i class="bi bi-pencil-fill mr-1"></i>Modificar</button>
                        </p>
                     </div>
   
                     <div class="row mb-2">
                           <div class="col-md-12">
                              <div class="h4 text-dark text-center">Para Eliminar</div>
                           </div>  
                     </div>
   
                     <div class="row mb-3">
                        <div class="col-md-12">
                              <p class=" text-center font-weight-normal text-justify">
                                 Para elimnar un Atleta solo debe presionar sobre el boton y aparecera el siguiente mensaje. <b>Presione el boton</b> <button type='button'  class='btn btn-danger mb-1' id="eliminar2"><i class='bi bi-x-lg'></i></button>
                              </p>
                        </div>               
                     </div>
                  </div>
                  <div class="container p3">
   
                     <div class="row mt-3">
                        <div class="col-md-12">
                           <div class="h3 text-dark">GESTIONAR INFORMACION MEDICA DEL ATLETA</div>
                        </div>       
                     </div>
   
                     <div class="row">
                        <div class="col">
                              <p class="font-weight-normal text-justify">
                                 En el menu desplegable presione el boton <button class="btn btn-outline-dark btn-sm"><img src="img/iconos/atleta.png" style="width:30px;margin-right:10px;">
                                 Atletas</button> y despues al boton de: <button class="btn btn-outline-dark btn-sm"><img src="img/iconos/salud.png" style="width:30px;margin-right:10px;">Datos Medicos</button>
                                 y asi llegara a la vista principal:
                              </p>
                        </div>
                     </div>
   
                     <div class="mt-4 mb-3">
						<div class="row">
							<div class="col-auto mr-auto mb-2">
								<div class="h4 text-dark">Gestionar Informacion Medica de Atletas</div>
							</div> 
							<div class="col-auto">
								<button type="button" class="btn btn-success"  data-toggle="modal" data-target="#modal_gestion" id="boton_nuevo" onclick="modalregistrar()">
									<i class="bi bi-plus-circle mr-1"></i>Nuevo registro
								</button>
							</div>
						</div>
					</div>
						
					<div class="row">
						<div class="col-md-12" >
							<div class="table-responsive">
								<table class="table table-striped table-hover table-borderless" id="tablaconsulta" width="100%" cellspacing="0">
									<thead class="thead-dark">
										<th>Cedula</th>
										<th>Nombre atleta</th>
										<th>Medicamento que consume</th>
										<th>Enfermedad que padece</th>
										<th>Discapacidad que posee</th>
										<th>Dieta alimenticia</th>
										<th>Enfermedades pasadas</th>
										<th>Nombre de emergencia</th>
										<th>Tlf. de emergencia</th>
										<th>Tipo de relacion</th>
										<th>Acciones</th>
									</thead>
									<tbody id="resultadoconsulta">
											<tr>
												<td>27842856</td>
												<td>Mario de las Casas</td>
												<td>Ibuprofeno</td>
												<td>Ninguna</td>
												<td>Ninguna</td>
												<td>Basada en proteina</td>
												<td>Dengue</td>
												<td>Laura Caceres</td>
												<td>04148329421</td>
												<td>Pareja</td>
												<td><button type="button" class="btn btn-primary mb-1 mr-1" id="boton_modificar"><i class="bi bi-pencil-fill"></i></button>
                                       <button type="button" class="btn btn-danger mb-1"><i class="bi bi-x-lg"></i></button></td>
											</tr>
                                 <tr>
                                    <td>23821654</td>
                                    <td>Julio Jimenez</td>
                                    <td>Acetaminofen</td>
                                    <td>Ninguna</td>
                                    <td>Ninguna</td>
                                    <td>Basada en carbohidratos</td>
                                    <td>Covid</td>
                                    <td>Maria Alvarado</td>
                                    <td>0412005921</td>
                                    <td>Familiar</td>
                                    <td><button type="button" class="btn btn-primary mb-1 mr-1" id="boton_modificar"><i class="bi bi-pencil-fill"></i></button>
                                       <button type="button" class="btn btn-danger mb-1"><i class="bi bi-x-lg"></i></button></td>
                                 </tr>
									</tbody>
								</table>
							</div>
							
						</div>
					</div>
   
                     <div class="mt-3 mb-5">
                        <p class="font-weight-normal text-justify text-center">
                           En primer lugar, Si hay información médica registrada, Aparecerán en la lista.
                        </p>
                     </div>
   
                     <div class="row mb-2">
                           <div class="col-md-12">
                              <div class="h4 text-dark text-center">Para REGISTRAR</div>
                           </div>  
                     </div>
   
                     <div class="row mb-3">
                        <div class="col-md-12">
                           <p class="font-weight-normal text-justify">
                           Para registrar informacion medica deberá presionar sobre <button class="btn btn-success "><i class="bi bi-plus-circle mr-1"></i>Nuevo registro</button>
                           y le aparecera el siguiente formulario:</p>
                        </div>               
                     </div>
   
                     <div class="container-fluid">
						<div class="row"> 
							<div class="col-md-12 mb-2">
								<label for="nombre_atleta">Atleta</label>
								<select class=" form-control" name="nombre_atleta" id="nombre_atleta">
									<option value="" hidden="" selected="hidden">Seleccione Opcion</option>
									<option value=""></option>
                           <option value="Mario de la Casas">Mario de la Casas</option>
                           <option value="Julio Jimenez">Julio Jimenez</option>
								</select>
							</div>
					</div>

					<div class="row">
						<div class="col-md-6 mb-2">
							<label for="medicamento_atleta">Medicamento que consume</label>
							<input class="form-control" maxlength="50" type="text" id="medicamento_atleta" name="medicamento_atleta" placeholder="Ej: &quot;Ninguno, Diclofenaco...&quot;">
							<span class="texto" id="smedicamento_atleta" style="color: #ff0000;"></span>
						</div>

						<div class="col-md-6 mb-2">
							<label for="enfermedad_atleta">Enfermedad que padezca actualmente</label>
							<input class="form-control" maxlength="50" type="text" id="enfermedad_atleta" name="enfermedad_atleta" placeholder="Ej: &quot;Ninguno, Artritis&quot;">
							<span class="texto" id="senfermedad_atleta" style="color: #ff0000;"></span>
						</div>

					</div>

					<div class="row">
						<div class="col-md-6 mb-2">
							<label for="discapacidad_atleta">Discapacidad que posee</label>
							<input class="form-control" maxlength="50" type="text" id="discapacidad_atleta" name="discapacidad_atleta" placeholder="Ej:  &quot;Ninguno...&quot;">
							<span class="texto" id="sdiscapacidad_atleta" style="color: #ff0000;"></span>
						</div>

						<div class="col-md-6 mb-2">
							<label for="dieta_atleta">Dieta alimenticia</label>
							<input class="form-control" maxlength="50" type="text" id="dieta_atleta" name="dieta_atleta" placeholder="Ej:  &quot;Ninguno, Proteina Pura...&quot;">
							<span class="texto" id="sdieta_atleta" style="color: #ff0000;"></span>
						</div>

					</div>

					<div class="row">
						<div class="col-md-6 mb-2">
							<label for="enfermedades_pasadas">Enfermedades Pasadas</label>
							<input class="form-control" maxlength="50" type="text" id="enfermedades_pasadas" name="enfermedades_pasadas" placeholder="Cirugias, Huesos rotos, Electrocardiogramas, Etc...">
							<span class="texto" id="senfermedades_pasadas" style="color: #ff0000;"></span>
						</div>

						<div class="col-md-6 mb-2">
							<label for="nombre_parentesco">Nombre de contacto en caso de emergencia</label>
							<input class="form-control" maxlength="50" type="text" id="nombre_parentesco" name="nombre_parentesco" placeholder="Ramon Ramos">
							<span class="texto" id="snombre_parentesco" style="color: #ff0000;"></span>
						</div>

					</div>

					<div class="row">
						<div class="col-md-6 mb-2">
							<label for="telefono_parentesco">Telefono de contacto en caso de emergencia</label>
							<input class="form-control" maxlength="11"  type="text" id="telefono_parentesco" name="telefono_parentesco" placeholder="Ej: &quot;04145746754&quot;">
							<span class="texto" id="stelefono_parentesco" style="color: #ff0000;"></span>
						</div>
						<div class="col-md-6 mb-2">
							<label for="relacion_parentesco">Tipo de relacion de contacto que tiene con el atleta</label>
							<input class="form-control" maxlength="20" type="text" id="relacion_parentesco" name="relacion_parentesco" placeholder="Ej: Padre, Madre, Amigo, Etc...">
							<span class="texto" id="srelacion_parentesco" style="color: #ff0000;"></span>
						</div>
					</div>
					</div>
   
                     <div class="container text-center mt-3">
                        <p class="font-weight-normal text-justify  text-center">
                        El usuario deberá rellenar correctamente cada uno de los espacios en blanco del formulario.
                        </p>
                     </div> 
   
                     <div class="mt-3">  
                        <p class="font-weight-normal text-justify text-center">
                           Luego presiona en el boton registrar donde aparecera el siguiente mensaje. <b>Presione el boton</b> <button type="button" id="registrar3" class="btn btn-danger ml-2"><i class="bi bi-check-lg mr-1"></i>Registrar</button>
                        </p>
                     </div>
   
                     <div class="container text-center mt-3">
                        <p class="font-weight-normal text-justify  text-center">
                        OJO: si tiene un error ya sea en el formulario o en algún dato registrado, se mostrará
                        un mensaje que le dirá dónde está el error y no podrá registrar la información hasta 
                        Que lo ingrese correctamente.
                        </p>
                     </div> 
   
   
                     <div class="row mb-3">
                        <div class="col-md-12">
                           <p class="font-weight-normal text-justify">
                           Una vez registrada la informacion medica del Atleta aparecerá en la lista. Donde podrá modificar o eliminar su información 
                        </div>
                     </div>
   
                     <div class="row">
						<div class="col-md-12" >
							<div class="table-responsive">
								<table class="table table-striped table-hover table-borderless" id="tablaconsulta" width="100%" cellspacing="0">
									<thead class="thead-dark">
										<th>Cedula</th>
										<th>Nombre atleta</th>
										<th>Medicamento que consume</th>
										<th>Enfermedad que padece</th>
										<th>Discapacidad que posee</th>
										<th>Dieta alimenticia</th>
										<th>Enfermedades pasadas</th>
										<th>Nombre de emergencia</th>
										<th>Tlf. de emergencia</th>
										<th>Tipo de relacion</th>
										<th>Acciones</th>
									</thead>
									<tbody id="resultadoconsulta">
											<tr>
												<td>27842856</td>
												<td>Mario de las Casas</td>
												<td>Ibuprofeno</td>
												<td>Ninguna</td>
												<td>Ninguna</td>
												<td>Basada en proteina</td>
												<td>Dengue</td>
												<td>Laura Caceres</td>
												<td>04148329421</td>
												<td>Pareja</td>
												<td><button type="button" class="btn btn-primary mb-1 mr-1" id="boton_modificar"><i class="bi bi-pencil-fill"></i></button>
                                       <button type="button" class="btn btn-danger mb-1"><i class="bi bi-x-lg"></i></button></td>
											</tr>
                                 <tr>
                                    <td>23821654</td>
                                    <td>Julio Jimenez</td>
                                    <td>Acetaminofen</td>
                                    <td>Ninguna</td>
                                    <td>Ninguna</td>
                                    <td>Basada en carbohidratos</td>
                                    <td>Covid</td>
                                    <td>Maria Alvarado</td>
                                    <td>0412005921</td>
                                    <td>Familiar</td>
                                    <td><button type="button" class="btn btn-primary mb-1 mr-1" id="boton_modificar"><i class="bi bi-pencil-fill"></i></button>
                                       <button type="button" class="btn btn-danger mb-1"><i class="bi bi-x-lg"></i></button></td>
                                 </tr>
                                 <tr>
                                    <td>25431977</td>
                                    <td>Juan Dominguez</td>
                                    <td>Diclofenato</td>
                                    <td>Ninguna</td>
                                    <td>Ninguna</td>
                                    <td>Ninguna</td>
                                    <td>Chicungunya</td>
                                    <td>Pedro Cameron</td>
                                    <td>04265886632</td>
                                    <td>Familiar</td>
                                    <td><button type="button" class="btn btn-primary mb-1 mr-1" id="boton_modificar"><i class="bi bi-pencil-fill"></i></button>
                                       <button type="button" class="btn btn-danger mb-1"><i class="bi bi-x-lg"></i></button></td>
                                 </tr>
									</tbody>
								</table>
							</div>
							
						</div>
					</div>
               <br>
   
                     <div class="row mb-2">
                        <div class="col-md-12">
                           <div class="h4 text-dark text-center">Para MODIFICAR</div>
                        </div>  
                     </div>
   
                     <div class="container-fluid">
                     <div class="row mb-3">
                        <div class="col-md-12">
                           <p class="font-weight-normal text-justify">
                              Para modificar la informacion del Atleta deberá presionar sobre <button type='button' class='btn btn-primary mb-1 mr-1 ml-2' id='boton_modificar'><i class='bi bi-pencil-fill'></i></button>
                           y le aparecera el formulario para modificar los datos medicos de los atletas:</p>
                        </div>   
                     <div>  
   
                     <div class="row"> 
							<div class="col-md-12 mb-2">
								<label for="nombre_atleta">Atleta</label>
								<select class=" form-control" name="nombre_atleta" id="nombre_atleta">
									<option value="" hidden="" selected="hidden">Seleccione Opcion</option>
									<option value=""></option>
                           <option value="Mario de la Casas">Mario de la Casas</option>
                           <option value="Julio Jimenez">Julio Jimenez</option>
                           <option value="Juan Dominguez">Juan Dominguez</option>
								</select>
							</div>
					</div>

					<div class="row">
						<div class="col-md-6 mb-2">
							<label for="medicamento_atleta">Medicamento que consume</label>
							<input class="form-control" maxlength="50" type="text" id="medicamento_atleta" name="medicamento_atleta" placeholder="Ej: &quot;Ninguno, Diclofenaco...&quot;">
							<span class="texto" id="smedicamento_atleta" style="color: #ff0000;"></span>
						</div>

						<div class="col-md-6 mb-2">
							<label for="enfermedad_atleta">Enfermedad que padezca actualmente</label>
							<input class="form-control" maxlength="50" type="text" id="enfermedad_atleta" name="enfermedad_atleta" placeholder="Ej: &quot;Ninguno, Artritis&quot;">
							<span class="texto" id="senfermedad_atleta" style="color: #ff0000;"></span>
						</div>

					</div>

					<div class="row">
						<div class="col-md-6 mb-2">
							<label for="discapacidad_atleta">Discapacidad que posee</label>
							<input class="form-control" maxlength="50" type="text" id="discapacidad_atleta" name="discapacidad_atleta" placeholder="Ej:  &quot;Ninguno...&quot;">
							<span class="texto" id="sdiscapacidad_atleta" style="color: #ff0000;"></span>
						</div>

						<div class="col-md-6 mb-2">
							<label for="dieta_atleta">Dieta alimenticia</label>
							<input class="form-control" maxlength="50" type="text" id="dieta_atleta" name="dieta_atleta" placeholder="Ej:  &quot;Ninguno, Proteina Pura...&quot;">
							<span class="texto" id="sdieta_atleta" style="color: #ff0000;"></span>
						</div>

					</div>

					<div class="row">
						<div class="col-md-6 mb-2">
							<label for="enfermedades_pasadas">Enfermedades Pasadas</label>
							<input class="form-control" maxlength="50" type="text" id="enfermedades_pasadas" name="enfermedades_pasadas" placeholder="Cirugias, Huesos rotos, Electrocardiogramas, Etc...">
							<span class="texto" id="senfermedades_pasadas" style="color: #ff0000;"></span>
						</div>

						<div class="col-md-6 mb-2">
							<label for="nombre_parentesco">Nombre de contacto en caso de emergencia</label>
							<input class="form-control" maxlength="50" type="text" id="nombre_parentesco" name="nombre_parentesco" placeholder="Ramon Ramos">
							<span class="texto" id="snombre_parentesco" style="color: #ff0000;"></span>
						</div>

					</div>

					<div class="row">
						<div class="col-md-6 mb-2">
							<label for="telefono_parentesco">Telefono de contacto en caso de emergencia</label>
							<input class="form-control" maxlength="11"  type="text" id="telefono_parentesco" name="telefono_parentesco" placeholder="Ej: &quot;04145746754&quot;">
							<span class="texto" id="stelefono_parentesco" style="color: #ff0000;"></span>
						</div>
						<div class="col-md-6 mb-2">
							<label for="relacion_parentesco">Tipo de relacion de contacto que tiene con el atleta</label>
							<input class="form-control" maxlength="20" type="text" id="relacion_parentesco" name="relacion_parentesco" placeholder="Ej: Padre, Madre, Amigo, Etc...">
							<span class="texto" id="srelacion_parentesco" style="color: #ff0000;"></span>
						</div>
					</div>
					</div>
   
                     <div class="mt-3">  
                        <p class="font-weight-normal text-justify text-center">
                           Aparece el formulario con la información del Atleta, Se modifica el dato que se desee y presiona en modificar. <b>Presione el boton</b> <button type="button" class="btn btn-danger" id="modifica3"><i class="bi bi-pencil-fill mr-1"></i>Modificar</button>
                        </p>
                     </div>
   
                     <div class="row mb-2">
                           <div class="col-md-12">
                              <div class="text-center h4 text-dark">Para Eliminar</div>
                           </div>  
                     </div>
                     <br>
   
                     <div class="row mb-3">
                        <div class="col-md-12">
                           <p class=" text-center font-weight-normal text-justify">
                           <br>Para eliminar un Atleta solo debe presionar sobre el boton y aparecera el siguiente mensaje. <b>Presione el boton</b> <button type='button'  class='btn btn-danger mb-1' id="eliminar3"><i class='bi bi-x-lg'></i></button>
                           </p>
                        </div>               
                     </div>
   
   
                     <div class="container p3">
   
                        <div class="row mt-3">
                           <div class="col-md-12">
                              <div class="h3 text-dark">GESTIONAR INFORMACIÓN SOCIOECONÓMICA DE LOS ATLETAS</div>
                           </div>       
                        </div>
   
                        <div class="row">
                           <div class="col">
                                 <p class="font-weight-normal text-justify">
                                    En el menu desplegable presione el boton <button class="btn btn-outline-dark btn-sm"><img src="img/iconos/atleta.png" style="width:30px;margin-right:10px;">
                                 Atletas</button> y de ahi presionar sobre la opcion: <button class="btn btn-outline-dark btn-sm"><img src="img/iconos/socioeconomico.png" style="width:30px;margin-right:10px;">Datos socioeconomicos</button>
                                 y ahi se le mostrara la vista principal de modulo:</p>
                           </div>
                        </div>
   
                        <div class="row">
						<div class="col-md-12" >
							<div class="table-responsive">
								<table class="table table-striped table-hover table-borderless" id="tablaconsulta" width="100%" cellspacing="0">
									<thead class="thead-dark">
										<th>Cedula</th>
										<th>Nombre</th>
										<th>Tipo de vivienda</th>
										<th>Zona de vivienda</th>
										<th>Cant. habitantes del hogar</th>
										<th>Propiedad de la vivienda</th>
										<th>Internet</th>
										<th>Luz</th>
										<th>Agua</th>
										<th>Tlf. residencial</th>
										<th>Cable</th>
										<th>Acciones</th>
									</thead>
									<tbody id="resultadoconsulta">
												<td>22963952</td>
												<td>Leon Jair</td>
												<td>Casa</td>
												<td>Rural</td>
												<td>5</td>
												<td>Propia</td>
												<td>POSEE</td>
												<td>POSEE</td>
												<td>POSEE</td>
												<td>POSEE</td>
												<td>NO POSEE</td>
												<td><button type="button" class="btn btn-primary mb-1 mr-1" id="boton_modificar"><i class="bi bi-pencil-fill"></i></button>
                                       <button type="button" class="btn btn-danger mb-1"><i class="bi bi-x-lg"></i></button></td>
											</tr>
									</tbody>
								</table>
							</div>
							
						</div>
					</div>
					
   
                        <div class="mt-3 mb-5">
                           <p class="font-weight-normal text-justify text-center">
                           En primer lugar, Si hay información socioeconómica registrada, Aparecerán en la lista.
                           </p>
                        </div>
   
                        <div class="row mb-2">
                              <div class="col-md-12">
                                 <div class="h4 text-dark text-center">Para REGISTRAR</div>
                              </div>  
                        </div>
   
                        <div class="row mb-3">
                           <div class="col-md-12">
                              <p class="font-weight-normal text-justify">
                              Para registrar informacion socioeconómica deberá presionar sobre <button class="btn btn-success "><i class="bi bi-plus-circle mr-1"></i>Nuevo registro</button>
                              y le aparecera el siguiente formulario:</p>
                           </div>               
                        </div>
   
                        <div class="container-fluid">
						<div class="row"> 
							<div class="col-md-12 mb-2">
									<label for="nombre_atleta">Atleta</label>
									<select class=" form-control" name="nombre_atleta" id="nombre_atleta">
										<option value="" hidden="" selected="hidden">Seleccione Opcion</option>
										<option value=""></option>
                              <option value="Leon Jair">Leon Jair</option>
									</select>
							</div>
						</div>

						<div class="row">
							<div class="col-md-6 mb-2">
								<label for="tipo_vivienda">Tipo de vivienda</label>
								<select class="form-control" name="tipo_vivienda" id="tipo_vivienda">
									<option value="" hidden="" selected="hidden">Seleccionar Opcion</option>
									<option value=""></option>
									<option value="Departamento">Departamento</option>
									<option value="Casa">Casa</option>
									<option value="Apartamento">Apartamento</option>
								</select> 
							</div>
							<div class="col-md-6 mb-2">
								<label for="zona_vivienda">Zona de vivienda</label>
								<select class="form-control" name="zona_vivienda" id="zona_vivienda">
									<option value="" hidden="" selected="hidden">Seleccionar Opcion</option>
									<option value=""></option>
									<option value="Rural">Rural</option>
									<option value="Urbana">Urbana</option>
								</select> 
							</div>
						</div>

						<div class="row">
							<div class="col-md-6 mb-2">
								<label for="habitantes_vivienda">Cantidad de habitantes del hogar</label>
								<input type="number" class="form-control" name="habitantes_vivienda" id="habitantes_vivienda" min="0" max="20" placeholder="Ej: 1, 2, 3...">
								<span class="texto" id="shabitantes_vivienda" style="color: #ff0000;"></span>
							</div> 
							<div class="col-md-6 mb-2">
								<label for="propiedad_vivienda">Propiedad de la vivienda</label>
								<select class="form-control" name="propiedad_vivienda" id="propiedad_vivienda">
									<option value="" hidden="" selected="hidden">Seleccionar Opcion</option>
									<option value=""></option>
									<option value="Alquilada">Alquilada</option>
									<option value="Propia">Propia</option>
									<option value="Otro">Otro</option>
								</select> 
							</div> 
						</div>

						
						<div class="h5 text-dark text-center my-2">
							Servicios Basicos
						</div>
						
							
						<div class="row container">
							
							<div class="col-6">
							
								<div class="form-check mb-2">
									<input type="checkbox" class="form-check-input" id="internet" name="internet" value="POSEE">
									<label class="form-check-label" for="internet">Internet</label>
								</div>
							

								<div class="form-check mb-2">
									<input type="checkbox" class="form-check-input" id="luz" name="luz" value="POSEE">
									<label class="form-check-label" for="luz">Luz</label>
								</div>

							</div>

							<div class="col-6">
								<div class="form-check mb-2">
									<input type="checkbox" class="form-check-input" id="agua" name="agua" value="POSEE">
									<label class="form-check-label" for="agua">Agua</label>
								</div>

								<div class="form-check mb-2">
									<input type="checkbox" class="form-check-input" id="telefono_residencial" name="telefono_residencial" value="POSEE">
									<label class="form-check-label" for="telefono_residencial">Tlf. residencial</label>
								</div>
							</div>

							<div class="col-6">
								<div class="form-check mb-2">
									<input type="checkbox" class="form-check-input" id="cable" name="cable" value="POSEE">
									<label class="form-check-label" for="cable">Cable de TV</label>
								</div>
							</div>

						</div>
					</div>
   
                        <div class="container text-center mt-3">
                           <p class="font-weight-normal text-justify  text-center">
                           El usuario deberá rellenar correctamente cada uno de los espacios en blanco del formulario.
                           </p>
                        </div> 

   
                        <div class="mt-3">  
                           <p class="font-weight-normal text-justify text-center">
                              Luego presiona en el boton registrar donde aparecera el siguiente mensaje. <b>Presione el boton</b> <button type="button" id="registrar4" class="btn btn-danger ml-2"><i class="bi bi-check-lg mr-1"></i>Registrar</button>
                           </p>
                        </div>
   
                        <div class="container text-center mt-3">
                           <p class="font-weight-normal text-justify  text-center">
                           OJO: si tiene un error ya sea en el formulario o en algún dato registrado, se mostrará
                           un mensaje que le dirá dónde está el error y no podrá registrar la información hasta 
                           Que lo ingrese correctamente.
                           </p>
                        </div> 
   
   
                        <div class="row mb-3">
                           <div class="col-md-12">
                              <p class="font-weight-normal text-justify">
                              Una vez registrada la informacion socioeconómica del Atleta aparecerá en la lista. Donde podrá modificar o eliminar su información 
                           </div>
                        </div>
   
                        <div class="row">
						<div class="col-md-12" >
							<div class="table-responsive">
								<table class="table table-striped table-hover table-borderless" id="tablaconsulta" width="100%" cellspacing="0">
									<thead class="thead-dark">
										<th>Cedula</th>
										<th>Nombre</th>
										<th>Tipo de vivienda</th>
										<th>Zona de vivienda</th>
										<th>Cant. habitantes del hogar</th>
										<th>Propiedad de la vivienda</th>
										<th>Internet</th>
										<th>Luz</th>
										<th>Agua</th>
										<th>Tlf. residencial</th>
										<th>Cable</th>
										<th>Acciones</th>
									</thead>
									<tbody id="resultadoconsulta">
												<td>22963952</td>
												<td>Leon Jair</td>
												<td>Casa</td>
												<td>Rural</td>
												<td>5</td>
												<td>Propia</td>
												<td>POSEE</td>
												<td>POSEE</td>
												<td>POSEE</td>
												<td>POSEE</td>
												<td>NO POSEE</td>
												<td><button type="button" class="btn btn-primary mb-1 mr-1" id="boton_modificar"><i class="bi bi-pencil-fill"></i></button>
                                       <button type="button" class="btn btn-danger mb-1"><i class="bi bi-x-lg"></i></button></td>
											</tr>
                                 <tr>
                                    <td>28704852</td>
                                    <td>Raimon Perdomo</td>
                                    <td>Apartamento</td>
                                    <td>Urbana</td>
                                    <td>3</td>
                                    <td>Alquilada</td>
                                    <td>POSEE</td>
                                    <td>POSEE</td>
                                    <td>POSEE</td>
                                    <td>NO POSEE</td>
                                    <td>NO POSEE</td>
                                    <td><button type="button" class="btn btn-primary mb-1 mr-1" id="boton_modificar"><i class="bi bi-pencil-fill"></i></button>
                                       <button type="button" class="btn btn-danger mb-1"><i class="bi bi-x-lg"></i></button></td>
                                 </tr>
									</tbody>
								</table>
							</div>
						</div>
					<br>
			   <div class="container-fluid">
                        <div class="row mb-2">
                           <div class="col-md-12">
                              <div class="h4 text-dark text-center">Para MODIFICAR</div>
                           </div>  
                        </div>
   
                        <div class="row mb-3">
                           <div class="col-md-12">
                              <p class="font-weight-normal text-justify">
                              Para modificar la informacion socioeconómica del Atleta deberá presionar sobre <button type='button' class='btn btn-primary mb-1 mr-1 ml-2' id='boton_modificar'><i class='bi bi-pencil-fill'></i></button>
                               y le aparece otra vez un formulario:</p>
                           </div>   
   
                        <div class="container-fluid">
						<div class="row mb-2"> 
							<div class="col-md-12 mb-2">
									<label for="nombre_atleta">Atleta</label>
									<select class=" form-control" name="nombre_atleta" id="nombre_atleta">
										<option value="" hidden="" selected="hidden">Seleccione Opcion</option>
										<option value=""></option>
                              <option value="Leon Jair">Leon Jair</option>
                              <option value="Raimon Perdomo">Raimon Perdomo</option>
									</select>
							</div>
						</div>

						<div class="row">
							<div class="col-md-6 mb-2">
								<label for="tipo_vivienda">Tipo de vivienda</label>
								<select class="form-control" name="tipo_vivienda" id="tipo_vivienda">
									<option value="" hidden="" selected="hidden">Seleccionar Opcion</option>
									<option value=""></option>
									<option value="Departamento">Departamento</option>
									<option value="Casa">Casa</option>
									<option value="Apartamento">Apartamento</option>
								</select> 
							</div>
							<div class="col-md-6 mb-2">
								<label for="zona_vivienda">Zona de vivienda</label>
								<select class="form-control" name="zona_vivienda" id="zona_vivienda">
									<option value="" hidden="" selected="hidden">Seleccionar Opcion</option>
									<option value=""></option>
									<option value="Rural">Rural</option>
									<option value="Urbana">Urbana</option>
								</select> 
							</div>
						</div>

						<div class="row">
							<div class="col-md-6 mb-2">
								<label for="habitantes_vivienda">Cantidad de habitantes del hogar</label>
								<input type="number" class="form-control" name="habitantes_vivienda" id="habitantes_vivienda" min="0" max="20" placeholder="Ej: 1, 2, 3...">
								<span class="texto" id="shabitantes_vivienda" style="color: #ff0000;"></span>
							</div> 
							<div class="col-md-6 mb-2">
								<label for="propiedad_vivienda">Propiedad de la vivienda</label>
								<select class="form-control" name="propiedad_vivienda" id="propiedad_vivienda">
									<option value="" hidden="" selected="hidden">Seleccionar Opcion</option>
									<option value=""></option>
									<option value="Alquilada">Alquilada</option>
									<option value="Propia">Propia</option>
									<option value="Otro">Otro</option>
								</select> 
							</div> 
						</div>

						
						<div class="h5 text-dark text-center my-2">
							Servicios Basicos
						</div>
						
							
						<div class="row container">
							
							<div class="col-6">
							
								<div class="form-check mb-2">
									<input type="checkbox" class="form-check-input" id="internet" name="internet" value="POSEE">
									<label class="form-check-label" for="internet">Internet</label>
								</div>
							

								<div class="form-check mb-2">
									<input type="checkbox" class="form-check-input" id="luz" name="luz" value="POSEE">
									<label class="form-check-label" for="luz">Luz</label>
								</div>

							</div>

							<div class="col-6">
								<div class="form-check mb-2">
									<input type="checkbox" class="form-check-input" id="agua" name="agua" value="POSEE">
									<label class="form-check-label" for="agua">Agua</label>
								</div>

								<div class="form-check mb-2">
									<input type="checkbox" class="form-check-input" id="telefono_residencial" name="telefono_residencial" value="POSEE">
									<label class="form-check-label" for="telefono_residencial">Tlf. residencial</label>
								</div>
							</div>

							<div class="col-6">
								<div class="form-check mb-2">
									<input type="checkbox" class="form-check-input" id="cable" name="cable" value="POSEE">
									<label class="form-check-label" for="cable">Cable de TV</label>
								</div>
							</div>

						</div>
					</div>
   
                        <div class="mt-3">  
                           <p class="font-weight-normal text-justify text-center">
                              Aparece el formulario con la información socioeconómica del Atleta, Se modifica el dato que se desee y presiona en moficicar. <b>Presione el boton</b> <button type="button" class="btn btn-danger" id="modifica4"><i class="bi bi-pencil-fill mr-1"></i>Modificar</button>
                           </p>
                        </div>
   
                        <div class="row mb-2">
                              <div class="col-md-12">
                                 <div class="h4 text-dark text-center">Para Eliminar</div>
                              </div>  
                        </div>
   
                        <div class="row mb-3">
                           <div class="col-md-12">
                              <p class=" text-center font-weight-normal text-justify">
                              Para eliminar informacion socioeconómica de un Atleta solo debe presionar sobre el boton y aparecera el siguiente mensaje. <b>Presione el boton</b> <button type='button'  class='btn btn-danger mb-1' id="eliminar4"><i class='bi bi-x-lg'></i></button>
                              </p>
                           </div>               
                        </div>
   
                        <div class="container p3">
   
                           <div class="row mt-3">
                              <div class="col-md-12">
                                 <div class="h3 text-dark">HISTORIAL DEL ATLETA</div>
                              </div>       
                           </div>
   
                           <div class="row">
                              <div class="col">
                                    <p class="font-weight-normal text-justify">
                                       En el menu desplegable, debe presionar el boton <button class="btn btn-outline-dark btn-sm"><img src="img/iconos/atleta.png" style="width:30px;margin-right:10px;">Atletas</button>
                                       y despues al boton <button class="btn btn-outline-dark btn-sm"><img src="img/iconos/historial.png" style="width:30px;margin-right:10px;">Historial del Atleta</button>
                                        y asi llegara a la vista principal: </p>
                                    </p>
                              </div>
                           </div>
   
                           <div class="container-fluid border mt-4 shadow p-3 mb-4 bg-white rounded" style="width:95%;">
					<div class="container-fluid text-center h4 text-dark my-3">
						Historial de Atleta
					</div>
			
					<div class="row">
						<div class="col-md-12">
							<label for="atleta">Atleta</label>
							<select class="selectpicker form-control" name="atleta" id="atleta" name="atleta" title="Seleccione Opcion">
								<option value="" hidden="" selected="hidden">Seleccionar Opcion</option>
                        <option value=""></option>
                        <option value="Leon Jair">22963952 -- Leon Jair</option>
                        <option value="Raimon Perdomo">28704852 -- Raimon Perdomo</option>
                        <option value="Mario de las Casas">27842856 -- Mario de las Casas</option>
                        <option value="Julio Jimenez">23821654 -- Julio Jimenez</option>
                        <option value="Pedro Gonzales">23821654 -- Pedro Gonzales</option>
							</select>
						</div>
						
					</div>
					
			
					<div class="row">
						<div class="col-md-12 mb-3">
							<br>
						</div>
					</div>
			
					<div class="container-fluid">
							<div class="row">
								<div class="col-md-12  mb-7" style="height: 400px;overflow: auto;">
									<table class="table table-striped table-hover" width="100%" cellspacing="0">
										<thead>
											<tr> 
												<th>Evento en que participo</th>
												<th>Resultado/Ronda</th>
			
											</tr>
										</thead>
										<tbody id="lista_resultado">
											
										</tbody>
									</table>
								</div>
							</div>
						</div>
					
				
				</div>
                           <div class="mt-3 mb-5">
                              <p class="font-weight-normal text-justify text-center">
                                 Selecciona el atleta para ver su historial y aparecerá la información del historial del atleta. 
                              </p>
                           </div>
                           
                        <div class="container p3">
   
                        <div class="row mt-3">
                           <div class="col-md-12">
                              <div class="h3 text-dark">GESTIONAR EVENTOS</div>
                           </div>       
                        </div>
   
                        <div class="row">
                           <div class="col">
                                 <p class="font-weight-normal text-justify">
                                    En el menu desplegable seleccionar debe presionar el boton <button class="btn btn-outline-dark btn-sm"><img src="img/iconos/trofeo.png" style="width:30px;margin-right:10px;">Eventos</button>
                                    y luego nuevamente sobre el boton Al presionar sobre la opcion: <button class="btn btn-outline-dark btn-sm"><img src="img/iconos/trofeo.png" style="width:30px;margin-right:10px;">Eventos</button>
                                    y asi llegara a la vista principal:
                                  </p>
                           </div>
                        </div>
   
                        <div class="mt-4 mb-3">
						<div class="row">
							<div class="col-auto mr-auto mb-2">
								<div class="h4 text-dark">Gestionar Eventos</div>
							</div>
							<div class="col-auto">
								<button type="button" class="btn btn-success"  data-toggle="modal" data-target="#modal_gestion" id="boton_nuevo" onclick="modalregistrar()">
									<i class="bi bi-plus-circle mr-1"></i>Nuevo registro
								</button>
							</div>
						</div>
					</div>
						
					<div class="row">
						<div class="col-md-12" >
							<div class="table-responsive">
								<table class="table table-striped table-hover table-borderless" id="tablaconsulta" width="100%" cellspacing="0">
									<thead class="thead-dark">
										<th>Nombre</th>
										<th>Fecha</th>
										<th>Hora</th>
										<th>Monto</th>
										<th>Responsable</th>
										<th>Direccion</th>
										<th>Juez 1</th>
										<th>Juez 2</th>
										<th>Juez 3</th>
										<th>Acciones</th>
										
									</thead>
									<tbody id="resultadoconsulta">
												<td>Luchas Solidarias</td>
												<td>12/12/2022</td>
												<td>3:00 PM</td>
												<td>1$</td>
												<td>Edward Pereira</td>
												<td>Nucleo Ucla al lado del Metropolis</td>
												<td>Maria Jimenez</td>
												<td>Lucio Sanchez</td>
												<td>Mario Gomez</td>
												<td><button type="button" class="btn btn-primary mb-1 mr-1" id="boton_modificar"><i class="bi bi-pencil-fill"></i></button>
                                       <button type="button" class="btn btn-danger mb-1"><i class="bi bi-x-lg"></i></button></td>
											</tr>
									</tbody>
								</table>
							</div>
							
						</div>
					</div>
   
                        <div class="mt-3 mb-5">
                           <p class="font-weight-normal text-justify text-center">
                           En primer lugar, Si hay Eventos registrados, Aparecerán en la lista.
                           </p>
                        </div>
   
                        <div class="row mb-2">
                              <div class="col-md-12">
                                 <div class="h4 text-dark text-center">Para REGISTRAR</div>
                              </div>  
                        </div>
   
                        <div class="row mb-3">
                           <div class="col-md-12">
                              <p class="font-weight-normal text-justify">
                              Para registrar un Evento deberá presionar sobre <button class="btn btn-success "><i class="bi bi-plus-circle mr-1"></i>Nuevo registro</button>
                              y le aparecera el siguiente formulario: </p>
                           </div>               
                        </div>
   
                  <div class="container-fluid">
						
						<div class="row">
							<div class="col-md-6">
								<label for="nombre_evento">Nombre</label>
								<input class="form-control" maxlength="30" type="text" name="nombre_evento" id="nombre_evento">
								<span class="texto" id="snombre_evento" style="color: #ff0000;"></span>
							</div>
							<div class="col-md-6">
								<label for="fecha_evento">Fecha</label>
								<input class="form-control" type="date" name="fecha_evento" id="fecha_evento">
							</div>
						</div>

						<div class="row">
							<div class="col-md-6">
								<label for="hora_evento">Hora</label>
								<input class="form-control" type="time" name="hora_evento" id="hora_evento">
							</div> 
							<div class="col-md-6">
								<label for="club_responsable_evento">Club Responsable</label>
								<select class="form-control" name="club_responsable_evento" id="club_responsable_evento">
									<option value="" hidden="" selected="hidden">Seleccionar Opcion</option>
									<option value=""></option>
								</select>
							</div>
						</div>

						<div class="row">
							<div class="col-md-6">
								<label for="monto_evento">Monto</label>
								<input class="form-control" maxlength="10" type="text" name="monto_evento" id="monto_evento">
								<span class="texto" id="smonto_evento" style="color: #ff0000;"></span>
							</div>
							<div class="col-md-6">
								<label for="direccion_evento">Direccion</label>
								<input class="form-control" maxlength="30" type="text" name="direccion_evento" id="direccion_evento">
								<span class="texto" id="sdireccion_evento" style="color: #ff0000;"></span>
							</div>
						</div>

						<div class="row">
							<div class="col-md-4">
								<label for="juez1">Nombre del Juez 1</label>
								<input type="text" id="juez1" maxlength="30" name="juez1" class="form-control">
								<span class="texto" id="sjuez1" style="color: #ff0000;"></span>
							</div>
							<div class="col-md-4">
								<label for="juez2">Nombre del Juez 2</label>
								<input type="text" id="juez2" maxlength="30" name="juez2" class="form-control">
								<span class="texto" id="sjuez2" style="color: #ff0000;"></span>
							</div>
							<div class="col-md-4">
								<label for="juez3">Nombre del Juez 3</label>
								<input type="text" id="juez3" maxlength="30" name="juez3" class="form-control">
								<span class="texto" id="sjuez3" style="color: #ff0000;"></span>
							</div>
						</div>
					</div>
   
                        <div class="container text-center mt-3">
                           <p class="font-weight-normal text-justify  text-center">
                           El usuario deberá rellenar correctamente cada uno de los espacios en blanco del formulario.
                           </p>
                        </div> 

                        <div class="mt-3">  
                           <p class="font-weight-normal text-justify text-center">
                              Luego presiona en el boton registrar donde aparecera el siguiente mensaje. <b>Presione el boton</b> <button type="button" id="registrar5" class="btn btn-danger ml-2"><i class="bi bi-check-lg mr-1"></i>Registrar</button>
                           </p>
                        </div>
   
                        <div class="container text-center mt-3">
                           <p class="font-weight-normal text-justify  text-center">
                           OJO: si tiene un error ya sea en el formulario o en algún dato registrado, se mostrará
                           un mensaje que le dirá dónde está el error y no podrá registrar la información hasta 
                           Que lo ingrese correctamente.
                           </p>
                        </div> 
   
   
                        <div class="row mb-3">
                           <div class="col-md-12">
                              <p class="font-weight-normal text-justify">
                              Una vez registrado el Evento aparecerá en la lista. Donde podrá modificar o eliminar su información 
                           </div>
                        </div>
   
                        <div class="row">
						<div class="col-md-12" >
							<div class="table-responsive">
								<table class="table table-striped table-hover table-borderless" id="tablaconsulta" width="100%" cellspacing="0">
									<thead class="thead-dark">
										<th>Nombre</th>
										<th>Fecha</th>
										<th>Hora</th>
										<th>Monto</th>
										<th>Responsable</th>
										<th>Direccion</th>
										<th>Juez 1</th>
										<th>Juez 2</th>
										<th>Juez 3</th>
										<th>Acciones</th>
										
									</thead>
									<tbody id="resultadoconsulta">
												<td>Luchas Solidarias</td>
												<td>12/12/2022</td>
												<td>3:00 PM</td>
												<td>1$</td>
												<td>Edward Pereira</td>
												<td>Nucleo Ucla al lado del Metropolis</td>
												<td>Maria Jimenez</td>
												<td>Lucio Sanchez</td>
												<td>Mario Gomez</td>
												<td><button type="button" class="btn btn-primary mb-1 mr-1" id="boton_modificar"><i class="bi bi-pencil-fill"></i></button>
                                       <button type="button" class="btn btn-danger mb-1"><i class="bi bi-x-lg"></i></button></td>
											</tr>
                                 <tr>
                                    <td>A por la gloria!</td>
                                    <td>08/07/2023</td>
                                    <td>9:00 AM</td>
                                    <td>1,5$</td>
                                    <td>Alejandro Fernadez</td>
                                    <td>Cabudare, AV la mata</td>
                                    <td>Hipolito Alvarado</td>
                                    <td>Samir Bermudez</td>
                                    <td>Camila Quintero</td>
                                    <td><button type="button" class="btn btn-primary mb-1 mr-1" id="boton_modificar"><i class="bi bi-pencil-fill"></i></button>
                                       <button type="button" class="btn btn-danger mb-1"><i class="bi bi-x-lg"></i></button></td>
                                 </tr>
									</tbody>
								</table>
							</div>
							
						</div>
					</div>
   
                        <div class="row mb-2">
                           <div class="col-md-12">
                              <div class="h4 text-dark text-center">Para MODIFICAR</div>
                           </div>  
                        </div>
   
                        <div class="row mb-3">
                           <div class="col-md-12">
                              <p class="font-weight-normal text-justify">
                              Para modificar un Evento deberá presionar sobre <button type='button' class='btn btn-primary mb-1 mr-1 ml-2' id='boton_modificar'><i class='bi bi-pencil-fill'></i></button>
                               y le aparece el siguiente formulario:</p>
                           </div>   
                           
   
                           <div class="container-fluid">
						
						<div class="row">
							<div class="col-md-6">
								<label for="nombre_evento">Nombre</label>
								<input class="form-control" maxlength="30" type="text" name="nombre_evento" id="nombre_evento">
								<span class="texto" id="snombre_evento" style="color: #ff0000;"></span>
							</div>
							<div class="col-md-6">
								<label for="fecha_evento">Fecha</label>
								<input class="form-control" type="date" name="fecha_evento" id="fecha_evento">
							</div>
						</div>

						<div class="row">
							<div class="col-md-6">
								<label for="hora_evento">Hora</label>
								<input class="form-control" type="time" name="hora_evento" id="hora_evento">
							</div> 
							<div class="col-md-6">
								<label for="club_responsable_evento">Club Responsable</label>
								<select class="form-control" name="club_responsable_evento" id="club_responsable_evento">
									<option value="" hidden="" selected="hidden">Seleccionar Opcion</option>
									<option value=""></option>
								</select>
							</div>
						</div>

						<div class="row">
							<div class="col-md-6">
								<label for="monto_evento">Monto</label>
								<input class="form-control" maxlength="10" type="text" name="monto_evento" id="monto_evento">
								<span class="texto" id="smonto_evento" style="color: #ff0000;"></span>
							</div>
							<div class="col-md-6">
								<label for="direccion_evento">Direccion</label>
								<input class="form-control" maxlength="30" type="text" name="direccion_evento" id="direccion_evento">
								<span class="texto" id="sdireccion_evento" style="color: #ff0000;"></span>
							</div>
						</div>

						<div class="row">
							<div class="col-md-4">
								<label for="juez1">Nombre del Juez 1</label>
								<input type="text" id="juez1" maxlength="30" name="juez1" class="form-control">
								<span class="texto" id="sjuez1" style="color: #ff0000;"></span>
							</div>
							<div class="col-md-4">
								<label for="juez2">Nombre del Juez 2</label>
								<input type="text" id="juez2" maxlength="30" name="juez2" class="form-control">
								<span class="texto" id="sjuez2" style="color: #ff0000;"></span>
							</div>
							<div class="col-md-4">
								<label for="juez3">Nombre del Juez 3</label>
								<input type="text" id="juez3" maxlength="30" name="juez3" class="form-control">
								<span class="texto" id="sjuez3" style="color: #ff0000;"></span>
							</div>
						</div>
					</div>
   
                           <div class="mt-3">  
                              <p class="font-weight-normal text-justify text-center">
                                 Aparece el formulario con la información del Evento, Se modifica el dato que se desee y presiona en moficicar. <b>Presione el boton</b> <button type="button" class="btn btn-danger" id="modifica5"><i class="bi bi-pencil-fill mr-1"></i>Modificar</button>
                              </p>
                           </div>
   
                           <div class="row mb-2">
                                 <div class="col-md-12">
                                    <div class="h4 text-dark text-center">Para Eliminar</div>
                                 </div>  
                           </div>
   
                           <div class="row mb-3">
                              <div class="col-md-12">
                                 <p class=" text-center font-weight-normal text-justify">
                                 Para eliminar un Evento solo debe presionar sobre el boton y aparecera el siguiente mensaje. <b>Presione el boton</b> <button type='button'  class='btn btn-danger mb-1' id="eliminar5"><i class='bi bi-x-lg'></i></button>
                                 </p>
                              </div>  
                           </div>             
                        </div>
                                          
                     <div class="container p3">
   
                        <div class="row mt-3">
                           <div class="col-md-12">
                              <div class="h3 text-dark">GESTIONAR INSCRIPCION A EVENTOS</div>
                           </div>       
                        </div>
   
                        <div class="row">
                           <div class="col">
                                 <p class="font-weight-normal text-justify">
                                    En el menu desplegable, debera presionar en el boton: <button class="btn btn-outline-dark btn-sm"><img src="img/iconos/trofeo.png" style="width:30px;margin-right:10px;">Eventos</button>
                                    y despues en el boton <button class="btn btn-outline-dark btn-sm"><img src="img/iconos/inscribir.png" style="width:30px;margin-right:10px;">Inscripcion a Evento</button>
                                    y asi llegara a la vista principal:</p>
                           </div>
                        </div>
   
            <div class="container-fluid border mt-4 shadow p-3 mb-4 bg-white rounded" style="width:95%;">
					<form method="post" action="" enctype="multipart/form-data">
						<div class="container-fluid text-center h4 text-dark my-3">
							Gestionar Inscripcion a Eventos
						</div>
						<hr>

							<div class="container-fluid h5 mb-4">
								Registro de participantes en eventos
							</div>
						
						<div class="row">
							<div class="col-md-12">
								<label for="evento_inscripcion">Evento</label>
								<select class="selectpicker form-control" name="evento_inscripcion" id="evento_inscripcion" data-live-search="true" title="Seleccionar Evento">
									<option value=""></option>
                           <option value="A por la gloria!">A por la gloria!</option>
                           <option value="Luchas Solidarias">Luchas Solidarias</option>
								</select>
							</div>
						</div>
						
			
							<div class="row">
								<div class="col-md-4">
									
									<center>
										<label for="archivo" style="cursor:pointer">
										<img src="img/atletas/icono_persona.png" id="imagen" class="img-fluid rounded mt-3 centered" style="object-fit:scale-down;width:50px">
										<br>Click para subir foto
										</label>
										<input type="file" id="archivo" name="imagenarchivo" style="display:none" accept=".png,.jpg,.jpeg">
									</center>
								
								</div>
								<div class="col-md-4">
									<label for="cedula_inscripcion">Cedula</label>
									<input type="text" maxlength="8" class="form-control" id="cedula_inscripcion" name="cedula_inscripcion" placeholder="Ej: &quot;15345987&quot;">
									<span id="scedula_inscripcion" style="color: #ff0000;"></span>
								</div>
								<div class="col-md-4">
									<label for="nombre_inscripcion">Nombre</label>
									<input type="text" maxlength="20" class="form-control" id="nombre_inscripcion" name="nombre_inscripcion" placeholder="Ej: &quot;Luis Perdomo&quot;">
									<span id="snombre_inscripcion" style="color: #ff0000;"></span>
								</div>
								
							</div>
			
							<div class="row">
								<div class="col-md-6">
									<label for="sexo_inscripcion">Sexo</label>
									<select name="sexo_inscripcion" id="sexo_inscripcion" class="form-control">
										<option value="" hidden="" selected="hidden">Seleccione Opcion</option>
										<option value="Masculino">Masculino</option>
										<option value="Femenino">Femenino</option>
									</select>
									
								</div>
								<div class="col-md-6">
									<label for="peso_inscripcion">Peso</label>
									<input type="text" maxlength="5" class="form-control" id="peso_inscripcion" name="peso_inscripcion">
									<span id="speso_inscripcion" style="color: #ff0000;"></span>
								</div>
			
								
							</div>
			
							<div class="row">
								<div class="col-md-6">
									<label for="fechadenacimiento">F. Nacimiento</label>
									<input type="date" class="form-control" id="fechadenacimiento" name="fechadenacimiento">
								</div>
								<div class="col-md-6">
									<label for="estado">Estado</label>
									<select name="estado" id="estado" class="form-control" data-live-search="true">
										<option value="" hidden="" selected="hidden">Seleccionar Opcion</option>
										<option value=""></option>
										<option value="Amazonas">Amazonas</option>
										<option value="Anzoategui">Anzoategui</option>
										<option value="Apure">Apure</option>
										<option value="Aragua">Aragua</option>
										<option value="Barinas">Barinas</option>
										<option value="Bolivar">Bolivar</option>
										<option value="Carabobo">Carabobo</option>
										<option value="Caracas">Caracas</option>
										<option value="Cojedes">Cojedes</option>
										<option value="Delta Amacuro">Delta Amacuro</option>
										<option value="Falcon">Falcon</option>
										<option value="Guarico">Guarico</option>
										<option value="Lara">Lara</option>
										<option value="Merida">Merida</option>
										<option value="Miranda">Miranda</option>
										<option value="Monagas">Monagas</option>
										<option value="Nueva Esparta">Nueva Esparta</option>
										<option value="Portuguesa">Portuguesa</option>
										<option value="Sucre">Sucre</option>
										<option value="Tachira">Tachira</option>
										<option value="Trujillo">Trujillo</option>
										<option value="Vargas">Vargas</option>
										<option value="Yaracuy">Yaracuy</option>
										<option value="Zulia">Zulia</option>
									</select>
								</div>
							</div>
							
							<div class="row my-3 justify-content-center">
								<div class="col-md-3 my-3">
									<button type="button" id="registrar6" class="btn btn-danger w-100 ml-2"><i class="bi bi-plus-lg mr-1"></i>Registrar</button>
								</div>
							</div>
               </div>
   
                        <div class="row mb-2">
                              <div class="col-md-12">
                                 <div class="h4 text-dark text-center">Para registrar participantes a un Evento</div>
                              </div>  
                        </div>
   
                        <div class="container text-center mt-3">
                           <p class="font-weight-normal text-justify  text-center">
                           Selecciona el evento al cual le va ingresar participantes.
                           </p>
                        </div> 
   
                        <div class="container text-center mt-3">
                           <p class="font-weight-normal text-justify  text-center">
                           Ingresa los datos del atleta a inscribir en El evento, Al ingresar la cedula del atleta, 
                           El sistema le mostrara un mensaje en pantalla si el atleta no está inscrito
                           </p>
                        </div> 
   
                        <div class="mt-3">  
                           <p class="font-weight-normal text-justify text-center">
                              Luego presiona en el boton registrar donde aparecera el siguiente mensaje. <b>Presione el boton</b> <button type="button" id="registrarins" class="btn btn-danger ml-2"><i class="bi bi-plus-lg mr-1"></i>Registrar</button>
                           </p>
                        </div>
   
                        <div class="container text-center mt-3">
                           <p class="font-weight-normal text-justify  text-center">
                           El atleta se muestra en la tabla de atletas inscritos 
                        </div> 
   
                        <div class="mb-2 invisible">
								<hr>
							</div>
						<div class="row"> 
							<div class="col-md-12 text-center mb-3 h5">
								Atletas inscritos en el evento 
							</div>
						</div>
						
						<div class="row">
							<div class="col-md-12  mb-7">
								<div class="table-responsive">
									<table class="table table-striped table-hover table-borderless" id="tablaconsulta" width="100%" cellspacing="0">
										<thead class="thead-dark">
											<tr> 
												<th>Foto</th>
												<th>Cedula</th>
												<th>Nombre</th>
												<th>Sexo</th>
												<th>Edad</th>
												<th>Peso</th>
												<th>Estado</th>
												<th>Accion</th>
												<th style="display:none;">id_evento</th>
												
											</tr>
										</thead>
										<tbody id="lista_inscritos">
											<tr>
                                 <td></td>
                                 <td>23821654</td>
                                 <td>Julio Jimenez</td>
                                 <td>Masculino</td>
                                 <td>27 años</td>
                                 <td>93Kg</td>
                                 <td>Lara</td>
                                 <td><button type="button" class="btn btn-danger mb-1"><i class="bi bi-x-lg"></i></button></td>
                                 </tr>
                                 <tr>
                                    <td></td>
                                    <td>25431977</td>
                                    <td>Juan Dominguez</td>
                                    <td>Masculino</td>
                                    <td>25 años</td>
                                    <td>87Kg</td>
                                    <td>Lara</td>
                                    <td><button type="button" class="btn btn-danger mb-1"><i class="bi bi-x-lg"></i></button></td></td>
                                 </tr>
										</tbody>
									</table>
								</div>
							</div>
						</div>
						
						
					</form>
				
   
                        <div class="row mb-2">
                              <div class="col-md-12">
                                 <div class="h4 text-dark text-center">Para Eliminar</div>
                              </div>  
                        </div>
   
                        <div class="row mb-3">
                           <div class="col-md-12">
                              <p class=" text-center font-weight-normal text-justify">
                              Para elimnar un Evento solo debe presionar sobre el boton y aparecera el siguiente mensaje. <b>Presione el boton</b> <button type='button'  class='btn btn-danger mb-1' id="eliminar6"><i class='bi bi-x-lg'></i></button>
                              </p>
                           </div>  
                                          
                           <div class="container text-center mt-3">
                                 <p class="font-weight-normal text-justify  text-center">
                                 Si al ingresar una cedula de algún atleta existente en el sistema, 
                                 El autocompletara de forma automática sus datos, Para agregarlo al nuevo evento: 
                           </div> 
   
                        <div class="container p3">
   
                           <div class="row mt-3">
                              <div class="col-md-12">
                                 <div class="h3 text-dark">EMPAREJAMIENTOS Y COMBATES</div>
                              </div>       
                           </div>
   
                           <div class="row">
                              <div class="col">
                                    <p class="font-weight-normal text-justify">
                                       En el menu desplegable, debera presionar sobre el boton <button class="btn btn-outline-dark btn-sm"><img src="img/iconos/trofeo.png" style="width:30px;margin-right:10px;">Eventos</button>
                                       y de ahi darle click al boton de <button class="btn btn-outline-dark btn-sm"><img src="img/iconos/ring.png" style="width:30px;margin-right:10px;">Emparejamientos y Combates</button>
                                       y asi llegara a la vista principal:
                                    </p>
                              </div>
                           </div>
   
                           <div class="container-fluid text-center h4 text-dark my-3">
						Emparejamientos y Combates
					</div>
			
					<div class="row">
						<div class="col-md-12">
							<label for="evento_emparejamiento">Eventos</label>
							<select class="form-control" name="evento_emparejamiento" id="evento_emparejamiento" onchange='select_evento();'>
								<option value="" hidden="" selected="hidden">Seleccionar Evento</option>
                        <option value=""></option>
                        <option value="Luchas Solidarias">Luchas Solidarias</option>
                        <option value="A por la gloria!">A por la gloria!</option>
							</select> 
						</div>
					</div>
					<div class="row">
						<div class="col-md-4">
							<label for="sexo">Sexo</label>
							<select class="form-control" name="sexo" id="sexo">
								<option value="" hidden="" selected="hidden">Seleccione</option>
								<option value=""></option>
								<option value="Masculino">Masculino</option>	
								<option value="Femenino">Femenino</option>	
							</select>
						</div>
						<div class="col-md-4">
							<label for="edad">Edad</label>
							<select class="form-control" name="edad" id="edad">
								<option value="" hidden="" selected="hidden">Seleccione</option>
								<option value=""></option>
								<option value="1">11 a 13</option>	
								<option value="2">14 a 16</option>
								<option value="3">17 a 20</option>
								<option value="4">21 +</option>
							</select>
						</div>
						<div class="col-md-4">
							<label for="peso">Peso</label>
                     <select class="form-control" name="peso" id="peso">
								<option value="" hidden="" selected="hidden">Seleccione</option>
                        <option value=""></option>
								<option value="55 a 60">de 55 a 60</option>
								<option value="61 a 70">de 61 a 70</option>
								<option value="71 a 80">de 71 a 80</option>
								<option value="81 a 90">de 81 a 90</option>
								<option value="90+">90+</option>
								
							</select>
						</div>
					</div>
			
					
					<div class="row mt-4 mb-2">
						<div class="col text-center">
							<button type="button" class="btn btn-danger" id="emparejar_combate" name="emparejar_combate">Guardar Resultado</button>
						</div>
					</div>
				</div>                   
			</div>
		</div>
	</div>
   
                           <div class="row mb-2">
                                 <div class="col-md-12">
                                    <div class="h4 text-dark text-center">Para realizar el emparejamiento</div>
                                 </div>  
                           </div>
   
                           <div class="container text-center mt-3">
                              <p class="font-weight-normal text-justify  text-center">
                              Seleccionar el Evento, Donde se realizara el emparejamiento de combate con los atletas inscritos: 
                              </p>
                           </div> 
   
   
                           <div class="container text-center mt-3">
                              <p class="font-weight-normal text-justify  text-center">
                              Al seleccionar el Evento, El sistema mostrara la lista de los atletas inscritos en ese evento:
                              </p>
                           </div> 
                        
                           <div class="container-fluid border mt-4 shadow p-3 mb-4 bg-white rounded" style="width:95%;"> 

						<div class="container-fluid">
							<div class="row"> 
								<div class="col-md-12 text-center mb-3 h5">
									Lista de participantes al Evento
								</div>
							</div>
						</div>
						
						<div class="container-fluid">					
							<div class="row">
								<div class="col-md-12 text-center" style="height: 400px;overflow: auto;">
									<table class="table table-striped table-hover">
										<thead class="thead-dark ">
											<tr> 
												<th style="display:none">id_atleta</th> 
												<th>Foto</th>
												<th>Cedula</th>
												<th>Nombres</th>
												<th>Sexo</th>
												<th>Edad</th>
												<th>Peso</th>
											</tr>
										</thead>
										<tbody id="lista_coincidentes">
											<tr>
                                    <td></td>
                                    <td>25431977</td>
                                    <td>Juan Dominguez</td>
                                    <td>Masculino</td>
                                    <td>23 años</td>
                                    <td>87Kg</td>
                                 </tr>
                                    <tr>
                                       <td></td>
                                       <td>23821654</td>
                                       <td>Julio Jimenez</td>
                                       <td>Masculino</td>
                                       <td>20 años</td>
                                       <td>93Kg</td>
                                    </tr>
										</tbody>
									</table>
								</div>
							</div>		
						</div>
						
					</div> <!-- fin de container de emparejar -->		
   
                           <div class="container text-center mt-3">
                              <p class="font-weight-normal text-justify  text-center">
                                 Debe ingresar los parámetros acordes al emparejamiento que desea obtener, Ingresando el Sexo, Edad y peso: 
                              </p>
                           </div> 
   
                           <div class="mt-3">  
                              <p class="font-weight-normal text-justify text-center">
                                    El sistema muestra una lisa de los atletas que se encuentran entre los
                                    parámetros que se han seleccionado y en la tabla de enfrentamiento, Se encuentra el emparejamiento: 
                              </p>
                           </div>
   
                           <div class="container-fluid border mt-4 shadow p-3 mb-4 bg-white rounded" style="width:95%;"> 
						
						<div class="container-fluid">
							<div class="row justify-content-between"> 
								<div class="col-auto mr-auto mb-3 h5">
									Tabla de Enfrentamientos
								</div>
								<div class="col-auto mb-1">
									<button type="button" id="siguiente_ronda" name="siguiente_ronda" class="btn btn-success"><i class="bi bi-arrow-right mr-1"></i>Siguiente</button>
								</div>
							</div>
						</div>
						
						<div class="container-fluid">						
							<div class="row">
								<div class="col-md-12 text-center"  style="height: 400px;overflow: auto;">

									<form id="formulario_emparejamiento">

										<input type="text" name="accion" value="siguiente_ronda" style="display:none">
										
										<input type="text" id="evento_id" name="evento_id" style="display:none;">
										<input type="text" value="2" id="ronda" name="ronda" style="display:none;">

										<table class="table table-striped table-hover">
											<thead class="thead-dark">
												
												<tr> 
													<th><i class="bi bi-check-circle"></i></th>
													<th>Atleta 1</th> 
													<th>VS</th>
													<th><i class="bi bi-check-circle"></i></th>
													<th>Atleta 2</th>
												</tr>
											</thead>
											<tbody id="lista_emparejada">
												<td><input type="checkbox" class="form-check-input"></td>
                                    <td>25431977<br> Juan Dominguez<br>	Masculino<br> 23 años</td>
                                    <td></td>
                                    <td><input type="checkbox" class="form-check-input"></td>
                                    <td>23821654<br>	Julio Jimenez<br>	Masculino<br>	20 años</td>
											</tbody>
										</table>
									</form>
								</div>
							</div>							
						</div>	
							
					</div>
   
                           <div class="row">
                              <div class="col">
                                    <p class="font-weight-normal text-justify">
                                    Marca el atleta ganador y <b>presiona en</b>: <button type="button" id="registrar7" class="btn btn-success ml-2"><i class="bi bi-arrow-right mr-1"></i>Registrar</button>
                                 </p>
                                    </p>
                              </div>
                           </div>
                        </div>
   
                        <div class="container p3">
   
                           <div class="row mt-3">
                              <div class="col-md-12">
                                 <div class="h3 text-dark">RESULTADO DE EVENTO</div>
                              </div>       
                           </div> 
   
                           <div class="row">
                              <div class="col">
                                    <p class="font-weight-normal text-justify">
                                       En el menu desplegable, debe presionar el boton <button class="btn btn-outline-dark btn-sm"><img src="img/iconos/trofeo.png" style="width:30px;margin-right:10px;">Eventos</button>
                                       y despues darle click al boton <button class="btn btn-outline-dark btn-sm"><img src="img/iconos/ganador.png" style="width:30px;margin-right:10px;">Resultado de Eventos</button>
                                       y asi llegara a la vista principal:</p>
                              </div>
                           </div>
   
                           <div class="mt-4 mb-3">
						<div class="row justify-content-between">
							<div class="col-auto mr-auto mb-2">
								<div class="h4 text-dark">Resultado de Eventos</div>
							</div>
							<div class="col-auto" >
								<button type="button" class="btn btn-success"  data-toggle="modal" data-target="#modal_gestion" id="boton_nuevo" onclick="modalregistrar()">
									<i class="bi bi-plus-circle mr-1"></i>Nuevo registro
								</button>
							</div>
						</div>
					</div>
						
					<div class="row">
						<div class="col-md-12" >
							<div class="table-responsive">
								<table class="table table-striped table-hover table-borderless" id="tablaconsulta"  width="100%" cellspacing="0">
									<thead class="thead-dark">
										<tr> 
											<th>Nombre del Evento</th>
											<th style="display:none">id_evento</th>
											<th>Atleta Ganador</th>
											<th>Atleta Perdedor</th>
											<th>Ronda</th>
											<th>Forma de Ganar</th>
											<th style="display:none">atleta1</th>
											<th style="display:none">atleta2</th>
											<th>Acciones</th>
										</tr>
									</thead>
									<tbody id="resultadoconsulta">
											<tr>
												<td colspan="8">No hay informacion</td>
												<td></td>
												<td></td>
												<td></td>
												<td></td>
												<td></td>
												<td></td>
												<td></td>
												<td></td>
		
											</tr> 
									</tbody>
								</table>
							</div>
							
						</div>
					</div>
   
   
                           <div class="row mb-2">
                                 <div class="col-md-12">
                                    <div class="h4 text-dark">Para agregar los resultados obtenidos luego del emparejamiento</div>
                                 </div>  
                           </div>
   
                           <div class="row mb-3">
                              <div class="col-md-12">
                                 <p class="font-weight-normal text-justify">
                                 <b>Debre presionar en </b>  <button class="btn btn-success "><i class="bi bi-plus-circle ml-2 mr-1"></i>Nuevo registro</button>
                                 </p>
                              </div>               
                           </div>
   
                           <div class="container-fluid">
						
						<div class="row">
							<div class="col-md-12">
								<label for="nombre_evento">Evento</label>
								<select class="form-control" name="nombre_evento" id="nombre_evento">
									<option value="" hidden="" selected="hidden">Seleccionar Opcion</option>
									<option value=""></option>
                           <option value="Luchas Solidarias	">Luchas Solidarias</option>
                           <option value="A por la gloria!">A por la gloria!</option>
								</select>
							</div>

						</div>

						<div class="row">
							<div class="col-md-12">
								<label for="">Ronda</label>
								<select class="form-control" name="ronda" id="ronda">
									<option value="" hidden="" selected="hidden">Seleccionar Opcion</option>
									<option value=""></option>
                           <option value="1">1</option>
                           <option value="2">2</option>
                           <option value="3">3</option>
								</select>
							</div>
						</div>
						
						<div class="row">
							<div class="col-md-6">
								<label for="atleta_ganador">Atleta Ganador</label>
								<select class="form-control" name="atleta_ganador" id="atleta_ganador" name="atleta_ganador" >
									<option value="" hidden="" selected="hidden">Seleccionar Opcion</option>
									<option value=""></option>
                           <option value="Julio Jimenez">Julio Jimenez</option>
                           <option value="Juan Dominguez">Juan Dominguez</option>
								</select>
							</div>
							<div class="col-md-6">
								<label for="atleta_perdedor">Atleta Perdedor</label>
								<select class="form-control" name="atleta_perdedor" id="atleta_perdedor">
									<option value="" hidden="" selected="hidden">Seleccionar Opcion</option>
									<option value=""></option>
                           <option value="Julio Jimenez">Julio Jimenez</option>
                           <option value="Juan Dominguez">Juan Dominguez</option>
								</select>
							</div>
							
						</div>
						
						<div class="row">
							<div class="col-md-12">
								<label for="forma_ganar">Forma de Ganar</label>
								<select class="form-control" name="forma_ganar" id="forma_ganar">
								<option value="" hidden="" selected="hidden">Seleccionar opcion</option>
                        <option value=""></option>
								<option value="sumusion">Sumision</option>
								<option value="decision">Decision</option>
								<option value="rcb">RCB</option>
								<option value="knockout">Knockout</option>
								<option value="forfeit">Forfeit</option>
								</select>
							</div>
						</div>

					</div>
   
                           <div class="container text-center mt-3">
                              <p class="font-weight-normal text-justify  text-center">
                                 El usuario deberá rellenar correctamente cada uno de los espacios, 
                                 Ingresando los resultados del emparejamiento 
                              </p>
                           </div> 
   
                           <div class="mt-3">  
                              <p class="font-weight-normal text-justify text-center">
                                 Para guardar los resultados. <b>Presione el boton</b> <button type="button" id="registrar8" class="btn btn-danger ml-2"><i class="bi bi-check-lg mr-1"></i>Registrar</button>
                              </p>
                           </div>
   
                           <div class="container text-center mt-3">
                              <p class="font-weight-normal text-justify  text-center">
                              Una vez registrado los resultados aparecerán en la lista. Donde podrá eliminar su información.
                              </p>
                           </div> 
   					
					<div class="row">
						<div class="col-md-12" >
							<div class="table-responsive">
								<table class="table table-striped table-hover table-borderless" id="tablaconsulta"  width="100%" cellspacing="0">
									<thead class="thead-dark">
										<tr> 
											<th>Nombre del Evento</th>
											<th>Atleta Ganador</th>
											<th>Atleta Perdedor</th>
											<th>Ronda</th>
											<th>Forma de Ganar</th>
											<th>Acciones</th>
										</tr>
									</thead>
									<tbody id="resultadoconsulta">
											<tr>
												<td>Luchas Solidarias</td>
												<td>Julio Jimenez</td>
												<td>Juan Dominguez</td>
												<td>2</td>
												<td>Decision</td>
												<td><button type='button'  class='btn btn-danger mb-1' id="eliminar5"><i class='bi bi-x-lg'></i></button></td>
											</tr> 
									</tbody>
								</table>
							</div>
							
						</div>
					</div>
   
                           <div class="row mb-2">
                                 <div class="col-md-12">
                                    <div class="h4 text-dark text-center">Para Eliminar</div>
                                 </div>  
                           </div>
   
                           <div class="row mb-3">
                              <div class="col-md-12">
                                 <p class=" text-center font-weight-normal text-justify">
                                 Para eliminar los resultados <b>Presione el boton</b> <button type='button'  class='btn btn-danger mb-1' id="eliminar8"><i class='bi bi-x-lg'></i></button>
                                 </p>
                              </div>               
                           </div>
                        </div>
                        
                        <div class="container p3">
   
                           <div class="row mt-3">
                              <div class="col-md-12">
                                 <div class="h3 text-dark">REPORTES</div>
                              </div>       
                           </div>
   
                           <div class="row">
                              <div class="col">
                                    <p class="font-weight-normal text-justify">
                                       En el menu desplegable, al presionar sobre la opcion: <button class="btn btn-outline-dark btn-sm"><img src="img/iconos/reporte.png" style="width:30px;margin-right:10px;">Reportes</button>
                                       le saldra multiples opciones para los reportes entre los cuales tenemos:
                                    </p>
                              </div>
                           </div>
   
                           <div class="row">
                              <div class="col">
                                    <p class="font-weight-normal text-justify">
                                    <b>Al ingresar en</b><button class="btn btn-outline-dark btn-sm ml-2"><img src="img/iconos/reporte.png" style="width:30px;margin-right:10px;">Reporte de Atletas</button>
                                 
                                    </p>
                              </div>
                           </div>
   
                           <div class="container-fluid border mt-4 shadow p-3 mb-4 bg-white rounded" style="width:95%;"> 
                           <div class="container-fluid text-center h4 text-dark mb-4">
						Reporte de Atletas
					</div>
					<form method="post" action="" id="formulario_reporte_atleta" target="_blank">
						<div class="row">
							<div class="col-md-6">
								<label for="club_reporte_atleta">Club del Atleta</label>
								<select class="selectpicker form-control" name="club_reporte_atleta" id="club_reporte_atleta" data-live-search="true" title="Seleccione Opcion">
									<option value="" hidden="" selected="hidden">Seleccione un club</option>
									<option value=""></option>
                           <option value="Tortugas Luchonas">Tortugas Luchonas</option>
                           <option value="Peleotas Club">Peleotas Club</option>
                           <option value="Luisardos">Luisardos</option>
								</select>
							</div>
			
							<div class="col-md-6">
								<label for="cedula_reporte_atleta">Cedula</label>
								<input class="form-control" maxlength="8" type="text" name="cedula_reporte_atleta" id="cedula_reporte_atleta" placeholder="Ej: &quot;15345987&quot;">
								
							</div>
						</div>
						
				 
						<div class="row">
							
							<div class="col-md-6">
								<label for="nombres_reporte_atleta">Nombre</label>
								<input class="form-control" maxlength="24" type="text" name="nombres_reporte_atleta" id="nombres_reporte_atleta" placeholder="Ej: &quot;Luis Gustavo&quot;">
								
							</div>
			
							<div class="col-md-6">
								<label for="apellidos_reporte_atleta">Apellido</label>
								<input class="form-control" maxlength="25" type="text" name="apellidos_reporte_atleta" id="apellidos_reporte_atleta" placeholder="Ej: &quot;Perdomo Perez&quot;">
							</div>
						</div>
			 
						<div class="row">
							
							<div class="col-md-6">
								<label for="fecha_reporte_atleta">Fecha de Nacimiento</label>
								<input class="form-control" type="date" name="fecha_reporte_atleta" id="fecha_reporte_atleta">
							</div>
			
							<div class="col-md-6">
								<label for="sexo_reporte_atleta">Sexo</label>
								<select class=" selectpicker form-control" name="sexo_reporte_atleta" id="sexo_reporte_atleta" title="Seleccione Opcion">
									<option value="" hidden="" selected="hidden">Seleccionar Opcion</option>
									<option value=""></option>
									<option>Masculino</option>
									<option>Femenino</option>
								</select>
							</div>
						</div>
			
						<div class="row">
							
							<div class="col-md-6">
								<label for="deporte_reporte_atleta">Deporte Base del Atleta</label>
								<select class="selectpicker form-control" name="deporte_reporte_atleta" id="deporte_reporte_atleta" title="Seleccione Opcion">
									<option value="" hidden="" selected="hidden">Seleccionar Opcion</option>
									<option value=""></option>
									<option>Taekwondo</option>
									<option>Karate</option>
									<option>Kapoeira</option>
									<option>Judo</option>
									<option>Boxeo</option>
								</select>
							</div>
			
							<div class="col-md-6">
								<label for="categoria_reporte_atleta">Categoria del Atleta</label>
								<select class="selectpicker form-control" name="categoria_reporte_atleta" id="categoria_reporte_atleta" title="Seleccione Opcion">
									<option value="" hidden="" selected="hidden">Seleccionar Opcion</option>
									<option value=""></option>
									<option>Categoria 1</option>
									<option>Categoria 2</option>
									<option>Categoria 3</option>
								</select>
							</div>
						</div>
			
						<div class="row">
							<div class="col-md-12 text-center mb-3">
								<hr>
							</div>                   
						</div>

                  <div class="row mb-2 justify-content-center">
							<div class="col-md-3">
								<button type="submit" class="btn btn-danger w-100" id="generar_reporte_eventos" name="generar_reporte_atleta">GENERAR REPORTE</button>
							</div>
						</div>

					</form>
				</div>
   </div>
                           <div class="container text-center mt-3">
                              <p class="font-weight-normal text-justify  text-center">
                              En esta pantalla el usuario podrá realizar reportes de todos los atletas anteriormente registrados, 
                              siendo así el usuario tiene que rellenar todos los espacios para que el sistema sepa los datos de
                                 los atletas del cual el usuario quiere realizar el reporte.
                              </p>
                           </div> 
   
                           <div class="container text-center mt-3">
                              <p class="font-weight-normal text-justify  text-center">
                              Al tener todos los espacios rellenos correctamente el usuario debe presionar el botón <button type="button" id="registrar6" class="btn btn-danger ml-2">GENERAR REPORTE</button> 
                              </p>
                           </div> 
   
                           <div class="container text-center mt-3">
                                 <p class="font-weight-normal text-justify  text-center">
                                    El sistema creará una página de extensión pdf donde mostrará todo el personal
                                    que coincide con los datos suministrados por el usuario.
                           </div>
                              
                           <div class="row">
                              <div class="col">
                                    <p class="font-weight-normal text-justify">
                                       <b>Al ingresar en</b><button class="btn btn-outline-dark btn-sm ml-2"><img src="img/iconos/reporte.png" style="width:30px;margin-right:10px;">Reporte de Personal</button>
                                 
                                    </p>
                              </div>
                           </div>
   
                           <div class="container-fluid border mt-4 shadow p-3 mb-4 bg-white rounded" style="width:95%;">
					<div class="container-fluid text-center h4 text-dark mb-4">
						Reporte de Personal  
					</div>
					<form method="post" action="" id="formulario_reporte_personal" target="_blank">
			
						<div class="row">
							<div class="col-md-12">
								<label for="club_reporte_personal">Club del Personal</label>
								<select class="selectpicker form-control" name="club_reporte_personal" id="club_reporte_personal" data-live-search="true" title="Seleccione Opcion">
									<option value="" hidden="" selected="hidden">Seleccione un club</option>
									<option value=""></option>
                           <option value="Luisardos">Luisardos</option>
                           <option value="Tortugas Luchonas">Tortugas Luchonas</option>
                           <option value="Peleotas Club">Peleotas Club</option>
								</select>
							</div>
						</div>
			
						<div class="row">
							<div class="col-md-6">
								<label for="cedula_reporte_personal">Cedula</label>
								<input class="form-control" maxlength="8" type="text" name="cedula_reporte_personal" id="cedula_reporte_personal" placeholder="Ej: &quot;15345987&quot;">
								
							</div>
							<div class="col-md-6">
								<label for="nombres_reporte_personal">Nombres</label>
								<input class="form-control" maxlength="40" type="text" name="nombres_reporte_personal" id="nombres_reporte_personal" placeholder="Ej: &quot;Diego Alejandro&quot;">
								
							</div>
						</div>
			
						<div class="row">
							<div class="col-md-6">
								<label for="apellidos_reporte_personal">Apellidos</label>
								<input class="form-control" maxlength="40" type="text" name="apellidos_reporte_personal" id="apellidos_reporte_personal" placeholder="Ej: &quot;Aguilar Suarez&quot;">
								
							</div>
			
							<div class="col-md-6">
								<label for="cargo_reporte_personal">Cargo</label>
								<select class="selectpicker form-control" name="cargo_reporte_personal" id="cargo_reporte_personal" title="Seleccione Opcion">
									<option value="" hidden="" selected="hidden">Seleccionar Opcion</option>
									<option>Presidente</option>
									<option>Administrador</option>
									<option>Secretaria</option>
									<option>Entrenador</option>
								</select>
							</div>
						</div>
			
						<div class="row">
							<div class="col-md-12 text-center mb-3">
								<hr>
							</div>
						</div>

                  <div class="row mb-2 justify-content-center">
							<div class="col-md-3">
								<button type="submit" class="btn btn-danger w-100" id="generar_reporte_personal" name="generar_reporte_personal">GENERAR REPORTE</button>
							</div>
						</div>	
					</form>
				</div>
   
                           <div class="container text-center mt-3">
                              <p class="font-weight-normal text-justify  text-center">
                              En esta pantalla el usuario podrá realizar reportes del personal de los clubes anteriormente registrados, siendo así el usuario
                                 tiene que rellenar los espacios para que el sistema sepa los datos del personal del cual el usuario quiere realizar el reporte.
                              </p>
                           </div> 
   
                           <div class="container text-center mt-3">
                                 <p class="font-weight-normal text-justify  text-center">
                                 Al tener todos los espacios rellenos correctamente el usuario debe presionar el botón <button type="button" id="registrar6" class="btn btn-danger ml-2">GENERAR REPORTE</button> 
                                 </p>
                              </div> 
   
                           <div class="container text-center mt-3">
                                 <p class="font-weight-normal text-justify  text-center">
                                 El sistema creará una página de extensión pdf donde mostrará todo el 
                                 personal que coincide con los datos suministrados por el usuario.
                           </div> 
   
                           <div class="row">
                              <div class="col">
                                    <p class="font-weight-normal text-justify">
                                    <b>Al ingresar en</b><button class="btn btn-outline-dark btn-sm ml-2"><img src="img/iconos/reporte.png" style="width:30px;margin-right:10px;">Reporte de Evento</button>
                                 
                                    </p>
                              </div>
                           </div>
   
                           <div class="container-fluid border mt-4 shadow p-3 mb-4 bg-white rounded" style="width:95%;">
					<div class="container-fluid text-center h4 text-dark mb-4">
						Reporte de Eventos
					</div>
					<form method="post" action="" id="formulario_reporte_eventos" target="_blank">
			
						<div class="row">
							<div class="col-md-6">
								<label for="nombre_reporte_evento">Nombre</label>
								<input class="form-control" maxlength="40" type="text" name="nombre_reporte_evento" id="nombre_reporte_evento">
								
							</div>
							<div class="col-md-6">
								<label for="fecha_reporte_evento">Fecha</label>
								<input class="form-control" type="date" name="fecha_reporte_evento" id="fecha_reporte_evento">
							</div>
						</div>
			
						<div class="row">
							<div class="col-md-12 text-center mb-3">
								<hr>
							</div>
						</div>
			
						<div class="row mb-2 justify-content-center">
							<div class="col-md-3">
								<button class="btn btn-danger w-100" id="generar_reporte_eventos" name="generar_reporte_eventos">GENERAR REPORTE</button>
							</div>
						</div>
						
					</form>
				</div>
   
                           <div class="container text-center mt-3">
                              <p class="font-weight-normal text-justify  text-center">
                              En esta pantalla el usuario podrá realizar reportes de todos los eventos anteriormente registrados por el usuario, 
                              siendo así la persona tiene que rellenar todos los espacios para que el sistema conozca cuales son los datos que puedan coincidir con la búsqueda, para después realizar el reporte.
                              </p>
                           </div> 
   
                           <div class="container text-center mt-3">
                              <p class="font-weight-normal text-justify  text-center">
                              Al tener todos los espacios rellenos correctamente el usuario debe presionar el botón <button type="button" id="registrar6" class="btn btn-danger ml-2">GENERAR REPORTE</button> 
                              </p>
                           </div> 
   
                           <div class="container text-center mt-3">
                                 <p class="font-weight-normal text-justify  text-center">
                                 El sistema creará una página de extensión pdf donde mostrará todos los eventos que 
                                 coincidan con los datos suministrados por el usuario.
                           </div> 
   
                           <div class="row">
                              <div class="col">
                                    <p class="font-weight-normal text-justify">
                                    <b>Al ingresar en</b><button class="btn btn-outline-dark btn-sm ml-2"><img src="img/iconos/reporte.png" style="width:30px;margin-right:10px;">Reporte Resultado de Evento</button>
                                 
                                    </p>
                              </div>
                           </div>
   
                           <div class="container-fluid border mt-4 shadow p-3 mb-4 bg-white rounded" style="width:95%;">
			
         <div class="container-fluid text-center h4 text-dark mb-4">
            Reporte de Resultado de eventos
         </div>
         <form method="post" action="" id="formulario_reporte_resultados" target="_blank">
   
            <div class="row">
               <div class="col-md-12">
                  <label for="evento_reporte_resultados">Evento</label>
                  <select class="selectpicker form-control" name="evento_reporte_resultados" id="evento_reporte_resultados" data-live-search="true" title="Seleccione Opcion">
                     <option value="" hidden="" selected="hidden">Seleccione un evento</option> 
                     <option value=""></option>
                     <option value="Luchas Solidarias">Luchas Solidarias</option>
                     <option value="A por la gloria!">A por la gloria!</option>
                  </select>
               </div>
   
            </div>
   
            <div class="row">
               <div class="col-md-12 text-center mb-3">
                  <hr>
               </div>
            </div>
   
            <div class="row mb-2 justify-content-center">
               <div class="col-md-3">
                  <button type="submit" class="btn btn-danger w-100" id="generar_reporte_personal" name="generar_reporte_resultados">GENERAR REPORTE</button>
               </div>
            </div>
            
            
         </form>
      </div>
   
                           <div class="container text-center mt-3">
                              <p class="font-weight-normal text-justify  text-center">
                              En esta pantalla el usuario podrá realizar reportes de todos resultados de los eventos anteriormente realizados, 
                              Donde solo debe seleccionar el evento el cual desea generar reporte.
                              </p>
                           </div> 
   
                           <div class="container text-center mt-3">
                              <p class="font-weight-normal text-justify  text-center">
                              Al tener el Evento seleccionado el usuario debe presionar el botón <button type="button" id="registrar6" class="btn btn-danger ml-2">GENERAR REPORTE</button> 
                              </p>
                           </div> 
   
                           <div class="container text-center mt-3">
                              <p class="font-weight-normal text-justify  text-center">
                                 El sistema creará una página de extensión pdf donde mostrará todos Resultados de  los eventos que 
                                 coincidan con la seleccion suministrada por el usuario.
                              </p>
                           </div> 
   
                           <div class="row">
                              <div class="col">
                                    <p class="font-weight-normal text-justify">
                                    <b>Al ingresar en</b><button class="btn btn-outline-dark btn-sm ml-2"><img src="img/iconos/reporte.png" style="width:30px;margin-right:10px;">Reporte de Historial de Atletas</button>
                                 
                                    </p>
                              </div>
                           </div>
   
                           <div class="container-fluid border mt-4 shadow p-3 mb-4 bg-white rounded" style="width:95%;">
					<div class="container-fluid text-center h4 text-dark mb-4">
						Reporte de Historial de Atleta
					</div>
					<form method="post" action="" id="formulario_reporte_atleta" target="_blank">
			
						<div class="row">
							<div class="col-md-12">
								<label for="atleta_reporte">Atleta</label>
								<select class="selectpicker form-control" name="atleta_reporte" id="atleta_reporte" data-live-search="true" title="Seleccione Opcion">
									<option value=""></option>
                           <option value="Juan Dominguez">Juan Dominguez</option>
                           <option value="Julio	Jimenez">Julio	Jimenez</option>
								</select>
							</div>
						</div>
			
						<div class="row">
							<div class="col-md-12 text-center mb-3">
								<hr>
							</div>
						</div>
			
						<div class="row mb-2 justify-content-center">
							<div class="col-md-3">
								<button type="submit" class="btn btn-danger w-100" id="generar_reporte_historial_atleta" name="generar_reporte_historial_atleta">GENERAR REPORTE</button>
							</div>
						</div>
						
					</form>
				</div>
   
                           <div class="container text-center mt-3">
                              <p class="font-weight-normal text-justify  text-center">
                              En esta pantalla el usuario podrá realizar reporte del historial del atleta de resultados anteriormente registrados 
                              por el usuario, Seleccionando el atleta para así generar el reporte. 
                              </p>
                           </div> 
   
                           <div class="container text-center mt-3">
                              <p class="font-weight-normal text-justify  text-center">
                              Al tener el Evento seleccionado el usuario debe presionar el botón <button type="button" id="registrar6" class="btn btn-danger ml-2">GENERAR REPORTE</button> 
                              </p>
                           </div> 
   
                           <div class="row">
                              <div class="col">
                                    <p class="font-weight-normal text-justify">
                                    <b>Al ingresar en</b><button class="btn btn-outline-dark btn-sm ml-2"><img src="img/iconos/reporte.png" style="width:30px;margin-right:10px;">Reporte Estadistico de cantidad de participantes</button>
                                 
                                    </p>
                              </div>
                           </div>
   
                           <div class="container-fluid my-4 pt-4 shadow bg-white rounded" style="width:95%;">
            
            <div class="container-fluid mt-4 mb-3">
                <div class="row justify-content-between">
                    <div class="col-md-9 mb-2">
                        <div class="h4 text-dark">Reporte Estadistico de Cantidad Participantes</div>
                    </div>
                </div>
            </div>
            
            <div class="container-fluid mb-2">
                <div class="row justify-content-center">
                    <div class="col-md-6">
                        <label for="evento">Evento</label>
                        <select class="form-control" name="evento" id="evento">
                            <option value="" hidden="" selected="hidden">Seleccionar Opcion</option>
                            <option value=""></option>
                            <option value="Luchas Solidarias">Luchas Solidarias</option>
                            <option value="A por la gloria!">A por la gloria!</option>
                        </select>
                    </div>
                </div>
            </div>  

             <div>
               <br>
               <br>
            </div> 

        </div>

        
   
                           <div class="container text-center mt-3">
                              <p class="font-weight-normal text-justify  text-center">
                              En esta pantalla el usuario podrá visualizar la cantidad de todos los participantes registrados en un Evento, 
                              Mediante una grafica, donde solo debe seleccionar el evento:
                              </p>
                           </div> 
   
                           <div class="container text-center mt-3">
                              <p class="font-weight-normal text-justify  text-center">
                              Luego debe presionar el Evento que desee
                              </p>
                           </div> 
   
                           <div class="container text-center mt-3">
                                 <p class="font-weight-normal text-justify  text-center">
                                 El sistema mostrará la grafica diferenciando la cantidad de participantes inscritos entre Masculinos y Femeninos.
                                 Diferenciados entre 2 colores.
                           </div> 
   
                           <div class = "container text-center">
                                 <img src="img/manual/59.jpg" class="img-fluid rounded" alt="Responsive image" width="700px">
                           </div>
   
                           <div class="row">
                              <div class="col">
                                    <p class="font-weight-normal text-justify">
                                    <b>Al ingresar en</b><button class="btn btn-outline-dark btn-sm ml-2"><img src="img/iconos/reporte.png" style="width:30px;margin-right:10px;">Reporte Estadistico de cantidad de Zona de Vivienda</button>
                                 
                                    </p>
                              </div>
                           </div>
   
                           <div class = "container text-center">
                              <img src="img/manual/61.jpg" class="img-fluid rounded" alt="Responsive image" width="700px">
                           </div>
   
                           <div class="container text-center mt-3">
                              <p class="font-weight-normal text-justify  text-center">
                                 En esta pantalla el usuario podrá visualizar Mediante una grafica, la cantidad de zona de viviendas del total
                                 de participantes.
                              </p>
                           </div> 
   
                           <div class="container p3">
   
                              <div class="row mt-3">
                                 <div class="col-md-12">
                                    <div class="h3 text-dark">SEGURIDAD</div>
                                 </div>       
                              </div>
   
                              <div class="row">
                                 <div class="col">
                                       <p class="font-weight-normal text-justify">
                                       En el menu desplegable darle click al boton <button class="btn btn-outline-dark btn-sm ml-2"><img src="img/iconos/seguridad.png" style="width:30px;margin-right:10px;">Seguridad</button>
                                       y despues darle click al boton <button class="btn btn-outline-dark btn-sm ml-2"><img src="img/iconos/bitacora.png" style="width:30px;margin-right:10px;">Bitacora de Usuario</button>
                                       y asi llegara a la vista principal:
                                       </p>
                                 </div>
                              </div>
   
                              <div class="container-fluid pt-3 my-4 shadow-lg bg-white rounded" style="width:95%;">
			
					<div class="container-fluid mt-4 mb-3">
						<div class="row justify-content-between">
							<div class="col-auto mr-auto mb-2">
								<div class="h4 text-dark">Bitacora de Usuarios</div>
							</div>
							<div class="col-auto">
								<button type="button" class="btn btn-success" id="boton_recargar">
									<i class="bi bi-arrow-repeat mr-1"></i></i>Actualizar
								</button>
							</div>
						</div>
					</div>
					
					<div class="">
						
								<div class="table-responsive mb-4" > 
									<table class="table table-hover table-borderless" id="tablaconsulta" width="100%" cellspacing="0">
										<thead class="">
											
											<th>Usuario</th>
											<th>Nombre</th>
											<th>Modulo</th>
											<th>Fecha Registro</th>
											<th>Hora Registro</th>
											<th>Accion Realizada</th>
										</thead>
                              <tbody>
                                 <tr>
                                    <td>29945099</td>
                                    <td>Cirez Barriga</td>
                                    <td>Gestionar Atleta</td>
                                    <td>03/10/2023</td>
                                    <td>03:24:07 PM</td>
                                    <td>Ha consultado la tabla de Atletas</td>
                                 </tr>
                                 <tr>
                                 <td>29945099</td>
                                    <td>Cirez Barriga</td>
                                    <td>Gestionar Atleta</td>
                                    <td>03/10/2023</td>
                                    <td>03:24:07 PM</td>
                                    <td>Ha registrado un atleta</td></td>
                                 </tr>
                              </tbody>
										
									</table>
								</div>
							
					</div>
					
				</div>
                              <div class="container text-center mt-3">
                                 <p class="font-weight-normal text-justify  text-center">
                                 Primero que nada se mostrara una lista, Con las acciones realizadas dentro del sistema con toda la información específica:
                                 </p>
                              </div> 
   
                              <div class="container text-center mt-3">
                                 <p class="font-weight-normal text-justify  text-center">
                                 En esta pantalla podremos visualizar todo lo que se a realizado dentro del sistema, Todas las acciones y movimientos, Mostrando el usuarios que realizo la opción. 
                                 </p>
                              </div>
                              
                              <div class="row mt-3">
                                 <div class="col-md-12">
                                    <div class="h3 text-dark">ROLES Y PERMISOS</div>
                                 </div>       
                              </div>
   
                              <div class="row">
                                 <div class="col">
                                       <p class="font-weight-normal text-justify">
                                       En el menu desplegable, se le debe dar click al boton <button class="btn btn-outline-dark btn-sm ml-2"><img src="img/iconos/seguridad.png" style="width:30px;margin-right:10px;">Seguridad</button>
                                       y despues click al boton <button class="btn btn-outline-dark btn-sm ml-2"><img src="img/iconos/rol.png" style="width:30px;margin-right:10px;">Roles y Permisos</button>
                                       y asi llegara a la vista principal:
                                       </p>
                                 </div>
                              </div>
   
                              <div class="container-fluid mt-4">
						<div class="row">
							<div class="col-auto mr-auto mb-2">
								<div class="h4 text-dark">Roles y Permisos</div>
							</div>
							<div class="col-auto mb-2">
								<button type="button" class="btn btn-success"  data-toggle="modal" data-target="#modal_gestion" id="boton_nuevo">
									<i class="bi bi-plus-circle mr-1"></i>Nuevo registro
								</button>
							</div>
						</div>
					</div>
						
					<div class="mb-5">
						<div class="row">
							<div class="col-md-12" >
								<div class="table-responsive">
									<table class="table table-striped table-hover table-borderless" id="tablaconsulta" width="100%" cellspacing="0">
										<thead class="thead-dark">
											<tr> 
												<th>#</th> 
												<th>Nombre</th>
												<th>Descripcion</th>
												<th>Accion</th>
											</tr>
										</thead>
										<tbody id="resultadoconsulta">
												<tr>
													<td>1</td>
													<td>Super Usuario</td>
													<td>Administra absolutamente todo el sistema sin ninguna restricción</td>
													<td><button type="button" class="btn btn-dark mb-1 mr-1"><i class="bi bi-key-fill"></i></button>
                                       <button type="button" class="btn btn-primary mb-1 mr-1" id="boton_modificar"><i class="bi bi-pencil-fill"></i></button>
                                       <button type="button" class="btn btn-danger mb-1 "><i class="bi bi-x-lg"></i></button></td>
												</tr>
                                    <tr>
                                       <td>5</td>
                                       <td>Administrador</td>
                                       <td>Puede acceder a casi todos los modulos excepto de seguridad</td>
                                       <td><button type="button" class="btn btn-dark mb-1 mr-1"><i class="bi bi-key-fill"></i></button>
                                       <button type="button" class="btn btn-primary mb-1 mr-1" id="boton_modificar"><i class="bi bi-pencil-fill"></i></button>
                                       <button type="button" class="btn btn-danger mb-1 "><i class="bi bi-x-lg"></i></button></td>
                                    </tr>
                                    <tr>
                                       <td>12</td>
                                       <td>Usuario</td>
                                       <td>solo puede visualizar ciertos modulos</td>
                                       <td><button type="button" class="btn btn-dark mb-1 mr-1"><i class="bi bi-key-fill"></i></button>
                                       <button type="button" class="btn btn-primary mb-1 mr-1" id="boton_modificar"><i class="bi bi-pencil-fill"></i></button>
                                       <button type="button" class="btn btn-danger mb-1 "><i class="bi bi-x-lg"></i></button></td>
                                    </tr>
										</tbody>
									</table>
								</div>
								
							</div>
						</div>
					</div>
   
                              <div class="container text-center mt-3">
                                 <p class="font-weight-normal text-justify  text-center">
                                 En primer lugar, muestra una lista con los roles y su descripción 
                                 </p>
                              </div> 
   
                              <div class="row mb-3">
                                 <div class="col-md-12">
                                    <p class="font-weight-normal text-justify">
                                    Para registrar un Rol se debe presionar sobre <button class="btn btn-success "><i class="bi bi-plus-circle mr-1"></i>Nuevo registro</button>
                                    y le aparecera el siguiente formulario: </p>
                                 </div>               
                              </div>
   
                              <div class="container-fluid">
						<div class="row">
							<div class="col-md-12">
								<label for="nombre_rol">Nombre de Rol</label>
								<input class="form-control" maxlength="30" type="text" name="nombre_rol" id="nombre_rol" placeholder="Ej: &quot;Administrador, Invitado...&quot;">
								<span class="texto" id="snombre_rol" style="color: #ff0000;"></span>
							</div>
						</div>

						<div class="row">
							<div class="col-md-12">
								<label for="descripcion_rol">Descripcion de Rol</label>
								<input class="form-control" maxlength="50" type="text" name="descripcion_rol" id="descripcion_rol">
								<span class="texto" id="sdescripcion_rol" style="color: #ff0000;"></span>
							</div>
						</div>

						<div class="row mt-3">
							<div class="col-md-12">
								<div class="table-responsive card">
									<table class="table table-hover ">
										<thead class="thead-dark">
											<th>Modulo</th>
											<th class="text-center">Acceso</th>
										</thead>
										<tbody>
											<tr>
												<td>Gestionar Clubes</td>
												<td class="text-center">
													<input type="checkbox" class="form-check-input" id="modulo_club" name="modulo_club">
												</td>
											</tr>
											<tr>
												<td>Gestionar Personal</td>
												<td class="text-center">
													<input type="checkbox" class="form-check-input" id="modulo_personal" name="modulo_personal">
												</td>
											</tr>
											<tr>
												<td>Gestionar Atletas</td>
												<td class="text-center">
													<input type="checkbox" class="form-check-input" id="modulo_atletas" name="modulo_atletas">
												</td>
											</tr>
											<tr>
												<td>Gestionar Datos Medicos</td>
												<td class="text-center">
													<input type="checkbox" class="form-check-input" id="modulo_medicos" name="modulo_medicos">
												</td>
											</tr>
											<tr>
												<td>Gestionar Datos Socioeconomicos</td>
												<td class="text-center">
													<input type="checkbox" class="form-check-input" id="modulo_socioeconomicos" name="modulo_socioeconomicos">
												</td>
											</tr>
											<tr>
												<td>Gestionar Eventos</td>
												<td class="text-center">
													<input type="checkbox" class="form-check-input" id="modulo_eventos" name="modulo_eventos">
												</td>
											</tr>
											<tr>
												<td>Gestionar Usuarios</td>
												<td class="text-center">
													<input type="checkbox" class="form-check-input" id="modulo_usuarios" name="modulo_usuarios">
												</td>
											</tr>
											<tr>
												<td>Bitacora de Usuarios</td>
												<td class="text-center">
													<input type="checkbox" class="form-check-input" id="modulo_bitacora" name="modulo_bitacora">
												</td>
											</tr>
											<tr>
												<td>Roles y Permisos</td>
												<td class="text-center">
													<input type="checkbox" class="form-check-input" id="modulo_roles" name="modulo_roles">
												</td>
											</tr>
											<tr>
												<td>Inscripcion a Evento</td>
												<td class="text-center">
													<input type="checkbox" class="form-check-input" id="modulo_inscripcion" name="modulo_inscripcion">
												</td>
											</tr>
											<tr>
												<td>Emparejamientos y Combates</td>
												<td class="text-center">
													<input type="checkbox" class="form-check-input" id="modulo_emparejamientos" name="modulo_emparejamientos">
												</td>
											</tr>
											<tr>
												<td>Resultado de Eventos</td>
												<td class="text-center">
													<input type="checkbox" class="form-check-input" id="modulo_resultados" name="modulo_resultados">
												</td>
											</tr>
											<tr>
												<td>Historial del Atleta</td>
												<td class="text-center">
													<input type="checkbox" class="form-check-input" id="modulo_historial" name="modulo_historial">
												</td>
											</tr>

											<tr>
												<td>Reportes</td>
												<td class="text-center">
													<input type="checkbox" class="form-check-input" id="modulo_reportes" name="modulo_reportes">
												</td>
											</tr>
										</tbody>
									</table>
								</div>
							</div>
						</div>

					</div>
   
                              <div class="container text-center mt-3">
                                 <p class="font-weight-normal text-justify  text-center">
                                    El usuario deberá rellenar correctamente cada uno de los espacios en blanco del formulario. 
                                 </p>
                              </div> 
   
                              <div class="mt-3">  
                                 <p class="font-weight-normal text-justify text-center">
                                       Para registrar exitosamente el rol. <b>Presione el boton</b> <button type="button" id="registrar9" class="btn btn-danger ml-2"><i class="bi bi-check-lg mr-1"></i>Registrar</button>
                                 </p>
                              </div>

                                 <div class="mt-3">  
                                 <p class="font-weight-normal text-justify text-center">
                                    Se agrega a la lista, Y allí se podría asignar los permisos, Modificar o eliminar.
                                 </p>
                              </div>
   
                              <div class="row mb-3">
                                 <div class="col-md-12">
                                    <p class="font-weight-normal text-justify">
                                    Para asignar los permisos debe presionar sobre:  <button class="btn btn-dark ml-2"><i class="bi bi-key-fill"></i></button>
                                    </p>
                                 </div>               
                              </div>
   
                              <div class="row mt-3">
							<div class="col-md-12">
								<div class="table-responsive card">
									<table class="table table-hover ">
                              <thead class="thead-dark">
                                 <th>Permisos de Rol</th>
                              </thead>
										<tbody>
                                 <tr>
                                 <td>Modulo</td>
											<td class="text-center">Acceso</td>
                                 </tr>
											<tr>
												<td>Gestionar Clubes</td>
												<td class="text-center">
													<input type="checkbox" class="form-check-input" id="modulo_club" name="modulo_club">
												</td>
											</tr>
											<tr>
												<td>Gestionar Personal</td>
												<td class="text-center">
													<input type="checkbox" class="form-check-input" id="modulo_personal" name="modulo_personal">
												</td>
											</tr>
											<tr>
												<td>Gestionar Atletas</td>
												<td class="text-center">
													<input type="checkbox" class="form-check-input" id="modulo_atletas" name="modulo_atletas">
												</td>
											</tr>
											<tr>
												<td>Gestionar Datos Medicos</td>
												<td class="text-center">
													<input type="checkbox" class="form-check-input" id="modulo_medicos" name="modulo_medicos">
												</td>
											</tr>
											<tr>
												<td>Gestionar Datos Socioeconomicos</td>
												<td class="text-center">
													<input type="checkbox" class="form-check-input" id="modulo_socioeconomicos" name="modulo_socioeconomicos">
												</td>
											</tr>
											<tr>
												<td>Gestionar Eventos</td>
												<td class="text-center">
													<input type="checkbox" class="form-check-input" id="modulo_eventos" name="modulo_eventos">
												</td>
											</tr>
											<tr>
												<td>Gestionar Usuarios</td>
												<td class="text-center">
													<input type="checkbox" class="form-check-input" id="modulo_usuarios" name="modulo_usuarios">
												</td>
											</tr>
											<tr>
												<td>Bitacora de Usuarios</td>
												<td class="text-center">
													<input type="checkbox" class="form-check-input" id="modulo_bitacora" name="modulo_bitacora">
												</td>
											</tr>
											<tr>
												<td>Roles y Permisos</td>
												<td class="text-center">
													<input type="checkbox" class="form-check-input" id="modulo_roles" name="modulo_roles">
												</td>
											</tr>
											<tr>
												<td>Inscripcion a Evento</td>
												<td class="text-center">
													<input type="checkbox" class="form-check-input" id="modulo_inscripcion" name="modulo_inscripcion">
												</td>
											</tr>
											<tr>
												<td>Emparejamientos y Combates</td>
												<td class="text-center">
													<input type="checkbox" class="form-check-input" id="modulo_emparejamientos" name="modulo_emparejamientos">
												</td>
											</tr>
											<tr>
												<td>Resultado de Eventos</td>
												<td class="text-center">
													<input type="checkbox" class="form-check-input" id="modulo_resultados" name="modulo_resultados">
												</td>
											</tr>
											<tr>
												<td>Historial del Atleta</td>
												<td class="text-center">
													<input type="checkbox" class="form-check-input" id="modulo_historial" name="modulo_historial">
												</td>
											</tr>

											<tr>
												<td>Reportes</td>
												<td class="text-center">
													<input type="checkbox" class="form-check-input" id="modulo_reportes" name="modulo_reportes">
												</td>
											</tr>
										</tbody>
									</table>
								</div>
							</div>
   
                                 <div class="mt-3">  
                                    <p class="font-weight-normal text-justify text-center">
                                       Selecciona los permisos a asignar y luego presiona en Actualizar. <b>Preione el boton</b>  <button class="btn btn-success ml-2" id="registrar10"><i class="bi bi-check-circle mr-1"></i>Actualizar</button>
                                                      
                                    </p>
                                 </div>
   
                                 <div class="row mb-3">
                                 <div class="col-md-12">
                                    <p class="font-weight-normal text-justify">
                                    Para modificar el rol debe presionar sobre <button type='button' class='btn btn-primary mb-1 mr-1 ml-2' id='boton_modificar'><i class='bi bi-pencil-fill'></i></button>
                                    y le aparecera el siguiente formulario:</p>
                                 </div>   
                              </div>
                                 
          <div class="container-fluid pt-3 my-4 shadow-lg bg-white rounded" style="width:95%;">
					<div class="container-fluid">
						<div class="row">
							<div class="col-md-12">
								<label for="nombre_rol2">Nombre de Rol</label>
								<input class="form-control" disabled type="text" name="nombre_rol2" id="nombre_rol2" placeholder="Ej: &quot;Administrador, Invitado...&quot;">
								<span class="texto" id="snombre_rol2" style="color: #ff0000;"></span>
							</div>
						</div>

						<div class="row">
							<div class="col-md-12">
								<label for="descripcion_rol2">Descripcion de Rol</label>
								<input class="form-control" type="text" name="descripcion_rol2" id="descripcion_rol2">
								<span class="texto" id="sdescripcion_rol2" style="color: #ff0000;"></span>
                        <br>
							</div>
						</div>

					</div>
				</div>
         </div>
                              <div class="mt-3">  
                                 <p class="font-weight-normal text-justify text-center">
                                    Modifica la informacion y presiona modificar. <b>Presione el boton</b> <button type="button" class="btn btn-danger" id="modifica11"><i class="bi bi-pencil-fill mr-1"></i>Modificar</button>
                                 </p>
                              </div>
   
                              <div class="row mb-3">
                                 <div class="col-md-12">
                                    <p class=" text-center font-weight-normal text-justify">
                                       Para eliminar un rol solo debe presionar en la X. <b>Presione el boton</b> <button type='button'  class='btn btn-danger mb-1' id="eliminar11"><i class='bi bi-x-lg'></i></button>
                                    </p>
                                 </div>               
                              </div>
                           </div>
                           
                           <div class="row mt-3">
                              <div class="col-md-12">
                                 <div class="h3 text-dark">USUARIOS</div>
                              </div>       
                           </div>
   
                           <div class="row">
                              <div class="col">
                                    <p class="font-weight-normal text-justify">
                                    En el menu desplegable debe darle click al boton <button class="btn btn-outline-dark btn-sm ml-2"><img src="img/iconos/seguridad.png" style="width:30px;margin-right:10px;">Seguridad</button>
									y de ahi darle click al boton <button class="btn btn-outline-dark btn-sm ml-2"><img src="img/iconos/usuario.png" style="width:30px;margin-right:10px;">Usuarios</button>
									y asi llegara a la vista principal:
                                    </p>
                              </div>
                           </div>
   
                           <div class="container-fluid mt-4 mb-3">
						<div class="row">
							<div class="col-auto mr-auto mb-2">
								<div class="h4 text-dark">Gestionar Usuarios</div>
							</div>
							<div class="col-auto">
									<button type="button" class="btn btn-success"  data-toggle="modal" data-target="#modal_gestion" id="boton_nuevo" onclick="modalregistrar()">
										<i class="bi bi-plus-circle mr-1"></i>Nuevo registro
									</button>
							</div>
						</div>
					</div>
					
					<div class="container-fluid">
						<div class="row">
							<div class="col-md-12" >
								<div class="table-responsive">
									<table class="table table-striped table-hover table-borderless" id="tablaconsulta" width="100%" cellspacing="0">
										<thead class="thead-dark">
											<th>Cedula</th>
											<th>Nombre</th>
											<th>Correo</th>
											<th>Contraseña</th>
											<th style="display:none">Confirmacion Contraseña</th>
											<th>Rol Usuario</th>
											<th style="display:none">id_rol</th>
											<th>Acciones</th>
										</thead>
										<tbody id="resultadoconsulta">

												<tr>
													<td colspan="6">No hay informacion</td>
													<td style="display:none"></td>
													<td style="display:none"></td>
													<td style="display:none"></td>
													<td style="display:none"></td>
													<td style="display:none"></td>
												</tr>
										</tbody>
									</table>
								</div>
								
							</div>
						</div>
					</div>
   
                           <div class="container text-center mt-3">
                              <p class="font-weight-normal text-justify  text-center">
                              En primer lugar, Si hay usuarios registrados, Aparecerán en la lista.
                              </p>
                           </div> 
   
                           <div class="row mb-3">
                              <div class="col-md-12">
                                 <p class="font-weight-normal text-justify">
                                 Para registrar un nuevo Usuario debe presionar sobre <button class="btn btn-success "><i class="bi bi-plus-circle mr-1"></i>Nuevo registro</button>
                                 y le aparecera el siguiente formulario:</p>
                              </div>               
                           </div>
   
                           <div class="container-fluid">
						<div class="row">
							<div class="col-md-12">
								<label for="cedula_usuarios">Cedula</label>
								<input class="form-control" maxlength="8" type="text" name="cedula_usuarios" id="cedula_usuarios" placeholder="Ej: &quot;15345987&quot;">
								<span class="texto" id="scedula_usuarios" style="color: #ff0000;"></span>
							</div>
						</div>

						<div class="row">
							<div class="col-md-12">
								<label for="nombre_usuarios">Nombre</label>
								<input type="text" maxlength="30" class='form-control' id='nombre_usuarios' name='nombre_usuarios'>
								<span class="texto" id="snombre_usuarios" style="color: #ff0000;"></span>
							</div>
						</div>

						<div class="row">
							<div class="col-md-6">
								<label for="contrasena_usuarios">Contraseña</label>
								<input class="form-control" maxlength="20" type="password" name="contrasena_usuarios" id="contrasena_usuarios">
								<span class="texto" id="scontrasena_usuarios" style="color: #ff0000;"></span>
							</div>

							<div class="col-md-6">
								<label for="contrasena2_usuarios">Confirmar Contraseña</label>
								<input class="form-control" maxlength="20" type="password" name="contrasena2_usuarios" id="contrasena2_usuarios">
								<span class="texto" id="scontrasena2_usuarios" style="color: #ff0000;"></span>
							</div>
						</div> 

						<div class="row">
							<div class="col-md-12">
								<label for="correo_usuarios">Correo</label>
								<input type="email" class="form-control" id="correo_usuarios" name="correo_usuarios" maxlength="50">
								<span class="texto" id="scorreo_usuarios" style="color: #ff0000;"></span>
							</div>
						</div>

						<div class="row">
							<div class="col-md-12">
								<label for="rol_usuario">Rol de Usuario</label>
								<select class="form-control" name="rol_usuario" id="rol_usuario">
									<option value="" hidden="" selected="hidden">Seleccionar Opcion</option>
									<option value="Super Usuario">Super Usuario</option>
									<option value="admin">administrador</option>
									<option value="Usuario">Usuario</option>
								</select>
							</div>
						</div>
					</div>
   
                           <div class="container text-center mt-3">
                                 <p class="font-weight-normal text-justify  text-center">
                                 El usuario deberá rellenar correctamente cada uno de los espacios en blanco del formulario.
                                 </p>
                           </div> 

                           <div class="mt-3">  
                              <p class="font-weight-normal text-justify text-center">
                                    Para registrar exitosamente el rol. <b>Presione el boton</b> <button type="button" id="registrar12" class="btn btn-danger ml-2"><i class="bi bi-check-lg mr-1"></i>Registrar</button>
                              </p>
                           </div>                   
   
                           <div class="mt-3">  
                              <p class="font-weight-normal text-justify text-center">
                              Una vez registrado el Usuario aparecerá en la lista. Donde podrá modificar o eliminar su información
                              </p>
                           </div>
			
			<div class="container-fluid mt-4 mb-3">
			
			<div class="container-fluid">
				<div class="row">
					<div class="col-md-12" >
						<div class="table-responsive">
							<table class="table table-striped table-hover table-borderless" id="tablaconsulta" width="100%" cellspacing="0">
								<thead class="thead-dark">
									<th>Cedula</th>
									<th>Nombre</th>
									<th>Correo</th>
									<th>Contraseña</th>
									<th style="display:none">Confirmacion Contraseña</th>
									<th>Rol Usuario</th>
									<th style="display:none">id_rol</th>
									<th>Acciones</th>
								</thead>
								<tbody id="resultadoconsulta">

										<tr>
											<td>30591237</td>
											<td>Luis Perdomo</td>
											<td>luis@gmail.com</td>
											<td>$2y$12$8ODK2sJJfrCKs.</td>
											<td>Super Usuario</td>
											<td><button type="button" class="btn btn-primary mb-1 mr-1" id="boton_modificar"><i class="bi bi-pencil-fill"></i></button>
                                      	 		<button type="button" class="btn btn-danger mb-1 "><i class="bi bi-x-lg"></i></button></td>
										</tr>
								</tbody>
							</table>
						</div>
						
					</div>
				</div>
			</div>
			
		</div>
   
                           <div class="row mb-3">
                              <div class="col-md-12">
                                 <p class="font-weight-normal text-justify">
                                 Para modificar Usuario debe presionar sobre <button type='button' class='btn btn-primary mb-1 mr-1 ml-2' id='boton_modificar'><i class='bi bi-pencil-fill'></i></button>
                                 y le aparecera el siguiente formulario: </p>
                              </div>   
                           </div>
                                    
						   <div class="container-fluid">
						<div class="row">
							<div class="col-md-12">
								<label for="cedula_usuarios">Cedula</label>
								<input class="form-control" maxlength="8" type="text" name="cedula_usuarios" id="cedula_usuarios" placeholder="Ej: &quot;15345987&quot;">
								<span class="texto" id="scedula_usuarios" style="color: #ff0000;"></span>
							</div>
						</div>

						<div class="row">
							<div class="col-md-12">
								<label for="nombre_usuarios">Nombre</label>
								<input type="text" maxlength="30" class='form-control' id='nombre_usuarios' name='nombre_usuarios'>
								<span class="texto" id="snombre_usuarios" style="color: #ff0000;"></span>
							</div>
						</div>

						<div class="row">
							<div class="col-md-6">
								<label for="contrasena_usuarios">Contraseña</label>
								<input class="form-control" maxlength="20" type="password" name="contrasena_usuarios" id="contrasena_usuarios">
								<span class="texto" id="scontrasena_usuarios" style="color: #ff0000;"></span>
							</div>

							<div class="col-md-6">
								<label for="contrasena2_usuarios">Confirmar Contraseña</label>
								<input class="form-control" maxlength="20" type="password" name="contrasena2_usuarios" id="contrasena2_usuarios">
								<span class="texto" id="scontrasena2_usuarios" style="color: #ff0000;"></span>
							</div>
						</div> 

						<div class="row">
							<div class="col-md-12">
								<label for="correo_usuarios">Correo</label>
								<input type="email" class="form-control" id="correo_usuarios" name="correo_usuarios" maxlength="50">
								<span class="texto" id="scorreo_usuarios" style="color: #ff0000;"></span>
							</div>
						</div>

						<div class="row">
							<div class="col-md-12">
								<label for="rol_usuario">Rol de Usuario</label>
								<select class="form-control" name="rol_usuario" id="rol_usuario">
									<option value="" hidden="" selected="hidden">Seleccionar Opcion</option>
									<option value="Super Usuario">Super Usuario</option>
									<option value="admin">administrador</option>
									<option value="Usuario">Usuario</option>
								</select>
							</div>
						</div>
					</div>
   
                           <div class="mt-3">  
                              <p class="font-weight-normal text-justify text-center">
                                 Modifica la informacion y presiona modificar. <b>Presione el boton</b> <button type="button" class="btn btn-danger" id="modifica12"><i class="bi bi-pencil-fill mr-1"></i>Modificar</button>
                              </p>
                           </div>

						   <div class="container-fluid mt-4 mb-3">
			
			<div class="container-fluid">
				<div class="row">
					<div class="col-md-12" >
						<div class="table-responsive">
							<table class="table table-striped table-hover table-borderless" id="tablaconsulta" width="100%" cellspacing="0">
								<thead class="thead-dark">
									<th>Cedula</th>
									<th>Nombre</th>
									<th>Correo</th>
									<th>Contraseña</th>
									<th style="display:none">Confirmacion Contraseña</th>
									<th>Rol Usuario</th>
									<th style="display:none">id_rol</th>
									<th>Acciones</th>
								</thead>
								<tbody id="resultadoconsulta">

										<tr>
											<td>30591237</td>
											<td>Luis Gustavo Perdomo</td>
											<td>luis@gmail.com</td>
											<td>$2y$12$8ODK2sJJfrCKs.</td>
											<td>Administrador</td>
											<td><button type="button" class="btn btn-primary mb-1 mr-1" id="boton_modificar"><i class="bi bi-pencil-fill"></i></button>
                                      	 		<button type="button" class="btn btn-danger mb-1 "><i class="bi bi-x-lg"></i></button></td>
										</tr>
								</tbody>
							</table>
						</div>
						
					</div>
				</div>
			</div>
			
		</div>		

                           <br>
   
						   <div class="row mb-2">
                           <div class="col-md-12">
                              <div class="h4 text-dark text-center">Para Eliminar</div>
                           </div>  
                     </div>

                           <div class="row mb-3">
                              <div class="col-md-12">
                                 <p class=" text-center font-weight-normal text-justify">
                                    Para eliminar un rol solo debe presionar en la X. <b>Presione el boton</b> <button type='button'  class='btn btn-danger mb-1' id="eliminar12"><i class='bi bi-x-lg'></i></button>
                                 </p>
                              </div>               
                           </div>
                        </div>
   
                        <div class="row mt-3">
                           <div class="col-md-12">
                              <div class="h3 text-dark">ACERCA DE</div>
                           </div>       
                        </div>
   
                        <div class="row">
                           <div class="col">
							<br>
							<br>
                                 <br><p class=" text-center font-weight-normal text-justify">
                                    En el menu desplegable debe darle click al boton  <button class="btn btn-outline-dark btn-sm ml-2">Acerca de</button>
                              
                                 </p>
                           </div>
                        </div>
   
                        <div class="container-fluid border mt-4 shadow p-3 mb-4 bg-white rounded" style="width:95%;">
					
					<div class="card-body">
						<div class="h5 text-center">
							Reglas de las Artes Marciales Mixtas.
						</div>
						<div class="mt-3">
							<p class="font-weight-normal text-justify">
								Las reglas de la mayoría de las competiciones de artes marciales mixtas han evolucionado desde los primeros días del "Vale todo". A medida que el conocimiento avanza las técnicas de lucha se extienden entre espectadores y luchadores se hace claro que los primeros sistemas de reglas minimalistas necesitaban ser enmendados. Alguna de las motivaciones de estos cambios son:
							</p>
						</div>
						
						<div class="mt-3">
							<p class="font-weight-normal text-justify">
								Protección de la salud de los luchadores: Este cambio se hallaba especialmente motivado para eliminar el estigma de "peleas barbáricas, sin reglas" que las MMA ganaron debido a sus raíces donde todo era válido. También ayudó a los contendientes a evitar lesiones que de otro modo hubiesen alterado el ritmo de entrenamiento que mejoraba la calidad de los contendientes, y, consecuentemente, la calidad de las luchas.
							</p>
						</div>
	
						<div class="mt-3">
							<p class="font-weight-normal text-justify">
								Proveer espectáculo para los espectadores: Las reglas consiguieron que los buenos luchadores se exhiban mejor, no permaneciendo mucho en el suelo.
							</p>
						</div>
	
						<div class="mt-3">
							<p class="font-weight-normal text-justify">
								Las únicas excepciones de las MMA es no picar los ojos, en orificios, ni golpes bajos. Los puños, codos, rodillas y patadas son válidas para un combate en la jaula, donde se realizan habitualmente las peleas. No patear desde el suelo. Las categorías de peso emergieron a medida que el conocimiento acerca de las sumisiones e inmovilizaciones se extendió. Cuando los luchadores se hacían más expertos en las técnicas de sumisión y eran capaces de evitarlas, las diferencias de peso se convirtieron un factor substancial. Desde los inicios de los torneos de vale-todo existía la prohibición de golpes en los genitales, y la prohibición de ataques a los ojos, y dedos; en algunos torneos y más recientemente, surgió la prohibición de patear a un oponente que se encuentre en el suelo (si esta acción es efectuada por un oponente que está de pie). Los cabezazos fueron prohibidos debido a que eran golpes que requerían poco esfuerzo y técnica, convirtiendo un combate en un espectáculo sangriento. Dar cabezazos era común entre los luchadores de lucha libre. Su fuerza les permitía arrastrar el combate al suelo.
							</p>
						</div>
	
						<div class="mt-3">
							<p class="font-weight-normal text-justify">
								Los guantes pequeños con dedos libres, se introdujeron para proteger los nudillos y huesos de las manos durante los puñetazos. A pesar de que algunos luchadores tenían unos puños bien preparados, otros, como aquellos que usaban técnicas de sometimiento, podían no tenerlos. Los guantes protegen las manos de fracturas y cortes. El protector bucal también se incorporó para proteger los dientes de fracturas.Los límites de tiempo fueron establecidos para evitar largas luchas en el suelo con poca acción perceptible, para los espectadores. Los combates sin límite de tiempo de los primeros campeonatos, complicaban además la retransmisión de los combates. Una motivación similar produjo la regla stand up (ponerse de pie), donde el árbitro puede levantar a los luchadores si cree que ambos están descansando en el suelo o no se están realizando avances significativos para tomar una posición dominante. En categorías o empresas se suele usar cascos que protegen toda la cara y cabeza, y que tienen rejillas para proteger todo el rostro, y pueden usar guantes como los de box.
							</p>
						</div>
	
					</div>
					
				</div>
   
                        <div class="container text-center mt-3">
                           <p class="font-weight-normal text-justify  text-center">
                              Breve reglas de la comunidad
                           </p>
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
   <script  type="text/javascript" src="js/manual.js" ></script>
</body>
</html>