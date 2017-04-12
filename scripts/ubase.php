<?php	
	error_reporting (E_ALL ^ E_NOTICE);
	require_once 'database1.php';
	header('Content-type:application/json');
	extract($_POST);
	
try{
	
	$db = new Database();
	$db->conectarDB();

	switch($accion){
		case "insertar":
			$db->ejecutarSQL("insert into clientes(nombre, apaterno, amaterno, correo) 
			values('$nombre', '$apaterno', '$amaterno', '$correo')");
			break;	
			
		case "seleccionar":
			$comensal["comensales"] = $db->seleccionar("select id_cliente, nombre, apaterno, amaterno, correo from clientes");
			break;
			
		case "actualizar":
			$db->ejecutarSQL("update clientes set nombre ='$nombre', apaterno = '$apaterno', amaterno = '$amaterno', correo = '$correo' where id_cliente = $id_cliente");
			break;
		
		case "eliminar":
			$db->ejecutarSQL("delete from clientes where id_cliente = $id_cliente");
            break;
	}
	
	echo ($comensal !=null)?json_encode($comensal):"{}";
	
	$db->desconectarDB();
	
}catch(Exception $e){
	echo $e->getMessage();
}



?>