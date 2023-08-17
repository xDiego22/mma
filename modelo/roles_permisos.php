<?php 
    namespace modelo;
    use modelo\conexion as conexion;
    use PDO;
    use Exception;

    class roles_permisos extends conexion{

        private $nombre;
        private $descripcion;

        private $permiso;

        private $rol_modulo;

        private $rol_2;

        private $modulo_club;
        private $modulo_personal;
        private $modulo_atletas;
        private $modulo_medicos;
        private $modulo_socioeconomicos;
        private $modulo_eventos;
        private $modulo_usuarios;
        private $modulo_bitacora;
        private $modulo_roles;
        private $modulo_inscripcion;
        private $modulo_emparejamientos;
        private $modulo_resultados;
        private $modulo_historial;
        private $modulo_reportes;

        //
        
        //

        public function set_rol_2($valor){
            $this->rol_2 = $valor;
        }

        public function set_rol_modulo($valor){
            $this->rol_modulo = $valor;
        }

        public function set_nombre($valor){
            $this->nombre = $valor;
        }
        public function set_descripcion($valor){
            $this->descripcion = $valor;
        }
 
        function set_permiso($valor){
            $this->permiso = $valor;
        }

        //
        public function set_modulo_club($valor){
            $this->modulo_club = $valor;
        }
        public function set_modulo_personal($valor){
            $this->modulo_personal = $valor;
        }
        public function set_modulo_atletas($valor){
            $this->modulo_atletas = $valor;
        }
        public function set_modulo_medicos($valor){
            $this->modulo_medicos = $valor;
        }
        public function set_modulo_socioeconomicos($valor){
            $this->modulo_socioeconomicos = $valor;
        }
        public function set_modulo_eventos($valor){
            $this->modulo_eventos = $valor;
        }
        public function set_modulo_usuarios($valor){
            $this->modulo_usuarios = $valor;
        }
        public function set_modulo_bitacora($valor){
            $this->modulo_bitacora = $valor;
        }
        public function set_modulo_roles($valor){
            $this->modulo_roles = $valor;
        }
        public function set_modulo_inscripcion($valor){
            $this->modulo_inscripcion = $valor;
        }
        public function set_modulo_emparejamientos($valor){
            $this->modulo_emparejamientos = $valor;
        }
        public function set_modulo_resultados($valor){
            $this->modulo_resultados = $valor;
        }
        public function set_modulo_historial($valor){
            $this->modulo_historial = $valor;
        }
        public function set_modulo_reportes($valor){
            $this->modulo_reportes = $valor;
        }
        //

        public function get_nombre(){
            return $this->nombre;
        }
        public function get_descripcion(){
            return $this->descripcion;
        }

        function get_permiso(){
            return $this->permiso;
        }

        public function consultar($rol_usuario,$cedula_bitacora,$modulo){

            $co = $this->conecta();
            $co->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            try{
                $resultado = $co->prepare("SELECT * from roles");
                $resultado->execute();
                
                if($resultado){

                    $respuesta = '';
                    
                    foreach($resultado as $r){
                        
                        $valor = $this->permisos($rol_usuario); //rol del usuario
					    if ($valor[0]=="true") {
                            $respuesta = $respuesta."<tr>";

                                $respuesta = $respuesta."<td value = ".$r['id'].">";
                                    $respuesta = $respuesta.$r['id'];
                                $respuesta = $respuesta."</td>";

                                $respuesta = $respuesta."<td>";
                                    $respuesta = $respuesta.$r['nombre'];
                                $respuesta = $respuesta."</td>";

                                $respuesta = $respuesta."<td>";
                                    $respuesta = $respuesta.$r['descripcion'];
                                $respuesta = $respuesta."</td>";

                                $respuesta = $respuesta."<td>";
                                    if($valor[1]=="true"){
                                    $respuesta = $respuesta."<button type='button' class='btn btn-dark mb-1 mr-1' data-toggle='modal' data-target='#modal_permisos' onclick='envia_rol(".$r['id'].")'><i class='bi bi-key-fill'></i></button>";
                                    }
                                    if ($valor[2]=="true") {
                                    $respuesta = $respuesta."<button type='button' class='btn btn-primary mb-1 mr-1' data-toggle='modal' data-target='#modal_modificar' onclick='modalmodificar(this)' id='boton_modificar'><i class='bi bi-pencil-fill'></i></button>";
                                    }
                                    if ($valor[3]=="true"){
                                        $respuesta = $respuesta."<button type='button' class='btn btn-danger mb-1 ' onclick='elimina(this)'><i class='bi bi-x-lg'></i></button>";
                                    }
                                $respuesta = $respuesta."</td>";
                                

                            $respuesta = $respuesta."</tr>";
                        }
                    }

                    $accion= "Ha consultado tabla Roles y Permisos";
                    parent::registrar_bitacora($cedula_bitacora, $accion, $modulo);
                    return $respuesta;
                }
                else {
                    return '';
                }

            }catch(Exception $e) {
                return $e->getMessage();
            }
        }

        public function registrar($rol_usuario,$cedula_bitacora,$modulo){	
            
            $co = $this->conecta();
            $co->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            //se añaden atributos a la conexión para poder controlar los errores
            //atributos para poder manejar los posibles errores
            if($this->validar_registrar()){
                if(!$this->existe($this->nombre)){
                    try{
                        
                        $resultado = $co->prepare("INSERT into roles(
                            nombre,
                            descripcion)
                            Values(
                            :nombre_rol,
                            :descripcion_rol)");

                        $resultado->bindParam(':nombre_rol',$this->nombre);
                        $resultado->bindParam(':descripcion_rol',$this->descripcion);

                        $resultado->execute();

                        $id_nuevo_rol = $co->lastInsertId();//toma el ultimo id que se registro

                        if ($this->modulo_club == "true") {
                            $valor_permiso = "false";
                            $id_modulo = "1";
                            $resultado = $co->prepare("INSERT into intermediaria(id_rol,id_modulos,consultar,registrar,modificar,eliminar) values (:rol, :modulo,:consultar,:registrar,:modificar,:eliminar)");

                            $resultado->bindParam(':rol',$id_nuevo_rol);
                            $resultado->bindParam(':modulo',$id_modulo);
                            $resultado->bindParam(':consultar',$valor_permiso);
                            $resultado->bindParam(':registrar',$valor_permiso);
                            $resultado->bindParam(':modificar',$valor_permiso);
                            $resultado->bindParam(':eliminar',$valor_permiso);
                            $resultado->execute();
                        }

                        if ($this->modulo_personal == "true") {
                            $valor_permiso = "false";
                            $id_modulo = "2";
                            $resultado = $co->prepare("INSERT into intermediaria(id_rol,id_modulos,consultar,registrar,modificar,eliminar) values (:rol, :modulo,:consultar,:registrar,:modificar,:eliminar)");

                            $resultado->bindParam(':rol',$id_nuevo_rol);
                            $resultado->bindParam(':modulo',$id_modulo);
                            $resultado->bindParam(':consultar',$valor_permiso);
                            $resultado->bindParam(':registrar',$valor_permiso);
                            $resultado->bindParam(':modificar',$valor_permiso);
                            $resultado->bindParam(':eliminar',$valor_permiso);
                            $resultado->execute();
                        }

                        if ($this->modulo_atletas == "true") {
                            $valor_permiso = "false";
                            $id_modulo = "3";
                            $resultado = $co->prepare("INSERT into intermediaria(id_rol,id_modulos,consultar,registrar,modificar,eliminar) values (:rol, :modulo,:consultar,:registrar,:modificar,:eliminar)");

                            $resultado->bindParam(':rol',$id_nuevo_rol);
                            $resultado->bindParam(':modulo',$id_modulo);
                            $resultado->bindParam(':consultar',$valor_permiso);
                            $resultado->bindParam(':registrar',$valor_permiso);
                            $resultado->bindParam(':modificar',$valor_permiso);
                            $resultado->bindParam(':eliminar',$valor_permiso);
                            $resultado->execute();
                        }

                        if ($this->modulo_medicos == "true") {
                            $valor_permiso = "false";
                            $id_modulo = "4";
                            $resultado = $co->prepare("INSERT into intermediaria(id_rol,id_modulos,consultar,registrar,modificar,eliminar) values (:rol, :modulo,:consultar,:registrar,:modificar,:eliminar)");

                            $resultado->bindParam(':rol',$id_nuevo_rol);
                            $resultado->bindParam(':modulo',$id_modulo);
                            $resultado->bindParam(':consultar',$valor_permiso);
                            $resultado->bindParam(':registrar',$valor_permiso);
                            $resultado->bindParam(':modificar',$valor_permiso);
                            $resultado->bindParam(':eliminar',$valor_permiso);
                            $resultado->execute();
                        }

                        if ($this->modulo_socioeconomicos == "true") {
                            $valor_permiso = "false";
                            $id_modulo = "5";
                            $resultado = $co->prepare("INSERT into intermediaria(id_rol,id_modulos,consultar,registrar,modificar,eliminar) values (:rol, :modulo,:consultar,:registrar,:modificar,:eliminar)");

                            $resultado->bindParam(':rol',$id_nuevo_rol);
                            $resultado->bindParam(':modulo',$id_modulo);
                            $resultado->bindParam(':consultar',$valor_permiso);
                            $resultado->bindParam(':registrar',$valor_permiso);
                            $resultado->bindParam(':modificar',$valor_permiso);
                            $resultado->bindParam(':eliminar',$valor_permiso);
                            $resultado->execute();
                        }

                        if ($this->modulo_eventos == "true") {
                            $valor_permiso = "false";
                            $id_modulo = "6";
                            $resultado = $co->prepare("INSERT into intermediaria(id_rol,id_modulos,consultar,registrar,modificar,eliminar) values (:rol, :modulo,:consultar,:registrar,:modificar,:eliminar)");

                            $resultado->bindParam(':rol',$id_nuevo_rol);
                            $resultado->bindParam(':modulo',$id_modulo);
                            $resultado->bindParam(':consultar',$valor_permiso);
                            $resultado->bindParam(':registrar',$valor_permiso);
                            $resultado->bindParam(':modificar',$valor_permiso);
                            $resultado->bindParam(':eliminar',$valor_permiso);
                            $resultado->execute();
                        }

                        if ($this->modulo_usuarios == "true") {
                            $valor_permiso = "false";
                            $id_modulo = "7";
                            $resultado = $co->prepare("INSERT into intermediaria(id_rol,id_modulos,consultar,registrar,modificar,eliminar) values (:rol, :modulo,:consultar,:registrar,:modificar,:eliminar)");

                            $resultado->bindParam(':rol',$id_nuevo_rol);
                            $resultado->bindParam(':modulo',$id_modulo);
                            $resultado->bindParam(':consultar',$valor_permiso);
                            $resultado->bindParam(':registrar',$valor_permiso);
                            $resultado->bindParam(':modificar',$valor_permiso);
                            $resultado->bindParam(':eliminar',$valor_permiso);
                            $resultado->execute();
                        }

                        if ($this->modulo_bitacora == "true") {
                            $valor_permiso = "false";
                            $id_modulo = "8";
                            $resultado = $co->prepare("INSERT into intermediaria(id_rol,id_modulos,consultar,registrar,modificar,eliminar) values (:rol, :modulo,:consultar,:registrar,:modificar,:eliminar)");

                            $resultado->bindParam(':rol',$id_nuevo_rol);
                            $resultado->bindParam(':modulo',$id_modulo);
                            $resultado->bindParam(':consultar',$valor_permiso);
                            $resultado->bindParam(':registrar',$valor_permiso);
                            $resultado->bindParam(':modificar',$valor_permiso);
                            $resultado->bindParam(':eliminar',$valor_permiso);
                            $resultado->execute();
                        }
                        if ($this->modulo_roles == "true") {
                            $valor_permiso = "false";
                            $id_modulo = "9";
                            $resultado = $co->prepare("INSERT into intermediaria(id_rol,id_modulos,consultar,registrar,modificar,eliminar) values (:rol, :modulo,:consultar,:registrar,:modificar,:eliminar)");

                            $resultado->bindParam(':rol',$id_nuevo_rol);
                            $resultado->bindParam(':modulo',$id_modulo);
                            $resultado->bindParam(':consultar',$valor_permiso);
                            $resultado->bindParam(':registrar',$valor_permiso);
                            $resultado->bindParam(':modificar',$valor_permiso);
                            $resultado->bindParam(':eliminar',$valor_permiso);
                            $resultado->execute();
                        }

                        if ($this->modulo_inscripcion == "true") {
                            $valor_permiso = "false";
                            $id_modulo = "10";
                            $resultado = $co->prepare("INSERT into intermediaria(id_rol,id_modulos,consultar,registrar,modificar,eliminar) values (:rol, :modulo,:consultar,:registrar,:modificar,:eliminar)");

                            $resultado->bindParam(':rol',$id_nuevo_rol);
                            $resultado->bindParam(':modulo',$id_modulo);
                            $resultado->bindParam(':consultar',$valor_permiso);
                            $resultado->bindParam(':registrar',$valor_permiso);
                            $resultado->bindParam(':modificar',$valor_permiso);
                            $resultado->bindParam(':eliminar',$valor_permiso);
                            $resultado->execute();
                        }

                        if ($this->modulo_emparejamientos == "true") {
                            $valor_permiso = "false";
                            $id_modulo = "11";
                            $resultado = $co->prepare("INSERT into intermediaria(id_rol,id_modulos,consultar,registrar,modificar,eliminar) values (:rol, :modulo,:consultar,:registrar,:modificar,:eliminar)");

                            $resultado->bindParam(':rol',$id_nuevo_rol);
                            $resultado->bindParam(':modulo',$id_modulo);
                            $resultado->bindParam(':consultar',$valor_permiso);
                            $resultado->bindParam(':registrar',$valor_permiso);
                            $resultado->bindParam(':modificar',$valor_permiso);
                            $resultado->bindParam(':eliminar',$valor_permiso);
                            $resultado->execute();
                        }

                        if ($this->modulo_resultados == "true") {
                            $valor_permiso = "false";
                            $id_modulo = "12";
                            $resultado = $co->prepare("INSERT into intermediaria(id_rol,id_modulos,consultar,registrar,modificar,eliminar) values (:rol, :modulo,:consultar,:registrar,:modificar,:eliminar)");

                            $resultado->bindParam(':rol',$id_nuevo_rol);
                            $resultado->bindParam(':modulo',$id_modulo);
                            $resultado->bindParam(':consultar',$valor_permiso);
                            $resultado->bindParam(':registrar',$valor_permiso);
                            $resultado->bindParam(':modificar',$valor_permiso);
                            $resultado->bindParam(':eliminar',$valor_permiso);
                            $resultado->execute();
                        }

                        if ($this->modulo_historial == "true") {
                            $valor_permiso = "false";
                            $id_modulo = "13";
                            $resultado = $co->prepare("INSERT into intermediaria(id_rol,id_modulos,consultar,registrar,modificar,eliminar) values (:rol, :modulo,:consultar,:registrar,:modificar,:eliminar)");

                            $resultado->bindParam(':rol',$id_nuevo_rol);
                            $resultado->bindParam(':modulo',$id_modulo);
                            $resultado->bindParam(':consultar',$valor_permiso);
                            $resultado->bindParam(':registrar',$valor_permiso);
                            $resultado->bindParam(':modificar',$valor_permiso);
                            $resultado->bindParam(':eliminar',$valor_permiso);
                            $resultado->execute();
                        }


                        if ($this->modulo_reportes == "true") {
                            $valor_permiso = "false";
                            $id_modulo = "15";
                            $resultado = $co->prepare("INSERT into intermediaria(id_rol,id_modulos,consultar,registrar,modificar,eliminar) values (:rol, :modulo,:consultar,:registrar,:modificar,:eliminar)");

                            $resultado->bindParam(':rol',$id_nuevo_rol);
                            $resultado->bindParam(':modulo',$id_modulo);
                            $resultado->bindParam(':consultar',$valor_permiso);
                            $resultado->bindParam(':registrar',$valor_permiso);
                            $resultado->bindParam(':modificar',$valor_permiso);
                            $resultado->bindParam(':eliminar',$valor_permiso);
                            $resultado->execute();
                        }



                        $accion= "Ha regitrado un nuevo Rol";
                        parent::registrar_bitacora($cedula_bitacora, $accion, $modulo);

                        return $this->consultar($rol_usuario,$cedula_bitacora,$modulo);
                        
                    }catch(Exception $e){
                        return $e->getMessage();
                    }
                }
                else {
                    return "Ya existe el rol que desea registrar";
                }   
            }else{
                return "ingrese datos correctamente";
            }
		} 

        public function modificar($rol_usuario,$cedula_bitacora,$modulo){	
            
            $co = $this->conecta();
            $co->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            //se añaden atributos a la conexión para poder controlar los errores
            //atributos para poder manejar los posibles errores
            if($this->validar_modificar()){
                if($this->existe($this->nombre)){
                    try{
                        
                        $resultado = $co->prepare("UPDATE roles SET
                            nombre = :nombre_rol,
                            descripcion = :descripcion_rol
                            WHERE nombre = :nombre_rol");

                        $resultado->bindParam(':nombre_rol',$this->nombre);
                        $resultado->bindParam(':descripcion_rol',$this->descripcion);

                        $resultado->execute();

                        $accion= "Ha modificado un Rol";
                        parent::registrar_bitacora($cedula_bitacora, $accion, $modulo);

                        return $this->consultar($rol_usuario,$cedula_bitacora,$modulo);
                        
                    }catch(Exception $e){
                        return $e->getMessage();
                    }
                }
                else {
                    return "Rol no registrado";
                }
            }else{
                return "ingrese datos correctamente";
            }
		}

        public function eliminar($cedula_bitacora,$modulo){

            $co = $this->conecta();
            $co->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            if(preg_match_all('/^[a-zA-ZáéíóúÁÉÍÓÚñÑ -]{5,30}$/',$this->nombre)){
                if($this->existe($this->nombre)){
                    try{

                        $resultado = $co->prepare("DELETE from roles where nombre = :nombre_rol");

                        $resultado->bindParam(':nombre_rol',$this->nombre);

                        $resultado->execute();		

                        if ($resultado) {
                            $accion= "Ha eliminado un Rol";
                            parent::registrar_bitacora($cedula_bitacora, $accion, $modulo);
                            return "eliminado";
                        }
                        else{
                            return "no eliminado";
                        }
                        
                    }catch(Exception $e) {
                        return $e->getMessage();
                    }
                }
                else {
                    return "Club no registrado";
                }
            }else{
                return "ingrese datos correctamente";
            }
            
        }

        private function existe($nombre){
            $co = $this->conecta();
            $co->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            
            try {

                //se asigna a $resultado la consulta prepare para conocer si existe el registro
                $resultado = $co->prepare("SELECT * from roles where nombre = :nombre_rol");

                $resultado->bindParam(':nombre_rol',$nombre);

                $resultado->execute();

                //se convierte el resultado en un arreglo asociativo 
                //y se asigna a la variable $fila
                $fila = $resultado->fetchAll(PDO::FETCH_BOTH);
                if($fila){ //si $fila, significa que encontro el codigo del club

                    return true; //retorna verdadero
                    
                }
                else{
                    
                    return false; //retorna falso en caso de que no consiga el codigo del club
                }
                
            }catch(Exception $e){
                //si estra aca es que hubo algun error por lo que tambien me retornara que
                //no la encontro
                return false;
            }

        }

        public function permisos($rol){
		
            $co = $this->conecta();
            $co->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            
            try{
                    
                $resultado = $co->prepare("SELECT consultar, registrar, modificar, eliminar FROM intermediaria WHERE id_rol = :rol and id_modulos = '9' ");
                
                $resultado->bindParam(':rol',$rol);
                $resultado->execute();
                
                $consultar="";
                $registrar="";
                $modificar="";
                $eliminar="";
                
                foreach($resultado as $r){
                    $consultar = $r['consultar'];
                    $registrar = $r['registrar'];
                    $modificar = $r['modificar'];
                    $eliminar = $r['eliminar'];
                }
                
                $respuesta_permiso=[];
                
                $respuesta_permiso[0]=$consultar;
                $respuesta_permiso[1]=$registrar;
                $respuesta_permiso[2]=$modificar;
                $respuesta_permiso[3]=$eliminar;	
                
                if(!empty($respuesta_permiso)){
                
                    return $respuesta_permiso;

                }else{
                    return "ha ocurrido un error";
                }
                
            }catch(Exception $e){
                
                return false;
            }
        }

        public function consulta_permisos(){
		    $co = $this->conecta();
		    $co->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            if(preg_match_all('/^[0-9\b]{1,10}$/',$this->rol_modulo)){
                try {
                        $resultado = $co->prepare("SELECT intermediaria.id_modulos, modulos.nombre, intermediaria.consultar, intermediaria.registrar, intermediaria.modificar, intermediaria.eliminar FROM intermediaria,modulos WHERE intermediaria.id_rol = :rol_modulo AND intermediaria.id_modulos = modulos.id");
                        
                        
                        $resultado->bindParam(':rol_modulo',$this->rol_modulo);	
                        
                        $resultado->execute();


                        if($resultado){
                    
                            $respuesta = '';
                            $i = 0;

                            foreach($resultado as $r){
                                $respuesta = $respuesta."<tr>";
                                    $respuesta = $respuesta.'<td >';
                                        $respuesta = $respuesta.$r[0];
                                        $respuesta = $respuesta.'<input style="display: none;" type="text" name="modulo_id[]" value="'.$r[0].'" >';
                                    $respuesta = $respuesta."</td>";
    
                                    $respuesta = $respuesta."<td >";
                                        $respuesta = $respuesta.$r[1];
                                    $respuesta = $respuesta."</td>";

                                    $respuesta = $respuesta."<td class='text-center'>";
                                        if ($r[2]=="true") {
                                            $respuesta = $respuesta.'<input type="checkbox" checked="" name="consultar'.$i.'" value="true" onclick="verifica(this);">';
                                        }else{
                                            $respuesta = $respuesta.'<input type="checkbox" name="consultar'.$i.'" onclick="verifica(this);">';
                                        }
                                    $respuesta = $respuesta."</td>";

                                    $respuesta = $respuesta."<td class='text-center'>";
                                        if ($r[3]=="true") {
                                            $respuesta = $respuesta.'<input type="checkbox" checked="" name="registrar'.$i.'" value="true" onclick="verifica(this);">';
                                        }else{
                                            $respuesta = $respuesta.'<input type="checkbox" name="registrar'.$i.'" onclick="verifica(this);">';
                                        }
                                    $respuesta = $respuesta."</td>";

                                    $respuesta = $respuesta."<td class='text-center'>";
                                        if ($r[4]=="true") {
                                            $respuesta = $respuesta.'<input type="checkbox" checked="" name="modificar'.$i.'" value="true" onclick="verifica(this);">';                
                                        }else{
                                            $respuesta = $respuesta.'<input type="checkbox" name="modificar'.$i.'" onclick="verifica(this);">';
                                        }
                                    $respuesta = $respuesta."</td>";

                                    $respuesta = $respuesta."<td class='text-center'>";
                                        if ($r[5]=="true") {
                                            $respuesta = $respuesta.'<input type="checkbox" checked="" name="eliminar'.$i.'" value="true" onclick="verifica(this);">';
                                        }else{
                                            $respuesta = $respuesta.'<input type="checkbox" name="eliminar'.$i.'" onclick="verifica(this);">';
                                        }
                                    $respuesta = $respuesta."</td>";
                                $respuesta = $respuesta."</tr>";

                                $i++;
                            }
                            return $respuesta;
                        
                        }
                        else{
                            return 'ha ocurrido';
                        }
                        
                        
                
                } catch(Exception $e) {
                    return $e->getMessage();
                }
            }else{
                return 'ingrese datos correctamente';
            }
        }

        public function actualizar_permisos($id_modulo,$registrar,$consultar,$modificar,$eliminar){
            $co = $this->conecta();
            $co->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            
            if($this->validar_actualizar($id_modulo,$registrar,$consultar,$modificar,$eliminar)){
                
                try {

                    $resultado = $co->prepare("UPDATE intermediaria set 
                    consultar = :consultar,
                    registrar = :registrar,
                    modificar = :modificar,
                    eliminar = :eliminar
                    where id_modulos = :id_modulos and id_rol = :rol2");

                    $resultado->bindParam(':rol2',$this->rol_2);
                    $resultado->bindParam(':id_modulos',$id_modulo);	
                    $resultado->bindParam(':consultar',$consultar);
                    $resultado->bindParam(':registrar',$registrar);
                    $resultado->bindParam(':modificar',$modificar);
                    $resultado->bindParam(':eliminar',$eliminar);
                    
                    $resultado->execute();

                    return "permiso actualizado";
                        
                } catch(Exception $e) {
                    return $e->getMessage();
                }

            }else{
                return "ingrese datos correctamente";
            }
        }

        public function validar_registrar(){

            $this->descripcion = trim($this->descripcion);
            
            $this->nombre = trim($this->nombre);//elimina espacios en blanco

            if(!preg_match_all('/^[a-zA-ZáéíóúÁÉÍÓÚñÑ -]{5,30}$/',$this->nombre)){
			    return false;
		    }
            else if(!preg_match_all('/^[a-zA-Z ]{5,50}$/',$this->descripcion)){
			    return false;
		    }

            else if(!preg_match_all('/^[a-zA-Z\b]{2,6}$/',$this->modulo_club)){
			    return false;
		    }
            else if(!preg_match_all('/^[a-zA-Z\b]{2,6}$/',$this->modulo_personal)){
			    return false;
		    }
            else if(!preg_match_all('/^[a-zA-Z\b]{2,6}$/',$this->modulo_atletas)){
			    return false;
		    }
            else if(!preg_match_all('/^[a-zA-Z\b]{2,6}$/',$this->modulo_medicos)){
			    return false;
		    }
            else if(!preg_match_all('/^[a-zA-Z\b]{2,6}$/',$this->modulo_socioeconomicos)){
			    return false;
		    }
            else if(!preg_match_all('/^[a-zA-Z\b]{2,6}$/',$this->modulo_eventos)){
			    return false;
		    }
            else if(!preg_match_all('/^[a-zA-Z\b]{2,6}$/',$this->modulo_usuarios)){
			    return false;
		    }
            else if(!preg_match_all('/^[a-zA-Z\b]{2,6}$/',$this->modulo_bitacora)){
			    return false;
		    }
            else if(!preg_match_all('/^[a-zA-Z\b]{2,6}$/',$this->modulo_roles)){
			    return false;
		    }
            else if(!preg_match_all('/^[a-zA-Z\b]{2,6}$/',$this->modulo_inscripcion)){
			    return false;
		    }
            else if(!preg_match_all('/^[a-zA-Z\b]{2,6}$/',$this->modulo_emparejamientos)){
			    return false;
		    }
            else if(!preg_match_all('/^[a-zA-Z\b]{2,6}$/',$this->modulo_resultados)){
			    return false;
		    }
            else if(!preg_match_all('/^[a-zA-Z\b]{2,6}$/',$this->modulo_historial)){
			    return false;
		    }
            else if(!preg_match_all('/^[a-zA-Z\b]{2,6}$/',$this->modulo_reportes)){
			    return false;
		    }
            else{
                return true;
            }
        }

        public function validar_modificar(){
            
            $this->descripcion = trim($this->descripcion);
            
            $this->nombre = trim($this->nombre);//elimina espacios en blanco

            if(!preg_match_all('/^[a-zA-ZáéíóúÁÉÍÓÚñÑ -]{5,30}$/',$this->nombre)){
			    return false;
		    }
            else if(!preg_match_all('/^[a-zA-Z ]{5,50}$/',$this->descripcion)){
			    return false;
		    }
            else{
                return true;
            }
        }

        public function validar_actualizar($id_modulo,$registrar,$consultar,$modificar,$eliminar){
            if(!preg_match_all("/^[0-9\b]{1,10}$/",$this->rol_2)){
                return false;
            }
            else if(!preg_match_all('/^[0-9\b]{1,10}$/',$id_modulo)){
                return false;
            }
            else if(!preg_match_all('/^[a-zA-Z\b]{2,6}$/',$registrar)){
                return false;
            }
             else if(!preg_match_all('/^[a-zA-Z\b]{2,6}$/',$consultar)){
                return false;
            }
             else if(!preg_match_all('/^[a-zA-Z\b]{2,6}$/',$modificar)){
                return false;
            }
             else if(!preg_match_all('/^[a-zA-Z\b]{2,6}$/',$eliminar)){
                return false;
            }
            else{
                return true;
            }
        }
       
    }

?>