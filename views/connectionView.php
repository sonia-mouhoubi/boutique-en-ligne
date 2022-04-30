<?php 
$title = 'Page de connexion';
$description = 'Boutique en ligne, page de connexion';
$css = 'public/css/styles.css';

ob_start(); 
?>

<section class="section-connexion">
    <h2>Connexion</h2>

    <form class="form" action="" method="post">
        
        <label for="mail"><i class="fas fa-user"></i>Mail</label>
        <input type="email" id="mail" name="mail" placeholder="Entrer Votre mail" 
            require pattern="[A-Za-z0-9](([_\.\-]?[a-zA-Z0-9]+)*)@([A-Za-z0-9]+)(([_\.\-]?[a-zA-Z0-9]+)*)\.([A-Za-z]{2,})">
        
        <label for="password"><i class="fas fa-lock"></i>Mot de passe</label>
        <input type="password" id="password" name="mot_de_passe" placeholder="Votre mot de passe" >

        <p classe="txtobligatoire">Tous les champs sont obligatoires</p>

        <button type="submit" name="formconnection" class="btn" value="valider">Me Connecter</button>
        <button type="reset" name="delete" class="btn" value="Annuler">Annuler</button>
                
        <!-- Message d'erreur -->
        <?php //$user->error()?>
    </form>
</section>

<!-- Fin du contenu qu'on place dans $content -->
<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>