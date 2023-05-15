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

            <div class="commentaire">
            <?php
            $ref = json_decode(file_get_contents('Data2.json'),true);
            $nbref = count($ref['Reference']);

            for ($i = 1; $i <= $nbref; $i++) {
                echo "<h2>Commentaire $i :</h2>";
                if ($ref['Reference'][$i-1]['Commentaire'] != ""){
                    echo "<div class=com>";
                    echo $ref['Reference'][$i-1]['Commentaire'];
                    echo "</div>";
                }
            }
            ?>
            </div>

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

            <div class="savoir-être">
            <?php
            $ref = json_decode(file_get_contents('Data2.json'),true);
            $nbref = count($ref['Reference']);
            
            for ($i = 1; $i <= $nbref; $i++) { // Boucle pour créer les tableaux de savoir-être
                echo "<h2>Savoirs-être $i :</h2>";
                echo "<table id=$i class=sve >";
                
                if ($ref['Reference'][$i-1]['Autonome'] == 1){
                    echo "<tr>";
                        echo "<td class=reponse>";
                        echo "<img src=checkmark.png height=12>";
                        echo "Autonome";
                        echo "</td>";
                    echo "</tr>";
                }
                
                if ($ref['Reference'][$i-1]['Passionne'] == 1){
                    echo "<tr>";
                        echo "<td class=reponse>";
                        echo "<img src=checkmark.png height=12>";
                        echo "Passionné";
                        echo "</td>";
                    echo "</tr>";
                }
                
                if ($ref['Reference'][$i-1]['Reflechi'] == 1){
                    echo "<tr>";
                        echo "<td class=reponse>";
                        echo "<img src=checkmark.png height=12>";
                        echo "Réfléchi";
                        echo "</td>";
                    echo "</tr>";
                }
                
                if ($ref['Reference'][$i-1]['Alecoute'] == 1){
                    echo "<tr>";
                        echo "<td class=reponse>";
                        echo "<img src=checkmark.png height=12>";
                        echo "A l'écoute";
                        echo "</td>";
                    echo "</tr>";
                }
                
                if ($ref['Reference'][$i-1]['Organise'] == 1){
                    echo "<tr>";
                        echo "<td class=reponse>";
                        echo "<img src=checkmark.png height=12>";
                        echo "Organisé";
                        echo "</td>";
                    echo "</tr>";
                }
                
    
                if ($ref['Reference'][$i-1]['Fiable'] == 1){
                    echo "<tr>";
                        echo "<td class=reponse>";
                        echo "<img src=checkmark.png height=12>";
                        echo "Fiable";
                        echo "</td>";
                    echo "</tr>";
                }
    
                if ($ref['Reference'][$i-1]['Fiable'] == 1){
                    echo "<tr>";
                        echo "<td class=reponse>";
                        echo "<img src=checkmark.png height=12>";
                        echo "Fiable";
                        echo "</td>";
                    echo "</tr>";
                }

                if ($ref['Reference'][$i-1]['Patient'] == 1){
                    echo "<tr>";
                        echo "<td class=reponse>";
                        echo "<img src=checkmark.png height=12>";
                        echo "Patient";
                        echo "</td>";
                    echo "</tr>";
                }

                if ($ref['Reference'][$i-1]['Responsable'] == 1){
                    echo "<tr>";
                        echo "<td class=reponse>";
                        echo "<img src=checkmark.png height=12>";
                        echo "Responsable";
                        echo "</td>";
                    echo "</tr>";
                }

                if ($ref['Reference'][$i-1]['Sociable'] == 1){
                    echo "<tr>";
                        echo "<td class=reponse>";
                        echo "<img src=checkmark.png height=12>";
                        echo "Sociable";
                        echo "</td>";
                    echo "</tr>";
                }

                if ($ref['Reference'][$i-1]['Optimiste'] == 1){
                    echo "<tr>";
                        echo "<td class=reponse>";
                        echo "<img src=checkmark.png height=12>";
                        echo "Optimiste";
                        echo "</td>";
                    echo "</tr>";
                }
    
                echo "</table>";
            }
            ?>
            </div>

            <div class="savoir-faire">
            <?php
            $ref = json_decode(file_get_contents('Data2.json'),true);
            $nbref = count($ref['Reference']);
            
            for ($i = 1; $i <= $nbref; $i++) { // Boucle pour créer les tableaux de savoir-faire
                echo "<h2>Savoirs-faire $i :</h2>";
                echo "<table id=$i class=svf >";
                
                if ($ref['Reference'][$i-1]['Autonome'] == 1){
                    echo "<tr>";
                        echo "<td class=reponse>";
                        echo "<img src=checkmark.png height=12>";
                        echo "Autonome";
                        echo "</td>";
                    echo "</tr>";
                }
                
                if ($ref['Reference'][$i-1]['Passionne'] == 1){
                    echo "<tr>";
                        echo "<td class=reponse>";
                        echo "<img src=checkmark.png height=12>";
                        echo "Passionné";
                        echo "</td>";
                    echo "</tr>";
                }
                
                if ($ref['Reference'][$i-1]['Reflechi'] == 1){
                    echo "<tr>";
                        echo "<td class=reponse>";
                        echo "<img src=checkmark.png height=12>";
                        echo "Réfléchi";
                        echo "</td>";
                    echo "</tr>";
                }
                
                if ($ref['Reference'][$i-1]['Alecoute'] == 1){
                    echo "<tr>";
                        echo "<td class=reponse>";
                        echo "<img src=checkmark.png height=12>";
                        echo "A l'écoute";
                        echo "</td>";
                    echo "</tr>";
                }
                
                if ($ref['Reference'][$i-1]['Organise'] == 1){
                    echo "<tr>";
                        echo "<td class=reponse>";
                        echo "<img src=checkmark.png height=12>";
                        echo "Organisé";
                        echo "</td>";
                    echo "</tr>";
                }
                
    
                if ($ref['Reference'][$i-1]['Fiable'] == 1){
                    echo "<tr>";
                        echo "<td class=reponse>";
                        echo "<img src=checkmark.png height=12>";
                        echo "Fiable";
                        echo "</td>";
                    echo "</tr>";
                }
    
                if ($ref['Reference'][$i-1]['Fiable'] == 1){
                    echo "<tr>";
                        echo "<td class=reponse>";
                        echo "<img src=checkmark.png height=12>";
                        echo "Fiable";
                        echo "</td>";
                    echo "</tr>";
                }

                if ($ref['Reference'][$i-1]['Patient'] == 1){
                    echo "<tr>";
                        echo "<td class=reponse>";
                        echo "<img src=checkmark.png height=12>";
                        echo "Patient";
                        echo "</td>";
                    echo "</tr>";
                }

                if ($ref['Reference'][$i-1]['Responsable'] == 1){
                    echo "<tr>";
                        echo "<td class=reponse>";
                        echo "<img src=checkmark.png height=12>";
                        echo "Responsable";
                        echo "</td>";
                    echo "</tr>";
                }

                if ($ref['Reference'][$i-1]['Sociable'] == 1){
                    echo "<tr>";
                        echo "<td class=reponse>";
                        echo "<img src=checkmark.png height=12>";
                        echo "Sociable";
                        echo "</td>";
                    echo "</tr>";
                }

                if ($ref['Reference'][$i-1]['Optimiste'] == 1){
                    echo "<tr>";
                        echo "<td class=reponse>";
                        echo "<img src=checkmark.png height=12>";
                        echo "Optimiste";
                        echo "</td>";
                    echo "</tr>";
                }
    
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
                document.location.href="CV.php";
            }
        </script>
    </body>
</html>