code existant pour modif 

// Validation de la modification d'un projet
    public function modificationProjetValidation(){
        $imageActuelle = $this->projetManager->getProjetById($_POST['id'])->getImage();
        $file = $_FILES['image'];
        
        if($file['size'] > 0){
            unlink("public/images/" . $imageActuelle);
            $repertoire = "public/images/";
            $nomImageToAdd = $this->ajoutImage($file, $repertoire);
        } else {
            $nomImageToAdd = $imageActuelle;
        }
        
        $this->projetManager->modificationProjetBD(
            $_POST['id'],
            $_POST['titre'], 
            $_POST['artiste'], 
            $_POST['type'], 
            $_POST['note'],
            $_POST['description'],

            $nomImageToAdd
        );
        
        header('Location: ' . URL . "projets");
    }



    