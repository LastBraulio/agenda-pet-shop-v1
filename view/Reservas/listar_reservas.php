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
            <!--<header class="boxx ">
                <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-primary nav-shadow">
                        <a class="navbar-brand" href="#"><?php //echo APP_NAME;?></a>
                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse" id="navbarNav">
                            <ul class="navbar-nav">
                            <li class="nav-item active">
                                <a class="nav-link" href="home.php?v=">Dashboard <span class="sr-only">(current)</span></a>
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
                    <a class="nav-link active" href="reservas.php?v="><i class="fa fas fa-address-book"></i>     <span>Agendar Reservas</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i class="fa fa-angle-left pull-right"></i></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="Pet.php?v="><i class="fa fas fa-users"></i>     <span>Mascotas</span> <i class="fa fa-angle-left pull-right"></i></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="home.php?v=search_contacts"><i class="fa fas fa-users"></i>     <span>Clientes</span> <i class="fa fa-angle-left pull-right"></i></a>
                </li>
                
            </ul>
        </div>
        <div class="col-sm-10">
            <div class="jumbotron shadow-box">
                <div class="row">
                    <div class="col-sm-10">
                        <h1>Listado de <span class="badge badge-secondary">Reservas</span></h1>
                    </div>
                    <div class="col-sm-2">
                        <a class="btn btn-primary " href="reservas.php?v=crear">Crear Reservas </a>
                    </div>
                </div>
                
                

            </div>
            <div class="jumbotron shadow-box table-responsive ">
                <table  id="table_id" class="table table-sm table-striped table-hover table-bordered bg-light">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">ID CONTACTO</th>
                            <th scope="col">Mascota</th>
                            <th scope="col">CUBICULO</th>
                            <th scope="col">FECHA INICIO</th>
                            <th scope="col">FECHA FINAL</th>
                            <th scope="col">FECHA CREACION</th>
                            <th scope="col">ACCIONES</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php echo @$tabla;?>
                       
                    </tbody>
                </table>
            </div>
            <div class="jumbotron shadow-box">

            </div>
        </div>
    </div>
</div>





