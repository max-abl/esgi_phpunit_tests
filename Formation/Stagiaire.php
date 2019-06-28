<?php
/**
 * Created by PhpStorm.
 * User: maxime
 * Date: 28/06/2019
 * Time: 18:04
 */

class Stagiaire
{

    private $idStagiaire;  
    private $nomStagiaire;
    private $prenomStagiaire;
    private $classeStagiaire;

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

    /**
     * @return mixed
     */
    public function getClasseStagiaire()
    {
        return $this->classeStagiaire;
    }

    /**
     * @param mixed $classeStagiaire
     */
    public function setClasseStagiaire($classeStagiaire): void
    {
        $this->classeStagiaire = $classeStagiaire;
    }



}