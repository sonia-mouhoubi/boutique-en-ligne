<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title><?= $title ?></title>
        <meta name="description" content="<?= $description ?>">
        <link href="public/css/style.css" rel="stylesheet" /> 
    </head>
        
    <body>
        <header>
            <nav>
                <ul>
                    <li>Accueil</li>
                    <li>Boutique</li>
                    <li>Inscription</li>
                    <li>Connexion</li>
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