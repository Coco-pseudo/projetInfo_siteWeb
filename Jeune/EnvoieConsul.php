<<<<<<< HEAD
<?php
if($_COOKIE['verified'] == 1){
    setcookie('verified','',1);
}else{
    setcookie('destination','Jeune/References.php',time()+3600);
    header('Location: ../Connexion.php');
}
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Vos Références - Jeune 6.4</title>
        <link rel="icon" type="image/png" href="logo.png">
        <link rel="stylesheet" type="text/css" href="EnvoieConsul.css">
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
                <li><a href="Deco.php" class="color3">Déconnexion</a></li>
            </ul>
        </nav>
        <div class="references">

            <div class="commentaire">
            <?php
            $DATA="Profil/270jluismetmongrosdoigtdpied@yahoo.fr/Reference.json";
            $ref = json_decode(file_get_contents($DATA),true);
            $nbref = count($ref['Reference']);

            for ($i = 1; $i <= $nbref; $i++) {
                if ($ref['Reference'][$i-1]['archiver'] == 0){
                    if ($ref['Reference'][$i-1]['verif'] == 1){
                        echo "<h2>Commentaire $i :</h2>";
                        echo "<div class=com>";
                            if ($ref['Reference'][$i-1]['Commentaire'] != ""){
                                echo $ref['Reference'][$i-1]['Commentaire'];
                            }
                        echo "</div>";
                    }
                }
            }
            ?>
            </div>

            <div class="tab">
            <?php
            $ref = json_decode(file_get_contents($DATA),true);
            $nbref = count($ref['Reference']);
            
            for ($i = 1; $i <= $nbref; $i++) { // Boucle pour créer les tableaux
                if ($ref['Reference'][$i-1]['archiver'] == 0){
                    if ($ref['Reference'][$i-1]['verif'] == 1){

                        echo "<h2>";
                        echo "<img src=checkmark.png height=14>Référence $i validé :";
                        echo "</h2>";

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

                        echo "<tr>";
                        echo "<td colspan=2>";
                        echo "<label class=container>Envoie cette référence";
                        echo "<input type=checkbox name=nbref value=$i >";
                        echo "<span class=checkmark></span>";
                        echo "</label>";
                        echo "</td>";
                        echo "</tr>";
            
            
                        echo "</table>";
                    }
                }
            }
            ?>
            </div>

            <div class="savoir-etre">
            <?php
            $ref = json_decode(file_get_contents($DATA),true);
            $nbref = count($ref['Reference']);
            
            for ($i = 1; $i <= $nbref; $i++) { // Boucle pour créer les tableaux de savoir-être
                if ($ref['Reference'][$i-1]['archiver'] == 0){
                    if ($ref['Reference'][$i-1]['verif'] == 1){
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
                }
            }
            ?>
            </div>

            <div class="savoir-faire">
            <?php
            $ref = json_decode(file_get_contents($DATA),true);
            $nbref = count($ref['Reference']);
            
            for ($i = 1; $i <= $nbref; $i++) { // Boucle pour créer les tableaux de savoir-faire
                if ($ref['Reference'][$i-1]['archiver'] == 0){
                    if ($ref['Reference'][$i-1]['verif'] == 1){
                        echo "<h2>Savoirs-faire $i :</h2>";
                        echo "<table id=$i class=svf >";
                        
                        if ($ref['Reference'][$i-1]['Gerer un projet'] == 1){
                            echo "<tr>";
                                echo "<td class=reponse>";
                                echo "<img src=checkmark.png height=12>";
                                echo "Gérer un projet";
                                echo "</td>";
                            echo "</tr>";
                        }
                        
                        if ($ref['Reference'][$i-1]['Parler une autre langue'] == 1){
                            echo "<tr>";
                                echo "<td class=reponse>";
                                echo "<img src=checkmark.png height=12>";
                                echo "Parler une autre langue";
                                echo "</td>";
                            echo "</tr>";
                        }
                        
                        if ($ref['Reference'][$i-1]['Diriger une equipe'] == 1){
                            echo "<tr>";
                                echo "<td class=reponse>";
                                echo "<img src=checkmark.png height=12>";
                                echo "Diriger une equipe";
                                echo "</td>";
                            echo "</tr>";
                        }
                        
                        if ($ref['Reference'][$i-1]['Maitriser de linformatique'] == 1){
                            echo "<tr>";
                                echo "<td class=reponse>";
                                echo "<img src=checkmark.png height=12>";
                                echo "Maitriser de l'informatique";
                                echo "</td>";
                            echo "</tr>";
                        }
                        
                        if ($ref['Reference'][$i-1]['Savoir dessiner'] == 1){
                            echo "<tr>";
                                echo "<td class=reponse>";
                                echo "<img src=checkmark.png height=12>";
                                echo "Savoir dessiner";
                                echo "</td>";
                            echo "</tr>";
                        }
                        
            
                        if ($ref['Reference'][$i-1]['Savoir traduire'] == 1){
                            echo "<tr>";
                                echo "<td class=reponse>";
                                echo "<img src=checkmark.png height=12>";
                                echo "Savoir traduire";
                                echo "</td>";
                            echo "</tr>";
                        }

                        if ($ref['Reference'][$i-1]['Organiser une conference'] == 1){
                            echo "<tr>";
                                echo "<td class=reponse>";
                                echo "<img src=checkmark.png height=12>";
                                echo "Organiser une conference";
                                echo "</td>";
                            echo "</tr>";
                        }

                        if ($ref['Reference'][$i-1]['Concevoir une formation'] == 1){
                            echo "<tr>";
                                echo "<td class=reponse>";
                                echo "<img src=checkmark.png height=12>";
                                echo "Concevoir une formation";
                                echo "</td>";
                            echo "</tr>";
                        }

                        if ($ref['Reference'][$i-1]['Trier des donnees'] == 1){
                            echo "<tr>";
                                echo "<td class=reponse>";
                                echo "<img src=checkmark.png height=12>";
                                echo "Trier des données";
                                echo "</td>";
                            echo "</tr>";
                        }

                        if ($ref['Reference'][$i-1]['Capacite à sorganiser'] == 1){
                            echo "<tr>";
                                echo "<td class=reponse>";
                                echo "<img src=checkmark.png height=12>";
                                echo "Capacité à s'organiser";
                                echo "</td>";
                            echo "</tr>";
                        }
            
                        echo "</table>";
                    }
                }
            }
            ?>
            </div>

            <div class="bouton">
                <div>
                    <button onclick="Retour()" class="br">Retour a vos références</button>
                </div>
                <div>
                    <button onclick="EnvoieC()" class="bec">Envoie</button>
                </div>
            </div>

        </div>
        <script>
            function Accueil(){
                document.location.href="../Visiteur.php";
            }
            function Retour(){
                document.location.href="References.php";
            }
            function EnvoieC(){
                document.location.href="EnvoieConsul.php";
            }
        </script>
    </body>
=======
<?php
if($_COOKIE['verified'] == 1){
    setcookie('verified','',1);
}else{
    setcookie('destination','Jeune/References.php',time()+3600);
    header('Location: ../Connexion.php');
}
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Vos Références - Jeune 6.4</title>
        <link rel="icon" type="image/png" href="logo.png">
        <link rel="stylesheet" type="text/css" href="EnvoieConsul.css">
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
                <li><a href="Deco.php" class="color3">Déconnexion</a></li>
            </ul>
        </nav>
        <div class="references">

            <div class="commentaire">
            <?php
            $mail=$_COOKIE['mail'];
            $DATA="Profil/$mail/Reference.json";
            $ref = json_decode(file_get_contents($DATA),true);
            $nbref = count($ref['Reference']);

            for ($i = 1; $i <= $nbref; $i++) {
                if ($ref['Reference'][$i-1]['archiver'] == 0){
                    if ($ref['Reference'][$i-1]['verif'] == 1){
                        echo "<h2>Commentaire $i :</h2>";
                        echo "<div class=com>";
                            if ($ref['Reference'][$i-1]['Commentaire'] != ""){
                                echo $ref['Reference'][$i-1]['Commentaire'];
                            }
                        echo "</div>";
                    }
                }
            }
            ?>
            </div>

            <div class="tab">
            <?php
            $ref = json_decode(file_get_contents($DATA),true);
            $nbref = count($ref['Reference']);
            
            for ($i = 1; $i <= $nbref; $i++) { // Boucle pour créer les tableaux
                if ($ref['Reference'][$i-1]['archiver'] == 0){
                    if ($ref['Reference'][$i-1]['verif'] == 1){

                        echo "<h2>";
                        echo "<img src=checkmark.png height=14>Référence $i validé :";
                        echo "</h2>";

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

                        echo "<tr>";
                        echo "<td colspan=2>";
                        echo "<label class=container>Envoie cette référence";
                        echo "<input type=checkbox name=nbref value=$i >";
                        echo "<span class=checkmark></span>";
                        echo "</label>";
                        echo "</td>";
                        echo "</tr>";
            
            
                        echo "</table>";
                    }
                }
            }
            ?>
            </div>

            <div class="savoir-etre">
            <?php
            $ref = json_decode(file_get_contents($DATA),true);
            $nbref = count($ref['Reference']);
            
            for ($i = 1; $i <= $nbref; $i++) { // Boucle pour créer les tableaux de savoir-être
                if ($ref['Reference'][$i-1]['archiver'] == 0){
                    if ($ref['Reference'][$i-1]['verif'] == 1){
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
                }
            }
            ?>
            </div>

            <div class="savoir-faire">
            <?php
            $ref = json_decode(file_get_contents($DATA),true);
            $nbref = count($ref['Reference']);
            
            for ($i = 1; $i <= $nbref; $i++) { // Boucle pour créer les tableaux de savoir-faire
                if ($ref['Reference'][$i-1]['archiver'] == 0){
                    if ($ref['Reference'][$i-1]['verif'] == 1){
                        echo "<h2>Savoirs-faire $i :</h2>";
                        echo "<table id=$i class=svf >";
                        
                        if ($ref['Reference'][$i-1]['Gerer un projet'] == 1){
                            echo "<tr>";
                                echo "<td class=reponse>";
                                echo "<img src=checkmark.png height=12>";
                                echo "Gérer un projet";
                                echo "</td>";
                            echo "</tr>";
                        }
                        
                        if ($ref['Reference'][$i-1]['Parler une autre langue'] == 1){
                            echo "<tr>";
                                echo "<td class=reponse>";
                                echo "<img src=checkmark.png height=12>";
                                echo "Parler une autre langue";
                                echo "</td>";
                            echo "</tr>";
                        }
                        
                        if ($ref['Reference'][$i-1]['Diriger une equipe'] == 1){
                            echo "<tr>";
                                echo "<td class=reponse>";
                                echo "<img src=checkmark.png height=12>";
                                echo "Diriger une equipe";
                                echo "</td>";
                            echo "</tr>";
                        }
                        
                        if ($ref['Reference'][$i-1]['Maitriser de linformatique'] == 1){
                            echo "<tr>";
                                echo "<td class=reponse>";
                                echo "<img src=checkmark.png height=12>";
                                echo "Maitriser de l'informatique";
                                echo "</td>";
                            echo "</tr>";
                        }
                        
                        if ($ref['Reference'][$i-1]['Savoir dessiner'] == 1){
                            echo "<tr>";
                                echo "<td class=reponse>";
                                echo "<img src=checkmark.png height=12>";
                                echo "Savoir dessiner";
                                echo "</td>";
                            echo "</tr>";
                        }
                        
            
                        if ($ref['Reference'][$i-1]['Savoir traduire'] == 1){
                            echo "<tr>";
                                echo "<td class=reponse>";
                                echo "<img src=checkmark.png height=12>";
                                echo "Savoir traduire";
                                echo "</td>";
                            echo "</tr>";
                        }

                        if ($ref['Reference'][$i-1]['Organiser une conference'] == 1){
                            echo "<tr>";
                                echo "<td class=reponse>";
                                echo "<img src=checkmark.png height=12>";
                                echo "Organiser une conference";
                                echo "</td>";
                            echo "</tr>";
                        }

                        if ($ref['Reference'][$i-1]['Concevoir une formation'] == 1){
                            echo "<tr>";
                                echo "<td class=reponse>";
                                echo "<img src=checkmark.png height=12>";
                                echo "Concevoir une formation";
                                echo "</td>";
                            echo "</tr>";
                        }

                        if ($ref['Reference'][$i-1]['Trier des donnees'] == 1){
                            echo "<tr>";
                                echo "<td class=reponse>";
                                echo "<img src=checkmark.png height=12>";
                                echo "Trier des données";
                                echo "</td>";
                            echo "</tr>";
                        }

                        if ($ref['Reference'][$i-1]['Capacite à sorganiser'] == 1){
                            echo "<tr>";
                                echo "<td class=reponse>";
                                echo "<img src=checkmark.png height=12>";
                                echo "Capacité à s'organiser";
                                echo "</td>";
                            echo "</tr>";
                        }
            
                        echo "</table>";
                    }
                }
            }
            ?>
            </div>

            <div class="bouton">
                <div>
                    <button onclick="Retour()" class="br">Retour a vos références</button>
                </div>
                <div>
                    <button onclick="EnvoieC()" class="bec">Envoie</button>
                </div>
            </div>

        </div>
        <script>
            function Accueil(){
                document.location.href="../Visiteur.php";
            }
            function Retour(){
                document.location.href="References.php";
            }
            function EnvoieC(){
                document.location.href="EnvoieConsul.php";
            }
        </script>
    </body>
>>>>>>> Coco
</html>