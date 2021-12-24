<?php ob_start();
?>

<div class="row g-0 bg-light position-relative">
    <div class="col-md-6 mb-md-0 p-md-4">
        <img src="<?= URL ?>public/images/<?php echo $book->getImg_livre(); ?>" class="w-100" alt="<?php echo $book->getTitre_livre(); ?>">
    </div>
    <div class="col-md-6 p-4 ps-md-0">
        <h5 class="mt-0">Columns with stretched link</h5>
        <p>Another instance of placeholder content for this other custom component. It is intended to mimic what some real-world content would look like, and we're using it here to give the component a bit of body and size.</p>
       <small><p>Nombre de page : <?= $book->getNbr_livre()?> </p></small> 
    </div>
</div>

<?php
$titre = $book->getTitre_livre();
$content = ob_get_clean();
require_once "template.php";
