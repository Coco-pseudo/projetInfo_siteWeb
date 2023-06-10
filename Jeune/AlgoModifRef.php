<?php
session_start();
//----------------------

//b:mode
//a:numero de reference a traiter
/*
différents modes:
1 => Archivage
2 => Désarchivage
3 => attente d'envoi vers attente verification
4 => attente verif vers verif
5 => modif du profil
6 => modif de reference
*/

//
//---Variables--------------
//----------------------



if ($_COOKIE["utilisateur"]=='Referent'){// si appelé depuis une page de référent
    $tab=$_SESSION["dataR"];
    $mail=$tab[0];
    $Data="Jeune/Profil/$mail/Reference.json";
    $Data="Jeune/Profil/lafilledelasalopedu78@gmail.com/Reference.json";
}else{  //si appelé par une page de jeune
    $mail=$_COOKIE['mail'];
    $Data="Profil/$mail/Reference.json";
    $Data2="Profil/$mail/Profil.json";
}



$i=$_POST['a']-1;
$mode=$_POST['b'];

$nom1=$_POST['nom'];
$prenom1=$_POST['prenom'];
$date1=$_POST['date'];
//$email=$_POST['email']; On ne modifie pas le mail pour l'instant

$description1=$_POST["Description"];
$duree1=$_POST["duree"];
$milieu1=$_POST['milieu'];
$nomRef1=$_POST['nomRef'];
$prenomRef1=$_POST['prenomRef'];
$EmailRef1=$_POST['EmailRef'];
$Commentaire1=$_POST['Commentaire'];

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






//-----------------------
//---Fonction------------
//----------------------



function VerifChamp($str){      //corrige la chaine recu depuis le formulaire
    $tmp1=str_replace("\"","'",$str);
    $tmp=str_replace("<","",$tmp1);      // retirer les "<" pour empecher d'ecrire dans le script js
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
        $old["Reference"][$i]["archiver"]=$a;
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
        $old["Reference"][$i]["verif"]=$a;
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

function EditRef($Data,$i,$description,$duree,$milieu,$nomRef,$prenomRef,$EmailRef,$SavoirEtre,$SavoirFaire,$Commentaire){
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
        $old["Reference"][$i]["Commentaire"]=$Commentaire;


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

$description=VerifChamp($description1);
$duree=VerifChamp($duree1);
$milieu=VerifChamp($milieu1);
$nomRef=VerifChamp($nomRef1);
$prenomRef=VerifChamp($prenomRef1);
$EmailRef=VerifChamp($EmailRef1);
$Commentaire=VerifChamp($Commentaire1);



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
        break;
    case 5 : 
        EditProfil($Data2,$nom,$prenom,$date);
        break;
    case 6 : 
        EditRef($Data,$i,$description,$duree,$milieu,$nomRef,$prenomRef,$EmailRef,$SavoirEtre,$SavoirFaire,$Commentaire);
        break;
    default  :
        exit();
}
?>


