<?php ob_start(); ?>

<form action="<?= URL ?>livre/modifierOK/<?= $book->getId_livre() ?>" method="POST" enctype="multipart/form-data">
    <div class="mb-3 text-center">
        <label for="titre" class="form-label mt-4">Titre du livre</label>
        <input type="text" class="form-control" id="titre" name="titre" value="<?= $book->getTitre_livre() ?>">
    </div>
    <div class="mb-3 text-center">
        <label for="nbpages" class="form-label mt-4">Nombre de pages</label>
        <input type="text" class="form-control" name="nbpages" id="nbpages" value="<?= $book->getNbr_livre() ?>">
    </div>
    <div class="mb-3 text-center">
        <label for="image" class="form-label mt-4">Choississez une image</label>
        <input class="form-control" name="image" type="file" id="image">
        
    </div>
    <div class="mt-4 col-6 form-group">
        <button type="submit" class="btn btn-warning d-block">Modifier</button>
    </div>

    <input type="hidden" name="image_name" value="<?= $book->getImg_livre() ?>">
    <input type="hidden" name="id" value="<?= $book->getId_livre() ?>">
</form>

<?php
$titre = "Modifier livre";
$content = ob_get_clean();
require_once "template.php";
