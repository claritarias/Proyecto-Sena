<form action="<?php echo $self; ?>" method="post">
  <table>
    <?php foreach ($fields as $field => $label):
      $type = 'text';

      if ($field == 'idpersona') {
        $type = 'hidden';
      }

      if ($field == 'fechaDeNacimiento') {
        $type = 'date';
      }

      $value = (count($form_values) > 0) ? $form_values[$field] : '';
    ?>
      <tr>
        <td>
          <label for="<?php print $field; ?>"><?php print $label; ?>: </label>
        </td>
        <td>
          <input name="<?php print $field; ?>" type="<?php print $type; ?>" value="<?php print $value; ?>">
        </td>
      </tr>
    <?php endforeach; ?>
    <input type="hidden" name="op" value="<?php print $_GET['q']; ?>">
    <tr>
      <td colspan="2">
        <input type="submit" value="Guardar">
      </td>
    </tr>
  </table>
</form>
<p><a href="<?php print $self; ?>?q=">&laquo; Volver</a></p>
