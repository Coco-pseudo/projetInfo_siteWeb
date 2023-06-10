<?php 
if($_COOKIE['verified'] == 1){//l'utilisateur viens de se connecter avec succès
    setcookie('verified');
    unset($_COOKIE["verified"]);
}else{//on verifie l'utilisateur
    setcookie('destination');
    setcookie('destination','/Jeune/Jeune.php',time()+3600);//création d'un cookie representant le chemin depuis le répertoire de connexion.php
    header('Location: ../Connexion.php');exit();
}
?>
<!DOCTYPE html>
<html>
    <!-- Comprend le titre de la page et la page css associé -->
    <head>
        <meta charset="utf-8">
        <title>Jeune 6.4</title>
        <link rel="icon" type="image/png" href="logo.png">
        <link rel="stylesheet" type="text/css" href="Jeune.css">
    </head>
    

    <body>
        <!-- Bannière comprenant le logo et le slogan -->
        <header>
            <h1>Pour faire de l'engagement une valeur</h1>
            <image src="logo.png" height="150" onclick="Accueil()"></image>
        </header>
        <!-- Barre de navigation -->
        <nav>
            <ul class="nav-links">
                <li><a href="Jeune.php" class="color1">Profil</a></li>
                <li><a href="References.php" class="color2">Références</a></li>
                <li><a href="../Deco.php" class="color3">Déconnexion</a></li>
            </ul>
        </nav>
        <!-- Contenu de la page -->
        <div class="info">
            <div class=profil>
            <?php
            $mail=$_COOKIE['mail']; //récupere le mail
            $DATA="Profil/$mail/Profil.json"; //récupere les données du profil
            $ref = json_decode(file_get_contents($DATA),true); //décode les données du profil
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
            $DATA="Profil/$mail/Reference.json"; //récupere les données des références
            $ref = json_decode(file_get_contents($DATA),true); //décode les données des références
            if ($ref==null){ //verifie que des références existe
                $nbref=0;
            }else{
                $nbref = count($ref['Reference']);
            }
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
