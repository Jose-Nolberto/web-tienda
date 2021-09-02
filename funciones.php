<?php 

	if(isset($_POST['frmsave'])){
		$sql=frmsave($_POST);
		return $sql;
	}
	function frmsave($r){
	 include("conexion.php");
	 $sql="INSERT INTO empleados(codigo,nombres,apellidos,sexo,sueldo_bruto,sueldo_neto,afiliado)VALUES('".$r['codigo']."','".$r['nombre']."','".$r['apellidos']."','".$r['sexo']."','".$r['sueldo_b']."','".$r['sueldo_n']."','".$r['afiliado']."')";
	 $query=mysqli_query($con,$sql) or die(mysqli_error($con).$sql);
	 if($query>0){echo json_encode(1);}else{echo json_encode(0);}
	}
	/////////////////////////////////
	if(isset($_POST['bnt_data'])){
		$sql=bnt_data($_POST);
		return $sql;
	}
	function bnt_data($r){
	 include("conexion.php");
	 $sql=" SELECT * FROM empleados where 1";
	 $sql.=($r['buscar']!="")?" and codigo='".$r['buscar']."' ":"";
	 //echo json_encode($sql);exit();
	 $query=mysqli_query($con,$sql) or die(mysqli_error($con).$sql);
	  $data=array();
        while($row=mysqli_fetch_array($query)){
            $data[]=$row;
        }
        echo json_encode($data);
	}
?>