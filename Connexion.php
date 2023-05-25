<?php 



//partie pour test
/*
$_POST["mail"] = "mail1@mailbidon.com";
$_POST["mdp"]= "mdp";
$_POST["indice"] = 0;
*/
/*
setcookie('mail','',1);
setcookie('mdp','',1);
setcookie('mail', 'Mail1@mailbidon.com', time()+3600 );
setcookie('mdp', 'mdp', time()+3600 );
echo ("valeur du cookie mail: ".$_COOKIE['mail']."<br>");
echo ("valeur du cookie mdp: ".$_COOKIE['mdp']."<br>");
*/




//pour rappel, les données sont dans l'ordre mail, mdp, indice avec indice qui vaut 1 si on l'inscrit, 0 sinon

$connexion = "PageConnexion.php";
$fentree = fopen("ID.txt","r+");
$res = "";
$mail; //va contenir le mail actif
$mdp; //va contenir le mdp du mail actif
$type; //va contenir le type d'url a renvoyer (admin ou jeune) du mail actif
if($_POST['mail'] == ""){
    $entree = [$_COOKIE['mail'], $_COOKIE['mdp'], 0]; //le cookie sert a la connexion donc l'indice est forcement 0
}else{
    $entree = [$_POST['mail'], $_POST['mdp'], $_POST['indice']];
}

fscanf($fentree, "%s %s", $sortieAdmin, $sortieJeune); //prise de la premiere ligne contenant les urls
$entree[0] = strtolower($entree[0]);
$test = 0;
if($entree[2] == 0){ //on verifie l'utilisateur
    while(fscanf($fentree, "%s %s %s", $mail, $mdp, $type) == 3){
        if($entree[0] == $mail){
            $test = $test + 1;
            if($entree[1] == $mdp){
                fclose($fentree);
                if($_COOKIE['mail'] == ""){ //pas de cookies de connexion
                    setcookie("mail",$mail,time()+3600);//valable une heure
                    setcookie("mdp",$mdp,time()+3600);//valable une heure
                    if($type== "A"){
                        //header("Location: $sortieAdmin");
                        $res = $sortieAdmin;
                    }else{
                        //header("Location: $sortieJeune");
                        $res = $sortieJeune;
                    }
                }else{ //cookies de connexion
                    if($type== "A"){ //profil admin
                        if($_COOKIE['destination'] != ''){
                            setcookie('destination','',1);
                            setcookie('verified','1',time()+3600);
                            header("Location: $_COOKIE[destination]");
                        }else{ // l'utilisateur a un cookie admin mais pas de destination
                            setcookie('mail','',1);
                            setcookie('mdp','',1);
                            header("Location: $connexion");
                        }
                    }else{ //profil jeune
                        if($_COOKIE['destination'] != ''){
                            setcookie('destination','',1);
                            setcookie('verified','1',time()+3600);
                            header("Location: $_COOKIE[destination]");
                        }else{ // l'utilisateur a les cookies mais pas de destination
                            setcookie('mail','',1);
                            setcookie('mdp','',1);
                            header("Location: $connexion");
                        }
                    }
                }
                
            }else{
                if($_COOKIE['mail'] != ""){
                    setcookie("mail","",1); //suppression des cookies de connexion s'ils ne correspondent pas a un resultat
                    setcookie("mdp","",1);
                    header("Location: $connexion");
                }
                $res = 0;
                //echo("erreur de mdp <br>");
            }
        }
    }
    if($test == 0){
        $res = 0; //aucune correspondance de mail lors de la boucle de parcours
        if($_COOKIE['mail'] == '' && $_POST['mail'] == ''){
            header("Location: $connexion");
        }
    }
}else{
    if($entree[2] == 1){ //on inscrit l'utilisateur
        while(fscanf($fentree,"%s %s %s", $mail, $mdp, $type) == 3){
            if($entree[0] == $mail){
                $res = 0;
                $test =1;
            }
        }
        if($test == 0){
            fprintf($fentree,"%s %s %s\n", $entree[0], $entree[1], "J");
            fclose($fentree);


            //création du dossier du jeune avec $_POST["nom"] $_POST["prenom"] $_POST["date"]
            $creationP = fopen("Profil/$entree[0].JSON","w");
            fprintf($creationP," { \"Profil\": [\n{\n\"Nom\": \"%s\",\n\"Prenom\": \"%s\",\n\"Date\": \"%s\",\n\"Mail\": \"%s\"\n}\n]\n}", $_POST["nom"], $_POST["prenom"], $_POST["date"], $entree[0]);
            fclose($creationP);
            
            setcookie("mail",$mail,time()+3600);//valable une heure
            setcookie("mdp",$mdp,time()+3600);//valable une heure
            //header("Location: $sortieJeune");
            $res = $sortieJeune;
        }
    }else{ //cas où entree[2] ne vaut ni 1 ni 0: valeur incorrecte
        $res = 0;
    }
}
echo $res === "" ? "1" : $res;



?>
