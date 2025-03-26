<?php
require_once "Model.class.php";
require_once "Projet.class.php";

class ProjetManager extends Model
{
    private $projets;

    public function ajoutProjet($projet)
    {
        $this->projets[] = $projet;
    }

    public function getProjets()
    {
        return $this->projets;
    }

    public function chargementProjets()
    {
        $req = $this->getBdd()->prepare("SELECT * FROM projets");
        $req->execute();
        $lesProjets = $req->fetchAll();

        $req->closeCursor();

        foreach ($lesProjets as $projet) {
            $proj = new Projet(
                $projet['id'],
                $projet['titre'],   
                $projet['artiste'],  
                $projet['type'],    
                $projet['note'], 
                $projet['description'],   
                $projet['image']
             
            );
            $this->ajoutProjet($proj);
        }
    }

    public function getProjetById($id)
    {
        foreach ($this->projets as $projet) {
            if ($projet->getId() == $id) {
                return $projet;
            }
        }
    }

    public function ajoutProjetBD($titre, $artiste, $type, $note, $description, $image)
    {
        $req = "
        INSERT INTO projets (titre, artiste, type, note,description, image )
        VALUES (:titre, :artiste, :type, :note,:description, :image )";

        $stmt = $this->getBdd()->prepare($req);
        $stmt->bindValue(":titre", $titre, PDO::PARAM_STR);
        $stmt->bindValue(":artiste", $artiste, PDO::PARAM_STR);
        $stmt->bindValue(":type", $type, PDO::PARAM_STR);
        $stmt->bindValue(":note", $note, PDO::PARAM_INT); // Utilisation de PDO::PARAM_INT pour les notes
        $stmt->bindValue(":description", $description, PDO::PARAM_STR);   
        $stmt->bindValue(":image", $image, PDO::PARAM_STR);
       

        $resultat = $stmt->execute();
        $stmt->closeCursor();

        if ($resultat > 0) {
            $projet = new Projet($this->getBdd()->lastInsertId(), $titre, $artiste, $type, $note,$description, $image);
            $this->ajoutProjet($projet);
        }
    }

    public function modificationProjetBD($id, $titre, $artiste, $type, $note,$description, $image)
    {
        $req = "UPDATE projets 
                SET titre = :titre, 
                    artiste = :artiste, 
                    type = :type, 
                    note = :note,
                    description = :description,
                    image = :image
                   
                WHERE id = :id";
    
        $stmt = $this->getBdd()->prepare($req);
        $stmt->execute([
            ':id' => $id,
            ':titre' => $titre,
            ':artiste' => $artiste,
            ':type' => $type,
            ':note' => $note,
            ':description' =>$description,
            ':image' => $image
            
        ]);
    
        if (isset($this->projets[$id])) {
            $this->projets[$id]->setTitre($titre);
            $this->projets[$id]->setArtiste($artiste);
            $this->projets[$id]->setType($type);
            $this->projets[$id]->setNote($note);
            $this->projets[$id]->setDescription($description);
            $this->projets[$id]->setImage($image);
           
        }
    }
    
    public function suppressionProjetBD($id)
    {
        $req = "DELETE FROM projets WHERE id = :id";

        $stmt = $this->getBdd()->prepare($req);
        $stmt->bindValue(":id", $id, PDO::PARAM_INT);
        $resultat = $stmt->execute();
        $stmt->closeCursor();

        if ($resultat > 0) {
            $projet = $this->getProjetById($id);
            unset($projet);
        }
    }
}
?>
