<?php
require_once ('c://xampp/htdocs/login/config/db.php'); // Incluye el archivo de la clase db

if (isset($_GET['q'])) {
    $search = $_GET['q'];
    try {
        // Instanciamos la clase db
        $database = new db();
        
        // Conexión a la base de datos
        $conn = $database->conexion();

        // Consulta SQL para buscar usuarios
        $sql = "SELECT u.*, a.Estado_Afiliacion FROM usuarios u 
                LEFT JOIN Afiliados a ON u.id = a.id 
                WHERE u.nombre LIKE :search 
                OR u.apellido LIKE :search 
                OR u.dni LIKE :search 
                OR u.correo LIKE :search 
                OR u.usuario LIKE :search";
        $stmt = $conn->prepare($sql);
        $stmt->bindValue(':search', '%' . $search . '%', PDO::PARAM_STR);
        $stmt->execute();
        $usuarios = $stmt->fetchAll(PDO::FETCH_ASSOC);

        if ($usuarios) {
            foreach ($usuarios as $usuario) {
                echo "<tr>
                        <td>{$usuario['correo']}</td>
                        <td>{$usuario['nombre']}</td>
                        <td>{$usuario['apellido']}</td>
                        <td>{$usuario['telefono']}</td>
                        <td>{$usuario['usuario']}</td>
                        <td>{$usuario['Estado_Afiliacion']}</td>
                        <td>
                            <form action='/login/view/home/afiliado.php' method='post'>
                                <input type='hidden' name='id_usuario' value='{$usuario['id']}'>
                                <select name='estado_afiliacion'>
                                    <option value='Activo'>Activo</option>
                                    <option value='Inactivo'>Inactivo</option>
                                </select>
                                <button type='submit'>Actualizar</button>
                            </form>
                        </td>
                    </tr>";
            }
        } else {
            echo "<tr><td colspan='10'>No se encontraron usuarios</td></tr>";
        }
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}
