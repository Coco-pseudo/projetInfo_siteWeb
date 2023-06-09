<?php 
if($_COOKIE['verified'] == 1){
    setcookie('verified');
    unset($_COOKIE["verified"]);
}else{
    setcookie('destination');
    setcookie('destination','/Jeune/Jeune.php',time()+3600);
    header('Location: ../Connexion.php');exit();
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
    

    <body>
        <header>
            <h1>Pour faire de l'engagement une valeur</h1>
            <image src="logo.png" height="150" onclick="Accueil()"></image>
        </header>
        <nav>
            <ul class="nav-links">
                <li><a href="Jeune.php" class="color1">Profil</a></li>
                <li><a href="References.php" class="color2">Références</a></li>
                <li><a href="../Deco.php" class="color3">Déconnexion</a></li>
            </ul>
        </nav>
        <div class="info">
            <div class=profil>
            <?php
            $mail=$_COOKIE['mail'];
            $DATA="Profil/$mail/Profil.json";
            $ref = json_decode(file_get_contents($DATA),true);
            echo "<h2> Votre Profil </h2>";
            echo "<table class=prfl>";
                echo "<tr>";
                    echo "<td>";
                    echo "Nom : ";
                    echo "</td>";
                    echo "<td>";
                    echo $ref['Profil'][0]['Nom'];
                    echo "</td>";
                echo "</tr>";
                echo "<tr>";
                    echo "<td>";
                    echo "Prénom : ";
                    echo "</td>";
                    echo "<td>";
                    echo $ref['Profil'][0]['Prenom'];
                    echo "</td>";
                echo "</tr>";
                echo "<tr>";
                    echo "<td>";
                    echo "Date de naissance : ";
                    echo "</td>";
                    echo "<td>";
                    echo $ref['Profil'][0]['Date'];
                    echo "</td>";
                echo "</tr>";
                echo "<tr>";
                    echo "<td>";
                    echo "Email : ";
                    echo "</td>";
                    echo "<td>";
                    echo $ref['Profil'][0]['Mail'];
                    echo "</td>";
                echo "</tr>";
            echo "</table>";
            ?>
            <div >
                <button onclick="Demande()" class="bouton">Modifier le profil</button>
            </div>
            </div>
            <div class=nombreref>
            <?php
            $DATA="Profil/$mail/Reference.json";
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
                document.location.href="../Visiteur.php";
            }
            function Demande(){
                document.location.href="ModifProfil.php";
            }
        </script>
    </body>
</html>