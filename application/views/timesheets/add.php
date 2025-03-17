<h3>Add timesheet</h3>
<?php echo form_open('timesheets/add'); ?>
<p>Id<br>
  <?php echo form_input('id', $this->input->post('id')); ?>
  <?php echo form_error('id'); ?>
</p>
<p>Student_id<br>
  <?php echo form_input('student_id', $this->input->post('student_id')); ?>
  <?php echo form_error('student_id'); ?>
</p>
<p>Inout<br>
  <?php echo form_input('inout', $this->input->post('inout')); ?>
  <?php echo form_error('inout'); ?>
</p>
<p>Date<br>
  <?php echo form_input('date', $this->input->post('date')); ?>
  <?php echo form_error('date'); ?>
</p>
<p>
  <?php echo form_submit('submit', 'Save changes'); ?>
  or <?php echo anchor('timesheets', 'cancel'); ?>
</p>
<?php echo form_close(); ?>