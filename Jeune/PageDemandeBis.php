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

$Description = $_POST["Description"];
$Durée = $_POST["Durée"];
$milieu = $_POST["milieu"];
$nomRef = $_POST["nomRef"];
$prenomRef = $_POST["prenomRef"];
$EmailRef = $_POST["EmailRef"];

//CONVERTION EN JSON
$Ref = array(
    array("Description"=>$Description, "Duree"=>$Durée, "milieu"=>$milieu, "nomRef"=>$nomRef,"prenomRef"=>$prenomRef,"EmailRef"=>$EmailRef)
);
//$old_data=file_get_contents("Data2.json");//Recupération ancien fichier .JSON
$old=json_decode(file_get_contents("Data2.0.json"), true);

//test affichage----
echo '<pre>';
print_r($old);
echo'</pre>';
//------------------
//"assembler" deux tableau ( les mettre bout à bout)
//array_push($old,$Ref);


$str="{ \"Reference\": ". json_encode($Ref, JSON_PRETTY_PRINT). " }";
/*
if(empty($old)){
    $str="{ \"Reference\": ". json_encode($Ref, JSON_PRETTY_PRINT). " }";
}else{
    
}
*/
file_put_contents("Data2.json",$str);//Ecraser par le nouveau .JSON
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