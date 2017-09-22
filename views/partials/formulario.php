<form action="<?php echo $self; ?>" method="post">
  <table>
    <?php foreach ($fields as $field => $label):
      $disabled = ($field == 'idpersona') ? 'disabled' : '';
      ?>
      <tr>
        <td>
          <label for="<?php print $field; ?>"><?php print $label; ?>: </label>
        </td>
        <td>
          <input name="<?php print $field; ?>" type="text" <?php print $disabled; ?>>
        </td>
      </tr>
    <?php endforeach; ?>
    <input type="hidden" name="submitted" value="true">
    <tr>
      <td colspan="2">
        <input type="submit" value="Guardar">
      </td>
    </tr>
  </table>
</form>
<p><a href="<?php print $self; ?>?q=">&laquo; Volver</a></p>
