// JavaScript Document
var listadoSelects = new Array();
listadoSelects[0] = "cmbTipo";
listadoSelects[1] = "cmbSubcategoria";

function buscarEnArray(array, dato){
	var x = 0;
	while(array[x]){
		if(array[x] == dato) return x;
		x++;
	}
	return null;
}

function cargaContenido(idSelectOrigen){
	// Obtengo la posicion que ocupa el select que debe ser cargado en el array declarado mas arriba, almacena 1 ó 2
	var posicionSelectDestino = buscarEnArray(listadoSelects, idSelectOrigen)+1;
	// Obtengo el select que el usuario modifico
	var selectOrigen = document.getElementById(idSelectOrigen);
	// Obtengo la opcion que el usuario selecciono
	var opcionSeleccionada = selectOrigen.options[selectOrigen.selectedIndex].value;
	// Si el usuario eligio la opcion "Elige", no voy al servidor y pongo los selects siguientes en estado "Selecciona opcion..."
	if(opcionSeleccionada == 0){
		var x = posicionSelectDestino, selectActual = null;
		// Busco todos los selects siguientes al que inicio el evento onChange y les cambio el estado y deshabilito
		while(listadoSelects[x]){
			selectActual = document.getElementById(listadoSelects[x]);
			selectActual.length = 0;			
			var nuevaOpcion = document.createElement("option"); 
			nuevaOpcion.value = 0; 
			nuevaOpcion.innerHTML = "Selecciona Opci&oacute;n...";
			selectActual.appendChild(nuevaOpcion);
			selectActual.disabled = true;
			x++;
		}
	}else if(idSelectOrigen != listadoSelects[listadoSelects.length-1]){
		var idSelectDestino = listadoSelects[posicionSelectDestino];
		var selectDestino = document.getElementById(idSelectDestino);
		var ajax = creaAjax();
		ajax.open("GET", "ajx/ajxSubcategorias.php?nMovimiento=1&nIdT=" + opcionSeleccionada, true);
		ajax.onreadystatechange=function(){ 
			if (ajax.readyState == 1){				
				selectDestino.length = 0;
				var nuevaOpcion = document.createElement("option"); 
				nuevaOpcion.value = 0; 
				nuevaOpcion.innerHTML = "Cargando...";
				selectDestino.appendChild(nuevaOpcion);
				selectDestino.disabled = true;	
			}
			if (ajax.readyState == 4){
				selectDestino.parentNode.innerHTML = ajax.responseText;
			} 
		}
		ajax.send(null);
	}
}