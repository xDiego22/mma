 <?php 

use PHPUnit\Framework\TestCase;
use modelo\socioeconomico_atleta;

class registrar_informacion_socioeconomicaTest extends TestCase{
    private $socioeconomica;
    
    public function setUp():void{
        $this->socioeconomico = new socioeconomico_atleta();
    }

    public function testRegistrarSocioeconomicoAtleta(){
    
        $this->socioeconomico->set_nombre_atleta('$%&ff4');
        $this->socioeconomico->set_tipo_vivienda('13-{T¡');
        $this->socioeconomico->set_zona_vivienda('81[*65G');
        $this->socioeconomico->set_propiedad_vivienda('4$5ff*{.');
        $this->socioeconomico->set_habitantes_vivienda('fd%F52');
        $this->socioeconomico->set_internet('%ff');
        $this->socioeconomico->set_luz('T%*.');
        $this->socioeconomico->set_agua(':@#?');
        $this->socioeconomico->set_telefono_residencial('/g5*.');
        $this->socioeconomico->set_cable('%F$56f¿4');

        $registro = $this->socioeconomico->registrar('#@f1','21$ff=84','$$63d');

        $this->assertEquals('Registrado Correctamente', $registro);
    }
}

?>