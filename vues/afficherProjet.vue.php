<?php
ob_start();
// Récupération des données du projet
$titre = $projet->getTitre();
$artiste = $projet->getArtiste();  

// API YouTube pour récupérer la bande-annonce
$apiKey = "AIzaSyAPeHK4B7x7jtkazWVrFB9LIoCkE7Q8N98"; // Remplace par ta clé API YouTube
$searchQuery = urlencode($titre .$artiste. " trailer");
$url = "https://www.googleapis.com/youtube/v3/search?part=snippet&q=$searchQuery&type=video&key=$apiKey";

// Appel de l'API
$response = file_get_contents($url);
$data = json_decode($response, true);

// Vérification et récupération de l'ID de la vidéo
if (!empty($data['items'])) {
    $videoId = $data['items'][0]['id']['videoId'];
    $youtubeUrl = "https://www.youtube.com/watch?v=" . $videoId;
} else {
    // Redirige vers la recherche YouTube si aucune vidéo n'est trouvée
    $youtubeUrl = "https://www.youtube.com/results?search_query=" . $searchQuery;
}
?>
<div class="row">
    <div class="col-6">
        <img src="<?= URL ?>public/images/<?= $projet->getImage(); ?>" alt="<?= $projet->getTitre(); ?>">
    </div>
    <div class="col-6">
        <p>Titre : <?= $projet->getTitre(); ?></p>
        <p>Artiste : <?= $projet->getArtiste(); ?></p>
        <p>Type : <?= $projet->getType(); ?></p>
        <p>Note : <?= $projet->getNote(); ?></p>
        <p>Description : <?= $projet->getDescription(); ?></p>
    
        <a href="<?= $youtubeUrl ?>" target="_blank">
            <button class="btn btn-danger">Voir la bande-annonce 🎬</button>
        </a>
</div>

<?php
$contenu = ob_get_clean();
$titre = $projet->getTitre() . " ";
$nom = $projet->getArtiste();  // Utiliser l'artiste comme nom ici
require "template.php";
?>


