<script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js"></script>
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
                    <a class="nav-link active" href="reservas.php?v="><i class="fa fas fa-address-book"></i>     <span>Agendar Reservas</span> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i class="fa fa-angle-left pull-right"></i></a>
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
               
                <h1>Ta<span class="badge badge-pill badge-info">blero</span></h1>
                <br>
                <div class="row">
                    <div class="col-xl-4">
                        <div class="card mb-3" style="max-width: 540px;">
                            <div class="row no-gutters">
                                <div class="col-md-4">
                                    <span style="color: Tomato;">
                                        <i class="fa-solid fa-dog fa-5x p-3"></i>
                                    </span>
                                </div>
                                <div class="col-md-8">
                                    <div class="card-body">
                                        <h3 class="card-title">Mascotas <a class="btn btn-primary btn-sm" href="Pet.php?v=" role="button"><i class="fa-solid fa-arrow-turn-down"></i></a></h3>
                                        <h3 id="cant_mascotas"class="card-text">200.</h3>
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4">
                        <div class="card mb-3" style="max-width: 540px;">
                            <div class="row no-gutters">
                                <div class="col-md-4">
                                    <span style="color: #a3ff47;">
                                        <i class="fa-solid fa-shield-dog fa-5x p-3"></i>
                                        
                                    </span>
                                </div>
                                <div class="col-md-8">
                                    <div class="card-body">
                                        <h3 class="card-title">Reservas  <a class="btn btn-primary btn-sm" href="reservas.php?v=" role="button"><i class="fa-solid fa-arrow-turn-down"></i></a></h3>
                                        <h3 id="cant_reservas" class="card-text">200.</h3>
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4">
                        <div class="card mb-3" style="max-width: 540px;">
                            <div class="row no-gutters">
                                <div class="col-md-4 ">
                                    <span style="color: #476cff;">
                                        <i class="fa-solid fa-id-card fa-5x p-3"></i>
                                        
                                    </span>
                                </div>
                                <div class="col-md-8">
                                    <div class="card-body">
                                        <h3 class="card-title">Contactos  <a class="btn btn-primary btn-sm" href="home.php?v=search_contacts" role="button"><i class="fa-solid fa-arrow-turn-down"></i></a></h3>
                                        <h3 id="cant_contact"class="card-text">200.</h3>
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6">
                    <div class="jumbotron shadow-box table-responsive">
                        <h2>Cubiculos  <span class="badge badge-danger">Ocupado</span></h2>
                        <h6>Cantidad: <?php echo $cub_cant;?>  </h6>    
                        <table id="table_id_1" class="table table-striped table-hover table-bordered bg-light table-sm">
                                <thead>
                                    <tr>
                                        <th scope="col"># Cubiculo</th>
                                        <th scope="col">Cubiculo</th>
                                        <th scope="col">Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php echo @$tbl_cub;?>

                                </tbody>
                            </table>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="jumbotron shadow-box table-responsive">
                            <h2>Reservas que vencen <span class="badge badge-danger">Hoy </span>  <?php echo date('d-m-Y');?> </h2>
                            <h6>Cantidad: <?php echo $cant_x_hoy;?>  <a class="btn btn-primary" href="home.php?v=report&id=1" target="_blank" role="button"><i class="fa-solid fa-print"></i></a></h6>
                            <table id="table_id_2" class="table table-striped table-hover table-bordered bg-light table-sm">
                                <thead>
                                    <tr>
                                        <th scope="col"># </th>
                                        <th scope="col">ID CONTACTOS</th>
                                        <th scope="col">ID MASCOTAS</th>
                                        <th scope="col">ID CUBICULO</th>
                                        <th scope="col">FECHA FINAL</th>
                                        <th scope="col">OPCIONES</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php echo @$tabla_reserva_x_v;?>

                                </tbody>
                            </table>
                            
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-4">
                    <div class="jumbotron shadow-box table-responsive">
                    <h2>Reservas Generadas  <span class="badge badge-danger">en el Año <?php echo date('Y');?></span></h2>
                            <table id="table_id_3" class="table table-striped table-hover table-bordered bg-light">
                                <thead>
                                    <tr>
                                        <th scope="col">MES</th>
                                        <th scope="col">CANTIDAD</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php echo @$tabla_reserva_cant;?>
                                </tbody>
                            </table>
                    </div>
                </div>
                <div class="col-sm-8">
                    <div class="jumbotron shadow-box">
                        <!--Grafica Anual-->
                        <canvas id="grafica"></canvas>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <div class="jumbotron shadow-box table-responsive">
                        <!-- rEPORTE DIARIA DE VACUNAS VENCIDAS HOY-->
                        <h3> Animales con Vacunas que vencen <span class="badge badge-danger">Hoy </span>  <?php echo date('d-m-Y');?> </h3>
                            <h6>Cantidad: <?php echo $vacun_contar;?>  <a class="btn btn-primary" href="home.php?v=report&id=2" target="_blank" role="button"><i class="fa-solid fa-print"></i></a></h6>
                            <table id="table_id_4" class="table table-striped table-hover table-bordered bg-light table-sm">
                                <thead>
                                    <tr>
                                        <th scope="col"># </th>
                                        <th scope="col">ID MASCOTA</th>
                                        <th scope="col">NOMBRE</th>
                                        <th scope="col">APELLIDO</th>
                                        <th scope="col">RAZA</th>
                                        <th scope="col">FECHA VENCIMIENTO</th>
                                        <th scope="col">ID VACUNAS</th>
                                        <th scope="col">NOMBRE VACUNA</th>
                                        <th scope="col">PERIODO</th>
                                        <th scope="col">DIAS VENCIDOS</th>
                                        <th scope="col">N° CONTACTO</th>
                                        <th scope="col">INFORMACION</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php echo @$tbl_vacun;?>

                                </tbody>
                            </table>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <div class="jumbotron shadow-box">
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
    <br>
</div>
<script>

    let cant_pet = document.querySelector("#cant_mascotas");
    let cant_reserva = document.querySelector("#cant_reservas");
    let cant_contacts = document.querySelector("#cant_contact");

    fetch("./ajax/ajax.php?ob=cant_dashboard", {
    method: 'GET'
    })
    .then(res => res.json())
    .then(lista_de_categorias => {
        cant_pet.innerHTML = lista_de_categorias[0][2];
        cant_reserva.innerHTML = lista_de_categorias[0][0];
        console.log(lista_de_categorias[0]);
    })
    .catch(function (error) {
        console.error("¡Error!", error);
    });
    //-----------

    fetch("./api/api_contact.php?v=cant_contacts", {
    method: 'GET'
    })
    .then(res => res.json())
    .then(lista_de_categorias => {
        cant_contacts.innerHTML = lista_de_categorias[0];
        console.log(lista_de_categorias);
    })
    .catch(function (error) {
        console.error("¡Error!", error);
    });
    //-----------

    Grafica1();


    async function Grafica1(){
             // Llamar a nuestra API. Puedes usar cualquier librería para la llamada, yo uso fetch, que viene nativamente en JS
            const respuestaRaw = await fetch("./ajax/ajax.php?ob=grafica1");
            // Decodificar como JSON
            const respuesta = await respuestaRaw.json();
            console.log(respuesta);
            // Ahora ya tenemos las etiquetas y datos dentro de "respuesta"
            // Obtener una referencia al elemento canvas del DOM
            const $grafica = document.querySelector("#grafica");
            const etiquetas = respuesta.etiquetas; // <- Aquí estamos pasando el valor traído usando AJAX
            // Podemos tener varios conjuntos de datos. Comencemos con uno
            const datosVentas2020 = {
                label: "Reservas En el año 2022",
                // Pasar los datos igualmente desde PHP
                data: respuesta.datos, // <- Aquí estamos pasando el valor traído usando AJAX
                backgroundColor: 'rgba(54, 162, 235, 0.2)', // Color de fondo
                borderColor: 'rgba(54, 162, 235, 1)', // Color del borde
                borderWidth: 1, // Ancho del borde
            };
            new Chart($grafica, {
                type: 'line', // Tipo de gráfica
                data: {
                    labels: etiquetas,
                    datasets: [
                        datosVentas2020,
                        // Aquí más datos...
                    ]
                },
                options: {
                    scales: {
                        yAxes: [{
                            ticks: {
                                beginAtZero: true
                            }
                        }],
                    },
                }
            });
    }



</script>