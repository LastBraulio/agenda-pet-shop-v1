<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <link rel="icon" href="https://i.pinimg.com/originals/58/40/e2/5840e25157c52ee80139138d44d4f4a4.jpg">
    <title><?php echo @$_SESSION['APP_NAMES']." - Pagina Principal";?></title>
    <style>
        body{
            background-color: #fff !important;
            font-family: Gill Sans, Gill Sans MT, Calibri;
        }
        .boxx{
            margin-bottom: 4rem;
           
        }
        .bg-primary {
            /*background-color: #706db1 !important; /*color para dashboard morado*/
            background-color: <?php echo $_SESSION['INFO_VALID'][3]?> !important;
        }
        .sider_color{
            
            /*background-color:#21243d !important;*/
            background-color: <?php echo $_SESSION['INFO_VALID'][10]?> !important;
            padding-top: 2rem;
            padding-bottom: 2rem;
            margin-bottom:1rem;
        }
        .sider_color ul li{   
            
            /*background-color:#21243d !important;*/
            background-color: <?php echo $_SESSION['INFO_VALID'][10]?> !important;
        }
        .sider_color a {
            
            color:white;
        }
        .sider_color ul li a:hover{
            color:#8f8b8b;
           
        }
        
        .pull-right {
            float: right !important;
        }
        .shadow-box{
            box-shadow: -5px 7px 4px -1px rgba(0,0,0,0.73);
            -webkit-box-shadow: -5px 7px 4px -1px rgba(0,0,0,0.73);
            -moz-box-shadow: -5px 7px 4px -1px rgba(0,0,0,0.73);
        }
        .nav-shadow{
            box-shadow: -4px 13px 4px -1px rgba(0,0,0,0.14);
            -webkit-box-shadow: -4px 13px 4px -1px rgba(0,0,0,0.14);
            -moz-box-shadow: -4px 13px 4px -1px rgba(0,0,0,0.14);
        }
        .fot-shadow{
            box-shadow: -1px -11px 11px 0px rgba(0,0,0,0.53);
            -webkit-box-shadow: -1px -11px 11px 0px rgba(0,0,0,0.53);
            -moz-box-shadow: -1px -11px 11px 0px rgba(0,0,0,0.53);
        }
        .jumbotron {
            padding: 2rem 2rem;
            margin-top:1rem;
            border-top: 3px solid #d2d6de;
            border-top-color: #f39c12;
            background-color: #fff;
        }
        .col-sm-12.subsep {
            /*background-color: #706db1;*/
            background-color: <?php echo $_SESSION['INFO_VALID'][3]?> !important;
            height: 35%;
            width: 100%;
            position: absolute;
        }
        .card{
            border-left-color: #f39c12;
            border-left-width: 0.5rem;
            border-top: none;
            border-right-width: 1.2rem;
            border-block-width: 1.2rem;
            border-block-end-color: gray;
            border-bottom-color: gray;
            
        }
        .card:hover{
            animation-duration: 1s;
                animation-name: box1;
                animation-iteration-count: infinite;
                animation-direction: alternate;
        }
        @keyframes box1 {
            0%{left: 1rem;}
            12%{left: 1.5rem;}
            25%{left: 1rem;}
            50%{left: 0.5rem;}
            50%{left: 0.1rem;}
            75%{left: 0.5rem;}
            100%{left: 1rem;}
        }

        

        @media screen and (max-width: 900px) {
            .sider_color a {
                font-size:0.8rem;
            }
        }
        .color-top-card{
            background-color: <?php echo $_SESSION['INFO_VALID'][3]?> !important;
            width:100%;
            height: 50px;
        }
        .color-top-sider{
            background-color: <?php echo $_SESSION['INFO_VALID'][10]?> !important;
            width:100%;
            height: 50px;
        }
        /*.flex-column {
            -ms-flex-direction: column !important;
            flex-direction: column !important;
            position: fixed;
        }*/
        .navbar-dark .navbar-nav .nav-link {
            color: white;
        }

        
    </style>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.css">
  </head>

  <body>