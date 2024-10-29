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

function validarBono(form)
{
   var campo=document.getElementById("bono");
   var campo2=document.getElementById("asignatura");
   
   var msg="Por favor ingrese el numero de bono";
   var msg2="Por favor escriba la asignatura que desea cambiar";
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

function validarBono(form)
{
   var campo=document.getElementById("datepicker6");
  // var campo2=document.getElementById("asignatura");
   
   var msg="Por favor clickear la fecha del calendario";
   //var msg2="Por favor clickea";
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
function validarBonoAnulado(form)
{
   var campo=document.getElementById("bono");
   
   var msg="Por favor ingrese el numero de bono";
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
function validarModificacion(form)
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
}
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

////////////////////////////////////////////////////////////
function noValidar(form)
{
	form.submit()		
}