<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LOGIN</title>
    <link rel="stylesheet"href=../css/styleCopy.css>
    



    <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

   
</head>
<body>
<header>
  <h1 id="pageName">SMART OEE</h1>
</header>

<div class="main-component mt-5">
<section class="form-login">
    <h2>INICIO DE SESIÓN</h2>
    <form id ="form1" name="form1" action="validateLogin.php" method="$_POST">-->
    <input id="user" class="controls" type="text" name="user" value=""placeholder="Ingrese su usuario" required/>
    <input id= "password" class="controls"type="password" name="password" value=""placeholder="Ingrese su contraseña"required/>
    <input class="buttons"type="submit" name="submit" value="Ingresar"> 
    <p><a href="#">¿Olvidaste tu contraseña?</a></p>
    <p><a href="../company/companySignup.php">Registra tu empresa</a></p>
    </form>

    <?php
       $x=isset($_REQUEST['x']);
      if($x==1){  
        echo"<br> <p align='center'> Usuario no registrado con los datos ingresados, vuelva a intentarlo";
      }else if($x==2){
         echo"<br> <p align='center'> Señor usuario, debe iniciar sesión para ingresar al sistema";
      }else if($x==3){
        echo"<br> <p align='center'> El usuario ha cerrado la sesión";
       }else{
         echo '';
       }

    ?>
</section>
 </div>

    <footer class="text-center ">
        <!-- Copyright -->
        <div
          class="text-center p-4" id="text-footer"
        >
          © 2021 Copyright: Simplex <br>
          Centro de servicios financieros SENA 2022 
        </div>
        <!-- Copyright -->
      </footer>
   

      
</body>
</html>