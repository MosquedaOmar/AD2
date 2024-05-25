<?php
$password = '12';
$password_encriptada = password_hash($password, PASSWORD_DEFAULT);
echo $password_encriptada;
?>