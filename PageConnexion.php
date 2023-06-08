<!DOCTYPE html>
<?php 
//var_dump($_COOKIE);exit();
    //verification des cookies, si cookies, connecter directement
    //setcookie('erreur','message test',time()+3600);
    if($_COOKIE['mail'] != ""){
        //setcookie('mail','',1);
        //setcookie('mdp','',1);
        //var_dump($_COOKIE);exit();
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
                        <td><label for="oui">oui</label><input type="radio" name="indice" value="1" onclick="visible()"></td>
                        <td><label for="non">non</label><input type="radio" name="indice" value="0" checked onclick="invisible()"></td>
                    </tr>
                    <tr>
                        <td><button type="submit">Connexion</button></td>
                        <td><button type="reset" onclick="invisible()"> réinitialiser</button></td>
                    </tr>
                </table>
            </form>
                
            <div id="answer"><?php 
            if(count($_COOKIE) == 1){
               if($_COOKIE['erreur']!= null){
                    echo($_COOKIE['erreur']);
                    setcookie('erreur');
                    unset($_COOKIE['erreur']);
                } 
            }
            
            ?></div>
        </div>
        <script>
            function visible(){
                let Tableau =document.getElementsByClassName("form")[0];
                let tab = Tableau.getElementsByClassName("inscription");
                for(let i=0;i<tab.length; i++){
                    tab[i].classList.remove("invisible");
                }
                
            }
            function invisible(){
                let Tmp =document.getElementsByClassName("form");
                let Tableau = Tmp[0];
                let tab = Tableau.getElementsByClassName("inscription");
                for(let i=0;i<tab.length; i++){
                    tab[i].classList.add("invisible");
                }
                /*for(i=0; i<tab.length; i++){
                    //tab[i].style.visibility = "hidden";
                }*/
            }
            function Accueil(){
                document.location.href="Visiteur.php";
            }/*
            function Submit(){
                var mdp = document.getElementById("mdp").value;
                var mail = document.getElementById("mail").value;
                let ans = document.getElementById("answer");

                if(mail == ""){
                    ans.innerHTML = "merci de bien vouloir saisir une adresse mail";
                    return;
                }
                if(mdp == ""){
                    ans.innerHTML = "merci de bien vouloir saisir votre mot de passe";
                    return;
                }
                //creation de la variable qui sera envoyé a connexion.php
                var ajax = new XMLHttpRequest();
                var liste = new FormData();
                liste.set("mail", mail);
                liste.set("mdp", mdp);

                var insc = document.getElementsByName("indice");

                if (insc[0].checked){
                    insc = 1; //1 veut dire que l'on veut inscrire le nom
                    //recuperation de tout les elements du form
                    var nom = document.getElementById("nom").value;
                    var prenom = document.getElementById("prenom").value;
                    var date = document.getElementById("birthday").value;
                    var mdp2 = document.getElementById("mdp2").value;
                    //verification de tout les champs
                    var precision = "Tout les champs sont requis pour procéder à votre inscription";
                    if(nom == ""){
                        ans.innerHTML = "Merci de bien vouloir saisir un nom. <br>".precision;
                        return;
                    }
                    if(prenom == ""){
                        ans.innerHTML = "Merci de bien vouloir saisir un prénom. <br>".precision;
                        return;
                    }
                    if(date == ""){
                        ans.innerHTML = "Merci de bien vouloir saisir une date de naissance. <br>".precision;
                        return;
                    }
                    if(mdp2 == ""){
                        ans.innerHTML = "Merci de bien vouloir saisir un nom. <br>".precision;
                        return;
                    }else{  // mdp2 n'est pas vide
                        if(mdp != mdp2){
                            ans.innerHTML = "La \"vérification de mot de passe\" doit contenir le même mot de passe que celui au dessus";
                            return;
                        }
                    }
                    //ajout de tout les nouveaux éléments a liste
                    liste.set("nom", nom);
                    liste.set("prenom", prenom);
                    liste.set("date", date);
                }else{
                    insc = 0; //on n'inscrit pas l'adresse mail
                }
                
                liste.set("indice", insc);
                //requete ajax
                ajax.onreadystatechange = function (){
                    if(this.readyState == ajax.DONE ){
                        if(this.status == 200){
                            if(this.responseText == 0){
                                if(insc == 0){
                                    ans.innerHTML = "mdp/mail incorrect ou non enregistré";
                                }else{//cas où insc ==1
                                    ans.innerHTML = "adresse mail déjà utilisé, inscription invalide";
                                }
                            }else{
                                if(this.responseText == 1){
                                    alert("erreur inconnue");
                                }else{
                                    document.location.href=this.responseText;
                                }
                            }
                        }else{
                            ans.innerHTML = "erreur de la requete";
                        }
                    }
                }
                ajax.open("POST", "Connexion.php", true);
                //ajax.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
                ajax.send(liste);
            }*/
        </script>
    </body>
</html>
