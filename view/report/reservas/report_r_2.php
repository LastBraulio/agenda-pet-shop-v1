<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
    
    <title>Reporte Que Vence Hoy <?php echo date('d-m-Y');?></title>
</head>
<body>
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
            <h3 class="text-center"> Animales con Vacunas que vencen <span class="badge badge-danger">Hoy </span>  <?php echo date('d-m-Y');?> </h3>
                <br><br>
                <table id="mytable" class="table table-striped table-hover table-bordered bg-light">
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
                        </tr>
                    </thead>
                    <tbody>
                        <?php echo @$tbl_vacun;?>

                    </tbody>
                </table>
                <h5 class="text-right">Cantidad: <?php echo $vacun_contar;?> </h5><br>
            </div>
        </div>
    </div>

        
    
</body>
<script>
    window.print();
</script>
</html>