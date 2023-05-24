<?php 
if($_COOKIE['verified'] == 1){
    setcookie('verified','',1);
}else{
    setcookie('destination','/Jeune/Jeune.php',time()+3600);
    header('Location: Connexion.php');
}
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Jeune 6.4</title>
        <link rel="icon" type="image/png" href="logo.png">
        <link rel="stylesheet" type="text/css" href="Jeune.css">
    </head>
    
    <header>
        <h1>Pour faire de l'engagement une valeur</h1>
        <image src="logo.png" height="150" onclick="Accueil()"></image>
    </header>
    <body>
        <nav>
            <ul class="nav-links">
                <li><a href="Jeune.php" class="color1">Profil</a></li>
                <li><a href="References.php" class="color2">Références</a></li>
            </ul>
        </nav>
        <div class="info">
            <div class=profil>
            <?php
            $DATA="$_COOKIE[mail].json";
            $ref = json_decode(file_get_contents($DATA),true);
            echo "<h2> Votre Profil </h2>";
            echo "<div class=prfl>";
                echo "<div>"; 
                    echo "Nom : ";
                    echo $ref['Profil'][0]['Nom'];
                echo "</div>";
                echo "<div>";
                    echo "Prénom 1878 insertio: ";
                    echo $ref['Profil'][0]['Prenom'];
                echo "</div>";
                echo "<div>";
                    echo "Date de naissance : ";
                    echo $ref['Profil'][0]['Date'];
                echo "</div>";
                echo "<div>";
                    echo "Email : ";
                    echo $ref['Profil'][0]['EmailRef'];
                echo "</div>";
            echo "</div>";
            ?>
            <div >
                <button onclick="Demande()" class="bouton">Modifier le profil</button>
            </div>
            </div>
            <div class=nombreref>
            <?php
            $DATA="Data2.json";
            $ref = json_decode(file_get_contents($DATA),true);
            $nbref = count($ref['Reference']);
            echo "<h2> Vos Références </h2>";
            echo "<div class=nbref>";
                echo "Nombre de référence : $nbref";
            echo "</div>";
            ?>
            </div>
        </div>
        <script>
            function Accueil(){
                document.location.href="Visiteur.php";
            }
            function Demande(){
                document.location.href="ModifProfil.php";
            }
        </script>
    </body>
</html>