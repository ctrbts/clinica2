///////////////////////////////////////////////////////

function validar_acceso(form)
{
   var campo=document.getElementById("clave");
   var msg="Por favor escribe la clave de acceso, no puede estar en blanco";

   if (validar_campo_no_vacio(campo,msg)) 
     {
      form.submit()
	 }
   else
     {
      return false;
     }
}

///////////////////////////////////////////////////////
