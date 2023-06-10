<?php
if($_COOKIE['verified'] == 1){
    setcookie('verified','',1);
}else{
    setcookie('destination','Jeune/CVPDF.php',time()+3600);
    header('Location: ../Connexion.php');
}
$MailJeune = $_COOKIE['mail']; //doit prendre la valeur du mail du jeune
$Data = "Profil/$MailJeune/Reference.json";
$ref = json_decode(file_get_contents($Data),true); //contient le tableau de refs du jeune
$Data = "Profil/$MailJeune/Profil.json";
$pro = json_decode(file_get_contents($Data),true);// contient le tableau du profil du jeune
$NomJeune = $pro["Profil"][0]["Nom"];
$PrenomJeune = $pro["Profil"][0]["Prenom"];
//création du tableau des références validés, pour ensuite aller chercher celles selectionnés
$tab = [$MailJeune];
for($i = 0; $i<count($ref['Reference']); $i){
    if($ref['Reference'][$i]["verif"] == 2){ //ref validé
        $i++; //le numéro de la ref est 1 de plus que sa case dans le tableau
        if(isset($_POST["ref$i"])){
            array_push($tab,$i);
        }
    }else{
        $i++;
    }
}
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Vos Références - Jeune 6.4</title>
        <link rel="icon" type="image/png" href="logo.png">
        <link rel="stylesheet" type="text/css" href="CVHTML.css">
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
                <li><a href="../Deco.php" class="color3">Déconnexion</a></li>
            </ul>
        </nav>
        <div class="references">
            <h2 style="text-align:center">Livret d'expériences</h2>
            <?php
            $mail=$tab[0];
            $DATA="Profil/$mail/Profil.json";
            $ref = json_decode(file_get_contents($DATA),true);
                echo"<h3 class=nomprenom>";
                echo $ref['Profil'][0]['Nom'];
                echo "  ";
                echo $ref['Profil'][0]['Prenom'];
                echo "</h3>";
            

            
            
            
            $DATA="Profil/$mail/Reference.json";
            $ref = json_decode(file_get_contents($DATA),true);
            $nbref = count($tab)-1;

            for ($i = 1; $i <= $nbref; $i++) {
                
                echo "<h2 class=reftitre >Référence $tab[$i] :</h2>";
                echo "<table class=ref >";
                
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



                echo "<div class=savoir-etre>";
                
                echo "<h2>Savoirs-être :</h2>";
                echo "<div class=sve >";
                
                if ($ref['Reference'][$tab[$i]-1]['Autonome'] == 1){
                    
                        echo "-Autonome-";
                        
                }
                
                if ($ref['Reference'][$tab[$i]-1]['Passionne'] == 1){
                    
                        echo "-Passionné-";
                        
                }
                
                if ($ref['Reference'][$tab[$i]-1]['Reflechi'] == 1){
                    
                        echo "-Réfléchi-";
                        
                }
                
                if ($ref['Reference'][$tab[$i]-1]['Alecoute'] == 1){
                    
                        echo "-A l'écoute-";
                        
                }
                
                if ($ref['Reference'][$tab[$i]-1]['Organise'] == 1){
                    
                        echo "-Organisé-";
                        
                }
                
    
                if ($ref['Reference'][$tab[$i]-1]['Fiable'] == 1){
                    
                        echo "-Fiable-";
                        
                }

                if ($ref['Reference'][$tab[$i]-1]['Patient'] == 1){
                    
                        echo "-Patient-";
                        
                }

                if ($ref['Reference'][$tab[$i]-1]['Responsable'] == 1){
                    
                        echo "-Responsable-";
                        
                }

                if ($ref['Reference'][$tab[$i]-1]['Sociable'] == 1){
                    
                        echo "-Sociable-";
                        
                }

                if ($ref['Reference'][$tab[$i]-1]['Optimiste'] == 1){
                    
                        echo "-Optimiste-";
                        
                }
    
                echo "</div>";
            
            
                echo "</div>";

                echo "<div class=savoir-faire>";
       
            
                echo "<h2>Savoirs-faire :</h2>";
                echo "<div class=svf >";
                
                if ($ref['Reference'][$tab[$i]-1]['Gerer un projet'] == 1){
                    
                        echo "-Gérer un projet-";
                       
                }
                
                if ($ref['Reference'][$tab[$i]-1]['Parler une autre langue'] == 1){
                    
                        echo "-Parler une autre langue-";
                       
                }
                
                if ($ref['Reference'][$tab[$i]-1]['Diriger une equipe'] == 1){
                    
                        echo "-Diriger une equipe-";
                        
                }
                
                if ($ref['Reference'][$tab[$i]-1]['Maitriser de linformatique'] == 1){
                    
                        echo "-Maitriser de l'informatique-";
                        
                }
                
                if ($ref['Reference'][$tab[$i]-1]['Savoir dessiner'] == 1){
                    
                        echo "-Savoir dessiner-";
                        
                }
                
    
                if ($ref['Reference'][$tab[$i]-1]['Savoir traduire'] == 1){
                    
                        echo "-Savoir traduire-";
                       
                }

                if ($ref['Reference'][$tab[$i]-1]['Organiser une conference'] == 1){
                    
                        echo "-Organiser une conference-";
                       
                }

                if ($ref['Reference'][$tab[$i]-1]['Concevoir une formation'] == 1){
                    
                        echo "-Concevoir une formation-";
                        
                }

                if ($ref['Reference'][$tab[$i]-1]['Trier des donnees'] == 1){
                    
                        echo "-Trier des données-";
                        
                }

                if ($ref['Reference'][$tab[$i]-1]['Capacite a sorganiser'] == 1){
                    
                        echo "-Capacité à s'organiser-";
                        
                }
    
                echo "</div>";

                echo "<h2>Commentaire :</h2>";
                echo "<div class=com>";
                if ($ref['Reference'][$tab[$i]-1]['Commentaire'] != ""){
                    echo $ref['Reference'][$tab[$i]-1]['Commentaire'];
                }
                echo "</div>";
            }
            ?>
            </div>
        </div>
        <script>
            function Accueil(){
                document.location.href="../Visiteur.php";
            }
            function Retour(){
                document.location.href="References.php";
            }
        </script>
    </body>
</html>