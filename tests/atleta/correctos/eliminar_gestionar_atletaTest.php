<?php 

use PHPUnit\Framework\TestCase;
use modelo\gestionar_atleta;
class eliminar_gestionar_atletaTest extends TestCase{
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
    public function testEliminarAtleta(){
        $this->atleta->set_cedula_atleta('3345123');
        $this->assertEquals('eliminado',$this->atleta->eliminar('29831184','3','1'));
    }
}

?>