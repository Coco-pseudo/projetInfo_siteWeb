<?php
//suppression de tout les cookies de connexion et redirection vers la page d'acceuil
setcookie("mail");
setcookie("mdp");
setcookie('destination');
setcookie('verified');
unset($_COOKIE);
header("Location: Visiteur.php");exit();
?>