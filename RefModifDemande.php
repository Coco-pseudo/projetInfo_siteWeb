<?php
    session_start();
    $tab=$_SESSION["dataR"];
    $mail=$tab[0];
    $DATA="Jeune/Profil/$mail/Reference.json";
    setcookie($utilisateur, "Referent", time() + 180);
    
    
    
    $i=$tab[1]-1;
    $j=$tab[1];
?>




<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Jeune 6.4</title>
        <link rel="icon" type="image/png" href="logo.png">
        <link rel="stylesheet" type="text/css" href="RefModifDemande.css">
    </head>
    
    <header>
        <h1>Pour faire de l'engagement une valeur</h1>
        <image src="logo.png" height="150" onclick="Accueil()"></image>
    </header>
    <body>
        <nav>
            <ul class="nav-links">
                <li><a href="RefJeune.php" class="color1">Profil du jeune</a></li>
                <li><a href="RefDemande.php" class="color2">Référence de jeune</a></li>
                
            </ul>
        </nav>

        <?php


        $ref = json_decode(file_get_contents($DATA),true);
        $Description=$ref['Reference'][$i]['Description'];
        $Duree=$ref['Reference'][$i]['Duree'];
        $milieu=$ref['Reference'][$i]['milieu'];
        $nomRef=$ref['Reference'][$i]['nomRef'];
        $prenomRef=$ref['Reference'][$i]['prenomRef'];
        $EmailRef=$ref['Reference'][$i]['EmailRef'];
        $Commentaire=$ref['Reference'][$i]['Commentaire'];
        ?>
        
        <div class="formulaires">
            <table  class="ref">
                <tr>
                    <td>Description de l'engagement</td>
                    <td><input type="text" name="Description" id='description' value="<?php echo $Description; ?>" ></input> </td>
                </tr>
                <tr>
                    <td>Durée de l'engagement</td>
                    <td><input type="text" name="Durée" id='duree' value="<?php echo $Duree; ?>" ></input> </td>
                </tr>
                <tr>
                    <td>Le milieu de l'engagement (association, club de sport, etc.)</td>
                    <td><input type="text" name="milieu" id='milieu' value="<?php echo $milieu; ?>" ></input> </td>
                </tr>
                <tr>
                    <td>Nom du référent</td>
                    <td><input type="text" name="nomRef" id='nomRef' value="<?php echo $nomRef; ?>"></input> </td>
                </tr>
                <tr>
                    <td>Prénom du référent</td>
                    <td><input type="text" name="prenomRef" id='prenomRef' value="<?php echo $prenomRef; ?>"></input> </td>
                </tr>
                <tr>
                    <td>Email du référent</td>
                    <td><input type="email" name="EmailRef" id='EmailRef' value="<?php echo $EmailRef; ?>" ></input> </td>
                </tr>
            </table>
        
               
            <div class="savoir-etre">
                <?php
                $ref = json_decode(file_get_contents($DATA),true);
                echo "<h2>Savoirs-être  :</h2>";
                echo "<table id=$i class=sve >";
                
                if ($ref['Reference'][$i]['Autonome'] == 1){
                    echo "<tr>";
                        echo "<td><input type=checkbox class='SavoirEtre' id='Autonome' name=Autonome value=Autonome checked >Autonome </td>";
                    echo "</tr>";
                }else{
                    echo "<tr>";
                    echo "<td><input type=checkbox class='SavoirEtre' id='Autonome' name=Autonome value=Autonome >Autonome </td>";
                echo "</tr>";
                }

                if ($ref['Reference'][$i]['Passionne'] == 1){
                    echo "<tr>";
                        echo "<td><input type=checkbox class='SavoirEtre' id='Passionne' name=Passionne value=Passionne checked >Passionné(e) </td>";
                    echo "</tr>";
                }else{
                    echo "<tr>";
                    echo "<td><input type=checkbox class='SavoirEtre' id='Passionne' name=Passionne value=Passionne >Passionné(e) </td>";
                echo "</tr>";
                }
                
                if ($ref['Reference'][$i]['Reflechi'] == 1){
                    echo "<tr>";
                        echo "<td><input type=checkbox class='SavoirEtre' id='Reflechi' name=Reflechi value=Reflechi checked >Reflechi(e) </td>";
                    echo "</tr>";
                }else{
                    echo "<tr>";
                    echo "<td><input type=checkbox class='SavoirEtre' id='Reflechi' name=Reflechi value=Reflechi >Reflechi(e) </td>";
                echo "</tr>";
                }

                if ($ref['Reference'][$i]['Alecoute'] == 1){
                    echo "<tr>";
                        echo "<td><input type=checkbox class='SavoirEtre' id='Alecoute' name=Alecoute value=Alecoute checked >A l'écoute </td>";
                    echo "</tr>";
                }else{
                    echo "<tr>";
                    echo "<td><input type=checkbox class='SavoirEtre' id='Alecoute' name=Alecoute value=Alecoute >A l'écoute </td>";
                echo "</tr>";
                }

                if ($ref['Reference'][$i]['Organise'] == 1){
                    echo "<tr>";
                        echo "<td><input type=checkbox class='SavoirEtre' id='Organise' name=Organise value=Organise checked >Organisé(e) </td>";
                    echo "</tr>";
                }else{
                    echo "<tr>";
                    echo "<td><input type=checkbox class='SavoirEtre' id='Organise' name=Organise value=Organise >Organisé(e) </td>";
                echo "</tr>";
                }

                if ($ref['Reference'][$i]['Fiable'] == 1){
                    echo "<tr>";
                        echo "<td><input type=checkbox class='SavoirEtre' id='Fiable' name=Fiable value=Fiable checked >Fiable </td>";
                    echo "</tr>";
                }else{
                    echo "<tr>";
                    echo "<td><input type=checkbox class='SavoirEtre' id='Fiable' name=Fiable value=Fiable >Fiable </td>";
                echo "</tr>";
                }

                if ($ref['Reference'][$i]['Patient'] == 1){
                    echo "<tr>";
                        echo "<td><input type=checkbox class='SavoirEtre' id='Patient' name=Patient value=Patient checked >Patient(e) </td>";
                    echo "</tr>";
                }else{
                    echo "<tr>";
                    echo "<td><input type=checkbox class='SavoirEtre' id='Patient' name=Patient value=Patient >Patient(e) </td>";
                echo "</tr>";
                }

                if ($ref['Reference'][$i]['Responsable'] == 1){
                    echo "<tr>";
                        echo "<td><input type=checkbox class='SavoirEtre' id='Responsable' name=Responsable value=Responsable checked >Responsable </td>";
                    echo "</tr>";
                }else{
                    echo "<tr>";
                    echo "<td><input type=checkbox class='SavoirEtre' id='Responsable' name=Responsable value=Responsable >Responsable </td>";
                echo "</tr>";
                }

                if ($ref['Reference'][$i]['Sociable'] == 1){
                    echo "<tr>";
                        echo "<td><input type=checkbox class='SavoirEtre' id='Sociable' name=Sociable value=Sociable checked >Sociable </td>";
                    echo "</tr>";
                }else{
                    echo "<tr>";
                    echo "<td><input type=checkbox class='SavoirEtre' id='Sociable' name=Sociable value=Sociable >Sociable </td>";
                echo "</tr>";
                }

                if ($ref['Reference'][$i]['Optimiste'] == 1){
                    echo "<tr>";
                        echo "<td><input type=checkbox class='SavoirEtre' id='Optimiste' name=Autonome value=Optimiste checked >Optimiste </td>";
                    echo "</tr>";
                }else{
                    echo "<tr>";
                    echo "<td><input type=checkbox class='SavoirEtre' id='Optimiste' name=Autonome value=Optimiste >Optimiste </td>";
                echo "</tr>";
                }

                
    
                echo "</table>";
                ?>
            </div>

            <div class="savoir-faire">
                <?php
                $ref = json_decode(file_get_contents($DATA),true);
                $nbref = count($ref['Reference']);
            
                echo "<h2>Savoirs-faire  :</h2>";
                echo "<table id=$i class=svf >";
                
                
                if ($ref['Reference'][$i]['Gerer un projet'] == 1){
                    echo "<tr>";
                        echo "<td><input type=checkbox class='SavoirFaire' id='Gererunprojet' value=Gererunprojet checked >Gerer un projet </td>";
                    echo "</tr>";
                }else{
                    echo "<tr>";
                    echo "<td><input type=checkbox class='SavoirFaire' id='Gererunprojet' value=Gererunprojet >Gerer un projet </td>";
                echo "</tr>";
                }

                if ($ref['Reference'][$i]['Parler une autre langue'] == 1){
                    echo "<tr>";
                        echo "<td><input type=checkbox class='SavoirFaire' id=Parleruneautrelangue value=Parleruneautre langue checked >Parler une autre langue </td>";
                    echo "</tr>";
                }else{
                    echo "<tr>";
                    echo "<td><input type=checkbox class='SavoirFaire' id=Parleruneautrelangue value=Parleruneautrelangue >Parler une autre langue </td>";
                echo "</tr>";
                }
                
                if ($ref['Reference'][$i]['Diriger une equipe'] == 1){
                    echo "<tr>";
                        echo "<td><input type=checkbox class='SavoirFaire' id=Dirigeruneequipe value=Dirigeruneequipe checked >Diriger une equipe </td>";
                    echo "</tr>";
                }else{
                    echo "<tr>";
                    echo "<td><input type=checkbox class='SavoirFaire' id=Dirigeruneequipe value=Dirigeruneequipe >Diriger une equipe </td>";
                echo "</tr>";
                }

                if ($ref['Reference'][$i]['Maitriser de linformatique'] == 1){
                    echo "<tr>";
                        echo "<td><input type=checkbox class='SavoirFaire' id=Maitriserdelinformatique value=Maitriserdelinformatique checked >Maitriser de l'informatique </td>";
                    echo "</tr>";
                }else{
                    echo "<tr>";
                    echo "<td><input type=checkbox class='SavoirFaire' id=Maitriserdelinformatique value=Maitriserdelinformatique >Maitriser de l'informatique </td>";
                echo "</tr>";
                }

                if ($ref['Reference'][$i]['Savoir dessiner'] == 1){
                    echo "<tr>";
                        echo "<td><input type=checkbox class='SavoirFaire' id=Savoirdessiner value=Savoirdessiner checked >Savoir dessiner </td>";
                    echo "</tr>";
                }else{
                    echo "<tr>";
                    echo "<td><input type=checkbox class='SavoirFaire' id=Savoirdessiner value=Savoirdessiner >Savoir dessiner </td>";
                echo "</tr>";
                }

                if ($ref['Reference'][$i]['Savoir traduire'] == 1){
                    echo "<tr>";
                        echo "<td><input type=checkbox class='SavoirFaire' id=Savoirtraduire value=Savoirtraduire checked >Savoir traduire </td>";
                    echo "</tr>";
                }else{
                    echo "<tr>";
                    echo "<td><input type=checkbox class='SavoirFaire' id=Savoirtraduire value=Savoirtraduire >Savoir traduire </td>";
                echo "</tr>";
                }

                if ($ref['Reference'][$i]['Organiser une conference'] == 1){
                    echo "<tr>";
                        echo "<td><input type=checkbox class='SavoirFaire' id=Organiseruneconference value=Organiser une conference checked >Organiser une conference </td>";
                    echo "</tr>";
                }else{
                    echo "<tr>";
                    echo "<td><input type=checkbox class='SavoirFaire' id=Organiseruneconference value=Organiseruneconference >Organiser une conference </td>";
                echo "</tr>";
                }

                if ($ref['Reference'][$i]['Concevoir une formation'] == 1){
                    echo "<tr>";
                        echo "<td><input type=checkbox class='SavoirFaire' id=Concevoiruneformation value=Concevoiruneformation checked >Concevoir une formation </td>";
                    echo "</tr>";
                }else{
                    echo "<tr>";
                    echo "<td><input type=checkbox class='SavoirFaire' id=Concevoiruneformation value=Concevoiruneformation >Concevoir une formation </td>";
                echo "</tr>";
                }

                if ($ref['Reference'][$i]['Trier des donnees'] == 1){
                    echo "<tr>";
                        echo "<td><input type=checkbox class='SavoirFaire' id=Trierdesdonnees value=Trierdesdonnees checked >Trier des donnees </td>";
                    echo "</tr>";
                }else{
                    echo "<tr>";
                    echo "<td><input type=checkbox class='SavoirFaire' id=Trierdesdonnees value=Trierdesdonnees >Trier des donnees </td>";
                echo "</tr>";
                }

                if ($ref['Reference'][$i]['Capacite a sorganiser'] == 1){
                    echo "<tr>";
                        echo "<td><input type=checkbox class='SavoirFaire' id=Capaciteàsorganiser value=Capaciteàsorganiser checked >Capacite à sorganiser </td>";
                    echo "</tr>";
                }else{
                    echo "<tr>";
                    echo "<td><input type=checkbox class='SavoirFaire' id=Capaciteàsorganiser value=Capaciteàsorganiser >Capacite à sorganiser </td>";
                echo "</tr>";
                }
    
                echo "</table>";
                ?>
            </div>
            <div class='Commentaire:'>
                <br>Commentaire
                <input type='text' id ='Commentaire' value ="<?php echo $Commentaire; ?>" ></input>
            </div>
        </div>

            <div class="bouton">
                <button  onclick="Confirmation(<?php echo ($j); ?>)" class="bc">Valider</button>
                <button type="reset" onclick="Reinitialiser()" class="br" >Réinitialiser</button>
            </div>   
                
       
        
        <script>
            function Reinitialiser(){
                document.location.href="RefModifDemande.php";
            }
            function Confirmation(a){
                var description = document.getElementById("description").value;
                var duree = document.getElementById("duree").value;
                var milieu = document.getElementById("milieu").value;
                var nomRef = document.getElementById("nomRef").value;
                var prenomRef = document.getElementById("prenomRef").value;
                var EmailRef = document.getElementById("EmailRef").value;
                var Commentaire = document.getElementById("Commentaire").value; 


                chaine1="& Description="+escape(description)+"& duree="+escape(duree)+"& milieu="+escape(milieu)+"& nomRef="+escape(nomRef)+"& prenomRef="+escape(prenomRef)+"& EmailRef="+escape(EmailRef)+"& Commentaire="+escape(Commentaire);
                
                //bloc savoirEtre-----------------



                var SavoirEtre=[];
                
                SavoirEtre[0]=document.getElementById("Autonome").checked;
                SavoirEtre[1]=document.getElementById("Passionne").checked;
                SavoirEtre[2]=document.getElementById("Reflechi").checked;  
                SavoirEtre[3]=document.getElementById("Alecoute").checked;
                SavoirEtre[4]=document.getElementById("Organise").checked;
                SavoirEtre[5]=document.getElementById("Fiable").checked;
                SavoirEtre[6]=document.getElementById("Patient").checked;
                SavoirEtre[7]=document.getElementById("Responsable").checked;
                SavoirEtre[8]=document.getElementById("Sociable").checked;
                SavoirEtre[9]=document.getElementById("Optimiste").checked;
                //attention les SavoirEtre[i] sont de la forme true/false jusqu'ici
                
                var i=0;
                for (i=0;i<10;i++){         // met les SAvoirEtre sous forme de 0/1 
                    if (SavoirEtre[i]==false){
                        SavoirEtre[i]=0;
                    }else if (SavoirEtre[i]==true){
                        SavoirEtre[i]=1;
                    }
                }

                var chaineSE="& Autonome="+escape(SavoirEtre[0])+"& Passionne="+escape(SavoirEtre[1])+"& Reflechi="+escape(SavoirEtre[2])+"& Alecoute="+escape(SavoirEtre[3])+
                "& Organise="+escape(SavoirEtre[4])+"& Fiable="+escape(SavoirEtre[5])+"& Patient="+escape(SavoirEtre[6])+"& Responsable="+escape(SavoirEtre[7])+
                "& Sociable="+escape(SavoirEtre[8])+"& Optimiste="+escape(SavoirEtre[9]);



                //-------bloc SavoirFaire-----------
                var SavoirFaire=[];

                SavoirFaire[0]=document.getElementById("Gererunprojet").checked;
                SavoirFaire[1]=document.getElementById("Parleruneautrelangue").checked;
                SavoirFaire[2]=document.getElementById("Dirigeruneequipe").checked;  
                SavoirFaire[3]=document.getElementById("Maitriserdelinformatique").checked;
                SavoirFaire[4]=document.getElementById("Savoirdessiner").checked;
                SavoirFaire[5]=document.getElementById("Savoirtraduire").checked;
                SavoirFaire[6]=document.getElementById("Organiseruneconference").checked;
                SavoirFaire[7]=document.getElementById("Concevoiruneformation").checked;
                SavoirFaire[8]=document.getElementById("Trierdesdonnees").checked;
                SavoirFaire[9]=document.getElementById("Capaciteàsorganiser").checked;

                var j=0;
                for (j=0;j<10;j++){         // met les SAvoirEtre sous forme de 0/1 
                    if (SavoirFaire[j]==false){
                        SavoirFaire[j]=0;
                    }else if (SavoirFaire[j]==true){
                        SavoirFaire[j]=1;
                    }
                }
                var chaineSF="& Gererunprojet="+escape(SavoirFaire[0])+"& Parleruneautrelangue="+escape(SavoirFaire[1])+"& Dirigeruneequipe="+escape(SavoirFaire[2])+"& Maitriserdelinformatique="+escape(SavoirFaire[3])+
                "& Savoirdessiner="+escape(SavoirFaire[4])+"& Savoirtraduire="+escape(SavoirFaire[5])+"& Organiseruneconference="+escape(SavoirFaire[6])+"& Concevoiruneformation="+escape(SavoirFaire[7])+
                "& Trierdesdonnees="+escape(SavoirFaire[8])+"& Capaciteàsorganiser="+escape(SavoirFaire[9]);

                //-----------------verif champ non vide---------------


                if (description=="" || duree=="" || milieu=="" || nomRef=="" || prenomRef=="" || EmailRef==""){
                    alert("Merci de remplir tout les champs");
                }else{


                    var xhr = new XMLHttpRequest();
                    xhr.open("POST", "Jeune/AlgoModifRef.php", true);
                    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
                    xhr.send("b=6"+"&a="+a+chaine1+chaineSE+chaineSF);
                    document.location.href="RefDemande.php";
                    alert("modification enregistrée");
                }
            }
            
            function Accueil(){
                document.location.href="../Visiteur.php";
            }

            //Empécher selectionner plus que 4 savoir etre
            var checks = document.querySelectorAll(".SavoirEtre");
            var max1 = 4;
            for (var i = 0; i < checks.length; i++)
                checks[i].onclick = selectiveCheck1;
            function selectiveCheck1 (event) {
                var checkedChecks = document.querySelectorAll(".SavoirEtre:checked");
                if (checkedChecks.length >= max1 + 1)
                    return false;
            }


            //Empécher selectionner plus que 4 savoir etre
            var checks = document.querySelectorAll(".SavoirFaire");
            var max2 = 4;
            for (var i = 0; i < checks.length; i++)
                checks[i].onclick = selectiveCheck2;
            function selectiveCheck2 (event) {
                var checkedChecks = document.querySelectorAll(".SavoirFaire:checked");
                if (checkedChecks.length >= max2 + 1)
                    return false;
            }
        </script>
    </body>
</html>


