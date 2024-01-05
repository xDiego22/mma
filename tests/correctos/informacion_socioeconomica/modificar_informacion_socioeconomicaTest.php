 <?php 

use PHPUnit\Framework\TestCase;
use modelo\socioeconomico_atleta;

class modificar_informacion_socioeconomicaTest extends TestCase{
    private $socioeconomico;

    public function setUp():void{
        $this->socioeconomico = new socioeconomico_atleta();
       
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

        $this->socioeconomico->registrar('1','29831184','5');
    }

    public function tearDown():void {
        $this->socioeconomico->set_nombre_atleta('37');
        $this->socioeconomico->eliminar('29831184','5','1');
    }

    public function testModificarSocioeconomicoAtleta(){
        $this->socioeconomico->set_nombre_atleta('37');
        $this->socioeconomico->set_tipo_vivienda('Casa');
        $this->socioeconomico->set_zona_vivienda('Urbana');
        $this->socioeconomico->set_propiedad_vivienda('Alquilada');
        $this->socioeconomico->set_habitantes_vivienda('5');
        $this->socioeconomico->set_internet('NO POSEE');
        $this->socioeconomico->set_luz('POSEE');
        $this->socioeconomico->set_agua('POSEE');
        $this->socioeconomico->set_telefono_residencial('NO POSEE');
        $this->socioeconomico->set_cable('NO POSEE');
        $modificar = $this->socioeconomico->modificar('1','29831184','5');

        $this->assertEquals('Modificado Correctamente', $modificar);

    }
}

?>