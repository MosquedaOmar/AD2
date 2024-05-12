<?php

   // Se registra una función anónima como autoloader utilizando spl_autoload_register
   spl_autoload_register(function($clase){

       // Se construye la ruta al archivo de la clase utilizando __DIR__ y el nombre de la clase
       $archivo=__DIR__."/".$clase.".php";

       // Se reemplazan las barras invertidas por barras normales en la ruta (para compatibilidad con Windows)
       $archivo=str_replace("\\","/",$archivo);

       // Se verifica si el archivo de la clase existe
       if(is_file($archivo)){
            // Si el archivo existe, se requiere una vez (se incluye)
            require_once $archivo;
       }

    });

?>
