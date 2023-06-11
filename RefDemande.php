<?php
    session_start();
    setcookie("utilisateur", "Referent", time() + 180);
    $tab=$_SESSION["dataR"];
    $mail=$tab[0];
    $DATA="Jeune/Profil/$mail/Reference.json";
    $ref = json_decode(file_get_contents($DATA),true);
?>
<!DOCTYPE html>
<html>
    <!-- Comprend le titre de la page et la page css associé -->
    <head>
        <meta charset="utf-8">
        <title>Jeune 6.4</title>
        <link rel="icon" type="image/png" href="logo.png">
        <link rel="stylesheet" type="text/css" href="RefDemande.css">
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
                <li><a href="RefJeune.php" class="color1">Profil du Jeune</a></li>
                <li><a href="RefDemande.php" class="color2">Sa demande de Référence</a></li>
            </ul>
        </nav>
        <form>
            <!-- Contenu de la page -->
            <div class="references">

                <div class="commentaire">
                <?php
                
                $i=$tab[1];

                    echo "<h2>Commentaire :</h2>";
                    echo "<div class=com>";
                    if ($ref['Reference'][$i-1]['Commentaire'] != ""){
                        echo $ref['Reference'][$i-1]['Commentaire'];
                    }
                    echo "</div>";
                ?>
                </div>

                <div class="tab">
                <?php
                $ref = json_decode(file_get_contents($DATA),true);
                $nbref = count($ref['Reference']);
                    echo "<h2>Référence :</h2>";
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

                    if($ref['Reference'][$i-1]['verif'] == 1){
                        echo "<tr>";
                            echo "<td colspan=2><input type=\"button\" onclick=Modif() class=btd value=\"Modifier la Référence\"><input type=\"button\" onclick=Validation($i) class=bt value=\"Valider\"></td>";
                        echo "</tr>";
                    }
                    echo "</table>";
                ?>
                </div>

                <div class="savoir-etre">
                <?php
                $ref = json_decode(file_get_contents($DATA),true);
                $nbref = count($ref['Reference']);
                
                    echo "<h2>Savoirs-être :</h2>";
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
                ?>
                </div>

                <div class="savoir-faire">
                <?php
                $ref = json_decode(file_get_contents($DATA),true);
                $nbref = count($ref['Reference']);
                
                    echo "<h2>Savoirs-faire :</h2>";
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

                    if ($ref['Reference'][$i-1]['Capacite a sorganiser'] == 1){
                        echo "<tr>";
                            echo "<td class=reponse>";
                            echo "<img src=checkmark.png height=12>";
                            echo "Capacité à s'organiser";
                            echo "</td>";
                        echo "</tr>";
                    }
        
                    echo "</table>";
                ?>
                </div>
            </div>
            <input type="submit" class="invisible">
        </form>
        <script>
            function Accueil(){
                document.location.href="Referent.php";
            }
            function Modif(){
                document.location.href="RefModifDemande.php";
            }
            function Validation(a){
                alert("validation de la Reference n°"+a);
                var xhr = new XMLHttpRequest();
                xhr.open("POST", "Jeune/AlgoModifRef.php", true);
                xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
                xhr.send("b=4 & a="+a);
                //document.location.href="RefDemande.php";
                
                //requête du mail au jeune
                //partie mail fonctionnel
                /*var ajax = new XMLHttpRequest();
                ajax.open("POST", "MailJeune.php", true);
                ajax.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
                ajax.send("mail=<?php //echo($mail)?>"+"num=<?php //echo($j)?>);*/

                //ouverture sur une autre page du mail pour le jeune
                document.cookie="numero = "+a ;
                document.cookie="mail = "+"<?php echo("$mail")?>";
                open("Jeune/MailJeune.php");
                document.location.href="RefRemerciement.php";

            }
        </script>
    </body>
</html>
