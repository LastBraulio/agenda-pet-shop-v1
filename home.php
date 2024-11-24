<?php
//include("config/config.php");
require_once ("model/ModelContacts.php");
require_once ("model/ModelPet.php");
require_once("model/ModelReservas.php");
require_once("model/ModelCubiculos.php");
//require_once("model/ModelAjax.php");

session_start();
if (isset($_SESSION['SESSION_ID']) && (time()-$_SESSION['ONCLOCK_'])>=(60*60)) {
    session_destroy();
    header('Location: index.php?login=');
    exit;
}

//print_r($_SESSION);
@$id_bus=$_SESSION['SESSION_NAMES'][2];

if ($_SERVER["REQUEST_METHOD"]=='GET') {
    //echo "aki"; exit;
    /*session_start();
    if (isset($_SESSION['SESSION_ID']) && (time()-$_SESSION['ONCLOCK_'])>=(30*60)) {
        session_destroy();
        header('Location: index.php?login=');
        exit;
    }*/
    if (isset($_GET['v'])) {
        if ($_GET['v']=="kardes") {
            # code...
            @$ids=$_GET["id"];
            $modelo = new ModelContacts;
            @$data = $modelo->getid($ids,$id_bus);
            @$fila=$data[0];
            //print_r($fila); exit;



            $pet = new ModelPet;

            $animales=$pet->getid_pet($ids,$id_bus);

            @$tabla="";
            $bg_tr="";
            
            $contar_vacunas_x_pet=count($animales);
            
            foreach ($animales as &$animal) {
                //print_r(@$animal[0]); exit;
                if(sizeof($animal)==0){
                    $tabla="";
                }else{
                    if ($animal[9]==0) {
                        $whatsapp = "<a class='btn btn-success' target='_blank' href='home.php?v=envio_whatsapp&id=".@$animal[0]."&tel=".$fila[6]."' role='button'>Whatsapp</a>";

                        $sms = "<a class='btn btn-dark' target='_blank' href='home.php?v=envio_sms&id=".@$animal[0]."' role='button'>SMS</a>";
                        $bg_tr="bg-danger";
                        
                    }else{
                        $whatsapp = "<a class='btn btn-outline-success' href='#' role='button'>SIN VENCIMIENTO</a>";

                        $sms = "<a class='btn btn-outline-success' href='#' role='button'>SIN VENCIMIENTO</a>";
                        $bg_tr="none";
                    }

                    //$whatsapp = "<a class='btn btn-success' href='home.php?v=kardes&id=".@$animal[1]."' role='button'>Whatsapp".$animal[9]."</a>";

                    //$sms = "<a class='btn btn-outline-success' href='home.php?v=kardes&id=".@$animal[1]."' role='button'>SMS</a>";

                    $tabla.= "<tr class='".$bg_tr."' ><td>".@$animal[0]."</td><td>".@$animal[1]."</td><td>".@$animal[2]."</td><td>".@$animal[3]."</td><td>".@$animal[4]."</td><td>".@$animal[5]."</td><td>".@$animal[6]."</td><td>".@$animal[7]."</td><td>".$whatsapp."</td><td>".$sms."</td></tr>";
                }
               
            }

            $mis_pet = $pet->getid_pet_minimo($ids,$id_bus);

            $tbl_mis_pet="";
            $contar_mis_pet=count($mis_pet);
            foreach ($mis_pet as &$animal) {
                //print_r(@$animal[0]); exit;
                if(sizeof($animal)==0){
                    $tbl_mis_pet="";
                }else{
                    $ver = "<a class='btn btn-success' target='_blank' href='Pet.php?v=ver&id=".@$animal[0]."' role='button'>Ver</a>";

                    $tbl_mis_pet.= "<tr><td>".@$animal[0]."</td><td>".@$animal[1]."</td><td>".@$animal[2]."</td><td>".@$ver."</td></tr>";
                }
               
            }

            $pet_fpos=$modelo->mostrar_pet_x_contact($ids,$id_bus);
            $tbl_fpos_pet="";

            foreach ($pet_fpos as &$animal) {
                //print_r(@$animal[0]); exit;
                if(sizeof($animal)==0){
                    $tbl_fpos_pet="";
                }else{
                    //echo count($animal); exit;
                    

                    for ($i = 1; $i <= 5; ++$i) {
                        if(!empty(@$animal[$i])){

                            $crear_pet = "<a class='btn btn-success' target='_blank' href='Pet.php?v=fpos_crear&id_contact=".$ids."&names=".utf8_encode(@$animal[$i])."' role='button'>Crear Mascota</a>";


                            $tbl_fpos_pet.= "<tr><td>".@$animal[0]."</td><td>".utf8_encode(@$animal[$i])."</td><td>".@$crear_pet."</td></tr>";
                            @$contar_fpos++;
                        }
                     }


                    //$tbl_fpos_pet.= "<tr><td>".@$animal[0]."</td><td>".@$animal[1]."</td><td>".@$crear_pet."</td></tr>";

                    //$tbl_fpos_pet.= "<tr><td>".@$animal[0]."</td><td>".@$animal[2]."</td><td>".@$crear_pet."</td></tr>";

                    //$tbl_fpos_pet.= "<tr><td>".@$animal[0]."</td><td>".@$animal[3]."</td><td>".@$crear_pet."</td></tr>";

                    //$tbl_fpos_pet.= "<tr><td>".@$animal[0]."</td><td>".@$animal[4]."</td><td>".@$crear_pet."</td></tr>";

                    //$tbl_fpos_pet.= "<tr><td>".@$animal[0]."</td><td>".@$animal[5]."</td><td>".@$crear_pet."</td></tr>";
                }
               
            }


            include("view/viewer/header.php");            
            include("view/agenda/kardes.php");
            include("view/viewer/foot.php");
        }else if($_GET['v']=="envio_whatsapp"){

            $pet = new ModelPet;
            $ids=$_GET['id'];

            $animales=$pet->getid_pet_id_vacuna($ids,$id_bus);
            //print_r($animales);exit;

            $MENSAJE="ESTIMADO CLIENTE, SU MASCOTA ".$animales[0][2]." ".$animales[0][3]."  RAZA: ".$animales[0][4]." REQUIERE DE UNA PRONTA VACUNACION DE ".$animales[0][7]." ,ESPERO QUE USTED SE APROXIME AL ESTABLECIMIENTO PARA PODER ATENDERLE SU VACUNACION - VACUNA VENCIDA AL: ".$animales[0][5]."";

            $MENSAJE=str_replace(" ","%20",$MENSAJE);

            //$TELEFONO="507"."67857986";
            $TELEFONO="507".$_GET['tel'];

            //echo $TELEFONO; exit;

            $URL_WHATSAPP="https://wa.me/".$TELEFONO."?text=".$MENSAJE."";
            //echo $URL_WHATSAPP; exit;
            ob_start();
            header("Location: ".$URL_WHATSAPP);
            ob_end_flush(); 
            die();

        }else if($_GET['v']=="envio_whatsapp_db"){

            $pet = new ModelPet;
            $ids=$_GET['id'];

            $animales=$pet->getid_pet_id_vacuna($ids,$id_bus);
            print_r($animales);exit;

            $MENSAJE="ESTIMADO CLIENTE, SU MASCOTA ".$animales[0][2]." ".$animales[0][3]."  RAZA: ".$animales[0][4]." REQUIERE DE UNA PRONTA VACUNACION DE ".$animales[0][7]." ,ESPERO QUE USTED SE APROXIME AL ESTABLECIMIENTO PARA PODER ATENDERLE SU VACUNACION - VACUNA VENCIDA AL: ".$animales[0][5]."";

            $MENSAJE=str_replace(" ","%20",$MENSAJE);

            $TELEFONO="507"."67857986";

            $URL_WHATSAPP="https://wa.me/".$TELEFONO."?text=".$MENSAJE."";
            //echo $URL_WHATSAPP; exit;
            ob_start();
            header("Location: ".$URL_WHATSAPP);
            ob_end_flush(); 
            die();

        }else if($_GET['v']=="profile"){

            include("view/viewer/header.php");            
            include("view/viewer/default.php");
            include("view/viewer/foot.php");

        }else if($_GET['v']=="config"){

             include("view/viewer/header.php");            
             include("view/viewer/config.php");
             include("view/viewer/foot.php");

        }else if($_GET['v']=="report"){

            if ($_GET['id']==1) {
                # reservas que vencen el dia de hoy
                $reser= new ModelReservas();
                @$data_rxv=$reser->mostrar_reservas_por_vencer_x_hoy($id_bus);
                //echo "paso aka";
                @$tabla_reserva_x_v="";
                //print_r(@$data); exit;
                
                $cant_x_hoy=count($data_rxv);
                foreach ($data_rxv as &$fila) {
                    if(sizeof($fila)==0){
                        $tabla_reserva_x_v="";
                    }else{
                        //$opciones = "<a class='btn btn-info' href='reservas.php?v=ver&id=".@$fila[0]."' role='button'>Ver Info</a>";
                        $tabla_reserva_x_v.= "<tr><td>".@$fila[0]."</td><td>".@$fila[1]."</td><td>".@$fila[2]."</td><td>".@$fila[3]."</td><td>".@$fila[4]."</td></tr>";
                    }
                
                }

                include("view/report/reservas/report_r_1.php");

                exit;

            }else if($_GET['id']==2){
                // vacunas x vencer
                $pet = new ModelPet;

                $data_vacunas_x_pet=$pet->mostrar_vacunas_x_vencer($id_bus);

                $tbl_vacun="";

                $vacun_contar = count($data_vacunas_x_pet);

                foreach ($data_vacunas_x_pet as &$fila) {
                    if(sizeof($fila)==0){
                        $tbl_vacun="";
                    }else{
                        

                        $tbl_vacun.= "<tr><td>".@$fila[0]."</td><td>".@$fila[1]."</td><td>".@$fila[2]."</td><td>".@$fila[3]."</td><td>".@$fila[4]."</td><td>".@$fila[5]."</td><td>".@$fila[6]."</td><td>".@$fila[7]."</td><td>".@$fila[8]."</td><td>".@$fila[9]."</td><td>".@$fila[11]."</td></tr>";
                    }
                
                }

                include("view/report/reservas/report_r_2.php");

                exit;

            }else{

            }

            //include("view/viewer/header.php");            
            //include("view/viewer/config.php");
            //include("view/viewer/foot.php");

       }else if($_GET['v']=="salir"){
            session_start();
            unset($_SESSION);
            session_destroy();
            header('Location: index.php?login=');
            exit;
        

            //include("view/viewer/header.php");            
            //include("view/viewer/default.php");
            //include("view/viewer/foot.php");

        }else if($_GET['v']=="search_contacts"){
           /* echo "pasoaka";
            if (isset($_POST['inputcontactid'])) {
                $ids=$_POST['inputcontactid'];
                $modelo = ModelContacts::getid($ids);
                echo "paso aka";
                echo $modelo; exit;
            }*/
            $modelo = new ModelContacts;
            @$data = $modelo->mostrar_ajax($id_bus);
            //echo "paso aka";
            @$tabla="";
            //print_r(@$data); exit;
            
            
            foreach ($data as &$fila) {
                if(sizeof($fila)==0){
                    $tabla="";
                }else{
                    $opciones = "<a class='btn btn-info' href='home.php?v=kardes&id=".@$fila[1]."' role='button'>Ver Info</a>";
                    $tabla.= "<tr><td>".@$fila[0]."</td><td>".@$fila[1]."</td><td>".@$fila[2]."</td><td>".@$fila[3]."</td><td>".@$fila[4]."</td><td>".@$fila[5]."</td><td>".@$fila[6]."</td><td>".@$fila[7]."</td><td>".@$fila[8]."</td><td>".@$fila[9]."</td><td>".@$fila[10]."</td><td>".@$fila[11]."</td><td>".@$fila[12]."</td><td>".$opciones."</td></tr>";
                }
               
            }
            


            include("view/viewer/header.php");            
            include("view/agenda/search_contacts.php");
            include("view/viewer/foot.php");
        }else{
            $reser= new ModelReservas();
            //echo $id_bus; exit;
            @$data_r=$reser->mostrar_Reservas_g_anual($id_bus,date("Y"));
            //echo "paso aka";
            @$tabla_reserva_cant="";
            //print_r(@$data); exit;
            
            
            foreach ($data_r as &$fila) {
                if(sizeof($fila)==0){
                    $tabla_reserva_cant="";
                }else{
                    //$opciones = "<a class='btn btn-info' href='home.php?v=kardes&id=".@$fila[1]."' role='button'>Ver Info</a>";
                    $tabla_reserva_cant.= "<tr><td>".@$fila[1]."</td><td>".@$fila[0]."</td></tr>";
                }
               
            }

            @$data_rxv=$reser->mostrar_reservas_por_vencer_x_hoy($id_bus);
            //echo "paso aka";
            @$tabla_reserva_x_v="";
            //print_r(@$data); exit;
            
            $cant_x_hoy=count($data_rxv);
            foreach ($data_rxv as &$fila) {
                if(sizeof($fila)==0){
                    $tabla_reserva_x_v="";
                }else{
                    $opciones = "<a class='btn btn-info' href='reservas.php?v=ver&id=".@$fila[0]."' role='button'>Ver Info</a>";
                    $tabla_reserva_x_v.= "<tr><td>".@$fila[0]."</td><td>".@$fila[1]."</td><td>".@$fila[2]."</td><td>".@$fila[3]."</td><td>".@$fila[4]."</td><td>".@$opciones."</td></tr>";
                }
               
            }

            $cubbiculos = new ModelCubiculos();

            $data_cub = $cubbiculos->mostrar_cubiculos_ocupados($id_bus);

            $tbl_cub="";

            $cub_cant=count($data_cub);
            foreach ($data_cub as &$fila) {
                if(sizeof($fila)==0){
                    $tbl_cub="";
                }else{
                    //$opciones = "<a class='btn btn-info' href='reservas.php?v=ver&id=".@$fila[0]."' role='button'>Ver Info</a>";
                    $tbl_cub.= "<tr><td>".@$fila[0]."</td><td>".@$fila[1]."</td><td>".@$fila[2]."</td></tr>";
                }
               
            }

            // vacunas x vencer
            $pet = new ModelPet;

            $data_vacunas_x_pet=$pet->mostrar_vacunas_x_vencer($id_bus);

            $tbl_vacun="";

            $vacun_contar = count($data_vacunas_x_pet);

            foreach ($data_vacunas_x_pet as &$fila) {
                if(sizeof($fila)==0){
                    $tbl_vacun="";
                }else{
                    $whatsapp = "<a class='btn btn-success' href='home.php?v=kardes&id=".@$fila[11]."' role='button'>Ver Info</a>";

                    $tbl_vacun.= "<tr><td>".@$fila[0]."</td><td>".@$fila[1]."</td><td>".@$fila[2]."</td><td>".@$fila[3]."</td><td>".@$fila[4]."</td><td>".@$fila[5]."</td><td>".@$fila[6]."</td><td>".@$fila[7]."</td><td>".@$fila[8]."</td><td>".@$fila[9]."</td><td>".@$fila[11]."</td><td>".$whatsapp."</td></tr>";
                }
               
            }


            include("view/viewer/header.php");
            include("view/home/home.php");
            include("view/viewer/foot.php");
        }
            
    }else{
            //echo $_SESSION['ID_SESSION']; die(); Fortes2_2022
            //echo "PASO X POST 2<br>"; exit;
        header("Location: index.php");
        die();
    }

}else{
    if ($_SERVER["REQUEST_METHOD"]=='POST') {
       //echo "PASO X POST <br>";
       //echo "PASO X POST <br>"; exit;
        if (isset($_POST['email'])) {

            $modelo = new ModelContacts;
            $_user = $_POST['email'];
            $_pass=$_POST['password'];

           
            
            //$_pass=password_hash($_pass, PASSWORD_BCRYPT);
            //echo $_pass; exit;
            $users= $modelo->get_users($_user);
            $users=$users[0];
            //print_r($users[5]); exit;
            if(password_verify($_pass,$users[5])){

                //verificar en agenda fpos con latabla fpos_bussines_validator
                
                @$modelo_info = new ModelReservas();

                @$data_info = $modelo_info->info_validator($users[2]);
                //print_r($data_info); exit;
                if (count($data_info)==0) {
                    header('Location: index.php?inval=');
                    exit;
                }

                //

                session_start();
                $_SESSION['APP_NAMES']  = $users[3];
                $_SESSION['SESSION_NAMES']=$users;
                $_SESSION['INFO_VALID']=$data_info[0];
                $_SESSION['SESSION_ID']=session_id();
                $_SESSION['ONCLOCK_']=time();

                
                header('Location: home.php?v=');
                exit;

            }else{
                header('Location: index.php?login=');
                exit;
            }
        }
        if (isset($_POST['config_color'])) {
            # code...
            //echo $_SESSION['INFO_VALID'][0]."<br>";
            //print_r($_POST['color']);

            $id=$_SESSION['INFO_VALID'][0];
            $color=explode(',',$_REQUEST['color']);

            @$modelo_info = new ModelReservas();

            echo $modelo_info->update_color($id,$color);

            $_SESSION['INFO_VALID'][3]=$color[0];
            $_SESSION['INFO_VALID'][10]=$color[1];

            exit;

        } else if(isset($_POST['config_img'])) {
            # code...
            $id=$_SESSION['INFO_VALID'][0];
            $img_file=$_REQUEST['file'];

            $datosBase64 = base64_decode(preg_replace('#^data:image/\w+;base64,#i', '', $img_file));
                // definimos la ruta donde se guardara en el server
            $folder = './img/profile/'.$_SESSION['INFO_VALID'][0].'/';
            //echo $folder; exit;

            if(!is_dir($folder)){
                @mkdir($folder,0700);
            }else{
                // yan existe directorio
            }

            $path= $folder.'_'.$_SESSION['INFO_VALID'][9].date('d_m_Y_H_i_s').'.png';
                // guardamos la imagen en el server
            if(!file_put_contents($path, $datosBase64)){
                    // retorno si falla
                //return false;
                echo "fallo en algo";
            }
            else{
                    // retorno si todo fue bien
                //return true;
                echo "archivo adjuntado exitosamente";
            }

            @$data_img = [$path];

            @$modelo_info = new ModelReservas();

            echo $modelo_info->update_img($id,$data_img);

            $_SESSION['INFO_VALID'][4]=$path;

            //echo "Actualizacion de Logo Exitosamente :)";

            exit;



        }else{

        }
        
    }
    //
    
}


    
?>