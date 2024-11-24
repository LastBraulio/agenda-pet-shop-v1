            <header class="boxx ">
                <nav id="idcolor" class="navbar navbar-expand-md navbar-dark fixed-top bg-primary nav-shadow">
                    <a class="navbar-brand" href="#">
                        <!--<img src="./img/profile/profile.jpeg" width="30" height="30" alt="">-->
                        <img src="<?php echo $_SESSION['INFO_VALID'][4]?>" width="40" height="40" alt="">           <?php echo @$_SESSION['APP_NAMES'];?>
                    </a>
                    <!--<a class="navbar-brand" href="#"></a>-->
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExample02" aria-controls="navbarsExample02" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <div class="collapse navbar-collapse" id="navbarsExample02">
                        <ul class="navbar-nav  mr-auto">
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
                                <a class="nav-link" href="home.php?v=search_contacts">Clientes</a>
                            </li>
                            <!--<li class="nav-item">
                                <a class="nav-link" href="home.php?v=search_contacts">Cubiculos</a>
                            </li>-->
                            <li class="nav-item">
                                <a class="nav-link" href="agenda.php?v=ver_calendario">Calendario</a>
                            </li>
                        </ul>
                        <ul class="navbar-nav  my-2 my-md-0">
                            <li class="nav-item dropdown show">
                                <a class="nav-link dropdown-toggle" href="#" id="dropdown07XL" data-toggle="dropdown" > <button type="button" class="btn btn-success btn-sm">On</button>
   Bienvenidos <?php echo $_SESSION['SESSION_NAMES'][1];?> </a>
                                <div class="dropdown-menu" aria-labelledby="dropdown07XL">
                                    <a class="dropdown-item" href="home.php?v=profile">My Profile</a>
                                    <a class="dropdown-item" href="home.php?v=config">Configuracion</a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="home.php?v=salir">Salir</a>
                                </div>
                            </li>
                        </ul>
                    </div>
                </nav>
            </header>