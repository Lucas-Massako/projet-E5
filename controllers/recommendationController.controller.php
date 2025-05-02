<?php
require_once "models/RecommandationManager.class.php";

class RecommandationController {
    private $recoManager;

    public function __construct() {
        $this->recoManager = new RecommandationManager();
        $this->recoManager->chargementRecommandations();
    }

    public function afficherRecommandations() {
        $projets = $this->recoManager->getRecommandations();
        require "vues/recommandation.php";
    }

    public function ajouterRecommandation() {
        require "vues/ajoutRecommandation.vue.php";
    }

    public function ajoutRecommandationValidation() {
        $file = $_FILES['image'];
        $repertoire = "public/images/";

        $nomImageAjoute = $this->ajoutImage($file, $repertoire);

        $this->recoManager->ajoutRecommandationBD(
            $_POST['titre'],
            $_POST['artiste'],
            $_POST['type'],
            $_POST['description'],
            $nomImageAjoute
        );

        header('Location: ' . URL . "recommandation");
    }

    public function ajoutImage($file, $dir) {
        if (!isset($file['name']) || empty($file['name']))
            throw new Exception("Vous devez indiquer une image");
        if (!file_exists($dir)) mkdir($dir, 0777);

        $extension = strtolower(pathinfo($file['name'], PATHINFO_EXTENSION));
        $random = rand(0, 99999);
        $target_file = $dir . $random . "_" . $file['name'];

        if (!getimagesize($file['tmp_name']))
            throw new Exception("Le fichier n'est pas une image");
        if (!in_array($extension, ["jpg", "jpeg", "png", "gif"]))
            throw new Exception("L'extension du fichier n'est pas reconnue");
        if (file_exists($target_file))
            throw new Exception("Le fichier existe déjà");
        if ($file['size'] > 500000)
            throw new Exception("Le fichier est trop gros");
        if (!move_uploaded_file($file['tmp_name'], $target_file))
            throw new Exception("L'ajout de l'image a échoué");

        return ($random . "_" . $file['name']);
    }

    public function suppressionRecommandation($id) {
        $nomImage = $this->recoManager->getRecommandationById($id)->getImage();
        unlink("public/images/" . $nomImage);
        $this->recoManager->suppressionRecommandationBD($id);

        header('Location: ' . URL . "recommandation");
    }
}
