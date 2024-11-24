<?php
//include("config/config.php");
require_once ("model/ModelReservas.php");

session_start();
if (isset($_SESSION['SESSION_ID']) && (time()-$_SESSION['ONCLOCK_'])>=(60*60)) {
    session_destroy();
    header('Location: index.php?login=');
    exit;
}
@$id_bus=$_SESSION['SESSION_NAMES'][2];

if ($_SERVER["REQUEST_METHOD"]=='GET') {
    /*session_start();
    if (isset($_SESSION['SESSION_ID']) && (time()-$_SESSION['ONCLOCK_'])>=(30*60)) {
        session_destroy();
        header('Location: index.php?login=');
        exit;
    }*/
    if (isset($_GET['v'])) {
        if ($_GET['v']=="kardes") {
            # code...
           /* @$ids=$_GET["id"];
            $modelo = new ModelContacts;
            @$data = $modelo->getid($ids);
            @$fila=$data[0];
            //print_r($fila); exit;

            @$animales=array(
                [
                    0=>1,
                    1=>$_GET["id"],
                    2=>@$fila[5],
                    3=>@$fila[6],
                    4=>@$fila[7],
                    5=>@$fila[8],
                    6=>@$fila[9],
                    7=>@$fila[10],
                    8=>@$fila[11],
                    9=>@$fila[12]
                ], [
                    0=>1,
                    1=>$_GET["id"],
                    2=>@$fila[5],
                    3=>@$fila[6],
                    4=>@$fila[7],
                    5=>@$fila[8],
                    6=>@$fila[9],
                    7=>@$fila[10],
                    8=>@$fila[11],
                    9=>@$fila[12]
                ], [
                    0=>1,
                    1=>$_GET["id"],
                    2=>@$fila[5],
                    3=>@$fila[6],
                    4=>@$fila[7],
                    5=>@$fila[8],
                    6=>@$fila[9],
                    7=>@$fila[10],
                    8=>@$fila[11],
                    9=>@$fila[12]
                ]
            );

            @$tabla="";
            
            
            
            foreach ($animales as &$animal) {
                //print_r(@$animal[0]); exit;
                if(sizeof($animal)==0){
                    $tabla="";
                }else{
                    $opciones = "<a class='btn btn-info' href='agenda.php?v=kardes&id=".@$animal[1]."' role='button'>Ver Info</a>";
                    $tabla.= "<tr><td>".@$animal[0]."</td><td>".@$animal[1]."</td><td>".@$animal[2]."</td><td>".@$animal[3]."</td><td>".@$animal[4]."</td><td>".@$animal[5]."</td><td>".@$animal[6]."</td><td>".@$animal[7]."</td><td>".@$animal[8]."</td><td>".@$animal[9]."</td><td>".$opciones."</td></tr>";
                }
               
            }

            include("view/viewer/header.php");            
            include("view/agenda/kardes.php");
            include("view/viewer/foot.php");*/
        }else if($_GET['v']=="crear"){
            include("view/viewer/header.php");            
            include("view/Reservas/crear.php");
            include("view/viewer/foot.php");
        }else if($_GET['v']=="ver"){

             @$ids=$_GET["id"];
             $mo_reservas = new ModelReservas();

             $reser=$mo_reservas->getidreserva($ids,$_SESSION['SESSION_NAMES'][2]);
             //print_r($reser[0]); //exit;
             
             include("view/viewer/header.php");            
             include("view/Reservas/ver.php");
             include("view/viewer/foot.php");
         }else if($_GET['v']=="editar"){
            @$ids=$_GET["id"];
            $mo_reservas = new ModelReservas();
            
            $reser=$mo_reservas->getidreserva($ids,$_SESSION['SESSION_NAMES'][2]);
            //print_r($reser[0]); //exit;
            //echo $reser[0][4]; exit;
            include("view/viewer/header.php");            
            include("view/Reservas/editar.php");
            include("view/viewer/foot_edit.php");

         }else if($_GET['v']=="eliminar"){

            @$ids=$_GET["id"];
            @$cub=$_GET["cub"];
            
            $mo_reservas = new ModelReservas();
            
            echo $mo_reservas->delete($ids);

            echo $mo_reservas->update_bajar_cubiculo($cub);

            header("Location: reservas.php?v=");
            
         }else{

            $modelo = new ModelReservas;
            @$data = $modelo->mostrar_ajax($id_bus);
            //echo "paso aka";
            @$tabla="";
            //print_r(@$data); exit;
            
            
            foreach ($data as &$fila) {
                if(sizeof($fila)==0){
                    $tabla="";
                }else{
                    $opciones = "<a class='btn btn-info' href='reservas.php?v=ver&id=".@$fila[0]."' role='button'>Ver Info</a>";
                    $tabla.= "<tr><td>".@$fila[0]."</td><td>".@$fila[1]."</td><td>".@$fila[2]."</td><td>".@$fila[3]."</td><td>".@$fila[4]."</td><td>".@$fila[5]."</td><td>".@$fila[6]."</td><td>".$opciones."</td></tr>";
                }
               
            }

            include("view/viewer/header.php");
            include("view/Reservas/listar_reservas.php");
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
        if (isset($_POST['save_reservas'])) {

            //print_r($_POST['reservas1']);
            $cant=$_POST['cantidad'];
            //print_r($cant);

            for ($i=1; $i <= $cant ; $i++) { 
                # code...
                $num= 'reservas'.$i;
                $vac=explode(',',$_REQUEST[$num]) ;
                //$id=explode('-',$vac[0]);
                //$vac[0]=$id[0];
                //print_r($vac);
                $array_reservas=array(
                    'id_contact'=> (int)$vac[0],
                    'idfpos_pet'=>(int)$vac[1],
                    'idfpos_cubiculo'=>(int)$vac[2],
                    'fpos_fecha1'=>$vac[3],
                    'fpos_fecha2'=>$vac[4],
                    'fpos_fecha_system'=>date('Y-m-d'),
                    'fpos_bussinesid'=>3
                );
                print_r($array_reservas);
                echo "<br>";
                $modelo1 = new ModelReservas;
                $modelo1->insert($array_reservas);
                $devolver = (int)$vac[2];
                // actualizar idcubiculo

                echo $modelo1->update_cubiculo($devolver);

            }
           // header('Location: reservas.php?v=');
            exit;

        }else if (isset($_POST['update_reservas'])) {
            # code...
            //print_r($_POST['reservas1']);
            $cant=$_POST['cantidad'];
            $id=$_POST['id_reserva'];
            //print_r($id); //exit;

            for ($i=1; $i <= $cant ; $i++) { 
                # code...
                $num= 'reservas'.$i;
                $vac=explode(',',$_REQUEST[$num]) ;
                //$id=explode('-',$vac[0]);
                //$vac[0]=$id[0];
                //print_r($vac);
                $array_reservas=array(
                    //'id_contact'=> (int)$vac[0],
                    //'idfpos_pet'=>(int)$vac[1],
                    'idfpos_cubiculo'=>(int)$vac[0],
                    'fpos_fecha1'=>$vac[1],
                    'fpos_fecha2'=>$vac[2],
                    'fpos_fecha_system'=>date('Y-m-d')
                    //'fpos_bussinesid'=>3
                );
               // print_r($array_reservas);
               // echo "<br>"; //exit;
                $modelo1 = new ModelReservas;
                $modelo1->update($id,$array_reservas);
                $devolver = (int)$vac[0];
                // actualizar idcubiculo

                echo $modelo1->update_cubiculo($devolver);

            }
           // header('Location: reservas.php?v=');
            exit;
        }else{
            
        }
    }
    //
    
}


    
?>