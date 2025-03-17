<base href="<?php echo base_url(); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<img src="public/img/logo.png">

<h3>Admin login</h3>

<style>
  .text-red {
    color: red;
  }
</style>

<?php if ($error): ?>
  <p class="text-red">
    <?php echo $error; ?>
  </p>
<?php endif; ?>

<?php echo form_open('home/admin_login'); ?>
<p>Username<br>
  <?php echo form_input('username', $this->input->post('username')); ?>
  <?php echo form_error('username'); ?>
</p>
<p>Password<br>
  <?php echo form_password('password'); ?>
</p>
<p>
  <?php echo form_submit('submit', 'Login'); ?>
</p>
<?php echo form_close(); ?>