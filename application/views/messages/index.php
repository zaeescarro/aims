<h3>Messages</h3>
<p><?php echo anchor('messages/add', 'Add messages'); ?></p>
<table>
  <tr>
    <th>To</th>
    <th>Body</th>
    <th></th>
  </tr>
  <?php foreach ($messages as $message): ?>
    <tr>
      <td><?php echo $message->message_to; ?></td>
      <td><?php echo $message->body; ?></td>
      <td>
        <?php echo anchor('messages/edit/' . $message->id, 'Edit'); ?>
        <a href='javascript:void(0);' onclick="deleteMessages('<?php echo $message->id; ?>', <?php echo $message->id; ?>);" title="Delete">Delete</a>
      </td>
    </tr>
  <?php endforeach; ?>
</table>

<script>
  var url = '<?php echo base_url(); ?>';

  function deleteMessages(name, id) {
    var c = confirm('Do you really want to delete ' + name + '?');
    if (c === true) {
      window.location = url + 'messages/delete/' + id;
    } else {
      return false;
    }
  }
</script>