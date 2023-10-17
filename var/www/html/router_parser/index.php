<?php
require 'libs/template.parser.lib.php';
require 'libs/router.control.lib.php';

$rv = new RouteView();
$seccion = $_GET['pagina'] ?? 'home';
$accion = $_GET['accion'] ?? 'index';

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Template Parser</title>
</head>

<body>
    <header>
        <h1>LOGO</h1>
        <nav>
            <ul>
                <li><a href='/router_parser/home'>Home</a></li>
                <li><a href='/router_parser/users'>Usuarios</a></li>
                <li><a href='/router_parser/contact'>Contacto</a></li>
            </ul>
        </nav>
    </header>
    <?php
  echo $rv->render($seccion, $accion);
  ?>
</body>

</html>