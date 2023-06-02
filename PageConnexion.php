<!DOCTYPE html>
<?php 
//var_dump($_COOKIE);exit();
    //verification des cookies, si cookies, connecter directement
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
                    <!--<tr class="inscription">
                        <td>Nom :</td><td><input type="text" id="nom"></td>
                    </tr>
                    <tr class="inscription">
                        <td>Prénom :</td><td><input type="text" id="prenom"></td>
                    </tr>
                    <tr class="inscription">
                        <td>Date de naissance</td><td><input type="date" id="birthday"></td>
                    </tr>-->
                    <tr>
                        <td>Mail :</td><td><input type="email" name="mail" id="mail" required></td>
                    </tr>
                    <tr>
                        <td>Mot de passe :</td><td><input type="password" name="mdp" id="mdp" required></td>
                    </tr>
                    <!--<tr class="inscription">
                        <td>Vérification du mot de passe</td><td><input type="password" id="mdp2"></td>
                    </tr>-->
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
                
            <div id="answer"></div>
        </div>
        <script>
            function visible(){
                if(document.getElementsByClassName("inscription").length != 0){
                    return;
                }else{
                let tab = document.getElementsByClassName("form");
                let tableau = tab[0];
                //let ans = document.getElementById("answer");
                let L1 = document.createElement("tr");
                L1.classList.add("inscription");
                let C1 = document.createElement("td");
                let D1 = document.createElement("td");
                L1.appendChild(C1);
                L1.appendChild(D1);
                C1.textContent = "Nom";
                let F1 = document.createElement("input", type="text", name="nom", id="nom");
                D1.appendChild(F1);
                let L2 = document.createElement("tr");
                L2.classList.add("inscription");
                let C2 = document.createElement("td");
                let D2 = document.createElement("td");
                L2.appendChild(C2);
                L2.appendChild(D2);
                C2.textContent = "Prénom";
                let F2 = document.createElement("input", type="text", name="prenom", id="prenom");
                D2.appendChild(F2);
                let L3 = document.createElement("tr");
                L3.classList.add("inscription");
                let C3 = document.createElement("td");
                let D3 = document.createElement("td");
                L3.appendChild(C3);
                L3.appendChild(D3);
                C3.textContent = "Date de naissance";
                let F3 = document.createElement("input", type="date", name="date", id="birthday");
                D3.appendChild(F3);
                let L4 = document.createElement("tr");
                L4.classList.add("inscription");
                let C4 = document.createElement("td");
                let D4 = document.createElement("td");
                L4.appendChild(C4);
                L4.appendChild(D4);
                C4.textContent = "Vérification de mot de passe";
                let F4 = document.createElement("input", type="password", name="mdp2" , id="mdp2");
                D4.appendChild(F4);
                tableau.appendChild(L4);
                let MailNode = document.getElementByID("mail");
                L3 = tableau.insertBefore(L3,MailNode);
                L2 = tableau.insertBefore(L2,L3);
                tableau.insertBefore(L1,L2);
                //let tab = document.getElementsByClassName("inscription");*/
                /*for(i=0; i<tab.length; i++){
                    tab[i].style.visibility = "visible";
                }*/
                }
                
            }
            function invisible(){
                let Tmp =document.getElementsByClassName("form");
                let Tableau = Tmp[0];
                let tab = document.getElementsByClassName("inscription");
                while(tab.length > 0){
                    tab[0].parentNode.removeChild(tab[0]);
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
