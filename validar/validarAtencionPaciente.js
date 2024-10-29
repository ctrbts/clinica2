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

function validarAtencionPaciente(form)
{
   var campo=document.getElementById("dni");
   var campo2=document.getElementById("apellido");
   var campo3=document.getElementById("nombre");
   var campo4=document.getElementById("direccion");
   var campo5=document.getElementById("historia");
   
   var msg="Por favor ingrese el dni";
   var msg2="Por favor escribe el apellido del paciente";
   var msg3="Por favor escribe el nombre del paciente";
   var msg4="Por favor ingrese la direccion del paciente";
	var msg5="Por favor ingrese la atencion del paciente";
   if (validar_campo_no_vacio(campo,msg)) 
     {
		if (validar_campo_no_vacio(campo2,msg2)){
				if (validar_campo_no_vacio(campo3,msg3)){
						if (validar_campo_no_vacio(campo4,msg4)){
							if (validar_campo_no_vacio(campo4,msg4)){	
									form.submit()
							}
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
function validarAltaPacientebuscar(form)
{
   var campo=document.getElementById("dni");
   var msg="Por favor ingrese el dni del paciente";

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