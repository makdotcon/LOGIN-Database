
<?php
if (isset($_SESSION['islogin']) && $_SESSION['islogin']==true) {
    die("You cannot access this page");
}

?>

<?php include("header.php") ?>

<?php session_start(); ?>

<div class="alert alert-success">

Welcome <?=$_SESSION['email']?>
</div>

<a href="logout.php">
<button class="btn btn-danger">LOGOUT
</button>
</a>

<?php include("footer.php") ?>