<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.css">
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12 subsep"></div>
    </div>
</div>

<div class="container-fluid">
    <div class="row">
        <!--<div class="col-sm-2 sider_color">
            <ul class="nav flex-column  ">
                <li class="nav-item">
                    <a class="nav-link active" href="#"><i class="fa fas fa-address-book"></i>     <pan>Agenda</span><i class="fa fa-angle-left pull-right"></i></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="agenda.php?v=search_contacts"><i class="fa fas fa-users"></i>     <span>Cliente</span> <i class="fa fa-angle-left pull-right"></i></a>
                </li>
                
            </ul>
        </div>-->
        <div class="col-sm-12">
           <!-- <header class="boxx ">
                <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-primary nav-shadow">
                        <a class="navbar-brand" href="#"><?php //echo APP_NAME;?></a>
                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse" id="navbarNav">
                            <ul class="navbar-nav">
                            <li class="nav-item active">
                                <a class="nav-link" href="agenda.php?v=">Dashboard <span class="sr-only">(current)</span></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="reservas.php?v=">Agendar Reservas</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="Pet.php?v=">Mascotas</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="agenda.php?v=search_contacts">Clientes</a>
                            </li>
                            
                            </ul>
                        </div>
                </nav>
            </header>-->
            <?php include("./view/viewer/navbar.php");?>
        </div>
    </div>
</div>
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-2 sider_color">
            <ul class="nav flex-column  ">
                <li class="nav-item">
                    <a class="nav-link active" href="#"><i class="fa fas fa-address-book"></i>     <span>Agenda</span>&nbsp;&nbsp;&nbsp;&nbsp;<i class="fa fa-angle-left pull-right"></i></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="home.php?v=search_contacts"><i class="fa fas fa-users"></i>     <span>Cliente</span> &nbsp;&nbsp;&nbsp;&nbsp;<i class="fa fa-angle-left pull-right"></i></a>
                </li>
                
                
            </ul>
        </div>
        <div class="col-sm-10">
            <div class="jumbotron shadow-box">
                <!--<form class="form-inline" method="post">
                    
                    <div class="form-group mx-sm-3 mb-2">
                        <label for="inputcontactid" >ID Contacts:  </label>
                        <input type="text" class="form-control" id="inputcontactid" name="inputcontactid">
                    </div>
                    <button type="submit" class="btn btn-primary mb-2" name="buscar_contacts" value="buscar">Search</button>
                </form>-->
                
                <div class="row">
                    <div class="col-sm-6">
                        <h1>Contacto <span class="badge badge-secondary">N° <?php echo $_GET['id']; ?></span></h1>
                        <hr>
                        <h5>Identificador FPOS <span class="badge badge-secondary">N° <?php echo @$fila[0]; ?></span></h5>
                        <h5>Nombre Completo <span class="badge badge-secondary">:   <?php echo @$fila[2]; ?></span></h5>
                        <h5>Email<span class="badge badge-secondary">:   <?php echo @$fila[4]; ?></span></h5>
                        <h5>Direccion <span class="badge badge-secondary">:   <?php echo utf8_encode(@$fila[5]); ?></span></h5>
                        <!--<h5>State <span class="badge badge-secondary">:   <?php //echo @$fila[5]; ?></span></h5>
                        <h5>Country<span class="badge badge-secondary">:   <?php //echo @$fila[5]; ?></span></h5>-->
                        <h5>Telefono Movil <span class="badge badge-secondary">:   <?php echo @$fila[6]; ?></span></h5>
                        <hr>
                    </div>
                    <div class="col-sm-6 text-right">
                        <h1>Principal Mascota<span class="badge badge-secondary"><?php echo  utf8_encode(@$fila[7]); ?></span></h1>
                        <h5>Secundario Mascota <span class="badge badge-secondary"> <?php echo utf8_encode(@$fila[8]); ?></span></h5>
                        <img src="https://us.123rf.com/450wm/yupiramos/yupiramos1811/yupiramos181106850/112117953-mascota-de-perro-y-gato-en-la-ilustraci%C3%B3n-de-vector-de-fondo-blanco.jpg?ver=6" alt="Contacts" width="250px" class="img-fluid  mx-auto d-block shadow-lg p-3 mb-5 bg-white rounded-pill" >
                    </div>
                </div>

                

            </div>
            <div class="jumbotron shadow-box ">
                <div class="row">
                    <div class="col-sm-6 table-responsive ">
                        <h3>Mascotas en Agenda FPOS <span class="badge badge-secondary">Cantidad <span id="cant_"></span><?php echo $contar_mis_pet; ?></span></h3>
                        <hr>
                        <table id="table_k_2" class="table table-striped table-hover table-bordered bg-light">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">NOMBRE COMPLETO</th>
                                    <th scope="col">RAZA</th>
                                    <th scope="col">OPCION</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php echo @$tbl_mis_pet;?>
                            
                            </tbody>
                        </table>


                    </div>
                    <div class="col-sm-6 table-responsive ">
                    <h3>Mascotas en FPOS <span class="badge badge-secondary">Cantidad <span id="cant_"> </span><?php echo $contar_fpos; ?></span></h3>
                        <hr>
                        <table id="table_k_3" class="table table-striped table-hover table-bordered bg-light">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">NOMBRE COMPLETO</th>
                                    <th scope="col">CREAR MASCOTA</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php echo @$tbl_fpos_pet;?>
                            
                            </tbody>
                        </table>
                    </div>
                </div>
                
            </div>
            <div class="jumbotron shadow-box table-responsive ">
                <h3>Listado de Mascotas <span class="badge badge-secondary">Cantidad Vacunas <span id="cant_"></span><?php echo $contar_vacunas_x_pet; ?></span></h3>
                <hr>
                <table id="table_id" class="table table-striped table-hover table-bordered bg-light">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">ID MASCOTA</th>
                            <th scope="col">NOMBRE</th>
                            <th scope="col">APELLIDO</th>
                            <th scope="col">RAZA</th>
                            <th scope="col">FECHA VENCIMIENTO</th>
                            <th scope="col">ID VACUNAS</th>
                            <th scope="col">NOMBRE VACUNA</th>
                           
                            <th scope="col">NOTIFICAR WHATSAPP</th>
                            <th scope="col">NOTIFICAR EMAIL</th>
                            
                        </tr>
                    </thead>
                    <tbody>
                        <?php echo @$tabla;?>
                       
                    </tbody>
                </table>
            </div>
            <div class="jumbotron">
                
            </div>
        </div>
    </div>
</div>
<script>
    
    let cant_mascota = document.querySelector("#cant");

    fetch("./ajax/ajax.php?ob=cant_masc&id=<?php echo $_GET['id'];?>", {
    method: 'GET'
    })
    .then(res => res.json())
    .then(lista_de_categorias => {
        //cant_masc.innerHTML = lista_de_categorias[0];
        //cant_reserva.innerHTML = lista_de_categorias[0][0];
        console.log(lista_de_categorias[0][0]);
        cant_mascota.textContent=lista_de_categorias[0][0];
    })
    .catch(function (error) {
        console.error("¡Error!", error);
    });
    //-----------

    /*fetch("./api/api_contact.php?v=cant_contacts", {
    method: 'GET'
    })
    .then(res => res.json())
    .then(lista_de_categorias => {
        cant_contacts.innerHTML = lista_de_categorias[0];
        console.log(lista_de_categorias);
    })
    .catch(function (error) {
        console.error("¡Error!", error);
    });*/
    //-----------

</script>