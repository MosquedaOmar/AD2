<?php

class homeModel {
    private $PDO;
    
    public function __construct() {
        require_once("./config/db.php");
        $pdo = new db();
        $this->PDO = $pdo->conexion();
    }

    public function agregarNuevoUsuario($usuario, $contrasena) {
        $statement = $this->PDO->prepare("INSERT INTO invitados (usuario, contrasena) VALUES (:usuario, :contrasena)");
        $statement->bindParam(":usuario", $usuario);
        $statement->bindParam(":contrasena", $contrasena);
        return ($statement->execute()) ? true : false;
    }
}
