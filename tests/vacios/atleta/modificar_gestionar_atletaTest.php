<?php 

use PHPUnit\Framework\TestCase;

use modelo\gestionar_atleta;

class modificar_gestionar_atletaTest extends TestCase{
    private $atleta;

    public function setUp():void{
        
        $this->atleta = new gestionar_atleta();
    }

    public function testModificarAtleta(){

        $this->atleta->set_club_atleta('');
        $this->atleta->set_cedula_atleta('');
        $this->atleta->set_nombres_atleta('');
        $this->atleta->set_apellidos_atleta('');
        $this->atleta->set_peso_atleta('');
        $this->atleta->set_estatura_atleta('');
        $this->atleta->set_fecha_atleta('');
        $this->atleta->set_telefono_atleta('');
        $this->atleta->set_sexo_atleta('');
        $this->atleta->set_deporte_atleta('');
        $this->atleta->set_categoria_atleta('');
        $this->atleta->set_fecha_ingreso_atleta('');
        $this->atleta->set_entrenador_atleta('');

        $modificar = $this->atleta->modificar('1','29831184','1');
        $this->assertEquals('Modificado Correctamente', $modificar);      
    }
}

?>