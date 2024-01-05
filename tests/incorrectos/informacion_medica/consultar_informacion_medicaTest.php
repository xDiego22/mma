<?php 

use PHPUnit\Framework\TestCase;
use modelo\medico_atleta;

class consultar_informacion_medicaTest extends TestCase{
    private $medico;

    public function setUp():void{
        $this->medico = new medico_atleta();
    }

    public function testConsultarMedicoAtleta(){
       
        $consultar = $this->medico->consultar('1#"$','2#%#4','$%!3');

        $this->assertJson($consultar);
    }
}

?>