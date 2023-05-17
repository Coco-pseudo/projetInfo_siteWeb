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
                if($_COOKIE['mail'] == ""){
                    setcookie("mail",$mail,time()+3600);//valable une heure
                    setcookie("mdp",$mdp,time()+3600);//valable une heure
                }
                if($type== "A"){
                    //header("Location: $sortieAdmin");
                    $res = $sortieAdmin;
                }else{
                    //header("Location: $sortieJeune");
                    $res = $sortieJeune;
                }
            }else{
                $res = 0;
                //echo("erreur de mdp <br>");
            }
        }
    }
    if($test == 0){
        $res = 0;
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