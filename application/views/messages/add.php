<h3>Add message</h3>
<?php echo form_open('messages/add'); ?>
<p>To<br>
  <?php echo form_input('message_to', $this->input->post('message_to')); ?>
  <?php echo form_error('message_to'); ?>
</p>
<p>Body<br>
  <?php echo form_input('body', $this->input->post('body')); ?>
  <?php echo form_error('body'); ?>
</p>
<p>
  <?php echo form_submit('submit', 'Save changes'); ?>
  or <?php echo anchor('messages', 'cancel'); ?>
</p>
<?php echo form_close(); ?>