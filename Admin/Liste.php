<?php
//page d'affichage de la liste des jeunes présent sur le site
if($_COOKIE['verified'] == 2){
    setcookie('verified','',1);
}else{
    setcookie('destination','Admin/liste.php');
    header('Location: ../Connexion.php');
}
?>
<!--<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Jeune 6.4</title>
        <link rel="icon" type="image/png" href="logo.png">
        <link rel="stylesheet" type="text/css" href="Administrateur.css">
    </head>
    
    <header>
        <h1>Pour faire de l'engagement une valeur</h1>
        <image src="../logo.png" height="150" onclick="Accueil()"></image>
    </header>
    <body>
        <nav>
            <ul class="nav-links">
                <li><a href="Liste.php" class="color1">Profils</a></li>
                <li><a href="#" class="color2">Log</a></li>
                <li><a href="../Deco.php" class="color3">Déconnexion</a></li>
            </ul>
        </nav>
        <script>
            function Accueil(){
                document.location.href="../Visiteur.php";
            }
        </script>
    </body>
</html>-->
<?php
$CheminProfils = "../Jeune/Profil";
$Liste = scandir("$CheminProfils");
if(count($Liste) == 2){//contient uniquement .. et .
    echo("Il n'y a pas de dossier Jeune sur le site");
}else{
    for($i = 0; $i<count($Liste); $i++){
        echo("$Liste[$i] <br>");
    }
}
?>