<h3>Timesheets</h3>
<!-- <p><?php echo anchor('timesheets/add', 'Add Timesheets'); ?></p> -->
<table>
  <tr>
    <th>Student</th>
    <th>In/out</th>
    <th>Date</th>
    <th></th>
  </tr>
  <?php foreach ($timesheets as $timesheet): ?>
    <tr>
      <td><?php echo to_name($timesheet); ?></td>
      <td>
        <?php if (is_timesheet_in($timesheet)): ?>
          ✅
        <?php else: ?>
          ❌
        <?php endif; ?>
      </td>
      <td><?php echo $timesheet->date; ?></td>
      <td>
        <!-- <?php echo anchor('timesheets/edit/' . $timesheet->id, 'Edit'); ?> -->
        <a href='javascript:void(0);' onclick="deleteTimesheets('<?php echo $timesheet->id; ?>', <?php echo $timesheet->id; ?>);" title="Delete">Delete</a>
      </td>
    </tr>
  <?php endforeach; ?>
</table>

<script>
  var url = '<?php echo base_url(); ?>';

  function deleteTimesheets(name, id) {
    var c = confirm('Do you really want to delete ' + name + '?');
    if (c === true) {
      window.location = url + 'timesheets/delete/' + id;
    } else {
      return false;
    }
  }
</script>