<?php $title = 'Page de profil'; ?>
<?php $description = 'Boutique en ligne, Page de profil'; ?>
<!-- Début du contenu -->
<?php ob_start(); ?>

<nav>
    <ul>
        <li><a href="profil.php"><i class="fas fa-user-circle"></i>Profil</a></li>
        <li><a href="logout.php"><i class="fas fa-sign-out-alt"></i>Logout</a></li>
    </ul>
</nav>

<section class="section-profil">
    <h2>Profil</h2>
        <div class="img-profil">
            <img src="img/salle de formation.jpg" alt="">
        </div>

    <p><?php if(isset($_SESSION['prenom'])){
    echo "Bonjour ".$_SESSION['prenom']; }?><br/>
    It is a long established fact that a reader will be distracted by 
    page when looking at its layout. The point of using Lorem 
    evolved over the years, sometimes by accident, sometimes on purpose.</p>

    <p>Les détails de votre compte sont ci-dessous</p>

    <form class="profil" action="#" method="post">

        <label for="prenom">Prenom:<?=$prenom?></label>
        <input type="text" id="prenom" name="prenom"require pattern="^[a-zA-Z'-]+$" maxlength="20">

        <label for="nom">Nom:<?=$nom?></label>
        <input type="text" id="nom" name="nom"require pattern="^[a-zA-Z'-]+$">

        <?php if (isset($_SESSION['id-admin'])) { ?>
            <label>&nbsp;</label>
        <input type="submit" name="button" id="button" value="Admin"/>
        <?php }?>
        
    </form> 


    <h3>Modifier les Coordonnées</h3>

    <form class="form-coor" action="" method="post">
        
    <label for="prenom">Prenom:</label>
        <p><?=$_SESSION['Prenom']?></p>
        <input type="text" id="prenom" name="prenom"require pattern="^[a-zA-Z'-]+$" maxlength="20">

        <label for="nom">Nom:<?=$nom?></label>
        <input type="text" id="nom" name="nom" require pattern="^[a-zA-Z'-]+$">

        <label for="nouveauMail">Adresse Mail:<?=$mail?></label>
        <input type="text" id="nouveauMail" name="nouveauMail"
                require pattern="[A-Za-z0-9](([_\.\-]?[a-zA-Z0-9]+)*)@([A-Za-z0-9]+)(([_\.\-]?[a-zA-Z0-9]+)*)\.([A-Za-z]{2,})">


        <input type="submit"  name="modifier" id="button" value="Enregistrer">
    </form>



    <h3>Modifier le Mot de Passe</h3>

    <form class="form-mdp" action="" method="post">
        
        <label for="password"><i class="fas fa-lock"></i>Ancien Mot de passe</label>
        <input type="password" name="password" placeholder="Password" id="mot_de_passe">

        <label for="nouveauPassword"><i class="fas fa-lock"></i>Nouveau Mot de passe</label>
        <input type="password" id="nouveauPassword"value="<?= $_SESSION['prenom']['password']?>" name="nouveauPassword">

        <input type="submit"  name="modifier" id="button" value="Enregistrer">
    </form>

        <!-- Message d'erreur -->
    <?php //$user->error()?> 

</section>

<!-- Fin du contenu qu'on place dans $content -->
<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>



