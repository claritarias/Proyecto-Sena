<?php if ($usuarios): ?>
  <table border="1">
    <thead>
    <tr>
      <?php foreach ($fields as $field): ?>
        <th><?php print $field; ?></th>
      <?php endforeach; ?>
      <th>Acciones</th>
    </tr>
    </thead>
    <?php while($usuario = $usuarios->fetch_assoc()): ?>
      <tr>
        <?php foreach($usuario as $value): ?>
          <td><?php print $value; ?></td>
        <?php endforeach; ?>
        <td>
          <a href="<?php print $self; ?>?q=edit&id=<?php print $usuario['idpersona']; ?>">Editar</a>
          <a href="<?php print $self; ?>?q=delete&id=<?php print $usuario['idpersona']; ?>">Eliminar</a>
        </td>
      </tr>
    <?php endwhile; ?>
  </table>
<?php endif; ?>
