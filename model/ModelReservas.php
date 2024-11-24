<?php

require_once ("config/db_local.php");


Class ModelReservas extends Conexiones_local{
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
	public function mostrar_Reservas_g_anual($ids,$anio)
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
	public function mostrar_reservas_por_vencer_x_hoy($ids)
	{	
		$sql = " SELECT fr.idfpos_reservas, fr.id_contact,fp.nombre_completo, fc.name,fr.fpos_fecha2,DATEDIFF(fr.fpos_fecha2,NOW()) AS dias_transcurrico
		FROM fpos_reservas fr, fpos_pet fp, fpos_cubiculo fc WHERE fr.idfpos_pet = fp.idfpos_pet 
		AND fr.idfpos_cubiculo= fc.idfpos_cubiculo AND fr.fpos_bussinesid=".$ids.";";

		//$sql = "SELECT fr.idfpos_reservas, fr.id_contact,fp.nombre_completo, fc.name,fr.fpos_fecha2,DATEDIFF(fr.fpos_fecha2,NOW()) AS dias_transcurrico
		//FROM fpos_reservas fr, fpos_pet fp, fpos_cubiculo fc WHERE fr.idfpos_pet = fp.idfpos_pet 
		//AND fr.idfpos_cubiculo= fc.idfpos_cubiculo AND fr.fpos_bussinesid=".$ids." AND DATEDIFF(fr.fpos_fecha2,NOW()) <= 10 ;
		//";

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
			@$num[6] = array();
		}
		
		return $num ;
		//print_r($datos);
		//return $datos;
	}
	public function mostrar_ajax($idbus)
	{
		//$sentencia = "select * from countries";
		/*$sentencia = "Select t1.id_cliente,t1.cedula,t1.nombre,t1.apellido_paterno,t1.apellido_materno,t1.edad,t1.direccion,t1.ocupacion,t1.telefono_cel as celular ,t1.telefono_oficial as telefono ,t1.email,t2.nombre_tipo from clientes t1, tipo_cliente t2 where t1.tipo_cliente= t2.id_tipocliente";*/
		//$sql = "SELECT ct.id,ct.contact_id,ct.name,ct.first_name,ct.email,CONCAT(ct.city,',',ct.state,',',ct.country) AS DIRECCION,ct.mobile, ct.custom_field1 AS NOMBRE_PERRO,ct.custom_field2 AS RAZA,ct.custom_field5 AS Vac_Rabia_Venc, ct.custom_field6 AS Vac_Bordetela_Venc,ct.custom_field7 AS Vac_Multiple_Venc, ct.custom_field8 AS Desparacitante_Venc FROM contacts ct WHERE ct.business_id=3";
		
		$sql = "SELECT fr.idfpos_reservas, fr.id_contact, concat(fp.name,' ',fp.apellido ) AS Pet, fc.name AS Cubiculo, fr.fpos_fecha1
        ,fr.fpos_fecha2, fr.fpos_fecha_system
        FROM fpos_reservas fr, fpos_pet fp, fpos_cubiculo fc
        WHERE fp.idfpos_pet=fr.idfpos_pet AND fc.idfpos_cubiculo = fr.idfpos_cubiculo AND fr.fpos_bussinesid=".$idbus.";";

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
	public function info_validator($bus)
	{
		
		
		$sql = " SELECT * FROM fpos_bussines_validator fbv
		WHERE fbv.id_bussines=$bus AND fbv.validator=1";
		//echo $sql;
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
	public function update_color($id,$data)
	{
		
		$sql = "UPDATE fpos_bussines_validator SET front_color=?,sider_color=? WHERE id_bussines_validator=". $id ;
		try{
			//var_dump($this->pdo); exit;
			//print_r($data);
			//echo $sql; exit;
			$stmt= $this->pdo->prepare($sql);
			$stmt->execute($data);
			header('Content-type: application/json');
			$message = [ 'msn' => 'Se Actualizo Configuracion color => ', 'valor' => 1 ];
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
	public function update_img($id,$data)
	{
		
		$sql = "UPDATE fpos_bussines_validator SET url=? WHERE id_bussines_validator=". $id ;
		try{
			//var_dump($this->pdo); exit;
			//print_r($data);
			//echo $sql; exit;
			$stmt= $this->pdo->prepare($sql);
			$stmt->execute($data);
			header('Content-type: application/json');
			$message = [ 'msn' => 'Se Actualizo Configuracion Logotipo => ', 'valor' => 1 ];
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
	public function getidreserva($buscar,$busines){
		$sql="SELECT fr.*,CONCAT(fp.name,' ',fp.apellido) AS completo, fc.name FROM fpos_reservas fr,fpos_pet fp, fpos_cubiculo fc
		WHERE fr.idfpos_pet=fp.idfpos_pet AND fr.idfpos_cubiculo=fc.idfpos_cubiculo
		AND fr.idfpos_reservas=".$buscar." AND fr.fpos_bussinesid=".$busines."";

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
		$sql = "INSERT INTO fpos_reservas (id_contact,idfpos_pet,idfpos_cubiculo,fpos_fecha1,fpos_fecha2,fpos_fecha_system,fpos_bussinesid) VALUES (:id_contact, :idfpos_pet, :idfpos_cubiculo, :fpos_fecha1, :fpos_fecha2, :fpos_fecha_system, :fpos_bussinesid)";
		try{
			//var_dump($this->pdo); exit;
			//print_r($data);
			//$this->pdo->beginTransaction(); 
			$stmt= $this->pdo->prepare($sql);
			$stmt->execute($data);

			//$this->pdo->commit();
			return $this->pdo->lastInsertId();
			
			//header('Content-type: application/json');
			//$message = [ 'msn' => 'Se Inserto la Reserva => ', 'idcubiculo' => $data['idfpos_cubiculo'] ];
			//return json_encode( $message );
		}
		catch (Exception $e){
			$this->pdo->rollback();
			//throw $e;
			//header('Content-type: application/json');
			//$message = [ 'msn' => 'Error RollBack => '.$e, 'idcubiculo' => 0 ];
			//return json_encode( $message );
			return 0;
		}
		
	}
	public function update($id,$data)
	{
		
		$sql = "UPDATE fpos_reservas SET idfpos_cubiculo=:idfpos_cubiculo,fpos_fecha1=:fpos_fecha1,fpos_fecha2=:fpos_fecha2,fpos_fecha_system=:fpos_fecha_system WHERE idfpos_reservas=". $id ;
		try{
			//var_dump($this->pdo); exit;
			//print_r($data);
			//echo $sql; exit;
			$stmt= $this->pdo->prepare($sql);
			$stmt->execute($data);
			header('Content-type: application/json');
			$message = [ 'msn' => 'Se Actualizo La Reserva => '.$data["idfpos_cubiculo"], 'valor' => 1 ];
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
	public function update_cubiculo($id)
	{
		
		$sql = "UPDATE fpos_cubiculo SET status=1 WHERE idfpos_cubiculo=". $id ;
		try{
			//var_dump($this->pdo); exit;
			//print_r($data);
			//echo $sql; exit;
			$stmt= $this->pdo->prepare($sql);
			$stmt->execute();
			header('Content-type: application/json');
			$message = [ 'msn' => 'Se Actualizo el Cubiculo => '.$id, 'valor' => 1 ];
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
	public function update_bajar_cubiculo($id)
	{
		
		$sql = "UPDATE fpos_cubiculo SET status=0 WHERE idfpos_cubiculo=". $id ;
		try{
			//var_dump($this->pdo); exit;
			//print_r($data);
			//echo $sql; exit;
			$stmt= $this->pdo->prepare($sql);
			$stmt->execute();
			header('Content-type: application/json');
			$message = [ 'msn' => 'Se Actualizo el Cubiculo => '.$id, 'valor' => 1 ];
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
		$sql = "DELETE FROM fpos_reservas WHERE idfpos_reservas=". $id ;
		try{
			//var_dump($this->pdo); exit;
			//print_r($data);
			$stmt= $this->pdo->prepare($sql);
			$stmt->execute();
			
			header('Content-type: application/json');
			$message = [ 'msn' => 'Se Elimino La Reserva => '.$id , 'valor' => 1 ];
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