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
                    <a class="nav-link active" href="reservas.php?v="><i class="fa fas fa-address-book"></i>     <span>Listar Reservas</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i class="fa fa-angle-left pull-right"></i></a>
                </li>
                <!--<li class="nav-item">
                    <a class="nav-link" href="agenda.php?v=search_contacts"><i class="fa fas fa-users"></i>     <span>Cliente</span> <i class="fa fa-angle-left pull-right"></i></a>
                </li>-->
                
            </ul>
        </div>
        <div class="col-sm-1"></div>

        
        <div class="col-sm-8">
            <div class="jumbotron shadow-box">
            
                <h1><a class="btn btn-secondary mb-2" href="agenda.php?v=ver_calendario" role="button"><</a> Editar <span class="badge badge-secondary">Reservas : ID <?php echo $_GET['id'];?></span></h1>
                <form>
                    <div class="row">
                        <div class="col-sm-6 col-md-6">
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="input_contact">ID Contacto</label>
                                <input type="text" class="form-control" id="input_contact" value="<?php echo $reser[0][1];?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputnames">Nombre Completo</label>
                            <input type="text" class="form-control" id="inputnames" >
                        </div>
                        <div class="form-group">
                            <label for="inputAddress">Direccion</label>
                            <input type="text" class="form-control" id="inputAddress" placeholder="Pais, Distrito, Corregimiento, Barriada">
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="inputfecha1">Fecha Inicio : <?php echo $reser[0][4]; ?></label>
                                <input type="date"  value="<?php echo date('Y-m-d', strtotime($reser[0][4])) ?>" class="form-control" id="inputfecha1">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="inputfecha2">Fecha Final : <?php echo $reser[0][5]; ?></label>
                                <input type="date" value="<?php echo date('Y-m-d', strtotime($reser[0][5])) ?>" class="form-control" id="inputfecha2">
                                <!--<select id="inputfecha2" class="form-control">
                                    <option selected>Choose...</option>
                                    <option>...</option>
                                </select>-->
                            </div>
                            <!--<div class="form-group col-md-2">
                                <label for="inputtalla">Talla</label>
                                <input type="text" class="form-control" id="inputtalla">
                            </div>-->
                        </div>
                        <!--<div class="form-row">
                            
                            <div class="form-group col-md-6">
                                <label for="input_tipo">Tipo Animal</label>
                                <select id="input_tipo" class="form-control">
                                    <option selected>Choose...</option>
                                    <option>...</option>
                                </select>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="input_fecha_nac">Fecha de Nacimiento</label>
                                <input type="date" class="form-control" id="input_fecha_nac">
                            </div>
                        </div>-->
                        <!-- iba el botton guardar-->
                        </div>
                        <div class="col-sm-6 col-md-6">
                            <img src="<?php echo $_SESSION['INFO_VALID'][4]?>" alt="Contacts" width="350px" class="img-fluid  mx-auto d-block shadow-lg p-3 mb-5 bg-white rounded-pill" >
                        </div>
                    </div>
                    <!-- Viene las Vacunas-->
                    <hr>
                    <div class="row">
                        <div class="col-xl-6">
                            <h1>Info  <span class="badge badge-secondary">Mascota</span></h1>
                            <form class="form-inline">
                                <!--<div class="form-group mx-sm-3 mb-6 col-sm-6">
                                    <label for="input_idpet" >Ingrese ID o Nombre</label>
                                    <select id="input_idpet" class="form-control">
                                        
                                    </select>
                                </div>-->
                                <div class="form-group mx-sm-3 mb-6 col-sm-6">
                                    <label for="input_cubiculo" >Seleccionar Cubiculos (Disponibles)</label>
                                    <select id="input_cubiculo" class="form-control">
                                        <option selected></option>
                                        
                                    </select>
                                </div>
                                <button id="cambiar_cubiculo" type="button" class="btn btn-primary mb-2">Cambiar Cubiculo</button>
                                <!--<a class="btn btn-primary mb-2" href="Pet.php?v=crear" role="button">Crear Mascotas</a>-->
                                <button id="cargar_cub" type="button" class="btn btn-primary mb-2">Recargar Cubiculos</button>
                            </form>
                            <br><br>
                        </div>
                        <div class="col-xl-12 table-responsive">
                        <!--<h1>Info  <span class="badge badge-secondary">Mascota</span></h1>
                                <button id="agregar_mascota" type="button" class="btn btn-primary mb-2">Eliminar</button>
                                <a class="btn btn-primary mb-2" href="reservas.php?v=editar&id=<?php //echo $_GET['id'];?>" role="button">Editar Reservas</a>
                                <!-<button id="cargar_cub" type="button" class="btn btn-primary mb-2">Recargar Cubiculos</button>->
                            <br>-->
                            <table  id="table_id_edit" class="table table-striped table-hover table-bordered bg-light">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Nombre Mascota</th>
                                        <th scope="col"># Cubiculo</th>
                                        <th scope="col">Cubiculo</th>
                                        <th scope="col">Status</th>
                                        <th scope="col">Fecha Creacion</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php echo @$tabla;?>
                                    <tr>
                                        <td scope="col"><?php echo $reser[0][0]; ?></td>
                                        <td scope="col"><?php echo $reser[0][2]."-".$reser[0][8]; ?></td>
                                        <td id="id_cubiculo" scope="col"><?php echo $reser[0][3]; ?></td>
                                        <td  id="cubiculo" scope="col"><?php echo $reser[0][9]; ?></td>
                                        <td scope="col"><button type="button" class="btn btn-danger">Ocupado</button></td>
                                        <td scope="col"><?php echo $reser[0][6]; ?></td>
                                        
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <hr>
                    <button id="guardar_reserva" type="button" class="btn btn-primary btn-lg btn-block">Editar Reserva</button>
                    
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

//alert(document.cookie.match(/[^;]+/));


let id_contact = document.querySelector('#input_contact');
let _nombre = document.querySelector('#inputnames');
let _address = document.querySelector('#inputAddress');

const combo_pet = document.querySelector("#input_idpet"); 
const combo_cub = document.querySelector("#input_cubiculo"); 

let cargar_cub = document.querySelector("#cargar_cub");

let btm_cambiar_c = document.querySelector("#cambiar_cubiculo");
const _tablas = document.querySelector("#table_id_edit");

let button_reservas = document.querySelector("#guardar_reserva");

let fecha1 = document.querySelector("#inputfecha1");
let fecha2 = document.querySelector("#inputfecha2");

let inc=0;
var _storage = [];

let td_num_cubiculo=0;
let td_name_cubiculo='';
let ii_cub_anterior='';
//localStorage.clear();

//get_storage_pet(document.cookie.match(/[^;]+/));

download_cub(); // cargar cubiculos

//presionar click al botton cargar_cubiculo

cargar_cub.addEventListener("click",async(event)=>{
    download_cub();
    swal("Buen Trabajo!","Cubiculos Cargado y Actualizado", "success");
});

// presionar agregar pet y cubiculo

btm_cambiar_c.addEventListener("click", async(event)=>{
    var ind2= combo_cub.selectedIndex;
    td_num_cubiculo = document.querySelector("#id_cubiculo");
    ii_cub_anterior=td_num_cubiculo.textContent// guardoelid anterior
    td_name_cubiculo = document.querySelector("#cubiculo");
    console.log(td_num_cubiculo.textContent);
    //update_cub(0,td_num_cubiculo.textContent);
    // se actualizo cubiculo anterior

    console.log(combo_cub.options[ind2].text);
    console.log(combo_cub.value);
    td_name_cubiculo.innerHTML=combo_cub.options[ind2].text;
    td_num_cubiculo.innerHTML=combo_cub.value;
    swal("Cambio Realizado de cubiculo...!", {
                    icon: "success",
                }); 
    //update_cub(2,combo_cub.value);
})


button_reservas.addEventListener("click",async(event)=>{
    swal({
            title: "Desea Actualizar Informacion de Reservas?",
            text: "Guardaras Info de Reservas...!",
            icon: "warning",
            buttons: true,
            dangerMode: true,
            })
            .then((willDelete) => {
            if (willDelete) {
                // update cubiculo actual
                //update_cub(1,td_num_cubiculo.textContent);
                update_cub(0,ii_cub_anterior);
                getResponse();

                swal("Guardado Reservas Exitosamente...!", {
                    icon: "success",
                }); 
                //localStorage.clear();
                setTimeout("redireccionarPagina('reservas.php?v=')", 5000);
                //location.replace("reservas.php?v=");

            } else {
                swal("No se guardo la Informacion!");
            }
        });

});


id_contact.addEventListener("keypress", async (event) => {
					
    await fetch('./api/api_contact.php?v=search_contacts&id='+id_contact.value)
        .then(res => res.json())
        .then(function(data){
        //alert('HAY ' + data);
        //console.log(data[1]);
        _nombre.value = data[1];
        _address.value=data[4]; 
        id_contact.style.border = "3px solid #28a745";
        //guardar_mascota.disabled = false;
        swal("Buen Trabajo!", "Hola "+data[1]+" y Bienvenido", "success");
        //download_pet();
    })
    .catch(function(error){
                                
        console.log(error);
        id_contact.style.border = "3px solid red";
        _nombre.value = "";
        _address.value="";
        //guardar_mascota.disabled = true;
    });

                        
});

// cargando cubiculos

async function download_cub(){
    for(var i= combo_cub.options.length; i>=0;i--){
        combo_cub.remove(i);
    }
    await fetch("./ajax/ajax.php?ob=ver_cubiculo", {
        method: 'GET'
    })
    .then(res => res.json())
    .then(lista_de_categorias => {

        for(var i=0;i<lista_de_categorias.length;i++){
            let nuevaOpcion = document.createElement("option");
            //alert(lista_de_categorias[i].name);
            nuevaOpcion.value = lista_de_categorias[i].id;
            nuevaOpcion.text = lista_de_categorias[i].name;
            combo_cub.appendChild(nuevaOpcion); //<-- Así tambien funciona

        }
    })
    .catch(function (error) {
        console.error("¡Error!", error);
    });
}
// actualizar status de cubiculos
/*async function update_cub(status){
    
    await fetch("./ajax/ajax.php?ob=update_cub&st="+status+"&id="+combo_cub.value, {
        method: 'GET'
    })
    .then(res => res.json())
    .then(lista_de_categorias => {
       
        console.log(lista_de_categorias);
    })
    .catch(function (error) {
        console.error("¡Error!", error);
    });

}*/
async function update_cub(status,combo){
    
    await fetch("./ajax/ajax.php?ob=update_cub&st="+status+"&id="+combo, {
        method: 'GET'
    })
    .then(res => res.json())
    .then(lista_de_categorias => {
        console.log(lista_de_categorias);
    })
    .catch(function (error) {
        console.error("¡Error!", error);
    });

}

/**async function download_pet(){
    for(var i= combo_pet.options.length; i>=0;i--){
            combo_pet.remove(i);
    }
    await fetch("./ajax/ajax.php?ob=listar_mascotas&id="+id_contact.value, {
        method: 'GET'
    })
    .then(res => res.json())
    .then(lista_de_categorias => {


        for(var i=0;i<lista_de_categorias.length;i++){
            let nuevaOpcion = document.createElement("option");
            nuevaOpcion.value = lista_de_categorias[i].id;
            nuevaOpcion.text = lista_de_categorias[i].name;
            combo_pet.appendChild(nuevaOpcion); //<-- Así tambien funciona

        }
    })
    .catch(function (error) {
        console.error("¡Error!", error);
    });

}*/

function redireccionarPagina(local) {
  window.location = local;
}

async function getResponse() {
        var t = _tablas.rows;
        var vacun=Array();
        const datos = new FormData();
           
        
        for(var i=1;i<=t.length-1;i++){
            
            
            datos.append('reservas'+i,[t[i].cells[2].textContent
            ,fecha1.value
            ,fecha2.value]);
            datos.append('id_reserva',t[i].cells[0].textContent);
        };
        datos.append('cantidad',i-1); 

        //datos.append('save_reservas',"guardar_reservas");// guardar reservas
        datos.append('update_reservas',"actualizar_reservas");// guardar reservas

        await fetch('reservas.php',{
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

/*function grabar_session(_idp,_mas,_idcub,_cubi){
    
    
    _storage[inc]=[document.cookie.match(/[^;]+/)
        ,_idp
        ,_mas
        ,_idcub
        ,_cubi
    ];

    console.log(_storage);
    

    localStorage.setItem('DATOS',JSON.stringify(_storage));
    inc++;

}

function get_storage_pet(id){

    const _get_storage= localStorage.getItem('DATOS');
    const _array_storage= JSON.parse(_get_storage);


   if(_array_storage===null){
        return true;
   }
   for(var i=0;i<_array_storage.length;i++){

            if(_array_storage[i][0].toString()==id.toString()){
                _tablas.insertRow(-1).innerHTML ='<td>'+_array_storage[i][1]+'</td><td>'+_array_storage[i][2]+'</td><td>'+_array_storage[i][3]+'</td><td>'+_array_storage[i][4]+'</td><td><button type="button" class="btn btn-danger">Ocupado</button></td><td scope="col"><button type="button" class="btn btn-primary mb-2">Eliminar</button></td>';
            }

    }

}*/

</script>