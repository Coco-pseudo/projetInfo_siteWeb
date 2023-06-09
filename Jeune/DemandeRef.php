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
        <link rel="stylesheet" type="text/css" href="DemandeRef.css">
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

        
        <form method="POST" action="http://localhost:8080/Jeune/PageDemandeBis.php">
                <div class="formulaires">
                    <table  class="ref">
                        <tr>
                            <td>Description de l'engagement</td>
                            <td><input type="text" name="Description" required></input> </td>
                        </tr>
                        <tr>
                            <td>Durée de l'engagement</td>
                            <td><input type="text" name="Durée"required></input> </td>
                        </tr>
                        <tr>
                            <td>Le milieu de l'engagement (association, club de sport, etc.)</td>
                            <td><input type="text" name="milieu"required></input> </td>
                        </tr>
                        <tr>
                            <td>Nom du référent</td>
                            <td><input type="text" name="nomRef"required></input> </td>
                        </tr>
                        <tr>
                            <td>Prénom du référent</td>
                            <td><input type="text" name="prenomRef"required></input> </td>
                        </tr>
                        <tr>
                            <td>Email du référent</td>
                            <td><input type="email" name="EmailRef"required></input> </td>
                        </tr>
                    </table>
                
                    <table class="savoiretre">
                        <tr>
                            <td rowspan="11">"Savoir-être" démontrés pendant l'engagement (max 4)</td>
                        </tr>
                        <tr>
                            <td><input type="checkbox" class="SavoirEtre" name="Autonome" value="Autonome" >Autonome </td>
                        </tr>
                        <tr>
                            <td><input type="checkbox" class="SavoirEtre" name="A_lécoute" value="A_lécoute" >A l’écoute </td>
                        </tr>
                        <tr>
                            <td><input type="checkbox" class="SavoirEtre" name="Organisé" value="Organisé" >Organisé </td>
                        </tr>
                        <tr>
                            <td><input type="checkbox" class="SavoirEtre" name="Passionné" value="Passionné" >Passionné </td>
                        </tr>
                        <tr>
                            <td><input type="checkbox" class="SavoirEtre" name="Fiable" value="Fiable" >Fiable </td>
                        </tr>
                        <tr>
                            <td><input type="checkbox" class="SavoirEtre" name="Patient" value="Patient" >Patient </td>
                        </tr>
                        <tr>
                            <td><input type="checkbox" class="SavoirEtre" name="Réfléchi" value="Réfléchi" >Réfléchi </td>
                        </tr>
                        <tr>
                            <td><input type="checkbox" class="SavoirEtre" name="Responsable" value="Responsable" >Responsable </td>
                        </tr>
                        <tr>
                            <td><input type="checkbox" class="SavoirEtre" name="Sociable" value="Sociable" >Sociable </td>
                        </tr>
                        <tr>
                            <td><input type="checkbox" class="SavoirEtre" name="Optimiste" value="Optimiste" >Optimiste </td>
                        </tr>
                    </table>
                    <table class="savoirfaire">
                        <tr>
                            <td rowspan="11">"Savoir-faire" démontrés pendant l'engagement (max 4)</td></tr>
                        <tr>
                            <td><input type="checkbox" class="SavoirFaire" name="GestionProjet" value="GestionProjet" >Gérer un projet </td>
                        </tr>
                        <tr>
                            <td><input type="checkbox" class="SavoirFaire" name="AutreLangue" value="AutreLangue" >Parler une autre langue </td>
                        </tr>
                        <tr>
                            <td><input type="checkbox" class="SavoirFaire" name="GererEquipe" value="GererEquipe" >Diriger une équipe </td>
                        </tr>
                        <tr>
                            <td><input type="checkbox" class="SavoirFaire" name="Informatique" value="Informatique" >Maitrise de l'informatique </td>
                        </tr>
                        <tr>
                            <td><input type="checkbox" class="SavoirFaire" name="Dessin" value="Dessin" >Savoir Dessiner </td>
                        </tr>
                        <tr>
                            <td><input type="checkbox" class="SavoirFaire" name="Traduction" value="Traduction" >Savoir Traduire </td>
                        </tr>
                        <tr>
                            <td><input type="checkbox" class="SavoirFaire" name="OrgaConf" value="OrgaConf" >Organiser une conférence </td>
                        </tr>
                        <tr>
                            <td><input type="checkbox" class="SavoirFaire" name="ConcevoirFormation" value="ConcevoirFormation" >Concevoir une Formation </td>
                        </tr>
                        <tr>
                            <td><input type="checkbox" class="SavoirFaire" name="TrierDonnées" value="TrierDonnées" >Trier des données </td>
                        </tr>
                        <tr>
                            <td><input type="checkbox" class="SavoirFaire" name="CapaciteOrganisation" value="CapaciteOrganisation" >Capacité à s'organiser </td>
                        </tr>
                    </table>
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