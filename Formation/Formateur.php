<?php
/**
 * Created by PhpStorm.
 * User: maxime
 * Date: 28/06/2019
 * Time: 18:04
 */

class Formateur
{

    private $idFormateur;  
    private $nomFormateur;
    private $prenomFormateur;
    private $matiereFormateur;

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