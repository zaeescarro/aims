<base href="<?php echo base_url(); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<style>
  /* Make the input invisible but still functional */
  #code {
    position: absolute;
    left: -9999px;
    opacity: 0;
  }
</style>

<?php echo anchor('.', '<img src="public/img/logo.png">'); ?>

<h3>Welcome to AIMS (Automated Identification and Messaging System)</h3>
<p>Today is <span id="currentDay"></span></p>
<script>
  function updateDay() {
    const options = {
      weekday: 'long',
      year: 'numeric',
      month: 'long',
      day: 'numeric',
      hour: 'numeric',
      minute: 'numeric',
      second: 'numeric'
    };
    const today = new Date().toLocaleDateString(undefined, options);
    document.getElementById('currentDay').textContent = today;
  }
  updateDay();
  setInterval(updateDay, 1000); // Update every second
</script>
<p>We are glad to have you here. Please use the QR code scanner to scan your code and log your timesheet.</p>

<?php echo form_open('home/dtr', array('id' => 'qrForm')); ?>
<p>
  <?php echo form_input('code', '', 'id="code"'); ?>
</p>
<?php echo form_close(); ?>

<button type="button" onclick="" id="scanButton">
  📷 Scan QR Code
</button>
<video id="qr-video" style="display:none; width: 100%;" autoplay></video>
<canvas id="qr-canvas" style="display:none;"></canvas>
<script src="https://cdn.jsdelivr.net/npm/jsqr@1.4.0/dist/jsQR.js"></script>
<script>
  document.getElementById("scanButton").addEventListener("click", async function() {
    const video = document.getElementById("qr-video");
    const canvas = document.getElementById("qr-canvas");
    const ctx = canvas.getContext("2d");

    // Request camera access
    const stream = await navigator.mediaDevices.getUserMedia({
      video: {
        facingMode: "environment"
      }
    });
    video.srcObject = stream;
    video.style.display = "block";

    const scanQR = () => {
      if (video.readyState === video.HAVE_ENOUGH_DATA) {
        canvas.width = video.videoWidth;
        canvas.height = video.videoHeight;
        ctx.drawImage(video, 0, 0, canvas.width, canvas.height);
        const imageData = ctx.getImageData(0, 0, canvas.width, canvas.height);
        const code = jsQR(imageData.data, imageData.width, imageData.height);
        if (code) {
          document.getElementById("code").value = code.data; // Set the scanned code
          stream.getTracks().forEach(track => track.stop()); // Stop camera
          video.style.display = "none"; // Hide video
          document.getElementById("qrForm").submit(); // Auto-submit form
        }
      }
      requestAnimationFrame(scanQR);
    };

    scanQR();
  });
</script>

<table>
  <tr>
    <th></th>
    <th></th>
    <th>Timesheets today!</th>
  </tr>
  <?php foreach ($recent_timesheets as $timesheet): ?>
    <tr>
      <td>
        <?php if (is_timesheet_in($timesheet)): ?>
          ✅
        <?php else: ?>
          ❌
        <?php endif; ?>
      </td>
      <td>
        <?php if ($timesheet->student_image_url): ?>
          <img src="uploads/<?php echo $timesheet->student_image_url; ?>" width="32">
        <?php endif; ?>
      </td>
      <td>
        <?php echo timesheet_to_log($timesheet); ?>
      </td>
    </tr>
  <?php endforeach; ?>
</table>

<script>
  // Focus on the input field when the page loads
  document.getElementById('code').focus();


  const code = document.getElementById('code');

  code.addEventListener('blur', function() {
    document.getElementById('code').focus();
  });
</script>