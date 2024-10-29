
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