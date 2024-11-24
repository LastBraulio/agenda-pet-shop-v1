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
                    <a class="nav-link active" href="Pet.php?v="><i class="fa fas fa-address-book"></i>     <span>Listar Mascotas</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i class="fa fa-angle-left pull-right"></i></a>
                </li>
            </ul>
        </div>
        <div class="col-sm-1"></div>

        
        <div class="col-sm-8">
            <div class="jumbotron shadow-box">
                <h1>Editar <span class="badge badge-secondary">Mascota : ID <?php echo $_GET['id'];?></span></h1>
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
                                <label for="inputraza">Raza : <?php echo $pets[0][12]; ?></label>
                                <select id="inputraza" class="form-control"  required>
                                    <option selected></option>
                                </select>
                            </div>
                            <div class="form-group col-md-2">
                                <label for="inputtalla">Talla</label>
                                <input type="text" class="form-control" id="inputtalla" value="<?php echo $pets[0][6]; ?>" required>
                            </div>
                        </div>
                        <div class="form-row">
                            
                            <div class="form-group col-md-6">
                                <label for="input_tipo">Tipo Animal : <?php echo $pets[0][13]; ?></label>
                                <select id="input_tipo" class="form-control">
                                    <option selected></option>
                                    
                                </select>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="input_fecha_nac">Fecha de Nacimiento</label>
                                <input type="date" class="form-control" id="input_fecha_nac" value="<?php echo date('Y-m-d', strtotime($pets[0][8])) ?>" required>
                            </div>
                        </div>
                        <!-- iba el botton guardar-->
                        </div>
                        <div class="col-sm-6 col-md-6">
                            <img src="<?php echo $_SESSION['INFO_VALID'][4]?>" alt="Contacts" width="350px" class="img-fluid  mx-auto d-block shadow-lg p-3 mb-5 bg-white rounded-pill" >
                            
                        </div>
                    </div>
                    <!-- Viene las Vacunas-->
                    <hr>
                    <button id="guardar_mascota" type="button" name="save_pet" class="btn btn-primary">Actualizar Mascota</button>
                    
                </form>
                <hr>
            </div>
            <div class="jumbotron shadow-box">

            </div>
        </div>

        <div class="col-sm-1"></div>

    </div>
</div>
<script>
    const select = document.querySelector("#inputraza"); //Obtenemos el select
    let guardar_mascota = document.querySelector("#guardar_mascota");

    fetch("./ajax/ajax.php?ob=ajax_razas", {
    method: 'GET'
    })
    .then(res => res.json())
    .then(lista_de_categorias => {


        for(var i=0;i<lista_de_categorias.length;i++){
            let nuevaOpcion = document.createElement("option");
            //alert(lista_de_categorias[i].name);
            nuevaOpcion.value = lista_de_categorias[i].id;
            nuevaOpcion.text = lista_de_categorias[i].name;
            select.appendChild(nuevaOpcion); //<-- Así tambien funciona

        }
    })
    .catch(function (error) {
        console.error("¡Error!", error);
    });
    //-----------

    const select2 = document.querySelector("#input_tipo"); //Obtenemos el select

    fetch("./ajax/ajax.php?ob=tipo_pet", {
    method: 'GET'
    })
    .then(res => res.json())
    .then(lista_de_categorias => {


        for(var i=0;i<lista_de_categorias.length;i++){
            let nuevaOpcion = document.createElement("option");
            //alert(lista_de_categorias[i].name);
            nuevaOpcion.value = lista_de_categorias[i].id;
            nuevaOpcion.text = lista_de_categorias[i].name;
            select2.appendChild(nuevaOpcion); //<-- Así tambien funciona

        }
    })
    .catch(function (error) {
        console.error("¡Error!", error);
    });

    let name = document.querySelector('#input_tipo');
    let combo = document.querySelector('#input_vacunas');

    let id_contact = document.querySelector('#input_idcont');
    let _nombre = document.querySelector('#input_nombre');
    let _address = document.querySelector('#inputAddress');
	//let botton = document.querySelector('#procesar');
	//botton.disabled=true;
    guardar_mascota.disabled = true;
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
                guardar_mascota.disabled = false;
                swal("Buen Trabajo!", "Hola "+data[1]+" y Bienvenido", "success");

			})
			.catch(function(error){
						
				console.log(error);
                id_contact.style.border = "3px solid red";
                _nombre.value = "";
                _address.value="";
                guardar_mascota.disabled = true;
			});
				
	});

    guardar_mascota.addEventListener("click", async (event) => {
        swal({
            title: "Desea Actualizar Informacion de Mascota?",
            text: "Guardaras Info de Mascotas y sus Agregadas...!",
            icon: "warning",
            buttons: true,
            dangerMode: true,
            })
            .then((willDelete) => {
            if (willDelete) {
                
                
                getResponse();

                

                swal("Actualizado Mascota Exitosamente...!", {
                    icon: "success",
                });
                setTimeout("redireccionarPagina('Pet.php?v=')", 5000);

            } else {
                swal("No se guardo la Informacion!");
            }
        });
    });

    async function getResponse() {
   
        const datos = new FormData();
                
        datos.append('id_pet',<?php echo $_GET['id'];?>);

        let info_pet=[
                    inputname.value,
                    inputapellido.value,
                    inputnames.value,
                    id_contact.value,
                    inputpeso.value,
                    inputtalla.value,
                    input_fecha_nac.value,
                    select.value,
                    select2.value,
                    <?php echo $_SESSION['SESSION_NAMES'][2];?>//id_bussinesin php
        ];
        console.log(info_pet);

        datos.append('pet',info_pet);
        datos.append('update_pet_2',"actualizar_info_pet");

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