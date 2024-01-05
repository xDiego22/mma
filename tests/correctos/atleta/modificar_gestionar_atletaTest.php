<?php 

use PHPUnit\Framework\TestCase;
use modelo\gestionar_atleta;

class modificar_gestionar_atletaTest extends TestCase{
    private $atleta;

    public function setUp():void{
        $this->atleta = new gestionar_atleta();

        $this->atleta->set_club_atleta('88');
        $this->atleta->set_cedula_atleta('3345123');
        $this->atleta->set_nombres_atleta('robert');
        $this->atleta->set_apellidos_atleta('james');
        $this->atleta->set_peso_atleta('66.4');
        $this->atleta->set_estatura_atleta('1.70');
        $this->atleta->set_fecha_atleta('2002-12-22');
        $this->atleta->set_telefono_atleta('04244367865');
        $this->atleta->set_sexo_atleta('masculino');
        $this->atleta->set_deporte_atleta('karate');
        $this->atleta->set_categoria_atleta('categoria 2');
        $this->atleta->set_fecha_ingreso_atleta('2023-03-01');
        $this->atleta->set_entrenador_atleta('carlos rodriguez');

        $this->atleta->registrar('1','29831184','1');
    }
    
    public function tearDown():void {
        $this->atleta->set_cedula_atleta('3345123');
        $this->atleta->eliminar('29831184','3','1');
    }
    public function testModificarAtleta(){

        $this->atleta->set_club_atleta('88');
        $this->atleta->set_cedula_atleta('3345123');
        $this->atleta->set_nombres_atleta('ruben');
        $this->atleta->set_apellidos_atleta('Gomez');
        $this->atleta->set_peso_atleta('70.2');
        $this->atleta->set_estatura_atleta('1.72');
        $this->atleta->set_fecha_atleta('2001-11-01');
        $this->atleta->set_telefono_atleta('04266377865');
        $this->atleta->set_sexo_atleta('masculino');
        $this->atleta->set_deporte_atleta('boxeo');
        $this->atleta->set_categoria_atleta('categoria 2');
        $this->atleta->set_fecha_ingreso_atleta('2023-02-12');
        $this->atleta->set_entrenador_atleta('carlos jimenez');

        $modificar = $this->atleta->modificar('1','29831184','3');
    
        $this->assertEquals('Modificado Correctamente', $modificar);
    }
}

?>