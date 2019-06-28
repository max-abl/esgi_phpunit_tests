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
    private $formationStagiaire;
    private $ageStagiaire;

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
    public function getFormationStagiaire()
    {
        return $this->formationStagiaire;
    }

    /**
     * @param mixed $formationStagiaire
     */
    public function setClasseStagiaire($formation): Boolean
    {
        if($formation->ageMinimum > $this->ageStagiaire && !$this->formationStagiaire){
            $this->formationStagiaire = $formation;
            return true;
        }else{
            return false;
        }
    }
    
}