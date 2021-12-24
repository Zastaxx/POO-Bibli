<?php ob_start();
if (!empty($_SESSION)){ ?>

<div class="alert alert-dismissible alert-<?=$_SESSION['alert']['type']?>">
  <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
  <strong><?=$_SESSION['alert']['msg']?></strong>
</div>

<?php } ?>

<table class="table text-center">
    <tr class="table-dark">
        <th>Image</th>
        <th>Titre</th>
        <th>Nombre de pages</th>
        <th colspan="2">Action</th>
    </tr>
    <?php if(!empty($livres)) foreach($livres as $book) : ?>
    <tr>
        <td class="alignmiddle"><img src="<?=URL."public/images/". $book->getImg_livre() ?>" alt="livre lsda" width="60px;"></td>
        <td class="align-middle"><a href="<?=URL."/livre/lire/". $book->getId_livre() ?>"><?= $book->getTitre_livre() ?></a></td>
        <td class="align-middle"><?= $book->getNbr_livre() ?></td>
        <td class="align-middle"><a href="<?=URL."/livre/modifier/". $book->getId_livre() ?>" class="btn btn-warning">Modifier</a></td>
        <td class="align-middle"><a onclick="return confirm('Voulez-vous vraiment supprimer le livre ?');" href="<?=URL."/livre/supprimer/". $book->getId_livre() ?>" class="btn btn-danger">Supprimer</a></td>
    </tr>
    <?php endforeach ?>
</table>
<a href="<?=URL."livre/ajouter/"?>" class="btn btn-success d-block">Ajouter</a>

<?php
$titre = "Liste des livres";
$content = ob_get_clean();
require_once "template.php";