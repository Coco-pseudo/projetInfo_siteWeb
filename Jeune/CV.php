<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Jeune 6.4</title>
        <link rel="icon" type="image/png" href="logo.png">
        <link rel="stylesheet" type="text/css" href="CV.css">
    </head>
    
<<<<<<< HEAD
    <header>
        <h1>Pour faire de l'engagement une valeur</h1>
        <image src="logo.png" height="150" onclick="Accueil()"></image>
    </header>
    <body>
        <nav>
            <ul class="nav-links">
                <li><a href="Profil.html" class="color1">Profil</a></li>
=======
    
    <body>
        <header>
            <h1>Pour faire de l'engagement une valeur</h1>
            <image src="logo.png" height="150" onclick="Accueil()"></image>
        </header>
        <nav>
            <ul class="nav-links">
                <li><a href="Jeune.php" class="color1">Profil</a></li>
>>>>>>> Coco
                <li><a href="References.php" class="color2">Références</a></li>
            </ul>
        </nav>
        <div class="cv">
        <?php
<<<<<<< HEAD
        // Lire le fichier JSON
        $cv = json_decode(file_get_contents('Data2.json'),true);
=======
        
        // Lire le fichier JSON
        //$cv = json_decode(file_get_contents('Data2.json'),true);
>>>>>>> Coco
        // Écrire le HTML dans un fichier temporaire
        // $tempFile = 'temp.html';
        // file_put_contents($tempFile, $html);

        // Rediriger vers la page HTML
<<<<<<< HEAD
        // header("Location: $tempFile");
        ?>
=======
        // header("Location: $tempFile");exit();
        ?>
        <!-- création d'un pdf recapitulant les references validés du jeune -->
        <form method='POST' action='CVpdf.php'>
            <?php
            $mail = "270jluismetmongrosdoigtdpied@yahoo.fr";//$_COOKIE['mail'];
            $DATA = json_decode(file_get_contents("Profil/$mail/Reference.json"),true);
            $nbref = count($DATA['Reference']);
            $nbRefValide = 0;
            $RefV = array();
            for($i = 0; $i<$nbref; $i++){
                if($DATA['Reference'][$i]["verif"] == 1){
                    if($DATA['Reference'][$i]["archiver"] == 0){
                        $nbref++;
                        array_push($RefV,$DATA['Reference'][$i]);
                    }
                }
            }
            if($nbref ==0){
                echo("vous n'avez pas de reference validé non archivé");
            }else{
                echo("<p> Veuillez selectionner les références que vous souhaitez imprimer </p>");
                echo("<input type='checkbox' name='selection' onclick='Selection()'><label for'selection'> tout selectionner</label><br>");
                for($i = 0; $i<$nbref; $i++){
                    echo
                }
            }
            ?>
        </form>
>>>>>>> Coco
        </div>
        <script>
            function Accueil(){
                document.location.href="../Visiteur.php";
            }
<<<<<<< HEAD
            function generatePDF(){
=======
            /*function generatePDF(){
>>>>>>> Coco
                // Utiliser une bibliothèque JavaScript pour convertir le HTML en PDF
                // Par exemple, vous pouvez utiliser jsPDF ou html2pdf
                // Voici un exemple avec jsPDF :
                var pdf = new jsPDF();
                pdf.fromHTML(document.body, 15, 15);
                pdf.save('output.pdf');
<<<<<<< HEAD
            }
=======
            }*/
>>>>>>> Coco
        </script>
    </body>
</html>