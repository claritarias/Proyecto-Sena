<?php
require_once('./classes/Modelo.php');
include_once('./utils.php');

$self = $_SERVER["PHP_SELF"];

$mensaje = "";
$datos_usuario = false;
$fields = array(
  'idpersona' => 'Id',
  'docIdentificacion' => 'Número de Documento',
  'nombre' => 'Nombre',
  'telefono' => 'Teléfono',
  'fechaDeNacimiento' => 'Fecha de Nacimiento',
  'correoElectronico' => 'Correo Electrónico'
);

$mode = (!empty($_GET['q'])) ? $_GET['q'] : '';
$title = page_title($mode);

$modelo = new Modelo(array_keys($fields));

if ($mode && array_key_exists('id', $_GET) && count($_GET['id']) > 0) {
  $id = $_GET['id'];
  switch($mode) {
    case 'delete':
      $mensaje = $modelo->delete($id);
      break;
    case 'edit':
    case 'view':
      $datos_usuario = $modelo->read($id);
      break;
  }
}


if (!empty($_POST['op'])) {
  $op = $_POST['op'];
  unset($_POST['op']);
  $data = $_POST;

  switch ($op){
    case 'new':
      unset($data['idpersona']);
      $mensaje = $modelo->create($data);
      break;
    case 'edit':
      $mensaje = $modelo->update($data);
      break;
  }
}

$usuarios = $modelo->obtenerTodos();

include_once('./views/principal.php');