 <?php 

use PHPUnit\Framework\TestCase;

use modelo\conexion;
use modelo\gestionar_clubes;
use modelo\gestionar_atleta;
use modelo\medico_atleta;

class modificar_informacion_medicaTest extends TestCase{
    private $atleta;
    private $clubes;
    private $medico;
    protected static $pdo;
    

    public static function setUpBeforeClass():void {
        try {
            $host = 'mysql:host=localhost;dbname=bdmma';
            self::$pdo = new PDO($host, 'root', '');
        } catch (\Exception $e) {
            $this->markTestSkipped('MySQL: No se pudo conectar a la base de datos.');
        }
    }

    public function setUp():void{
        
        $this->atleta = new gestionar_atleta();
        $this->clubes = new gestionar_clubes();
        $this->medico = new medico_atleta();
        
        $this->clubes->set_codigo_club('asdfgh');
        $this->clubes->set_nombre_club('aguilas luchadores 2023');
        $this->clubes->set_telefono_club('04131234567');
        $this->clubes->set_deporte_club('karate');
        $this->clubes->set_direccion_club('barquisimeto');

        $this->clubes->registrar('1','29831184','1');

        $id_club = self::$pdo->query('SELECT  id from clubes where codigo="asdfgh"')->fetch(\PDO::FETCH_ASSOC)['id']; 

        $this->atleta->set_club_atleta($id_club);
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

        $this->atleta->registrar('1','29831184','3');

        $id_atleta = self::$pdo->query('SELECT  id from atletas where cedula="3345123"')->fetch(\PDO::FETCH_ASSOC)['id']; 
        
        $this->medico->set_nombre_atleta($id_atleta);
        $this->medico->set_medicamento_atleta('diclofenac');
        $this->medico->set_enfermedad_atleta('artritis');

        $this->medico->set_discapacidad_atleta('ninguna');
        $this->medico->set_dieta_atleta('carga de proteinas');

        $this->medico->set_enfermedades_pasadas('cirugias pasadas');
        $this->medico->set_nombre_parentesco('julio vargas');

        $this->medico->set_telefono_parentesco('04163789843');
        $this->medico->set_relacion_parentesco('familiar');

        $this->medico->registrar('1','29831184','4');
        
    }

    public function tearDown():void {
        $id_atleta = self::$pdo->query('SELECT  id from atletas where cedula="3345123"')->fetch(\PDO::FETCH_ASSOC)['id']; 
        
        $this->medico->set_nombre_atleta($id_atleta);
        $this->medico->eliminar('29831184','4','1');

        $this->atleta->set_cedula_atleta('3345123');
        $this->atleta->eliminar('29831184','3','1'); 

        $this->clubes->set_codigo_club('asdfgh');
        $this->clubes->eliminar('29831184','1','1');
    }

    public function testModificarMedicoAtleta(){

        $id_atleta = self::$pdo->query('SELECT  id from atletas where cedula="3345123"')->fetch(\PDO::FETCH_ASSOC)['id']; 
        
        $this->medico->set_nombre_atleta($id_atleta);
        $this->medico->set_medicamento_atleta('diclofenac,loratadina');
        $this->medico->set_enfermedad_atleta('artritis');

        $this->medico->set_discapacidad_atleta('ninguna');
        $this->medico->set_dieta_atleta('planificacion alimenticia a base de carbohidratos');

        $this->medico->set_enfermedades_pasadas('cirugias pasadas');
        $this->medico->set_nombre_parentesco('julio vargas');

        $this->medico->set_telefono_parentesco('04146782343');
        $this->medico->set_relacion_parentesco('familiar');

        $this->medico->registrar('1','29831184','4');
       
        $modificar = $this->medico->modificar('1','29831184','4');

        $this->assertStringStartsWith('<tr>', $modificar);
    }
}

?>