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
    <table align="center">
        <legend>Récapitulatif</legend>

        <tr>
            <td>Description de l'engagement</td>
            <td id="Descpription"> </td>
        </tr>
        <tr>
            <td>Durée</td>
            <td id="Duree"> </td>
        </tr>
        <tr>
            <td>milieu</td>
            <td id="milieu"> </td>
        </tr>
        <tr>
            <td>nomRef</td>
            <td id="nomRef"> </td>
        </tr>
        <tr>
            <td>prenomRef</td>
            <td id="prenomRef"> </td>
        </tr>
        <tr>
            <td>EmailRef</td>
            <td id="EmailRef"> </td>
        </tr>

    </table>


<?php

$Descpription = $_POST["Descpription"];
$Durée = $_POST["Durée"];
$milieu = $_POST["milieu"];
$nomRef = $_POST["nomRef"];
$prenomRef = $_POST["prenomRef"];
$EmailRef = $_POST["EmailRef"];
//echo ("$Descpription $Durée");

//CONVERTION EN JSON
$Ref = array(
    array("Descpription"=>$Descpription, "Duree"=>$Durée, "milieu"=>$milieu, "nomRef"=>$nomRef,"prenomRef"=>$prenomRef,"EmailRef"=>$EmailRef)
);
//$old_data=file_get_contents("Data2.json");//Recupération ancien fichier .JSON
$old=json_decode(file_get_contents("Data2.json"), true);

//test affichage----
echo '<pre>';
print_r($old);
echo'</pre>';
//------------------

array_push($old,$Ref);

echo '<pre>';
print_r($old);
echo'</pre>';

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
function RecapRef(){
    xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
        var reponse = JSON.parse(xhttp.responseText);
        var txt="";

        txt=reponse.Reference[0].Descpription;
        document.getElementById("Descpription").innerHTML = txt;

        txt=reponse.Reference[0].Duree;
        document.getElementById("Duree").innerHTML = txt;

        txt=reponse.Reference[0].milieu;
        document.getElementById("milieu").innerHTML = txt;

        txt=reponse.Reference[0].Descpription;
        document.getElementById("nomRef").innerHTML = txt;

        txt=reponse.Reference[0].nomRef;
        document.getElementById("prenomRef").innerHTML = txt;

        txt=reponse.Reference[0].EmailRef;
        document.getElementById("EmailRef").innerHTML = txt;


        
    }
    }
    xhttp.open("GET", "Data2.json", true);
    xhttp.send();
}
RecapRef();


</script>
</body>
</html>