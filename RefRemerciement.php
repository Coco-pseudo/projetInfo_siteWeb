<!DOCTYPE html>
<html>
    <!-- Comprend le titre de la page et la page css associé -->
    <head>
        <meta charset="utf-8">
        <title>Jeune 6.4</title>
        <link rel="icon" type="image/png" href="logo.png">
        <link rel="stylesheet" type="text/css" href="RefRemerciement.css">
    </head>
    
    <body>
    <!-- Bannière comprenant le logo et le slogan -->
        <header>
            <h1>Pour faire de l'engagement une valeur</h1>
            <image src="logo.png" height="150" onclick="Accueil()"></image>
        </header>
        <!-- Barre de navigation -->
        <nav>
            <ul class="nav-links">
                <li><a href="Visiteur.php" class="color1">Accueil</a></li>
            </ul>
        </nav>
        <!-- Contenu de la page -->
        <div class="articles">
            <h2 class="ressource">Merci beaucoup pour votre participation</h2>
            <h3 class="ressource2">A bientot sur Jeune 6.4</h3>
        </div>
        <script>
            function Accueil(){
                document.location.href="Visiteur.php"; // Permet de retourner sur Visteur.php en cliquant sur le logo dans la bannière
            }
        </script>
    </body>        
</html>