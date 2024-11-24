<?php
//include("config/config.php");
require_once ("model/ModelContacts.php");
session_start();
if (isset($_SESSION['SESSION_ID']) && (time()-$_SESSION['ONCLOCK_'])>=(60*60)) {
    session_destroy();
    header('Location: index.php?login=');
    exit;
}
@$id_bus=$_SESSION['SESSION_NAMES'][2];

if ($_SERVER["REQUEST_METHOD"]=='GET') {
    //session_start();
    /*if (isset($_SESSION['SESSION_ID']) && (time()-$_SESSION['ONCLOCK_'])>=(30*60)) {
        session_destroy();
        header('Location: index.php?login=');
        exit;
    }*/
    if (isset($_GET['v'])) {
        if ($_GET['v']=="ver_calendario") {
            include("view/viewer/header.php");            
            include("view/agenda/calendario.php");
            include("view/viewer/foot.php");
            
           
        }else if($_GET['v']=="search_contacts"){
           /* echo "pasoaka";
            if (isset($_POST['inputcontactid'])) {
                $ids=$_POST['inputcontactid'];
                $modelo = ModelContacts::getid($ids);
                echo "paso aka";
                echo $modelo; exit;
            }*/
            $modelo = new ModelContacts;
            @$data = $modelo->mostrar_ajax();
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
            /*$ids=$_POST['inputcontactid'];
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
            include("view/viewer/foot.php");*/

        }
    }
    //
    
}


    
?>