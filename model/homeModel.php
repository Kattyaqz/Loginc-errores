<?php
class homeModel {
    private $PDO;

    public function __construct() {
        require_once("c://xampp/htdocs/login_con_errores/config/db.php");
        $pdo = new db();
        $this->PDO = $pdo->conexion();
    }

    public function agregarNuevoUsuario($correo, $password, $rut) {
        $statement = $this->PDO->prepare("INSERT INTO usuario VALUES (null, :correo, :password, :rut)");
        $statement->bindParam(":correo", $correo);
        $statement->bindParam(":password", $password);
        $statement->bindParam(":rut", $rut);

        try {
            $statement->execute();
            return true;
        } catch (PDOException $e) {
            return false;
        }
    }

    public function obtenerclave($correo) {
        $statement = $this->PDO->prepare("SELECT password FROM usuario WHERE correo = :correo");
        $statement->bindParam(":correo", $correo);
        return ($statement->execute()) ? $statement->fetch()['password'] : false;
    }
}
?>
