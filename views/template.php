<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title><?= $title ?></title>
        <meta name="description" content="<?= $description ?>">

        <!-- <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css"> -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet">
        <link href="public/css/styles.css" rel="stylesheet" /> 
    <?php 
    if (isset($_GET['url'])) {
        $val = substr($_GET['url'], 14);

        if($_GET['url'] == 'admin') { ?>
            <link href="../public/css/styles.css" rel="stylesheet" /> <?php
        }
        elseif($_GET['url'] == "admin/produit/$val") { ?>
            <link href="../../public/css/styles.css" rel="stylesheet" /> <?php

        }
        else { ?>
            <link href="../public/css/styles.css" rel="stylesheet" /> <?php
        } 
    }?>
    </head>
        
    <body>
        <header>
            <nav class="nav">
                <ul>
                    <li><a href="/plateforme/boutique-en-ligne/accueil">My HAIR</a></li>
                    <li><a href="">Cheveux +</a>
                        <ul class="deroulant"> 
                            <li><a href="/plateforme/boutique-en-ligne/cheveux-raides">Cheveux raides</a></li>
                            <li><a href="/plateforme/boutique-en-ligne/cheveux-boucles">Cheveux bouclés</a></li>
                            <li><a href="/plateforme/boutique-en-ligne/cheveux-frises">Cheveux crépus</a></li>                            
                        </ul>
                    </li>
                    <li><a href="">Produits +</a>
                        <ul class="deroulant"> 
                            <li><a href="/plateforme/boutique-en-ligne/shampoing">Shampoing</a></li>
                            <li><a href="/plateforme/boutique-en-ligne/apres-shampoing">Aprés-shampoing</a></li>
                            <li><a href="/plateforme/boutique-en-ligne/soin">Soin</a></li>                            
                        </ul>
                    </li>
                    <li><a href="/projectpool2/boutique-en-ligne/nouveaute">Nouveauté</a></li>
                    <li><a href="/projectpool2/boutique-en-ligne/inscription">Inscription</a></li>
                    <li><a href="/projectpool2/boutique-en-ligne/connexion">Connexion</a></li>
                    <li><a href="/projectpool2/boutique-en-ligne/profil">Profil</a></li>
                    <li><a href="/projectpool2/boutique-en-ligne/admin/ajout-produit">Administration</a></li>
                    <li><a href="/projectpool2/boutique-en-ligne/contact">Contact</a></li>
                    <li><a href="/projectpool2/boutique-en-ligne/"><img src="../public/img/search.svg" alt="Recherche"></a></li>
                    <li><a href="/projectpool2/boutique-en-ligne/"><img src="../public/img/panier.svg" alt="Panier"></a></li>
                </ul>
            </nav>
        </header>

        <main>
             <!-- Contenus différents pour chaques pages -->
            <?= $content ?> 
        </main>
       
        <footer>
            <div>
                <a href=""><img src="./public/img/linkedin.png" alt="Logo Linkedin">
                <a href=""><img src="./public/img/facebook.png" alt="Logo Facebook">
                <a href=""><img src="./public/img/instagram.png" alt="Logo Instagram"></a>
            </div>
            <a href="">Mentions légales</a>
            <a href="">CGU/CGV</a>
            <a href="mailto:contact@myhair.io">Contactez-nous</a>

            <a href="https://github.com/sonia-mouhoubi/boutique-en-ligne">Github</a>
        </footer>
    </body>
</html>