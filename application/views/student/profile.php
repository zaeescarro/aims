<h3>My profile</h3>

<p>
  <?php
  $qrcodeUrl = "https://api.qrserver.com/v1/create-qr-code/?size=300x300&data=" . urlencode($student->secret_key);

  echo "<img src='{$qrcodeUrl}' alt='QR Code'>";
  ?>
</p>
<p>Picture<br>
  <?php if ($student->image_url): ?>
    <img src="uploads/<?php echo $student->image_url; ?>" height="128"> <br> <br>
  <?php endif; ?>
</p>
<p><b>Code</b>: <?php echo $student->code; ?>
</p>
<p><b>Last name</b>: <?php echo $student->last_name; ?>
</p>
<p><b>First name</b>: <?php echo $student->first_name; ?>
</p>
<p><b>Middle name</b>: <?php echo $student->middle_name; ?>
</p>
<p><b>Address</b>: <?php echo $student->address; ?>
</p>
<p><b>Phone</b>: <?php echo $student->phone; ?>
</p>
<p><b>Email</b>: <?php echo $student->email; ?>
</p>
<p><b>Parent contact number</b>: <?php echo $student->parent_contact_number; ?>
</p>