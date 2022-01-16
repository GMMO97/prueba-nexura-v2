function validateEmployee(){

	let name = $("#name").val();
	let email = $("#email").val();
	let sex = $(".sex").val();
	let sexchecked = $(".sex").prop('checked')
	let area = $("#area").val();
	let description = $("#description").val();
	let boletin = $("#boletin").prop('checked');
	let role = new Array();
    $("input:checkbox:checked").each(function() {
         role.push($(this).val());
    });


	if(validar_vacio("name") && validar_correo("email") && validar_vacio("sex")
	   && validar_vacio("description")){

		if(!sexchecked){
			Swal.fire({
				type: 'warning',
				text: 'Debe seleccionar un sexo'
			})
			return false;
		}

		if(area == ""){
			Swal.fire({
				type: 'warning',
				text: 'Debe seleccionar un area'
			})
			return false;
		}

		if(role == ""){
			Swal.fire({
				type: 'warning',
				text: 'Debe seleccionar por lo menos un rol'
			})
			return false;
		}

		

	}else{
		return false;
	}

}

function soloTexto(e) {
    key = e.keyCode || e.which;
    tecla = String.fromCharCode(key).toLowerCase();
    letras = "  qwertyuiopasdfghjklzxcvbnmQWERTYUIOPASDFGHJKLZXCVBNMñÑáàäâªÁÀÂÄéèëêÉÈÊËÊíìïîÍÌÏÎóòöôÓÒÖÔÓúùüûÚÙÛÜçÇ";
    especiales = "8-37-39-46";
    tecla_especial = false
    for (var i in especiales) {
        if (key == especiales[i]) {
            tecla_especial = true;
            break;
        }
    }
    if (letras.indexOf(tecla) == -1 && !tecla_especial) {
        return false;
    }
}

function soloNumero(e){
	key = e.keyCode || e.which;
	tecla = String.fromCharCode(key).toLowerCase();
	letras = "1234567890";
	especiales = "8-37-39-46";
	tecla_especial = false
	for(var i in especiales){
		 if(key == especiales[i]){
			 tecla_especial = true;
			 break;
		 }
	 }
	 if(letras.indexOf(tecla)==-1 && !tecla_especial){
		 return false;
	 }
 }

 function soloAlfanumerico(e){
	key = e.keyCode || e.which;
	tecla = String.fromCharCode(key).toLowerCase();
	letras = " Ã¡Ã©ÃÃ³ÃºabcdefghijklmnÃ±opqrstuvwxyz._-+1234567890@";
	especiales = "8-37-39-46";
	tecla_especial = false
	for(var i in especiales){
		 if(key == especiales[i]){
			 tecla_especial = true;
			 break;
		 }
	 }
	 if(letras.indexOf(tecla)==-1 && !tecla_especial){
		 return false;
	 }
 }

 function validar_vacio(control) {
    var valor = $("#" + control).val();
    if (valor == "" || /^\s+$/.test(valor)) {
        // mensajeBrilla(nombre+" no puede estar vac\xedo.");
        $("#" + control).focus();
        $("#" + control).addClass("errorinput");
        return false;
    }
    $("#" + control).removeClass("errorinput");
    return true;
}

function validar_correo(control) {
    var valor = $("#" + control).val();
    if (!(/^([a-zA-Z0-9_.-])+@([a-zA-Z0-9_-])+(\.[a-zA-Z0-9_-]+)+/.test(valor))) {
        // mensajeBrilla(nombre+" no v\xe1lido.");
        $("#" + control).focus();
        $("#" + control).addClass("errorinput");
        return false;
    }
    $("#" + control).removeClass("errorinput");
    return true;
}
