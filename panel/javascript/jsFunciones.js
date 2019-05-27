function insertarRegistro(){ 
	document.getElementById('hidMovimiento').value = 1;	
	document.getElementById('frmPrincipal').submit();			
}

function editarRegistro(){				
	document.getElementById('hidMovimiento').value = 4;
	document.getElementById('frmPrincipal').submit();				  
}

function eliminarRegistro(hidValor){
	vent = confirm('Desea eliminar el registro')
	if(vent){
		document.getElementById('hidValorReg').value = document.getElementById(hidValor).value;
		document.getElementById('hidMovimiento').value = 3;
		document.getElementById('frmPrincipal').submit();	
	}	  
}

function statuRegistro(hidValor, chk, cAjx){		
	var aObjects = new Array(
		new Array("nTipoMovimiento", 1),
		new Array("nStatus", document.getElementById(chk).value),
		new Array("nId", document.getElementById(hidValor).value)
	);

	if(document.getElementById(chk).value == 1)
		document.getElementById(chk).value = 2;
	else
		document.getElementById(chk).value = 1;
						
	statusVideo('ajx/' + cAjx, aObjects);
}

function ver(){			
	document.getElementById('frmPrincipal').submit();
}

function busquedas(){
	document.getElementById('cmbPaginado').selectedIndex = '0-1';
	document.getElementById('frmPrincipal').submit();
}

function Mensaje(cMensaje){
	var response=new Array();
	response['css'] ='notice-message';
	response['message'] =cMensaje;
	showResponse(response);
}

function abrirContenido(hidValor, cPagina){			
	document.getElementById('hidValorReg').value = document.getElementById(hidValor).value;			
	document.getElementById('frmPrincipal').action=cPagina;
	document.getElementById('frmPrincipal').submit();
}

function enlaze(cCampoValor, cCampo, cPagina){			
	document.getElementById(cCampo).value = document.getElementById(cCampoValor).value;			
	document.getElementById('frmPrincipal').action = cPagina;
	document.getElementById('frmPrincipal').submit();
}

function expand(id){
	el = document.getElementById(id);		
	var display = el.style.display ? '': 'none';
	tagImg = document.getElementById('expandir'+id);		
	var imagen = el.style.display ? "css/images/arrow_abajo.gif" : "css/images/arrow_medio.gif";		
	el.style.display = display;
	tagImg.src=imagen		
}

function eventoSubmit(cPagina){
	document.getElementById('frmPrincipal').action =cPagina;
	document.getElementById('frmPrincipal').submit();
	document.getElementById('frmPrincipal').action ="javascript: eventoSubmit('"+cPagina+"');"
}

function imprimirRegistroCompleto(cPagina,cPaginaPrincipal){
	document.getElementById('frmPrincipal').action =cPagina;
	document.getElementById('frmPrincipal').submit();
	document.getElementById('frmPrincipal').action ="javascript: eventoSubmit('"+cPaginaPrincipal+"');";
}


/*<html>
<head>
<script>
function validar(e,txt) {
    tecla = (document.all) ? e.keyCode : e.which;
    if (tecla==8) return true;
    if (tecla==46 && txt.indexOf('.') != -1) return false;
    patron = /[\d\.]/;
    te = String.fromCharCode(tecla);
    return patron.test(te); 
} 
</script>
</head>

<body>
<input type="text" name="textfield" onkeypress="return validar(event,this.value)">
</body>
</html>*/