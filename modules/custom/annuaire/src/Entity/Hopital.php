<?php

namespace Drupal\annuaire\Entity;

class hopital 
{
    private $id = null;
    private $nom = null;

    public function __construct() {

    }

    public function getNom() {
        return $this->nom;
    }

    public function setNom($nom) {
        $this->nom = $nom;
    }
}