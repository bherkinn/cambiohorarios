<?php
// ---------------------------------------------------PRINCIPALES-----------------------------------------------------
Class Conexion
{
    
    protected $con1;
    protected $con2;
    protected $host = "localhost";
    protected $db1 = "horariosfim";
    protected $db2 = "oeraae2018";
    protected $usu = "root";
    protected $pass = "";
    protected $memoria;
    
    public function Conexion()
    {
        
    }
    
    public function Open($num)
    {
        $this->Conectar($num);
    }
    
    
    protected function Conectar($num)
    {
        
        if ($num == 1) {
            try {
                
                $this->con1 = new PDO("mysql:host=$this->host;dbname=$this->db1", $this->usu, $this->pass);
                $this->con1->exec("SET CHARACTER SET UTF8");
            }
            catch (Exception $e) {
                
                echo "Error" . $e->getMessage();
            }
            
        } else if ($num == 2) {
            
            try {
                
                $this->con2 = new PDO("mysql:host=$this->host;dbname=$this->db2", $this->usu, $this->pass);
                $this->con2->exec("SET CHARACTER SET UTF8");
            }
            catch (Exception $e) {
                
                echo "Error" . $e->getMessage();
            }
        } else {
            echo "error";
        }
        
    }
    
    public function Close($num)
    {
        
        $this->memoria->closeCursor();
        $this->memoria = null;
        
        if ($num == 1) {
            $this->con1 = null;
            
        } else if ($num == 2) {
            $this->con2 = null;
            
        } else {
            
        }
        
    }
    
    // -------------------------------------------------MODIFICADORES DE DATOS---------------------------------------------------
    
    public function InsertarDatos($datos)
    {
        try {
            
            $this->Conectar(1);
            $this->con1->query("INSERT INTO basehorarios (dia,hora,codCurso,secCurso,teopra,codAula,codDocente,c1,c2,c3,c4,c5,c6,c7,c8,c9,c10,perAcademico,orden,codAula2) VALUES ('$datos[0]','$datos[1]','$datos[2]','$datos[3]','$datos[4]','$datos[5]','$datos[6]','$datos[7]','$datos[8]','$datos[9]','$datos[10]','$datos[11]','$datos[12]','$datos[13]','$datos[14]','$datos[15]','$datos[16]','$datos[17]','$datos[18]','$datos[19]')");
            // $this->Close(1);
            
        }
        catch (Exception $e) {
            
            echo "error" . $e->getMessage();
            
        }
        
        
    }
    
    public function ActualizarDatos($datos)
    {
        try {
            
            $this->Conectar(1);
            $this->con1->query("UPDATE basehorarios SET  dia='$datos[0]',hora='$datos[1]',codCurso='$datos[2]',secCurso='$datos[3]',teopra='$datos[4]',codAula='$datos[5]',codDocente='$datos[6]',c1='$datos[7]',c2='$datos[8]',c3='$datos[9]',c4='$datos[10]',c5='$datos[11]',c6='$datos[12]',c7='$datos[13]',c8='$datos[14]',c9='$datos[15]',c10='$datos[16]',orden=$datos[18],codAula2='$datos[19]' WHERE idHorarios='$datos[17]'");
            
        }
        catch (Exception $e) {
            
            echo "error" . $e->getMessage();
            
        }
        
    }
    
    public function Borrar($id,$estado)
    {
        $this->Conectar(1);
        $this->con1->query("UPDATE basehorarios SET estado=$estado WHERE idHorarios=$id");
    }

    public function modificarCursoTablaHorarios($id,$codCurso){
        $this->Conectar(1);
        $this->con1->query("UPDATE basehorarios SET codCurso='$codCurso' WHERE idHorarios=$id");

    }

    public function modificarCursoTotalTablaHorarios($periodo,$codCurso,$codCursoNuevo){
        $this->Conectar(1);
        $this->con1->query("UPDATE basehorarios SET codCurso='$codCursoNuevo' WHERE perAcademico='$periodo' and codCurso='$codCurso'");

    }

    public function NuevoPeriodo($anteperiodo,$neoperiodo){
    	$this->Open(1);
        $this->con1->query("CREATE TEMPORARY TABLE temporal AS SELECT * FROM basehorarios WHERE perAcademico='$anteperiodo';
							UPDATE temporal SET perAcademico='$neoperiodo';
							ALTER TABLE temporal DROP COLUMN idHorarios;
							INSERT into basehorarios (perAcademico,dia,hora,codCurso,secCurso,teopra,codAula,codAula2,codDocente,orden,c1,c2,c3,c4,c5,c6,c7,c8,c9,c10,estado,fecha) SELECT * from temporal;");
    }

    public function agregarPeriodoPorCurricula($periodo,$curricula){

        $sql="INSERT INTO curricula VALUES ('$periodo','$curricula')";
        $this->Open(1);
        $this->con1->query($sql);
    }

    public function BorrarPorCurso($codCurso,$periodo){

        $sql="UPDATE basehorarios SET estado=0 WHERE codCurso='$codCurso' AND perAcademico='$periodo'";
        $this->Conectar(1);
        $this->con1->query($sql);

    }

    
    // ----------------------------------------------------VISUALIZAR DATOS-----------------------------------------------------
    
    public function Mostrar($tabla, $orden, $num)
    {
        
        if ($num == 1) {
            $this->Open(1);
            $this->memoria = $this->con1->query("SELECT * FROM $tabla ORDER BY $orden");
            $datos         = $this->memoria->fetchAll(PDO::FETCH_OBJ);
            $this->Close(1);
            
            return $datos;
        } else if ($num == 2) {
            $this->Open(2);
            $this->memoria = $this->con2->query("SELECT * FROM $tabla ORDER BY $orden");
            $datos         = $this->memoria->fetchAll(PDO::FETCH_OBJ);
            $this->Close(2);
            
            return $datos;
        } else {
            echo "Error";
        }
        
    }

     public function mostrarAulas(){
        $this->Open(2);
        $this->memoria = $this->con2->query("SELECT aula FROM aulas");
        $datos         = $this->memoria->fetchAll(PDO::FETCH_OBJ);
        $this->Close(2);
        
        return $datos;
     }

     public function mostrarPeriodos(){

        $sql = "SELECT * FROM curricula ORDER BY perAcademico DESC";
        $this->Conectar(1);
        $this->memoria = $this->con1->query($sql);
        if (!empty($this->memoria)) {
            $datos = $this->memoria->fetchAll(PDO::FETCH_OBJ);
            $this->Close(1);

            return $datos;

        } else {
            
            return "vacio";
            
        }
    }


    public function mostrarVerCurricular()
    {
        $sql = "SELECT DISTINCT verCurricular FROM curricular";
        $this->Conectar(2);
        $this->memoria = $this->con2->query($sql);
        if (!empty($this->memoria)) {
            $datos = $this->memoria->fetchAll(PDO::FETCH_OBJ);
            $this->Close(2);

            return $datos;

        } else {
            
            return "vacio";
            
        }
    }

    public function mostrarVerCurricularTabla()
    {
        $sql = "SELECT DISTINCT verCurricular FROM curricular";
        $this->Conectar(2);
        $this->memoria = $this->con2->query($sql);
        if (!empty($this->memoria)) {
            $datos = $this->memoria->fetchAll(PDO::FETCH_OBJ);
            $this->Close(2);

            return $datos;

        } else {
            
            return "vacio";
            
        }
    }

    public function mostrarCursosPorPeriodo($vercurricular){

        $sql="SELECT DISTINCT codCurso FROM curricular WHERE verCurricular='$vercurricular'";
         $this->Conectar(2);
        $this->memoria = $this->con2->query($sql);
        if (!empty($this->memoria)) {
            $datos = $this->memoria->fetchAll(PDO::FETCH_OBJ);
            $this->Close(2);

            return $datos;

        } else {
            
            return "vacio";
            
        }
    }
    
    public function cboCursos()
    {
        
        $this->conectar(2);
        $this->memoria = $this->con2->query("SELECT DISTINCT curricular.codCurso,cursos.nomCurso FROM curricular LEFT JOIN cursos on curricular.codCurso=cursos.codCurso ORDER BY curricular.codCurso");
        $datos= $this->memoria->fetchAll(PDO::FETCH_OBJ);
        $this->Close(2);
        return $datos;
    }

    public function cboDocentes()
    {
        
        $this->conectar(2);
        $this->memoria = $this->con2->query("SELECT codDocente,apePaterno,apeMaterno,nombres from docentes");
        $datos= $this->memoria->fetchAll(PDO::FETCH_OBJ);
        $this->Close(2);
        return $datos;
    }
    
    public function Cargas($curso, $ciclo, $estado)
    {
        
        $this->conectar(1);
        
        $sql = "SELECT * FROM basehorarios WHERE codCurso='$curso' and perAcademico='$ciclo' and estado=$estado ORDER BY orden,idHorarios;";
        
        $this->memoria = $this->con1->query($sql);
        
        if (!empty($this->memoria)) {
            $datos = $this->memoria->fetchAll(PDO::FETCH_OBJ);
            $this->Close(1);
            
            return $datos;
        } else {
            
            return "vacio";
            
        }
        
        
    }

    public function Recuperar(){
        $this->conectar(1);
        
        $sql = "SELECT * FROM basehorarios WHERE estado=0 ORDER BY fecha DESC";
        
        $this->memoria = $this->con1->query($sql);
        
        if (!empty($this->memoria)) {
            $datos = $this->memoria->fetchAll(PDO::FETCH_OBJ);
            $this->Close(1);
            
            return $datos;
        } else {
            
            return "vacio";
            
        }
    }
    
    public function MostrarDatosFila($fila)
    {
        try {
            $this->Conectar(1);
            $this->memoria = $this->con1->query("SELECT * FROM basehorarios where idHorarios=$fila");
            
            $datos = $this->memoria->fetchAll(PDO::FETCH_OBJ);
            $this->Close(1);
            
            return $datos;
        }
        catch (Exception $e) {
            echo "error " . $e->getMessage();
        }
    }
    
    public function mostrarDocente($id)
    {
        try {
            $this->Conectar(2);
            $this->memoria = $this->con2->query("SELECT * FROM docentes where codDocente=$id");
            $datos         = $this->memoria->fetchAll(PDO::FETCH_OBJ);
            $this->Close(2);
            
            return $datos;
        }
        catch (Exception $e) {
            echo "error " . $e->getMessage();
        }
    }
    
    // -------------------------------------------VISUALIZAR HORARIOS TABLAS SOCCKETS-----------------------------------------

    public function HorarioDocente($codDocente,$periodo)
    {
        try {
            $this->Conectar(1);
            $this->memoria = $this->con1->query("SELECT horariosfim.basehorarios.*,oeraae2018.docentes.apePaterno,oeraae2018.docentes.celular,oeraae2018.docentes.telefono,oeraae2018.docentes.apeMaterno,oeraae2018.docentes.nombres from horariosfim.basehorarios INNER JOIN oeraae2018.docentes ON horariosfim.basehorarios.codDocente=oeraae2018.docentes.codDocente WHERE horariosfim.basehorarios.codDocente=$codDocente AND horariosfim.basehorarios.perAcademico='$periodo' AND horariosfim.basehorarios.estado=1");
            $datos= $this->memoria->fetchAll(PDO::FETCH_OBJ);
            $this->Close(1);
            return $datos;
        }
        catch (Exception $a) {
            echo "error" . $a->getMessage();
        }
    }
    
    public function HorarioAula($codAula,$periodo)
    {
        try {
            $this->Conectar(1);
            $this->memoria = $this->con1->query("SELECT horariosfim.basehorarios.*,oeraae2018.aulas.capacidad,oeraae2018.aulas.pizarra,oeraae2018.aulas.taburete,oeraae2018.docentes.apePaterno,oeraae2018.docentes.apeMaterno,oeraae2018.docentes.nombres from horariosfim.basehorarios INNER JOIN oeraae2018.aulas ON horariosfim.basehorarios.codAula=oeraae2018.aulas.aula INNER JOIN oeraae2018.docentes ON horariosfim.basehorarios.codDocente=oeraae2018.docentes.codDocente WHERE horariosfim.basehorarios.codAula='$codAula' AND horariosfim.basehorarios.perAcademico='$periodo' AND horariosfim.basehorarios.estado=1");
            
            $datos = $this->memoria->fetchAll(PDO::FETCH_OBJ);
            $this->Close(1);
            return $datos;
        }
        catch (Exception $a) {
            echo "error" . $a->getMessage();
        }
    }
    
    // public function HorarioCurso($codCurso,$periodo)
    // {
    //     try{
    //         $this->Conectar(1);
    //         $this->memoria=$this->con1->query("SELECT horariosfim.basehorarios.*,oeraae2018.aulas.capacidad,oeraae2018.aulas.pizarra,oeraae2018.aulas.taburete,oeraae2018.docentes.apePaterno,oeraae2018.docentes.apeMaterno,oeraae2018.docentes.nombres,oeraae2018.cursos.nomCurso from horariosfim.basehorarios INNER JOIN oeraae2018.aulas ON horariosfim.basehorarios.codAula=oeraae2018.aulas.aula INNER JOIN oeraae2018.docentes ON horariosfim.basehorarios.codDocente=oeraae2018.docentes.codDocente INNER JOIN oeraae2018.cursos ON horariosfim.basehorarios.codCurso=oeraae2018.cursos.codCurso WHERE horariosfim.basehorarios.codCurso='$codCurso' AND horariosfim.basehorarios.perAcademico='$periodo'");
    
    //         $datos=$this->memoria->fetchAll(PDO::FETCH_OBJ);
    //         $this->Close(1);
    //         return $datos;
    //     }
    //     catch(Exception $a){
    //         echo "error".$a->getMessage();
    //     }
    // }
    
    public function HorarioCurso($codCurso,$periodo)
    {
        try {
            $this->Conectar(1);
            $this->memoria = $this->con1->query("SELECT horariosfim.basehorarios.*,oeraae2018.docentes.apePaterno,oeraae2018.docentes.apeMaterno,oeraae2018.docentes.nombres,oeraae2018.cursos.nomCurso from horariosfim.basehorarios INNER JOIN oeraae2018.docentes ON horariosfim.basehorarios.codDocente=oeraae2018.docentes.codDocente INNER JOIN oeraae2018.cursos ON horariosfim.basehorarios.codCurso=oeraae2018.cursos.codCurso WHERE horariosfim.basehorarios.codCurso='$codCurso' AND horariosfim.basehorarios.perAcademico='$periodo' AND horariosfim.basehorarios.estado=1");
            
            $datos = $this->memoria->fetchAll(PDO::FETCH_OBJ);
            $this->Close(1);
            return $datos;
        }
        catch (Exception $a) {
            echo "error" . $a->getMessage();
        }
    }
    
    public function Modulos($ciclo,$grupo,$periodo)
    {
        try {
            $this->Conectar(1);
            $this->memoria = $this->con1->query("SELECT horariosfim.basehorarios.*,oeraae2018.aulas.capacidad,oeraae2018.aulas.pizarra,oeraae2018.aulas.taburete,oeraae2018.docentes.apePaterno,oeraae2018.docentes.apeMaterno,oeraae2018.docentes.nombres from horariosfim.basehorarios INNER JOIN oeraae2018.aulas ON horariosfim.basehorarios.codAula=oeraae2018.aulas.aula INNER JOIN oeraae2018.docentes ON horariosfim.basehorarios.codDocente=oeraae2018.docentes.codDocente WHERE horariosfim.basehorarios." . $ciclo . " LIKE '%" . $grupo . "%' AND horariosfim.basehorarios.perAcademico='$periodo' AND horariosfim.basehorarios.estado=1");
            
            $datos = $this->memoria->fetchAll(PDO::FETCH_OBJ);
            $this->Close(1);
            return $datos;
        }
        catch (Exception $a) {
            echo "error" . $a->getMessage();
        }
    }
    
    
    
    
}
?>
