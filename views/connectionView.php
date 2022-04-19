<?php $title = 'Page de connexion'; ?>
<?php $description = 'Boutique en ligne, page de connexion'; ?>

<!-- Début du contenu -->
<?php ob_start(); ?>

<section class="section-connexion">
    <h2>Connexion</h2>

    <form class="form" action="" method="post">
        
        <label for="mail"><i class="fas fa-user"></i>Mail</label>
        <input type="text" name="mail" placeholder="mail" id="mail"
            require pattern="[A-Za-z0-9](([_\.\-]?[a-zA-Z0-9]+)*)@([A-Za-z0-9]+)(([_\.\-]?[a-zA-Z0-9]+)*)\.([A-Za-z]{2,})">
        
        <label for="password"><i class="fas fa-lock"></i>Mot de passe</label>
        <input type="password" name="password" placeholder="Password" id="mot_de_passe">

        <input type="submit"  name="button" id="button" value="connexion">
        <!-- Message d'erreur -->
        <?php //$user->error()?>
    </form>
</section>

<!-- Fin du contenu qu'on place dans $content -->
<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>



