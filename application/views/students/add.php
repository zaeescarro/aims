<h3>Add student</h3>
<?php echo form_open_multipart('students/add'); ?>
<p>Image<br>
  <input type="file" name="student_image" />
  <?php echo form_error('student_image'); ?>
</p>
<p>Code<br>
  <?php echo form_input('code', $this->input->post('code')); ?>
  <?php echo form_error('code'); ?>
</p>
<p>Last name<br>
  <?php echo form_input('last_name', $this->input->post('last_name')); ?>
  <?php echo form_error('last_name'); ?>
</p>
<p>First name<br>
  <?php echo form_input('first_name', $this->input->post('first_name')); ?>
  <?php echo form_error('first_name'); ?>
</p>
<p>Middle name<br>
  <?php echo form_input('middle_name', $this->input->post('middle_name')); ?>
  <?php echo form_error('middle_name'); ?>
</p>
<p>Address<br>
  <?php echo form_input('address', $this->input->post('address')); ?>
  <?php echo form_error('address'); ?>
</p>
<p>Phone<br>
  <?php echo form_input('phone', $this->input->post('phone')); ?>
  <?php echo form_error('phone'); ?>
</p>
<p>Email<br>
  <?php echo form_input('email', $this->input->post('email')); ?>
  <?php echo form_error('email'); ?>
</p>
<p>Parent contact number<br>
  <?php echo form_input('parent_contact_number', $this->input->post('parent_contact_number')); ?>
  <?php echo form_error('parent_contact_number'); ?>
</p>
<p>
  <?php echo form_submit('submit', 'Save changes'); ?>
  or <?php echo anchor('students', 'cancel'); ?>
</p>
<?php echo form_close(); ?>