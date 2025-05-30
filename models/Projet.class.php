<?php

class projet {
    private $id;
    private $titre;
    private $artiste;
    private $type;
    private $note;
    private $description;
    private $image;
  
    // Constructeur
    public function __construct($id, $titre, $artiste, $type, $note,$description, $image ) {
        $this->id = $id;
        $this->titre = $titre;
        $this->artiste = $artiste;
        $this->type = $type;
        $this->note = $note;
        $this->description = $description;
        $this->image = $image;
        
    }

    // GETTERS & SETTERS
    public function getId() { return $this->id; }
    public function setId($id) { $this->id = $id; }

    public function getTitre() { return $this->titre; }
    public function setTitre($titre) { $this->titre = $titre; }

    public function getArtiste() { return $this->artiste; }
    public function setArtiste($artiste) { $this->artiste = $artiste; }

    public function getType() { return $this->type; }
    public function setType($type) { $this->type = $type; }

    public function getNote() { return $this->note; }
    public function setNote($note) { $this->note = $note; }

    public function getDescription() { return $this->description; }
    public function setDescription($description) { $this->description = $description; }

    public function getImage() { return $this->image; }
    public function setImage($image) { $this->image = $image; }

   
}
