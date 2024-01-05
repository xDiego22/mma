<?php 

use PHPUnit\Framework\TestCase;
use modelo\medico_atleta;

class registrar_informacion_medicaTest extends TestCase{
    private $medico;
   
    public function setUp():void{
        $this->medico = new medico_atleta();
    }

    public function testRegistrarMedicoAtleta(){
        
        $this->medico->set_nombre_atleta('1rg%&?¡');
        $this->medico->set_medicamento_atleta('12$@/)?');
        $this->medico->set_enfermedad_atleta('fg$@=¡');
        $this->medico->set_discapacidad_atleta('%%Qff@');
        $this->medico->set_dieta_atleta('02RG$%¡');
        $this->medico->set_enfermedades_pasadas('?%%gg1');
        $this->medico->set_nombre_parentesco('t%%Y&');
        $this->medico->set_telefono_parentesco('t2$T!');
        $this->medico->set_relacion_parentesco('$$ft@.¡');

        $registro = $this->medico->registrar('1$%)9','2:JJ=4','%66:4');

        $this->assertEquals('Registrado Correctamente', $registro);
    }
}

?>