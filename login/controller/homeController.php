<?php
    // Define una clase llamada homeController.
    class homeController {
        // Declaración de una propiedad privada $MODEL.
        private $MODEL;

        // Constructor de la clase.
        public function __construct() {
            // Requiere el archivo homeModel.php para incluir la clase homeModel.
            require_once("c://xampp/htdocs/login/model/homeModel.php");
            // Instancia un nuevo objeto de la clase homeModel y lo asigna a la propiedad $MODEL.
            $this->MODEL = new homeModel();
        }

        // Método para guardar un nuevo usuario.
        public function guardarUsuario($correo, $contraseña, $nombre, $apellido, $dni, $telefono, $fechaNacimiento, $usuario) {
            // Llama al método agregarNuevoUsuario del modelo, después de limpiar y encriptar los datos.
            $valor = $this->MODEL->agregarNuevoUsuario(
                $this->limpiarcorreo($correo),
                $this->encriptarcontraseña($this->limpiarcadena($contraseña)),
                $this->limpiarcadena($nombre),
                $this->limpiarcadena($apellido),
                $this->limpiarcadena($dni),
                $this->limpiarcadena($telefono),
                $fechaNacimiento,
                $this->limpiarcadena($usuario)
            );
            // Retorna el valor obtenido del método del modelo.
            return $valor;
        }

        // Método para limpiar una cadena de caracteres (general).
        public function limpiarcadena($campo) {
            // Elimina las etiquetas HTML y PHP de la cadena.
            $campo = strip_tags($campo);
            // Filtra la cadena utilizando FILTER_UNSAFE_RAW (no realiza sanitización).
            $campo = filter_var($campo, FILTER_UNSAFE_RAW);
            // Convierte caracteres especiales en entidades HTML.
            $campo = htmlspecialchars($campo);
            // Retorna la cadena limpia.
            return $campo;
        }

        // Método para limpiar una dirección de correo electrónico.
        public function limpiarcorreo($campo) {
            // Elimina las etiquetas HTML y PHP de la cadena.
            $campo = strip_tags($campo);
            // Filtra la cadena para asegurar que es una dirección de correo válida.
            $campo = filter_var($campo, FILTER_SANITIZE_EMAIL);
            // Convierte caracteres especiales en entidades HTML.
            $campo = htmlspecialchars($campo);
            // Retorna el correo electrónico limpio.
            return $campo;
        }

        // Método para encriptar una contraseña.
        public function encriptarcontraseña($contraseña) {
            // Encripta la contraseña usando el algoritmo PASSWORD_DEFAULT.
            return password_hash($contraseña, PASSWORD_DEFAULT);
        }

        // Método para verificar un usuario.
        public function verificarusuario($usuario, $contraseña) {
            // Obtiene la clave encriptada almacenada en la base de datos para el correo proporcionado.
            $keydb = $this->MODEL->obtenerclave($usuario);
            // Verifica si la contraseña proporcionada coincide con la clave encriptada almacenada.
            return (password_verify($contraseña, $keydb)) ? true : false;
        }

        public function verificarAdmin($admin_users, $admin_passwords) {
            // Obtiene la clave encriptada almacenada en la base de datos para el correo proporcionado.
            $keydb = $this->MODEL->obtenerclaveAdmin($admin_users);
            // Verifica si la contraseña proporcionada coincide con la clave encriptada almacenada.
            return (password_verify($admin_passwords, $keydb)) ? true : false;
        }
        
    }
?>
