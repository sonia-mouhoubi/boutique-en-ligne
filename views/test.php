<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
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

        <label for="prenom">Prenom:</label>
        <p><?=$_SESSION['Prenom']?></p>
        <input type="text" id="prenom" name="prenom"
                require pattern="^[a-zA-Z'-]+$" maxlength="20">

        <label for="nom">Nom:<?=$nom?></label>
        <input type="text" id="nom" name="nom"
                require pattern="^[a-zA-Z'-]+$">

        <label for="nouveauMail"><?=$mail?></label>
        <input type="text" id="nouveauMail" name="nouveauMail"
                require pattern="[A-Za-z0-9](([_\.\-]?[a-zA-Z0-9]+)*)@([A-Za-z0-9]+)(([_\.\-]?[a-zA-Z0-9]+)*)\.([A-Za-z]{2,})">

        <label for="password">Mot de passe</label>
        <input type="password" id="mot_de_passe" name="password" minlength="4" maxlength="8" required>

        <label for="nouveauPassword">Confirmation du Mot de passe</label>
        <input type="password" id="nouveauPassword" name="nouveauPassword">

        <button class="coordonnees" type="button">Coordonnées</button>
    <button class="mdp" type="button">Mot de passe</button>

        <?php if (isset($_SESSION['id-admin'])) { ?>
            <label>&nbsp;</label>
        <input type="submit" name="button" id="button" value="Admin"/>
        <?php }?>
        
    </form> 


    

    <h3>Modifier les Coordonnées</h3>

    <form class="form" action="" method="post">
        
        <label for="password"><i class="fas fa-lock"></i>Mot de passe</label>
        <input type="password" name="password" placeholder="Password" id="mot_de_passe">

        <label for="nouveauPassword"><i class="fas fa-lock"></i>Confirmation du Mot de passe</label>
        <input type="password" id="nouveauPassword" name="nouveauPassword">

        <input type="submit"  name="modifier" id="button" value="Enregistrer">
    </form>


    <h3>Modifier le Mot de Passe</h3>

    <form class="form" action="" method="post">
        
        <label for="password"><i class="fas fa-lock"></i>Ancien Mot de passe</label>
        <input type="password" name="password" placeholder="Password" id="mot_de_passe">

        <label for="nouveauPassword"><i class="fas fa-lock"></i>Nouveau Mot de passe</label>
        <input type="password" id="nouveauPassword" name="nouveauPassword">

        <input type="submit"  name="modifier" id="button" value="Enregistrer">
    </form>

        <!-- Message d'erreur -->
    <?php //$user->error()?> 

</section>
</body>
</html>