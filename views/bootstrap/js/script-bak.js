$(document).ready(function(){
	$("#telefono").keyup(function (){
		valor = this.value;
		if(valor.length == 4){
			this.value=valor+"-";
		}
	});

	$("#addPaymentField").click(function (){
		field='<div class="input-group bottom fields"><div class="input-group-prepend"><span class="input-group-text">Nombre forma de Pago</span></div><input type="text" class="form-control" name="payments[]" maxlength="75" ><div class="input-group-prepend"><a href="#" class="btn btn-danger remove">-</a></div></div>';
    	$("#fPagosFields").append(field);
	});

});
function rem(){

    $(this).parents(".fields").remove();
}
function setTtle(title){
  document.title = title;
}

function getListEmpresas(){
	$.ajax({
		type: "GET",
		url: "http://localhost/ventas/api/empresa",
		contentType: "application/json; charset=utf-8",
		dataType: "json",
		success: function (data) {
			$.each(data,function (i,item){
				var option = "<option value='"+item.codigo+"'>"+item.nombreJ+"("+item.nombreC+")"+"</option>";
				$("#idEmp").append(option);
			});

		},
		failure: function (data){
			alert(data.responseText);
		},
		error: function (data){
			alert(data.responseText);
		}
	});
}
function disableTabById(id){
  $("#"+id+"-tab").removeClass("active");
  $("#"+id+"-tab").addClass("disabled");
	$("#"+id+"-tab > span").removeClass("badge-secondary");
  $("#"+id+"-tab > span").addClass("badge-primary");
  $("#"+id).removeClass("active show");
}
function activeTabById(id){

  $("#"+id+"-tab").addClass("active");
  $("#"+id+"-tab").removeClass("disabled");
  $("#"+id+"-tab > span").removeClass("badge-secondary");
  $("#"+id+"-tab > span").addClass("badge-primary");
  $("#"+id).addClass("show active");

}
