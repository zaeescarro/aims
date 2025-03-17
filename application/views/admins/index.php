<h3>Admins</h3>
<p><?php echo anchor('admins/add', 'Add admin'); ?></p>
<table>
  <tr>
    <th>Username</th>
    <th>Email</th>
    <th></th>
  </tr>
  <?php foreach ($admins as $admin): ?>
    <tr>
      <td><?php echo $admin->username; ?></td>
      <td><?php echo $admin->email; ?></td>
      <td>
        <?php echo anchor('admins/edit/' . $admin->id, 'Edit'); ?>
        <a href='javascript:void(0);' onclick="deleteAdmins('<?php echo $admin->id; ?>', <?php echo $admin->id; ?>);" title="Delete">Delete</a>
      </td>
    </tr>
  <?php endforeach; ?>
</table>

<script>
  var url = '<?php echo base_url(); ?>';

  function deleteAdmins(name, id) {
    var c = confirm('Do you really want to delete ' + name + '?');
    if (c === true) {
      window.location = url + 'admins/delete/' + id;
    } else {
      return false;
    }
  }
</script>