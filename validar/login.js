
///////////////////////////////////////////////////////

function validar_campo_no_vacio(campo,msg)
{
 var dev=true;
 if (campo.value == "") 
   {
    campo.focus();
	alert(msg);
    dev=false;
   }
 return dev;
}

///////////////////////////////////////////////////////
///////////////////////////////////////////////////////

function validar_acceso(form)
{
   var campo=document.getElementById("username");
   var msg="Por favor escribe tu nombre de usuario en el primer casillero";

   var campo2=document.getElementById("clave");
   var msg2="Por favor ingrese su clave en el segundo casillero";

   if (validar_campo_no_vacio(campo,msg) && validar_campo_no_vacio(campo2,msg2)) 
     {
      form.submit()
	 }
   else
     {
      return false;
     }
}

///////////////////////////////////////////////////////
