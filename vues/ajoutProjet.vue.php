<?php
ob_start();
?>

<form method="POST" action="<?= URL ?>projets/avf" enctype="multipart/form-data">
    <div class="mb-3">
        <label for="titre">Titre : </label>
        <input type="text" class="form-control" id="titre" name="titre" required>
    </div>
    <div class="mb-3">
        <label for="artiste">Artiste : </label>
        <input type="text" class="form-control" id="artiste" name="artiste" required>
    </div>
    <div class="mb-3">
        <label for="type">Type : </label>
        <input type="text" class="form-control" id="type" name="type" required>
    </div>
    <div class="mb-3">
        <label for="note">Note : </label>
        <input type="number" class="form-control" id="note" name="note" step="0.1" min="0" max="20" required>
    </div>
    <div class="mb-3">
        <label for="description">Description : </label>
        <textarea class="form-control" id="description" name="description" rows="2" ></textarea>
    </div>
    <div class="mb-3">
        <label for="image">Image : </label>
        <input type="file" class="form-control-file" id="image" name="image" required>
    </div>
   
   
   

    <button type="submit" class="btn btn-primary">Valider</button>
</form>

<?php
    $contenu = ob_get_clean();
    $titre = "Ajout d'un projet";
    require "template.php";
?>


