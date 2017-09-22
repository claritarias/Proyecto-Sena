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
    default:
      $title = 'Administración de Usuarios';
      break;
  }

  return $title;
}