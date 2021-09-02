<?php include("menu.php");?><!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
 	 <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<script>
		function bnt_data(){
			var buscar=$.trim($("#buscar").val());
			var parametros={bnt_data:1,buscar:buscar};
			$.ajax({
				url:"funciones.php",
	            data:parametros,
	            dataType:'JSON',
	            type:'POST',
	            success:function(datos){
            	$("#resultado").empty();
	            	var r="";
	            	var head=['codigo','nombres','apellidos','sexo','sueldo_bruto','sueldo_neto','afiliado'];
	                if(datos.length>0){
	                	r+="<div>";
	                   	r+="<table class='table'>";
                        r+="<thead>";
		                   	r+="<tr>";
		                   		for(h in head){
		                   			r+="<th>"+head[h]+"</th>";
		                   		}
		                   	r+="</tr>";
                        r+="</thead>";
                        r+="<tbody>";
	                   	for(i in datos){
	                   	r+="<tr>";
	                   		for(h in head){
			                   	r+="<td>";
			                   		r+=$.trim(datos[i][head[h]].toUpperCase());
			                   	r+="</td>";
		                   	}
	                   	r+="</tr>";		

	                   	}
                        r+="</tbody>";
	                   	r+="</table>";
	                	r+="</div>";
                 	$("#resultado").append(r);
	                }else{
	                    alert("Error");
	                }
	            }
			});
		}
	</script>
</head>
<body>
	<div class="container">
		<label>Ingrese Codigo</label>
		<input type="text" name="buscar" id="buscar" class='form-control text-capitalize'>
		<input type="button" name="btn_buscar" id="btn_buscar" value="buscar" onclick="bnt_data();" class='btn btn-info'>
	
	<div id="resultado">
		
	</div>
	</div>
</body>
</html>