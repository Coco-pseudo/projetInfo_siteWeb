<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Jeune 6.4</title>
        <link rel="icon" type="image/png" href="logo.png">
        <link rel="stylesheet" type="text/css" href="Consultant.css">
    </head>
    
    <header>
        <h1>Pour faire de l'engagement une valeur</h1>
        <image src="logo.png" height="150" onclick="Accueil()"></image>
    </header>
    <body>
        <nav>
            <ul class="nav-links">
                <li><a href="ConsJeune.php" class="color1">Profil du Jeune</a></li>
                <li><a href="ConsRef.php" class="color2">Liste des Références</a></li>
            </ul>
        </nav>
        <div class="articles">
            <div class="article1">
                <div class="titre">De quoi s'agit-il ?</div>
                <p class="para">D'une opportunité : celle qu'un engagement quel qu'il soit puisse être considérer à sa juste valeur ! 
                    <br>Toute expérience est source d''enrichissement et doit d'être reconnu largement.
                    <br> Elle révèle un potentiel, l'expression d'un savoir-être à concrétiser.</p>
            </div>
            <div class="article2">
                <div class="titre">A qui s'adresse-t'il ?</div>
                <p class="para">A vous, jeunes entre 16 et 30 ans, qui vous êtes investis spontanément dans une association ou dans tout type d'action formelle ou informelle, et qui avez partagé de votre temps, de votre énergie, pour apporter un soutien, une aide, une compétence.
                    <br>A vous, responsables de structures ou référents d'un jour, qui avez croisé la route de ces jeunes et avez bénéficié même ponctuellement de cette implication citoyenne !
                    C'est l'occasion de vous engager à votre tour pour ces jeunes en confirmant leur richesse pour en avoir été un temps les témoins mais aussi les bénéficiaires !
                    <br>A vous, employeurs, recruteurs en ressources humaines, représentants
                    d'organismes de formation, qui recevez ces jeunes, pour un emploi, un stage, un cursus de qualification, pour qui le savoir-être constitue le premier fondement de toute capacité humaine.</p>
            </div>
        </div>
        <div class="ressource">
            Cet engagement est une ressource à valoriser au fil d'un parcours en 3 étapes :
        </div>
        <div class="carres">
            <div class="carre1">
                <div class="titre1">1ère étape : la valorisation</div>
                <div class="para1">Décrivez votre expérience et mettez en avant ce que vous en avez retiré.</div>
            </div>
            <div class="carre2">
                <div class="titre2">2ème étape : la confirmation</div>
                <div class="para2">Confirmez cette expérience et ce que vous avez pu constater au contact de ce jeune.</div>
            </div>
            <div class="carre3">
                <div class="titre3">3ème étape : la consultation</div>
                <div class="para3">Validez cet engagement en prenant en compte sa valeur.</div>
            </div>
        </div>
        <script>
            function Accueil(){
                document.location.href="Consultant.php";
            }
        </script>
    </body>
</html>