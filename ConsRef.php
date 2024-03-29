<?php
    session_start();            
    $tab=$_SESSION["dataC"];
    $mail=$tab[0];
?>
<!DOCTYPE html>
<html>
    <!-- Comprend le titre de la page et la page css associé -->
    <head>
        <meta charset="utf-8">
        <title>Consultant - Jeune 6.4</title>
        <link rel="icon" type="image/png" href="logo.png">
        <link rel="stylesheet" type="text/css" href="ConsRef.css">
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
                <li><a href="ConsRef.php" class="color2">Liste des Références</a></li>
            </ul>
        </nav>
        <!-- Contenu de la page -->
        <div class="references">

            <div class="commentaire">
            <?php

            $DATA="Jeune/Profil/$mail/Reference.json";
            $ref = json_decode(file_get_contents($DATA),true);
            $nbref = count($tab)-1;

            for ($i = 1; $i <= $nbref; $i++) {
                echo "<h2>Commentaire $tab[$i] :</h2>";
                echo "<div class=com>";
                if ($ref['Reference'][$tab[$i]-1]['Commentaire'] != ""){
                    echo $ref['Reference'][$tab[$i]-1]['Commentaire'];
                }
                echo "</div>";
            }
            ?>
            </div>

            <div class="tab">
            <?php
            $ref = json_decode(file_get_contents($DATA),true);
            $nbref = count($tab)-1;
            
            for ($i = 1; $i <= $nbref; $i++) { // Boucle pour créer les tableaux
                echo "<h2>Référence $tab[$i] :</h2>";
                echo "<table id=$i class=ref >";
                
                echo "<tr>";
                    echo "<td>Description de l'engagement</td>";
                    echo "<td class=reponse>";
                    echo $ref['Reference'][$tab[$i]-1]['Description'];
                    echo "</td>";
                echo "</tr>";
                
                echo "<tr>";
                    echo "<td>Durée de l'engagement</td>";
                    echo "<td class=reponse>";
                    echo $ref['Reference'][$tab[$i]-1]['Duree'];
                    echo "</td>";
                echo "</tr>";
                
                echo "<tr>";
                    echo "<td>Le milieu de l'engagement (association, club de sport, etc.)</td>";
                    echo "<td class=reponse>";
                    echo $ref['Reference'][$tab[$i]-1]['milieu'];
                    echo "</td>";
                echo "</tr>";
                
                
                echo "<tr>";
                    echo "<td>Nom du référent</td>";
                    echo "<td class=reponse>";
                    echo $ref['Reference'][$tab[$i]-1]['nomRef'];
                    echo "</td>";
                echo "</tr>";
                
                
                echo "<tr>";
                    echo "<td>Prénom du référent</td>";
                    echo "<td class=reponse>";
                    echo $ref['Reference'][$tab[$i]-1]['prenomRef'];
                    echo "</td>";
                echo "</tr>";
                
    
                echo "<tr>";
                    echo "<td>Email du référent</td>";
                    echo "<td class=reponse>";
                    echo $ref['Reference'][$tab[$i]-1]['EmailRef'];
                    echo "</td>";
                echo "</tr>";
    
    
                echo "</table>";
            }
            ?>
            </div>

            <div class="savoir-etre">
            <?php
            $ref = json_decode(file_get_contents($DATA),true);
            $nbref = count($tab)-1;
            
            for ($i = 1; $i <= $nbref; $i++) { // Boucle pour créer les tableaux de savoir-être
                echo "<h2>Savoirs-être $tab[$i] :</h2>";
                echo "<table id=$i class=sve >";
                
                if ($ref['Reference'][$tab[$i]-1]['Autonome'] == 1){
                    echo "<tr>";
                        echo "<td class=reponse>";
                        echo "<img src=checkmark.png height=12>";
                        echo "Autonome";
                        echo "</td>";
                    echo "</tr>";
                }
                
                if ($ref['Reference'][$tab[$i]-1]['Passionne'] == 1){
                    echo "<tr>";
                        echo "<td class=reponse>";
                        echo "<img src=checkmark.png height=12>";
                        echo "Passionné";
                        echo "</td>";
                    echo "</tr>";
                }
                
                if ($ref['Reference'][$tab[$i]-1]['Reflechi'] == 1){
                    echo "<tr>";
                        echo "<td class=reponse>";
                        echo "<img src=checkmark.png height=12>";
                        echo "Réfléchi";
                        echo "</td>";
                    echo "</tr>";
                }
                
                if ($ref['Reference'][$tab[$i]-1]['Alecoute'] == 1){
                    echo "<tr>";
                        echo "<td class=reponse>";
                        echo "<img src=checkmark.png height=12>";
                        echo "A l'écoute";
                        echo "</td>";
                    echo "</tr>";
                }
                
                if ($ref['Reference'][$tab[$i]-1]['Organise'] == 1){
                    echo "<tr>";
                        echo "<td class=reponse>";
                        echo "<img src=checkmark.png height=12>";
                        echo "Organisé";
                        echo "</td>";
                    echo "</tr>";
                }
                
    
                if ($ref['Reference'][$tab[$i]-1]['Fiable'] == 1){
                    echo "<tr>";
                        echo "<td class=reponse>";
                        echo "<img src=checkmark.png height=12>";
                        echo "Fiable";
                        echo "</td>";
                    echo "</tr>";
                }

                if ($ref['Reference'][$tab[$i]-1]['Patient'] == 1){
                    echo "<tr>";
                        echo "<td class=reponse>";
                        echo "<img src=checkmark.png height=12>";
                        echo "Patient";
                        echo "</td>";
                    echo "</tr>";
                }

                if ($ref['Reference'][$tab[$i]-1]['Responsable'] == 1){
                    echo "<tr>";
                        echo "<td class=reponse>";
                        echo "<img src=checkmark.png height=12>";
                        echo "Responsable";
                        echo "</td>";
                    echo "</tr>";
                }

                if ($ref['Reference'][$tab[$i]-1]['Sociable'] == 1){
                    echo "<tr>";
                        echo "<td class=reponse>";
                        echo "<img src=checkmark.png height=12>";
                        echo "Sociable";
                        echo "</td>";
                    echo "</tr>";
                }

                if ($ref['Reference'][$tab[$i]-1]['Optimiste'] == 1){
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
            $ref = json_decode(file_get_contents($DATA),true);
            $nbref = count($tab)-1;
            
            for ($i = 1; $i <= $nbref; $i++) { // Boucle pour créer les tableaux de savoir-faire
                echo "<h2>Savoirs-faire $tab[$i] :</h2>";
                echo "<table id=$i class=svf >";
                
                if ($ref['Reference'][$tab[$i]-1]['Gerer un projet'] == 1){
                    echo "<tr>";
                        echo "<td class=reponse>";
                        echo "<img src=checkmark.png height=12>";
                        echo "Gérer un projet";
                        echo "</td>";
                    echo "</tr>";
                }
                
                if ($ref['Reference'][$tab[$i]-1]['Parler une autre langue'] == 1){
                    echo "<tr>";
                        echo "<td class=reponse>";
                        echo "<img src=checkmark.png height=12>";
                        echo "Parler une autre langue";
                        echo "</td>";
                    echo "</tr>";
                }
                
                if ($ref['Reference'][$tab[$i]-1]['Diriger une equipe'] == 1){
                    echo "<tr>";
                        echo "<td class=reponse>";
                        echo "<img src=checkmark.png height=12>";
                        echo "Diriger une equipe";
                        echo "</td>";
                    echo "</tr>";
                }
                
                if ($ref['Reference'][$tab[$i]-1]['Maitriser de linformatique'] == 1){
                    echo "<tr>";
                        echo "<td class=reponse>";
                        echo "<img src=checkmark.png height=12>";
                        echo "Maitriser de l'informatique";
                        echo "</td>";
                    echo "</tr>";
                }
                
                if ($ref['Reference'][$tab[$i]-1]['Savoir dessiner'] == 1){
                    echo "<tr>";
                        echo "<td class=reponse>";
                        echo "<img src=checkmark.png height=12>";
                        echo "Savoir dessiner";
                        echo "</td>";
                    echo "</tr>";
                }
                
    
                if ($ref['Reference'][$tab[$i]-1]['Savoir traduire'] == 1){
                    echo "<tr>";
                        echo "<td class=reponse>";
                        echo "<img src=checkmark.png height=12>";
                        echo "Savoir traduire";
                        echo "</td>";
                    echo "</tr>";
                }

                if ($ref['Reference'][$tab[$i]-1]['Organiser une conference'] == 1){
                    echo "<tr>";
                        echo "<td class=reponse>";
                        echo "<img src=checkmark.png height=12>";
                        echo "Organiser une conference";
                        echo "</td>";
                    echo "</tr>";
                }

                if ($ref['Reference'][$tab[$i]-1]['Concevoir une formation'] == 1){
                    echo "<tr>";
                        echo "<td class=reponse>";
                        echo "<img src=checkmark.png height=12>";
                        echo "Concevoir une formation";
                        echo "</td>";
                    echo "</tr>";
                }

                if ($ref['Reference'][$tab[$i]-1]['Trier des donnees'] == 1){
                    echo "<tr>";
                        echo "<td class=reponse>";
                        echo "<img src=checkmark.png height=12>";
                        echo "Trier des données";
                        echo "</td>";
                    echo "</tr>";
                }

                if ($ref['Reference'][$tab[$i]-1]['Capacite a sorganiser'] == 1){
                    echo "<tr>";
                        echo "<td class=reponse>";
                        echo "<img src=checkmark.png height=12>";
                        echo "Capacité à s'organiser";
                        echo "</td>";
                    echo "</tr>";
                }
    
                echo "</table>";
            }
            ?>
            </div>
        </div>
        <script>
            function Accueil(){
                document.location.href="Consultant.php";
            }
            function Demande(){
                document.location.href="DemandeRef.php";
            }
        </script>
    </body>
</html>