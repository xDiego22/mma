<?php 

use PHPUnit\Framework\TestCase;

use modelo\medico_atleta;

class modificar_informacion_medicaTest extends TestCase{
    private $medico;

    public function setUp():void{
        $this->medico = new medico_atleta();
    }


    public function testModificarMedicoAtleta(){
        
        $this->medico->set_nombre_atleta('');
        $this->medico->set_medicamento_atleta('');
        $this->medico->set_enfermedad_atleta('');
        $this->medico->set_discapacidad_atleta('');
        $this->medico->set_dieta_atleta('');
        $this->medico->set_enfermedades_pasadas('');
        $this->medico->set_nombre_parentesco('');
        $this->medico->set_telefono_parentesco('');
        $this->medico->set_relacion_parentesco('');

        $this->medico->registrar('1','29831184','4');
       
        $modificar = $this->medico->modificar('1','29831184','4');

        $this->assertEquals('Modificado Correctamente', $modificar);
    }
}

?>