<?php $title = 'Page inscription'; ?>
<?php $description = 'Boutique en ligne, page d\'inscription'; ?>
<!-- Début du contenu -->
<?php ob_start(); ?>

<section class="section-inscription">

    <form class="form" action="" method="post">
        <label for="prenom">Prenom</label>
        <input type="text" id="prenom" name="prenom"
                require pattern="^[a-zA-Z'-]+$" maxlength="20">

                
        <label for="nom">Nom</label>
        <input type="text" id="nom" name="nom"
                require pattern="^[a-zA-Z'-]+$">


        <label for="mail">Adresse Mail</label>
        <input type="text" id="mail" name="mail"
                require pattern="[A-Za-z0-9](([_\.\-]?[a-zA-Z0-9]+)*)@([A-Za-z0-9]+)(([_\.\-]?[a-zA-Z0-9]+)*)\.([A-Za-z]{2,})">


        <label for="password">Mot de passe</label>
        <input type="password" id="mot_de_passe" name="password" minlength="4" maxlength="8" required>
                

        <label for="password2">Confirmation du Mot de passe</label>
        <input type="password" id="password2" name="password2">
   
        <input type="submit" id="button" name="button" value="inscription">
    </form>
            <?php //$user->error()?>
</section>




<!-- Fin du contenu qu'on place dans $content -->
<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>

