<?php 
    $title = 'Page de profil'; 
    $description = 'Boutique en ligne, Page de profil';
    $css = 'public/css/styles.css';
ob_start(); 
?>

<nav>
    <ul>
        <li><a href="profil.php"><i class="fas fa-user-circle"></i>Profil</a></li>
        <li><a href="controllers/deconnexion.php"><i class="fas fa-sign-out-alt"></i>Logout</a></li>

    </ul>
</nav> 


<section class="section-profil">
    <h2>Vos informations personnelles</h2>

    <!-- <a href="controllers/deconnexion.php">Me Déconnecter</a> -->


    <p><?php if (isset($_SESSION['id'])) {
            echo "Bonjour " . $infousers['prenom'] . "<br>" . 'Bienvenue sur votre profil';
        } ?>
    </p>
    

    <form class="profil" action="#" method="post">
        <label for="prenom">Prenom:</label>
        <input type="text" value="<?= $_SESSION['prenom'] ?>" id="prenom" name="prenom" require pattern="^[a-zA-Z'-]+$" maxlength="20">

        <button type="submit" name="submit">Modifier</button>
    </form>

    
    <form class="profil" action="#" method="post">
        <label for="nom">Nom:</label>
        <input type="text" value="<?= $_SESSION['nom'] ?>" id="nom" name="nom" require pattern="^[a-zA-Z'-]+$">

        <button type="submit" name="submit">Modifier</button>
    </form>

    <form class="profil" action="#" method="post">
        <label for="nouveauMail">Adresse Mail:</label>
        <input type="email" value="<?= $_SESSION['mail'] ?>" id="nouveauMail" name="nouveauMail" require pattern="[A-Za-z0-9](([_\.\-]?[a-zA-Z0-9]+)*)@([A-Za-z0-9]+)(([_\.\-]?[a-zA-Z0-9]+)*)\.([A-Za-z]{2,})">

        <button type="submit" name="submit">Modifier</button>
    </form>


    <button onclick="maFonctionFormMdp()">Modifier le Mot de Passe</button>

    <div id="FormMdp">
        <h3>Modifier le Mot de Passe</h3>
        <form action="#" method="post">
            <label for="password"><i class="fas fa-lock"></i>Mot de passe</label>
            <input type="password" name="mot_de_passe" placeholder="Password" id="mot_de_passe">

            <label for="newPassword"><i class="fas fa-lock"></i>Confirmation du Mot de passe</label>
            <input type="password" id="newPassword" name="nouveaumot_de_passe">

            <button type="submit" name="mdp" value="Admin">Modifier</button>
        </form>
    </div>
    

        <?php if (isset($_SESSION['id-admin'])) { ?>
            <label>&nbsp;</label>
            <input type="submit" name="Admin" id="button" value="Admin" />
        <?php } ?>
    </form>
    <!-- Message d'erreur -->
    <?php //$user->error()
    ?>
</section>


<!-- Fin du contenu qu'on place dans $content -->
<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>

