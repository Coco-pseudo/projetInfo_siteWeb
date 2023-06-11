<?php
$MailJeune = $_COOKIE["mail"];
$NumRef = $_COOKIE["numero"];
$message =
"<!DOCTYPE html>
<html>
    <head>
        <meta charset=utf-8>
        <title>Jeune 6.4</title>
        <link rel=icon type=image/png href=logo.png>
        <style>
        header {
            background: linear-gradient(to right,#ccc, rgb(155, 145, 145)); /* Dégradé de gris du foncé au clair pour le header */
            height: 150px;
            width: 100%;
            position: fixed;
            top: 0;
            left: 0;
            z-index: 1;
        }
        h1  {
            color: white;
            position: fixed;
            right: 90px;
            top: 60px;
            font-size: 300%;
        }
        body {
            top: 490px;
            height: auto;
            width:auto;
            margin: 250px auto 50px;
            padding: 0 20px;
        }
        h2 {
            text-align:center;
        }
        p {
            text-align:center;
        }
        h4 {
            text-align:center;
        }
        footer {
            text-align:center;
            background-color: #abbaba;
            color: #000;
            position: fixed;
            width: 100%;
            left: 0;
            margin-top: 50px;
            padding: 15px 
        }
        </style>
    </head>
    <body>
        <header>
            <image src=\"logo.png\" height=150 ></image>
            <h1>Pour faire de l'engagement une valeur</h1>
        </header>
        <h2>Une de vos références est maintenant validé :</h2>
        <main>
            <h4>Bonjour,</h4>
            <p>Ce mail vous a été envoyé afin de vous informer que votre référence numéro $NumRef du site Jeune 6.4 à été validé par son référent</p>
            <p>Vous pouvez désormais l'envoyer à un consultant à partir du site.</p> 
        </main>
        <footer>
            <h4>Jeunes 6.4</h4>
            <h4>Ce mail à été envoyé automatiquement par Jeune6.4</h4>
            <a href=\"../Visiteur.php\">Jeune 6.4</a>
        </footer>
    </body>
</html>";
//affichage du mail
echo $message;
//partie mail
//echo(mail("guedescore@cy-tech.fr","Référence validé",$message,"From: corentin.guedes@gmail.com"."\r\n".'Content-type: text/html'));

?>