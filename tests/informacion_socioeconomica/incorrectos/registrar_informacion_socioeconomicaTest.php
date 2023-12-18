 <?php 

use PHPUnit\Framework\TestCase;

use modelo\socioeconomico_atleta;

class registrar_informacion_socioeconomicaTest extends TestCase{
    private $socioeconomica;
    
    public function setUp():void{
        $this->socioeconomico = new socioeconomico_atleta();
    }

    public function testRegistrarSocioeconomicoAtleta(){
    
        $this->socioeconomico->set_nombre_atleta('1203?¡?¡');
        $this->socioeconomico->set_tipo_vivienda('132912?¡¡¡');
        $this->socioeconomico->set_zona_vivienda('8130283?¡?¡?');
        $this->socioeconomico->set_propiedad_vivienda('43243¡¡¡¡');
        $this->socioeconomico->set_habitantes_vivienda('fdsdfs');
        $this->socioeconomico->set_internet('1');
        $this->socioeconomico->set_luz('2');
        $this->socioeconomico->set_agua('3');
        $this->socioeconomico->set_telefono_residencial('4');
        $this->socioeconomico->set_cable('5');

        $registro = $this->socioeconomico->registrar('1','29831184','5');

        $this->assertEquals('Registrado Correctamente', $registro);
    }
}

?>