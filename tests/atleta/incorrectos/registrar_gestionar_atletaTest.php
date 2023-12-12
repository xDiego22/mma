 <?php 

use PHPUnit\Framework\TestCase;

use modelo\gestionar_atleta;

class registrar_gestionar_atletaTest extends TestCase{
    private $atleta;
   
    public function setUp():void{
        
        $this->atleta = new gestionar_atleta();
    }

    public function testRegistrarAtleta(){

        $this->atleta->set_club_atleta('3123??');
        $this->atleta->set_cedula_atleta('extranjera');
        $this->atleta->set_nombres_atleta('29347');
        $this->atleta->set_apellidos_atleta('13213');
        $this->atleta->set_peso_atleta('mucho');
        $this->atleta->set_estatura_atleta('alto');
        $this->atleta->set_fecha_atleta('abril');
        $this->atleta->set_telefono_atleta('nokia');
        $this->atleta->set_sexo_atleta('1');
        $this->atleta->set_deporte_atleta('2');
        $this->atleta->set_categoria_atleta('?¡?¡?¡?¡?¡?¡?');
        $this->atleta->set_fecha_ingreso_atleta('principios');
        $this->atleta->set_entrenador_atleta('(47927391¡¡¡)');

        $registro = $this->atleta->registrar('1','29831184','1');

        $this->assertEquals('Registrado Correctamente', $registro);
    }
}

?>