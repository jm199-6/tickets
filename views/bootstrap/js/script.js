cPremios=0;
function addFields(etiqueta, nombre, container){
	if(cPremios<3){
		html = '<div class="input-group bottom items"><div class="input-group-prepend">';
		html +='<span class="input-group-text">'+etiqueta+'</span>';
		html +='</div>';
		html +='<input type="text" class="form-control" name="descripcion'+nombre+'[]" placeholder="Escribe una descripción corta del premio" />';
		html +='<label><input type="file" class="form-control" style="display:none;" name="'+nombre+'[]" maxlength="75" /><span class=" btn btn-success form-control fa fa-upload"  data-toggle="tooltip" data-placement="top" title="Agrega una imagen del premio"></span></label>';
		html += '<div class="input-group-prepend"><button onclick="$(this).parents(';
		html +="'.items'";
		html +=').remove(); cPremios--;" class="remove-btn btn btn-danger"><span class="fa fa-minus"></span></button></div></div>';
    $("#"+container+"Fields").append(html);

		cPremios++;
	}else{
		showNotification("Cantidad máxima de premios alcanzada","show alert-danger");
	}
	$('[data-toggle="tooltip"]').tooltip();
}
$(document).ready(function(){
	$("#idTda").on("change", function (){
		id = $("#idTda").val();
		getTda(host,id);
	});
	$("#closeNoti").click(function(){
		$("#notificacion").removeClass("show");
	});
	$(function () {
	  $('[data-toggle="tooltip"]').tooltip();
	});
});

function showNotification(message, style){
	document.getElementById("msg").innerHTML=message;
	$("#notificacion").addClass(style);
}
function setTtle(title){
  document.title = title;
}

function setGuion(type,id){
	// 1-dui, 2-telefono, 3-nit
	digits = 0;
	dNit=0;
	element = document.getElementById(id);
	valor=element.value;
	switch(type){
		case 1:
			digits = 8;
			break;
		case 2:
			digits = 4;
			break;
		case 3:
			dNit = {"d1":4,"d2":11,"d3":15};
			break;
	}
	if(valor.length == digits && !(digits==0)){
		element.value=valor+"-";
	}else if((valor.length == dNit.d1 || valor.length == dNit.d2 || valor.length == dNit.d3) && !(dNit==0)) {
		element.value=valor+"-";
	}
}

function vPwd(idSelf,id1, id2){
	valor="";
	if($("#"+idSelf).checked){
		valor="text";
	}else{
		valor="password";
	}
	$("#"+id1).attr("type",valor);
	$("#"+id2).attr("type",valor);
}
