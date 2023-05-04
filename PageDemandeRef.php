<DOCTYPE html>


<html>
<!--PROBLEME 

Savoir etre et savoir faire :
    -quelle liste etablir?


-->


<head>
    <title>Demande de Réference</title>
    <link rel ="icon" type="image/png" href="LOGO_ENTETE.PNG"/>
    <style>
    td{
        border : 1px  solid black;
        align-items: center;
    }
    table{
        background-color: white;
    }
    body{
        background-color: pink;
    }
    div.checkbox {
        color:red;
        background-color: blue;
    }
    /*table.centre{
        align-items: center;

    }*/

    </style>
    
</head>

<body>
    <!--<h1>TEST</h1>-->
    <div id="divTable">
        <form method="POST" action="http://localhost/mesTravaux/Projet/PageDemandeBis.php">
            <table  align="center">
                <tr>
                    <td>Description de l'engagement</td>
                    <td><input type="text" name="Descpription"></input> </td>
                </tr>

                <tr>
                    <td>Durée de l'engagement</td>
                    <td><input type="text" name="Durée"></input> </td>
                </tr>

                <tr>
                    <td>Le milieu de l’engagement (association, club de sport, etc.)</td>
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
                <table  align="right">
                    <div class="checkbox">
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
                    </div>

                <tr>
                    <td colspan="2"><button type="submit" onclick="Confirmation()">Valider</button>
                    <button type="reset" >Réinitialiser</button></td>
                </td>
            </table>

        </form>
    </div>

    <script>
        function Confirmation(){
            //var str= document.getElementById("txt1").value;
            //alert("Demande effectuée");
        }
        
    </script>
</body>


</html>