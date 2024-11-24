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
            
                <h1><a class="btn btn-secondary mb-2" href="agenda.php?v=ver_calendario" role="button"><</a> Ver <span class="badge badge-secondary">Reservas : ID <?php echo $_GET['id'];?></span></h1>
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
                                <input type="date" value="<?php echo date('Y-m-d', strtotime($reser[0][4])) ?>" class="form-control" id="inputfecha1">
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
                        <!--<div class="col-xl-6">
                            <h1>Info  <span class="badge badge-secondary">Mascota</span></h1>
                            <--<form class="form-inline">
                                <div class="form-group mx-sm-3 mb-6 col-sm-6">
                                    <label for="input_idpet" >Ingrese ID o Nombre</label>
                                    <select id="input_idpet" class="form-control">
                                        
                                    </select>
                                </div>
                                <div class="form-group mx-sm-3 mb-6 col-sm-6">
                                    <label for="input_cubiculo" >Seleccionar Cubiculos (Disponibles)</label>
                                    <select id="input_cubiculo" class="form-control">
                                        <option selected></option>
                                        
                                    </select>
                                </div>
                                <button id="agregar_mascota" type="button" class="btn btn-primary mb-2">Agregar</button>
                                <a class="btn btn-primary mb-2" href="Pet.php?v=crear" role="button">Crear Mascotas</a>
                                <button id="cargar_cub" type="button" class="btn btn-primary mb-2">Recargar Cubiculos</button>
                            </form>
                            <br>--
                        </div>-->
                        <div class="col-xl-12 table-responsive">
                            <h1>Info  <span class="badge badge-secondary">Mascota</span></h1>
                            <a class="btn btn-primary mb-2" href="reservas.php?v=eliminar&id=<?php echo $_GET['id'];?>&cub=<?php echo $reser[0][3]; ?>" role="button">Eliminar Reservas</a>
                                <a class="btn btn-primary mb-2" href="reservas.php?v=editar&id=<?php echo $_GET['id'];?>" role="button">Editar Reservas</a>
                                <!--<button id="cargar_cub" type="button" class="btn btn-primary mb-2">Recargar Cubiculos</button>-->
                            <br>
                            <table id="mytable" class="table table-striped table-hover table-bordered bg-light">
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
                                    <?php //echo //@$tabla;?>
                                    <tr>
                                        <td scope="col"><?php echo $reser[0][0]; ?></td>
                                        <td scope="col"><?php echo $reser[0][2]."-".$reser[0][8]; ?></td>
                                        <td scope="col"><?php echo $reser[0][3]; ?></td>
                                        <td scope="col"><?php echo $reser[0][9]; ?></td>
                                        <td scope="col"><button type="button" class="btn btn-danger">Ocupado</button></td>
                                        <td scope="col"><?php echo $reser[0][6]; ?></td>
                                        
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <hr>
                    <!--<button id="guardar_reserva" type="button" class="btn btn-primary btn-lg btn-block">Guardar Reserva</button>-->
                    
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

let button_tabla = document.querySelector("#agregar_mascota");
const _tablas = document.querySelector("#mytable");

let button_reservas = document.querySelector("#guardar_reserva");

let fecha1 = document.querySelector("#inputfecha1");
let fecha2 = document.querySelector("#inputfecha2");

let inc=0;
var _storage = [];
//localStorage.clear();

//get_storage_pet(document.cookie.match(/[^;]+/));

//download_cub(); // cargar cubiculos

//presionar click al botton cargar_cubiculo

/*cargar_cub.addEventListener("click",async(event)=>{
    download_cub();
    swal("Buen Trabajo!","Cubiculos Cargado y Actualizado", "success");
});*/

// presionar agregar pet y cubiculo

/*button_tabla.addEventListener("click",async(event)=>{
       
        var ind= combo_pet.selectedIndex;
        var ind2= combo_cub.selectedIndex;
        //console.log(combo.value);
        //console.log(combo.options[ind].text);
        _tablas.insertRow(-1).innerHTML ='<td>'+combo_pet.value+'</td><td>'+combo_pet.options[ind].text+'</td><td>'+combo_cub.value+'</td><td>'+combo_cub.options[ind2].text+'</td><td><button type="button" class="btn btn-danger">Ocupado</button></td><td scope="col"><button type="button" class="btn btn-primary mb-2">Eliminar</button></td>';

        grabar_session(combo_pet.value,combo_pet.options[ind].text,combo_cub.value,combo_cub.options[ind2].text);

        // viene la funcion para cambiar cubiculoestado
        update_cub(2);
        // actualizo combobox de cubiculos
        download_cub();
        swal("Buen Trabajo!","Cubiculos Cargado y Actualizado", "success");

});*/

/*button_reservas.addEventListener("click",async(event)=>{
    swal({
            title: "Desea Guardar Informacion de Mascota?",
            text: "Guardaras Info de Mascotas y sus Vacunas Agregadas...!",
            icon: "warning",
            buttons: true,
            dangerMode: true,
            })
            .then((willDelete) => {
            if (willDelete) {

                getResponse();

                swal("Guardado Reservas Exitosamente...!", {
                    icon: "success",
                }); 
                localStorage.clear();
                setTimeout("redireccionarPagina('reservas.php?v=')", 5000);
                //location.replace("reservas.php?v=");

            } else {
                swal("No se guardo la Informacion!");
            }
        });

});*/


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

/*async function download_cub(){
    for(var i= combo_cub.options.length; i>=0;i--){
        combo_cub.remove(i);
    }
    await fetch("./ajax/ajax.php?ob=ver_cubiculo", {
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
            combo_cub.appendChild(nuevaOpcion); //<-- Así tambien funciona

        }
    })
    .catch(function (error) {
        console.error("¡Error!", error);
    });
}
// actualizar status de cubiculos
async function update_cub(status){
    
    await fetch("./ajax/ajax.php?ob=update_cub&st="+status+"&id="+combo_cub.value, {
        method: 'GET'
    })
    .then(res => res.json())
    .then(lista_de_categorias => {
        //console.log("Las categorías son:",lista_de_categorias);
        //alert('HAY ' + lista_de_categorias.length);
        //select.appendChild(lista_de_categorias);

        /*for(var i=0;i<lista_de_categorias.length;i++){
            let nuevaOpcion = document.createElement("option");
            //alert(lista_de_categorias[i].name);
            nuevaOpcion.value = lista_de_categorias[i].id;
            nuevaOpcion.text = lista_de_categorias[i].name;
            combo_cub.appendChild(nuevaOpcion); //<-- Así tambien funciona

        }*
        console.log(lista_de_categorias);
    })
    .catch(function (error) {
        console.error("¡Error!", error);
    });

}

async function download_pet(){
    for(var i= combo_pet.options.length; i>=0;i--){
            combo_pet.remove(i);
    }
    await fetch("./ajax/ajax.php?ob=listar_mascotas&id="+id_contact.value, {
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
            
            
            datos.append('reservas'+i,[id_contact.value,t[i].cells[0].textContent
            ,t[i].cells[2].textContent
            ,fecha1.value
            ,fecha2.value]);
        };
        datos.append('cantidad',i-1); 


        //console.log(vacun);
        /*let info_pet=[
                    inputname.value,
                    inputapellido.value,
                    inputnames.value,
                    id_contact.value,
                    inputpeso.value,
                    inputtalla.value,
                    input_fecha_nac.value,
                    select.value,
                    select2.value,
                    3
        ];*/
        //console.log(info_pet);]
        //console.log(vacun[0]);
        
        //var arr = Object.keys(vacun[0]).map(function (key) {return [Number(key), vacun[0][key]];});
        //var arr=Object.entries(vacun[0]);
        //console.log(arr);
        //datos.append('pet',info_pet);
        datos.append('save_reservas',"guardar_reservas");
        //datos.append('vacun',JSON.stringify(vacun));
        
       // console.log(datos);
        //datos.append('pet', JSON.stringify(info_pet));
        //datos.append('vacun',JSON.stringify(vacun) );
        await fetch('reservas.php',{
            method: 'POST',
            
            body: datos
           /*  body: JSON.stringify({
                'pet':info_pet,
                'vac':vacun
            }),
            headers:{
                'Content-Type': 'application/json'
              }*/

        }).then(res => res.json())
        .then(function(data){
            console.log(data);

        })
        .catch(function(error){
                    
            console.log(error);

        });
}

function grabar_session(_idp,_mas,_idcub,_cubi){
    
    
    _storage[inc]=[document.cookie.match(/[^;]+/)
        ,_idp
        ,_mas
        ,_idcub
        ,_cubi
    ];

    console.log(_storage);
    

    localStorage.setItem('DATOS',JSON.stringify(_storage));
    inc++;

    //localStorage.setItem('IDSESSION',document.cookie.match(/[^;]+/));
    //localStorage.setItem('IDP',_idp);
    //localStorage.setItem('MASCOTA',_mas);
    //localStorage.setItem('IDCUB',_idcub);
    //localStorage.setItem('CUBICULO',_cubi);

}

function get_storage_pet(id){

    const _get_storage= localStorage.getItem('DATOS');
    const _array_storage= JSON.parse(_get_storage);
    //console.log(_array_storage[0][0]);
    //console.log(id);
    //console.log(_array_storage.length);

   if(_array_storage===null){
        return true;
   }
   for(var i=0;i<_array_storage.length;i++){
            /*if(_array_storage[0][0].toString()==id.toString()){
                console.log(true);
            }else{
                console.log(false);
            }*/

            if(_array_storage[i][0].toString()==id.toString()){
                _tablas.insertRow(-1).innerHTML ='<td>'+_array_storage[i][1]+'</td><td>'+_array_storage[i][2]+'</td><td>'+_array_storage[i][3]+'</td><td>'+_array_storage[i][4]+'</td><td><button type="button" class="btn btn-danger">Ocupado</button></td><td scope="col"><button type="button" class="btn btn-primary mb-2">Eliminar</button></td>';
            }

    }

}

</script>