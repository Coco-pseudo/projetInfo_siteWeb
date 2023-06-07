<?php
//----------------------
//---Variables--------------
//----------------------
$Data="Data2.json";
$i=$_POST['a'];
$mode=$_POST['b'];


/*
différents modes:
1 => Archivage
2 => Désarchivage
3 => attente d'envoi vers attente verification
4 => attente verif vers verif

*/
//-----------------------
//---Fonction------------
//----------------------
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
    default  :
        exit();
}
?>