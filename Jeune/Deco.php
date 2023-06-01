<?php
setcookie("mail",'',1,"/","../",false,true);
setcookie("mdp",'',1,"/","../",false,true);
setcookie('destination','',1,"/","../",false,true);
setcookie('verified','',1,"/","../",false,true);
unset($_COOKIE);
//var_dump($_COOKIE);exit();
header("Location: ../Visiteur.php");exit();
?>