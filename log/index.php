<?php
session_start();
if($_SESSION['name'] == ''){
    header("Location: loginform.php");
}
$name = $_SESSION['name'];
echo "<h1>Welcome to the home page  " . $name . "</h1>";
?>
<a href="logout.php">Logout</a>

