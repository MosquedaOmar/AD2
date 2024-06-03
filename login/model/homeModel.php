<?php
    class homeModel{
        private $PDO;
        public function __construct()
        {
            require_once("c://xampp/htdocs/login/config/db.php");
            $pdo = new db();
            $this->PDO = $pdo->conexion();
        }
        public function agregarNuevoUsuario($correo, $password, $nombre, $apellido, $dni, $telefono, $fechaNacimiento, $usuario) {
            $statement = $this->PDO->prepare("INSERT INTO usuarios (correo, password, nombre, apellido, dni, telefono, fecha_nacimiento, usuario) VALUES (:correo, :password, :nombre, :apellido, :dni, :telefono, :fecha_nacimiento, :usuario)");
            $statement->bindParam(":correo", $correo);
            $statement->bindParam(":password", $password);
            $statement->bindParam(":nombre", $nombre);
            $statement->bindParam(":apellido", $apellido);
            $statement->bindParam(":dni", $dni);
            $statement->bindParam(":telefono", $telefono);
            $statement->bindParam(":fecha_nacimiento", $fechaNacimiento);
            $statement->bindParam(":usuario", $usuario);
            try {
                $statement->execute();
                return true;
            } catch (PDOException $e) {
                return false;
            }
        }
        public function obtenerclave($usuario){
            $statement = $this->PDO->prepare("SELECT password FROM usuarios WHERE usuario = :usuarios");
            $statement->bindParam(":usuarios",$usuario);
            return ($statement->execute()) ? $statement->fetch()['password'] : false;
        }

        public function obtenerclaveAdmin($admin_users){
            $statement = $this->PDO->prepare("SELECT password FROM administradores WHERE usuario = :administrador");
            $statement->bindParam(":administrador",$admin_users);
            return ($statement->execute()) ? $statement->fetch()['password'] : false;
        }
    }

?>