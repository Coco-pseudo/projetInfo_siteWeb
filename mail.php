<?php
$Mail = "tmp";
$Data = "Jeune/Profil/$Mail";
$message ="<!DOCTYPE html>
<html>
    <head></head>
    <body>
        <header>
            <h5>Bonjour</h5>
            <p>ce mail automatique vous a été envoyé afin que vous deveniez référent pour un jeune sur le projet gouvernemental Jeunes 6.4</p>
        </header>
        <main>
            <p>Un référent viens apporter de la crédibilité au jeune, sur la valeur de son dossier. Vous avez été contacté suite à la demande de \$NomJeune \$PrenomJeune</p>
            <p>Cette demande de référence vise a certifier les qualités du jeune, de par votre propre expérience avec le jeune</p>
            <a href=\"test.php?q=\$MailJeune\"> Lien pour accéder à la référence</a>
        </main>
        <footer>
            <h4>Jeunes 6.4</h4>
            <img src=\"logo.png\">
        </footer>
    </body>
</html>";
mail("corentin.guedes@gmail.com","Test mail Projet",$message);

?>