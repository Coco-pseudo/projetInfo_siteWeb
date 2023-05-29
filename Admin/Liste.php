<?php
//page d'affichage de la liste des jeunes présent sur le site
if($_COOKIE['verified'] == 2){
    setcookie('verified','',1);
}else{
    setcookie('destination','Admin/liste.php');
    header('Location: ../Connexion.php');
}
$CheminProfils = "../Jeune/Profil";
$Liste = scandir("$CheminProfils");
if($Liste == false){
    echo("Il n'y a pas de dossier Jeune sur le site");
}else{
    for($i = 0; $i<count($Liste); $i++){
        echo("$Liste[$i] <br>");
    }
}
?>