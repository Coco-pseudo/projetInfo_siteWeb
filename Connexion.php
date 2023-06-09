<?php 







//pour rappel, les données sont dans l'ordre mail, mdp, indice avec indice qui vaut 1 si on l'inscrit, 0 sinon
$connexion = "PageConnexion.php";
$fentree = fopen("ID.txt","r+");
$res = "";
$duree = time()+3600; //tout les cookies auront un temps de validité de une heure
if($_COOKIE['mail'] == '' && $_POST['mail'] == ''){
    header("Location: $connexion");exit();
    if($_POST['mail'] == ''){
        setcookie('erreur','merci de remplir le champ du mail',$duree);
        header("Location: $connexion");exit();
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
    setcookie('erreur','merci de bien vouloir remplir le champ de mot de passe',$duree);
}
fscanf($fentree, "%s %s", $sortieAdmin, $sortieJeune); //prise de la premiere ligne contenant les urlse
$entree[0] = strtolower($entree[0]);
$test = 0;
if($entree[2] == 0){ //on verifie l'utilisateur
    while(fscanf($fentree, "%s %s %s", $mail, $mdp, $type) == 3){
        if($entree[0] == $mail){
            $test = $test + 1;
            if($entree[1] == $mdp){
                fclose($fentree);
                if(is_dir("Jeune/Profil/$entree[0]/") || $type == "A"){
                    if(!file_exists("Jeune/Profil/$entree[0]/Profil.json") && $type != "A"){
                        setcookie("erreur","votre fichier de profil à été supprimé, merci de contacter un administrateur",$duree);
                        header("Location: $connexion");exit();
                    }
                }else{
                    setcookie("erreur","votre dossier de profil à été supprimé, merci de contacter un administrateur",$duree);
                    header("Location: $connexion");exit();
                }
                
                if($_COOKIE['mail'] == ""){ //pas de cookies de connexion
                    setcookie("mail",$mail,$duree);
                    setcookie("mdp",$mdp,$duree);
                    if($type== "A"){
                        setcookie('verified',2,$duree);
                        header("Location: $sortieAdmin");exit();
                    }else{
                        setcookie('verified',1,$duree);
                        header("Location: $sortieJeune");exit();
                    }
                }else{ //cookies de connexion
                    if($type== "A"){ //profil admin
                        if($_COOKIE['destination'] != ''){
                            if($_COOKIE['destination'] == 'Co'){
                                setcookie('destination');
                                unset($_COOKIE['destination']);
                                setcookie('verified',2,$duree);
                                header("Location: $sortieAdmin");exit();
                            }else{
                                
                                setcookie('verified',2,$duree); //verified = 2 ==> admin 
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
                            setcookie("erreur de redirection, temps alloué expiré"); 
                            header("Location: $connexion");exit();
                        }
                    }else{ //profil jeune
                        if($_COOKIE['destination'] != ''){
                            if($_COOKIE['destination'] == 'Co'){
                                setcookie('destination','',1);
                                unset($_COOKIE['destination']);
                                setcookie('verified',1,$duree);
                                header("Location: $sortieJeune");exit();
                            }else{
                                setcookie('verified',1,$duree); //verified = 1 ==> jeune 
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
                            setcookie("erreur de redirection, temps alloué expiré");
                            header("Location: $connexion");exit();
                        }
                    }
                }
                
            }else{ //mdp ne correspond pas au mail
                if($_COOKIE['mail'] != ""){
                    setcookie("mail"); //suppression des cookies de connexion s'ils ne correspondent pas a un resultat
                    setcookie("mdp");
                    unset($_COOKIE['mail']);
                    unset($_COOKIE['mdp']);
                }
                setcookie('erreur','mot de passe incorrect',$duree);
                header("Location: $connexion");exit();
            }
        }
    }
    if($test == 0){
        setcookie('erreur','mail incorrect',$duree);
        header("Location: $connexion");exit();
    }
}else{
    if($entree[2] == 1){ //on inscrit l'utilisateur
        
        //tests des données d'entree de l'utilisateur
        $precision = "tout les champs sont requis pour procéder à votre inscription";
        if($_POST['nom'] == ""){
            setcookie('erreur',"Merci de bien vouloir saisir un nom. <br>".$precision,$duree);
            header("Location: $connexion");exit();
        }
        if($_POST['prenom'] == ""){
            setcookie('erreur',"Merci de bien vouloir saisir un prénom. <br>".$precision,$duree); 
            header("Location: $connexion");exit();
        }
        if($_POST['date'] == ""){
            setcookie('erreur',"Merci de bien vouloir saisir une date de naissance. <br>".$precision,$duree);
            header("Location: $connexion");exit();
        }
        if($_POST['mdp2'] == ""){
            setcookie('erreur',"Merci de bien vouloir remplir la verification de mot de passe <br>".$precision,$duree); 
            header("Location: $connexion");exit();
        }else{  // mdp2 n'est pas vide
            if($_POST['mdp'] != $_POST['mdp2']){
                setcookie('erreur',"La \"vérification de mot de passe\" doit contenir le même mot de passe que celui au dessus",$duree); 
                header("Location: $connexion");exit();
            }
        }


        while(fscanf($fentree,"%s %s %s", $mail, $mdp, $type) == 3){//boucle de verification que le mail n'est pas déjà présent
            if($entree[0] == $mail){
                setcookie('erreur','votre mail fait déjà parti de la base de donnée',$duree);
                header("Location: $connexion");exit();
            }
        }
        if($test == 0){
            if(!is_dir("Jeune/Profil")){
                mkdir("Jeune/Profil");
            }
            if(is_dir("Jeune/Profil/$entree[0]")){//on teste si le dossier du jeune existe déjà (il ne fait pas partie de la liste des mails)
                setcookie('erreur','vous avez un dossier a votre nom sans faire partie de la base de donné, merci de contacter un administrateur',$duree);
                header("Location: $connexion");exit();
            }
            mkdir("Jeune/Profil/$entree[0]");
            fprintf($fentree,"%s %s %s\n", $entree[0], $entree[1], "J");
            fclose($fentree);


            //création du fichier json du jeune avec $_POST["nom"] $_POST["prenom"] $_POST["date"]
            
            $creationP = fopen("Jeune/Profil/$entree[0]/Profil.json","w");
            fprintf($creationP," { \"Profil\": [\n{\n\"Nom\": \"%s\",\n\"Prenom\": \"%s\",\n\"Date\": \"%s\",\n\"Mail\": \"%s\"\n}\n]\n}", $_POST["nom"], $_POST["prenom"], $_POST["date"], $entree[0]);
            fclose($creationP);

            //création du fichier vide de reference du jeune
            $creationR = fopen("Jeune/Profil/$entree[0]/Reference.json","w");
            fclose($creationR);

            
            setcookie("mail",$entree[0],$duree);
            setcookie("mdp",$entree[1],$duree);
            setcookie("verified",1,$duree); 
            header("Location: $sortieJeune");exit();
        }
    }
}
header("Location: $connexion");exit();




?>
