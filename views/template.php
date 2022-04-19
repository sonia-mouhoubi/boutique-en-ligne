<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title><?= $title ?></title>
        <meta name="description" content="<?= $description ?>">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
        <link href="public/css/style.css" rel="stylesheet" /> 
    </head>
        
    <body>
        <header>
            <nav>
                <ul>
                    <li><a href="accueil">Accueil</a></li>
                    <li><a href="inscription">Inscription</a></li>
                    <li><a href="connexion">Connexion</a></li>
                    <li><a href="profil">Profil</a></li>    
                    <li>Contact</li>
                </ul>
            </nav>
        </header>

        <main>
             <!-- Contenus différents pour chaques pages -->
            <?= $content ?> 
        </main>
       
        <footer>
            <a href="">Facebook</a>
            <a href="">Instagram</a>
        </footer>
    </body>
</html>