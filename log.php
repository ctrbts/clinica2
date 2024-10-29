<?php

include("funciones.php");

/////////////////////////////////////////////////////////////////////////////

session_start();

////////////////////////////////////////////////////////////////////////////	
$usuario = $_POST['username'];
$clave = $_POST['clave'];
$db = conectar_admin();

$sql = "SELECT * FROM usuario WHERE  usuario='$usuario' and clave='$clave'";
// Ejecutar Consulta
$result = mysql_query($sql);

if ((mysql_num_rows($result) == 0)) {
	//el usuario no existe o hay un error tanto en el usuario o la clave

	mysql_query("COMMIT");

	$url_relativa = "loguearUsuario.php?valor=0";
	redirigir($url_relativa);
	//desconectamos la BD
	desconectar();

	exit();
} else {
	$fila = mysql_fetch_assoc($result);
	$_SESSION['usuario'] = $usuario;
	$_SESSION['clave'] = $fila["clave"];
	$_SESSION['idUsuario'] = $fila["idUsuario"];
	$_SESSION['privilegio'] = $fila["privilegio"];
	$idUsuario = $fila["idUsuario"];

	//desconectamos la BD
	desconectar();

	$url_relativa = "ingresar.php?idusu=$idUsuario";

	redirigir($url_relativa);  //esta en funciones.php
}

?>