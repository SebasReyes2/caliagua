//funcion para can=mbiar el color de las filas de las tablas..
function cambiar(id,color)
{
	document.getElementById(id).style.backgroundColor=color;
}

//Valida correo
function valida_correo(correo) {
		  if (/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(correo)){
		   return (true);
		  } else {
		   return (false);
		  }
		 }
//*************************************************************************************************************************************
//valida números
function valida_numero(numero)
{
if (!/^([0-9])*$/.test(numero)){
		return false;
}else{
		return true;
	}
}

//validacion de float.........
function validafloat(numero)
{
  if (!/^([0-9])*[.]?[0-9]*$/.test(numero)){
	  return false;
  }
  else {
	  return true;
  }
}

function cadena_letras_numeros(cadena)
{
	if(/^([A-Za-zñÑáéíóúÁÉÍÓÚ])*[-]?[0-9]$/.test(cadena)){
	return false;
	}
	else {
		return true;
	}
	
}

//función para validar cadenas de solo letras
function valida_cadena(texto)
	{
		var RegExPattern = "[1-9]";
		 if (texto.match(RegExPattern))
		 {
		 	return false;
		 }else
		 {
		 	return true;
		 }
	}


function validar(e){  
tecla = (document.all) ?e.keyCode:e.which;
if(tecla===8) return true;
patron =/[A-Za-zñÑáéíóúÁÉÍÓÚ.\s\d]/;
te=String.fromCharCode(tecla);
return patron.test(te);
}

/*funcion para teclear solo letras y espacio*/

function decimales(e){
tecla = (document.all) ?e.keyCode:e.which;
if(tecla===8) return true;
patron =/[.\d]/;
te=String.fromCharCode(tecla);
return patron.test(te);
}


function obtiene_http_request()
{
var req = false;
try
  {
    req = new XMLHttpRequest(); /* p.e. Firefox */
  }
catch(err1)
  {
  try
    {
     req = new ActiveXObject("Msxml2.XMLHTTP");
  /* algunas versiones IE */
    }
  catch(err2)
    {
    try
      {
       req = new ActiveXObject("Microsoft.XMLHTTP");
  /* algunas versiones IE */
      }
      catch(err3)
        {
         req = false;
        }
    }
  }
return req;
}
var miPeticion = obtiene_http_request();
//***************************************************************************************
function from(id,ide,url){
		var mi_aleatorio=parseInt(Math.random()*99999999);
		var vinculo=url+"?id="+id+"&rand="+mi_aleatorio;
		miPeticion.open("GET",vinculo,true);
		miPeticion.onreadystatechange=miPeticion.onreadystatechange=function(){
               if (miPeticion.readyState==4)
               {
                       if (miPeticion.status==200)
                       {
                               var http=miPeticion.responseText;
                               document.getElementById(ide).innerHTML= http;

                       }
               }
       };
       miPeticion.send(null);

}
//************************************************************************************************
function limpiar()
{
	document.form.reset();
}

function limpiartecnicos()
{
	document.datostecnicos.reset();
	
}
	
function validarform()
		{
			var f=document.formsistema;
			if (f.provincia.value==0)
				{
					alert("Por favor indique la Provincia..");
					f.provincia.focus();
					return false;
				}
			if (f.canton.value==0)
				{
					alert("Por favor indique el cantón al que pertenece..");
					f.canton.focus();
					return false;
				}
				
			if (f.parroquia.value == 0)
				{
					alert("Por favor seleccione la parroquia...");
					f.canton.focus();
					return false;
				}
				
			if (f.barrio.value == 0)
				{
					alert("Por favor seleccione el barrio...");
					f.barrio.focus();
					return false;
				}
				
			if (f.nombre.value == 0)
			{
				alert("Ingrese el nombre del sistema.");
				f.nombre.value="";
				f.nombre.focus();
				return false;
			}	
			
			if (f.tipo.value == 0)
			{
				alert("Seleccione el tipo de sistema.");
				f.tipo.focus();
				return false;
			}
		document.formsistema.submit();
		}

function validartecnicos()
		{
			var f=document.datostecnicos;
			
			if (f.captacion.value == 0)
				{
					alert("Por favor seleccione el tipo de captación..");
					f.captacion.focus();
					return false;
				}
			
			if (f.distancia.value == 0)
				{
					alert("Ingrese la distancia de conducción");
					f.distacia.value="";
					f.distacia.focus();
					return false;
				}
			
			if (valida_numero(f.distancia.value) == false)
				{
					alert("La distancia de conducción sólo debe tener numeros enteros");
					f.distacia.value="";
					f.distacia.focus();
					return false;
				}
				
			if (f.tuberia.value == 0)
			{
				alert("Por favor ingrese el diametro de la tuberia");
				f.tuberia.value="";
				f.tuberia.focus();
				return false;
			}
			
			if (validafloat(f.tuberia.value) == false)  //controlar decimales
			{
				alert("El diametro de la tuberia solo debe tener números y punto decimal..");
				f.tuberia.value="";
				f.tuberia.focus();
				return false;
			}
			
			if (f.magnitud2.value==0)
			{
				alert("Seleccione la unidad del diámetro de la tuberia.");
				return false;
				f.magnitud2.focus();
			}
			
			if(valida_numero(f.rompepresion.value) == false)
			{
				alert("Este campo debe ingresarse solo numeros enteros...");
				f.rompepresion.value="";
				f.rompepresion.focus();
				return false;
			}
			
			if(valida_numero(f.valvulas.value) == false)
			{
				alert("Este campo debe ingresarse solo numeros enteros...");
				f.valvulas.value="";
				f.valvulas.focus();
				return false;
			}
			
			if(valida_numero(f.capacidad.value) == false)
			{
				alert("Este campo debe ingresarse solo numeros enteros...");
				f.capacidad.value="";
				f.capacidad.focus();
				return false;	
			}
			
			if (f.material.value == 0)
				{
					alert("Por favor seleccione el material de construccion del tanque...");
					f.naterial.value="";
					f.material.focus();
					return false;
				}
				
			if(f.forma.value == 0)
			{
					alert("Por favor seleccione la forma del tanque...");
					f.forma.value="";
					f.forma.focus();
					return false;
			}
			
			if(f.año.value == 0)
			{
				alert("Por favor seleccione el año de construccion del tanque...");
				f.año.value="";
				f.año.focus();
				return false;
			}
			
			if(f.longitud.value == 0)
			{
				alert("Por favor ingrese la longitud de redistribucion...");
				f.longitud.value="";
				f.longitud.focus();
				return false;
			}
			
			if(valida_numero(f.longitud.value) == false )
			{
				alert("La longitud de redistribucion solo debe tener numeros enteros...");
				f.longitud.value="";
				f.longitud.focus();
				return false;
			}
			
			if(f.diametro.value == 0)
			{
				alert("Por favor ingrese el diametro de tuberia.. ");
				f.diametro.value="";
				f.diametro.focus();
				return false;
			}
			
			if(validafloat(f.diametro.value) == false) 
			{
				alert("El diametro de tuberia solo debe tener números decimales...");
				f.diametro.value="";
				f.diametro.focus();
				return false;
			}
			
			if(f.magnitud.value == 0)
			{
				alert("Por favor seleccione la unidad del diametro de tuberia.. ");
				f.magnitud.focus();
				return false;
			}
			
			if(valida_numero(f.rompepresion2.value) == false)
			{
				alert("El campo rompepresiones solo debe tener numero enteros..");
				f.rompepresion2.value="";
				f.rompepresion2.focus();
				return false;
			}
			
		
			if(valida_numero(f.conmedidor.value) == false )
			{
				alert("Este campo solo acepta numeros enteros...");
				f.conmedidor.value="";
				f.conmedidor.focus();
				return false;
			}
			
			if(valida_numero(f.sinmedidor.value) == false )
			{
				alert("Este campo solo acepta numeros enteros...");
				f.sinmedidor.value="";
				f.sinmedidor.focus();
				return false;
			}
			
		document.datostecnicos.submit();
		}