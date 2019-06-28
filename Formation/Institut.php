<?php

class Institut
{

    private $idInstitut;
    private $nom;
    private $adresse;
    private $ville;
    private $codePostal;
    
    /**
     * @var array : Formation
     */
    private $formations;

    /**
     * Institut constructor.
     */
    public function __construct()
    {
    }

    /**
     * @return mixed
     */
    public function getIdInstitut()
    {
        return $this->idInstitut;
    }

    /**
     * @param mixed $idInstitut
     */
    public function setIdInstitut($idInstitut): void
    {
        $this->idInstitut = $idInstitut;
    }

    /**
     * @return mixed
     */
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * @param mixed $nom
     */
    public function setNom($nom): void
    {
        $this->nom = $nom;
    }

    /**
     * @return mixed
     */
    public function getAdresse()
    {
        return $this->adresse;
    }

    /**
     * @param mixed $adresse
     */
    public function setAdresse($adresse): void
    {
        $this->adresse = $adresse;
    }

    /**
     * @return mixed
     */
    public function getVille()
    {
        return $this->ville;
    }

    /**
     * @param mixed $ville
     */
    public function setVille($ville): void
    {
        $this->ville = $ville;
    }

    /**
     * @return mixed
     */
    public function getCodePostal()
    {
        return $this->codePostal;
    }

    /**
     * @param mixed $codePostal
     */
    public function setCodePostal($codePostal): void
    {
        $this->codePostal = $codePostal;
    }





}