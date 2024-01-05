 <?php 

use PHPUnit\Framework\TestCase;
use modelo\socioeconomico_atleta;

class modificar_informacion_socioeconomicaTest extends TestCase{
    private $socioeconomico;
    
    public function setUp():void{
        $this->socioeconomico = new socioeconomico_atleta();
    }

    public function testModificarSocioeconomicoAtleta(){

        $this->socioeconomico->set_nombre_atleta('r?%%[¡');
        $this->socioeconomico->set_tipo_vivienda('1.:4f/¡');
        $this->socioeconomico->set_zona_vivienda('8$%@?');
        $this->socioeconomico->set_propiedad_vivienda('$f%&?f');
        $this->socioeconomico->set_habitantes_vivienda('f:-4f@s');
        $this->socioeconomico->set_internet('G%2+');
        $this->socioeconomico->set_luz('*{}$ff');
        $this->socioeconomico->set_agua('$F5?');
        $this->socioeconomico->set_telefono_residencial('%F5/?');
        $this->socioeconomico->set_cable('%%G22.');
        $modificar = $this->socioeconomico->modificar('$[51f','8*[5f4',']-.$r$');

        $this->assertEquals('Modificado Correctamente', $modificar);

    }
}

?>