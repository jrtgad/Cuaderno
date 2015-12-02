<?php
if ($view !== 'login') {
    header('Location: /');
} else {
    $view = '';
}
?>
<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <style>
            header {
                color: brown;
                text-align: center;
            }
            form {
                width: 600px;                       
                font-size: 20px;
                padding: 50px;
                border: 5px solid orange;
                margin: auto;
            }
            .form-section {
                margin: 25px;
            }
            .botonlogin {
                background: orange;
                float: right;
            }

        </style>
    </head>
    <body>
        <header>
            <h1>
                Bienvenido/a a la aplicación
            </h1>
        </header>
        <form action="/" method="POST">       
          <p style='color: red;'><?php if (isset ($errormsg)) echo $errormsg; ?></p>
            <div class="form-section">
                <label for="nombre"> Nombre: </Label> 
                <input id="nombre" type="text"  required = "required" name="usuario" size="20" /> 
            </div>
            <div class="form-section">
                <label for="contrasenia"> Contraseña: </Label> 
                <input id="contrasenia" type="password"  required = "required" name="clave" size="20"/> 
            </div>
            <input class="botonlogin" type="submit" 
                   value="Login" name="login" /> 
        </form

    </body>
</html>
