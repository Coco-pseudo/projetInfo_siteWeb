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
echo ("valeur du cookie mail: ".$_COOKIE['mail']."<br>");
echo ("valeur du cookie mdp: ".$_COOKIE['mdp']."<br>");
*/




//pour rappel, les données sont dans l'ordre mail, mdp, indice avec indice qui vaut 1 si on l'inscrit, 0 sinon
//$_POST['indice']="oui";
$connexion = "PageConnexion.php";
$fentree = fopen("ID.txt","r+");
$res = "";
if($_COOKIE['mail'] == '' && $_POST['mail'] == ''){
    header("Location: $connexion");exit();
}
$mail; //va contenir le mail actif
$mdp; //va contenir le mdp du mail actif
$type; //va contenir le type d'url a renvoyer (admin ou jeune) du mail actif
if($_COOKIE['mail'] == ""){
    $entree =  [$_POST['mail'], $_POST['mdp'], $_POST['indice']];
}else{
    $entree = [$_COOKIE['mail'], $_COOKIE['mdp'], 0];//le cookie sert a la connexion donc l'indice est forcement 0
}
echo $_COOKIE['mail']."<br>";
var_dump($entree);
echo("<br>");
fscanf($fentree, "%s %s", $sortieAdmin, $sortieJeune); //prise de la premiere ligne contenant les urls
$entree[0] = strtolower($entree[0]);
$test = 0;
if($entree[2] == 0){ //on verifie l'utilisateur
    echo("pas d'inscription <br>");
    while(fscanf($fentree, "%s %s %s", $mail, $mdp, $type) == 3){
        if($entree[0] == $mail){
            $test = $test + 1;
            if($entree[1] == $mdp){
                fclose($fentree);
                if($_COOKIE['mail'] == ""){ //pas de cookies de connexion
                    echo("pas de cookies <br>");
                    setcookie("mail",$mail,time()+3600);//valable une heure
                    setcookie("mdp",$mdp,time()+3600);//valable une heure
                    if($type== "A"){
                        echo("sortie admin");
                        setcookie('verified',2,time()+3600);
                        header("Location: $sortieAdmin");exit();
                        //$res = $sortieAdmin;
                    }else{
                        echo("sortie Jeune");
                        setcookie('verified',1,time()+3600);
                        header("Location: $sortieJeune");exit();
                        //$res = $sortieJeune;
                    }
                }else{ //cookies de connexion
                    echo("cookies <br>");
                    if($type== "A"){ //profil admin
                        if($_COOKIE['destination'] != ''){
                            if($_COOKIE['destination'] == 'Co'){
                                setcookie('destination');
                                unset($_COOKIE['destination']);
                                setcookie('verified',2,time()+3600);
                                echo("sortie admin <br>");
                                header("Location: $sortieAdmin");exit();
                            }else{
                                
                                setcookie('verified',2,time()+3600); //verified = 2 ==> admin
                                echo("sortie destination<br>");
                                header("Location: $_COOKIE[destination]");
                                setcookie('destination');
                                unset($_COOKIE['destination']);
                                //exit();
                            }
                            
                        }else{ // l'utilisateur a un cookie admin mais pas de destination
                            setcookie('mail','',1);
                            setcookie('mdp','',1);
                            unset($_COOKIE['mail']);
                            unset($_COOKIE['mdp']);
                            echo("pas de destination sortie connexion <br>");
                            header("Location: $connexion");exit();
                        }
                    }else{ //profil jeune
                        if($_COOKIE['destination'] != ''){
                            if($_COOKIE['destination'] == 'Co'){
                                setcookie('destination','',1);
                                unset($_COOKIE['destination']);
                                setcookie('verified',1,time()+3600);
                                echo("sortie jeune<br>");
                                header("Location: $sortieJeune");exit();
                            }else{
                                echo("sortie destination");
                                setcookie('verified',1,time()+3600); //verified = 1 ==> jeune
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
                            echo("pas de destination sortie connexion <br>");
                            header("Location: $connexion");exit();
                        }
                    }
                }
                
            }else{ //mdp ne correspond pas au mail
                if($_COOKIE['mail'] != ""){
                    echo("cookies incorrects <br>");
                    setcookie("mail"); //suppression des cookies de connexion s'ils ne correspondent pas a un resultat
                    setcookie("mdp");
                    unset($_COOKIE['mail']);
                    unset($_COOKIE['mdp']);
                }
                header("Location: $connexion");exit();
                $res = 0;
                echo("erreur de mdp <br>");
            }
        }
    }
    if($test == 0){
        $res = 0; //aucune correspondance de mail lors de la boucle de parcours
        
    }
}else{
    if($entree[2] == 1){ //on inscrit l'utilisateur
        echo("inscription <br>");
        while(fscanf($fentree,"%s %s %s", $mail, $mdp, $type) == 3){
            if($entree[0] == $mail){
                $res = 0;
                $test =1;
            }
        }
        echo("<br> $test <br>");
        if($test == 0){
            fprintf($fentree,"%s %s %s\n", $entree[0], $entree[1], "J");
            fclose($fentree);


            //création du dossier du jeune avec $_POST["nom"] $_POST["prenom"] $_POST["date"]
            
            $creationP = fopen("Profil/$entree[0].JSON","w");
            fprintf($creationP," { \"Profil\": [\n{\n\"Nom\": \"%s\",\n\"Prenom\": \"%s\",\n\"Date\": \"%s\",\n\"Mail\": \"%s\"\n}\n]\n}", $_POST["nom"], $_POST["prenom"], $_POST["date"], $entree[0]);
            fclose($creationP);
            
            setcookie("mail",$mail,time()+3600);//valable une heure
            setcookie("mdp",$mdp,time()+3600);//valable une heure
            header("Location: $sortieJeune");exit();
            echo("sortieJeune");
            //$res = $sortieJeune;
        }
    }else{ //cas où entree[2] ne vaut ni 1 ni 0: valeur incorrecte
        echo("erreur");
        $res = 0;
    }
}
echo $res;
//echo $res === "" ? "1" : $res;
$res === "" ? "1" : $res;
//setcookie("codeErreur","$res",time()+3600);
header("Location: $connexion");exit();



?>
