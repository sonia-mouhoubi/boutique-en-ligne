<?php 
$title = 'Page inscription'; 
$description = 'Boutique en ligne, page d\'inscription'; 
$css = 'public/css/styles.css';

ob_start(); 
?>

<section class="section-inscription">
        <h2>Inscription</h2>

        <form class="form" action="" method="post">
                <label for="firstName">Prenom</label>
                <input type="text" id="firstName" name="prenom"  placeholder="Votre Prenom"
                        require pattern="^[a-zA-Z'-]+$" maxlength="20">

                        
                <label for="name">Nom</label>
                <input type="text" id="name" name="nom" placeholder="Nom"
                        require pattern="^[a-zA-Z'-]+$">


                <label for="mail">Adresse Mail</label>
                <input type="email" id="mail" name="mail" placeholder="Votre Adresse mail"
                        require pattern="[A-Za-z0-9](([_\.\-]?[a-zA-Z0-9]+)*)@([A-Za-z0-9]+)(([_\.\-]?[a-zA-Z0-9]+)*)\.([A-Za-z]{2,})">


                <label for="password">Mot de passe</label>
                <input type="password" id="password" name="mot_de_passe" placeholder="Mot de passe" 
                        minlength="4" maxlength="8" required>
                        

                <label for="password2">Confirmation du Mot de passe</label>
                <input type="password" id="password2" name="confirMdp2" placeholder="Confirmer le Mot de passe">

                <input type="submit" id="button" name="register" value="inscription">
        </form>



<!-- Fin du contenu qu'on place dans $content -->
<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>

