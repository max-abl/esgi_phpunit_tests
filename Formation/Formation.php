<?php
/**
 * Created by PhpStorm.
 * User: maxime
 * Date: 28/06/2019
 * Time: 18:06
 */

class Formation
{
    /**
     * ID Formation : Number
     */
    private $idFormation;

    /**
     * @var string
     */
    private $name;

    /**
     * @var array
     */
    private $stagiaires;

    /**
     * @var int
     */
    private $ageMinimum;

    /**
     * @var DateTime
     */
    private $dateDebut;

    /**
     * @var DateTime
     */
    private $dateFin;

    /**
     * @var Institut
     */
    private $institut;

    /**
     * Formation constructor.
     * @param $idFormation
     */
    public function __construct($idFormation)
    {
        $this->idFormation = $idFormation;
    }

    // Methods

    /**
     * @return bool
     */
    public function dateIsValid() : bool {
        return ($this->dateDebut instanceof DateTime) && ($this->dateFin instanceof DateTime) && $this->dateDebut < $this->dateFin;
    }

    /**
     * @return mixed
     */
    public function getIdFormation()
    {
        return $this->idFormation;
    }

    /**
     * @param mixed $idFormation
     * @return Formation
     */
    public function setIdFormation($idFormation)
    {
        $this->idFormation = $idFormation;
        return $this;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     * @return Formation
     */
    public function setName(string $name): Formation
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @return array
     */
    public function getStagiaires(): array
    {
        return $this->stagiaires;
    }

    /**
     * @param array $stagiaires
     * @return Formation
     */
    public function setStagiaires(array $stagiaires): Formation
    {
        $this->stagiaires = $stagiaires;
        return $this;
    }

    /**
     * @return int
     */
    public function getAgeMinimum(): int
    {
        return $this->ageMinimum;
    }

    /**
     * @param int $ageMinimum
     * @return Formation
     */
    public function setAgeMinimum(int $ageMinimum): Formation
    {
        $this->ageMinimum = $ageMinimum;
        return $this;
    }

    /**
     * @return DateTime
     */
    public function getDateDebut(): DateTime
    {
        return $this->dateDebut;
    }

    /**
     * @param DateTime $dateDebut
     * @return Formation
     */
    public function setDateDebut(DateTime $dateDebut): Formation
    {
        $this->dateDebut = $dateDebut;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getDateFin()
    {
        return $this->dateFin;
    }

    /**
     * @param mixed $dateFin
     * @return Formation
     */
    public function setDateFin($dateFin)
    {
        $this->date_fin = $dateFin;
        return $this;
    }

    /**
     * @param Institut $institut
     * @return Formation
     */
    public function setInstitut(Institut $institut): Formation
    {
        $this->dateDebut = $dateDebut;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getInstitut()
    {
        return $this->institut;
    }

    public function isValid(){
        if($this->dateIsValid && $this->getInstitut){
            return true;
        }else{
            return false;
        }
    }

}




