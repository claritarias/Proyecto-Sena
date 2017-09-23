<table>
  <thead>
    <tr>
      <th colspan="2">Datos del usuario</th>
    </tr>
  </thead>
  <?php foreach($datos_usuario as $field => $value): ?>
    <tr>
      <td><?php print $fields[$field]; ?>:</td>
      <td><?php print $value; ?></td>
    </tr>
  <?php endforeach; ?>
</table>
