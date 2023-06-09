<?php
setcookie("mail");
setcookie("mdp");
setcookie('destination');
setcookie('verified');
unset($_COOKIE);
//var_dump($_COOKIE);exit();
header("Location: Visiteur.php");exit();
?>