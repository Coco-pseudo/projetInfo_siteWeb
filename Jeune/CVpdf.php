<?php
$MailJeune = $_COOKIE['mail']; //doit prendre la valeur du mail du jeune
$Data = "Profil/$MailJeune/Reference.json";
$ref = json_decode(file_get_contents($Data),true); //contient le tableau de refs du jeune
$Data = "Profil/$MailJeune/Profil.json";
$pro = json_decode(file_get_contents($Data),true);// contient le tableau du profil du jeune
$NomJeune = $pro["Profil"][0]["Nom"];
$PrenomJeune = $pro["Profil"][0]["Prenom"];
//création du tableau des références validés, pour ensuite aller chercher celles selectionnés
$tab = [$MailJeune];
for($i = 0; $i<count($ref['Reference']); $i){
    if($ref['Reference'][$i]["verif"] == 1){ //ref validé
        $i++; //le numéro de la ref est 1 de plus que sa case dans le tableau
        if(isset($_POST["ref$i"])){
            array_push($tab,$i);
        }
    }else{
        $i++;
    }
}
var_dump($tab);
require('../tcpdf/tcpdf.php');

// Crée une instance de TCPDF
$pdf = new TCPDF('P', 'mm', 'A4', true, 'UTF-8');

// Configure les paramètres du document PDF
$pdf->SetCreator('Jeune');
$pdf->SetAuthor('Jeune 6.4');
$pdf->SetTitle('Votre livret d\'expériences');
$pdf->SetMargins(10, 10, 10);
$pdf->SetAutoPageBreak(true, 10);

// Ajoute une nouvelle page
$pdf->AddPage();

$mail=$tab[0];

$DATA="Profil/$mail/Profil.json";
$ref = json_decode(file_get_contents($DATA),true);
$nom=$ref['Profil'][0]['Nom'];
$pnom=$ref['Profil'][0]['Prenom'];
$html0 = '
<h1 style="text-align:center">Livret d\'expériences</h1>
<h2 >' .$nom. '  ' .$pnom. '</h2>
';
// Insérer le code HTML dans le PDF
$pdf->writeHTML($html0, true, false, true, false, '');

$DATA="Profil/$mail/Reference.json";
$ref = json_decode(file_get_contents($DATA),true);
$nbref = count($tab)-1;

// Contenu HTML que vous souhaitez convertir en PDF
for ($i = 1; $i <= $nbref; $i++) {
    $a=$ref['Reference'][$tab[$i]-1]['Description'];
    $b=$ref['Reference'][$tab[$i]-1]['Duree'];
    $c=$ref['Reference'][$tab[$i]-1]['milieu'];
    $d=$ref['Reference'][$tab[$i]-1]['nomRef'];
    $e=$ref['Reference'][$tab[$i]-1]['prenomRef'];
    $f=$ref['Reference'][$tab[$i]-1]['EmailRef'];

    if ($ref['Reference'][$tab[$i]-1]['Commentaire'] != ""){
        $com= $ref['Reference'][$tab[$i]-1]['Commentaire'];
    }

    if ($ref['Reference'][$tab[$i]-1]['Autonome'] == 1){
        $e1="-Autonome-";
    }

    if ($ref['Reference'][$tab[$i]-1]['Passionne'] == 1){
        $e2="-Passionné-";
    }
    if ($ref['Reference'][$tab[$i]-1]['Reflechi'] == 1){
        $e3="-Réfléchi-";
    }
    if ($ref['Reference'][$tab[$i]-1]['Alecoute'] == 1){
        $e4="-A l'écoute-";
    }
    if ($ref['Reference'][$tab[$i]-1]['Organise'] == 1){
        $e5="-Organisé-";
    }
    if ($ref['Reference'][$tab[$i]-1]['Fiable'] == 1){
        $e6="-Fiable-";
    }
    if ($ref['Reference'][$tab[$i]-1]['Patient'] == 1){
        $e7="-Patient-";
    }
    if ($ref['Reference'][$tab[$i]-1]['Responsable'] == 1){
        $e8="-Responsable-";
    }
    if ($ref['Reference'][$tab[$i]-1]['Sociable'] == 1){
        $e9="-Sociable-";
    }
    if ($ref['Reference'][$tab[$i]-1]['Optimiste'] == 1){
        $e10="-Optimiste-";
    }

    if ($ref['Reference'][$tab[$i]-1]['Gerer un projet'] == 1){
        $f1="-Gérer un projet-";
    }
    if ($ref['Reference'][$tab[$i]-1]['Parler une autre langue'] == 1){
        $f2="-Parler une autre langue-";
    }
    if ($ref['Reference'][$tab[$i]-1]['Diriger une equipe'] == 1){
        $f3="-Diriger une equipe-";
    }
    if ($ref['Reference'][$tab[$i]-1]['Maitriser de linformatique'] == 1){
        $f4="-Maitriser de l'informatique-";
    }
                    
    if ($ref['Reference'][$tab[$i]-1]['Savoir dessiner'] == 1){
        $f5="-Savoir dessiner-";
    }
    if ($ref['Reference'][$tab[$i]-1]['Savoir traduire'] == 1){
        $f6="-Savoir traduire-";
    }


    if ($ref['Reference'][$tab[$i]-1]['Organiser une conference'] == 1){
        $f7="-Organiser une conference-";
    }
    if ($ref['Reference'][$tab[$i]-1]['Concevoir une formation'] == 1){
        $f8="-Concevoir une formation-";
    }
    if ($ref['Reference'][$tab[$i]-1]['Trier des donnees'] == 1){
        $f9="-Trier des données-";
    }

    if ($ref['Reference'][$tab[$i]-1]['Capacite a sorganiser'] == 1){
        $f10="-Capacité à s'organiser-";
    }



$html='<h2>Référence ' . $tab[$i] . ' :</h2>
<div style="border-collapse: collapse; border: 1px solid black;">
<table class="ref" >
    
    <tr>
        <td> Description de l\'engagement</td>
        <td>
        "' . $a . '"
        </td>
    </tr>
    
    <tr>
        <td >Durée de l\'engagement</td>
        <td >
        "' . $b . '"
        </td>
    </tr>
    
    <tr>
        <td >Le milieu de l\'engagement (association, club de sport, etc.)</td>
        <td >
        "' . $c . '"
        </td>
    </tr>
    
    <tr>
        <td>Nom du référent</td>
        <td>
        "' . $d . '"
        </td>
    </tr>
    
    <tr>
        <td >Prénom du référent</td>
        <td >
        "' . $e . '"
        </td>
    </tr>

    <tr>
        <td >Email du référent</td>
        <td >
        "' . $f . '"
        </td>
    </tr>

</table></div>';
    $pdf->writeHTML($html, true, false, true, false, '');
    $html2 = '<div><h3 style="text-align:center">Savoirs-être :</h3>
            <div style="text-align:center">
            ' .$e1. ' ' .$e2. '' .$e3. '' .$e4. '' .$e5. '' .$e6. '' .$e7. '' .$e8. '' .$e9. '' .$e10. '
            </div>
            <h3 style="text-align:center">Savoirs-faire :</h3>
            <div style="text-align:center">
            ' .$f1. '' .$f2. '' .$f3. '' .$f4. '' .$f5. '' .$f6. '' .$f7. '' .$f8. '' .$f9. '' .$f10. '
            </div></div>';
$pdf->writeHTML($html2, true, false, true, false, '');

    $html3 = '<h3 style="text-align:center">Commentaire :</h3>
    <div style="text-align:center">
    ' .$com. '
    </div>
    ';
    $pdf->writeHTML($html3, true, false, true, false, '');

}

ob_end_clean();

// Génère le fichier PDF et le renvoie au navigateur pour téléchargement
$pdf->Output('Votre_livret_dexperiences', 'D');
//phpinfo();
// $q = $_REQUEST["q"];
// $tab = explode(" ",$q);
// $q = strtolower($q);

// var_dump($tab);
// echo("<br>hello $q");
?>