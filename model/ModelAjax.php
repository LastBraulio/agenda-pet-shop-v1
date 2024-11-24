<?php

require_once ("../config/db_local.php");


Class ModelAjax extends Conexiones_local{
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
	public function mostrar_fechas($ids)
	{
		//$sentencia = "select * from countries";
		/*$sentencia = "Select t1.id_cliente,t1.cedula,t1.nombre,t1.apellido_paterno,t1.apellido_materno,t1.edad,t1.direccion,t1.ocupacion,t1.telefono_cel as celular ,t1.telefono_oficial as telefono ,t1.email,t2.nombre_tipo from clientes t1, tipo_cliente t2 where t1.tipo_cliente= t2.id_tipocliente";*/
		$sentencia = "SELECT concat(fr.id_contact) AS id, CONCAT('Reserva : ',fr.idfpos_reservas,' Mascota: ',fr.idfpos_pet) AS title 
		,CONCAT('reservas.php?v=ver&id=',fr.idfpos_reservas) AS 'url', fr.fpos_fecha1 AS 'start', fr.fpos_fecha2 AS 'end'
		FROM fpos_reservas fr WHERE fr.fpos_bussinesid=".$ids."; ";
  
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
		//$valor = array($num);
		//$valor = array(
		//"data"=> $num
		//()); 
		return $num;
		//header('Content-type: application/json');
		//echo json_encode($valor);
		//print_r($datos);
		//return $datos;
	}
	public function ajax_raza()
	{
		//$sentencia = "select * from countries";
		/*$sentencia = "Select t1.id_cliente,t1.cedula,t1.nombre,t1.apellido_paterno,t1.apellido_materno,t1.edad,t1.direccion,t1.ocupacion,t1.telefono_cel as celular ,t1.telefono_oficial as telefono ,t1.email,t2.nombre_tipo from clientes t1, tipo_cliente t2 where t1.tipo_cliente= t2.id_tipocliente";*/
		//$sql = "SELECT ct.id,ct.contact_id,ct.name,ct.first_name,ct.email,CONCAT(ct.city,',',ct.state,',',ct.country) AS DIRECCION,ct.mobile, ct.custom_field1 AS NOMBRE_PERRO,ct.custom_field2 AS RAZA,ct.custom_field5 AS Vac_Rabia_Venc, ct.custom_field6 AS Vac_Bordetela_Venc,ct.custom_field7 AS Vac_Multiple_Venc, ct.custom_field8 AS Desparacitante_Venc FROM contacts ct WHERE ct.business_id=3";
		
		$sql = "SELECT ra.idfpos_raza as id, ra.name FROM fpos_raza ra;";
		
		try {
			//code...
			$stmt= $this->pdo->prepare($sql);
			$stmt->execute();
			
			$num = $stmt->fetchAll();
			/*$valor = array();
			$valor = array(
			"data"=> $num
			); */
		} catch (\Throwable $th) {
			//throw $th;
			@$num[2] = array();
		}
		
		return $num ;
		//print_r($datos);
		//return $datos;
	}
	public function ajax_tipo_pet()
	{
		//$sentencia = "select * from countries";
		/*$sentencia = "Select t1.id_cliente,t1.cedula,t1.nombre,t1.apellido_paterno,t1.apellido_materno,t1.edad,t1.direccion,t1.ocupacion,t1.telefono_cel as celular ,t1.telefono_oficial as telefono ,t1.email,t2.nombre_tipo from clientes t1, tipo_cliente t2 where t1.tipo_cliente= t2.id_tipocliente";*/
		//$sql = "SELECT ct.id,ct.contact_id,ct.name,ct.first_name,ct.email,CONCAT(ct.city,',',ct.state,',',ct.country) AS DIRECCION,ct.mobile, ct.custom_field1 AS NOMBRE_PERRO,ct.custom_field2 AS RAZA,ct.custom_field5 AS Vac_Rabia_Venc, ct.custom_field6 AS Vac_Bordetela_Venc,ct.custom_field7 AS Vac_Multiple_Venc, ct.custom_field8 AS Desparacitante_Venc FROM contacts ct WHERE ct.business_id=3";
		
		$sql = "SELECT ft.idfpos_tipo_pet AS id, ft.name FROM fpos_tipo_pet ft;";

		try {
			//code...
			$stmt= $this->pdo->prepare($sql);
			$stmt->execute();
			
			$num = $stmt->fetchAll();
			/*$valor = array();
			$valor = array(
			"data"=> $num
			); */
		} catch (\Throwable $th) {
			//throw $th;
			@$num[2] = array();
		}
		
		return $num ;
		//print_r($datos);
		//return $datos;
	}
	public function ajax_dashboard($ids)
	{
		//$sentencia = "select * from countries";
		/*$sentencia = "Select t1.id_cliente,t1.cedula,t1.nombre,t1.apellido_paterno,t1.apellido_materno,t1.edad,t1.direccion,t1.ocupacion,t1.telefono_cel as celular ,t1.telefono_oficial as telefono ,t1.email,t2.nombre_tipo from clientes t1, tipo_cliente t2 where t1.tipo_cliente= t2.id_tipocliente";*/
		//$sql = "SELECT ct.id,ct.contact_id,ct.name,ct.first_name,ct.email,CONCAT(ct.city,',',ct.state,',',ct.country) AS DIRECCION,ct.mobile, ct.custom_field1 AS NOMBRE_PERRO,ct.custom_field2 AS RAZA,ct.custom_field5 AS Vac_Rabia_Venc, ct.custom_field6 AS Vac_Bordetela_Venc,ct.custom_field7 AS Vac_Multiple_Venc, ct.custom_field8 AS Desparacitante_Venc FROM contacts ct WHERE ct.business_id=3";
		
		$sql = "SELECT * FROM (SELECT COUNT(fr.idfpos_reservas) AS CANT_RESERVAS, fr.fpos_bussinesid FROM fpos_reservas fr
		GROUP BY fr.fpos_bussinesid) tb1,
		(SELECT COUNT(fp.idfpos_pet) AS CANT_PET, fp.id_bussines FROM fpos_pet fp GROUP BY fp.id_bussines) tb2
		WHERE tb1.fpos_bussinesid=tb2.id_bussines AND tb1.fpos_bussinesid=".$ids.";";
		//echo $sql; exit;
		try {
			//code...
			$stmt= $this->pdo->prepare($sql);
			$stmt->execute();
			
			$num = $stmt->fetchAll();
			/*$valor = array();
			$valor = array(
			"data"=> $num
			); */
		} catch (\Throwable $th) {
			//throw $th;
			@$num[2] = array();
		}
		
		return $num ;
		//print_r($datos);
		//return $datos;
	}
	public function ajax_cant_pet_idcontact($id_contact,$ids)
	{
		//$sentencia = "select * from countries";
		/*$sentencia = "Select t1.id_cliente,t1.cedula,t1.nombre,t1.apellido_paterno,t1.apellido_materno,t1.edad,t1.direccion,t1.ocupacion,t1.telefono_cel as celular ,t1.telefono_oficial as telefono ,t1.email,t2.nombre_tipo from clientes t1, tipo_cliente t2 where t1.tipo_cliente= t2.id_tipocliente";*/
		//$sql = "SELECT ct.id,ct.contact_id,ct.name,ct.first_name,ct.email,CONCAT(ct.city,',',ct.state,',',ct.country) AS DIRECCION,ct.mobile, ct.custom_field1 AS NOMBRE_PERRO,ct.custom_field2 AS RAZA,ct.custom_field5 AS Vac_Rabia_Venc, ct.custom_field6 AS Vac_Bordetela_Venc,ct.custom_field7 AS Vac_Multiple_Venc, ct.custom_field8 AS Desparacitante_Venc FROM contacts ct WHERE ct.business_id=3";
		
		$sql = "SELECT COUNT(fp.idfpos_pet) AS CANT_PET, fp.id_bussines FROM fpos_pet fp
		WHERE fp.id_contact=".$id_contact." AND fp.id_bussines=".$ids.";";
		//echo $sql; exit;
		try {
			//code...
			$stmt= $this->pdo->prepare($sql);
			$stmt->execute();
			
			$num = $stmt->fetchAll();
			/*$valor = array();
			$valor = array(
			"data"=> $num
			); */
		} catch (\Throwable $th) {
			//throw $th;
			@$num[2] = array();
		}
		
		return $num ;
		//print_r($datos);
		//return $datos;
	}
	public function ajax_grafica1($ids,$anio)
	{	
		$sql = "SELECT ifnull(COUNT(pr.idfpos_reservas),0) AS contar,CASE 
		WHEN MONTH(pr.fpos_fecha_system) = 1 THEN 'ENERO'
		WHEN MONTH(pr.fpos_fecha_system) = 2 THEN 'FEBRERO'
		WHEN MONTH(pr.fpos_fecha_system) = 3 THEN 'MARZO'
		WHEN MONTH(pr.fpos_fecha_system) = 4 THEN 'ABRIL'
		WHEN MONTH(pr.fpos_fecha_system) = 5 THEN 'MAYO'
		WHEN MONTH(pr.fpos_fecha_system) = 6 THEN 'JUNIO'
		WHEN MONTH(pr.fpos_fecha_system) = 7 THEN 'JULIO'
		WHEN MONTH(pr.fpos_fecha_system) = 8 THEN 'AGOSTO'
		WHEN MONTH(pr.fpos_fecha_system) = 9 THEN 'SEPTIEMBRE'
		WHEN MONTH(pr.fpos_fecha_system) = 10 THEN 'OCTUBRE'
		WHEN MONTH(pr.fpos_fecha_system) = 11 THEN 'NOVIEMBRE'
		WHEN MONTH(pr.fpos_fecha_system) = 12 THEN 'DICIEMBRE'
		END AS MES
		FROM fpos_reservas pr WHERE YEAR(pr.fpos_fecha_system)=".$anio." AND pr.fpos_bussinesid=".$ids." GROUP BY MONTH(pr.fpos_fecha_system);";
		//echo $sql; exit;
		try {
			//code...
			$stmt= $this->pdo->prepare($sql);
			$stmt->execute();
			
			$num = $stmt->fetchAll();
			/*$valor = array();
			$valor = array(
			"data"=> $num
			); */
		} catch (\Throwable $th) {
			//throw $th;
			@$num[2] = array();
		}
		
		return $num ;
		//print_r($datos);
		//return $datos;
	}
	public function ajax_vacunas($id)
	{
		//$sentencia = "select * from countries";
		/*$sentencia = "Select t1.id_cliente,t1.cedula,t1.nombre,t1.apellido_paterno,t1.apellido_materno,t1.edad,t1.direccion,t1.ocupacion,t1.telefono_cel as celular ,t1.telefono_oficial as telefono ,t1.email,t2.nombre_tipo from clientes t1, tipo_cliente t2 where t1.tipo_cliente= t2.id_tipocliente";*/
		//$sql = "SELECT ct.id,ct.contact_id,ct.name,ct.first_name,ct.email,CONCAT(ct.city,',',ct.state,',',ct.country) AS DIRECCION,ct.mobile, ct.custom_field1 AS NOMBRE_PERRO,ct.custom_field2 AS RAZA,ct.custom_field5 AS Vac_Rabia_Venc, ct.custom_field6 AS Vac_Bordetela_Venc,ct.custom_field7 AS Vac_Multiple_Venc, ct.custom_field8 AS Desparacitante_Venc FROM contacts ct WHERE ct.business_id=3";
		
		$sql = "SELECT fv.idfpos_vacunas AS id, CONCAT(fv.name,'!',IFNULL(fv.refuerzo,' ')) AS name FROM fpos_vacunas fv
		WHERE fv.tipo_pet=".$id.";";

		try {
			//code...
			$stmt= $this->pdo->prepare($sql);
			$stmt->execute();
			
			$num = $stmt->fetchAll();
			/*$valor = array();
			$valor = array(
			"data"=> $num
			); */
		} catch (\Throwable $th) {
			//throw $th;
			@$num[2] = array();
		}
		
		return $num ;
		//print_r($datos);
		//return $datos;
	}
	public function ajax_petxcontact($id,$bus)
	{
		//$sentencia = "select * from countries";
		/*$sentencia = "Select t1.id_cliente,t1.cedula,t1.nombre,t1.apellido_paterno,t1.apellido_materno,t1.edad,t1.direccion,t1.ocupacion,t1.telefono_cel as celular ,t1.telefono_oficial as telefono ,t1.email,t2.nombre_tipo from clientes t1, tipo_cliente t2 where t1.tipo_cliente= t2.id_tipocliente";*/
		//$sql = "SELECT ct.id,ct.contact_id,ct.name,ct.first_name,ct.email,CONCAT(ct.city,',',ct.state,',',ct.country) AS DIRECCION,ct.mobile, ct.custom_field1 AS NOMBRE_PERRO,ct.custom_field2 AS RAZA,ct.custom_field5 AS Vac_Rabia_Venc, ct.custom_field6 AS Vac_Bordetela_Venc,ct.custom_field7 AS Vac_Multiple_Venc, ct.custom_field8 AS Desparacitante_Venc FROM contacts ct WHERE ct.business_id=3";
		
		$sql = "SELECT pt.idfpos_pet AS id, CONCAT(pt.idfpos_pet,'-',pt.nombre_completo) AS name FROM fpos_pet pt
		WHERE pt.id_contact=".$id." AND pt.id_bussines=".$bus.";";

		try {
			//code...
			$stmt= $this->pdo->prepare($sql);
			$stmt->execute();
			
			$num = $stmt->fetchAll();
			/*$valor = array();
			$valor = array(
			"data"=> $num
			); */
		} catch (\Throwable $th) {
			//throw $th;
			@$num[2] = array();
		}
		
		return $num ;
		//print_r($datos);
		//return $datos;
	}
	public function ajax_cubiculos()
	{
		//$sentencia = "select * from countries";
		/*$sentencia = "Select t1.id_cliente,t1.cedula,t1.nombre,t1.apellido_paterno,t1.apellido_materno,t1.edad,t1.direccion,t1.ocupacion,t1.telefono_cel as celular ,t1.telefono_oficial as telefono ,t1.email,t2.nombre_tipo from clientes t1, tipo_cliente t2 where t1.tipo_cliente= t2.id_tipocliente";*/
		//$sql = "SELECT ct.id,ct.contact_id,ct.name,ct.first_name,ct.email,CONCAT(ct.city,',',ct.state,',',ct.country) AS DIRECCION,ct.mobile, ct.custom_field1 AS NOMBRE_PERRO,ct.custom_field2 AS RAZA,ct.custom_field5 AS Vac_Rabia_Venc, ct.custom_field6 AS Vac_Bordetela_Venc,ct.custom_field7 AS Vac_Multiple_Venc, ct.custom_field8 AS Desparacitante_Venc FROM contacts ct WHERE ct.business_id=3";
		
		$sql = "SELECT fc.idfpos_cubiculo AS id, fc.name FROM fpos_cubiculo fc WHERE fc.`status`=0 AND fc.id_bussines=3;";

		try {
			//code...
			$stmt= $this->pdo->prepare($sql);
			$stmt->execute();
			
			$num = $stmt->fetchAll();
			/*$valor = array();
			$valor = array(
			"data"=> $num
			); */
		} catch (\Throwable $th) {
			//throw $th;
			@$num[2] = array();
		}
		
		return $num ;
		//print_r($datos);
		//return $datos;
	}
	public function info_validator($bus)
	{
		
		
		$sql = " SELECT * FROM fpos_bussines_validator fbv
		WHERE fbv.id_bussines=$bus AND fbv.validator=1";
		echo $sql;
		try {
			//code...
			$stmt= $this->pdo->prepare($sql);
			$stmt->execute();
			
			$num = $stmt->fetchAll();
			/*$valor = array();
			$valor = array(
			"data"=> $num
			); */
		} catch (\Throwable $th) {
			//throw $th;
			@$num[10] = array();
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
	public function getid($buscar)
	{
		$sql = "SELECT ct.id,ct.contact_id,ct.name,ct.first_name,ct.email,CONCAT(ct.city,',',ct.state,',',ct.country) AS DIRECCION,ct.mobile, ct.custom_field1 AS NOMBRE_PERRO,ct.custom_field2 AS RAZA,ct.custom_field5 AS Vac_Rabia_Venc, ct.custom_field6 AS Vac_Bordetela_Venc,ct.custom_field7 AS Vac_Multiple_Venc, ct.custom_field8 AS Desparacitante_Venc FROM contacts ct WHERE ct.business_id=3 AND ct.contact_id=".$buscar.";";
		//echo $sql;
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
	public function update_cub($id,$status)
	{
		
		$sql = "UPDATE fpos_cubiculo SET status=".$status." WHERE idfpos_cubiculo=". $id ;
		try{
			//var_dump($this->pdo); exit;
			//print_r($data);
			//echo $sql; exit;
			$stmt= $this->pdo->prepare($sql);
			$stmt->execute();
			header('Content-type: application/json');
			$message = [ 'msn' => 'Se Actualizo el Cubiculo => ', 'valor' => 1 ];
			return json_encode( $message );
		}
		catch (Exception $e){
			//echo $e; echo "<br>";
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