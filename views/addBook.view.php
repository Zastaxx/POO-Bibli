<?php ob_start(); ?>

<form action="<?= URL . "/livre/validate" ?>" method="POST" enctype="multipart/form-data">
    <div class="form-group">
        <label for="titre" class="form-label mt-4">Titre du livre</label>
        <input type="text" class="form-control" id="titre" name="titre">
    </div>
    <div class="form-group">
        <label for="nbpages" class="form-label mt-4">Nombre de pages</label>
        <input type="text" class="form-control" name="nbpages" id="nbpages">
    </div>
    <div class="form-group">
        <label for="image" class="form-label mt-4">Choississez une image</label>
        <input class="form-control" name="image" type="file" id="image">
    </div>
    <div class="mt-4 col-6 form-group">
        <button type="submit" class="btn btn-success d-block">Ajouter</button>
    </div>

</form>
<?php
$titre = "Ajouter un livre";
$content = ob_get_clean();
require_once "template.php";
