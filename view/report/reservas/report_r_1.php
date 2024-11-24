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
                <h2 class="text-center" >Reservas que vencen <span class="badge badge-danger">Hoy </span>  <?php echo date('d-m-Y');?> </h2>
                <br><br>
                <table id="mytable" class="table table-striped table-hover table-bordered bg-light table-sm">
                    <thead>
                        <tr>
                            <th scope="col"># </th>
                            <th scope="col">ID CONTACTOS</th>
                            <th scope="col">ID MASCOTAS</th>
                            <th scope="col">ID CUBICULO</th>
                            <th scope="col">FECHA FINAL</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php echo @$tabla_reserva_x_v;?>
                    </tbody>
                </table>
                <h5 class="text-right">Cantidad: <?php echo $cant_x_hoy;?> </h5><br>
            </div>
        </div>
    </div>

        
    
</body>
<script>
    window.print();
</script>
</html>