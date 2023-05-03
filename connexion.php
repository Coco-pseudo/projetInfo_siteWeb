
<?php 
//pour rappel, les données sont dans l'ordre mail, mdp, insc avec insc qui vaut 1 si on l'inscrit, 0 sinon
$fentree = fopen("ID.txt","r+");
$mail; //va contenir le mail actif
$mdp; //va contenir le mdp du mail actif
$type; //va contenir le type d'url a renvoyer (admin ou jeune) du mail actif
$entree = [$_POST["mail"], $_POST["mdp"], $_POST["indice"]];
fscanf($fentree, "%s %s", $sortieAdmin, $sortieJeune); //prise de la premiere ligne contenant les urls
$entree[0] = strtolower($entree[0]);
if($entree[2] == 0){
    while(fscanf($fentree, "%s %s %s", $mail, $mdp, $type) == 3){
        if($entree[0] == $mail){
            if($entree[1] == $mdp){
                if($type== "A"){
                    header("Location: $sortieAdmin");
                }else{
                    header("Location: $sortieJeune");
                }
            }else{
                echo 0;
            }
        }
    }
    echo 0;
}else{
    if($entree[2] == 1){
        while(fscanf($fentree,"%s   %s  %s", $mail, $mdp, $type) == 3){
            if($entree[0] == $mail){
                echo 0;
            }
        }
        fprintf($fentree,"%s %s %s", $entree[0], $entree[1], "J");
        fclose($fentree);
        header("Location: $sortieJeune");
    }else{ //cas où entree[2] ne vaut ni 1 ni 0: valeur incorrecte
        echo 0;
    }
}




?>