<?php 
    namespace modelo;
    use modelo\conexion as conexion;
    use PDO;
    use Exception;

    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;

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
                        
                        $tokenContrasena = $this->generarTokenContrasena($cedula); 

                        $url = 'http://'.$_SERVER["SERVER_NAME"].'/cambiar_contrasena.php?cedula='.$cedula.'&token='.$token;

                        $asunto = 'Recuperar Contraseña';

                        $cuerpo = "Hola $nombre <br><br> se ha solicitado un cambio de contraseña. <br><br> Click al siguiente enlace para restaurarla: <a href='$url>$url</a>";
                        
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
                $resultado = $co->prepare("SELECT usuarios.cedula from usuarios where correo = :correo LIMIT 1");

                $resultado->bindParam(':correo',$this->correo,PDO::PARAM_INT);
                $resultado->execute();
                
                
                $fila = $resultado->fetchAll(PDO::FETCH_BOTH);
                
                if($fila){
                    return $fila[0][0];
                }
                else{
                    return NULL;
                }
                
            }catch(Exception $e){
                return false;
            }
        }

        private function generarTokenContrasena($cedula){
            $co = $this->conecta();
            $co->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            try {
                //generacion de token de contrasena
				$token = md5(uniqid(mt_rand(),false));

                $resultado = $co->prepare("UPDATE usuarios SET token_contrasena = :token, solicitud_contrasena = 1 WHERE cedula = :cedula");

                $resultado->bindParam(':token',$token,PDO::PARAM_STR);
                $resultado->bindParam(':cedula',$cedula,PDO::PARAM_INT);

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
                $resultado = $co->prepare("SELECT usuarios.nombre from usuarios where correo = :correo LIMIT 1");

                $resultado->bindParam(':correo',$this->correo,PDO::PARAM_INT);
                $resultado->execute();
                
                
                $fila = $resultado->fetchAll(PDO::FETCH_BOTH);
                
                if($fila){
                    return $fila[0][0];
                }
                else{
                    return NULL;
                }
                
            }catch(Exception $e) {
			    return $e->getMessage();
		    }
        }

        public function validarCorreo(){
            $this->correo = trim($this->correo);
            if(!preg_match('/^[A-Za-z0-9ñÑüÜ_.@\b-]{6,70}$/',$this->correo_usuarios)){
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

        public function enviarCorreo(){
            $mail = new PHPMailer(true);

            try {
                //Server settings
                $mail->SMTPDebug = 2;                      //Enable verbose debug output
                $mail->isSMTP();                                            //Send using SMTP
                $mail->Host       = 'smtp.example.com';                     //Set the SMTP server to send through
                $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
                $mail->Username   = 'user@example.com';                     //SMTP username
                $mail->Password   = 'secret';                               //SMTP password
                $mail->SMTPSecure = 'tls';            //Enable implicit TLS encryption
                $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

                //Recipients
                $mail->setFrom('from@example.com', 'Mailer');
                $mail->addAddress('joe@example.net', 'Joe User');     //Add a recipient
               
                $mail->addReplyTo('info@example.com', 'Information');
                $mail->addCC('cc@example.com');
                $mail->addBCC('bcc@example.com');

                //Content
                $mail->isHTML(true);                                  //Set email format to HTML
                $mail->Subject = 'Here is the subject';
                $mail->Body    = 'This is the HTML message body <b>in bold!</b>';
                $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

                $mail->send();
                echo 'Message has been sent';
            } catch (Exception $e) {
                echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
            }

        }
    }
?>