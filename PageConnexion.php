<!DOCTYPE html>
<?php 
    if($_COOKIE['mail'] != ""){
        setcookie("destination","Co",time()+3600);
        header("Location: Connexion.php");exit();
    }
?>
<html>
    <head>
        <meta charset="utf-8">
        <title>Connexion - Jeune 6.4</title>
        <link rel="icon" type="image/png" href="logo.png">
        <link rel="stylesheet" type="text/css" href="PageConnexion.css">
    </head>
    
    
    <body>
        <header>
            <h1>Pour faire de l'engagement une valeur</h1>
            <image src="logo.png" height="150" onclick="Accueil()"></image>
        </header>
        <nav>
            <ul class="nav-links">
                <li><a href="Partenaires.html" class="color1">Partenaires</a></li>
                <li><a href="PageConnexion.php" class="color2">Connexion</a></li>
            </ul>
        </nav>
        <div class="body">
            <form method="post" action="Connexion.php">
                <table class="form">
                    <tr class="inscription invisible">
                        <td>Nom :</td><td><input type="text" name="nom" id="nom"></td>
                    </tr>
                    <tr class="inscription invisible">
                        <td>Prénom :</td><td><input type="text" name="prenom" id="prenom"></td>
                    </tr>
                    <tr class="inscription invisible">
                        <td>Date de naissance</td><td><input type="date" name="date" id="birthday"></td>
                    </tr>
                    <tr>
                        <td>Mail :</td><td><input type="email" name="mail" id="mail" required></td>
                    </tr>
                    <tr>
                        <td>Mot de passe :</td><td><input type="password" name="mdp" id="mdp" required></td>
                    </tr>
                    <tr class="inscription invisible">
                        <td>Vérification du mot de passe</td><td><input type="password" name="mdp2" id="mdp2"></td>
                    </tr>
                    <tr>
                        <td colspan="2" id="FullRow">inscription?</td>
                    </tr>
                    <tr>
                        <td><label for="1">oui</label><input type="radio" name="indice" value="1" onclick="visible()"></td>
                        <td><label for="0">non</label><input type="radio" name="indice" value="0" checked onclick="invisible()"></td>
                    </tr>
                    <tr>
                        <td><button type="submit">Connexion</button></td>
                        <td><button type="reset" onclick="invisible()"> réinitialiser</button></td>
                    </tr>
                </table>
            </form>
                
            <div id="answer"><?php 
            //affichage d'un code d'erreur si l'utilisateur en a un
            if(isset($_COOKIE['erreur'])){
                echo($_COOKIE['erreur']);
                setcookie('erreur'); //suppression du message d'erreur après utilisation
                unset($_COOKIE['erreur']);
            }
            
            ?></div>
        </div>
        <script>
            function visible(){ // retire la classe invisible aux elements de l'inscription
                let Tableau =document.getElementsByClassName("form")[0];
                let tab = Tableau.getElementsByClassName("inscription");
                for(let i=0;i<tab.length; i++){
                    tab[i].classList.remove("invisible");
                }
                
            }
            function invisible(){ //ajout de la classe invisible aux elements d'inscription si ils ne l'on pas déjà
                let Tmp =document.getElementsByClassName("form");
                let Tableau = Tmp[0];
                let tab = Tableau.getElementsByClassName("inscription");
                for(let i=0;i<tab.length; i++){
                    tab[i].classList.add("invisible");
                }
            }
            function Accueil(){
                document.location.href="Visiteur.php";
            }
        </script>
    </body>
</html>
