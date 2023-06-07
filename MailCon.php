<?php
$MailJeune = "mail@jsp.fr"; //doit prendre la valeur du mail du jeune
$MailCon = "tmp";//doit prendre la valeur du mail du ref dans la demande de ref
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
            <p>ce mail automatique vous a été envoyé afin que vous puissiez consulter le profil d'un jeune sur le projet gouvernemental Jeunes 6.4</p>
        </header>
        <main>
            <p>Un consultant peut consulter le dossier d'un jeune, dossier contenant son profil et son expérience professionnelle mise en avant par des contacts du monde professionnel : des référents.</p> 
            <p>Vous avez été contacté suite à la demande de $NomJeune $PrenomJeune</p>
            <p>Cette proposition de consultation vous donne l'accès au dossier mettant en valeur les qualités du jeune, mettant en avant tout expérience du jeune</p>
            <a href=\"Test.php?q=$MailJeune+$NumRef\"> Lien pour accéder à la référence</a>
        </main>
        <footer>
            <h4>Jeunes 6.4</h4>
            <img src=\"logo.png\">
        </footer>
    </body>
</html>";
echo $message;
//mail("corentin.guedes@gmail.com","Test mail Projet",$message);

?>