<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.css">
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12 subsep"></div>
    </div>
</div>

<div class="container-fluid">
    <div class="row">

        <div class="col-sm-12">

            <?php include("./view/viewer/navbar.php");?>
            
        </div>
    </div>
</div>
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-2 sider_color">
            <ul class="nav flex-column  ">
                <li class="nav-item">
                    <a class="nav-link active" href="reservas.php?v="><i class="fa fas fa-address-book"></i>     <pan>Agendar Reservas</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i class="fa fa-angle-left pull-right"></i></a>
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
                        <h1>Listado de <span class="badge badge-secondary">Mascotas</span></h1>
                    </div>
                    <div class="col-sm-2">
                        <a class="btn btn-primary " href="Pet.php?v=crear">Crear Mascota </a>
                    </div>
                </div>
                
                

            </div>
            <div class="jumbotron shadow-box table-responsive ">
                <table  id="table_id" class="table table-sm table-striped table-hover table-bordered bg-light">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">ID CONTACTO</th>
                            <th scope="col">NOMBRE</th>
                            <th scope="col">APELLIDO</th>
                            <th scope="col">PESO</th>
                            <th scope="col">TALLA</th>
                            <th scope="col">RAZA</th>
                            <th scope="col">TIPO</th>
                            <th scope="col">FECHA NACIMIENTO</th>
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