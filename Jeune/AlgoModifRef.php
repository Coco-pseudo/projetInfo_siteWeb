<?php
//----------------------
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

function EditRef(){
    
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
        EditRef();
        break;
    default  :
        exit();
}
?>