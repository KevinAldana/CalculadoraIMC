<?php 
// require_once('../Conexion/Conexion.php');

class Registro extends Conexion{

    function __construct(){

        parent::__construct();

    }
    public function insertarDatos(float $peso, float $altura, float $imc, string $estado){
        $query= "INSERT INTO usuario(peso_usuario, altura_usuario, imc_usuario, estado_usuario) VALUES (?,?,?,?)";
        $prepare = $this->conection()->prepare($query);
        $arrData = [$peso,$altura,$imc,$estado];
        $result = $prepare->execute($arrData);
        $id = $this->conection()->lastInsertId();
        return $id;

    }
    public function obtenerRegistros(){
        $query="SELECT peso_usuario, altura_usuario, imc_usuario FROM usuario ORDER BY imc_usuario DESC";
        $result = $this->conection()->query($query)->fetchAll(PDO::FETCH_OBJ);
        if (count($result)>0){
            return $result;
        } else {
            return "No hay datos";
        }
    }
    
}
?>