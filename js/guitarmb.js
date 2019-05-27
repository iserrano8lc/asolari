var rapido=true;
var $mq;

function marque(){
		
		$mq = $('.marquee').marquee({
			duration: 70000,
			gap: 50,
			delayBeforeStart: 0,
			direction: 'up',
			duplicated: true
		});
						
						
		$('.detener').click(function(){
			if (!$(this).hasClass("inactive")){
				$('.iniciar').removeClass("inactive");
				$('.detener').addClass("inactive");
				$('.faster-lower').addClass("inactive");
				$mq.marquee('pause');
			}
		});
		
		$('.iniciar').click(function(){
			if (!$(this).hasClass("inactive")){
				$('.iniciar').addClass("inactive");
				$('.detener').removeClass("inactive");
				$('.faster-lower').removeClass("inactive");
				$mq.marquee('resume');
			}
		});
		
		$('.faster-lower').bind('click',function(e){	
			if (!$(this).hasClass("inactive")){
				$mq.marquee('destroy');
				if(rapido==true){
					$mq.marquee({
						duration: 50000,
						gap: 50,
						delayBeforeStart: 0,
						direction: 'up',
						duplicated: true
					});
					$('.faster-lower').html('M&aacute;s lento');
					rapido=false;
				}
				else{
					$mq.marquee({
						duration: 70000,
						gap: 50,
						delayBeforeStart: 0,
						direction: 'up',
						duplicated: true
					});
					$('.faster-lower').html('M&aacute;s r&aacute;pido');
					rapido=true;
				}
			}
		});

}



$(window).load(function() {
	
	
	$('.songs a').bind('click',function(e){	
		$('.songs a').removeClass("selected");
		$(this).addClass("selected");
		return false;
	});
	
	
});

// JavaScript Document
function creaAjax(){
	 var objetoAjax=false;
	 try {
	  /*Para navegadores distintos a internet explorer*/
	  objetoAjax = new ActiveXObject("Msxml2.XMLHTTP");
	 } catch (e) {
	  try {
			   /*Para explorer*/
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

function seleccionar(url, sCampo){
	//alert("pasale");
	var ajax = creaAjax();
	var divDestino = document.getElementById(sCampo);			
	ajax.onreadystatechange=function(){		
		if (ajax.readyState==1){
			divDestino.innerHTML='<div style="width:100%; height:100%; float:left; position:relative;background:url(img/loader.gif) center center no-repeat"></div>';
		}		
		if (ajax.readyState==4){
			var responseText = ajax.responseText; 
			//preloadHTMLImages(responseText, function(){ 
				divDestino.innerHTML = responseText;
				activar();
				marque();
			//}); 		
		} 
	}
	ajax.open ('POST', url, true);
	ajax.setRequestHeader('Content-Type','application/x-www-form-urlencoded;charset=UTF-8');
	ajax.send();
}

function activar(){
	$('.detener,.faster-lower').removeClass("inactive");
	$('.iniciar').addClass("inactive");
}
