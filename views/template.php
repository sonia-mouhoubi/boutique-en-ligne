<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title><?= $title ?></title>
        <meta name="description" content="<?= $description ?>">
        <link href="public/css/styles.css" rel="stylesheet" /> 

    <?php 
    if (isset($_GET['url'])) {
        if($_GET['url'] == 'admin/ajout-categorie') { ?>
            <link href="../public/css/styles.css" rel="stylesheet" /> <?php
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
                    <li><a href="accueil">My HAIR</a></li>
                    <li><a href="">Cheveux +</a>
                        <ul class="deroulant"> 
                            <li><a href="cheveux-raides">Cheveux raides</a></li>
                            <li><a href="cheveux-boucles">Cheveux bouclés</a></li>
                            <li><a href="cheveux-frises">Cheveux crépus</a></li>                            
                        </ul>
                    </li>
                    <li><a href="">Produits +</a>
                        <ul class="deroulant"> 
                            <li><a href="shampoing">Shampoing</a></li>
                            <li><a href="apres-shampoing">Aprés-shampoing</a></li>
                            <li><a href="soin">Soin</a></li>                            
                        </ul>
                    </li>
                    <li><a href="nouveaute">Nouveauté</a></li>
                    <li><a href="inscription">Inscription</a></li>
                    <li><a href="connexion">Connexion</a></li>
                    <li><a href="profil">Profil</a></li>
                    <li><a href="admin">Admin</a></li>
                    <li><a href="contact">Contact</a></li>
                    <li><a href="panier">Panier</a></li>
                </ul>
            </nav>
        </header>

        <main>
             <!-- Contenus différents pour chaques pages -->
            <?= $content ?> 
        </main>
       
        <footer>
            <a href="">Facebook</a>
            <a href="">Maquette</a>
            <a href="">Github</a>
        </footer>
    </body>
</html>