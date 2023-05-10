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
                <li><a href="Profil.html" class="color1">Profil</a></li>
                <li><a href="References.php" class="color2">Références</a></li>
            </ul>
        </nav>

        
            <form method="POST" action="http://localhost:8080/PageDemandeBis.php">
                <div class="formulaires">
                    <table  class="ref">
                        <tr>
                            <td>Description de l'engagement</td>
                            <td><input type="text" name="Description"></input> </td>
                        </tr>
                        <tr>
                            <td>Durée de l'engagement</td>
                            <td><input type="text" name="Durée"></input> </td>
                        </tr>
                        <tr>
                            <td>Le milieu de l'engagement (association, club de sport, etc.)</td>
                            <td><input type="text" name="milieu"></input> </td>
                        </tr>
                        <tr>
                            <td>Nom du référent</td>
                            <td><input type="text" name="nomRef"></input> </td>
                        </tr>
                        <tr>
                            <td>Prénom du référent</td>
                            <td><input type="text" name="prenomRef"></input> </td>
                        </tr>
                        <tr>
                            <td>Email du référent</td>
                            <td><input type="email" name="EmailRef"></input> </td>
                        </tr>
                    </table>
                
                    <table class="savoir">
                        <tr>
                            <td rowspan="11">"Savoir-être" démontrés pendant l'engagement</td>
                            <td><input type="checkbox" name="SavoirEtre" value="Autonome" >Autonome </td>
                        </tr>
                        <tr>
                            <td><input type="checkbox" name="SavoirEtre" value="AnalyseSynthese" >Capable d’analyse et de synthèse </td>
                        </tr>
                        <tr>
                            <td><input type="checkbox" name="SavoirEtre" value="A_lécoute" >A l’écoute </td>
                        </tr>
                        <tr>
                            <td><input type="checkbox" name="SavoirEtre" value="Organisé" >Organisé </td>
                        </tr>
                        <tr>
                            <td><input type="checkbox" name="SavoirEtre" value="Passionné" >Passionné </td>
                        </tr>
                        <tr>
                            <td><input type="checkbox" name="SavoirEtre" value="Fiable" >Fiable </td>
                        </tr>
                        <tr>
                            <td><input type="checkbox" name="SavoirEtre" value="Patient" >Patient </td>
                        </tr>
                        <tr>
                            <td><input type="checkbox" name="SavoirEtre" value="Réfléchi" >Réfléchi </td>
                        </tr>
                        <tr>
                            <td><input type="checkbox" name="SavoirEtre" value="Responsable" >Responsable </td>
                        </tr>
                        <tr>
                            <td><input type="checkbox" name="SavoirEtre" value="Sociable" >Sociable </td>
                        </tr>
                        <tr>
                            <td><input type="checkbox" name="SavoirEtre" value="Optimiste" >Optimiste </td>
                        </tr>
                        <tr>
                            <td colspan="2"><button type="submit" onclick="Confirmation()">Valider</button>
                            <button type="reset" >Réinitialiser</button></td>
                        </tr>
                    </table>
                </div>
            </form>
        
        <script>
            function Confirmation(){
                //var str= document.getElementById("txt1").value;
                //alert("Demande effectuée");
            }
            function Accueil(){
                document.location.href="Jeune.html";
            }
        </script>
    </body>
</html>