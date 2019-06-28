<?php
/**
 * Created by PhpStorm.
 * User: maxime
 * Date: 28/06/2019
 * Time: 18:04
 */

class Stagiaire
{

    /**
     * @var int
     */
    private $idStagiai;

    /**
     * @var BDConnection
     */
    private $database;
    
    /**
 * @var string
     */
    private $nomStagiaire;

    /**
     * @var string
     */
    private $prenomStagiaire;

    /**
     * @var Formation
     */
    private $formationStagiaire;

    /**
     * @var int
     */
    private $ageStagiaire;

    // Constructor

    /**
     * Stagiaire constructor.
     */
    public function __construct()
    {
    }

    // Methods

    /**
     * @param $formation
     * @return bool
     */
    public function setFormationStagiaire($formation): bool
    {
        if ($formation->ageMinimum > $this->ageStagiaire && !$this->formationStagiaire) {
            $this->formationStagiaire = $formation;
            return true;
        } else {
            return false;
        }
    }

    /**
     * @return bool
     */
    public function isStagiaireValid() : bool {
        return ($this->formation) ? true : false;
    }

    /**
     * @return bool
     */
    public function saveStagiaire() : bool
    {
        if($this->isStagiaireValid){
            $this->databases->saveStagiaire($this);
        }
    }

    // Getters and setters

    /**
     * @return mixed
     */
    public function getIdStagiaire()
    {
        return $this->idStagiaire;
    }

    /**
     * @param mixed $idStagiaire
     */
    public function setIdStagiaire($idStagiaire): void
    {
        $this->idStagiaire = $idStagiaire;
    }

    /**
     * @return mixed
     */
    public function getNomStagiaire()
    {
        return $this->nomStagiaire;
    }

    /**
     * @param mixed $nomStagiaire
     */
    public function setNomStagiaire($nomStagiaire): void
    {
        $this->nomStagiaire = $nomStagiaire;
    }

    /**
     * @return mixed
     */
    public function getPrenomStagiaire()
    {
        return $this->prenomStagiaire;
    }

    /**
     * @param mixed $prenomStagiaire
     */
    public function setPrenomStagiaire($prenomStagiaire): void
    {
        $this->prenomStagiaire = $prenomStagiaire;
    }

}