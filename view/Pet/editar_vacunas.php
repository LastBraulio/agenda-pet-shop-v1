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
                <h1>Editar <span class="badge badge-secondary">Vacuna : ID <?php echo $_GET['id'];?></span></h1>
                <form>
        
                    <!-- Viene las Vacunas-->
                    <hr>
                    <div class="row">
                        <div class="col-sm-12">
                           
                            <form class="form-inline">
                                
                                <div class="form-group mx-sm-3 mb-4 col-md-6">
                                        <label for="input_tipo">Tipo Animal</label>
                                        <select id="input_tipo" class="form-control">
                                            <option selected><?php //echo $pets[0][13]; ?></option>
                                            
                                        </select>
                                    </div>
                                <div class="form-group mx-sm-3 mb-4 col-sm-6">
                                    <label for="input_vacunas" >Ingrese ID o Nombre</label>
                                   
                                    <select id="input_vacunas" class="form-control">
                                        <option selected>Choose...</option>
                                        
                                    </select>
                                </div>
                                <div class="form-group mx-sm-3 mb-4 col-sm-6">
                                    <label for="input_fecha_v" >Fecha Vencimiento Vacunacion</label>
                                    <input type="date" class="form-control" id="input_fecha_v" >
                                   
                                </div>

                                <div class="form-group mx-sm-3 mb-4 col-sm-6">
                                    <label for="input_periodo" >Notificacion de Vacunas (Periodo x dias) </label>
                                    <select id="input_periodo" class="form-control">
                                        <option selected></option>
                                        <option>5</option>
                                        <option>7</option>
                                    </select>
                                </div>
                                <button id="boton_agregar" type="button" class="btn btn-primary mb-2">Cambiar Vacunas</button>
                            </form>
                            <hr>
                            <table id="id_tabla" class="table table-striped table-hover table-bordered bg-light">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Nombre Vacuna</th>
                                        <th scope="col">Fecha V. Vacunacion</th>
                                        <th scope="col">Duracion</th>
                                        
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php echo @$tabla;?>

                                </tbody>
                            </table>
                            <hr>
                        </div>
                    </div>
                    <button id="guardar_mascota_" type="button" name="save_pet" class="btn btn-primary">Actualizar Vacuna</button>
                    
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
    let guardar_mascota = document.querySelector("#guardar_mascota_");



    const select2 = document.querySelector("#input_tipo"); //Obtenemos el select

    fetch("./ajax/ajax.php?ob=tipo_pet", {
    method: 'GET'
    })
    .then(res => res.json())
    .then(lista_de_categorias => {
    

        for(var i=0;i<lista_de_categorias.length;i++){
            let nuevaOpcion = document.createElement("option");
         
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

   

    name.addEventListener("change", async (event) => {
			
            for(var i= combo.options.length; i>=0;i--){
                combo.remove(i);
            }

            

			await fetch('./ajax/ajax.php?ob=vacunas&v='+name.value)
            .then(res => res.json())
			.then(function(data){

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
        var ind2= combo.selectedIndex;

        let vacuna = document.querySelector("#vacuna");
        let fecha_vac = document.querySelector("#fecha_vac");
        let duracion = document.querySelector("#duracion");
        //alert("paso por aca");
        swal({
            title: "Desea Realizar Cambios de Vacunas?",
            text: "Cambiar Info de sus Vacunas Agregadas...!",
            icon: "warning",
            buttons: true,
            dangerMode: true,
            })
            .then((willDelete) => {
            if (willDelete) {

                vacuna.textContent = combo.value+"-"+combo.options[ind2].text;
                fecha_vac.textContent = fecha_v.value;
                duracion.textContent = periodo.value;


                swal("Cambios Exitosamente...!", {
                    icon: "success",
                });
                guardar_mascota.disabled = false;

            } else {
                swal("No se guardo la Informacion!");
            }
        });
        


    });

    let id_tabla=document.querySelector("#id_tabla");


    let id_contact = document.querySelector('#input_idcont');
    let _nombre = document.querySelector('#input_nombre');
    let _address = document.querySelector('#inputAddress');

    guardar_mascota.disabled = true;


    guardar_mascota.addEventListener("click", async (event) => {
        swal({
            title: "Desea Actualizar Informacion de Vacuna?",
            text: "Actualizar Info de Vacunas Agregadas...!",
            icon: "warning",
            buttons: true,
            dangerMode: true,
            })
            .then((willDelete) => {
            if (willDelete) {
                
                
                getResponse();


                swal("Actualizado Vacuna Exitosamente...!", {
                    icon: "success",
                });
                setTimeout("redireccionarPagina('Pet.php?v=')", 5000);

            } else {
                swal("No se guardo la Informacion!");
            }
        });
    });

    async function getResponse() {
        var t = id_tabla.rows;
        var vacun=Array();
        const datos = new FormData();

            
        datos.append('id_pet_vacuna',t[1].cells[0].textContent)
        datos.append('vacuna',[t[1].cells[1].textContent,t[1].cells[2].textContent,t[1].cells[3].textContent]);
        
        //};

        console.log([t[1].cells[1].textContent,t[1].cells[2].textContent,t[1].cells[3].textContent]);

        datos.append('update_pet',"actualizar_pet");

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