<style>
  .text-green {
    color: green;
  }
</style>

<h3>Students</h3>

<?php if (isset($info)): ?>
  <p class="text-green">
    <?php echo $info; ?>
  </p>
<?php endif; ?>

<p><?php echo anchor('students/add', 'Add student'); ?></p>
<table>
  <tr>
    <th></th>
    <th>Code</th>
    <th>Name</th>
    <th>Address</th>
    <th>Phone</th>
    <th>Parent contact number</th>
    <th></th>
  </tr>
  <?php foreach ($students as $student): ?>
    <tr>
      <td>
        <?php if ($student->image_url): ?>
          <img src="uploads/<?php echo $student->image_url; ?>" width="64">
        <?php endif; ?>
      </td>
      <td><?php echo $student->code; ?></td>
      <td>
        <?php echo to_name($student); ?>
        <br>
        <?php echo $student->email; ?>
      </td>
      <td><?php echo $student->address; ?></td>
      <td><?php echo $student->phone; ?></td>
      <td><?php echo $student->parent_contact_number; ?></td>
      <td nowrap>
        <?php echo anchor('students/invite/' . $student->id, 'Invite'); ?>
        <?php echo anchor('students/edit/' . $student->id, 'Edit'); ?>
        <a href='javascript:void(0);' onclick="deleteStudents('<?php echo $student->id; ?>', <?php echo $student->id; ?>);" title="Delete">Delete</a>
      </td>
    </tr>
  <?php endforeach; ?>
</table>

<script>
  var url = '<?php echo base_url(); ?>';

  function deleteStudents(name, id) {
    var c = confirm('Do you really want to delete ' + name + '?');
    if (c === true) {
      window.location = url + 'students/delete/' + id;
    } else {
      return false;
    }
  }
</script>