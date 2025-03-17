<base href="<?php echo base_url(); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<?php echo anchor('students', '<img src="public/img/logo.png">'); ?>

<nav>
    <?php echo anchor('admins', 'Admins'); ?>
    <?php echo anchor('students', 'Students'); ?>
    <?php echo anchor('messages', 'Messages'); ?>
    <?php echo anchor('timesheets', 'Timesheets'); ?>
    <?php echo anchor('home/logout', 'Logout'); ?>
</nav>

<?php echo $content;
