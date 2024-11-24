<?php
//include("config/config.php");
require_once ("model/ModelPet.php");
@$modelo = new ModelPet;
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
           
        }else if($_GET['v']=="crear"){

            include("view/viewer/header.php");
            include("view/Pet/crear.php");
            include("view/viewer/foot.php");
         }else if($_GET['v']=="fpos_crear"){

            $array_pets_name = explode(" ",$_GET['names']);
            include("view/viewer/header.php");
            include("view/Pet/fpos_crear.php");
            include("view/viewer/foot.php");
         }else if($_GET['v']=="ver"){

            @$ids=$_GET["id"];
            $pets=$modelo->getid($ids,$_SESSION['SESSION_NAMES'][2]);
            //print_r($pets); exit;
            $vacunas = $modelo->getid_vacunas($ids);
            @$tabla="";
            foreach ($vacunas as &$animal) {
                //print_r(@$animal[0]); exit;
                if(sizeof($animal)==0){
                    $tabla="";
                }else{
                    $opciones = "<a class='btn btn-success' href='Pet.php?v=edita_vacuna&id=".@$animal[0]."' role='button'>Editar</a> | <a class='btn btn-danger' href='Pet.php?v=eliminar_vacun&id=".@$animal[0]."&idpet=".$ids."' role='button'>Eliminar</a>";

                    $tabla.= "<tr><td>".@$animal[0]."</td><td>".@$animal[1]."</td><td>".@$animal[2]."</td><td>".@$animal[3]."</td><td>".$opciones."</td></tr>";
                }
               
            }


            include("view/viewer/header.php");
            include("view/Pet/ver.php");
            include("view/viewer/foot.php");
         }else if($_GET['v']=="editar_pet"){

            @$ids=$_GET["id"];
            $pets=$modelo->getid($ids,$_SESSION['SESSION_NAMES'][2]);
            //print_r($pets); exit;
            $vacunas = $modelo->getid_vacunas($ids);
            @$tabla="";
            foreach ($vacunas as &$animal) {
                //print_r(@$animal[0]); exit;
                if(sizeof($animal)==0){
                    $tabla="";
                }else{
                    $opciones = "<a class='btn btn-success' href='Pet.php?v=edita_vacuna&id=".@$animal[0]."' role='button'>Editar</a> | <a class='btn btn-danger' href='Pet.php?v=eliminar&id=".@$animal[0]."' role='button'>Eliminar</a>";

                    $tabla.= "<tr><td>".@$animal[0]."</td><td>".@$animal[1]."</td><td>".@$animal[2]."</td><td>".@$animal[3]."</td><td>".$opciones."</td></tr>";
                }
               
            }


            include("view/viewer/header.php");
            include("view/Pet/editar_pet.php");
            include("view/viewer/foot.php");
         }else if($_GET['v']=="edita_vacuna"){

            @$ids=$_GET["id"];
            //$pets=$modelo->getid($ids,$_SESSION['SESSION_NAMES'][2]);
            //print_r($pets); exit;
            $vacunas = $modelo->getid_vacunas_x_id($ids);
            @$tabla="";
            foreach ($vacunas as &$animal) {
                //print_r(@$animal[0]); exit;
                if(sizeof($animal)==0){
                    $tabla="";
                }else{
                    //$opciones = "<a class='btn btn-success' href='Pet.php?v=edita_vacuna&id=".@$animal[0]."' role='button'>Editar</a> | <a class='btn btn-danger' href='Pet.php?v=eliminar&id=".@$animal[0]."' role='button'>Eliminar</a>";

                    $tabla.= "<tr><td>".@$animal[0]."</td><td id='vacuna'>".@$animal[1]."</td><td id='fecha_vac'>".@$animal[2]."</td><td id='duracion'>".@$animal[3]."</td></tr>";
                }
               
            }


            include("view/viewer/header.php");
            include("view/Pet/editar_vacunas.php");
            include("view/viewer/foot.php");
         }else if($_GET['v']=="editar"){

            include("view/viewer/header.php");
            include("view/Pet/editar.php");
            include("view/viewer/foot.php");
        }else if($_GET['v']=="eliminar"){
            
            @$ids=$_GET["id"];
            
            echo $modelo->delete($ids);

            header("Location: Pet.php?v=");

        }else if($_GET['v']=="eliminar_vacun"){
            
            @$ids=$_GET["id"];
            @$idpet=$_GET["idpet"];
            
            echo $modelo->delete_vacun($ids,$idpet);

            //header("Location: Pet.php?v=eliminar&id=".$ids."");
            header("Location: Pet.php?v=ver&id=".$idpet.""); //recordar agregar a actualizacion

            exit;

        }else{
            //$modelo = new ModelReservas;
           
            @$data = $modelo->mostrar_ajax($id_bus);
            //echo "paso aka";
            @$tabla="";
            //print_r(@$data); exit;
            
            
            foreach ($data as &$fila) {
                if(sizeof($fila)==0){
                    $tabla="";
                }else{
                    $opciones = "<a class='btn btn-info' href='Pet.php?v=ver&id=".@$fila[0]."' role='button'>Ver Info</a>";
                    $tabla.= "<tr><td>".@$fila[0]."</td><td>".@$fila[1]."</td><td>".@$fila[2]."</td><td>".@$fila[3]."</td><td>".@$fila[4]."</td><td>".@$fila[5]."</td><td>".@$fila[6]."</td><td>".@$fila[7]."</td><td>".@$fila[8]."</td><td>".@$fila[9]."</td><td>".$opciones."</td></tr>";
                }
               
            }
            include("view/viewer/header.php");
            include("view/Pet/listar_pet.php");
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
        //print_r($_REQUEST['pet']['inputname']); exit;
       

        if (isset($_POST['save_pet'])) {

            //echo "Save Pet esta listo :D"; exit;
            $pet=explode(',',$_REQUEST['pet']) ;
            $array_pet=array(
                'name'=>$pet[0],
                'apellido'=>$pet[1],
                'nombre_completo'=>$pet[2],
                'id_contact'=>(int)$pet[3],
                'peso'=>(float)$pet[4],
                'talla'=>(float)$pet[5],
                'fecha_creacion'=>date('Y-m-d'),
                'fecha_nac'=>$pet[6],
                'idfpos_raza'=>(int)$pet[7],
                'idfpos_tipo_pet'=>(int)$pet[8],
                'id_bussines'=>(int)$pet[9]
            );
            //var_dump($array_pet);
            //echo "<br>";
            
            $ind_pet=$modelo->insert_pet($array_pet);
            if($ind_pet==0){
                header('Content-type: application/json');
			    $message = [ 'msn' => 'No se Inserto Pet => ', 'valor' => 1 ];
                echo json_encode( $message );
                exit;
            }
            $cant_reg = $_POST['cant_vac'];
            for ($i=1; $i <= $cant_reg ; $i++) { 
                # code...
                $num= 'vac'.$i;
                $vac=explode(',',$_REQUEST[$num]) ;
                $id=explode('-',$vac[0]);
                $vac[0]=$id[0];
                $array_vacuna=array(
                    'idfpos_vacunas'=> (int)$vac[0],
                    'idfpos_pet'=>$ind_pet,
                    'fecha_registro'=>$vac[1],
                    'periodo'=>(int)$vac[2]
                );
                //var_dump($array_vacuna);
                //echo "<br>";
                $modelo->insert_vac($array_vacuna);
            }
            //crear redirecionamiento en php-> recordar
            //echo "se ejecuto guardado"; exit;
            
            header("Location: Pet.php?v=");
            exit;


        }else if(isset($_POST['update_pet'])){
            
            $id_pet_vacuna = $_POST['id_pet_vacuna'];
            //for ($i=1; $i <= $cant_reg ; $i++) { 
                # code...
              //  $num= 'vac'.$i;
                $vac=explode(',',$_REQUEST['vacuna']);
                //print_r($vac);exit;
                $id=explode('-',$vac[0]);
                $vac[0]=$id[0];
                $array_vacuna=array(
                    'idfpos_vacunas'=> (int)$vac[0],
                    //'idfpos_pet'=>$ind_pet,
                    'fecha_registro'=>$vac[1],
                    'periodo'=>(int)$vac[2]
                );
                //var_dump($array_vacuna); echo $id_pet_vacuna; exit;
                //echo "<br>";
                echo $modelo->update_vacuna($id_pet_vacuna,$array_vacuna);
            //}
            
            exit;



        }else if(isset($_POST['insert_pet_vacuna'])){
            $pet_vacuna = $_POST['vacuna'];
            //print_r($pet_vacuna);

            $vac=explode(',',$pet_vacuna);
            $array_vacuna=array(
                    'idfpos_vacunas'=> (int)$vac[0],
                    'idfpos_pet'=>(int)$vac[1],
                    'fecha_registro'=>$vac[2],
                    'periodo'=>(int)$vac[3]
            );
            $modelo->insert_vac($array_vacuna);
            exit;
        }else if(isset($_POST['update_pet_2'])){
            
            $id_pet = $_POST['id_pet'];
            //print_r($_REQUEST['pet']); exit;
            //for ($i=1; $i <= $cant_reg ; $i++) { 
                # code...
              //  $num= 'vac'.$i;
                $pet=explode(',',$_REQUEST['pet']);
                //print_r($vac);exit;
                //$id=explode('-',$vac[0]);
                //$vac[0]=$id[0];
                $array_pet=array(
                    'name'=>$pet[0],
                    'apellido'=>$pet[1],
                    'nombre_completo'=>$pet[2],
                    'id_contact'=>(int)$pet[3],
                    'peso'=>(float)$pet[4],
                    'talla'=>(float)$pet[5],
                    'fecha_creacion'=>date('Y-m-d'),
                    'fecha_nac'=>$pet[6],
                    'idfpos_raza'=>(int)$pet[7],
                    'idfpos_tipo_pet'=>(int)$pet[8]
                    //'id_bussines'=>(int)$pet[9]
                );
                //var_dump($array_pet); echo $id_pet; exit;
                //echo "<br>";
                echo $modelo->update($id_pet,$array_pet);
            //}
            
            exit;



        }else{

        }
    }
    //
    
}


    
?>