<?php
$MailJeune = "mail@jsp.fr"; //doit prendre la valeur du mail du jeune
$MailRef = "tmp";//doit prendre la valeur du mail du ref dans la demande de ref
$NumRef = "1"; //devra prendre la valeur de i de la page demande de ref
$Data = "Jeune/Profil/$MailJeune";
$NomJeune = "De Nazaret";
$PrenomJeune = "Jesus";
$message ="<!DOCTYPE html>
<html>
    <head></head>
    <body>
        <header>
            <h5>Bonjour</h5>
            <p>ce mail automatique vous a été envoyé afin que vous deveniez \nréférent pour un jeune sur le projet gouvernemental Jeunes 6.4</p>
        </header>
        <main>
            <p>Un référent viens apporter de la crédibilité au jeune, sur la \nvaleur de son dossier. Vous avez été contacté suite à la demande de \n$NomJeune $PrenomJeune</p>
            <p>Cette demande de référence vise a certifier les qualités du \njeune, de par votre propre expérience avec le jeune</p>
            <a href=\"Test.php?q=$MailJeune+$NumRef\"> Lien pour accéder à la référence</a>
        </main>
        <footer>
            <h4>Jeunes 6.4</h4>
            <img src=\"logo.png\">
        </footer>
    </body>
</html>";
//echo $message;
$test = mail("guedescore@cy-tech.fr","Test mail Projet",$message,"From: corentin.guedes@gmail.com"."\r\n".'Content-type: text/html');
if($test){
    echo("mail envoyé");
}else {
    echo("erreur dans l'envoi");
}

?>