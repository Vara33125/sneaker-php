<?php
include("init/_init.php");
unset($_SESSION['user']);

header('Location: index.php');
exit;
?>