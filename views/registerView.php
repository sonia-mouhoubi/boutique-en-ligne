<?php $title = 'Page inscription'; ?>
<?php $description = 'Boutique en ligne, page d\'inscription'; ?>


<!-- Début du contenu -->
<?php ob_start(); ?>

<section>
    <form class="form" action="" method="post">
                <label for="login">Login</label>
        <input type="text" id="login" name="login">
        
        <label for="password">Mot de passe</label>
        <input type="password" id="password" name="password">

        <label for="password2">Mot de passe</label>
        <input type="password" id="password2" name="password2">

        <input type="submit" id="button" name="button">
    </form>
            <?php //$user->error()?>
</section>

<!-- Fin du contenu qu'on place dans $content -->
<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>
