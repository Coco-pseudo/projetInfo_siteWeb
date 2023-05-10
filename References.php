<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Jeune 6.4</title>
        <link rel="icon" type="image/png" href="logo.png">
        <link rel="stylesheet" type="text/css" href="References.css">
    </head>
    
    <header>
        <h1>Pour faire de l'engagement une valeur</h1>
        <image src="logo.png" height="150" onclick="Accueil()"></image>
    </header>
    <body>
        <nav>
            <ul class="nav-links">
                <li><a href="Profil.html" class="color1">Profil</a></li>
                <li><a href="References.php" class="color2">Références</a></li>
            </ul>
        </nav>
        <div class="references">
            <div class="tab">
            <?php
            $ref = json_decode(file_get_contents('Data2.json'),true);
            $nbref = count($ref['Reference']);
            
            for ($i = 1; $i <= $nbref; $i++) { // Boucle pour créer les tableaux
                echo "<h2>Référence $i :</h2>";
                echo "<table id=$i class=ref >";
                
                echo "<tr>";
                    echo "<td>Description de l'engagement</td>";
                    echo "<td class=reponse>";
                    echo $ref['Reference'][$i-1]['Description'];
                    echo "</td>";
                echo "</tr>";
                
                echo "<tr>";
                    echo "<td>Durée de l'engagement</td>";
                    echo "<td class=reponse>";
                    echo $ref['Reference'][$i-1]['Duree'];
                    echo "</td>";
                echo "</tr>";
                
                echo "<tr>";
                    echo "<td>Le milieu de l'engagement (association, club de sport, etc.)</td>";
                    echo "<td class=reponse>";
                    echo $ref['Reference'][$i-1]['milieu'];
                    echo "</td>";
                echo "</tr>";
                
                
                echo "<tr>";
                    echo "<td>Nom du référent</td>";
                    echo "<td class=reponse>";
                    echo $ref['Reference'][$i-1]['nomRef'];
                    echo "</td>";
                echo "</tr>";
                
                
                echo "<tr>";
                    echo "<td>Prénom du référent</td>";
                    echo "<td class=reponse>";
                    echo $ref['Reference'][$i-1]['prenomRef'];
                    echo "</td>";
                echo "</tr>";
                
    
                echo "<tr>";
                    echo "<td>Email du référent</td>";
                    echo "<td class=reponse>";
                    echo $ref['Reference'][$i-1]['EmailRef'];
                    echo "</td>";
                echo "</tr>";
    
    
                echo "</table>";
            }
            ?>
            </div>
            <div class="bouton">
                <div>
                    <button onclick="Demande()" class="bd">Nouvelle référence</button>
                </div>
                <div>
                    <button onclick="CV()" class="bcv">CV</button>
                </div>
            </div>
        </div>
        <script>
            function Accueil(){
                document.location.href="Jeune.html";
            }
            function Demande(){
                document.location.href="DemandeRef.php";
            }
            function CV(){
                document.location.href="#.php";
            }
        </script>
    </body>
</html>