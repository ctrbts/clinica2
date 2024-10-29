
///////////////////////////////////////////////////////
function validarFecha(){
var valor=document.getElementsByTagName("fecha").value;
      if(document.getElementById('datepicker').value > document.getElementById('datepicker2').value){
				alert("La primer fecha es mayor que la segunda, Por favor ingrese bien las fechas!!!");
				return false;	
		  }
		 else 		document.getElementById('formulario').submit();
			
}
//////////////////////////////////////////////////////////////////
function validarFechasNot(){
	  var valor=document.getElementsByTagName("fecha").value;
      if(document.getElementById('datepicker').value > document.getElementById('datepicker2').value){
				alert("La primer fecha es mayor que la segunda, Por favor ingrese bien las fechas de creacion!!!");
				return false;	
		  }
		 else { 
		 		if (document.getElementById('datepicker3').value > document.getElementById('datepicker4').value){
						alert("La primer fecha es mayor que la segunda, Por favor ingrese bien las fechas de destacado!!!");
						return false;					
				}
				else 	 document.getElementById('formulario').submit();
		 }
}