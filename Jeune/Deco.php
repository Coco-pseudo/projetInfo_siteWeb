<?php
setcookie("mail","",1);
setcookie("mdp","",1);
unset($_COOKIE["mail"]);
unset($_COOKIE["mdp"]);
header("Location: ../Visiteur.php");
?>