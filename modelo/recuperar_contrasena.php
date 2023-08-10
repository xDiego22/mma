<?php 
    namespace modelo;
    use modelo\conexion as conexion;
    use PDO;
    use Exception;

    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;

    use League\OAuth2\Client\Provider\Google;
    
    class recuperar_contrasena extends conexion{
        private $correo;

        public function set_correo($valor){
		    $this->correo = $valor;
	    }

        public function get_correo(){
		    return $this->correo;
	    }

        public function restaurarContrasena(){
            $co = $this->conecta();
            $co->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            try {
                if($this->validarCorreo()){
                    if($this->existe($this->correo)){

                        $cedula = $this->obtenerCedula();
                        $nombre = $this->obtenerNombre();
                        $correo = $this->correo;
                        $tokenContrasena = $this->generarTokenContrasena($cedula); 

                        $url = 'http://'.$_SERVER["SERVER_NAME"].'/trayecto4/mma/?pagina=cambiar_contrasena.php&cedula='.$cedula.'&token='.$tokenContrasena;

                        $asunto = 'Recuperar Contraseña';

                        $cuerpo = "Hola $nombre <br><br> se ha solicitado un cambio de contraseña. <br><br> Click al siguiente enlace para restaurarla: <a href='$url>Link</a>";

                        return $this->enviarCorreo($correo,$nombre,$asunto,$cuerpo);
                        
                    }else{
                        return "Correo electronico no pertenece a nadie";
                    }
                }else{
                    return "Debe ingresar un correo electronico valido";
                }
            }catch(Exception $e) {
			    return $e->getMessage();
		    }
        }

        private function obtenerCedula(){
            $co = $this->conecta();
            $co->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            try {
                $resultado = $co->prepare("SELECT * from usuarios where correo = :correo");

                $resultado->bindParam(':correo',$this->correo);
                $resultado->execute();
                
                
                $fila = $resultado->fetchAll(PDO::FETCH_BOTH);
                
                if($fila){
                    return $fila[0][0];
                }
                else{
                    return "";
                }
                
            }catch(Exception $e){
                return $e->getMessage();
            }
        }

        private function generarTokenContrasena($cedula){
            $co = $this->conecta();
            $co->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            try {
                //generacion de token de contrasena
				$token = md5(uniqid(mt_rand(),false));

                $resultado = $co->prepare("UPDATE usuarios SET token_contrasena = :token, solicitud_contrasena = 1 WHERE cedula = :cedula");

                $resultado->bindParam(':token',$token);
                $resultado->bindParam(':cedula',$cedula);

                $resultado->execute();

                return $token;

            } catch(Exception $e) {
			    return $e->getMessage();
		    }
        } 

        private function obtenerNombre(){
            $co = $this->conecta();
            $co->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            try {
                $resultado = $co->prepare("SELECT usuarios.nombre from usuarios where correo = :correo");

                $resultado->bindParam(':correo',$this->correo);
                $resultado->execute();
                
                
                $fila = $resultado->fetchAll(PDO::FETCH_BOTH);
                
                if($fila){
                    return $fila[0][0];
                }
                else{
                    return "";
                }
                
            }catch(Exception $e) {
			    return $e->getMessage();
		    }
        }

        public function validarCorreo(){
            $this->correo = trim($this->correo);
            if(!preg_match('/^[A-Za-z0-9ñÑüÜ_.@\b-]{6,70}$/',$this->correo)){
			    return false;
            }
            else{
                return true;
            }
        }

        private function existe($correo){
            $co = $this->conecta();
            $co->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            
            try {

                $resultado = $co->prepare("SELECT * from usuarios where correo = :correo");

                $resultado->bindParam(':correo',$this->correo,PDO::PARAM_STR);
                $resultado->execute();

                
                $fila = $resultado->fetchAll(PDO::FETCH_BOTH);
                if($fila){
                    return true; 
                }
                else{
                    return false;
                }
                
            }catch(Exception $e) {
			    return $e->getMessage();
		    }

	    }

        public function enviarCorreo($correo,$nombre,$asunto,$cuerpo){
            $mail = new PHPMailer(true);

            try {
                //Server settings
                $mail->SMTPDebug = 2;                      //Enable verbose debug output
                $mail->isSMTP();                                            //Send using SMTP
                $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
                $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
                $mail->Username   = 'suppormmalara12@gmail.com';                     //SMTP username
                $mail->Password   = 'wynwzmrmiegicuie';                               //SMTP password
                $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
                $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

                //Recipients
                $mail->setFrom('supportmma12@gmail.com', 'Soporte de Usuarios MMA');
                $mail->addAddress($correo, $nombre);     //Add a recipient

                //Content
                $mail->isHTML(true);                                  //Set email format to HTML
                $mail->Subject = $asunto;
                $mail->Body    = $cuerpo;
                //$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

                $mail->send();
                return 'El mensaje ha sido enviado';
            } catch (Exception $e) {
                return "El mensaje no pudo ser enviado. Mailer Error: {$mail->ErrorInfo}";
            }

        }
    }
?>