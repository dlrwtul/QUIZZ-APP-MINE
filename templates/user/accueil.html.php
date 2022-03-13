<?php

require_once(PATH_VIEWS."include".DIRECTORY_SEPARATOR."header.html.php");

?>

<div class="containaccueil">
    <div class="accueil">
        <div class="menu">
            <h1>Admin</h1>
            <span id="deconnexion"><a href="<?php echo WEBROOT."?controller=securite&action=deconnexion"; ?>">Deconnexion</a></span>
        </div>
        <div class="bodyaccueil">
            <div class="leftcontain">
                <div class="menuleftcontainer">
                    <span class="avatarmenu">
                        <img src="<?php if (isset($_SESSION[USER_KEY]['avatar'])) {echo WEBROOT."uploads".DIRECTORY_SEPARATOR.$_SESSION[USER_KEY]['avatar'];} else {echo WEBROOT."img".DIRECTORY_SEPARATOR."avatar.png";}?>" alt="">
                    </span>
                    <h4>
                        Admin Admin
                    </h4>

                </div>
                <div class="bodyleftcontain">
                    <ul>
                        <li><a href="<?php echo WEBROOT."?controller=user&action=accueil&choice=lister.questions&page=1"; ?>"><span>Lister Questions</span><i class="bi bi-view-list"></i></a></li>
                        <li><a href="<?php echo WEBROOT."?controller=user&action=accueil&choice=ajouter.admin"; ?>"><span>Ajouter Admin</span><i class="bi bi-pencil-square"></i></a></li>
                        <li><a href="<?php echo WEBROOT."?controller=user&action=accueil&choice=lister.joueurs&page=1"; ?>"><span>Lister Joueurs</span><i class="bi bi-view-list"></i></a></li>
                        <li><a href="<?php echo WEBROOT."?controller=user&action=accueil&choice=ajouter.question"; ?>"><span>Ajouter Question</span><i class="bi bi-pencil-square"></i></a></li>
                    </ul>
                </div>
            </div>
            <?php echo $content_for_views; ?>
        </div>
    </div>
</div>

<?php

require_once(PATH_VIEWS."include".DIRECTORY_SEPARATOR."footer.html.php");

?>