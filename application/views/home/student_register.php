<base href="<?php echo base_url(); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<img src="public/img/logo.png">

<h3>Student register</h3>

<style>
  .text-red {
    color: red;
  }
</style>

<?php if (isset($error)): ?>
  <p class="text-red">
    <?php echo $error; ?>
  </p>
<?php endif; ?>

<?php echo form_open('student/register?key=' . $student->secret_key); ?>
<p>Student code<br>
  <?php echo form_input('code', $student->code, 'disabled'); ?>
  <?php echo form_error('code'); ?>
</p>
<p>Last name<br>
  <?php echo form_input('last_name', $student->last_name, 'disabled'); ?>
  <?php echo form_error('last_name'); ?>
</p>
<p>First name<br>
  <?php echo form_input('first_name', $student->first_name, 'disabled'); ?>
  <?php echo form_error('first_name'); ?>
</p>
<p>Middle name<br>
  <?php echo form_input('middle_name', $student->middle_name, 'disabled'); ?>
  <?php echo form_error('middle_name'); ?>
</p>
<p>Email<br>
  <?php echo form_input('email', $student->email, 'disabled'); ?>
  <?php echo form_error('email'); ?>
</p>
<p>New password<br>
  <?php echo form_password('password'); ?>
</p>
<p>Confirm password<br>
  <?php echo form_password('confirm_password'); ?>
</p>
<p>
  <?php echo form_submit('submit', 'Register'); ?>
</p>
<p>
  Already have an account? <?php echo anchor('student/login', 'Login'); ?>
</p>
<?php echo form_close(); ?>