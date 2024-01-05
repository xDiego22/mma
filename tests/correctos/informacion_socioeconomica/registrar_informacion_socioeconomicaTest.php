 <?php 

use PHPUnit\Framework\TestCase;
use modelo\socioeconomico_atleta;
class registrar_informacion_socioeconomicaTest extends TestCase{
    private $socioeconomica;

    public function setUp():void{
        $this->socioeconomico = new socioeconomico_atleta();
    }

    public function tearDown():void {
        
        $this->socioeconomico->set_nombre_atleta('37');
        $this->socioeconomico->eliminar('29831184','5','1');
    }
    public function testRegistrarSocioeconomicoAtleta(){
        $this->socioeconomico->set_nombre_atleta('37');
        $this->socioeconomico->set_tipo_vivienda('Departamento');
        $this->socioeconomico->set_zona_vivienda('Urbana');
        $this->socioeconomico->set_propiedad_vivienda('Propia');
        $this->socioeconomico->set_habitantes_vivienda('3');
        $this->socioeconomico->set_internet('POSEE');
        $this->socioeconomico->set_luz('POSEE');
        $this->socioeconomico->set_agua('POSEE');
        $this->socioeconomico->set_telefono_residencial('NO POSEE');
        $this->socioeconomico->set_cable('POSEE');

        $registro = $this->socioeconomico->registrar('1','29831184','5');

        $this->assertEquals('Registrado Correctamente', $registro);
    }
}

?>