<?php include("menu.php");?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script>
    /////
    function calcular(){
        $("#sueldo_n").val("0.0");
        var sueldo_b=$.trim($("#sueldo_b").val());
        var afiliado=$.trim($("#afiliado").val());
        var cal=0;
        if((sueldo_b!=0 && sueldo_b!="") && afiliado=="onp"){
            cal=sueldo_b*(0.13);
        }else if((sueldo_b!=0 && sueldo_b!="") && afiliado=="afp"){
            cal=sueldo_b*(0.127);
        }
        $("#sueldo_n").val(cal);
    }
    /////
    function frmsave() {
        var codigo=$.trim($("#codigo").val());
        var nombre=$.trim($("#nombre").val());
        var apellidos=$.trim($("#apellidos").val());
        var sexo=$.trim($("#sexo").val());
        var sueldo_b=$.trim($("#sueldo_b").val());
        var afiliado=$.trim($("#afiliado").val());
        var sueldo_n=$.trim($("#sueldo_n").val());
        var array_columns=['codigo','nombre','apellidos','sexo','sueldo_b','afiliado','sueldo_n'];
    for(i in array_columns){
        if($("#"+array_columns[i]).val()==''){
            $("#error").fadeIn().text("llenar campo "+array_columns[i]);
            $("#error").fadeToggle(3000);
            $("#"+array_columns[i]).focus();
            return false;
        }
    }
        var parametros={frmsave:1,codigo:codigo,nombre:nombre,apellidos:apellidos,sexo:sexo,sueldo_b:sueldo_b,sueldo_n:sueldo_n,afiliado:afiliado};
        $.ajax({
            url:"funciones.php",
            data:parametros,
            dataType:'JSON',
            type:'POST',
            success:function(datos){
                if(datos==1){
                    window.location.href="cliente";
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
        <div id='error' class="invalid-feedback"></div>
        <form>
            <tr>
            <label>codigo de cliente</label>
            <input type="text" name="codigo" id="codigo" style="text-transform: uppercase;" class='form-control text-capitalize'>
            <label>nombre</label>
            <input type="text" name="nombre" id="nombre" style="text-transform: uppercase;" class='form-control text-capitalize'>
            <label>apellidos</label>
            <input type="text" name="apellidos" id="apellidos" style="text-transform: uppercase;" class='form-control text-capitalize'>
            </tr>
            <label>sexo</label>
            <select id="sexo" class='form-control text-capitalize'>
                <option value="">seleccionar</option>
                <option value="hombre">hombre</option>
                <option value="mujer">mujer</option>
            </select>
            <label>sueldo bruto</label>
            <input type="text" name="sueldo_b" id="sueldo_b" style="text-transform: uppercase;" class='form-control text-capitalize' onkeyup="calcular()">
            <label>tipo de pension</label>
            <select id="afiliado" class='form-control text-capitalize' onchange="calcular();">
                <option value="">seleccionar</option>
                <option value="onp">onp</option>
                <option value="afp">afp</option>
            </select>
            <label>sueldo neto</label>
            <input type="text" name="sueldo_n" id="sueldo_n" class='form-control text-capitalize' readonly="">
            <input type="button" name="bnt_save" id="btn_save" value="Guardar" onclick="frmsave();" class='btn btn-success'>
        </form>
    </div>
</body>
</html>