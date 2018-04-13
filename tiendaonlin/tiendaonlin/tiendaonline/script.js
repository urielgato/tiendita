$(document).ready(function(){
	formSubmit()
})
function formSubmit(){

	$('#formDatos').submit(function(e){
		e.preventDefault()
		var user=$('#usuario').val()
		var pass=$('#password').val()
		var nombre=$('#nombre').val()
		var tipo=$('#tipo').val()
		var data='user='+user+'&pass='+pass+'&nombre='+nombre+'&tipo='+tipo;
		$.ajax({
			url: 'form.php',
			type: 'POST',
			data:  data,
			beforeSend:function(){
				console.log("Enviando datos a la bd...")
			},
			success:function(resp){
				console.log(resp)
            	if(data=="1"){
            		$("#result").html("Correcto");
            	}else{
            		$("#result").html("Ya existe");
            	}
			}
		})
	})
	
}