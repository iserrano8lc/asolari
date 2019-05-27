

(function($) {
	$.fn.validationEngineLanguage = function() {};
	$.validationEngineLanguage = {
		newLang: function() {
			$.validationEngineLanguage.allRules = 	{"required":{    			// Add your regex rules here, you can take telephone as an example
						"regex":"none",
						"alertText":"&bull; Este campo es requerido",
						"alertTextCheckboxMultiple":"&bull; Please select an option",
						"alertTextCheckboxe":"&bull; This checkbox is required"},
					"length":{
						"regex":"none",
						"alertText":"&bull; Entre ",
						"alertText2":" y ",
						"alertText3": " caracteres"},
					"maxCheckbox":{
						"regex":"none",
						"alertText":"&bull; Checks allowed Exceeded"},	
					"minCheckbox":{
						"regex":"none",
						"alertText":"&bull; Please select ",
						"alertText2":" options"},	
					"confirm":{
						"regex":"none",
						"alertText":"&bull; No coinciden"},		
					"telephone":{
						"regex":"/^[0-9\-\(\)\ ]+$/",
						"alertText":"&bull; Invalid phone number"},	
					"email":{
						"regex":"/^[a-zA-Z0-9_\.\-]+\@([a-zA-Z0-9\-]+\.)+[a-zA-Z0-9]{2,4}$/",
						"alertText":"&bull; Invalid email address"},	
					"date":{
                         "regex":"/^[0-9]{4}\-\[0-9]{1,2}\-\[0-9]{1,2}$/",
                         "alertText":"&bull; Invalid date, must be in YYYY-MM-DD format"},
					"onlyNumber":{
						"regex":"/^[0-9\ ]+$/",
						"alertText":"&bull; Solo números"},	
					"noSpecialCaracters":{
						"regex":"/^[0-9a-zA-Z]+$/",
						"alertText":"&bull; No caracteres especiales"},	
					"ajaxUser":{
						"file":"validateUser.php",
						"extraData":"name=eric",
						"alertTextOk":"&bull; Disponible",	
						"alertTextLoad":"&bull; Cargando, por favor espere",
						"alertText":"&bull; No Disponible"},	
					"ajaxName":{
						"file":"validateUser.php",
						"alertText":"&bull; No Disponible",
						"alertTextOk":"&bull; Disponible",	
						"alertTextLoad":"&bull; Cargando, por favor espere"},		
					"onlyLetter":{
						"regex":"/^[a-zA-Z\ \']+$/",
						"alertText":"&bull; Solo letras"},
					"validate2fields":{
    					"nname":"validate2fields",
    					"alertText":"&bull; You must have a firstname and a lastname"}	
					}	
					
		}
	}
})(jQuery);

$(document).ready(function() {	
	$.validationEngineLanguage.newLang()
});