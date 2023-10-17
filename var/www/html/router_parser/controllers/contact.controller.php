<?php

class ContactController
{
  public function index()
  {
    return TemplateParser::render("contacto.php", []);
  }

  public function enviar()
  {
    //var_dump($_POST);
    $una_respuesta = 'ok';
    //    $una_respuesta = 'error';
    header("Location: /contact/gracias?rta=$una_respuesta");
  }

  public function gracias()
  {
    $resultado = $_GET['rta'] ?? 'error';
    if ($resultado == 'ok') {
      echo "Su mensaje ha sido enviado";
    } else {
      echo "Su mensaje no pudo ser procesado";
    }
  }
}