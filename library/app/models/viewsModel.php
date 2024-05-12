<?php

    // Declaración del espacio de nombres para la clase viewsModel
    namespace app\models;

    // Declaración de la clase viewsModel
    class viewsModel{
        
        // Método protegido para obtener la vista correspondiente
        protected function obtenerVistasModelo($vista){

             // Lista de vistas permitidas
             $listaBlanca=["dashboard", "register"];

             // Verifica si la vista está en la lista blanca
             if(in_array($vista,$listaBlanca)){
                // Si la vista está en la lista blanca, verifica si existe el archivo correspondiente
                if(is_file("./app/views/content/".$vista."-view.php")){
                    // Si el archivo existe, se asigna su ruta a la variable $contenido
                    $contenido="./app/views/content/".$vista."-view.php";

                }else{
                    // Si el archivo no existe, se asigna "404" a la variable $contenido
                     $contenido="404";
                }

             // Si la vista no está en la lista blanca
             }elseif($vista=="login" || $vista=="index"){
                // Si la vista es "login" o "index", se asigna "login" a la variable $contenido
                $contenido="login";

             }else{
                // Si la vista no está permitida o no es reconocida, se asigna "404" a la variable $contenido
                $contenido="404";
             }

             // Se devuelve la ruta del archivo de la vista
             return $contenido;
        }
    }

?>
