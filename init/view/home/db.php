<?php
     
class db {
    private $host = "localhost";
    private $dbname = "database";
    private $user = "root";
    private $pass = "";

    public function conexion() {
        try {
            $pdo = new PDO("mysql:host=".$this->host.";dbname=".$this->dbname, $this->user, $this->pass);
            return $pdo;
        } catch (PDOException $e) {
            // Si hay un error en la conexión, puedes manejarlo aquí
            return $e->getMessage();
        }
    }
}
?>
