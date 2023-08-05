 <?php 

use PHPUnit\Framework\TestCase;

use modelo\medico_atleta;

class registrar_informacion_medicaTest extends TestCase{
    private $medico;
    protected static $pdo;

    public function setUp():void{
        
        $this->medico = new medico_atleta();
        
    }

    public function testRegistrarMedicoAtleta(){
        
        $this->medico->set_nombre_atleta('1238?¡?¡');
        $this->medico->set_medicamento_atleta('1293921¡¡¡?¡?');
        $this->medico->set_enfermedad_atleta('12937=?=¡');

        $this->medico->set_discapacidad_atleta('12931¡¡');
        $this->medico->set_dieta_atleta('0238123¡¡¡');

        $this->medico->set_enfermedades_pasadas('?¡?¡?1');
        $this->medico->set_nombre_parentesco('3¿123¿12');

        $this->medico->set_telefono_parentesco('xioami');
        $this->medico->set_relacion_parentesco('12039210?¡?¡');

        $registro = $this->medico->registrar('1','29831184','4');

        $this->assertEquals('ingrese datos correctamente', $registro);
    }
}

?>