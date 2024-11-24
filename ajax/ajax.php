<?php
//include("config/config.php");
require_once ("../model/ModelAjax.php");

if ($_SERVER["REQUEST_METHOD"]=='GET') {
    session_start();
    
    if (isset($_GET['ob'])) {
        if ($_GET['ob']=="ajax_razas") {
            # code...
            //echo "cai aki", exit;
            $modelo = new ModelAjax;
            @$data = $modelo->ajax_raza();
            //print_r($data); exit;
           // @$fila=$data[0];
           //$data=array($data);
            header('Content-type: application/json');
		    echo json_encode($data,JSON_PARTIAL_OUTPUT_ON_ERROR); //exit;
            //print_r($data); exit;

          
        }else if($_GET['ob']=="cant_dashboard"){
            $ids=$_SESSION['SESSION_NAMES'][2];
            $modelo = new ModelAjax;
            @$data = $modelo->ajax_dashboard($ids);
           // @$fila=$data[0];
           //$data=array($data);
            header('Content-type: application/json');
		    echo json_encode($data,JSON_PARTIAL_OUTPUT_ON_ERROR); exit;

         }else if($_GET['ob']=="cant_masc"){
            $ids=$_SESSION['SESSION_NAMES'][2];
            $id_contact=$_REQUEST['id'];
            $modelo = new ModelAjax;
            @$data = $modelo->ajax_cant_pet_idcontact($id_contact,$ids);
           // @$fila=$data[0];
           //$data=array($data);
            header('Content-type: application/json');
		    echo json_encode($data,JSON_PARTIAL_OUTPUT_ON_ERROR); exit;

         }else if($_GET['ob']=="grafica1"){
            $ids=$_SESSION['SESSION_NAMES'][2];
            $modelo = new ModelAjax;
            @$data = $modelo->ajax_grafica1($ids,date("Y"));

            $meses=array();
            $valores=array();

            //$respuesta=[];
            foreach ($data as $rows) {
            # code...
                //print_r($rows); exit;
                $valores[]=$rows[0];	
			    $meses[]=$rows[1];
            }

            $respuesta = [
                "etiquetas" => $meses,
                "datos" => $valores
            ];

            //print_r($respuesta); exit;


            header('Content-type: application/json');
		    echo json_encode($respuesta,JSON_PARTIAL_OUTPUT_ON_ERROR); exit;

         }else if($_GET['ob']=="vacunas"){
            $ids=$_GET['v'];
            $modelo = new ModelAjax;
            @$data = $modelo->ajax_vacunas($ids);
           // @$fila=$data[0];
           //$data=array($data);
            header('Content-type: application/json');
		    echo json_encode($data,JSON_PARTIAL_OUTPUT_ON_ERROR); exit;

         }else if($_GET['ob']=="fechas"){
            //$ids=$_GET['v'];
            $ids=$_SESSION['SESSION_NAMES'][2];
            $modelo = new ModelAjax;
            @$data = $modelo->mostrar_fechas($ids);
           // @$fila=$data[0];
           //$data=array($data);
            header('Content-type: application/json');
		    echo json_encode($data); exit;

         }else if($_GET['ob']=="tipo_pet"){
            $modelo = new ModelAjax;
            @$data = $modelo->ajax_tipo_pet();
           // @$fila=$data[0];
           //$data=array($data);
            header('Content-type: application/json');
		    echo json_encode($data); exit;

         }else if($_GET['ob']=="listar_mascotas"){
            $id=$_GET['id'];
            $bus=$_SESSION['SESSION_NAMES'][2];
            $modelo = new ModelAjax;
            @$data = $modelo->ajax_petxcontact($id,$bus);
           // @$fila=$data[0];
           //$data=array($data);
            header('Content-type: application/json');
		    echo json_encode($data); exit;

         }else if($_GET['ob']=="update_cub"){
            $id=$_GET['id'];
            $stat=$_GET['st'];
            $modelo = new ModelAjax;
            @$data = $modelo->update_cub($id,$stat);
           // @$fila=$data[0];
           //$data=array($data);
            header('Content-type: application/json');
		    echo json_encode($data); exit;

         }else if($_GET['ob']=="ver_cubiculo"){
            //$id=$_GET['id'];
            $modelo = new ModelAjax;
            @$data = $modelo->ajax_cubiculos();
           // @$fila=$data[0];
           //$data=array($data);
            header('Content-type: application/json');
		    echo json_encode($data); exit;

         }else if($_GET['ob']=="crear"){
           /* echo "pasoaka";
            if (isset($_POST['inputcontactid'])) {
                $ids=$_POST['inputcontactid'];
                $modelo = ModelContacts::getid($ids);
                echo "paso aka";
                echo $modelo; exit;
            }*/

            


            //include("view/viewer/header.php");            
            //include("view/Reservas/crear.php");
            //include("view/viewer/foot.php");
        }else{

            /*$modelo = new ModelAjax;
            @$data = $modelo->mostrar_ajax();
            //echo "paso aka";
            @$tabla="";
            //print_r(@$data); exit;
            
            
            foreach ($data as &$fila) {
                if(sizeof($fila)==0){
                    $tabla="";
                }else{
                    $opciones = "<a class='btn btn-info' href='agenda.php?v=kardes&id=".@$fila[0]."' role='button'>Ver Info</a>";
                    $tabla.= "<tr><td>".@$fila[0]."</td><td>".@$fila[1]."</td><td>".@$fila[2]."</td><td>".@$fila[3]."</td><td>".@$fila[4]."</td><td>".@$fila[5]."</td><td>".@$fila[6]."</td><td>".$opciones."</td></tr>";
                }
               
            }

            include("view/viewer/header.php");
            include("view/Reservas/listar_reservas.php");
            include("view/viewer/foot.php");*/
        }
            
    }else{
            //echo $_SESSION['ID_SESSION']; die(); Fortes2_2022
        header("Location: index.php");
        die();
    }

}else{
    if ($_SERVER["REQUEST_METHOD"]=='POST') {
       //echo "PASO X POST <br>";
       /* if (isset($_POST['buscar_contacts'])) {
            $ids=$_POST['inputcontactid'];
            $modelo = new ModelContacts;
            @$data = $modelo->getid($ids);
            //echo "paso aka";
            @$tabla="";
            //print_r(@$data); exit;
            
            
            foreach ($data as &$fila) {
                if(sizeof($fila)==0){
                    $tabla="";
                }else{
                    $opciones = "<a class='btn btn-info' href='agenda.php?v=kardes&id=".@$fila[1]."' role='button'>Ver Info</a>";
                    $tabla.= "<tr><td>".@$fila[0]."</td><td>".@$fila[1]."</td><td>".@$fila[2]."</td><td>".@$fila[3]."</td><td>".@$fila[4]."</td><td>".@$fila[5]."</td><td>".@$fila[6]."</td><td>".@$fila[7]."</td><td>".@$fila[8]."</td><td>".@$fila[9]."</td><td>".@$fila[10]."</td><td>".@$fila[11]."</td><td>".@$fila[12]."</td><td>".$opciones."</td></tr>";
                }
               
            }
            include("view/viewer/header.php");            
            include("view/agenda/search_contacts.php");
            include("view/viewer/foot.php");

        }*/
    }
    //
    
}


    
?>