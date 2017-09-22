<!doctype html>

<html lang="es">
<head>
  <meta charset="utf-8">
  <link rel="stylesheet" href="./static/styles.css"/>

  <title>Evaluación de Instructores</title>
</head>

<body>
  <header>
    <h1><?php print $title; ?></h1>
  </header>
  <main>
    <?php if ($message): ?>
      <p class="info"><?php print $message; ?></p>
    <?php endif; ?>
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
