<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Jeune 6.4</title>
        <link rel="icon" type="image/png" href="logo.png">
        <link rel="stylesheet" type="text/css" href="CV.css">
    </head>
    
    <header>
        <h1>Pour faire de l'engagement une valeur</h1>
        <image src="logo.png" height="150" onclick="Accueil()"></image>
    </header>
    <body>
        <nav>
            <ul class="nav-links">
                <li><a href="Profil.html" class="color1">Profil</a></li>
                <li><a href="References.php" class="color2">Références</a></li>
            </ul>
        </nav>
        <div class="cv">
        <?php
        // Lire le fichier JSON
        $cv = json_decode(file_get_contents('Data2.json'),true);
        // Écrire le HTML dans un fichier temporaire
        // $tempFile = 'temp.html';
        // file_put_contents($tempFile, $html);

        // Rediriger vers la page HTML
        // header("Location: $tempFile");
        ?>
        </div>
        <script>
            function Accueil(){
                document.location.href="../Visiteur.php";
            }
            function generatePDF(){
                // Utiliser une bibliothèque JavaScript pour convertir le HTML en PDF
                // Par exemple, vous pouvez utiliser jsPDF ou html2pdf
                // Voici un exemple avec jsPDF :
                var pdf = new jsPDF();
                pdf.fromHTML(document.body, 15, 15);
                pdf.save('output.pdf');
            }
        </script>
    </body>
</html>