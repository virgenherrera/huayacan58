$('#sendMail').keydown(function(e) {
	return e.which !== 13  ;
});//deshabilitar enter en el form

function validaMail(email) {
	var re = /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
	return re.test(email);
}

$("#interesado").change(function(){
	if( $("#interesado").val().length < 3 ){
		$("#interesado").css('background-color','pink').fadeOut(250).fadeIn(250).fadeOut(250).fadeIn(250).focus().val('').attr("placeholder","Campo obligatorio");
		$("#interesado").prev().css("color","red");
	}
	else{
		$("#interesado").removeAttr("style").css("border-color","green").prev().css("color","green").append('<i class="glyphicon glyphicon-ok"></i>');
		$("#telefono").focus();
	}
});
$("#telefono").change(function(){
	$("#email").focus();
});
$("#email").change(function(){
	if( ! validaMail( $("#email").val() ) ){
		$("#email").css('background-color','pink').fadeOut(250).fadeIn(250).fadeOut(250).fadeIn(250).focus().val('').attr("placeholder","formato email obligatorio");
		$("#email").prev().css("color","red");
	}
	else{
		$("#email").removeAttr("style").css("border-color","green").prev().css("color","green").append('<i class="glyphicon glyphicon-ok"></i>');
		$("#botonEnvia").removeClass("disabled");
		$("#nombreAgente").focus();
	}
});
$("#nombreAgente").change(function(){
	$("#telAgente").focus();
});
$("#telAgente").change(function(){
	$("#emailAgente").focus();
});
$("#emailAgente").change(function(){
	$("#nombreNegocio").focus();
});
$("#nombreNegocio").change(function(){
	$("#giroNegocio").focus();
});

$("#botonEnvia").click(function(){
	$("#sendMail").submit();
	return false;
});