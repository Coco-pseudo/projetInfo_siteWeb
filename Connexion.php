<?php 



//partie pour test

/*setcookie('mail');
setcookie('mdp');
setcookie('verified');
unset($_COOKIE["verified"]);
setcookie('destination');
unset($_COOKIE['destination']);
unset($_COOKIE['mail']);
unset($_COOKIE['mdp']);
$_POST["mail"] = "mail1@mailbidon.com";
$_POST["mdp"]= "mdp";
$_POST["indice"] = "non";
*/
/*
setcookie('mail','',1);
setcookie('mdp','',1);
unset($_COOKIE['mail']);
unset($_COOKIE['mdp']);
setcookie('mail', 'coco@mailbidon.com', time()+3600 );
setcookie('mdp', 'mdp', time()+3600 );
//echo ("valeur du cookie mail: ".$_COOKIE['mail']."<br>");
//echo ("valeur du cookie mdp: ".$_COOKIE['mdp']."<br>");
*/




//pour rappel, les données sont dans l'ordre mail, mdp, indice avec indice qui vaut 1 si on l'inscrit, 0 sinon
//$_POST['indice']="oui";
$connexion = "PageConnexion.php";
$fentree = fopen("ID.txt","r+");
$res = "";
if($_COOKIE['mail'] == '' && $_POST['mail'] == ''){
    header("Location: $connexion");exit();
    if($_POST['mail'] == ''){
        setcookie('erreur','merci de remplir le champ du mail',time()+3600);
    }
}
$mail; //va contenir le mail actif
$mdp; //va contenir le mdp du mail actif
$type; //va contenir le type d'url a renvoyer (admin ou jeune) du mail actif
if($_COOKIE['mail'] == ""){
    $entree =  [$_POST['mail'], $_POST['mdp'], $_POST['indice']];
}else{
    $entree = [$_COOKIE['mail'], $_COOKIE['mdp'], 0];//le cookie sert a la connexion donc l'indice est forcement 0
}
if($entree[1] == ''){
    setcookie('erreur','merci de bien vouloir remplir le champ de mot de passe',time()+3600);
}
//echo $_COOKIE['mail']."<br>";
//var_dump($entree);
//echo("<br>");
fscanf($fentree, "%s %s", $sortieAdmin, $sortieJeune); //prise de la premiere ligne contenant les urls
$entree[0] = strtolower($entree[0]);
$test = 0;
if($entree[2] == 0){ //on verifie l'utilisateur
    //echo("pas d'inscription <br>");
    while(fscanf($fentree, "%s %s %s", $mail, $mdp, $type) == 3){
        if($entree[0] == $mail){
            $test = $test + 1;
            if($entree[1] == $mdp){
                fclose($fentree);
                if($_COOKIE['mail'] == ""){ //pas de cookies de connexion
                    //echo("pas de cookies <br>");
                    setcookie("mail",$mail,time()+3600);//valable une heure
                    setcookie("mdp",$mdp,time()+3600);//valable une heure
                    if($type== "A"){
                        //echo("sortie admin");
                        setcookie('verified',2,time()+3600);//valable une heure
                        header("Location: $sortieAdmin");exit();
                        //$res = $sortieAdmin;
                    }else{
                        //echo("sortie Jeune");
                        setcookie('verified',1,time()+3600);//valable une heure
                        header("Location: $sortieJeune");exit();
                        //$res = $sortieJeune;
                    }
                }else{ //cookies de connexion
                    //echo("cookies <br>");
                    if($type== "A"){ //profil admin
                        if($_COOKIE['destination'] != ''){
                            if($_COOKIE['destination'] == 'Co'){
                                setcookie('destination');
                                unset($_COOKIE['destination']);
                                setcookie('verified',2,time()+3600);//valable une heure
                                //echo("sortie admin <br>");
                                header("Location: $sortieAdmin");exit();
                            }else{
                                
                                setcookie('verified',2,time()+3600); //verified = 2 ==> admin //valable une heure
                                //echo("sortie destination<br>");
                                header("Location: $_COOKIE[destination]");
                                setcookie('destination');
                                unset($_COOKIE['destination']);
                                exit();
                            }
                            
                        }else{ // l'utilisateur a un cookie admin mais pas de destination
                            setcookie('mail','',1);
                            setcookie('mdp','',1);
                            unset($_COOKIE['mail']);
                            unset($_COOKIE['mdp']);
                            //echo("pas de destination sortie connexion <br>");
                            setcookie("erreur de redirection, temps alloué expiré"); 
                            header("Location: $connexion");exit();
                        }
                    }else{ //profil jeune
                        if($_COOKIE['destination'] != ''){
                            if($_COOKIE['destination'] == 'Co'){
                                setcookie('destination','',1);
                                unset($_COOKIE['destination']);
                                setcookie('verified',1,time()+3600);//valable une heure
                                //echo("sortie jeune<br>");
                                header("Location: $sortieJeune");exit();
                            }else{
                                //echo("sortie destination");
                                setcookie('verified',1,time()+3600); //verified = 1 ==> jeune //valable une heure
                                header("Location: $_COOKIE[destination]");
                                setcookie('destination','',1);
                                unset($_COOKIE['destination']);
                                exit();
                            }
                            
                        }else{ // l'utilisateur a les cookies mais pas de destination
                            setcookie('mail');
                            setcookie('mdp');
                            unset($_COOKIE['mail']);
                            unset($_COOKIE['mdp']);
                            //echo("pas de destination sortie connexion <br>");
                            setcookie("erreur de redirection, temps alloué expiré"); //peu probable que ça arrive :)
                            header("Location: $connexion");exit();
                        }
                    }
                }
                
            }else{ //mdp ne correspond pas au mail
                if($_COOKIE['mail'] != ""){
                    //echo("cookies incorrects <br>");
                    setcookie("mail"); //suppression des cookies de connexion s'ils ne correspondent pas a un resultat
                    setcookie("mdp");
                    unset($_COOKIE['mail']);
                    unset($_COOKIE['mdp']);
                }
                setcookie('erreur','mot de passe incorrect',time()+3600);//valable une heure
                header("Location: $connexion");exit();
                $res = 0;
                //echo("erreur de mdp <br>");
            }
        }
    }
    if($test == 0){
        $res = 0; //aucune correspondance de mail lors de la boucle de parcours
        
    }
}else{
    if($entree[2] == 1){ //on inscrit l'utilisateur
        //tests des données d'entree de l'utilisateur
        $precision = "tout les champs sont requis pour procéder à votre inscription";
        if($_POST['nom'] == ""){
            setcookie('erreur',"Merci de bien vouloir saisir un nom. <br>".$precision,time+3600);
            header("Location: $connexion");exit();
        }
        if($_POST['prenom'] == ""){
            setcookie('erreur',"Merci de bien vouloir saisir un prénom. <br>".$precision,time+3600); 
            header("Location: $connexion");exit();
        }
        if($_POST['date'] == ""){
            setcookie('erreur',"Merci de bien vouloir saisir une date de naissance. <br>".$precision,time+3600);
            header("Location: $connexion");exit();
        }
        if($_POST['mdp2'] == ""){
            setcookie('erreur',"Merci de bien vouloir remplir la verification de mot de passe <br>".$precision,time+3600); //valable une heure
            header("Location: $connexion");exit();
        }else{  // mdp2 n'est pas vide
            if($_POST['mdp'] != $_POST['mdp2']){
                setcookie('erreur',"La \"vérification de mot de passe\" doit contenir le même mot de passe que celui au dessus",time+3600); //valable une heure
                header("Location: $connexion");exit();
            }
        }


        //echo("inscription <br>");
        while(fscanf($fentree,"%s %s %s", $mail, $mdp, $type) == 3){//boucle de verification que le mail n'est pas déjà présent
            if($entree[0] == $mail){
                setcookie('erreur','votre mail fait déjà parti de la base de donnée',time()+3600);//valable une heure
                header("Location: $connexion");exit();
                $res = 0;
                $test =1;
            }
        }
        //echo("<br> $test <br>");
        if($test == 0){
            if(!is_dir("Jeune/Profil")){
                mkdir("Jeune/Profil");
            }
            if(!is_dir("Jeune/Profil/$entree[0]")){//on teste si le dossier du jeune existe déjà (il ne fait pas partie de la liste des mails)
                setcookie('erreur','vous avez un dossier a votre nom sans faire partie de la base de donné, merci de contacter un administrateur',time()+3600);//valable une heure
            }
            mkdir("Jeune/Profil/$entree[0]");
            fprintf($fentree,"%s %s %s\n", $entree[0], $entree[1], "J");
            fclose($fentree);


            //création du dossier du jeune avec $_POST["nom"] $_POST["prenom"] $_POST["date"]
            
            $creationP = fopen("Jeune/Profil/$entree[0]/Profil.Json","w");
            fprintf($creationP," { \"Profil\": [\n{\n\"Nom\": \"%s\",\n\"Prenom\": \"%s\",\n\"Date\": \"%s\",\n\"Mail\": \"%s\"\n}\n]\n}", $_POST["nom"], $_POST["prenom"], $_POST["date"], $entree[0]);
            fclose($creationP);
            
            setcookie("mail",$mail,time()+3600);//valable une heure
            setcookie("mdp",$mdp,time()+3600);//valable une heure
            header("Location: $sortieJeune");exit();
            //echo("sortieJeune");
            //$res = $sortieJeune;
        }
    }else{ //cas où entree[2] ne vaut ni 1 ni 0: valeur incorrecte
        //echo("erreur");
        $res = 0;
    }
}
//echo $res;
////echo $res === "" ? "1" : $res;
$res === "" ? "1" : $res;
//setcookie("codeErreur","$res",time()+3600);
header("Location: $connexion");exit();



?>
