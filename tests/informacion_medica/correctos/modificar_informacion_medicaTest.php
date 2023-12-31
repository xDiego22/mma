 <?php 

use PHPUnit\Framework\TestCase;
use modelo\medico_atleta;

class modificar_informacion_medicaTest extends TestCase{
    private $medico;
    
    public function setUp():void{
        
        $this->medico = new medico_atleta();
        
        $this->medico->set_nombre_atleta('37');
        $this->medico->set_medicamento_atleta('diclofenac');
        $this->medico->set_enfermedad_atleta('artritis');
        $this->medico->set_discapacidad_atleta('ninguna');
        $this->medico->set_dieta_atleta('carga de proteinas');
        $this->medico->set_enfermedades_pasadas('cirugias pasadas');
        $this->medico->set_nombre_parentesco('julio vargas');
        $this->medico->set_telefono_parentesco('04163789843');
        $this->medico->set_relacion_parentesco('familiar');

        $this->medico->registrar('1','29831184','4');
        
    }

    public function tearDown():void {
        
        $this->medico->set_nombre_atleta('37');
        $this->medico->eliminar('29831184','4','1');
    }

    public function testModificarMedicoAtleta(){

        $this->medico->set_nombre_atleta('37');
        $this->medico->set_medicamento_atleta('diclofenac,loratadina');
        $this->medico->set_enfermedad_atleta('artritis');
        $this->medico->set_discapacidad_atleta('ninguna');
        $this->medico->set_dieta_atleta('planificacion alimenticia a base de carbohidratos');
        $this->medico->set_enfermedades_pasadas('cirugias pasadas');
        $this->medico->set_nombre_parentesco('julio vargas');
        $this->medico->set_telefono_parentesco('04146782343');
        $this->medico->set_relacion_parentesco('familiar');
       
        $modificar = $this->medico->modificar('1','29831184','4');
        $this->assertEquals('Modificado Correctamente', $modificar);
    }
}

?>