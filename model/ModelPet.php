<?php

require_once ("config/db_local.php");


Class ModelPet extends Conexiones_local{
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
	public function mostrar_ajax($id_business)
	{
		//$sentencia = "select * from countries";
		/*$sentencia = "Select t1.id_cliente,t1.cedula,t1.nombre,t1.apellido_paterno,t1.apellido_materno,t1.edad,t1.direccion,t1.ocupacion,t1.telefono_cel as celular ,t1.telefono_oficial as telefono ,t1.email,t2.nombre_tipo from clientes t1, tipo_cliente t2 where t1.tipo_cliente= t2.id_tipocliente";*/
		//$sql = "SELECT ct.id,ct.contact_id,ct.name,ct.first_name,ct.email,CONCAT(ct.city,',',ct.state,',',ct.country) AS DIRECCION,ct.mobile, ct.custom_field1 AS NOMBRE_PERRO,ct.custom_field2 AS RAZA,ct.custom_field5 AS Vac_Rabia_Venc, ct.custom_field6 AS Vac_Bordetela_Venc,ct.custom_field7 AS Vac_Multiple_Venc, ct.custom_field8 AS Desparacitante_Venc FROM contacts ct WHERE ct.business_id=3";
		
		$sql = "SELECT fp.idfpos_pet,fp.id_contact,fp.name,fp.apellido,fp.peso,fp.talla,fr.name AS raza
        ,ft.name AS Tipo,fp.fecha_nac,fp.fecha_creacion
        FROM fpos_pet fp, fpos_raza fr, fpos_tipo_pet ft
        WHERE fp.idfpos_raza=fr.idfpos_raza AND fp.idfpos_tipo_pet=ft.idfpos_tipo_pet AND fp.id_bussines=".$id_business.";";

		//echo $sql; exit;
		try {
			//code...
			$stmt= $this->pdo->prepare($sql);
			$stmt->execute();
			
			$num = $stmt->fetchAll();
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
	public function getid($buscar,$contact)
	{
		$sql = "SELECT fp.*,fr.name AS raza, ft.name AS tipo FROM fpos_pet fp, fpos_raza fr, fpos_tipo_pet ft
		WHERE fp.idfpos_raza=fr.idfpos_raza AND fp.idfpos_tipo_pet=ft.idfpos_tipo_pet
		AND fp.id_bussines=".$contact." AND fp.idfpos_pet=".$buscar." ;";
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
                @$num[14] = array();
            }
			
			return $num ;	
	}
	public function getid_vacunas($buscar)
	{
		$sql = "SELECT fpv.idfpos_pet_vacunas,CONCAT(fv.name,'!',IFNULL(fv.refuerzo,' ')) AS VACUNA,fpv.fecha_registro,fpv.periodo FROM fpos_pet_vacunas fpv, fpos_vacunas fv
		WHERE fpv.idfpos_vacunas=fv.idfpos_vacunas AND fpv.idfpos_pet=".$buscar.";";
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
                @$num[4] = array();
            }
			
			return $num ;	
	}
	public function getid_vacunas_x_id($buscar)
	{
		$sql = "SELECT fpv.idfpos_pet_vacunas,CONCAT(fv.name,'!',IFNULL(fv.refuerzo,' ')) AS VACUNA,fpv.fecha_registro,fpv.periodo FROM fpos_pet_vacunas fpv, fpos_vacunas fv
		WHERE fpv.idfpos_vacunas=fv.idfpos_vacunas AND fpv.idfpos_pet_vacunas=".$buscar.";";
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
                @$num[4] = array();
            }
			
			return $num ;	
	}
	public function getid_pet($buscar,$id)
	{
		/*$sql = "SELECT fpv.idfpos_pet_vacunas,fp.idfpos_pet, fp.name, fp.apellido, fz.name,fpv.fecha_registro,fpv.idfpos_vacunas
		,concat(fv.name,' ',IFNULL(fv.refuerzo,' ')) AS VACUNAS
		FROM fpos_pet_vacunas fpv, fpos_pet fp, fpos_vacunas fv, fpos_raza fz
		WHERE fp.idfpos_pet=fpv.idfpos_pet AND fv.idfpos_vacunas=fpv.idfpos_vacunas
		AND fp.idfpos_raza=fz.idfpos_raza AND fp.id_contact='".$buscar."';";*/
		$sql="SELECT fpv.idfpos_pet_vacunas,fp.idfpos_pet, fp.name, fp.apellido, fz.name,fpv.fecha_registro,fpv.idfpos_vacunas 
		,concat(fv.name,' ',IFNULL(fv.refuerzo,' ')) AS VACUNAS,fpv.periodo,IF(DATEDIFF(fpv.fecha_registro,NOW()) <=fpv.periodo,0,1) AS SI_VENCIO 
		FROM fpos_pet_vacunas fpv, fpos_pet fp, fpos_vacunas fv, fpos_raza fz WHERE fp.idfpos_pet=fpv.idfpos_pet 
		AND fv.idfpos_vacunas=fpv.idfpos_vacunas AND fp.idfpos_raza=fz.idfpos_raza AND fp.id_contact=".$buscar." AND fp.id_bussines=".$id.";";
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
                @$num[10] = array();
            }
			
			return $num ;	
	}
	public function getid_pet_minimo($buscar,$id)
	{
			$sql="SELECT fp.idfpos_pet, fp.nombre_completo,fr.name  FROM fpos_pet fp, fpos_raza fr
			WHERE fp.idfpos_raza=fr.idfpos_raza AND fp.id_bussines=".$id." AND fp.id_contact=".$buscar." ;";
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
                @$num[3] = array();
            }
			
			return $num ;	
	}
	public function mostrar_vacunas_x_vencer($id)
	{
			$sql="SELECT fpv.idfpos_pet_vacunas,fp.idfpos_pet, fp.name, fp.apellido, fz.name,fpv.fecha_registro,fpv.idfpos_vacunas 
			,concat(fv.name,' ',IFNULL(fv.refuerzo,' ')) AS VACUNAS,fpv.periodo,DATEDIFF(fpv.fecha_registro,NOW()) AS canti2
			,IF(DATEDIFF(fpv.fecha_registro,NOW()) <=fpv.periodo,0,1) AS SI_VENCIO ,fp.id_contact
			FROM fpos_pet_vacunas fpv, fpos_pet fp, fpos_vacunas fv, fpos_raza fz WHERE fp.idfpos_pet=fpv.idfpos_pet 
			AND fv.idfpos_vacunas=fpv.idfpos_vacunas AND fp.idfpos_raza=fz.idfpos_raza AND fp.id_bussines=".$id."
			AND DATEDIFF(fpv.fecha_registro,NOW()) <=8;";
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
                @$num[12] = array();
            }
			
			return $num ;	
	}
	public function getid_pet_id_vacuna($buscar,$id)
	{
		/*$sql = "SELECT fpv.idfpos_pet_vacunas,fp.idfpos_pet, fp.name, fp.apellido, fz.name,fpv.fecha_registro,fpv.idfpos_vacunas
		,concat(fv.name,' ',IFNULL(fv.refuerzo,' ')) AS VACUNAS
		FROM fpos_pet_vacunas fpv, fpos_pet fp, fpos_vacunas fv, fpos_raza fz
		WHERE fp.idfpos_pet=fpv.idfpos_pet AND fv.idfpos_vacunas=fpv.idfpos_vacunas
		AND fp.idfpos_raza=fz.idfpos_raza AND fp.id_contact='".$buscar."';";*/
		$sql=" SELECT fpv.idfpos_pet_vacunas,fp.idfpos_pet, fp.name, fp.apellido, fz.name,fpv.fecha_registro,fpv.idfpos_vacunas 
		,concat(fv.name,' ',IFNULL(fv.refuerzo,' ')) AS VACUNAS,fpv.periodo, DATEDIFF(NOW(),fpv.fecha_registro) AS dias
		,IF(DATEDIFF(NOW(),fpv.fecha_registro) <=fpv.periodo,0,1) AS SI_VENCIO
		FROM fpos_pet_vacunas fpv, fpos_pet fp, fpos_vacunas fv, fpos_raza fz 
		WHERE fp.idfpos_pet=fpv.idfpos_pet
		 AND fv.idfpos_vacunas=fpv.idfpos_vacunas AND fp.idfpos_raza=fz.idfpos_raza AND fpv.idfpos_pet_vacunas=".$buscar." AND fp.id_bussines=".$id.";";
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
                @$num[10] = array();
            }
			
			return $num ;	
	}
	public function insert_pet($data)
	{
		$sql = "INSERT INTO fpos_pet (name,apellido,nombre_completo,id_contact,peso,talla,fecha_creacion,fecha_nac,idfpos_raza,idfpos_tipo_pet,id_bussines) VALUES (:name, :apellido, :nombre_completo, :id_contact,:peso, :talla, :fecha_creacion, :fecha_nac, :idfpos_raza, :idfpos_tipo_pet, :id_bussines)";
		try{
			//var_dump($this->pdo); exit;
			//print_r($data);
			$stmt= $this->pdo->prepare($sql);
			$stmt->execute($data);
			//$stmt->commit();
            return $this->pdo->lastInsertId();

			//header('Content-type: application/json');
			//$message = [ 'msn' => 'Se Inserto el Cliente => '.$data["nombre"]." ".$data["apellido_paterno"], 'valor' => 1 ];
			//return json_encode( $message );
		}
		catch (Exception $e){
			$this->pdo->rollback();
			//throw $e;
            return 0;
			//header('Content-type: application/json');
			//$message = [ 'msn' => 'Error RollBack => '.$e, 'valor' => 0 ];
			//return json_encode( $message );
		}
		
	}
    public function insert_vac($data)
	{
		$sql = "INSERT INTO fpos_pet_vacunas (idfpos_vacunas,idfpos_pet,fecha_registro,periodo) VALUES (:idfpos_vacunas, :idfpos_pet, :fecha_registro, :periodo)";
		try{
			//var_dump($this->pdo); exit;
			//print_r($data);
			$stmt= $this->pdo->prepare($sql);
			$stmt->execute($data);
			
			header('Content-type: application/json');
			$message = [ 'msn' => 'Se Inserto Vacuna => '.$data["idfpos_vacunas"]." ", 'valor' => 1 ];
			echo json_encode( $message );
		}
		catch (Exception $e){
			$this->pdo->rollback();
			//throw $e;
			header('Content-type: application/json');
			$message = [ 'msn' => 'Error RollBack => '.$e, 'valor' => 0 ];
			echo json_encode( $message );
		}
		
	}
	public function update($id,$data)
	{
		
		$sql = "UPDATE fpos_pet SET name=:name,apellido=:apellido,nombre_completo=:nombre_completo, id_contact=:id_contact,peso=:peso,talla=:talla,fecha_creacion=:fecha_creacion,fecha_nac=:fecha_nac,idfpos_raza=:idfpos_raza, idfpos_tipo_pet=:idfpos_tipo_pet WHERE idfpos_pet=". $id ;
		try{
			//var_dump($this->pdo); exit;
			//print_r($data);
			//echo $sql; exit;
			$stmt= $this->pdo->prepare($sql);
			$stmt->execute($data);
			header('Content-type: application/json');
			$message = [ 'msn' => 'Se Actualizo la Mascota => '.$data["name"], 'valor' => 1 ];
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
	public function update_vacuna($id,$data)
	{
		
		$sql = "UPDATE fpos_pet_vacunas SET idfpos_vacunas=:idfpos_vacunas,fecha_registro=:fecha_registro,periodo=:periodo WHERE idfpos_pet_vacunas=". $id ;
		try{
			//var_dump($this->pdo); exit;
			//print_r($data);
			//echo $sql; exit;
			$stmt= $this->pdo->prepare($sql);
			$stmt->execute($data);
			header('Content-type: application/json');
			$message = [ 'msn' => 'Se Actualizo La Vacuna => '.$data["idfpos_vacunas"], 'valor' => 1 ];
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
		$sql = "DELETE FROM fpos_pet WHERE idfpos_pet=". $id ;
		try{
			//var_dump($this->pdo); exit;
			//print_r($data);
			$stmt= $this->pdo->prepare($sql);
			$stmt->execute();
			
			header('Content-type: application/json');
			$message = [ 'msn' => 'Se Elimino la Mascota => '.$id , 'valor' => 1 ];
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
	public function delete_vacun($id,$id_pet)
	{
		$sql = "DELETE FROM fpos_pet_vacunas WHERE idfpos_pet=".$id_pet." AND idfpos_pet_vacunas=". $id ;
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