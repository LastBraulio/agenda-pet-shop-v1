<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous"></script>
    
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.js"></script>
    
    <footer class="container-fluid bg-primary text-light  py-3 fixed-bottom fot-shadow">
        <div class="row">
            <div class="col-sm-12">
                <h6 class="text-center"> Forte Agenda - V2.0.1 | Copyright © 2022 All rights reserved. </h6>
            </div>
        </div>
    </footer>
</body>
</html>
<script>
    let table = new DataTable('#table_id', {
        // options
    });
   /* $(document).ready( function () {
        $('#table_id').DataTable();
    } );*/

    let table1 = new DataTable('#table_id_1', {
        // options
    });
    let table2 = new DataTable('#table_id_2,#table_id_3,#table_id_4', {
        // options
    });

    let table_kardes = new DataTable('#table_k_2,#table_k_3,#table_k_4', {
        // options
    });

</script>
