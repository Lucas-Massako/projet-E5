<?php
// Définition de la constante URL pour fixer le chemin absolu des URL
define("URL", str_replace(
    "index.php",
    "",
    (isset($_SERVER['HTTPS']) ? "https" : "http") .
        "://$_SERVER[HTTP_HOST]$_SERVER[PHP_SELF]"
));

require_once "controllers/projetController.controller.php";
$projetController = new ProjetController;
require_once "controllers/recommendationController.controller.php";
$recoController = new RecommandationController();


try {
    if (empty($_GET['page'])) {
        require_once "vues/accueil.vue.php";
    } else {
        // Décomposer l'URL
        $url = explode("/", filter_var($_GET['page'], FILTER_SANITIZE_URL));

        switch ($url[0]) {
            case "accueil":
                require_once "vues/accueil.vue.php";
                break;

            case "projets":
                if (empty($url[1])) {
                    $projetController->afficherProjets();
                } else if ($url[1] === "p") {
                    echo $projetController->afficherProjet($url[2]);
                } else if ($url[1] === "a") {
                    $projetController->ajouterProjet();
                } else if ($url[1] === "avf") {
                    $projetController->ajoutProjetValidation();
                } else if ($url[1] === "m") {
                    $projetController->modificationProjet($url[2]);
                } else if ($url[1] === "mvf") {
                    $projetController->modificationProjetValidation($url[2]);
                } else if ($url[1] === "s") {
                    echo "L'ID du projet à supprimer est " . $url[2];
                    $projetController->suppressionProjet($url[2]);
                } else {
                    throw new Exception("La page n'existe pas !");
                }
                break;
                case "recommandation":
                    $recoController->afficherRecommandations(); 
                    break;
                
                
                

            default:
                throw new Exception("La page n'existe pas !");
        }
    }
} catch (Exception $e) {
    echo $e->getMessage();
}
