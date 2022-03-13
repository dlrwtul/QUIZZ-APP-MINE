<?php
if (!is_connected()) {
    require_once(PATH_VIEWS."include".DIRECTORY_SEPARATOR."header.html.php");
}

if (!is_connected()) {
    ?>
    <div class="containsubscribe">
<?php
}else {
?>
    <div class="rightcontain ajouteradmin">
<?php
}
?>
    <div class="subscribe <?php if (!is_connected()) {echo "PI";} ?>">
        <div class="subscribebody">
            <form action="<?php WEBROOT ?>" enctype="multipart/form-data" method="post">

                <div class="subscribeleft">
                    <div class="subscribeleftheader">
                        <h1> Inscription <?php if (!is_connected()) {echo "Joueur";}else {echo "Admin";} ?></h1><h4>lutwrld inscrire lutwrld inscrire</h4>
                    </div>
                    <input type="hidden" name="controller" value="<?php if (!is_connected()) {echo "securite";}else {echo "user";} ?>" >
                    <input type="hidden" name="action" value="inscription" >
                    <small style="color: green;"><?php if (isset($_GET['true'])) {echo "Iscription reussie !";} ?></small>
                    <div class="subscribeinput">
                        <label for="firstname">Prenom</label><input type="text" class="firstname" name="firstname" id="firstname" value="<?php if (isset($_SESSION['error'])) {echo $_SESSION['post']['firstname'];} ?>"><!-- <i class="bi bi-check2-circle"></i><i class="bi bi-x-octagon"></i> -->
                        <small></small>
                    </div>
                    <div class="subscribeinput">
                        <label for="lastname">Nom</label><input type="text" class="lastname" name="lastname" id="lastname" value="<?php if (isset($_SESSION['error'])) {echo $_SESSION['post']['lastname'];} ?>"><!-- <i class="bi bi-check2-circle"></i><i class="bi bi-x-octagon"></i> -->
                        <small></small>
                    </div>
                    <div class="subscribeinput">
                        <label for="login">Login</label><input type="text" class="loginsub" name="loginsub" id="loginsub" value="<?php if (isset($_SESSION['error'])) {echo $_SESSION['post']['loginsub'];unset($_SESSION['error']);} ?>"><!-- <i class="bi bi-check2-circle"></i><i class="bi bi-x-octagon"></i> -->
                        <small></small>
                    </div>
                    <div class="subscribeinput">
                        <label for="password">Password</label><input type="password" class="passwordsub" name="passwordsub" id="passwordsub" value=""><!-- <i class="bi bi-check2-circle"></i><i class="bi bi-x-octagon"></i> -->
                        <small></small>
                    </div>
                    <div class="subscribeinput">
                        <label for="cpassword">Password</label><input type="password" class="cpasswordsub" name="cpasswordsub" id="cpasswordsub" value=""><!-- <i class="bi bi-check2-circle"></i><i class="bi bi-x-octagon"></i> -->
                        <small><?php if (isset($_SESSION['loginpresent'])) {echo $_SESSION['loginpresent'];unset($_SESSION['loginpresent']);} ?></small>
                    </div>
                    <div class="subscribesubmit">
                        <span><input type="submit" id="subbtn" value="Inscription"></span>
                        <span style="<?php if(is_connected()){echo "display:none";} ?>" ><a href="<?php echo WEBROOT."?controller=securite&action=connexion"; ?>">Se connecter pour jouer?</a></span>
                    </div>
                </div>
                <div class="subscriberight">
                    <label for="avatarsub">
                        <div class="imgavatar">
                            <img id="avatarimg" src="<?php echo WEBROOT."img".DIRECTORY_SEPARATOR."avatar.png"; ?>" alt="">
                            <small></small>
                            <h2>choisir un avatar</h2>
                        </div>
                    </label>
                    <input type="file" name="avatar" id="avatarsub" value="<?php if (isset($_SESSION['error'])) {echo $_SESSION['files']['avatar']['name'];unset($_SESSION['error']);} ?>">
                    <h2>Avatar <?php if (!is_connected()) {echo "du Joueur";}else {echo "Admin";} ?></h2>
                </div>

            </form>
        </div>
        <div class="escalier"></div>
        <div class="escalier"></div>
        <div class="escalier"></div>
        <div class="escalier"></div>
    </div>
</div>
<?php
if (!is_connected()) {
    require_once(PATH_VIEWS."include".DIRECTORY_SEPARATOR."footer.html.php");
}
?>