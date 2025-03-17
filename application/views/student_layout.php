<base href="<?php echo base_url(); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<?php echo anchor('student/profile', '<img src="public/img/logo.png">'); ?>

<nav>
    <?php echo anchor('student/profile', 'Profile'); ?>
    <?php echo anchor('home/logout', 'Logout'); ?>
</nav>

<?php echo $content;
