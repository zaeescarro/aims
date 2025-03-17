<h3>Add admin</h3>
<?php echo form_open('admins/add'); ?>
<p>Username<br>
  <?php echo form_input('username', $this->input->post('username')); ?>
  <?php echo form_error('username'); ?>
</p>
<p>Password<br>
  <?php echo form_password('password', ''); ?>
  <?php echo form_error('password'); ?>
</p>
<p>Confirm password<br>
  <?php echo form_password('confirm_password', ''); ?>
  <?php echo form_error('confirm_password'); ?>
</p>
<p>Email<br>
  <?php echo form_input('email', $this->input->post('email')); ?>
  <?php echo form_error('email'); ?>
</p>
<p>
  <?php echo form_submit('submit', 'Save changes'); ?>
  or <?php echo anchor('admins', 'cancel'); ?>
</p>
<?php echo form_close(); ?>