<?php
if($_COOKIE['verified'] == 1){
    setcookie('verified','',1);
}else{
    setcookie('destination','/Jeune/DemandeRef.php',time()+3600);
    header('Location: ../Connexion.php');
}
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Jeune 6.4</title>
        <link rel="icon" type="image/png" href="logo.png">
        <link rel="stylesheet" type="text/css" href="ModifRef.css">
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

        <?php
        $mail=$_COOKIE['mail'];
        $DATA="Profil/$mail/Reference.json";
        $ref = json_decode(file_get_contents($DATA),true);
        $i=0;
        $d=$ref['Reference'][$i]['Description'];
        $du=$ref['Reference'][$i]['Duree'];
        $a=$ref['Reference'][$i]['milieu'];
        $n=$ref['Reference'][$i]['nomRef'];
        $p=$ref['Reference'][$i]['prenomRef'];
        $e=$ref['Reference'][$i]['EmailRef'];
        ?>
        <form method=POST action=http://localhost:8080/Jeune/PageDemandeBis.php>
            <div class="formulaires">
                <table  class="ref">
                    <tr>
                        <td>Description de l'engagement</td>
                        <td><input type="text" name="Description" value="<?php echo $d; ?>"></input> </td>
                    </tr>
                    <tr>
                        <td>Durée de l'engagement</td>
                        <td><input type="text" name="Durée" value="<?php echo $du; ?>"></input> </td>
                    </tr>
                    <tr>
                        <td>Le milieu de l'engagement (association, club de sport, etc.)</td>
                        <td><input type="text" name="milieu" value="<?php echo $a; ?>"></input> </td>
                    </tr>
                    <tr>
                        <td>Nom du référent</td>
                        <td><input type="text" name="nomRef" value="<?php echo $n; ?>"></input> </td>
                    </tr>
                    <tr>
                        <td>Prénom du référent</td>
                        <td><input type="text" name="prenomRef" value="<?php echo $p; ?>"></input> </td>
                    </tr>
                    <tr>
                        <td>Email du référent</td>
                        <td><input type="email" name="EmailRef" value="<?php echo $e; ?>"></input> </td>
                    </tr>
                </table>
        
               
                <div class="savoir-etre">
                    <?php
                    $ref = json_decode(file_get_contents($DATA),true);
                    echo "<h2>Savoirs-être $i :</h2>";
                    echo "<table id=$i class=sve >";
                    
                    if ($ref['Reference'][$i]['Autonome'] == 1){
                        echo "<tr>";
                            echo "<td><input type=checkbox name=Autonome value=Autonome >Autonome </td>";
                            echo "Autonome";
                        echo "</tr>";
                    }
                    
                    if ($ref['Reference'][$i]['Passionne'] == 1){
                        echo "<tr>";
                            echo "<td class=reponse>";
                            echo "<img src=checkmark.png height=12>";
                            echo "Passionné";
                            echo "</td>";
                        echo "</tr>";
                    }
                    
                    if ($ref['Reference'][$i]['Reflechi'] == 1){
                        echo "<tr>";
                            echo "<td class=reponse>";
                            echo "<img src=checkmark.png height=12>";
                            echo "Réfléchi";
                            echo "</td>";
                        echo "</tr>";
                    }
                    
                    if ($ref['Reference'][$i]['Alecoute'] == 1){
                        echo "<tr>";
                            echo "<td class=reponse>";
                            echo "<img src=checkmark.png height=12>";
                            echo "A l'écoute";
                            echo "</td>";
                        echo "</tr>";
                    }
                    
                    if ($ref['Reference'][$i]['Organise'] == 1){
                        echo "<tr>";
                            echo "<td class=reponse>";
                            echo "<img src=checkmark.png height=12>";
                            echo "Organisé";
                            echo "</td>";
                        echo "</tr>";
                    }
                    
        
                    if ($ref['Reference'][$i]['Fiable'] == 1){
                        echo "<tr>";
                            echo "<td class=reponse>";
                            echo "<img src=checkmark.png height=12>";
                            echo "Fiable";
                            echo "</td>";
                        echo "</tr>";
                    }

                    if ($ref['Reference'][$i]['Patient'] == 1){
                        echo "<tr>";
                            echo "<td class=reponse>";
                            echo "<img src=checkmark.png height=12>";
                            echo "Patient";
                            echo "</td>";
                        echo "</tr>";
                    }

                    if ($ref['Reference'][$i]['Responsable'] == 1){
                        echo "<tr>";
                            echo "<td class=reponse>";
                            echo "<img src=checkmark.png height=12>";
                            echo "Responsable";
                            echo "</td>";
                        echo "</tr>";
                    }

                    if ($ref['Reference'][$i]['Sociable'] == 1){
                        echo "<tr>";
                            echo "<td class=reponse>";
                            echo "<img src=checkmark.png height=12>";
                            echo "Sociable";
                            echo "</td>";
                        echo "</tr>";
                    }

                    if ($ref['Reference'][$i]['Optimiste'] == 1){
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
                
                    echo "<h2>Savoirs-faire $i :</h2>";
                    echo "<table id=$i class=svf >";
                    
                    if ($ref['Reference'][$i]['Gerer un projet'] == 1){
                        echo "<tr>";
                            echo "<td class=reponse>";
                            echo "<img src=checkmark.png height=12>";
                            echo "Gérer un projet";
                            echo "</td>";
                        echo "</tr>";
                    }
                    
                    if ($ref['Reference'][$i]['Parler une autre langue'] == 1){
                        echo "<tr>";
                            echo "<td class=reponse>";
                            echo "<img src=checkmark.png height=12>";
                            echo "Parler une autre langue";
                            echo "</td>";
                        echo "</tr>";
                    }
                    
                    if ($ref['Reference'][$i]['Diriger une equipe'] == 1){
                        echo "<tr>";
                            echo "<td class=reponse>";
                            echo "<img src=checkmark.png height=12>";
                            echo "Diriger une equipe";
                            echo "</td>";
                        echo "</tr>";
                    }
                    
                    if ($ref['Reference'][$i]['Maitriser de linformatique'] == 1){
                        echo "<tr>";
                            echo "<td class=reponse>";
                            echo "<img src=checkmark.png height=12>";
                            echo "Maitriser de l'informatique";
                            echo "</td>";
                        echo "</tr>";
                    }
                    
                    if ($ref['Reference'][$i]['Savoir dessiner'] == 1){
                        echo "<tr>";
                            echo "<td class=reponse>";
                            echo "<img src=checkmark.png height=12>";
                            echo "Savoir dessiner";
                            echo "</td>";
                        echo "</tr>";
                    }
                    
        
                    if ($ref['Reference'][$i]['Savoir traduire'] == 1){
                        echo "<tr>";
                            echo "<td class=reponse>";
                            echo "<img src=checkmark.png height=12>";
                            echo "Savoir traduire";
                            echo "</td>";
                        echo "</tr>";
                    }

                    if ($ref['Reference'][$i]['Organiser une conference'] == 1){
                        echo "<tr>";
                            echo "<td class=reponse>";
                            echo "<img src=checkmark.png height=12>";
                            echo "Organiser une conference";
                            echo "</td>";
                        echo "</tr>";
                    }

                    if ($ref['Reference'][$i]['Concevoir une formation'] == 1){
                        echo "<tr>";
                            echo "<td class=reponse>";
                            echo "<img src=checkmark.png height=12>";
                            echo "Concevoir une formation";
                            echo "</td>";
                        echo "</tr>";
                    }

                    if ($ref['Reference'][$i]['Trier des donnees'] == 1){
                        echo "<tr>";
                            echo "<td class=reponse>";
                            echo "<img src=checkmark.png height=12>";
                            echo "Trier des données";
                            echo "</td>";
                        echo "</tr>";
                    }

                    if ($ref['Reference'][$i]['Capacite à sorganiser'] == 1){
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

                <div class="bouton">
                    <button type="submit" onclick="Confirmation()" class="bc">Valider</button>
                    <button type="reset" class="br" >Réinitialiser</button>
                </div>   
                
        </form>
        
        <script>
            function Confirmation(){
                //var str= document.getElementById("txt1").value;
                //alert("Demande effectuée");
            }
            function Accueil(){
                document.location.href="../Visiteur.php";
            }
        </script>
    </body>
</html>