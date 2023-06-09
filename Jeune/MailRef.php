<?php
if($_COOKIE['verified'] == 1){
    setcookie('verified','',1);
}else{
    setcookie('destination','Jeune/MailRef.php',time()+3600);
    header('Location: ../Connexion.php');
}
session_start();
unset($_SESSION["dataR"]);
unset($_SESSION["dataC"]);
//
// VARIABLES
//
//si mail fonctionnel
//$NumRef = $_POST['a'];
//sinon
$NumRef = $_COOKIE['numero'];
//

$MailJeune = $_COOKIE['mail']; //doit prendre la valeur du mail du jeune
$Data = "Profil/$MailJeune/Reference.json";
$ref = json_decode(file_get_contents($Data),true); //contient le tableau de refs du jeune
$MailRef = $ref['Reference'][$NumRef]["EmailRef"];//doit prendre la valeur du mail du ref dans la demande de ref
$Data = "Profil/$MailJeune/Profil.json";
$pro = json_decode(file_get_contents($Data),true);// contient le tableau du profil du jeune
$NomJeune = $pro["Profil"][0]["Nom"];
$PrenomJeune = $pro["Profil"][0]["Prenom"];


$message =
"<!DOCTYPE html>
<html>
    <head>
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
        <h2>Une demande de référence pour vous :</h2>
        <main>
            <h4>Bonjour,</h4>
            <p>Ce mail vous a été envoyé afin que vous deveniez référent pour un jeune sur le projet gouvernemental Jeunes 6.4</p>
            <p>Un référent viens apporter de la crédibilité au jeune, sur la valeur de son dossier. Vous avez été contacté suite à la demande de $NomJeune $PrenomJeune</p>
            <p>Cette demande de référence vise a certifier les qualités du jeune, de par votre propre expérience avec le jeune :</p>
            <p><a href=\"../Referent.php?q=$MailJeune+$NumRef\"> Lien pour accéder à la référence</a></p>
        </main>
        <footer>
            <h4>Jeunes 6.4</h4>
            <h4>Ce mail à été envoyé automatiquement par Jeune6.4</h4>
            <a href=\"Visiteur.php\">Jeune 6.4</a>
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