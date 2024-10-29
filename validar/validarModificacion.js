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

function validarModificacion(form)
{
   var campo=document.getElementById("usuario");
   var campo2=document.getElementById("clave");
   var msg="Por favor ingrese el usuario";
   var msg2="Por favor escribe la clave";
   
   if (validar_campo_no_vacio(campo,msg)) 
     {
		if (validar_campo_no_vacio(campo2,msg2)){
								form.submit()		
		} 
	}
   else
     {
      return false;
     }
}

///////////////////////////////////////////////////////
function validarcodigo(form)
{
   var campo=document.getElementById("cbarras");
   var msg="Por favor ingrese el codigo de barras";

   if (validar_campo_no_vacio(campo,msg)) 
     {
		form.submit()		
					  
	 }
   else
     {
      return false;
     }
}
////////////////////////////////////////////////////////////
/*function validarModificacion(form)
{
   var campo=document.getElementById("cbarras");
   var campo2=document.getElementById("producto");
   var campo3=document.getElementById("cant");
   var campo4=document.getElementById("precio");
   var msg="Por favor ingrese el codigo de barras";
   var msg2="Por favor escribe el producto";
   var msg3="Por favor escribe la cantidad de producto";
   var msg4="Por favor ingrese el precio";

   if (validar_campo_no_vacio(campo,msg)) 
     {
		if (validar_campo_no_vacio(campo2,msg2)){
				if (validar_campo_no_vacio(campo3,msg3)){
						if (validar_campo_no_vacio(campo4,msg4)){
								form.submit()		
							} 

					} 

			} 
		 
    				  
	 }
   else
     {
      return false;
     }
}*/
///////////////////////////////////////////////////////
function validarcarga(form)
{

   var campo2=document.getElementById("cant");
   var msg2="Por favor ingrese la cantidad de producto a cargar";
   if (validar_campo_no_vacio(campo2,msg2)) 
     {
							form.submit()		
	 }
   else
     {
      return false;
     }
}

/////////////////////////////////////////////////////////////
function noValidar(form)
{
	form.submit()		
}