<?php

require_once(PATH_VIEWS."include".DIRECTORY_SEPARATOR."header.html.php");

?>


<div class="containlogin">
    <div class="login">
        <div class="loginheader">
            <h1> Se Connexion</h1>
        </div>
        <div class="loginbody">
            <form action="<?php WEBROOT ?>" method="post">
            
                <input type="hidden" name="controller" value="securite" >
                <input type="hidden" name="action" value="connexion" >

                <div class="logininput">
                    <label for="login">Login</label><input type="text" class="login" name="login" id="login" value="<?php if (isset($_SESSION['errorauth'])) {echo $_SESSION['post']['login'];} ?>"><i class="bi bi-check2-circle"></i><i class="bi bi-x-octagon"></i>
                    <small></small>
                </div>
                <div class="logininput">
                    <label for="password">Password</label><input type="password" class="password" name="password" id="password" value=""><i class="bi bi-check2-circle"></i><i class="bi bi-x-octagon"></i>
                    <small><?php if (isset($_SESSION['errorauth'])) {echo $_SESSION['errorauth']; unset($_SESSION['errorauth']);} ?></small>
                </div>

                <div class="loginsubmit">
                    <input type="submit" id="loginbtn" value="Connexion">
                    <a href="<?php echo WEBROOT."?controller=securite&action=inscription"; ?>">S'inscrire pour jouer?</a>
                </div>
            </form>
        </div>
    </div>
</div>


<?php

require_once(PATH_VIEWS."include".DIRECTORY_SEPARATOR."footer.html.php");

?>