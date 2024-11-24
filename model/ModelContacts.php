<?php

require_once ("config/db.php");


Class ModelContacts extends Conexiones{
	public $tabla = "countries";
	
	public function mostrar_ajax1()
	{
		//$sentencia = "select * from countries";
		/*$sentencia = "Select t1.id_cliente,t1.cedula,t1.nombre,t1.apellido_paterno,t1.apellido_materno,t1.edad,t1.direccion,t1.ocupacion,t1.telefono_cel as celular ,t1.telefono_oficial as telefono ,t1.email,t2.nombre_tipo from clientes t1, tipo_cliente t2 where t1.tipo_cliente= t2.id_tipocliente";*/
		$sentencia = "SELECT ct.id,ct.contact_id,ct.name,ct.first_name,ct.email,CONCAT(ct.city,',',ct.state,',',ct.country) AS DIRECCION,ct.mobile, ct.custom_field1 AS NOMBRE_PERRO,ct.custom_field2 AS RAZA,ct.custom_field5 AS Vac_Rabia_Venc, ct.custom_field6 AS Vac_Bordetela_Venc,ct.custom_field7 AS Vac_Multiple_Venc, ct.custom_field8 AS Desparacitante_Venc FROM contacts ct WHERE ct.business_id=3";
  
		//var_dump($this->pdo);
		//exit;
		$resultado = $this->pdo->prepare($sentencia);
		$html="";
		$resultado->execute();
		/*while ($fila = $resultado->fetch(PDO::FETCH_NUM, PDO::FETCH_ORI_NEXT)) {
			$html.="<tr>";
			$html .= "<th>".$fila[0]."</th>"."<th>".$fila[1]."</th>"."<th>".$fila[2]."</th>"."<th>".$fila[3]."</th>"."<th>".$fila[4]."</th>";
			$html .="</tr>";
		}
		$this->pdo=null;
		echo $html; exit;*/
		$num = $resultado->fetchAll();

		//echo "aqui"; exit;
		$valor = array();
		$valor = array(
		"data"=> $num
		); 
		header('Content-type: application/json');
		echo json_encode($valor);
		//print_r($datos);
		//return $datos;
	}
	public function mostrar_ajax($id_bus)
	{
		
		
		$sql = "SELECT ct.id,ct.contact_id,ct.name,ct.first_name,ct.email,CONCAT(ct.city,',',ct.state,',',ct.country) AS DIRECCION,ct.mobile, ct.custom_field1 AS Pet1,ct.custom_field2 AS Pet2,
		ct.custom_field3 AS Pet3, ct.custom_field4 AS Pet4,
		ct.custom_field5 AS Pet5, ct.created_at AS Creacion FROM contacts ct WHERE ct.business_id=".$id_bus.";";

		try {
			//code...
			$stmt= $this->pdo->prepare($sql);
			$stmt->execute();
			
			$num = $stmt->fetchAll();
		} catch (\Throwable $th) {
			//throw $th;
			@$num[13] = array();
		}
		
		return $num ;
		//print_r($datos);
		//return $datos;
	}
	public function tipo_cliente_ajax()
	{
		$sentencia = "select id_tipocliente as id , nombre_tipo as nombre from tipo_cliente ";

		$resultado = $this->pdo->prepare($sentencia);
		$resultado->execute();

		$num = $resultado->fetchAll();

		/*$valor = array();
		$valor = array(
		"data"=> $num
		); */
		header('Content-type: application/json');
		echo json_encode($num);
		//return $datos;
	}
	public function getid($buscar,$id_bus)
	{
		$sql = "SELECT ct.id,ct.contact_id,ct.name,ct.first_name,ct.email,CONCAT(ct.city,',',ct.state,',',ct.country) AS DIRECCION,ct.mobile, ct.custom_field1 AS NOMBRE_PERRO,ct.custom_field2 AS RAZA,ct.custom_field5 AS Vac_Rabia_Venc, ct.custom_field6 AS Vac_Bordetela_Venc,ct.custom_field7 AS Vac_Multiple_Venc, ct.custom_field8 AS Desparacitante_Venc FROM contacts ct WHERE ct.business_id=".$id_bus." AND ct.contact_id=".$buscar.";";
		//echo $sql; exit;
			//var_dump($this->pdo); exit; 
			//print_r($data); exit; 
            try {
                //code...
                $stmt= $this->pdo->prepare($sql);
                $stmt->execute();
                
                $num = $stmt->fetchAll();
            } catch (\Throwable $th) {
                //throw $th;
                @$num[13] = array();
            }
			
			return $num ;	
	}
	public function mostrar_pet_x_contact($buscar,$id_bus)
	{
		$sql = "SELECT ct.contact_id,ct.custom_field1,ct.custom_field2,ct.custom_field3,ct.custom_field4,ct.custom_field5 
		FROM contacts ct WHERE ct.business_id=".$id_bus." AND ct.contact_id=".$buscar.";";
		//echo $sql; exit;
			//var_dump($this->pdo); exit; 
			//print_r($data); exit; 
            try {
                //code...
                $stmt= $this->pdo->prepare($sql);
                $stmt->execute();
                
                $num = $stmt->fetchAll();
            } catch (\Throwable $th) {
                //throw $th;
                @$num[13] = array();
            }
			
			return $num ;	
	}
	public function get_users($users)
	{
		$sql="SELECT tb1.id,CONCAT(tb1.first_name,' ',ifnull(tb1.last_name,' ')) AS firstname ,tb2.id,tb2.name AS busines_name,tb1.email,tb1.password as genberator
		FROM users tb1, business tb2 WHERE tb1.business_id=tb2.id 
		AND tb1.username='".$users."';";
		//echo $sql."<br>"; 
		try {
			//code...
			$stmt= $this->pdo->prepare($sql);
			$stmt->execute();
			
			$num = $stmt->fetchAll();


		} catch (\Throwable $th) {
			//throw $th;
			@$num[6] = array();
		}

		return $num ;	

	}
	public function insert($data)
	{
		$sql = "INSERT INTO clientes (cedula,nombre,apellido_paterno,apellido_materno,edad,direccion,ocupacion,telefono_cel,telefono_oficial,email,fecha_actual,tipo_cliente) VALUES (:cedula, :nombre, :apellido_paterno, :apellido_materno,:edad, :direccion, :ocupacion, :telefono_cel, :telefono_oficial, :email, :fecha_actual, :tipo_cliente )";
		try{
			//var_dump($this->pdo); exit;
			//print_r($data);
			$stmt= $this->pdo->prepare($sql);
			$stmt->execute($data);
			
			header('Content-type: application/json');
			$message = [ 'msn' => 'Se Inserto el Cliente => '.$data["nombre"]." ".$data["apellido_paterno"], 'valor' => 1 ];
			return json_encode( $message );
		}
		catch (Exception $e){
			$this->pdo->rollback();
			//throw $e;
			header('Content-type: application/json');
			$message = [ 'msn' => 'Error RollBack => '.$e, 'valor' => 0 ];
			return json_encode( $message );
		}
		
	}
	public function update($id,$data)
	{
		
		$sql = "UPDATE clientes SET cedula=:cedula,nombre=:nombre,apellido_paterno=:apellido_paterno,apellido_materno=:apellido_materno, edad=:edad,direccion=:direccion,ocupacion=:ocupacion,telefono_cel=:telefono_cel,telefono_oficial=:telefono_oficial,email=:email, fecha_actual=:fecha_actual,tipo_cliente=:tipo_cliente WHERE id_cliente=". $id ;
		try{
			//var_dump($this->pdo); exit;
			//print_r($data);
			//echo $sql; exit;
			$stmt= $this->pdo->prepare($sql);
			$stmt->execute($data);
			header('Content-type: application/json');
			$message = [ 'msn' => 'Se Actualizo el Cliente => '.$data["nombre"]." ".$data["apellido_paterno"], 'valor' => 1 ];
			return json_encode( $message );
		}
		catch (Exception $e){
			echo $e; echo "<br>";
			$this->pdo->rollback();
			//throw $e;
			header('Content-type: application/json');
			$message = [ 'msn' => 'Error RollBack => '.$e, 'valor' => 0 ];
			return json_encode( $message );
		}
		
	}
	public function delete($id)
	{
		$sql = "DELETE FROM clientes WHERE id_cliente=". $id ;
		try{
			//var_dump($this->pdo); exit;
			//print_r($data);
			$stmt= $this->pdo->prepare($sql);
			$stmt->execute();
			
			header('Content-type: application/json');
			$message = [ 'msn' => 'Se Elimino el Cliente => '.$id , 'valor' => 1 ];
			return json_encode( $message );
		}
		catch (Exception $e){
			$this->pdo->rollback();
			//throw $e;
			header('Content-type: application/json');
			$message = [ 'msn' => 'Error RollBack => '.$e, 'valor' => 0 ];
			return json_encode( $message );
		}
	}
	
}


?>