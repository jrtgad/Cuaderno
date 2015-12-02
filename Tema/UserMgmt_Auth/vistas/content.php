<?php
if ($view !== 'content') {
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
            .inline {
                display: inline;

            }
            .botonlogout {
                margin-left: 250px;
                background: orange;
            }

        </style>
    </head>
    <body>
        <header>
            <h1 class="inline">
                Bienvenido/a a la aplicación <?php echo $usuario->getNombre();?>
            </h1>
            <form class="inline" action="/" method="POST">
                <input class="botonlogout" type="submit" name="logout" value="Logout">
            </form>

        </header>
        <div>
            <h2>
                Esta es una página de contenido
            </h2>
            <p> Mostramos imágenes  textos</p>
            <img src="../img/welcome.jpg"

        </div>

    </body>
</html>
