<!doctype html>

<html lang="es">
<head>
  <meta charset="utf-8">

  <title>Evaluación de Instructores</title>
</head>

<body>
  <header>
    <h1><?php print $title; ?></h1>
  </header>
  <main>
    <?php
      switch($mode) {
        case 'new':
        case 'edit':
          include('./views/partials/formulario.php');
          break;
        default:
          include('./views/partials/lista-usuarios.php');
          break;
      }
    ?>
  </main>
  <footer></footer>
</body>
</html>
