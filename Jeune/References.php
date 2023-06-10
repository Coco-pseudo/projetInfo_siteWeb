<?php
if($_COOKIE['verified'] == 1){//l'utilisateur viens de se connecter avec succès
    setcookie('verified','',1);
    unset($_COOKIE["verified"]);
}else{//on verifie l'utilisateur
    setcookie('destination','Jeune/References.php',time()+3600);//création d'un cookie representant le chemin depuis le répertoire de connexion.php
    header('Location: ../Connexion.php');
}
$mail=$_COOKIE['mail']; //recupère le mail
$DATA="Profil/$mail/Reference.json"; //récupere les données des références
?>
<!DOCTYPE html>
<html>
    <!-- Comprend le titre de la page et la page css associé -->
    <head>
        <meta charset="utf-8">
        <title>Vos Références - Jeune 6.4</title>
        <link rel="icon" type="image/png" href="logo.png">
        <link rel="stylesheet" type="text/css" href="References.css">
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
                <li><a href="Jeune.php" class="color1">Profil</a></li>
                <li><a href="References.php" class="color2">Références</a></li>
                <li><a href="../Deco.php" class="color3">Déconnexion</a></li>
            </ul>
        </nav>
        <!-- Contenu de la page -->
        <div class="references">

            <div class="commentaire">
            <?php
            
            $ref = json_decode(file_get_contents($DATA),true); //recupere les donnees des références
            if ($ref==null){ //vérifie si il existe une reference
                $nbref=0;
            }else{
                $nbref = count($ref['Reference']); // Compte le nombre dde ref pour la boucle
            }
            for ($i = 1; $i <= $nbref; $i++) {
                if ($ref['Reference'][$i-1]['archiver'] == 0){ //vérifie si la référence est archiver
                    echo "<h2>Commentaire $i :</h2>";
                    echo "<div class=com>";
                        if ($ref['Reference'][$i-1]['Commentaire'] != ""){
                            echo $ref['Reference'][$i-1]['Commentaire'];
                        }
                    echo "</div>";
                }
            }
            ?>
            </div>

            <div class="tab">
            <?php
            
            for ($i = 1; $i <= $nbref; $i++) { // Boucle pour créer les tableaux
                if ($ref['Reference'][$i-1]['archiver'] == 0){ // vérifie si la référence est archiver
                    switch ($ref['Reference'][$i-1]['verif'] ){ // Change l'affichage en fonction du statut de la reference
                        case 0 :
                            echo "<h2>";
                            echo "<img src=uncheckmark.png height=14>Référence $i en attente d'envoi :";
                            echo "</h2>";
                            break;
                        case 1 :
                            echo "<h2>";
                            echo "<img src=uncheckmark.png height=14>Référence $i en attente de validation :";
                            echo "</h2>";
                            break;
                        case 2 : 
                            echo "<h2>";
                            echo "<img src=checkmark.png height=14>Référence $i validé :";
                            echo "</h2>";
                            break;
                        default :
                            exit();
                }

                    echo "<table id=$i class=ref >"; //affichage du tableau

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
                    if ($ref['Reference'][$i-1]['verif'] == 0){ //vérifie si la référence est vérifier/envoyer au référent
                    echo"<button onclick=ModifRef($i) class=bt>Modifier la Référence</button><button onclick=EnvoieR($i) class=bt>Envoie au Référent</button>";
                    }
                    echo "<button onclick=Archiver($i) class=bt>Archiver</button></td>";

                    echo "</tr>";
        
                    echo "</table>";
                }
            }
            ?>
            </div>

            <div class="savoir-etre">
            <?php
            
            for ($i = 1; $i <= $nbref; $i++) { // Boucle pour créer les tableaux de savoir-être
                if ($ref['Reference'][$i-1]['archiver'] == 0){ //vérifie si la référence est archiver
                    echo "<h2>Savoirs-être $i :</h2>";
                    echo "<table id=$i class=sve >";
                    
                    if ($ref['Reference'][$i-1]['Autonome'] == 1){ //vérifie si le savoir etre est coché
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
            ?>
            </div>

            <div class="savoir-faire">
            <?php
            
            for ($i = 1; $i <= $nbref; $i++) { // Boucle pour créer les tableaux de savoir-faire
                if ($ref['Reference'][$i-1]['archiver'] == 0){ //vérifie si la référence est archiver
                    echo "<h2>Savoirs-faire $i :</h2>";
                    echo "<table id=$i class=svf >";
                    
                    if ($ref['Reference'][$i-1]['Gerer un projet'] == 1){ //vérifie si le savoir faire est coché
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
                }
            }
            ?>
            </div>

            <div class="bouton">
                <div>
                    <button onclick="Demande()" class="bd">Nouvelle référence</button> <!--Creer une référence -->
                </div>
                <div>
                    <button onclick="CV()" class="bcv">CV</button> <!--Creer un CV -->
                </div>
                <div>
                    <button onclick="EnvoieC()" class="bec">Envoie au Consultant</button> <!--Envoie au Consultant-->
                </div>
                <div>
                    <button onclick="Archive()" class="ba">Archive</button> <!--Accede au Archive-->
                </div>
            </div>

        </div>
        <script>
            function Accueil(){
                document.location.href="../Visiteur.php";
            }
            function Demande(){
                document.location.href="DemandeRef.php"; // Page pour creer une référence
            }
            function CV(){
                document.location.href="CVDemande.php";
            }
            function ModifRef(a){
                alert("Modification de la Réference n°"+a);

                //creation de cookie pour savoir quelle reference modifier(laquelle afficher sur la page suivante)
                
                document.cookie="Reference = "+a;

                //passage vers la page avec le nouveau 'formulaire'

                document.location.href="ModifRef.php"
            }
            function EnvoieR(a){

                //edite le fichier data
                alert("Envoi de la Reference n°"+a);
                
                var xhr = new XMLHttpRequest();
                xhr.open("POST", "AlgoModifRef.php", true);
                xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
                xhr.send("a=" + escape(a) +"& b=3");
                
                document.cookie="numero = "+a ;
                open("MailRef.php");
                
                //code pour mail fonctionnel
                /*var Ajax = new XMLHttpRequest();
                Ajax.open("POST", "MailRef.php", true);
                Ajax.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
                Ajax.send("a=" + escape(a));*/
            }
            function EnvoieC(){
                document.location.href="EnvoieConsul.php"; //Envoie au Consultant
            }
            function Archive(){
                document.location.href="Archive.php"; //Accede au Archive
            }
            function Archiver(a){
                alert("Archivage de la Réference n°"+a);
                
                var xhr = new XMLHttpRequest();
                xhr.open("POST", "AlgoModifRef.php", true);
                xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
                xhr.send("a=" + escape(a) +"& b=1");
                document.location.href="References.php";

            
            }
        </script>
    </body>
</html>
