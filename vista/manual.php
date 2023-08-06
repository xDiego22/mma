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
                           El presente manual sirve de ayuda para manejar el sistema web 
                           para cada una de las acciones que se encuentran, Y puedan entender su funcionamiento
                           con los paso a paso y mediante imágenes para mayor comprensión.
                        </p>
                     </div>
                  </div>
   
                  <div class="container p3">
   
                     <div class="row mt-3">
                        <div class="col-md-12">
                           <div class="h3 text-dark">GESTION DE CLUBES</div>
                        </div>       
                     </div>
   
                     <div class="row">
                        <div class="col">
                              <p class="font-weight-normal text-justify">
                                 En el menu, Al presionar sobre la opcion: <button class="btn btn-outline-dark btn-sm"><img src="img/iconos/clubes.png" style="width:30px;margin-right:10px;">Clubes</button>
                              </p>
                        </div>
                     </div>
   
                     <div class = "container text-center">
                        <img src="img/manual/1.jpg" class="img-fluid rounded" alt="Responsive image" width="700px">
                     </div>
   
                     <div class="mt-3 mb-5">
                        <p class="font-weight-normal text-justify text-center">
                           Se muestra la pantalla Gesion de clubes. Si hay clubes registrados, Aparecerán en la lista.
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
                           Para registrar un nuevo Club deberá presionar sobre <button class="btn btn-success "><i class="bi bi-plus-circle mr-1"></i>Nuevo registro</button>
                           </p>
                        </div>               
                     </div>
   
                     <div class="container text-center">
                        <img src="img/manual/2.jpg" class="img-fluid rounded" alt="Responsive image" width="700px">
                     </div>
   
                     <div class="container text-center mt-3">
                        <p class="font-weight-normal text-justify  text-center">
                        El usuario deberá rellenar correctamente cada uno de los espacios en blanco del formulario.
                        </p>
                     </div> 
   
                     <div class="container text-center">
                           <img src="img/manual/3.jpg" class="img-fluid rounded"  alt="Responsive image" width="700px">
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
                     
                     <div class="container text-center mt-3">
                        <img src="img/manual/4.jpg" class="img-fluid rounded"  alt="Responsive image" width="700px">
                     </div> 
   
                     <div class="row mb-2">
                        <div class="col-md-12">
                           <div class="h4 text-dark text-center">Para MODIFICAR</div>
                        </div>  
                     </div>
   
                     <div class="row mb-3">
                        <div class="col-md-12">
                           <p class="font-weight-normal text-justify">
                           Para modificar la informacion de un  Club deberá presionar sobre <button type='button' class='btn btn-primary mb-1 mr-1 ml-2' id='boton_modificar'><i class='bi bi-pencil-fill'></i></button>
                           </p>
                        </div>   
                     <div>  
   
                     <div class="container text-center mt-3">
                        <img src="img/manual/5.jpg" class="img-fluid rounded"  alt="Responsive image" width="700px">
                     </div> 
                     
                     <div class="mt-3">  
                        <p class="font-weight-normal text-justify text-center">
                           Aparece el formulario con la información del personal, Se modifica el dato que se desee y presiona en moficicar. <b>Presione el boton</b> <button type="button" class="btn btn-danger" id="modifica"><i class="bi bi-pencil-fill mr-1"></i>Modificar</button>
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
                           Para elimnar un Club solo debe presionar sobre el boton y aparecera el siguiente mensaje. <b>Presione el boton</b> <button type='button'  class='btn btn-danger mb-1' id="eliminar"><i class='bi bi-x-lg'></i></button>
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
                                    En el menu, Al presionar sobre la opcion: <button class="btn btn-outline-dark btn-sm"><img src="img/iconos/personal.png" style="width:30px;margin-right:10px;">Personal</button>
                              </p>
                                 </p>
                           </div>
                        </div>
   
                        <div class = "container text-center">
                           <img src="img/manual/6.jpg" class="img-fluid rounded" alt="Responsive image" width="700px">
                        </div>
   
                        <div class="mt-3 mb-5">
                           <p class="font-weight-normal text-justify text-center">
                              Se muestra la pantalla Gesion del Personal. Si hay algun personal registrados, Aparecerán en la lista.
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
                              Para registrar un personal deberá presionar sobre <button class="btn btn-success "><i class="bi bi-plus-circle mr-1"></i>Nuevo registro</button>
                              </p>
                           </div>               
                        </div>
   
                        <div class="container text-center">
                           <img src="img/manual/7.jpg" class="img-fluid rounded" alt="Responsive image" width="700px">
                        </div>
   
                        <div class="container text-center mt-3">
                           <p class="font-weight-normal text-justify  text-center">
                           El usuario deberá rellenar correctamente cada uno de los espacios en blanco del formulario.
                           </p>
                        </div> 
   
                        <div class="container text-center">
                              <img src="img/manual/8.jpg" class="img-fluid rounded"  alt="Responsive image" width="700px">
                        </div>
   
                        <div class="mt-3">  
                           <p class="font-weight-normal text-justify text-center">
                              Luego presiona en el boton registrar donde aparecera el siguiente mensaje. <b>Presione el boton</b> <button type="button" id="registrar1" class="btn btn-danger ml-2"><i class="bi bi-check-lg mr-1"></i>Registrar</button>
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
   
                        <div class="container text-center mt-3">
                           <img src="img/manual/9.jpg" class="img-fluid rounded"  alt="Responsive image" width="700px">
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
   
                              <div class="container text-center mt-3">
                                 <img src="img/manual/10.jpg" class="img-fluid rounded"  alt="Responsive image" width="700px">
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
                                    <p class=" text-center font-weight-normal text-justify">
                                    Para elimnar un personal solo debe presionar sobre el boton y aparecera el siguiente mensaje. <b>Presione el boton</b> <button type='button'  class='btn btn-danger mb-1' id="eliminar1"><i class='bi bi-x-lg'></i></button>
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
                              En el menu, Al presionar sobre la opcion: 
                              <button class="btn btn-outline-dark btn-sm">
                                 <img src="img/iconos/atleta.png" style="width:30px;margin-right:10px;">
                                 Personal</button>
                           </p>
                     </div>
                  </div>
   
                  <div class = "container text-center">
                     <img src="img/manual/11.jpg" class="img-fluid rounded" alt="Responsive image" width="700px">
                  </div>
   
                  <div class="mt-3 mb-5">
                     <p class="font-weight-normal text-justify text-center">
                        Se muestra la pantalla Gesion de Atleta. Si hay algun atleta registrados, Aparecerán en la lista.
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
                        </p>
                     </div>               
                  </div>
   
                  <div class="container text-center">
                     <img src="img/manual/12.jpg" class="img-fluid rounded" alt="Responsive image" width="700px">
                  </div>
   
                  <div class="container text-center mt-3">
                     <p class="font-weight-normal text-justify  text-center">
                     El usuario deberá rellenar correctamente cada uno de los espacios en blanco del formulario.
                     </p>
                  </div> 
   
                  <div class="container text-center">
                        <img src="img/manual/13.jpg" class="img-fluid rounded"  alt="Responsive image" width="700px">
                  </div>
   
                  <div class="mt-3">  
                     <p class="font-weight-normal text-justify text-center">
                        Luego presiona en el boton registrar donde aparecera el siguiente mensaje. <b>Presione el boton</b> <button type="button" id="registrar2" class="btn btn-danger ml-2"><i class="bi bi-check-lg mr-1"></i>Registrar</button>
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
   
                  <div class="container text-center mt-3">
                     <img src="img/manual/14.jpg" class="img-fluid rounded"  alt="Responsive image" width="700px">
                  </div> 
   
                  <div class="row mb-2">
                     <div class="col-md-12">
                        <div class="h4 text-dark text-center">Para MODIFICAR</div>
                     </div>  
                  </div>
   
                  <div class="row mb-3">
                     <div class="col-md-12">
                           <p class="font-weight-normal text-justify">
                           Para modificar la informacion del Atleta deberá presionar sobre <button type='button' class='btn btn-primary mb-1 mr-1 ml-2' id='boton_modificar'><i class='bi bi-pencil-fill'></i></button>
                           </p>
                     </div>     
   
                     <div class="container text-center mt-3">
                        <img src="img/manual/1.jpg" class="img-fluid rounded"  alt="Responsive image" width="700px">
                     </div> 
   
                     <div class="mt-3">  
                        <p class="font-weight-normal text-justify text-center">
                           Aparece el formulario con la información del Atleta, Se modifica el dato que se desee y presiona en moficicar. <b>Presione el boton</b> <button type="button" class="btn btn-danger" id="modifica2"><i class="bi bi-pencil-fill mr-1"></i>Modificar</button>
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
                                 En el menu, Al presionar sobre la opcion: <button class="btn btn-outline-dark btn-sm"><img src="img/iconos/salud.png" style="width:30px;margin-right:10px;">Datos Medicos</button>
                           
                              </p>
                        </div>
                     </div>
   
                     <div class = "container text-center">
                        <img src="img/manual/16.jpg" class="img-fluid rounded" alt="Responsive image" width="700px">
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
                           </p>
                        </div>               
                     </div>
   
                     <div class="container text-center">
                        <img src="img/manual/17.jpg" class="img-fluid rounded" alt="Responsive image" width="700px">
                     </div>
   
                     <div class="container text-center mt-3">
                        <p class="font-weight-normal text-justify  text-center">
                        El usuario deberá rellenar correctamente cada uno de los espacios en blanco del formulario.
                        </p>
                     </div> 
   
                     <div class="container text-center">
                           <img src="img/manual/18.jpg" class="img-fluid rounded"  alt="Responsive image" width="700px">
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
   
                     <div class="container text-center mt-3">
                        <img src="img/manual/19.jpg" class="img-fluid rounded"  alt="Responsive image" width="700px">
                     </div> 
   
                     <div class="row mb-2">
                        <div class="col-md-12">
                           <div class="h4 text-dark text-center">Para MODIFICAR</div>
                        </div>  
                     </div>
   
                     <div class="row mb-3">
                        <div class="col-md-12">
                           <p class="font-weight-normal text-justify">
                              Para modificar la informacion del Atleta deberá presionar sobre <button type='button' class='btn btn-primary mb-1 mr-1 ml-2' id='boton_modificar'><i class='bi bi-pencil-fill'></i></button>
                           </p>
                        </div>   
                     <div>  
   
                     <div class="container text-center mt-3">
                        <img src="img/manual/20.jpg" class="img-fluid rounded"  alt="Responsive image" width="700px">
                     </div> 
   
                     <div class="mt-3">  
                        <p class="font-weight-normal text-justify text-center">
                           Aparece el formulario con la información del Atleta, Se modifica el dato que se desee y presiona en moficicar. <b>Presione el boton</b> <button type="button" class="btn btn-danger" id="modifica3"><i class="bi bi-pencil-fill mr-1"></i>Modificar</button>
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
                           Para elimnar un Atleta solo debe presionar sobre el boton y aparecera el siguiente mensaje. <b>Presione el boton</b> <button type='button'  class='btn btn-danger mb-1' id="eliminar3"><i class='bi bi-x-lg'></i></button>
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
                                    En el menu, Al presionar sobre la opcion: <button class="btn btn-outline-dark btn-sm"><img src="img/iconos/salud.png" style="width:30px;margin-right:10px;">Datos Medicos</button>
                              
                                 </p>
                           </div>
                        </div>
   
                        <div class = "container text-center">
                           <img src="img/manual/21.jpg" class="img-fluid rounded" alt="Responsive image" width="700px">
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
                              </p>
                           </div>               
                        </div>
   
                        <div class="container text-center">
                           <img src="img/manual/22.jpg" class="img-fluid rounded" alt="Responsive image" width="700px">
                        </div>
   
                        <div class="container text-center mt-3">
                           <p class="font-weight-normal text-justify  text-center">
                           El usuario deberá rellenar correctamente cada uno de los espacios en blanco del formulario.
                           </p>
                        </div> 
   
                        <div class="container text-center">
                              <img src="img/manual/23.jpg" class="img-fluid rounded"  alt="Responsive image" width="700px">
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
   
                        <div class="container text-center mt-3">
                           <img src="img/manual/24.jpg" class="img-fluid rounded"  alt="Responsive image" width="700px">
                        </div> 
   
                        <div class="row mb-2">
                           <div class="col-md-12">
                              <div class="h4 text-dark text-center">Para MODIFICAR</div>
                           </div>  
                        </div>
   
                        <div class="row mb-3">
                           <div class="col-md-12">
                              <p class="font-weight-normal text-justify">
                              Para modificar la informacion socioeconómica del Atleta deberá presionar sobre <button type='button' class='btn btn-primary mb-1 mr-1 ml-2' id='boton_modificar'><i class='bi bi-pencil-fill'></i></button>
                              </p>
                           </div>   
                        <div>  
   
                        <div class="container text-center mt-3">
                           <img src="img/manual/25.jpg" class="img-fluid rounded"  alt="Responsive image" width="700px">
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
                              Para elimnar informacion socioeconómica de un Atleta solo debe presionar sobre el boton y aparecera el siguiente mensaje. <b>Presione el boton</b> <button type='button'  class='btn btn-danger mb-1' id="eliminar4"><i class='bi bi-x-lg'></i></button>
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
                                       En el menu, Al presionar sobre la opcion: <button class="btn btn-outline-dark btn-sm"><img src="img/iconos/historial.png" style="width:30px;margin-right:10px;">Historial del Atleta</button>
                                 </p>
                                    </p>
                              </div>
                           </div>
   
                           <div class = "container text-center">
                              <img src="img/manual/26.jpg" class="img-fluid rounded" alt="Responsive image" width="700px">
                           </div>
   
                           <div class="mt-3 mb-5">
                              <p class="font-weight-normal text-justify text-center">
                                 Selecciona el atleta para ver su historial 
                              </p>
                           </div>
   
                           <div class="container text-center">
                              <img src="img/manual/27.jpg" class="img-fluid rounded" alt="Responsive image" width="700px">
                           </div>
   
                           <div class="container text-center mt-3">
                              <p class="font-weight-normal text-justify  text-center">
                                    Aparecerá la información del historial del atleta. 
                              </p>
                           </div>     
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
                                    En el menu, Al presionar sobre la opcion: <button class="btn btn-outline-dark btn-sm"><img src="img/iconos/trofeo.png" style="width:30px;margin-right:10px;">Eventos</button>
                              
                                 </p>
                           </div>
                        </div>
   
                        <div class = "container text-center">
                           <img src="img/manual/28.jpg" class="img-fluid rounded" alt="Responsive image" width="700px">
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
                              </p>
                           </div>               
                        </div>
   
                        <div class="container text-center">
                           <img src="img/manual/29.jpg" class="img-fluid rounded" alt="Responsive image" width="700px">
                        </div>
   
                        <div class="container text-center mt-3">
                           <p class="font-weight-normal text-justify  text-center">
                           El usuario deberá rellenar correctamente cada uno de los espacios en blanco del formulario.
                           </p>
                        </div> 
   
                        <div class="container text-center">
                              <img src="img/manual/30.jpg" class="img-fluid rounded"  alt="Responsive image" width="700px">
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
   
                        <div class="container text-center mt-3">
                           <img src="img/manual/31.jpg" class="img-fluid rounded"  alt="Responsive image" width="700px">
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
                              </p>
                           </div>   
                           
   
                           <div class="container text-center mt-3">
                              <img src="img/manual/32.jpg" class="img-fluid rounded"  alt="Responsive image" width="700px">
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
                                 Para elimnar un Evento solo debe presionar sobre el boton y aparecera el siguiente mensaje. <b>Presione el boton</b> <button type='button'  class='btn btn-danger mb-1' id="eliminar5"><i class='bi bi-x-lg'></i></button>
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
                                    En el menu, Al presionar sobre la opcion: <button class="btn btn-outline-dark btn-sm"><img src="img/iconos/inscribir.png" style="width:30px;margin-right:10px;">Inscripcion a Evento</button>
                              
                                 </p>
                           </div>
                        </div>
   
                        <div class = "container text-center">
                           <img src="img/manual/33.jpg" class="img-fluid rounded" alt="Responsive image" width="700px">
                        </div>
   
                        <div class = "container text-center">
                           <img src="img/manual/34.jpg" class="img-fluid rounded" alt="Responsive image" width="700px">
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
   
                        <div class = "container text-center">
                           <img src="img/manual/35.jpg" class="img-fluid rounded" alt="Responsive image" width="700px">
                        </div>
   
                        <div class="container text-center mt-3">
                           <p class="font-weight-normal text-justify  text-center">
                           Ingresa los datos del atleta a inscribir en El evento, Al ingresar la cedula del atleta, 
                           El sistema le mostrara un mensaje en pantalla si el atleta no está inscrito:
                           </p>
                        </div> 
   
                        <div class="container text-center">
                           <img src="img/manual/36.jpg" class="img-fluid rounded" alt="Responsive image" width="700px">
                        </div>
   
                        <div class="container text-center mt-3">
                           <p class="font-weight-normal text-justify  text-center">
                           Procede a llenar los campos de manera correcta.
                           </p>
                        </div> 
   
                        <div class="container text-center">
                              <img src="img/manual/37.jpg" class="img-fluid rounded"  alt="Responsive image" width="700px">
                        </div>
   
                        <div class="mt-3">  
                           <p class="font-weight-normal text-justify text-center">
                              Luego presiona en el boton registrar donde aparecera el siguiente mensaje. <b>Presione el boton</b> <button type="button" id="registrar6" class="btn btn-danger ml-2"><i class="bi bi-plus-lg mr-1"></i>Registrar</button>
                           </p>
                        </div>
   
                        <div class="container text-center mt-3">
                           <p class="font-weight-normal text-justify  text-center">
                           El atleta se muestra en la tabla de atletas inscritos 
                        </div> 
   
                        <div class="container text-center mt-3">
                           <img src="img/manual/38.jpg" class="img-fluid rounded"  alt="Responsive image" width="700px">
                        </div> 
   
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
   
                           <div class="container text-center mt-3">
                              <img src="img/manual/39.jpg" class="img-fluid rounded"  alt="Responsive image" width="700px">
                           </div> 
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
                                       En el menu, Al presionar sobre la opcion: <button class="btn btn-outline-dark btn-sm"><img src="img/iconos/ring.png" style="width:30px;margin-right:10px;">Emparejamientos y Combates</button>
                                 
                                    </p>
                              </div>
                           </div>
   
                           <div class = "container text-center">
                              <img src="img/manual/40.jpg" class="img-fluid rounded" alt="Responsive image" width="700px">
                           </div>
   
                           <div class = "container text-center">
                              <img src="img/manual/41.jpg" class="img-fluid rounded" alt="Responsive image" width="700px">
                           </div>
   
                           <div class = "container text-center">
                              <img src="img/manual/42.jpg" class="img-fluid rounded" alt="Responsive image" width="700px">
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
   
                           <div class = "container text-center">
                              <img src="img/manual/43.jpg" class="img-fluid rounded" alt="Responsive image" width="700px">
                           </div>
   
                           <div class="container text-center mt-3">
                              <p class="font-weight-normal text-justify  text-center">
                              Al seleccionar el Evento, El sistema mostrara la lista de los atletas inscritos en ese evento:
                              </p>
                           </div> 
   
                           <div class="container text-center">
                              <img src="img/manual/44.jpg" class="img-fluid rounded" alt="Responsive image" width="700px">
                           </div>
   
                           <div class="container text-center mt-3">
                              <p class="font-weight-normal text-justify  text-center">
                                 Debe ingresar los parámetros acordes al emparejamiento que desea obtener, Ingresando el Sexo, Edad y peso: 
                              </p>
                           </div> 
   
                           <div class="container text-center">
                                 <img src="img/manual/45.jpg" class="img-fluid rounded"  alt="Responsive image" width="700px">
                           </div>
   
                           <div class="mt-3">  
                              <p class="font-weight-normal text-justify text-center">
                                    El sistema muestra una lisa de los atletas que se encuentran entre los
                                    parámetros que se han seleccionado y en la tabla de enfrentamiento, Se encuentra el emparejamiento: 
                              </p>
                           </div>
   
                           <div class="container text-center mt-3">
                              <img src="img/manual/46.jpg" class="img-fluid rounded"  alt="Responsive image" width="700px">
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
                                       En el menu, Al presionar sobre la opcion: <button class="btn btn-outline-dark btn-sm"><img src="img/iconos/ganador.png" style="width:30px;margin-right:10px;">Resultado de Eventos</button>
                                 
                                    </p>
                              </div>
                           </div>
   
                           <div class = "container text-center">
                              <img src="img/manual/47.jpg" class="img-fluid rounded" alt="Responsive image" width="700px">
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
   
                           <div class="container text-center">
                              <img src="img/manual/48.jpg" class="img-fluid rounded" alt="Responsive image" width="700px">
                           </div>
   
                           <div class="container text-center mt-3">
                              <p class="font-weight-normal text-justify  text-center">
                                 El usuario deberá rellenar correctamente cada uno de los espacios, 
                                 Ingresando los resultados del emparejamiento 
                              </p>
                           </div> 
   
                           <div class="container text-center">
                                 <img src="img/manual/49.jpg" class="img-fluid rounded"  alt="Responsive image" width="700px">
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
   
                           <div class="container text-center mt-3">
                              <img src="img/manual/50.jpg" class="img-fluid rounded"  alt="Responsive image" width="700px">
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
                                 <div class="h3 text-dark">GESTIONAR INSCRIPCION A EVENTOS</div>
                              </div>       
                           </div>
   
                           <div class="row">
                              <div class="col">
                                    <p class="font-weight-normal text-justify">
                                       En el menu, Al presionar sobre la opcion: <button class="btn btn-outline-dark btn-sm"><img src="img/iconos/inscribir.png" style="width:30px;margin-right:10px;">Inscripcion a Evento</button>
                                 
                                    </p>
                              </div>
                           </div>
   
                           <div class = "container text-center">
                              <img src="img/manual/33.jpg" class="img-fluid rounded" alt="Responsive image" width="700px">
                           </div>
   
                           <div class = "container text-center">
                              <img src="img/manual/34.jpg" class="img-fluid rounded" alt="Responsive image" width="700px">
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
   
                           <div class = "container text-center">
                              <img src="img/manual/35.jpg" class="img-fluid rounded" alt="Responsive image" width="700px">
                           </div>
   
                           <div class="container text-center mt-3">
                              <p class="font-weight-normal text-justify  text-center">
                              Ingresa los datos del atleta a inscribir en El evento, Al ingresar la cedula del atleta, 
                              El sistema le mostrara un mensaje en pantalla si el atleta no está inscrito:
                              </p>
                           </div> 
   
                           <div class="container text-center">
                              <img src="img/manual/36.jpg" class="img-fluid rounded" alt="Responsive image" width="700px">
                           </div>
   
                           <div class="container text-center mt-3">
                              <p class="font-weight-normal text-justify  text-center">
                              Procede a llenar los campos de manera correcta.
                              </p>
                           </div> 
   
                           <div class="container text-center">
                                 <img src="img/manual/37.jpg" class="img-fluid rounded"  alt="Responsive image" width="700px">
                           </div>
   
                           <div class="mt-3">  
                              <p class="font-weight-normal text-justify text-center">
                                 Luego presiona en el boton registrar donde aparecera el siguiente mensaje. <b>Presione el boton</b> <button type="button" id="registrar6" class="btn btn-danger ml-2"><i class="bi bi-plus-lg mr-1"></i>Registrar</button>
                              </p>
                           </div>
   
                           <div class="container text-center mt-3">
                              <p class="font-weight-normal text-justify  text-center">
                              El atleta se muestra en la tabla de atletas inscritos 
                           </div> 
   
                           <div class="container text-center mt-3">
                              <img src="img/manual/38.jpg" class="img-fluid rounded"  alt="Responsive image" width="700px">
                           </div> 
   
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
                           </div>  
                           <div class="container text-center mt-3">
                              <p class="font-weight-normal text-justify  text-center">
                              Si al ingresar una cedula de algún atleta existente en el sistema, 
                              El autocompletara de forma automática sus datos, Para agregarlo al nuevo evento: 
                           </div> 
   
                           <div class="container text-center mt-3">
                              <img src="img/manual/39.jpg" class="img-fluid rounded"  alt="Responsive image" width="700px">
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
                                       En el menu, Al presionar sobre la opcion: <button class="btn btn-outline-dark btn-sm"><img src="img/iconos/reporte.png" style="width:30px;margin-right:10px;">Reportes</button>
                                 
                                    </p>
                              </div>
                           </div>
   
                           <div class = "container text-center">
                              <img src="img/manual/51.jpg" class="img-fluid rounded" alt="Responsive image" width="700px">
                           </div>
   
                           <div>
                              <br>
                           </div>
   
                           <div class="row">
                              <div class="col">
                                    <p class="font-weight-normal text-justify">
                                    <b>Al ingresar en</b><button class="btn btn-outline-dark btn-sm ml-2"><img src="img/iconos/reporte.png" style="width:30px;margin-right:10px;">Reporte de Atletas</button>
                                 
                                    </p>
                              </div>
                           </div>
   
                           <div class = "container text-center">
                              <img src="img/manual/52.jpg" class="img-fluid rounded" alt="Responsive image" width="700px">
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
   
                           <div class = "container text-center">
                              <img src="img/manual/53.jpg" class="img-fluid rounded" alt="Responsive image" width="700px">
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
   
                           <div class = "container text-center">
                              <img src="img/manual/54.jpg" class="img-fluid rounded" alt="Responsive image" width="700px">
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
   
                           <div class = "container text-center">
                              <img src="img/manual/55.jpg" class="img-fluid rounded" alt="Responsive image" width="700px">
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
   
                           <div class = "container text-center">
                              <img src="img/manual/56.jpg" class="img-fluid rounded" alt="Responsive image" width="700px">
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
   
                           <div class = "container text-center">
                              <img src="img/manual/57.jpg" class="img-fluid rounded" alt="Responsive image" width="700px">
                           </div>
   
                           <div class="container text-center mt-3">
                              <p class="font-weight-normal text-justify  text-center">
                              En esta pantalla el usuario podrá visualizar la cantidad de todos los participantes registrados en un Evento, 
                              Mediante una grafica, donde solo debe seleccionar el evento:
                              </p>
                           </div> 
   
                           <div class = "container text-center">
                              <img src="img/manual/60.jpg" class="img-fluid rounded" alt="Responsive image" width="700px">
                           </div>
   
                           <div class="container text-center mt-3">
                              <p class="font-weight-normal text-justify  text-center">
                              Luego debe presionar el Evento que desee
                              </p>
                           </div> 
   
                           <div class = "container text-center">
                              <img src="img/manual/58.jpg" class="img-fluid rounded" alt="Responsive image" width="700px">
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
                                       <b>Al ingresar en</b><button class="btn btn-outline-dark btn-sm ml-2"><img src="img/iconos/bitacora.png" style="width:30px;margin-right:10px;">Bitacora de Usuario</button>
                                    
                                       </p>
                                 </div>
                              </div>
   
                              <div class = "container text-center">
                                 <img src="img/manual/62.jpg" class="img-fluid rounded" alt="Responsive image" width="700px">
                              </div>
   
                              <div class="container text-center mt-3">
                                 <p class="font-weight-normal text-justify  text-center">
                                 Primero que nada se mostrara una lista, Con las acciones realizadas dentro del sistema con toda la información específica:
                                 </p>
                              </div> 
   
                              <div class = "container text-center">
                                 <img src="img/manual/63.jpg" class="img-fluid rounded" alt="Responsive image" width="700px">
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
                                       <b>Al ingresar en</b><button class="btn btn-outline-dark btn-sm ml-2"><img src="img/iconos/rol.png" style="width:30px;margin-right:10px;">Roles y Permisos</button>
                                    
                                       </p>
                                 </div>
                              </div>
   
                              <div class = "container text-center">
                                 <img src="img/manual/64.jpg" class="img-fluid rounded" alt="Responsive image" width="700px">
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
                                    </p>
                                 </div>               
                              </div>
   
                              <div class = "container text-center">
                                 <img src="img/manual/66.jpg" class="img-fluid rounded" alt="Responsive image" width="700px">
                              </div>
   
                              <div class="container text-center mt-3">
                                 <p class="font-weight-normal text-justify  text-center">
                                    El usuario deberá rellenar correctamente cada uno de los espacios en blanco del formulario. 
                                 </p>
                              </div> 
   
                              <div class = "container text-center">
                                 <img src="img/manual/67.jpg" class="img-fluid rounded" alt="Responsive image" width="700px">
                              </div>
   
                              <div class="mt-3">  
                                 <p class="font-weight-normal text-justify text-center">
                                       Para registrar exitosamente el rol. <b>Presione el boton</b> <button type="button" id="registrar9" class="btn btn-danger ml-2"><i class="bi bi-check-lg mr-1"></i>Registrar</button>
                                 </p>
                              </div>
   
                              <div class = "container text-center">
                                 <img src="img/manual/68.jpg" class="img-fluid rounded" alt="Responsive image" width="700px">
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
   
                              <div class = "container text-center">
                                    <img src="img/manual/69.jpg" class="img-fluid rounded" alt="Responsive image" width="700px">
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
                                    </p>
                                 </div>   
                              </div>
                                 
                              <div class = "container text-center">
                                 <img src="img/manual/70.jpg" class="img-fluid rounded" alt="Responsive image" width="700px">
                              </div>
   
                              <div class="mt-3">  
                                 <p class="font-weight-normal text-justify text-center">
                                    Modifica la informacion y presiona modificar. <b>Presione el boton</b> <button type="button" class="btn btn-danger" id="modifica11"><i class="bi bi-pencil-fill mr-1"></i>Modificar</button>
                                 </p>
                              </div>
   
                              <div class="row mb-3">
                                 <div class="col-md-12">
                                    <p class=" text-center font-weight-normal text-justify">
                                       Para elimnar un rol solo debe presionar en la X. <b>Presione el boton</b> <button type='button'  class='btn btn-danger mb-1' id="eliminar11"><i class='bi bi-x-lg'></i></button>
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
                                    <b>Al ingresar en</b><button class="btn btn-outline-dark btn-sm ml-2"><img src="img/iconos/usuario.png" style="width:30px;margin-right:10px;">Usuarios</button>
                                 
                                    </p>
                              </div>
                           </div>
   
                           <div class = "container text-center">
                              <img src="img/manual/71.jpg" class="img-fluid rounded" alt="Responsive image" width="700px">
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
                                 </p>
                              </div>               
                           </div>
   
                           <div class = "container text-center">
                              <img src="img/manual/72.jpg" class="img-fluid rounded" alt="Responsive image" width="700px">
                           </div>
   
                           <div class="container text-center mt-3">
                                 <p class="font-weight-normal text-justify  text-center">
                                 El usuario deberá rellenar correctamente cada uno de los espacios en blanco del formulario.
                                 </p>
                           </div> 
   
                           <div class = "container text-center">
                              <img src="img/manual/73.jpg" class="img-fluid rounded" alt="Responsive image" width="700px">
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
   
                           <div class = "container text-center">
                              <img src="img/manual/74.jpg" class="img-fluid rounded" alt="Responsive image" width="700px">
                           </div>
   
                           <div class="row mb-3">
                              <div class="col-md-12">
                                 <p class="font-weight-normal text-justify">
                                 Para modificar Usuario debe presionar sobre <button type='button' class='btn btn-primary mb-1 mr-1 ml-2' id='boton_modificar'><i class='bi bi-pencil-fill'></i></button>
                                 </p>
                              </div>   
                           </div>
                                    
                           <div class = "container text-center">
                              <img src="img/manual/75.jpg" class="img-fluid rounded" alt="Responsive image" width="700px">
                           </div>
   
                           <div class="mt-3">  
                              <p class="font-weight-normal text-justify text-center">
                                 Modifica la informacion y presiona modificar. <b>Presione el boton</b> <button type="button" class="btn btn-danger" id="modifica12"><i class="bi bi-pencil-fill mr-1"></i>Modificar</button>
                              </p>
                           </div>
   
                           <div class = "container text-center">
                              <img src="img/manual/76.jpg" class="img-fluid rounded" alt="Responsive image" width="700px">
                           </div>
                           
                           <br>
   
                           <div class="row mb-3">
                              <div class="col-md-12">
                                 <p class=" text-center font-weight-normal text-justify">
                                    Para elimnar un rol solo debe presionar en la X. <b>Presione el boton</b> <button type='button'  class='btn btn-danger mb-1' id="eliminar12"><i class='bi bi-x-lg'></i></button>
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
                                 <p class="font-weight-normal text-justify">
                                    <b>En el menu al ingresar en</b><button class="btn btn-outline-dark btn-sm ml-2">Acerca de</button>
                              
                                 </p>
                           </div>
                        </div>
   
                        <div class = "container text-center">
                           <img src="img/manual/77.jpg" class="img-fluid rounded" alt="Responsive image" width="700px">
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