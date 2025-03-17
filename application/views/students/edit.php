<h3>Edit student</h3>
<?php echo form_open_multipart('students/edit/' . $student->id); ?>
<p>Image<br>
  <?php if ($student->image_url): ?>
    <img src="uploads/<?php echo $student->image_url; ?>" height="128"> <br> <br>
  <?php endif; ?>
  <input type="file" name="student_image" />
  <?php echo form_error('student_image'); ?>
</p>
<p>Code<br>
  <?php echo form_input('code', $student->code); ?>
  <?php echo form_error('code'); ?>
</p>
<p>Last name<br>
  <?php echo form_input('last_name', $student->last_name); ?>
  <?php echo form_error('last_name'); ?>
</p>
<p>First name<br>
  <?php echo form_input('first_name', $student->first_name); ?>
  <?php echo form_error('first_name'); ?>
</p>
<p>Middle name<br>
  <?php echo form_input('middle_name', $student->middle_name); ?>
  <?php echo form_error('middle_name'); ?>
</p>
<p>Address<br>
  <?php echo form_input('address', $student->address); ?>
  <?php echo form_error('address'); ?>
</p>
<p>Phone<br>
  <?php echo form_input('phone', $student->phone); ?>
  <?php echo form_error('phone'); ?>
</p>
<p>Email<br>
  <?php echo form_input('email', $student->email); ?>
  <?php echo form_error('email'); ?>
</p>
<p>Parent contact number<br>
  <?php echo form_input('parent_contact_number', $student->parent_contact_number); ?>
  <?php echo form_error('parent_contact_number'); ?>
</p>
<p>Secret key<br>
  <?php echo form_input('secret_key', $student->secret_key, 'disabled'); ?>
  <?php echo form_error('secret_key'); ?>
  <?php echo anchor('students/reset_secret_key/' . $student->id, 'Reset secret key'); ?>
</p>
<p>
  <?php echo form_submit('submit', 'Save changes'); ?>
  or <?php echo anchor('students', 'cancel'); ?>
</p>
<?php echo form_close(); ?>