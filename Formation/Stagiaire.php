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
    private $idStagiaire;

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
    public function setFormationStagiaire(Formation $formation): bool
    {
        if ($formation->getAgeMinimum() < $this->ageStagiaire && !$this->formationStagiaire) {
            $this->formationStagiaire = $formation;
            return true;
        } else {
            return false;
        }
    }

    /**
     * @return bool
     */
    public function isStagiaireValid(): bool
    {
        return ($this->formationStagiaire) ? true : false;
    }

    /**
     * @return bool
     * @throws Exception
     */
    public function saveStagiaire(): bool
    {
        if ($this->isStagiaireValid()) {
            $this->database->saveStagiaire($this);
            return true;
        }

        return false;
    }

    // Getters and setters

    /**
     * @return int
     */
    public function getIdStagiaire(): int
    {
        return $this->idStagiaire;
    }

    /**
     * @param int $idStagiaire
     * @return Stagiaire
     */
    public function setIdStagiaire(int $idStagiaire): Stagiaire
    {
        $this->idStagiaire = $idStagiaire;
        return $this;
    }

    /**
     * @return BDConnection
     */
    public function getDatabase(): BDConnection
    {
        return $this->database;
    }

    /**
     * @param BDConnection $database
     * @return Stagiaire
     */
    public function setDatabase(BDConnection $database): Stagiaire
    {
        $this->database = $database;
        return $this;
    }

    /**
     * @return string
     */
    public function getNomStagiaire(): string
    {
        return $this->nomStagiaire;
    }

    /**
     * @param string $nomStagiaire
     * @return Stagiaire
     */
    public function setNomStagiaire(string $nomStagiaire): Stagiaire
    {
        $this->nomStagiaire = $nomStagiaire;
        return $this;
    }

    /**
     * @return string
     */
    public function getPrenomStagiaire(): string
    {
        return $this->prenomStagiaire;
    }

    /**
     * @param string $prenomStagiaire
     * @return Stagiaire
     */
    public function setPrenomStagiaire(string $prenomStagiaire): Stagiaire
    {
        $this->prenomStagiaire = $prenomStagiaire;
        return $this;
    }

    /**
     * @return int
     */
    public function getAgeStagiaire(): int
    {
        return $this->ageStagiaire;
    }

    /**
     * @param int $ageStagiaire
     * @return Stagiaire
     */
    public function setAgeStagiaire(int $ageStagiaire): Stagiaire
    {
        $this->ageStagiaire = $ageStagiaire;
        return $this;
    }

}