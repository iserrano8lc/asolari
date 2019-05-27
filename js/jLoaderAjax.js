// JavaScript Document
function creaAjax(){
	 var objetoAjax=false;
	 try {
	  objetoAjax = new ActiveXObject("Msxml2.XMLHTTP");
	 } catch (e) {
	  try {
			   objetoAjax = new ActiveXObject("Microsoft.XMLHTTP");
			   }
			   catch (E) {
			   objetoAjax = false;
	  }
	 }	
	 if (!objetoAjax && typeof XMLHttpRequest!='undefined') {
	  objetoAjax = new XMLHttpRequest();
	 }
	 return objetoAjax;
}

function peticion(url, aObjects ,sCampo){
	valores = '';
	var ajax = creaAjax();
	var divDestino = document.getElementById(sCampo);	
	//Recorre los valores que se enviaran por POST		
	for(var i=0;i < aObjects.length;i++){
		//Asigna valores a las variables que serán enviadas como POST			
		valores = valores + aObjects[i][0] + "=" + aObjects[i][1];
		if(i + 1 < aObjects.length){				
			valores = valores + '&';
		}
	}
	ajax.onreadystatechange = function(){
		if (ajax.readyState == 1){
			divDestino.innerHTML = '<div style="width:470px; height:295px; text-align:center; padding-top:117px"><center><img src="img/loader2.gif"></center></div>';
		}
		if (ajax.readyState == 4){
			divDestino.innerHTML = ajax.responseText;
		} 
	}
	ajax.open ('POST', url, true);
	ajax.setRequestHeader('Content-Type','application/x-www-form-urlencoded');
	ajax.send(valores);
}

function statusVideo(url, aObjects){
	valores = '';
	var ajax = creaAjax();	
	//Recorre los valores que se enviaran por POST		
	for(var i = 0; i < aObjects.length; i++){
		//Asigna valores a las variables que serán enviadas como POST			
		valores = valores + aObjects[i][0] + "=" + aObjects[i][1];
		//Valida que no sea el último valor
		if(i + 1 < aObjects.length){				
			valores = valores + '&';
		}
	}
	ajax.open ('POST', url, true);
	ajax.onreadystatechange = function() {
		if (ajax.readyState==4){			
			if(ajax.status==404){
				alert("La direccion no existe");
			}else{
				alert("Error: ".ajax.status);
			}
		}
	}	
	ajax.setRequestHeader('Content-Type','application/x-www-form-urlencoded');
	ajax.send(valores);
}

////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
function envioComentarioContacto(){
	var aObjects = new Array(
								new Array("cEmail", document.getElementById('cf_mail').value),
								new Array("cNombre", document.getElementById('cf_name').value),
								new Array("cEmpresa", document.getElementById('cf_emp').value),																				
								new Array("cTelefono", document.getElementById('cf_tel').value),								
								new Array("cComentario", document.getElementById('cf_comentario').value)
							);
							
	peticion('ajx/ajxContacto.php', aObjects, 'chirris');
}