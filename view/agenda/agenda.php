<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12 subsep"></div>
    </div>
</div>

<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12">
            <!--<header class="boxx ">
                <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-primary nav-shadow">
                        <a class="navbar-brand" href="#"><?php echo APP_NAME;?></a>
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
                    <a class="nav-link active" href="#"><i class="fa fas fa-address-book"></i>     <pan>Agenda</span><i class="fa fa-angle-left pull-right"></i></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="agenda.php?v=search_contacts"><i class="fa fas fa-users"></i>     <span>Cliente</span> <i class="fa fa-angle-left pull-right"></i></a>
                </li>
                
            </ul>
        </div>
        <div class="col-sm-10">
            <div class="jumbotron shadow-box">
                <h1 class="display-4">Hello, world!</h1>
                <p class="lead">This is a simple hero unit, a simple jumbotron-style component for calling extra attention to featured content or information.</p>
                <hr class="my-4">
                <p>It uses utility classes for typography and spacing to space content out within the larger container.</p>
                <a class="btn btn-primary btn-lg" href="#" role="button">Learn more</a>
            </div>
        </div>
    </div>
</div>