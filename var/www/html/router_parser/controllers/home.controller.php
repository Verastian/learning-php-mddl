<?php
class HomeController
{
  function index()
  {
    $datos = [
      'USER' => 'Fabitodev',
      'FECHA' => date('Y-m-d')
    ];

    $contenido = TemplateParser::render('home.php', $datos, true);
    return $contenido;
  }
}
?>