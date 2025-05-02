<?php
require_once "models/projetManager.class.php";

class ProjetController{
    private $projetManager;

    public function __construct(){
        $this->projetManager = new ProjetManager;
        $this->projetManager->chargementProjets();
    }

    public function afficherProjets(){
        $projets = $this->projetManager->getProjets();
        require "vues/projet.vue.php";
    }

    // Méthode d'affichage d'un seul projet
    public function afficherProjet($id){
        $projet = $this->projetManager->getProjetById($id);
        require "vues/afficherProjet.vue.php";
    }

    // Ajout d'un projet
    public function ajouterProjet(){
        require "vues/ajoutProjet.vue.php";
    }

    // Validation de l'ajout d'un projet
    public function ajoutProjetValidation(){
        $file = $_FILES['image'];
        $repertoire = "public/images/";
        
        $nomImageAjoute = $this->ajoutImage($file, $repertoire);
        
        $this->projetManager->ajoutProjetBD(
            $_POST['titre'], 
            $_POST['artiste'],
            $_POST['type'],
            $_POST['note'],
            $_POST['description'],
            $nomImageAjoute
        );

        header('Location: ' . URL . "projets");
    }

    public function ajoutImage($file, $dir)
    {
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

    // Suppression d'un projet par son ID
    public function suppressionProjet($id){
        $nomImage = $this->projetManager->getProjetById($id)->getImage();
        unlink("public/images/" . $nomImage);
        $this->projetManager->suppressionProjetBD($id);
        
        header('Location: ' . URL . "projets");
    }

    // Modification d'un projet
    public function modificationProjet($id){
        $projet = $this->projetManager->getProjetById($id);
        require "vues/modifierProjet.vue.php";
    }

    // Validation de la modification d'un projet
    public function modificationProjetValidation(){
        $imageActuelle = $this->projetManager->getProjetById($_POST['identifiant'])->getImage();
        $file = $_FILES['image'];
        
        if($file['size'] > 0){
            unlink("public/images/" . $imageActuelle);
            $repertoire = "public/images/";
            $nomImageToAdd = $this->ajoutImage($file, $repertoire);
        } else {
            $nomImageToAdd = $imageActuelle;
        }
        
        $this->projetManager->modificationProjetBD(
            $_POST['identifiant'],
            $_POST['titre'], 
            $_POST['artiste'], 
            $_POST['type'], 
            $_POST['note'],
            $_POST['description'],

            $nomImageToAdd
        );
        
        header('Location: ' . URL . "projets");
    }

    
  
}