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
                    <a class="nav-link active" href="#"><i class="fa fas fa-address-book"></i>     <pan>Agenda</span><i class="fa fa-angle-left pull-right"></i></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="agenda.php?v=search_contacts"><i class="fa fas fa-users"></i>     <span>Cliente</span> <i class="fa fa-angle-left pull-right"></i></a>
                </li>
                
            </ul>
        </div>
        <div class="col-sm-10">
            <div class="jumbotron shadow-box">
                <h1>Panel de <span class="badge badge-secondary">Configuracion</span></h1>
            </div>
            <div class="jumbotron shadow-box">
                <div class="row">
                    <div class="col-sm-6">
                        <h1>Logo <span class="badge badge-secondary">Configuracion</span></h1>
                        <!--<form>-->
                            <div class="form-group">
                                <img id="file_img" src="<?php echo $_SESSION['INFO_VALID'][4]?>" alt="Contacts" width="350px" class="img-fluid  mx-auto d-block shadow-lg p-3 mb-5 bg-white rounded-pill" >
                                
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="inputGroupFileAddon01">Upload</span>
                                    </div>
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="inputGroupFile01" aria-describedby="inputGroupFileAddon01">
                                        <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
                                    </div>
                                </div>
                            </div>
                            
                        <!--</form>-->
                        <button id="btn_img" type="button" class="btn btn-primary ">Guardar Imagen</button>
                    </div>
                    <div class="col-sm-6">
                        <h1>Color <span class="badge badge-secondary">Configuracion</span></h1>
                        <br>
                        <div class="card" style="width: 18rem;">
                            <div class="color-top-card">

                            </div>
                            <div class="color-top-sider">
                                
                            </div>
                            <div class="card-body">
                                <h5 class="card-title">Navegador y Lateral Menu</h5>
                                <p class="card-text">Seleccione los Colores Para Personalizar su WebApp</p>
                                Color Navbar: <input type="color" value="<?php echo $_SESSION['INFO_VALID'][3];?>" name="navegador" id="navegador">
                                <br>
                                Color Sider: <input type="color"  value="<?php echo $_SESSION['INFO_VALID'][10];?>" name="sider" id="sider">
                                
                            </div>
                        </div>
                        <br>
                        <button id="btn_color" type="button" class="btn btn-primary ">Guardar Color</button>

                    </div>
                </div>
                
            </div>
            <div class="jumbotron shadow-box">
            </div>
        </div>
    </div>
</div>
<script>
    let sider = document.querySelector("#sider");
    let navbar = document.querySelector("#navegador");

    var img = document.querySelector('img#file_img');
    
    let btn_img=document.querySelector("#btn_img");
    let btn_color=document.querySelector("#btn_color");
    let archivo;
    window.addEventListener('load', function() {

        document.querySelector('input[type="file"]').addEventListener('change', function() {
            if (this.files && this.files[0]) {

                const reader = new FileReader();

                reader.addEventListener("load", function () {
                    // convert image file to base64 string
                    img.src = reader.result;
                }, false);

                if (this.files) {
                    reader.readAsDataURL(this.files[0]);
                }

            }
        });

    });

    function blobToFile(theBlob, fileName){
    //A Blob() is almost a File() - it's just missing the two properties below which we will add
        theBlob.lastModifiedDate = new Date();
        theBlob.name = fileName;
        return theBlob;
    }

    btn_img.addEventListener("click", async (event) => {
        swal({
            title: "Desea Cargar Imagen Nueva",
            text: "Guardaras Imagen Logo...!",
            icon: "warning",
            buttons: true,
            dangerMode: true,
            })
            .then((willDelete) => {
            if (willDelete) {
                
                CargarImagen();

                swal("Guardado Config Exitosamente...!", {
                    icon: "success",
                });
                setTimeout("location.reload(true);",3500);

            } else {
                swal("No se guardo la Informacion!");
            }

            //setTimeout("location.reload(true);",3500);

        });

    });

    btn_color.addEventListener("click", async (event) => {
        swal({
            title: "Desea Guardar color?",
            text: "Guardaras configuracion de Color!",
            icon: "warning",
            buttons: true,
            dangerMode: true,
            })
            .then((willDelete) => {
            if (willDelete) {
                
                Cargarcolor();

                swal("Guardado Config Exitosamente...!", {
                    icon: "success",
                }); 

                setTimeout("location.reload(true);",3500);

            } else {
                swal("No se guardo la Informacion!");
            }
        });

    });


    // funciones asyncronicas

    async function CargarImagen() {
        
        const datos = new FormData();

        datos.append('file',img.src);
        datos.append('config_img',"guardar_imagen");
        
        await fetch('home.php',{
            method: 'POST',
            
            body: datos


        })
        .then(function(data){
            console.log(data);

        })
        .catch(function(error){
                    
            console.log(error);

        });
    }

    async function Cargarcolor() {
        
        const datos = new FormData();
                
        datos.append('config_color',"guardar_color");
        let color=[navbar.value,sider.value];
        datos.append('color',color);
        //datos.append('validator',<?php echo $_SESSION['INFO_VALID'][0]; ?>);
        console.log(color);
        //return;
        await fetch('home.php',{
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

    //------

</script>