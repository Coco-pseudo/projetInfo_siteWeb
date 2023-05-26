<!DOCTYPE html>

<html>
<style>
    td{
        border : 1px  solid black;
        align-items: center;
    }
    table{
        background-color: white;
    }

</style>

<body>
<table align="center" >
        <legend>Récapitulatif</legend>

        <tr>
            <td>Description de l'engagement</td>
            <td id="0Description"> </td>
        </tr>
        <tr>
            <td>Durée</td>
            <td id="0Duree"> </td>
        </tr>
        <tr>
            <td>milieu</td>
            <td id="0milieu"> </td>
        </tr>
        <tr>
            <td>nomRef</td>
            <td id="0nomRef"> </td>
        </tr>
        <tr>
            <td>prenomRef</td>
            <td id="0prenomRef"> </td>
        </tr>
        <tr>
            <td>EmailRef</td>
            <td id="0EmailRef"> </td>
        </tr>

    </table>
    <table align="center" >
        <legend>Récapitulatif</legend>

        <tr>
            <td>Description de l'engagement</td>
            <td id="1Description"> </td>
        </tr>
        <tr>
            <td>Durée</td>
            <td id="1Duree"> </td>
        </tr>
        <tr>
            <td>milieu</td>
            <td id="1milieu"> </td>
        </tr>
        <tr>
            <td>nomRef</td>
            <td id="1nomRef"> </td>
        </tr>
        <tr>
            <td>prenomRef</td>
            <td id="1prenomRef"> </td>
        </tr>
        <tr>
            <td>EmailRef</td>
            <td id="1EmailRef"> </td>
        </tr>

    </table>
    <table align="center" >
        <legend>Récapitulatif</legend>

        <tr>
            <td>Description de l'engagement</td>
            <td id="2Description"> </td>
        </tr>
        <tr>
            <td>Durée</td>
            <td id="2Duree"> </td>
        </tr>
        <tr>
            <td>milieu</td>
            <td id="2milieu"> </td>
        </tr>
        <tr>
            <td>nomRef</td>
            <td id="2nomRef"> </td>
        </tr>
        <tr>
            <td>prenomRef</td>
            <td id="2prenomRef"> </td>
        </tr>
        <tr>
            <td>EmailRef</td>
            <td id="2EmailRef"> </td>
        </tr>

    </table>



<?php
//champ standard
$Description = $_POST["Description"];
$Durée = $_POST["Durée"];
$milieu = $_POST["milieu"];
$nomRef = $_POST["nomRef"];
$prenomRef = $_POST["prenomRef"];
$EmailRef = $_POST["EmailRef"];

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



function Tab($nomFichier,$Description,$Durée,$milieu,$nomRef,$prenomRef,$EmailRef,$SavoirEtre,$SavoirFaire){
    $old=file_get_contents($nomFichier);
    $chaine="";
    $Ref = array(
        array("Description"=>$Description, "Duree"=>$Durée, "milieu"=>$milieu, "nomRef"=>$nomRef,"prenomRef"=>$prenomRef,"EmailRef"=>$EmailRef,
        "Autonome"=>$SavoirEtre[0],"Alecoute"=>$SavoirEtre[1],"Organise"=>$SavoirEtre[2],"Passionne"=>$SavoirEtre[3],"Fiable"=>$SavoirEtre[4],
        "Patient"=>$SavoirEtre[5],"Reflechi"=>$SavoirEtre[6],"Responsable"=>$SavoirEtre[7],"Sociable"=>$SavoirEtre[8],"Optimiste"=>$SavoirEtre[9],
        "Commentaire"=>"","Gerer un projet"=>$SavoirFaire[0],"Parler une autre langue"=>$SavoirFaire[1],"Diriger une equipe"=>$SavoirFaire[2],
        "Maitriser de linformatique"=>$SavoirFaire[3],"Savoir dessiner"=>$SavoirFaire[4],"Savoir traduire"=>$SavoirFaire[5],"Organiser une conference"=>$SavoirFaire[6],
        "Concevoir une formation"=>$SavoirFaire[7],"Trier des donnees"=>$SavoirFaire[8],"Capacite à sorganiser"=>$SavoirFaire[9])
    );
    //echo (json_encode($Ref, JSON_PRETTY_PRINT));
    if (empty($old)){
        $new="{ \"Reference\": ". json_encode($Ref, JSON_PRETTY_PRINT). " } ";
        file_put_contents($nomFichier,$new);
    }else{
        $chaine = convert($old);
        $str=" { \"Reference\": ".$chaine.",". json_encode($Ref, JSON_PRETTY_PRINT). " }";
        $new="";
        $i=0;
        $tmp=str_replace("[","",$str);
        $new=str_replace("]","",$tmp);
        $new[15]="[ ";
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
            if ($i>15 && $i<strlen($str)-4){
                $chaine=$chaine.$str[$i];

            }
        }
    }
    return $chaine.$str[strlen($str)-1];
}




if($test==1){
Tab("Data2.0.json",$Description,$Durée,$milieu,$nomRef,$prenomRef,$EmailRef,$SavoirEtre,$SavoirFaire);
}

header("Location: References.php");




?>



<script>

var xhttp = new XMLHttpRequest();
//var a =0;
var i=0;
function RecapRef(id){      //impossible de faire la modificaion de plusieurs tableaux successivement
    for(i=0;i<=id;i++){
        xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            var reponse = JSON.parse(xhttp.responseText);
            var txt="";
            i--;
            txt=reponse.Reference[i].Description;alert(i);
            document.getElementById(i+"Description").innerHTML = txt;

            txt=reponse.Reference[i].Duree;
            document.getElementById(i+"Duree").innerHTML = txt;

            txt=reponse.Reference[i].milieu;
            document.getElementById(i+"milieu").innerHTML = txt;

            txt=reponse.Reference[i].nomRef;
            document.getElementById(i+"nomRef").innerHTML = txt;

            txt=reponse.Reference[i].prenomRef;
            document.getElementById(i+"prenomRef").innerHTML = txt;

            txt=reponse.Reference[i].EmailRef;
            document.getElementById(i+"EmailRef").innerHTML = txt;


            
        }
        }
        xhttp.open("GET","Data2.0.json", true);
        xhttp.send();
    }
}
RecapRef("1");
//RecapRef("1");
//RecapRef("2");
</script>
</body>
</html>