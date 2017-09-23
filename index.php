<?php
require_once('./classes/Modelo.php');
include_once('./utils.php');

$self = $_SERVER["PHP_SELF"];

$message = "";
$form_values = false;
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

if ($mode && count($_GET['id']) > 0) {
  switch($mode) {
    case 'edit':
      $form_values = $modelo->read($_GET['id']);
      break;
    case 'delete':
      $message = $modelo->delete($_GET['id']);
      break;
  }
}


if (!empty($_POST['op'])) {
  $op = $_POST['op'];
  unset($_POST['op']);
  $data = $_POST;

  switch ($op){
    case 'new':
      $message = $modelo->create($data);
      break;
    case 'edit':
      $message = $modelo->update($data);
      break;
  }
}

$usuarios = $modelo->obtenerTodos();

include_once('./views/principal.php');