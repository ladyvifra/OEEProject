<?php
require "../connectiondb.php";
$objConnection=Connect();

$sql="SELECT us_nickname,us_password,comp_name FROM user 
INNER JOIN company ON user.comp_nit= company.comp_nit
WHERE us_nickname= '$_REQUEST[userAdmin]'";

$resultado=$objConnection->query($sql);



$userAdmin=$resultado->fetch_object();






?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mostrar usuario y contraseña</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js" integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-kjU+l4N0Yf4ZOJErLsIcvOU2qSb74wXpOhqTvwVx3OElZRweTnQ6d31fXEoRD1Jy" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
    <link rel="stylesheet"href=../css/style.css>
</head>
<body>
<div id="app" class="app">
    <header>
        <h1 id="pageName">SMART OEE</h1>
    </header>

    <section class="info">

    <div id = "showinfo" class="card" style="width: 18rem;">
  <div class="card-body">
    <h5 class="card-title"><?php echo $userAdmin->comp_name?></h5>
    <h6 class="card-subtitle mb-2 text-muted">Estimado usuario, gracias por registrarse en nuestra plataforma.</h6>
    <h6 class="card-subtitle mb-2 text-muted">A continuación encontrará un usuario y contraseña de administrador con los cuales podrá acceder a nuestro sistema</h6>
    <p class="card-text">Usuario : <?php echo $userAdmin->us_nickname?> </p>
    
    <p class="card-text">Contraseña : <?php echo $userAdmin->us_password?> </p>
    
    <a href="login.php" class="card-link">Iniciar sesión</a>
    <a href="../index.php" class="card-link">Atrás</a>
  </div>
</div>

    <p> </p>
    <p> </p>
    <p> ></p>

  </section>




    <!-- Footer -->
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
    </div>
    <script src="js/index.js"></script> 
</body>
</html>