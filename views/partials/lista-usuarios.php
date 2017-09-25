<?php if ($usuarios && $usuarios->num_rows > 0): ?>
  <table>
    <thead>
    <tr>
      <th>Nombre</th>
      <th>Correo Eletrónico</th>
      <th>Acciones</th>
    </tr>
    </thead>
    <?php while($usuario = $usuarios->fetch_assoc()): ?>
      <tr>
        <?php foreach($usuario as $field => $value): ?>
          <?php if ($field != 'idpersona'): ?>
            <td><?php print $value; ?></td>
          <?php endif; ?>
        <?php endforeach; ?>
        <td class="actions">
          <a title="Consultar" href="<?php print $self; ?>?q=view&id=<?php print $usuario['idpersona']; ?>">&#x1F50D;</a>
          <a title="Editar" href="<?php print $self; ?>?q=edit&id=<?php print $usuario['idpersona']; ?>">&#9998;</a>
          <a title="Eliminar" href="<?php print $self; ?>?q=delete&id=<?php print $usuario['idpersona']; ?>">&cross;</a>
        </td>
      </tr>
    <?php endwhile; ?>
  </table>
  <p><a class="button" href="<?php print $self; ?>?q=new">Agregar un usuario</a></p>
<?php else: ?>
  <p class="info">&#9888; No hay usuario en la Base de Datos todavía. <a href="<?php print $self; ?>?q=new">Agregar un usuario</a></p>
<?php endif; ?>
