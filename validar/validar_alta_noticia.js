///////////////////////////////////////////////////////

function validar(form)
{
   var campo=document.getElementById("titulo");
   var msg="Por favor escribe el TITULO";

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
