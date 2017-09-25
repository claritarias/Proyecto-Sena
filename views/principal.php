<!doctype html>

<html lang="es">
<head>
  <meta charset="utf-8">
  <link rel="stylesheet" href="./static/styles.css"/>

  <title>Evaluación de Instructores</title>
</head>

<body>
  <main>
	<?php include('./views/partials/header.php');?>
    <?php if ($mensaje): ?>
      <p class="success"><?php print $mensaje; ?></p>
    <?php endif; ?>
    <?php
      switch($mode) {
        case 'new':
        case 'edit':
          include('./views/partials/formulario.php');
          include('./views/partials/link-volver.php');
          break;
        case 'view':
          include('./views/partials/detalles-usuario.php');
          include('./views/partials/link-volver.php');
          break;
        default:
          include('./views/partials/lista-usuarios.php');
          break;
      }
    ?>
	<footer></footer>
  </main>
</body>
</html>
