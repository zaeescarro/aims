<base href="<?php echo base_url(); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<img src="public/img/logo.png">

<h3>Student login</h3>

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

<?php echo form_open('student/login'); ?>
<p>Student code<br>
  <?php echo form_input('code', $this->input->post('code')); ?>
  <?php echo form_error('code'); ?>
</p>
<p>Password<br>
  <?php echo form_password('password'); ?>
</p>
<p>
  <?php echo form_submit('submit', 'Login'); ?>
</p>
<?php echo form_close(); ?>