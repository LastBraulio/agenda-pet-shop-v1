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
                    <a class="nav-link active" href="Pet.php?v="><i class="fa fas fa-address-book"></i>     <pan>Listar Mascotas</span><i class="fa fa-angle-left pull-right"></i></a>
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
                        <div class="form-group">
                            <label for="input_idcont">ID Contacto</label>
                            <input type="text" class="form-control" id="input_idcont" required>
                        </div>
                        <div class="form-group">
                            <label for="input_nombre">Nombre</label>
                            <input type="text" class="form-control" id="input_nombre" required>
                        </div>
                        <div class="form-group">
                            <label for="inputAddress">Address</label>
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
        </div>

        <div class="col-sm-1"></div>

    </div>
</div>
<script src="./dist/js/crear_contact2.js"></script>
<!--<script>
    const select = document.querySelector("#inputraza"); //Obtenemos el select
    let guardar_mascota = document.querySelector("#guardar_mascota");

    fetch("./ajax/ajax.php?ob=ajax_razas", {
    method: 'GET'
    })
    .then(res => res.json())
    .then(lista_de_categorias => {
        //console.log("Las categorías son:",lista_de_categorias);
       // alert('HAY ' + lista_de_categorias.length);
        //select.appendChild(lista_de_categorias);

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
        //console.log("Las categorías son:",lista_de_categorias);
        //alert('HAY ' + lista_de_categorias.length);
        //select.appendChild(lista_de_categorias);

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

    //onst select2 = document.querySelector("#input_vacunas"); //Obtenemos el select

    name.addEventListener("change", async (event) => {
			
            for(var i= combo.options.length; i>=0;i--){
                combo.remove(i);
            }

            

			await fetch('./ajax/ajax.php?ob=vacunas&v='+name.value)
            .then(res => res.json())
			.then(function(data){
                //alert('HAY ' + data.length);
                //select.appendChild(lista_de_categorias);

                for(var i=0;i<data.length;i++){
                    let nuevaOpcion = document.createElement("option");
                    //alert(lista_de_categorias[i].name);
                    nuevaOpcion.value = data[i].id;
                    nuevaOpcion.text = data[i].name;
                    combo.appendChild(nuevaOpcion); //<-- Así tambien funciona

                }
			})
			.catch(function(error){
						
				console.log(error);
			});
				
	});

    let botton_tabla = document.querySelector("#boton_agregar");
    let tabla = document.querySelector("#id_tabla")

    let fecha_v = document.querySelector("#input_fecha_v");
    let periodo= document.querySelector("#input_periodo");
    let indice=0;
    botton_tabla.addEventListener("click", async (event) => {
        //let v_tr = document.createElement("tr");
        //let v_td = document.createElement("td");
        indice++;
        var ind= combo.selectedIndex;
        //console.log(combo.value);
        //console.log(combo.options[ind].text);
        tabla.insertRow(-1).innerHTML ='<td>'+indice+'</td><td>'+combo.value+'-'+combo.options[ind].text+'</td><td>'+fecha_v.value+'</td><td>'+periodo.value+'</td><td scope="col"><button type="button" class="btn btn-primary mb-2">Eliminar</button></td>';

    });

    let id_tabla=document.querySelector("#id_tabla");
    id_tabla.addEventListener("click",async (event)=>{
       
        //alert(id_tabla.querySelector("tr td").innerHTML);
        //var id=id_tabla.querySelector("tr td").innerHTML;
       // var id=id_tabla.rows.length;
       var id=event.target.innerHTML;
        //var rows = id_tabla.querySelectorAll("tr");
        var rows = id_tabla.querySelectorAll("thead");
        //console.log(event.target);
        //console.log(rows);
        
        //console.log("Las categorías son:",id_tabla.querySelector("tr td").innerHTML);
        //console.log("indice:",id);
        
       if(id=="#"){
        console.log("Encabezado no se toca");
       }else{
        indice--;
        id_tabla.deleteRow(id);
       }
        
        
    });

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
			/*.then(function(response) {
				if(response.ok){
					id_contact.style.border = "3px solid #28a745";
					//botton.disabled = true;
				}else{
					id_contact.style.border = "3px solid red";
					//botton.disabled = false;
				}
			})
			.then(function(data){
				console.log(data[0]);			
			})
			.catch(function(error){
						
				console.log(error);
			});*/
				
	});

    guardar_mascota.addEventListener("click", async (event) => {
        swal({
            title: "Desea Guardar Informacion de Mascota?",
            text: "Guardaras Info de Mascotas y sus Vacunas Agregadas...!",
            icon: "warning",
            buttons: true,
            dangerMode: true,
            })
            .then((willDelete) => {
            if (willDelete) {

                swal("Guardado Mascota Exitosamente...!", {
                icon: "success",
                });
            } else {
                swal("No se guardo la Informacion!");
            }
        });
    });




</script>-->