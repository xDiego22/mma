 <?php 

use PHPUnit\Framework\TestCase;

use modelo\socioeconomico_atleta;

class registrar_informacion_socioeconomicaTest extends TestCase{
    private $socioeconomica;
    
    public function setUp():void{
        $this->socioeconomico = new socioeconomico_atleta();
    }

    public function testRegistrarSocioeconomicoAtleta(){
    
        $this->socioeconomico->set_nombre_atleta('');
        $this->socioeconomico->set_tipo_vivienda('');
        $this->socioeconomico->set_zona_vivienda('');
        $this->socioeconomico->set_propiedad_vivienda('');
        $this->socioeconomico->set_habitantes_vivienda('');
        $this->socioeconomico->set_internet('');
        $this->socioeconomico->set_luz('');
        $this->socioeconomico->set_agua('');
        $this->socioeconomico->set_telefono_residencial('');
        $this->socioeconomico->set_cable('');

        $registro = $this->socioeconomico->registrar('1','29831184','5');

        $this->assertEquals('ingrese datos correctamente', $registro);
    }
}

?>