<?php
ob_start();
?>

<table class="table text-center">
    <tr class="table-primary">
        <th scope="row">Image</th>
        <th>Titre</th>
        <th>Artiste</th>
        <th>Type</th>
        <th>note</th>
        
        
        <th colspan="2">Actions</th>
    </tr>
   
    <?php
    // $projets = $projetManager->getProjets(); 
    for ($i = 0; $i < count($projets); $i++): 
        ?>
        <tr>
            <td class="align-middle"><img src="public/images/<?= $projets[$i]->getImage(); ?>" width="50px;"></td>
           <td class="align-middle"><a href="<?= URL ?>projets/p/<?= $projets[$i]->getId(); ?>"><?= $projets[$i]->getTitre(); ?></a></td>
          
            <td class="align-middle"><?= $projets[$i]->getArtiste(); ?></td>
            <td class="align-middle"><?= $projets[$i]->getType(); ?></td>
            <td class="align-middle"><?= $projets[$i]->getNote(); ?></td>

            <td class="align-middle"><a href="<?= URL ?>projets/m/<?= $projets[$i]->getId(); ?>" class="btn btn-warning">Modifier</a></td>

            <td class="align-middle">
                <form method="POST" action="<?= URL ?>projets/s/<?= $projets[$i]->getId(); ?>"
                    onSubmit="return confirm('Voulez-vous vraiment supprimer ce projet ?')" ;>
                    
                    <button class="btn btn-danger" type="submit">Supprimer</button>
                </form>
            </td>
        </tr>
    <?php endfor; ?>
</table>
<a href="<?= URL ?>projets/a" class="btn btn-primary d-block">Ajouter</a>

<?php
$contenu = ob_get_clean();
$titre = "La liste des projets";
require "template.php";
?>
