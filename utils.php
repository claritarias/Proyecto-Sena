<?php
function page_title($mode) {
  $title = '';

  switch($mode) {
    case 'edit':
      $title = 'Edición de Usuario';
      break;
    case 'new':
      $title = "Agregar Usuario";
      break;
    case 'view':
      $title = "Información de Usuario";
      break;
    default:
      $title = 'Administración de Usuarios';
      break;
  }

  return $title;
}

function debug($obj) {
  print "<pre>";
  print_r($obj);
  print "</pre>";
}