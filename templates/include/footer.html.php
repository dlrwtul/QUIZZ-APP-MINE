
    </div>
    <script src="<?php 
    if (isset($_REQUEST['action'])) {
        switch ($_REQUEST['action']) {
            case 'inscription':
                echo WEBROOT."js".DIRECTORY_SEPARATOR."subscribe.js";
                break;
            default:
                if (is_connected()) {
                    echo WEBROOT."js".DIRECTORY_SEPARATOR."subscribe.js";
                    break;
                }
                echo WEBROOT."js".DIRECTORY_SEPARATOR."login.js";
                break;
        }
    }else {
        echo WEBROOT."js".DIRECTORY_SEPARATOR."login.js";
    }
    ?>"></script>
    <script src="<?php echo WEBROOT."js".DIRECTORY_SEPARATOR."ajouter.question.js"; ?>"></script>
    <script src="<?php echo WEBROOT."js".DIRECTORY_SEPARATOR."accueil.js"; ?>"></script>
</body>
</html>