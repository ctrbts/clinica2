<?php

  require_once("funciones.php");

  session_start();

  session_destroy();
	$url="index.php";
  //el usuario no esta logueado
 // mostrarMensaje("SU SESION HA SIDO CERRADA","login.php"); //esta en funciones.php
	redirigir($url);
 //hay que hacer exit porque la redireccion fue un proceso y no el comando redirect. Cuando termina con la subrutina vuelve por acá
 exit(1);

 ?>