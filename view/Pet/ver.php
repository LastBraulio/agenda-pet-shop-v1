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
                    <a class="nav-link active" href="Pet.php?v="><i class="fa fas fa-address-book"></i>     <span>Listar Mascotas</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i class="fa fa-angle-left pull-right"></i></a>
                </li>
            </ul>
        </div>
        <div class="col-sm-1"></div>

        
        <div class="col-sm-8">
            <div class="jumbotron shadow-box">
                <h1>Ver <span class="badge badge-secondary">Mascota : ID <?php echo $_GET['id'];?></span></h1>
                <form>
                    <div class="row">
                        <div class="col-sm-6 col-md-6">
                        <hr>
                        <div class="form-group">
                            <label for="input_idcont">ID Contacto</label>
                            <input type="text" class="form-control" id="input_idcont" value="<?php echo $pets[0][4]; ?>" required>
                        </div>
                        <div class="form-group">
                            <label for="input_nombre">Nombre</label>
                            <input type="text" class="form-control" id="input_nombre"  required>
                        </div>
                        <div class="form-group">
                            <label for="inputAddress">Direccion</label>
                            <input type="text" class="form-control" id="inputAddress" placeholder="Pais, Distrito, Corregimiento, Barriada">
                        </div>
                        <hr>
                        <div class="form-row">
                            
                            <div class="form-group col-md-6">
                                <label for="inputname">Nombre</label>
                                <input type="text" class="form-control" id="inputname" value="<?php echo $pets[0][1]; ?>" required>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="inputapellido">Apellido</label>
                                <input type="text" class="form-control" id="inputapellido" value="<?php echo $pets[0][2]; ?>" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputnames">Nombre Completo</label>
                            <input type="text" class="form-control" id="inputnames" value="<?php echo $pets[0][3]; ?>" required>
                        </div>
                        
                        <div class="form-row">
                            <div class="form-group col-md-4">
                                <label for="inputpeso">Peso</label>
                                <input type="text" class="form-control" id="inputpeso" value="<?php echo $pets[0][5]; ?>" required>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="inputraza_">Raza</label>
                                <select id="inputraza_" class="form-control"  required>
                                    <option selected><?php echo $pets[0][12]; ?></option>
                                </select>
                            </div>
                            <div class="form-group col-md-2">
                                <label for="inputtalla">Talla</label>
                                <input type="text" class="form-control" id="inputtalla" value="<?php echo $pets[0][6]; ?>" required>
                            </div>
                        </div>
                        <div class="form-row">
                            
                            <div class="form-group col-md-6">
                                <label for="input_tipo_">Tipo Animal</label>
                                <select id="input_tipo_" class="form-control">
                                    <option selected><?php echo $pets[0][13]; ?></option>
                                    
                                </select>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="input_fecha_nac">Fecha de Nacimiento</label>
                                <input type="date" class="form-control" id="input_fecha_nac" value="<?php echo date('Y-m-d', strtotime($pets[0][8])) ?>" required>
                            </div>
                        </div>
                        <!-- iba el botton guardar-->
                        <?php// print_r($pets[0]); exit;?>
                        </div>
                        <div class="col-sm-6 col-md-6">
                            <img src="<?php echo $_SESSION['INFO_VALID'][4]?>" alt="Contacts" width="350px" class="img-fluid  mx-auto d-block shadow-lg p-3 mb-5 bg-white rounded-pill" >
                            <a class="btn btn-primary mb-2" href="Pet.php?v=editar_pet&id=<?php echo $_GET['id'];?>" role="button">Editar Mascota</a>
                            <a id="eliminar" class="btn btn-primary mb-2" href="Pet.php?v=eliminar&id=<?php echo $_GET['id'];?>" role="button">Eliminar Mascota</a>
                        </div>
                    </div>
                    <!-- Viene las Vacunas-->
                    <hr>
                    <div class="row">
                        <div class="col-sm-12">
                            <h1>Ver  <span class="badge badge-secondary">Vacunas</span></h1>
                            <!--agregar vacunas adicionales-->
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo">Agregar Vacuna</button>
                            <hr>
                            <table id="id_tabla" class="table table-striped table-hover table-bordered bg-light">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Nombre Vacuna</th>
                                        <th scope="col">Fecha Vacunacion</th>
                                        <th scope="col">Duracion</th>
                                        <th scope="col">Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php echo @$tabla;?>

                                </tbody>
                            </table>
                            <hr>
                        </div>
                    </div>
                    
                </form>
                <hr>
            </div>
            <div class="jumbotron shadow-box">

            </div>
        </div>

        <div class="col-sm-1"></div>
        

    </div>
</div>

<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1  class="modal-title" id="exampleModalLabel">Agregar  <span class="badge badge-secondary">Vacuna</span></h1>
        
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      
                            <form class="form">
                                <div class="form-group mx-sm-3 mb-4 col-sm-10">
                                    <label for="input_vacunas" >Ingrese ID o Nombre</label>
                                    <!--<input type="text" class="form-control" id="input_vacunas" >-->
                                    <select id="input_vacunas" class="form-control">
                                        <option selected>Choose...</option>
                                        
                                    </select>
                                </div>
                                <div class="form-group mx-sm-3 mb-4 col-sm-10">
                                    <label for="input_fecha_v" >Fecha Vencimiento Vacunacion</label>
                                    <input type="date" class="form-control" id="input_fecha_v" >
                                   
                                </div>

                                <div class="form-group mx-sm-3 mb-4 col-sm-10">
                                    <label for="input_periodo" >Notificacion de Vacunas (Periodo x dias) </label>
                                    <select id="input_periodo" class="form-control">
                                        <option selected></option>
                                        <option>5</option>
                                        <option>7</option>
                                    </select>
                                </div>
                            </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button id="boton_agregar" type="button" class="btn btn-primary mb-2">Guardar</button>
      </div>
    </div>
  </div>
</div>

<!--<script src="./dist/js/crear_contact.js"></script>-->
<script>
    let id_contact = document.querySelector('#input_idcont');
    let _nombre = document.querySelector('#input_nombre');
    let _address = document.querySelector('#inputAddress');
    let btn_eliminar = document.querySelector("a#eliminar");

    let combo = document.querySelector('#input_vacunas');


    console.log(btn_eliminar);


    fetch("./ajax/ajax.php?ob=vacunas&v=<?php echo $pets[0][10];?>", {
    method: 'GET'
    })
    .then(res => res.json())
    .then(lista_de_categorias => {
        //console.log("Las categorías son:",lista_de_categorias);
        //alert('HAY ' + lista_de_categorias.length);
        //select.appendChild(lista_de_categorias);

        for(var i=0;i<lista_de_categorias.length;i++){
            let nuevaOpcion = document.createElement("option");
            //alert(lista_de_categorias[i].name);
            nuevaOpcion.value = lista_de_categorias[i].id;
            nuevaOpcion.text = lista_de_categorias[i].name;
            combo.appendChild(nuevaOpcion); //<-- Así tambien funciona

        }
    })
    .catch(function (error) {
        console.error("¡Error!", error);
    });


   // btn_eliminar.href = "javascript:void(0)";
   btn_eliminar.href = "Pet.php?v=eliminar&id=<?php echo $_GET['id'];?>";
	
	// Now use your variable and add an event listener to it plus your keypress, event and styling
    id_contact.addEventListener("keypress", async (event) => {
					
			await fetch('./api/api_contact.php?v=search_contacts&id='+id_contact.value)
            .then(res => res.json())
			.then(function(data){
                //alert('HAY ' + data);
                //console.log(data[1]);
                _nombre.value = data[1];
                _address.value=data[4]; 
                id_contact.style.border = "3px solid #28a745";
                swal("Buen Trabajo!", "Hola "+data[1]+" y Bienvenido", "success");

			})
			.catch(function(error){
						
				console.log(error);
                id_contact.style.border = "3px solid red";
                _nombre.value = "";
                _address.value="";
                //guardar_mascota.disabled = true;
			});
				
	});

    HabilitarBTN();

    async function HabilitarBTN() {

        let tagtablas = document.querySelector("table#id_tabla");

        var t = tagtablas.rows;
        console.log(t.length);
        if((t.length-1) > 1){
            btn_eliminar.href = "javascript:void(0)";
        }else{
            btn_eliminar.href = "Pet.php?v=eliminar&id=<?php echo $_GET['id'];?>";
        }
    }

    /* agregar una vacuna al perro */
    let botton_tabla = document.querySelector("#boton_agregar");
    let fecha_v = document.querySelector("#input_fecha_v");
    let periodo= document.querySelector("#input_periodo");

    botton_tabla.addEventListener("click", async (event) => {
        var ind= combo.selectedIndex;
        swal({
            title: "Desea Guardar Vacuna "+ combo.options[ind].text +" de Mascota "+id_contact.value+" ?",
            text: "Guardaras Info de Mascotas y sus Vacunas Agregadas...!",
            icon: "warning",
            buttons: true,
            dangerMode: true,
            })
            .then((willDelete) => {
            if (willDelete) {
                
                AgregarVacuna();

                swal("Guardado Mascota Exitosamente...!", {
                    icon: "success",
                });
                //setTimeout("redireccionarPagina('Pet.php?v=ver&id=<?php// echo $_GET['id'];?>')", 5000);
                window.location.reload();
            } else {
                swal("No se guardo la Informacion!");
            }
        });

    });

    async function AgregarVacuna() {
        const datos = new FormData();
        
        datos.append('vacuna',[combo.value,<?php echo $_GET['id'];?>,fecha_v.value,periodo.value]);

        datos.append('insert_pet_vacuna',"guardar_pet_vacuna");

        await fetch('Pet.php',{
            method: 'POST',
            body: datos
        }).then(res => res.json())
        .then(function(data){
            console.log(data);
        })
        .catch(function(error){        
            console.log(error);
        });
    }

    function redireccionarPagina(local) {
        window.location = local;
    }




</script>
