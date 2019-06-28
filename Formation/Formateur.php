<?php
/**
 * Created by PhpStorm.
 * User: maxime
 * Date: 28/06/2019
 * Time: 18:04
 */

class Formateur
{

    /**
     * @var int
     */
    private $idFormateur;

    /**
     * @var string
     */
    private $nomFormateur;

    /**
     * @var string
     */
    private $prenomFormateur;

    /**
     * @var Matiere
     */
    private $matiereFormateur;

    // Constructor

    /**
     * Formateur constructor.
     */
    public function __construct()
    {
    }

    // Getters and setters

    /**
     * @return mixed
     */
    public function getIdFormateur()
    {
        return $this->idFormateur;
    }

    /**
     * @param mixed $idFormateur
     */
    public function setIdFormateur($idFormateur): void
    {
        $this->idFormateur = $idFormateur;
    }

    /**
     * @return mixed
     */
    public function getNomFormateur()
    {
        return $this->nomFormateur;
    }

    /**
     * @param mixed $nomFormateur
     */
    public function setNomFormateur($nomFormateur): void
    {
        $this->nomFormateur = $nomFormateur;
    }

    /**
     * @return mixed
     */
    public function getPrenomFormateur()
    {
        return $this->prenomFormateur;
    }

    /**
     * @param mixed $prenomFormateur
     */
    public function setPrenomFormateur($prenomFormateur): void
    {
        $this->prenomFormateur = $prenomFormateur;
    }

    /**
     * @return mixed
     */
    public function getMatiereFormateur()
    {
        return $this->matiereFormateur;
    }

    /**
     * @param mixed $matiereFormateur
     */
    public function setMatiereFormateur($matiereFormateur): void
    {
        $this->matiereFormateur = $matiereFormateur;
    }

}