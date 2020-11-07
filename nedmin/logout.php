<?php
session_start();
unset($_SESSION['admins']);
header("Location:login.php");
setcookie("adminsLogin",json_encode($admins),strtotime("-30 day"),"/");
exit;
 ?>
