<div class="topnav" id="topnav">
<a href="database.php">Database</a>
<?php if (isset($_SESSION['usr_id'])) { ?>
<p class="navbar-text pull-right">Signed in as <?php echo $_SESSION['usr_name']; ?></p>
<a class="btn btn-danger pull-right"href="logout.php">Log Out</a>
<?php }?>
<?php if ($_SESSION['type']=="Admin") { ?>
<a class="btn btn-success pull-right"href="admin.php">Users</a>
<?php }?>
</div> 