<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Jeune 6.4</title>
        <link rel="icon" type="image/png" href="logo.png">
        <link rel="stylesheet" type="text/css" href="RefJeune.css">
    </head>
    
    <header>
        <h1>Pour faire de l'engagement une valeur</h1>
        <image src="logo.png" height="150" onclick="Accueil()"></image>
    </header>
    <body>
        <nav>
            <ul class="nav-links">
                <li><a href="RefJeune.php" class="color1">Profil du Jeune</a></li>
                <li><a href="RefDemande.php" class="color2">Sa demande de Référence</a></li>
            </ul>
        </nav>
        <div class="info">
            <div class=profil>
            <?php
            // $mail=$_COOKIE['mail'];
            $mail="monadresse@gmail.com";
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
                document.location.href="Referent.php";
            }
        </script>
    </body>
</html>