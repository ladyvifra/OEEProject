<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LOGIN</title>
    <link rel="stylesheet"href="assets/css/style.css">
</head>
<body>
<?php require "partials/header.php"?>
    <section class="form-login">
        <h2>INICIO DE SESIÓN</h2>
        <form action="login.php" method="$_POST">
        <input class="controls" type="text" name="Usuario" value=""placeholder="Ingrese su usuario">
        <input class="controls"type="password" name="Password" value=""placeholder="Ingrese su contraseña">
        <input class="buttons"type="submit" name="" value="Ingresar">
        <p><a href="#">¿Olvidaste tu contraseña?</a></p>
        <p><a href="signup.php">Registra tu empresa</a></p>
        </form>
    </section>
    
</body>
</html>