<?php $title = 'Page profil'; ?>
<?php $description = 'Boutique en ligne, page profil'; ?>

<!-- Début du contenu -->
<?php ob_start(); ?>

<section class="section-connexion">
    <h2>Profil</h2>
    <h2>Bienvenue :  <?= $_SESSION["user"]["login"]?></h2>
    <section class="Profil">
        <article>
            <div class="login-form">
                <form method="post">
                    <div class="form-group">
                        <input type="text" name="login" value="" placeholder="Identifiant">
                        </div>
                        <?php
                        if(isset($_SESSION['error']))
                        {
                            echo $_SESSION['error'];
                        }
                        ?>
                    <div class="form-group">
                        <input type="submit" name="submit" class="btn btn-info" value="mise à jour du login">
                    </div>
                </form>
            </div>
        </article>
        
        <?php
        $userEmail = new User();
        if (isset($_POST['submit-login'])) {
            $userEmail->updateEmail($_POST['email']);
        }
        ?>
        <article>
            <div class="email-form">
                <form method="post">
                    <div class="form-group">
                        <input type="text" name="email" value="" placeholder="email">
                        </div>
                        <?php
                        if(isset($_SESSION['error']))
                        {
                            echo $_SESSION['error'];
                        }
                        ?>
                    <div class="form-group">
                        <input type="submit" name="submit-login" class="btn btn-info" value="mise à jour de l'email">
                    </div>
                </form>
            </div>
        </article>

        <?php
        $userData = new User();
        if (isset($_POST['register'])) {
            $userData->updatepassword($_POST['password'], $_POST['passwordConfirm']);
        }
        ?>
        <article>
            <div class="login-form">
                <form method="post">
                    <div class="form-group">
                        <input type="password" name="password" value="" placeholder="password">
                    </div>
                    <div class="form-group">
                        <input type="password" name="passwordConfirm" value="" placeholder="passwordConfirm">
                    </div>
                    <?php
                        if(isset($_SESSION['error']))
                        {
                            echo $_SESSION['error'];
                        }
                        ?>

                    <button type="register" name="register" class="btn btn-info" value="mise à jour du password">Mise à jour du password</button>
                </form>
            </div>
        </article>

    </section>
<h2>Voici vos  informations. Votre identifiant est  <?= $_SESSION["user"]["login"]?> et votre email est  "<?= $_SESSION["user"]["email"]?>".</h2>

    
</section>

<!-- Fin du contenu qu'on place dans $content -->
<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>
