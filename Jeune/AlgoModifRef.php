<?php
//----------------------
//b:mode
//a:numero de reference a traiter
//
//---Variables--------------
//----------------------
$mail=$_COOKIE['mail'];
$Data="Profil/$mail/Reference.json";
$Data2="Profil/$mail/Profil.json";

$i=$_POST['a'];
$mode=$_POST['b'];

$nom1=$_POST['nom'];
$prenom1=$_POST['prenom'];
$date1=$_POST['date'];
//$email=$_POST['email'];

$description=$_POST["Description"];
$duree=$_POST["duree"];
$milieu=$_POST['milieu'];
$nomRef=$_POST['nomRef'];
$prenomRef=$_POST['prenomRef'];
$EmailRef=$_POST['EmailRef'];

$SavoirEtre[0]=$_POST["Autonome"];
$SavoirEtre[1]=$_POST["Passionne"];
$SavoirEtre[2]=$_POST["Reflechi"];
$SavoirEtre[3]=$_POST["Alecoute"];
$SavoirEtre[4]=$_POST["Organise"];
$SavoirEtre[5]=$_POST["Fiable"];
$SavoirEtre[6]=$_POST["Patient"];
$SavoirEtre[7]=$_POST["Responsable"];
$SavoirEtre[8]=$_POST["Sociable"];
$SavoirEtre[9]=$_POST["Optimiste"];

$SavoirFaire[0]=$_POST['Gererunprojet'];
$SavoirFaire[1]=$_POST["Parleruneautrelangue"];
$SavoirFaire[2]=$_POST["Dirigeruneequipe"];
$SavoirFaire[3]=$_POST["Maitriserdelinformatique"];
$SavoirFaire[4]=$_POST["Savoirdessiner"];
$SavoirFaire[5]=$_POST["Savoirtraduire"];
$SavoirFaire[6]=$_POST["Organiseruneconference"];
$SavoirFaire[7]=$_POST["Concevoiruneformation"];
$SavoirFaire[8]=$_POST["Trierdesdonnees"];
$SavoirFaire[9]=$_POST["Capaciteàsorganiser"];
/*
différents modes:
1 => Archivage
2 => Désarchivage
3 => attente d'envoi vers attente verification
4 => attente verif vers verif
5 => modif du profil
6 => modif de reference
*/






//-----------------------
//---Fonction------------
//----------------------



function VerifChamp($str){      //corrige la chaine recu depuis le formulaire

    $tmp=str_replace("<","",$str);      // retirer les "<" pour empecher d'ecrire dans le script js
    $chaine=str_replace("$","\$ ",$tmp);        //enlever les $ pour eviter les erreurs dans le php
    return($chaine);
}



function convert($str){
    $chaine="";
    if (!empty($str)){
        $i=0;
        for ($i=0;$i<strlen($str);$i++){
            if ($i>17 && $i<strlen($str)-5){
                $chaine=$chaine.$str[$i];
                
            }
        }
    }
    return $chaine.$str[strlen($str)-1];
}


function ajustement($File){
    $old=file_get_contents($File);
    $chaine=convert($old);
    $str=" { \"Reference\": ".$chaine;
    $str[strlen($str)-3]="]";
    file_put_contents($File,$str);
}


function EditArchiv($i,$Data,$a){ // (des)archive la i-ème reference du fichier Data
    $old=json_decode(file_get_contents($Data),true);
    if(empty($old)){
        exit();
    }else{
        $old["Reference"][$i-1]["archiver"]=$a;
        $chaine=json_encode($old, JSON_PRETTY_PRINT);
        file_put_contents($Data,$chaine);
        ajustement($Data);
    }
}

function EditVerif($i,$Data,$a){ // (des)archive la i-ème reference du fichier Data
    $old=json_decode(file_get_contents($Data),true);
    if(empty($old)){
        exit();
    }else{
        $old["Reference"][$i-1]["verif"]=$a;
        $chaine=json_encode($old, JSON_PRETTY_PRINT);
        file_put_contents($Data,$chaine);
        ajustement($Data);
    }
}

function EditProfil($Data2,$nom,$prenom,$date){
    $old=json_decode(file_get_contents($Data2),true);
    if(empty($old)){
        exit();
    }else{
        $old["Profil"][0]["Nom"]=$nom;
        $old["Profil"][0]["Prenom"]=$prenom;
        $old["Profil"][0]["Date"]=$date;
        //$old["Profil"][0]["Mail"]=$email;
        $chaine=json_encode($old, JSON_PRETTY_PRINT);
        file_put_contents($Data2,$chaine);

    }
}

function EditRef($Data,$i,$description,$duree,$milieu,$nomRef,$prenomRef,$EmailRef,$SavoirEtre,$SavoirFaire){
    $old=json_decode(file_get_contents($Data),true);
    if(empty($old)){
        exit();
    }else{
        $old["Reference"][$i]["Description"]=$description;
        $old["Reference"][$i]["Duree"]=$duree;
        $old["Reference"][$i]["milieu"]=$milieu;
        $old["Reference"][$i]["nomRef"]=$nomRef;
        $old["Reference"][$i]["prenomRef"]=$prenomRef;
        $old["Reference"][$i]["EmailRef"]=$EmailRef;


        $old["Reference"][$i]["Autonome"]=$SavoirEtre[0];
        $old["Reference"][$i]["Passionne"]=$SavoirEtre[1];
        $old["Reference"][$i]["Reflechi"]=$SavoirEtre[2];
        $old["Reference"][$i]["Alecoute"]=$SavoirEtre[3];
        $old["Reference"][$i]["Organise"]=$SavoirEtre[4];
        $old["Reference"][$i]["Fiable"]=$SavoirEtre[5];
        $old["Reference"][$i]["Patient"]=$SavoirEtre[6];
        $old["Reference"][$i]["Responsable"]=$SavoirEtre[7];
        $old["Reference"][$i]["Sociable"]=$SavoirEtre[8];
        $old["Reference"][$i]["Optimiste"]=$SavoirEtre[9];

        $old["Reference"][$i]["Gerer un projet"]=$SavoirFaire[0];
        $old["Reference"][$i]["Parler une autre langue"]=$SavoirFaire[1];
        $old["Reference"][$i]["Diriger une equipe"]=$SavoirFaire[2];
        $old["Reference"][$i]["Maitriser de linformatique"]=$SavoirFaire[3];
        $old["Reference"][$i]["Savoir dessiner"]=$SavoirFaire[4];
        $old["Reference"][$i]["Savoir traduire"]=$SavoirFaire[5];
        $old["Reference"][$i]["Organiser une conference"]=$SavoirFaire[6];
        $old["Reference"][$i]["Concevoir une formation"]=$SavoirFaire[7];
        $old["Reference"][$i]["Trier des donnees"]=$SavoirFaire[8];
        $old["Reference"][$i]["Capacite a sorganiser"]=$SavoirFaire[9];


        $chaine=json_encode($old, JSON_PRETTY_PRINT);
        file_put_contents($Data,$chaine);

    }
}
//-----------------------
//---Execution------------
//----------------------

//verification des champs saisies
$nom=VerifChamp($nom1);
$prenom=VerifChamp($prenom1);
$date=VerifChamp($date1);
switch ($mode){
    case 1 : 
        EditArchiv($i,$Data,1);
        break;
    case 2 : 
        EditArchiv($i,$Data,0);
        break;
    case 3 :
        EditVerif($i,$Data,1);
        break;
    case 4 : 
        EditVerif($i,$Data,2);
    case 5 : 
        EditProfil($Data2,$nom,$prenom,$date);
        break;
    case 6 : 
        EditRef($Data,$i,$description,$duree,$milieu,$nomRef,$prenomRef,$EmailRef,$SavoirEtre,$SavoirFaire);
        break;
    default  :
        exit();
}
?>