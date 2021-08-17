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
	$("#note").click(function(){
		if($(this).is(":checked")){
			$("#nota").removeAttr("disabled");
		}else{
			$("#nota").attr("disabled","disabled");
		}
	});
	$("#note1").click(function(){
		if($(this).is(":checked")){
			$("#nota1").removeAttr("disabled");
		}else{
			$("#nota1").attr("disabled","disabled");
		}
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
