<?php
class UserController
{
  public function index()
  {
    $users = [
      'ivantheragingpython',
      'fabriiferroni',
      'lexgimipiki',
      'manzdev'
    ];
    $html = implode("", array_map(function ($u) {
      return "<li>$u</li>";
    }, $users));

    $datos = [
      'USER' => 'Fabitodev',
      'USERLIST' => $html
    ];

    $contenido = TemplateParser::render('usuarios.php', $datos, true);
    return $contenido;
  }
}