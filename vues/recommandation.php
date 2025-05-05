<?php
ob_start();
?>

<form method="POST" action="<?= URL ?>recommandation/avf" enctype="multipart/form-data">
    <div class="mb-3">
        <label for="titre">Titre :</label>
        <input type="text" class="form-control" id="titre" name="titre" required>
    </div>
    <div class="mb-3">
        <label for="artiste">Artiste :</label>
        <input type="text" class="form-control" id="artiste" name="artiste" required>
    </div>
    <div class="mb-3">
        <label for="type">Type :</label>
        <input type="text" class="form-control" id="type" name="type" required>
    </div>
    <div class="mb-3">
        <label for="description">Description :</label>
        <textarea class="form-control" id="description" name="description" rows="2"></textarea>
    </div>
    <div class="mb-3">
        <label for="image">Image :</label>
        <input type="file" class="form-control" id="image" name="image" required>
    </div>

    <button type="submit" class="btn btn-primary">Valider</button>
</form>

<?php if (isset($projets) && is_array($projets) && count($projets) > 0): ?>
    <table class="table text-center mt-5">
        <tr class="table-primary">
            <th scope="row">Image</th>
            <th>Titre</th>
            <th>Artiste</th>
            <th>Type</th>
            <th colspan="2">Actions</th>
        </tr>

        <?php foreach ($projets as $recom): ?>
            <tr>
                <td class="align-middle">
                    <img src="public/images/<?= $recom->getImage(); ?>" width="50px;" alt="image">
                </td>
                <td class="align-middle"><?= $recom->getTitre(); ?></td>
                <td class="align-middle"><?= $recom->getArtiste(); ?></td>
                <td class="align-middle"><?= $recom->getType(); ?></td>
                <td class="align-middle">
                    <form method="POST" action="<?= URL ?>recommandation/s/<?= $recom->getId(); ?>"
                          onsubmit="return confirm('Voulez-vous vraiment supprimer cette recommandation ?');">
                        <button class="btn btn-danger" type="submit">Supprimer</button> 
                        
                    </form>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>
<?php else: ?>
    <p class="text-center mt-4">Aucune recommandation pour l'instant.</p>
<?php endif; ?>

<?php
$contenu = ob_get_clean();
$titre = "Vos recommandations";
require "template.php";
?>
