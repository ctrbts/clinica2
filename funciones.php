<?php


///////////////////////////////////////////////////////////////////////////////


function redirigir($url_relativa)
{
  return header("Location: http://".$_SERVER['HTTP_HOST'].rtrim(dirname($_SERVER['PHP_SELF']), '/\\')."/$url_relativa");
}

///////////////////////////////////////////////////////////////////////////////

 function conectar_admin()
	 {
	   $user = "soporte";
	   $pass = "laseraleer";
	   $link=mysql_connect("localhost", $user, $pass);
	   mysql_select_db("clinica", $link)OR DIE("Error imposible conectar");
	   
	   return $link;
	  }

///////////////////////////////////////////////////////////////////////////////

 function conectar_usuario()
	 {
	   $user = "soporte";
	   $pass = "laseraleer";
	   $link=mysql_connect("localhost", $user, $pass);
	   mysql_select_db("clinica", $link)OR DIE("Error imposible conectar");
	   
	   return $link;
	  }

///////////////////////////////////////////////////////////////////////////////

function desconectar(){ mysql_close(); }

///////////////////////////////////////////////////////////////////////////////
 function conectar_base()
	 {
	   $user = "clinica";
	   $pass = "123456";
	   $link=mysql_connect("localhost", $user, $pass);
	   mysql_select_db("sumar", $link)OR DIE("Error imposible conectar");
	   
	   return $link;
	  }
///////////////////////////////////////////////////////////////////////////////

   function mostrarMensaje($msg,$volver)
   {
	  require_once("manejo_de_vs.php");

	//$volver es la pagina a la que queremos q regrese una vez informado el mensaje
    
	//$msgError es el mensaje a mostrar
    
	set_vs('url_volver',$volver);
    set_vs('msg_url_volver',$msg);

	redirigir('ingresar.php');//esta en funciones.php
   }
///////////////////////////////////////////////////////////////////////////////
?>