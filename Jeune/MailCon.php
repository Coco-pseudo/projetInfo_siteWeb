<?php
if($_COOKIE['verified'] == 1){
    setcookie('verified','',1);
}else{
    setcookie('destination','Jeune/MailCon.php',time()+3600);
    header('Location: ../Connexion.php');
}
session_start();
unset($_SESSION["dataR"]);
unset($_SESSION["dataC"]);
//
// VARIABLES
//
$MailJeune = $_COOKIE['mail']; //doit prendre la valeur du mail du jeune
$MailCon = "?";//doit être donné par le jeune
$Data = "Profil/$MailJeune/Reference.json";
$ref = json_decode(file_get_contents($Data),true); //contient le tableau de refs du jeune
$Data = "Profil/$MailJeune/Profil.json";
$pro = json_decode(file_get_contents($Data),true);// contient le tableau du profil du jeune
$NomJeune = $pro["Profil"][0]["Nom"];
$PrenomJeune = $pro["Profil"][0]["Prenom"];
//création du tableau des références validés, pour ensuite aller chercher celles selectionnés
$tabref = [];
for($i = 0; $i<count($ref['Reference']); $i){
    if($ref['Reference'][$i]["verif"] == 2){ //ref validé
        $i++; //le numéro de la ref est 1 de plus que sa case dans le tableau
        if(isset($_POST["ref$i"])){
            if($NumRef ==""){
                $NumRef = $NumRef.$_POST["ref$i"];
            }else{
                $NumRef = $NumRef."+".$_POST["ref$i"];
            }
        }
    }else{
        $i++;
    }
}
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
        <h2>Une proposition de consultation pour vous :</h2>
        <main>
            <h4>Bonjour,</h4>
            <p>Ce mail automatique vous a été envoyé afin que vous puissiez consulter le profil d'un jeune sur le projet gouvernemental Jeunes 6.4</p>
            <p>Un consultant peut consulter le dossier d'un jeune, dossier contenant son profil et son expérience professionnelle mise en avant par ses contacts du monde professionnel : des référents.</p> 
            <p>Vous avez été contacté suite à la demande de $NomJeune $PrenomJeune</p>
            <p>Cette proposition de consultation vous donne l'accès au dossier mettant en valeur les qualités du jeune et les expériences du jeune</p>
            <p><a href=\"../Consultant.php?q=$MailJeune+$NumRef\"> Lien pour accéder à la référence</a></p>
        </main>
        <footer>
            <h4>Jeunes 6.4</h4>
            <h4>Ce mail à été envoyé automatiquement par Jeune6.4</h4>
            <a href=\"../Visiteur.php\">Jeune 6.4</a>
        </footer>
    </body>
</html>";
"<!DOCTYPE html>
<html>
    <head></head>
    <body>
        <header>
            <h5>Bonjour</h5>
            <p>ce mail automatique vous a été envoyé afin que vous puissiez consulter le profil d'un jeune sur le projet gouvernemental Jeunes 6.4</p>
        </header>
        <main>
            
            
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