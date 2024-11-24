<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.css">
<link href='dist/calendar_js/main.css' rel='stylesheet' />
    <script src='dist/calendar_js/main.js'></script>
    <script>

     document.addEventListener('DOMContentLoaded', function() {
        var calendarEl = document.getElementById('calendar');
        var calendar = new FullCalendar.Calendar(calendarEl, {
            initialView: 'dayGridMonth',
            headerToolbar: {
                left: 'title',
                //center: 'title',
                //right: 'dayGridMonth,timeGridWeek,timeGridDay'
                right: 'prev,next today'
            },
            locale:'es',
            events: 'ajax/ajax.php?ob=fechas'
          /*,events:[{
            id:"14041",
            title:"reservas 4",
            url:"reservas.php?v=kardes",
            start:"2022-06-30",
            end:"2022-07-06"

          }]*/
        });
        calendar.render();
      });

      

    </script>
    
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
                    <a class="nav-link active" href="#"><i class="fa fas fa-address-book"></i>     <pan>Agenda</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i class="fa fa-angle-left pull-right"></i></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="home.php?v=search_contacts"><i class="fa fas fa-users"></i>     <span>Cliente</span> <i class="fa fa-angle-left pull-right"></i></a>
                </li>
                
            </ul>
        </div>
        <div class="col-sm-10">
            <div class="jumbotron shadow-box">
                <h1>Calendario <span class="badge badge-secondary">Reservas</span></h1>
            
            </div>
            <div class="jumbotron shadow-box table-responsive ">

                <div id='calendar'></div>
            </div>
            <div class="jumbotron shadow-box">

            </div>
        </div>
    </div>
</div>