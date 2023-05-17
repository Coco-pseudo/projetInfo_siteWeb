<!DOCTYPE html>
<?php 
            //verification des cookies, si cookies, connecter directement
            if($_COOKIE['mail'] != ""){
                setcookie("destination","Co",time()+3600);
                header("Location: Connexion.php");
            }
        ?>
<html>
    <head>
        <meta charset="utf-8">
        <title>Connexion jeune 6.4</title>
        <link rel="icon" type="image/png" href="logo.png">
        <link rel="stylesheet" type="text/css" href="Connexion.css">
    </head>
    
    <header>
        <h1>Pour faire de l'engagement une valeur</h1>
        <image src="logo.png" height="150" onclick="Accueil()"></image>
    </header>
    <body>
        <nav>
            <ul class="nav-links">
                <li><a href="Partenaires.html" class="dark-grey">Partenaires</a></li>
                <li><a href="Connexion.html" class="pink">Connexion</a></li>
            </ul>
        </nav>
        <div id="body">
            <form method="post" action="localhost:8080/Connexion.php">
                Mail :<input type="email" id="mail" required><br>
                Mot de passe :<input type="password" id="mdp" required><br>
                <p>inscription?</p>
                <label for="oui">oui</label>
                <input type="radio" name="indice" value="oui"><br>
                <label for="non">non</label>
                <input type="radio" name="indice" value="non" checked><br>
                <button type="submit" onclick="Submit()">Connexion</button>
                <button type="reset"> réinitialiser</button>
            </form>
            <div id="answer"></div>
        </div>
        <script>
            function Accueil(){
                document.location.href="Visiteur.html";
            }
            function Submit(){
                var mdp = document.getElementById("mdp").value;
                var mail = document.getElementById("mail").value;
                var ans = document.getElementById("answer");
                if(mail == ""){
                    ans.innerHTML = "merci de bien vouloir saisir une adresse mail";
                    return;
                }
                if(mdp == ""){
                    ans.innerHTML = "merci de bien vouloir saisir votre mot de passe";
                    return;
                }
                var insc = document.getElementsByName("indice");
                if (insc[0].checked){
                    insc = 1; //1 veut dire que l'on veut inscrire le nom
                }else{
                    insc = 0; //on n'inscrit pas l'adresse mail
                }
                var ajax = new XMLHttpRequest();
                var liste = new FormData();
                liste.set("mail", mail);
                liste.set("mdp", mdp);
                liste.set("indice", insc);

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
            }
        </script>
    </body>
</html>