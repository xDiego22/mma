<?php 

use PHPUnit\Framework\TestCase;
use modelo\medico_atleta;

class modificar_informacion_medicaTest extends TestCase{
    private $medico;

    public function setUp():void{
        $this->medico = new medico_atleta();
    }
    public function testModificarMedicoAtleta(){
        
        $this->medico->set_nombre_atleta('12$&/+¿');
        $this->medico->set_medicamento_atleta('12@:4%&?');
        $this->medico->set_enfermedad_atleta('12$%=');
        $this->medico->set_discapacidad_atleta('12..,-#');
        $this->medico->set_dieta_atleta('02#%@=');
        $this->medico->set_enfermedades_pasadas('?.$$@1');
        $this->medico->set_nombre_parentesco('3¿@@%12');
        $this->medico->set_telefono_parentesco('$&&$2');
        $this->medico->set_relacion_parentesco('%&&g6?¡');
       
        $modificar = $this->medico->modificar('1$%)9','2:JJ=4','%66:4');

        $this->assertEquals('Modificado Correctamente', $modificar);
    }
}

?>