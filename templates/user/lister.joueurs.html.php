<?php 
if (isset($_GET['page'])) {
    $page = $_GET['page'];
} else {
    $page = 1;
}
?>
<div class="rightcontain listerjoueurs">
    <div class="liste">
        <?php $nbrPages = lister_joueurs($page); ?>
    </div>
    <div class="paginationlistjoueur">
        <span id="precedent"><a style="<?php if($page <= 1){echo "visibility:hidden";} ?>" href="<?php echo WEBROOT."?controller=user&action=accueil&choice=lister.joueurs&page=".$page-1; ?>">Precedent</a></span>
        <span style="<?php if($page >= $nbrPages){echo "visibility:hidden";} ?>" id="suivant"><a href="<?php echo WEBROOT."?controller=user&action=accueil&choice=lister.joueurs&page=".$page+1; ?>">Suivant</a></span>
    </div>
</div>