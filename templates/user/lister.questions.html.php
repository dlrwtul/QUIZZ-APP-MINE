<?php 
if (isset($_GET['page'])) {
    $page = $_GET['page'];
} else {
    $page = 1;
}
if (isset($_SESSION['nbrElementsPage'])) {
    $nbrElementsPage = $_SESSION['nbrElementsPage'];
}else {
    $nbrElementsPage = 5;
}

?>
<div class="rightcontain listerquestions">
    <form action="<?php WEBROOT ?>" method="POST">
        <input type="hidden" name="controller" value="question">
        <input type="hidden" name="action" value="lister">
        <label for="nbrElementsPage">nbre questions/jeu</label><input type="text" class="nbrElementsPage" name="nbrElementsPage" id="nbrElementsPage" value="<?php if(isset($_SESSION['nbrElementsPage'])){echo $_SESSION['nbrElementsPage'];} ?>">
        <small></small>
        <input type="submit" id="subnbrElementsPage" value="ok">
    </form>
    <div class="listequestions">
        <?php $nbrPages = lister_questions($page,$nbrElementsPage); ?>
    </div>
    <div class="paginationlistquestion">
        <span id="precedent"><a style="<?php if($page <= 1){echo "visibility:hidden";} ?>" href="<?php echo WEBROOT."?controller=user&action=accueil&choice=lister.questions&page=".$page-1; ?>">Precedent</a></span>
        <span style="<?php if($page >= $nbrPages){echo "visibility:hidden";} ?>" id="suivant"><a href="<?php echo WEBROOT."?controller=user&action=accueil&choice=lister.questions&page=".$page+1; ?>">Suivant</a></span>
    </div>
</div>

<?