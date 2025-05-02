<?php
require_once "Model.class.php";
require_once "Recommandation.class.php";

class RecommandationManager extends Model {
    private $recommandations;

    public function ajoutRecommandation($recommandation) {
        $this->recommandations[$recommandation->getId()] = $recommandation;
    }

    public function getRecommandations() {
        return $this->recommandations;
    }

    public function chargementRecommandations() {
        $req = $this->getBdd()->prepare("SELECT * FROM recommandation");
        $req->execute();
        $data = $req->fetchAll();
        $req->closeCursor();

        foreach ($data as $item) {
            $recommandation = new Recommandation(
                $item['id'],
                $item['titre'],
                $item['artiste'],
                $item['type'],
                $item['description'],
                $item['image']
            );
            $this->ajoutRecommandation($recommandation);
        }
    }

    public function getRecommandationById($id) {
        if (isset($this->recommandations[$id])) {
            return $this->recommandations[$id];
        }
    }

    public function ajoutRecommandationBD($titre, $artiste, $type, $description, $image) {
        $req = "
        INSERT INTO recommandation (titre, artiste, type, description, image)
        VALUES (:titre, :artiste, :type, :description, :image)";

        $stmt = $this->getBdd()->prepare($req);
        $stmt->bindValue(":titre", $titre, PDO::PARAM_STR);
        $stmt->bindValue(":artiste", $artiste, PDO::PARAM_STR);
        $stmt->bindValue(":type", $type, PDO::PARAM_STR);
        $stmt->bindValue(":description", $description, PDO::PARAM_STR);
        $stmt->bindValue(":image", $image, PDO::PARAM_STR);

        $resultat = $stmt->execute();
        $stmt->closeCursor();

        if ($resultat > 0) {
            $recommandation = new Recommandation($this->getBdd()->lastInsertId(), $titre, $artiste, $type, $description, $image);
            $this->ajoutRecommandation($recommandation);
        }
    }

    public function suppressionRecommandationBD($id) {
        $req = "DELETE FROM recommandation WHERE id = :id";

        $stmt = $this->getBdd()->prepare($req);
        $stmt->bindValue(":id", $id, PDO::PARAM_INT);
        $resultat = $stmt->execute();
        $stmt->closeCursor();

        if ($resultat > 0 && isset($this->recommandations[$id])) {
            unset($this->recommandations[$id]);
        }
    }
}
