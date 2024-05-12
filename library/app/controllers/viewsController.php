<?php

   // Declaración del espacio de nombres para la clase viewsController
   namespace app\controllers;
   
   // Importación de la clase viewsModel desde el espacio de nombres app\models
   use app\models\viewsModel;

   // Declaración de la clase viewsController, que extiende viewsModel
   class viewsController extends viewsModel{
    
    // Definición del método obtenerVistasControlador que recibe un parámetro $vista
    public function obtenerVistasControlador($vista){
        
        // Comprobación si $vista no está vacío
        if($vista!=""){
            
            // Si $vista no está vacío, se llama al método obtenerVistasModelo de la clase padre
            $respuesta=$this->obtenerVistasModelo($vista);

        }else{
            // Si $vista está vacío, se asigna "login" a la variable $respuesta
            $respuesta="login";
        }
        
        // Se devuelve el valor de $respuesta
        return $respuesta;
    }

   }
?>
