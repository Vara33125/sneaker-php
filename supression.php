<?php
include("init/_init.php");
unset($_SESSION['panier']);

header('Location: panier.php?id=0');
exit;
?>