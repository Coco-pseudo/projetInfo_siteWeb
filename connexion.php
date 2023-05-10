<DOCTYPE html>
<html>


<body>
<?php 
//partie pour test
/*
$_POST["mail"] = "mail1@mailbidon.com";
$_POST["mdp"]= "mdp";
$_POST["indice"] = 0;
*/

//pour rappel, les données sont dans l'ordre mail, mdp, indice avec indice qui vaut 1 si on l'inscrit, 0 sinon
$fentree = fopen("ID.txt","r+");
$res = "";
$mail; //va contenir le mail actif
$mdp; //va contenir le mdp du mail actif
$type; //va contenir le type d'url a renvoyer (admin ou jeune) du mail actif
$entree = [$_POST['mail'], $_POST['mdp'], $_POST['inscription']];
fscanf($fentree, "%s %s", $sortieAdmin, $sortieJeune); //prise de la premiere ligne contenant les urls
$entree[0] = strtolower($entree[0]);
$test = 0;
if($entree[2] == 0){ //on verifie l'utilisateur
    while(fscanf($fentree, "%s %s %s", $mail, $mdp, $type) == 3){
        if($entree[0] == $mail){
            if($entree[1] == $mdp){
                fclose($fentree);
                if($type== "A"){
                    header("Location: $sortieAdmin");
                    $res = $sortieAdmin;
                }else{
                    header("Location: $sortieJeune");
                    $res = $sortieJeune;
                }
                exit();
            }else{//cas mdp incorrect
                echo("test");
                $test = $test + 1;
                $res = 0;
            }
        }
        
    }
    if($test == 0){//cas ou email non présent mais mode connexion

        //header("Location: Connexion.html");//renvoyer message d'erreur!!!
        $res = 1;
    }
}else{
    if($entree[2] == 1){ //on inscrit l'utilisateur
        while(fscanf($fentree,"%s %s %s", $mail, $mdp, $type) == 3){
            if($entree[0] == $mail){
                $res = 2;
                $test =1;
            }
        }
        if($test == 0){
            fprintf($fentree,"%s %s %s\n", $entree[0], $entree[1], "J");
            fclose($fentree);
            header("Location: $sortieJeune");
            exit();
        }
    }else{ //cas où entree[2] ne vaut ni 1 ni 0: valeur incorrecte
        $res = 3;
    }
}
echo $res === "" ? "4" : $res;



?>

</body>
</html>