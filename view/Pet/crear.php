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
                <h1>Crear <span class="badge badge-secondary">Mascota</span></h1>
                <form>
                    <div class="row">
                        <div class="col-sm-6 col-md-6">
                        <hr>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1" value="option1" checked>
                            <label class="form-check-label" for="inlineRadio1">Por ID Contacto</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="option2">
                            <label class="form-check-label" for="inlineRadio2">Por Nombre</label>
                        </div>
                        <hr>
                        <div id="ids" class="form-group" style="display: none;background-color: #ace5a0;padding: 1rem;">
                            <label for="input_idcont">ID Contacto</label>
                            <input type="text" class="form-control" id="input_idcont" required>
                            <input type="hidden" class="form-control" value="<?php echo $_SESSION['SESSION_NAMES'][2]; ?>" id="input_bussines_id">
                        </div>
                        <div id="namess" class="form-group" style="display: none;background-color: rgb(160, 219, 229);padding: 1rem;">
                            <label for="name_contact">Nombre del Contacto</label>
                            
                            <input type="text" multiple name="name_contact" list="IdContact" class="form-control" id="id_name_contact" required>
                            <datalist id="IdContact">

                            </datalist>
                            
                        </div>
                        <hr>
                        <div class="form-group">
                            <label for="input_nombre">Nombre</label>
                            <input type="text" class="form-control" id="input_nombre" required>
                        </div>
                        <div class="form-group">
                            <label for="inputAddress">Direccion</label>
                            <input type="text" class="form-control" id="inputAddress" placeholder="Pais, Distrito, Corregimiento, Barriada">
                        </div>
                        <hr>
                        <div class="form-row">
                            
                            <div class="form-group col-md-6">
                                <label for="inputname">Nombre</label>
                                <input type="text" class="form-control" id="inputname" required>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="inputapellido">Apellido</label>
                                <input type="text" class="form-control" id="inputapellido" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputnames">Nombre Completo</label>
                            <input type="text" class="form-control" id="inputnames" required>
                        </div>
                        
                        <div class="form-row">
                            <div class="form-group col-md-4">
                                <label for="inputpeso">Peso</label>
                                <input type="text" class="form-control" id="inputpeso" required>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="inputraza">Raza</label>
                                <select id="inputraza" class="form-control" required>
                                    <option selected>Choose...</option>
                                    <!--<option selected>Choose...</option>
                                    <option>...</option>-->
                                </select>
                            </div>
                            <div class="form-group col-md-2">
                                <label for="inputtalla">Talla</label>
                                <input type="text" class="form-control" id="inputtalla" required>
                            </div>
                        </div>
                        <div class="form-row">
                            
                            <div class="form-group col-md-6">
                                <label for="input_tipo">Tipo Animal</label>
                                <select id="input_tipo" class="form-control">
                                    <option selected>Choose...</option>
                                    
                                </select>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="input_fecha_nac">Fecha de Nacimiento</label>
                                <input type="date" class="form-control" id="input_fecha_nac" required>
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
                    <div class="row">
                        <div class="col-sm-12">
                            <h1>Agregar  <span class="badge badge-secondary">Vacunas</span></h1>
                            <form class="form-inline">
                                <div class="form-group mx-sm-3 mb-4 col-sm-4">
                                    <label for="input_vacunas" >Ingrese ID o Nombre</label>
                                    <!--<input type="text" class="form-control" id="input_vacunas" >-->
                                    <select id="input_vacunas" class="form-control">
                                        <option selected>Choose...</option>
                                        
                                    </select>
                                </div>
                                <div class="form-group mx-sm-3 mb-4 col-sm-4">
                                    <label for="input_fecha_v" >Fecha Vencimiento Vacunacion</label>
                                    <input type="date" class="form-control" id="input_fecha_v" >
                                   
                                </div>

                                <div class="form-group mx-sm-3 mb-4 col-sm-4">
                                    <label for="input_periodo" >Notificacion de Vacunas (Periodo x dias) </label>
                                    <select id="input_periodo" class="form-control">
                                        <option selected></option>
                                        <option>5</option>
                                        <option>7</option>
                                    </select>
                                </div>
                                <button id="boton_agregar" type="button" class="btn btn-primary mb-2">Agregar</button>
                            </form>
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
                                    <?php //echo @$tabla;?>
                                    <!--<tr>
                                        <td scope="col">1</td>
                                        <td scope="col">Distemper</td>
                                        <td scope="col">01/01/2022</td>
                                        <td scope="col">7</td>
                                        <td scope="col"><button type="botton" class="btn btn-primary mb-2">Eliminar</button></td>
                                    </tr>-->
                                </tbody>
                            </table>
                            <hr>
                        </div>
                    </div>
                    <button id="guardar_mascota" type="button" name="save_pet" class="btn btn-primary">Guardar Mascota</button>
                    
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
    let name_contact = document.querySelector('#IdContact');

    let id_name_contact = document.querySelector('#id_name_contact');
    let radio_1 = document.querySelector('#inlineRadio1');
    let radio_2 = document.querySelector('#inlineRadio2');
</script>
<script src="./dist/js/crear_contact2.js"></script>
<script>
    /*let name_contact = document.querySelector('#IdContact');

    let id_name_contact = document.querySelector('#id_name_contact');
    let radio_1 = document.querySelector('#inlineRadio1');
    let radio_2 = document.querySelector('#inlineRadio2');*/

    //document.querySelector('#ids').style.display="none";

    //document.querySelector('#namess').style.display="none";



    document.addEventListener("click",function(event){
        console.log(radio_1.checked);
        if(radio_1.checked){
            document.querySelector('#ids').style.display="block";
            document.querySelector('#namess').style.display="none";
        }else{
            document.querySelector('#ids').style.display="none";
            document.querySelector('#namess').style.display="block";
        }
    });
    
    fetch("./api/api_contact.php?v=name_contact", {
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
            nuevaOpcion.value = lista_de_categorias[i].contact_id;
            nuevaOpcion.text = lista_de_categorias[i].name;
            name_contact.appendChild(nuevaOpcion); //<-- Así tambien funciona

        }
    })
    .catch(function (error) {
        console.error("¡Error!", error);
    });

    id_name_contact.addEventListener("keyup", function(event) {
        //alert("paso");
        if (event.keyCode === 13) {

            obtener_names();

            console.log('Enter is pressed!');
        }
    });
   



    async function obtener_names(){
        await fetch('./api/api_contact.php?v=search_contacts&id='+id_name_contact.value)
            .then(res => res.json())
			.then(function(data){
                //alert('HAY ' + data);
                //console.log(data[1]);
                _nombre.value = data[1];
                _address.value=data[4]; 
                id_name_contact.style.border = "3px solid #28a745";

                id_contact.value=id_name_contact.value;

                guardar_mascota.disabled = false;
                swal("Buen Trabajo!", "Hola "+data[1]+" y Bienvenido", "success");

			})
			.catch(function(error){
						
				console.log(error);
                id_name_contact.style.border = "3px solid red";
                _nombre.value = "";
                _address.value="";
                guardar_mascota.disabled = true;
			});
    }

</script>
