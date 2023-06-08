<!DOCTYPE html>
<?php
<<<<<<< HEAD
$mail=$_COOKIE['mail'];
$DATA="Profil/$mail/Reference.json";
=======
    $mail=$_COOKIE['mail'];
    $DATA="Profil/$mail/Reference.json";
>>>>>>> Coco
?>
<html>
<body>



<?php
//champ standard
$Description1 = $_POST["Description"];
$Durée1 = $_POST["Durée"];
$milieu1 = $_POST["milieu"];
$nomRef1 = $_POST["nomRef"];
$prenomRef1 = $_POST["prenomRef"];
$EmailRef1 = $_POST["EmailRef"];


//verif pas de probleme avec la chaine (<,$)
$Description=VerifChamp($Description1);
$Durée=VerifChamp($Durée1);
$milieu=VerifChamp($milieu1);
$nomRef=VerifChamp($nomRef1);
$prenomRef=VerifChamp($prenomRef1);
$EmailRef=VerifChamp($EmailRef1);


//Savoir-Etre

$SavoirEtre[0]=$_POST["Autonome"];
$SavoirEtre[1]=$_POST["A_lécoute"];
$SavoirEtre[2]=$_POST["Organisé"];
$SavoirEtre[3]=$_POST["Passionné"];
$SavoirEtre[4]=$_POST["Fiable"];
$SavoirEtre[5]=$_POST["Patient"];
$SavoirEtre[6]=$_POST["Réfléchi"];
$SavoirEtre[7]=$_POST["Responsable"];
$SavoirEtre[8]=$_POST["Sociable"];
$SavoirEtre[9]=$_POST["Optimiste"];


for ($i=0;$i<10;$i++){
    
    if(!empty($SavoirEtre[$i])){
        $SavoirEtre[$i]="1";
    }
    else{
        $SavoirEtre[$i]="0";
    }
}

//Savoir-Faire

$SavoirFaire[0]=$_POST["GestionProjet"];
$SavoirFaire[1]=$_POST["AutreLangue"];
$SavoirFaire[2]=$_POST["GererEquipe"];
$SavoirFaire[3]=$_POST["Informatique"];
$SavoirFaire[4]=$_POST["Dessin"];
$SavoirFaire[5]=$_POST["Traduction"];
$SavoirFaire[6]=$_POST["OrgaConf"];
$SavoirFaire[7]=$_POST["ConcevoirFormation"];
$SavoirFaire[8]=$_POST["TrierDonnées"];
$SavoirFaire[9]=$_POST["CapacitéOrganisation"];

for ($i=0;$i<10;$i++){
    
    if(!empty($SavoirFaire[$i])){
        $SavoirFaire[$i]="1";
    }
    else{
        $SavoirFaire[$i]="0";
    }
}


//verif saisie vide
$test=1;
if (empty($Description)||empty($Durée)||empty($milieu)||empty($nomRef)||empty($prenomRef)||empty($EmailRef)){
    
    $test=0;
}
$Ref = array(
    array("Description"=>$Description, "Duree"=>$Durée, "milieu"=>$milieu, "nomRef"=>$nomRef,"prenomRef"=>$prenomRef,"EmailRef"=>$EmailRef,
    "Autonome"=>$SavoirEtre[0],"Alecoute"=>$SavoirEtre[1],"Organise"=>$SavoirEtre[2],"Passionne"=>$SavoirEtre[3],"Fiable"=>$SavoirEtre[4],
    "Patient"=>$SavoirEtre[5],"Reflechi"=>$SavoirEtre[6],"Responsable"=>$SavoirEtre[7],"Sociable"=>$SavoirEtre[8],"Optimiste"=>$SavoirEtre[9],
    "Commentaire"=>"","Gerer un projet"=>$SavoirFaire[0],"Parler une autre langue"=>$SavoirFaire[1],"Diriger une equipe"=>$SavoirFaire[2],
    "Maitriser de linformatique"=>$SavoirFaire[3],"Savoir dessiner"=>$SavoirFaire[4],"Savoir traduire"=>$SavoirFaire[5],"Organiser une conference"=>$SavoirFaire[6],
    "Concevoir une formation"=>$SavoirFaire[7],"Trier des donnees"=>$SavoirFaire[8],"Capacité à sorganiser"=>$SavoirFaire[9])
);


if($test==1){
    Tab($DATA,$Description,$Durée,$milieu,$nomRef,$prenomRef,$EmailRef,$SavoirEtre,$SavoirFaire);
}

header("Location: References.php");


//------------------------debut fonction-----------------------
function VerifChamp($str){ //corrige la chaine recu depuis le formulaire
    $tmp=str_replace("<","",$str); // retirer les "<" pour empecher d'ecrire dans le script js
    $chaine=str_replace("$","\$ ",$tmp); //enlever les $ pour eviter les erreurs dans le php
    return($chaine);
}

function Tab($nomFichier,$Description,$Durée,$milieu,$nomRef,$prenomRef,$EmailRef,$SavoirEtre,$SavoirFaire){
    $old=file_get_contents($nomFichier);
    $chaine="";
    $Ref = array(
        array("Description"=>$Description, "Duree"=>$Durée, "milieu"=>$milieu, "nomRef"=>$nomRef,"prenomRef"=>$prenomRef,"EmailRef"=>$EmailRef,
        "Autonome"=>$SavoirEtre[0],"Alecoute"=>$SavoirEtre[1],"Organise"=>$SavoirEtre[2],"Passionne"=>$SavoirEtre[3],"Fiable"=>$SavoirEtre[4],
        "Patient"=>$SavoirEtre[5],"Reflechi"=>$SavoirEtre[6],"Responsable"=>$SavoirEtre[7],"Sociable"=>$SavoirEtre[8],"Optimiste"=>$SavoirEtre[9],
        "Commentaire"=>"","Gerer un projet"=>$SavoirFaire[0],"Parler une autre langue"=>$SavoirFaire[1],"Diriger une equipe"=>$SavoirFaire[2],
        "Maitriser de linformatique"=>$SavoirFaire[3],"Savoir dessiner"=>$SavoirFaire[4],"Savoir traduire"=>$SavoirFaire[5],"Organiser une conference"=>$SavoirFaire[6],
        "Concevoir une formation"=>$SavoirFaire[7],"Trier des donnees"=>$SavoirFaire[8],"Capacite a sorganiser"=>$SavoirFaire[9], "verif"=>0,"archiver"=>0)
    );
    
    if (empty($old)){
        $new=" { \"Reference\": ". json_encode($Ref, JSON_PRETTY_PRINT). " } ";
        file_put_contents($nomFichier,$new);
    }else{
        $chaine = convert($old);
        $str=" { \"Reference\": ".$chaine.",". json_encode($Ref, JSON_PRETTY_PRINT). " }";
        $new="";
        $i=0;
        $tmp=str_replace("[","  ",$str);
        $new=str_replace("]"," ",$tmp);
<<<<<<< HEAD
        $new[17]="[ ";
=======
        $new[15]="[ ";
>>>>>>> Coco
        $new[strlen($new)-2]="] ";
    
    
    
        file_put_contents($nomFichier,$new);
    }

    return($new);
}



function convert($str){
    $chaine="";
    if (!empty($str)){
        $i=0;
        for ($i=0;$i<strlen($str);$i++){
            if ($i>15 && $i<strlen($str)-5){
                $chaine=$chaine.$str[$i];
                
            }
        }
    }
    return $chaine.$str[strlen($str)-1];
}

//------------------------fin fonction-----------------------





?>


</body>
</html>