<?php
include("includes/header.php");
?>

<?php
echo 'Hello, ' . htmlspecialchars($_COOKIE["UsernameCookie"]) . '!';
?>

<?php include("includes/footer.php");
?>
