<?php
require_once('./classes/Modelo.php');
include_once('./utils.php');

$self = $_SERVER['self'];
$message = "";
$fields = array(
  'idpersona' => 'Id',
  'nombre' => 'Nombre',
  'docIdentificacion' => 'Número de Documento',
  'telefono' => 'Teléfono',
  'fechaDeNacimiento' => 'Fecha de Nacimiento',
  'correoElectronico' => 'Correo Electrónico'
);
$modelo = new Modelo(array_keys($fields));
$usuarios = $modelo->obtenerTodos();


if (!empty($_POST['submitted'])) {
  unset($_POST['submitted']);
  $data = $_POST;
  $message = $modelo->create($data);
}

$mode = (!empty($_GET['q'])) ? $_GET['q'] : '';
$title = page_title($mode);

include_once('./views/principal.php');