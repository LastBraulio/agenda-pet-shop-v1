<?php
//include("config/config.php");
//require_once ("model/ModelContacts.php");
include('../config/db.php');
session_start();

if (isset($_SESSION['SESSION_ID']) && (time()-$_SESSION['ONCLOCK_'])>=(60*60)) {
    //session_destroy();
    header("HTTP/1.0 500 Internal Server Error");
    echo json_encode("Sin ACCESO A API ");
    exit;
}


$modelo = new Conexiones;
if ($_SERVER["REQUEST_METHOD"]=='GET') {

    if (isset($_GET['v'])) {

        /*if(isset($_REQUEST['ky'])){
            //echo md5($_REQUEST['ky']).'<br>';
            $hash = $_REQUEST['ky'];
            //if(password_verify($_SESSION['INFO_VALID'][9],$hash)){
            echo $_SESSION['INFO_VALID'][8];
            if(password_verify($hash,$_SESSION['INFO_VALID'][8])){
                echo "true ";
                
            }else{
                echo "false ";
                //session_destroy();
                //header('Location: index.php');
                header("HTTP/1.0 500 Internal Server Error");
                echo json_encode("Sin ACCESO A API ");
                exit;
            }
            //echo $_REQUEST['ky']; exit;



        }else{
            //session_destroy();
            //header('Location: index.php');
            //exit;
            header("HTTP/1.0 500 Internal Server Error");
            echo json_encode("Sin ACCESO A API ");
            exit;

        }*/

        if ($_GET['v']=="name_contact") {
            //$ids = $_GET['id'];
            $consulta = "SELECT ct.contact_id,ct.name,ct.first_name,ct.email,CONCAT(ct.city,',',ct.state) AS DIRECCION
             FROM contacts ct WHERE ct.business_id=".$_SESSION['SESSION_NAMES'][2].";";
            //echo $consulta; exit;
            
            try {
                //code...
                $stmt= $modelo->pdo->prepare($consulta);
                $stmt->execute();
                
                @$num = $stmt->fetchAll(); 
                //print_r($num); exit;  
               
                //header('HTTP/1.1 200 OK');	
                //print_r($num);
                //die();
            } catch (\Throwable $th) {
                //throw $th;
                //echo $th;
                @$num[5] = array();
                
                //header("HTTP/1.0 500 Internal Server Error");
                //print_r($num);
                //die();
            }
            //$data=array($num);

            header('Content-type: application/json; charset=utf-8');
		    echo json_encode($num,JSON_PARTIAL_OUTPUT_ON_ERROR);exit;

            //header('Content-Type: application/json; charset=utf-8');
            //echo json_encode($num); exit;
        }else if($_GET['v']=="search_contacts"){


            $ids = $_GET['id'];
            $consulta = "SELECT ct.contact_id,ct.name,ct.first_name,ct.email,CONCAT(ct.city,',',ct.state) AS DIRECCION
             FROM contacts ct WHERE ct.contact_id=".$ids." AND ct.business_id=".$_SESSION['SESSION_NAMES'][2].";";
            //echo $consulta; exit;
            
            try {
                //code...
                $stmt= $modelo->pdo->prepare($consulta);
                $stmt->execute();
                
                @$num = $stmt->fetchAll(); 
                //print_r($num); exit;  
               
                //header('HTTP/1.1 200 OK');	
                //print_r($num);
                //die();
            } catch (\Throwable $th) {
                //throw $th;
                //echo $th;
                @$num[5] = array();
                
                //header("HTTP/1.0 500 Internal Server Error");
                //print_r($num);
                //die();
            }
            //$data=array($num);
            header('Content-Type: application/json; charset=utf-8');
            echo json_encode($num[0]); exit;

            /*if ($resultado = $mysqli->query($consulta)) {

                while ($fila = $resultado->fetch_row()) {

                    //$rerun= $fila[0];
                    header('HTTP/1.1 200 OK');	
                    //echo $fila[0];
                    print_r($fila);
                    //$fil=dirname("http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]");
                    //echo "$fil";
                    die();
                }
                $resultado->close();
            }

           header("HTTP/1.0 500 Internal Server Error");
           die();*/
          
        }else if($_GET['v']=="cant_contacts"){
            $ids = $_SESSION['SESSION_NAMES'][2];
            $consulta = "SELECT count(ct.contact_id) as CANT_CONTACTS
             FROM contacts ct WHERE ct.business_id=".$ids."";
            //echo $consulta; exit;
            
            try {
                //code...
                $stmt= $modelo->pdo->prepare($consulta);
                $stmt->execute();
                
                @$num = $stmt->fetchAll(); 
                //print_r($num); exit;  
               
                //header('HTTP/1.1 200 OK');	
                //print_r($num);
                //die();
            } catch (\Throwable $th) {
                //throw $th;
                //echo $th;
                @$num[1] = array();
                
                //header("HTTP/1.0 500 Internal Server Error");
                //print_r($num);
                //die();
            }
            //$data=array($num);
            header('Content-Type: application/json; charset=utf-8');
            echo json_encode($num[0]); exit;
          
        }else{
            include("view/viewer/header.php");
            include("view/agenda/agenda.php");
            include("view/viewer/foot.php");
        }
            
    }else{
            //echo $_SESSION['ID_SESSION']; die(); Fortes2_2022
        header("Location: index.php");
        die();
    }

}else{
    if ($_SERVER["REQUEST_METHOD"]=='POST') {
       //echo "PASO X POST <br>";
        if (isset($_POST['buscar_contacts'])) {


        }
    }
    //
    
}


    
?>