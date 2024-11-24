<?php 



?>
<!--<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRR6CU1O218PL4tiOU4frIkNUPmi1mntavS5Q&usqp=CAU">

    <title>ACCESO AL SISTEMA -ASISTENCIA PARA EL ADULTO MAYOR </title>


	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">


    <link href="https://getbootstrap.com/docs/4.0/examples/sign-in/signin.css" rel="stylesheet">
  </head>

  <body class="text-center">
    <form class="form-signin" action="login.php" method="post">
      <img class="mb-4" src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRR6CU1O218PL4tiOU4frIkNUPmi1mntavS5Q&usqp=CAU" alt="" width="72" height="72">
      <h1 class="h3 mb-3 font-weight-normal">Inicie Seccion</h1>
      <label for="inputEmail" class="sr-only">Email address</label>
      <input type="email" id="inputEmail" class="form-control" name="email" placeholder="Email address" required autofocus>
      <label for="inputPassword" class="sr-only">Password</label>
      <input type="password" id="inputPassword" class="form-control" name="password" placeholder="Password" required>
      <div class="checkbox mb-3">
        <label>
          <input type="checkbox" value="remember-me"> Remember me
        </label>
      </div>
      <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
      <p class="mt-5 mb-3 text-muted">&copy; 2021-2022</p>
    </form>
  </body>
</html>-->
<?php 
session_start();
	if (isset($_SESSION['ID_SESSION'])) {
		# code...
		//$menus=$_SESSION['tipo_par'];
	}else{
		//echo $_SESSION['ID_SESSION']; die();
		//header("Location: index.php");
		//die();
	}
?>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="https://i.pinimg.com/originals/58/40/e2/5840e25157c52ee80139138d44d4f4a4.jpg">

    <title>Login - FPos Agenda v2.0.1</title>

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" >
	<link rel="stylesheet" href="dist/css/bootstrap.min.css" >
   
    <style type="text/css">
    	html,
		body {
		  height: 100%;
		}
		
		body {
		  display: -ms-flexbox;
		  display: -webkit-box;
		  display: flex;
		  -ms-flex-align: center;
		  -ms-flex-pack: center;
		  -webkit-box-align: center;
		  align-items: center;
		  -webkit-box-pack: center;
		  justify-content: center;
		  padding-top: 40px;
		  padding-bottom: 40px;
		  background-color: #f5f5f5;
		  background-image: url(dist/img/huella.png);
          background-repeat: space !important;
            background-size: cover;
            background-size: 20%;
		}
        body:before {
		  fill-opacity:0.4;
		}
		
		.form-signin {
            width: 100%;
            
            max-width: 430px;
            background-color: white;
            margin: 0 auto;
            
            padding-top: 65px;
            padding-bottom: 65px;
            padding-left: 65px;
            padding-right: 65px;
		}
        .form-signin:hover{
            box-shadow: 10px 10px 15px 10px gray;
        }
		.text-secondary {
	    text-shadow: -2px 0 white, 0 2px white, 2px 0 white, 0 -2px white;
	    }
		.form-signin .checkbox {
		  font-weight: 400;
		}
		.form-signin .form-control {
            position: relative;
            box-sizing: border-box;
            height: auto;
            padding: 10px;
            font-size: 16px;
            border: none;
            background: none;
		}
		.form-signin .form-control:focus {
            /*background: white;
            border: 1px solid grey;*/
            
		    z-index: 2;
		}
		.form-signin input[type="text"] {
		  margin-bottom: -1px;
          
          border-radius: 60px;
          border: 2px solid #8362dc;
		}
		.form-signin input[type="password"] {
		  margin-bottom: 10px;
		  border-bottom-color:#8362dc;
          border-radius: 60px;
          border: 2px solid #8362dc;
          
		}
    /**focus */
    .form-signin input[type="text"]:focus {
            border: 2px solid #8362dc;
            background: #fff;
            text-indent:50px;
            color:#8362dc;
            -webkit-transition: text-indent .35s ease-in-out;
            transition: text-indent .35s ease-in-out;
		}
		.form-signin input[type="password"]:focus {
            border: 2px solid #8362dc;
            background: #fff;
            text-indent:50px;
            color:#8362dc;
            -webkit-transition: text-indent .35s ease-in-out;
            transition: text-indent .35s ease-in-out;
		}

         /**hover */
         .form-signin input[type="text"]:hover {
            border: 4px solid #8362dc;
            background: #fff;
            color:#8362dc;
		}
		.form-signin input[type="password"]:hover {
            border: 4px solid #8362dc;
            background: #fff;
            color:#8362dc;
		}


        .btn-block {
            display: block;
            width: 100%;
            border-radius: 60px;
        }
        .btn-success {
            color: #fff;
            background-color: #8362dc;
            border-color: #fff;
        }
        .btn-success:hover {
            color: #fff;
            background-color: #492cb1;
            border-color: #dd7ba4;
        }
        /*.bg-primary {
            background-color: #a300ff78 !important;
        }*/
        .bg-primary {
          background-color: #706db1bf !important;
        }


    </style>
  </head>

  <body class="text-center">
    
    <form class="form-signin " action="home.php?v=" method="post">
      <img class="mb-4" src="https://i.pinimg.com/originals/58/40/e2/5840e25157c52ee80139138d44d4f4a4.jpg" alt="" width="100" height="150">
      <h1 class="h3 mb-3 font-weight-bold text-secondary">Fpos Agenda V 2.0</h1>
        <br><br>
        <?php 
    if (isset($_GET['login'])) {
      echo "<div class='alert alert-secondary' role='alert'>
      Session Suspedida!.
      <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
        <span aria-hidden='true'>&times;</span>
      </button>
      </div>";
    }
    if (isset($_GET['inval'])) {
      echo "<div class='alert alert-success' role='alert'>
      Invalid AccessPoint FPOS AGENDA.
      <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
        <span aria-hidden='true'>&times;</span>
      </button>
      </div>";
    }
    ?>
        <br>
      <label for="inputEmail" class="sr-only">ID</label>
      <input type="text" id="inputEmail" class="form-control" name="email" placeholder="ID Personal" required autofocus>
      <br>
      <label for="inputPassword" class="sr-only">Password</label>
      <input type="password" id="inputPassword" class="form-control" name="password" placeholder="Password" required>
	  <br>
      <button class="btn btn-lg btn-success btn-block" type="submit">Sign in</button>

    </form><br><br>
    <footer class="container-fluid bg-primary text-light  py-3 fixed-bottom fot-shadow">
        <div class="row">
            <div class="col-sm-12">
                <h6 class="text-center"> Forte Agenda - V2.0.1 | Copyright © 2022 All rights reserved.</h6>
            </div>
        </div>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous"></script>

    <script>
        $('.alert').alert()

    </script>
  </body>
</html>