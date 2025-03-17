<h3>Edit timesheet</h3>
<?php echo form_open('timesheets/edit/' . $timesheet->id); ?>
<p>Id<br>
  <?php echo form_input('id', $timesheet->id); ?>
  <?php echo form_error('id'); ?>
</p>
<p>Student_id<br>
  <?php echo form_input('student_id', $timesheet->student_id); ?>
  <?php echo form_error('student_id'); ?>
</p>
<p>Inout<br>
  <?php echo form_input('inout', $timesheet->inout); ?>
  <?php echo form_error('inout'); ?>
</p>
<p>Date<br>
  <?php echo form_input('date', $timesheet->date); ?>
  <?php echo form_error('date'); ?>
</p>
<p>
  <?php echo form_submit('submit', 'Save changes'); ?>
  or <?php echo anchor('timesheets', 'cancel'); ?>
</p>
<?php echo form_close(); ?>