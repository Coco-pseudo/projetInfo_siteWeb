<?php
    session_start();
?>
<!DOCTYPE html>
<html>
    <!-- Comprend le titre de la page et la page css associé -->
    <head>
        <meta charset="utf-8">
        <title>Consultant - Jeune 6.4</title>
        <link rel="icon" type="image/png" href="logo.png">
        <link rel="stylesheet" type="text/css" href="ConsJeune.css">
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
                <li><a href="ConsJeune.php" class="color1">Profil du Jeune</a></li>
                <li><a href="ConsRef.php" class="color2">Liste de ses Références</a></li>
            </ul>
        </nav>
        <!-- Contenu de la page -->
        <div class="info">
            <div class=profil>
            <?php
            $tab=$_SESSION["dataC"];
            $mail=$tab[0];
            $DATA="Jeune/Profil/$mail/Profil.json";
            $ref = json_decode(file_get_contents($DATA),true);
            echo "<h2> Son Profil </h2>";
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
            </div>
            <div class=nombreref>
            <?php
            $DATA="Jeune/Profil/$mail/Reference.json";
            $ref = json_decode(file_get_contents($DATA),true);
            $nbref = count($ref['Reference']);
            echo "<h2> Ces Références </h2>";
            echo "<div class=nbref>";
                echo "Nombre de référence : $nbref";
            echo "</div>";
            ?>
            </div>
        </div>
        <script>
            function Accueil(){
                document.location.href="Consultant.php";
            }
        </script>
    </body>
</html>