<?php
    ob_start();
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Les Œuvres que j’ai aimées</title>
    <!-- Lien vers Bootstrap Lux via CDN -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootswatch@5.3.3/dist/lux/bootstrap.min.css">
</head>
<body>
   
    <!-- Header/Hero Section -->
    <div class="container py-5">
        <div class="p-5 mb-4 bg-light rounded-3">
            <div class="container-fluid py-5">
                <h1 class="display-5 fw-bold">Bienvenue dans ma bibliothèque personnelle</h1>
                <p class="col-md-8 fs-4">
                    Un projet BTS pour répertorier les œuvres qui m’ont marqué.
                </p>
            </div>
        </div>
    </div>

    <!-- Contenu principal -->
    <div class="container">
        <div class="row">
            <div class="col-md-8 mx-auto">
                <h2>À propos de ce projet</h2>
                <p>
                    Salut ! Ce site est une bibliothèque où je recense les œuvres (livres, films, séries, etc.) que j’ai aimées. 
                    Pour chacune, je peux ajouter une image (comme une couverture ou une affiche) et une note sur 10 pour donner mon avis. 
                    C’est une façon pour moi de garder une trace de ce qui m’inspire et de m’entraîner pour mon BTS !
                </p>
                <p>
                    Explore les sections pour ajouter, modifier ou supprimer des œuvres. Bientôt, je pourrais ajouter des filtres ou une section "coups de cœur". 
                    Qu’en penses-tu ? 
                </p>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <footer class="bg-dark text-white text-center py-3 mt-5">
        <p>© 2025 - Projet BTS - Tous droits réservés</p>
    </footer>

    <!-- Script Bootstrap (pour la navbar réactive) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

<?php
    $contenu = ob_get_clean();
    $titre = "Les Œuvres que j’ai aimées";
    require "template.php";
?>