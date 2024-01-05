<?php 

use PHPUnit\Framework\TestCase;
use modelo\gestionar_atleta;
class registrar_gestionar_atletaTest extends TestCase{
    private $atleta;
   
    public function setUp():void{
        
        $this->atleta = new gestionar_atleta();
    }
    public function testRegistrarAtleta(){

        $this->atleta->set_club_atleta('3#$%3??');
        $this->atleta->set_cedula_atleta('rff$$&/');
        $this->atleta->set_nombres_atleta('fir!#$&/');
        $this->atleta->set_apellidos_atleta('ñ"#dd@');
        $this->atleta->set_peso_atleta('m%!33');
        $this->atleta->set_estatura_atleta('$%ff4');
        $this->atleta->set_fecha_atleta('$%ffr');
        $this->atleta->set_telefono_atleta('$%ffry');
        $this->atleta->set_sexo_atleta('*6778%&');
        $this->atleta->set_deporte_atleta('[]524%&');
        $this->atleta->set_categoria_atleta('?$%*%');
        $this->atleta->set_fecha_ingreso_atleta('$%@ff');
        $this->atleta->set_entrenador_atleta('(4%!"4)');

        $registro = $this->atleta->registrar('1!@%&','2%&@84','$%@ef');

        $this->assertEquals('Registrado Correctamente', $registro);
    }
}

?>