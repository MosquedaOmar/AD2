<?php
$password = '123';
$password_encriptada = password_hash($password, PASSWORD_DEFAULT);
echo $password_encriptada;
?>