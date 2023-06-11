<?php
if($_COOKIE['verified'] == 1){//l'utilisateur viens de se connecter avec succès
    setcookie('verified','',1);
    unset($_COOKIE["verified"]);
}else{//on verifie l'utilisateur
    setcookie('destination','Jeune/ModifProfil.php',time()+3600);//création d'un cookie representant le chemin depuis le répertoire de connexion.php
    header('Location: ../Connexion.php');
}
setcookie("utilisateur", "jeune", time() + 3600);
$mail=$_COOKIE['mail'];
$DATA='Profil/'.$mail.'/Profil.json';

?>

<!DOCTYPE html>
<html>
    <!-- Comprend le titre de la page et la page css associé -->
    <head>
        <meta charset="utf-8">
        <title>Jeune 6.4</title>
        <link rel="icon" type="image/png" href="logo.png">
        <link rel="stylesheet" type="text/css" href="ModifProfil.css">
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
                <li><a href="Deco.php" class="color3">Déconnexion</a></li>
            </ul>
        </nav>
        <!-- Contenu de la page -->
        <?php
            $ref=json_decode(file_get_contents($DATA),true);
            $nom=$ref['Profil'][0]['Nom'];
            $prenom=$ref['Profil'][0]['Prenom'];
            $date=$ref['Profil'][0]['Date'];
            $email=$ref['Profil'][0]['Mail'];
        ?>

        <div class='formulaires'>
            <table  class='prfl'>
                <tr>
                    <td>Nom</td>
                    <td><input type='text' name='Nom' id="Nom" value="<?php echo $nom; ?>" ></input></td>
                </tr>
                <tr>
                    <td>Prenom</td>
                    <td><input type='text' name='Prenom' id="Prenom" value="<?php echo $prenom; ?>"></input></td>
                </tr>
                <tr>
                    <td>Date de naissance</td>
                    <td><input type='date' name='date' id="Date" value="<?php echo $date; ?>"></input></td>
                </tr>
                <tr >
                    <td colspan=2><button onclick=EnvoiModif() class='boutons'>Modifier</button> <button type='reset' class='boutons'>Supprimer</button></td>
                </tr>  
            </table>
        </div>
        
        <script>
            function Accueil(){
                document.location.href="../Visiteur.php";
            }
            function EnvoiModif(){ //Applique les modification
                var nom = document.getElementById("Nom").value;
                var prenom = document.getElementById("Prenom").value;
                var date = document.getElementById("Date").value;
                if (nom== '' || prenom ==''){
                   alert("Merci de remplir tout les champs");
                }else{
                    var xhr = new XMLHttpRequest();
                    xhr.open("POST", "AlgoModifRef.php", true);
                    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
                    xhr.send("b=5"+"& nom="+escape(nom)+"& prenom="+escape(prenom)+"& date="+escape(date));
                    document.location.href="Jeune.php";
                    xhr.onreadystatechange = function() {
                    if(xhr.readyState == 4 && xhr.status==200) {
                        document.location.href="Jeune.php"; 
                    }
                }                }
            }
        </script>
    </body>
</html>
