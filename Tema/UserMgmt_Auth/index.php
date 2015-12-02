<?php
require_once ('classes/Usuario.php');
require_once ('classes/Auth.php');
// Activo el mecanismo de sesión
session_start();

$auth = new Auth();
// Si el usuario ya está validado
if ($auth->check()) {
    // Si es una petición de cierre de sesión
    if (isset($_POST['logout'])) {
        // destruyo la sesión
        $auth->logout();
        // Redirijo al cliente a la vista del formulario de login
        $view = 'login';
        include '/vistas/login.php';
    } //En otro caso 
    else {
        // Redirijo al cliente a la vista de contenido
        $view = 'content';
        $usuario = $auth->usuario();
        include '/vistas/content.php';
    }

// Si se está solicitando el formulario de login
} else if (empty($_POST)) {
    // Redirijo al cliente a la vista del formulario de login
    $view = 'login';
    include '/vistas/login.php';

    // Si se está enviando el formulario de login con los datos
} else if (isset($_POST['login'])) {
    // Si los credenciales son correctos
    $usuario = Usuario::getByCredencial($_POST['usuario'], $_POST['clave']);
    if ($usuario) {
        $auth->login($usuario);
        // Redirijo al cliente a la vista de contenido
        $view = 'content';
        include '/vistas/content.php';
    }

    // Si los credenciales son incorrectos
    else {
        // Establezco un mensaje de error para la 
        $errormsg = 'Nombre de usuario o contraseña invalidos';
        // Redirijo al cliente a la vista del formulario de login
        $view = 'login';
        include '/vistas/login.php';
    }
// En cualquier otro caso
} else {
    // Redirijo al cliente a la vista del formulario de login
    $view = 'login';
    include '/vistas/login.php';
}
?>
 