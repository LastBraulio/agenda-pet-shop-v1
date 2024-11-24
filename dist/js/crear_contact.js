    const select = document.querySelector("#inputraza"); //Obtenemos el select
    let guardar_mascota = document.querySelector("#guardar_mascota");
    const select2 = document.querySelector("#input_tipo"); //Obtenemos el select

    let name = document.querySelector('#input_tipo');
    let combo = document.querySelector('#input_vacunas');

    
    let botton_tabla = document.querySelector("#boton_agregar");
    let tabla = document.querySelector("#id_tabla")

    let fecha_v = document.querySelector("#input_fecha_v");
    let periodo= document.querySelector("#input_periodo");
    let indice=0;

    let id_tabla=document.querySelector("#id_tabla");

    /* declarar variables */
    let inputname=document.querySelector("#inputname");
    let inputapellido=document.querySelector("#inputapellido");
    let inputnames=document.querySelector("#inputnames");
    let inputpeso=document.querySelector("#inputpeso");
    let inputtalla=document.querySelector("#inputtalla");
    let input_fecha_nac=document.querySelector("#input_fecha_nac");

    let input_id_bussines = document.querySelector("#input_bussines_id");
    
    fetch("./ajax/ajax.php?ob=ajax_razas", {
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
            select.appendChild(nuevaOpcion); //<-- Así tambien funciona

        }
    })
    .catch(function (error) {
        
        console.error("¡Error!", error);
    });
    //-----------

    

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

    botton_tabla.addEventListener("click", async (event) => {
        //let v_tr = document.createElement("tr");
        //let v_td = document.createElement("td");
        indice++;
        var ind= combo.selectedIndex;
        //console.log(combo.value);
        //console.log(combo.options[ind].text);
        tabla.insertRow(-1).innerHTML ='<td>'+indice+'</td><td>'+combo.value+'-'+combo.options[ind].text+'</td><td>'+fecha_v.value+'</td><td>'+periodo.value+'</td><td scope="col"><button type="button" class="btn btn-primary mb-2">Eliminar</button></td>';

    });


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
                /*var t = id_tabla.rows;
                var vacun=Array();
                
                for(var i=1;i<=t.length-1;i++){
                    /*for(var y=1;y<=t[i].cells.length-1;y++){
                        console.log(t[i].cells[y].textContent);
                        
                    }*/
                    //vacun[i-1]=['vacuna' : t[i].cells[1].textContent
                      //          , 'fecha_vac' : t[i].cells[2].textContent
                       //         , 'notif_vac' : t[i].cells[3].textContent ];
                   /* vacun[i-1]=[t[i].cells[1].textContent
                                ,t[i].cells[2].textContent
                                ,t[i].cells[3].textContent,'@' ];
        
                };
                console.log(vacun);
                let info_pet={
                    'inputname': inputname.value,
                    'inputapellido':inputapellido.value,
                    'inputnames':inputnames.value,
                    'id_contact':id_contact.value,
                    'inputpeso':inputpeso.value,
                    'inputtalla':inputtalla.value,
                    'input_fecha_nac':input_fecha_nac.value,
                    'inputraza':select.value,
                    'tipopet':select2.value,
                    'bussines':3
                };
                console.log(info_pet);*/
                
                getResponse();

                /*await fetch('Pet.php?',{
                    method: 'POST',
                    headers: {
                        'Accept': 'application/json',
                        'Content-Type': 'application/json'
                    },
                    body: JSON.stringify({
                        'pet':info_pet.json(),
                        'vac':vacun.json()
                    })

                }).then(res => res.json())
                .then(function(data){
                    console.log(data);

                })
                .catch(function(error){
                            
                    console.log(error);

                });*/


                swal("Guardado Mascota Exitosamente...!", {
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
                
        datos.append('cant_vac',t.length-1);
         for(var i=1;i<=t.length-1;i++){
            
            
            datos.append('vac'+i,[t[i].cells[1].textContent
            ,t[i].cells[2].textContent
            ,t[i].cells[3].textContent]);
        
        };

        //console.log(vacun);
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
                    input_id_bussines.value //id_bussines
        ];
        console.log(info_pet);

        datos.append('pet',info_pet);
        datos.append('save_pet',"guardar_pet");

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