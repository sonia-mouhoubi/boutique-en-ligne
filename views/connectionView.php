<?php $title = 'Page de connexion'; ?>
<?php $description = 'Boutique en ligne, page de connexion'; ?>

<!-- Début du contenu -->
<?php ob_start(); ?>

<section class="section-connexion">
    <h2>Connexion</h2>

    <form class="form" action="" method="post">
        <label for="login">Login</label>
        <input type="text" id="login" name="login">
        
        <label for="password">Mot de passe</label>
        <input type="password" id="password" name="password">

        <input type="submit" id="button" name="button">
        <!-- Message d'erreur -->
        <!-- <?php $user->error()?> -->
    </form>
</section>

<!-- Fin du contenu qu'on place dans $content -->
<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>
