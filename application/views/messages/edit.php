<h3>Edit message</h3>
<?php echo form_open('messages/edit/' . $message->id); ?>
<p>To<br>
  <?php echo form_input('message_to', $message->message_to); ?>
  <?php echo form_error('message_to'); ?>
</p>
<p>Body<br>
  <?php echo form_textarea('body', $message->body); ?>
  <?php echo form_error('body'); ?>
</p>
<p>
  <?php echo form_submit('submit', 'Save changes'); ?>
  or <?php echo anchor('messages', 'cancel'); ?>
</p>
<?php echo form_close(); ?>