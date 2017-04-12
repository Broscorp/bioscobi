<?php

class Database{
	
	private $PDOLocal;
	private $user="root";
	private $password="";
	private $server="mysql:host=127.0.0.1;dbname=biocombustible";
	
	
	function conectarDB(){
		
		try{
			
			$this->PDOLocal = new  PDO($this->server, $this->user, $this->password);
			
		}
		catch(PDOException $e){
			echo $e->getMessage();
			
		}
	}
	


function ejecutarSQL($query){
	
	try{
		
		$this->PDOLocal->query($query);
	}
	catch(PDOException $e){
		echo $e->getMessage();
	}
}


function desconectarDB(){
	
	try{
		$this->PDOLocal = null;
	}catch(PDOException $e){
		echo $e->getMessage();
	}
}


//---Falta el select json--//

function seleccionar($query){
	try{	
	
		$resultado = $this->PDOLocal->query($query);
		$renglon = $resultado->rowCount();
		
		if($renglon > 0){
			while($row = $resultado->fetch(PDO::FETCH_ASSOC)){
				$Datos[] = $row;
			}
		
		}else {
			$Datos[] = null;
		}
		
		return $Datos;
		
	}catch(PDOException $e){
		
		echo  $e->getMessage();
	}
	
	
}

	}

?>