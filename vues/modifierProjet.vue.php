<?php
ob_start() ?>
 
<form method="POST" action="<?= URL ?>projets/mvf" enctype="multipart/form-data">
    <div class="mb-3">
        <label for="titre">Titre : </label>
        <input type="text" class="form-control" id="titre" name="titre" value="<?=$projet->getTitre();?>" required>
    </div>
    <div class="mb-3">
        <label for="artiste">Artiste : </label>
        <input type="text" class="form-control" id="artiste" name="artiste" value="<?=$projet->getArtiste();?>" required>
    </div>
    <div class="mb-3">
        <label for="type">Type : </label>
        <input type="text" class="form-control" id="type" name="type" value="<?=$projet->getType();?>" required>
    </div>
    <div class="mb-3">
        <label for="note">Note : </label>
        <input type="number" class="form-control" id="note" name="note" step="0.1" min="0" max="20" value="<?=$projet->getNote();?>"required>
    </div>
    <div class="mb-3">
        <label for="description">Description : </label>
        <input type="text" class="form-control" id="description" name="description" rows="3" value="<?=$projet->getDescription();?>" >
    </div>
    <div class="mb-3">
        <label for="image">Image : </label>
        <input type="file" class="form-control-file" id="image" name="image" required>
    </div>
   
   
   

    <button type="submit" class="btn btn-primary">Valider</button>
</form>

 
<?php
$contenu = ob_get_clean();
$titre = "Modification d'un projet : " . $projet->getId();
require "template.php";

// value="<?= $intervenant->getNom();?

?>