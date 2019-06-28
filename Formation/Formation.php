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
     * @var int
     */
    private $idFormation;

    /**
     * @var Institut
     */
    private $institut;

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
    public function dateIsValid(): bool
    {
        return ($this->dateDebut instanceof DateTime) && ($this->dateFin instanceof DateTime) && $this->dateDebut < $this->dateFin;
    }

    /**
     * @return bool
     */
    public function isValid()
    {
        if ($this->dateIsValid() && $this->getInstitut()) {
            return true;
        } else {
            return false;
        }
    }

    /**
     * @return int
     */
    public function getIdFormation(): int
    {
        return $this->idFormation;
    }

    /**
     * @param int $idFormation
     */
    public function setIdFormation(int $idFormation): void
    {
        $this->idFormation = $idFormation;
    }

    /**
     * @return Institut
     */
    public function getInstitut(): Institut
    {
        return $this->institut;
    }

    /**
     * @param Institut $institut
     */
    public function setInstitut(Institut $institut): void
    {
        $this->institut = $institut;
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
     */
    public function setName(string $name): void
    {
        $this->name = $name;
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
     */
    public function setStagiaires(array $stagiaires): void
    {
        $this->stagiaires = $stagiaires;
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
     */
    public function setAgeMinimum(int $ageMinimum): void
    {
        $this->ageMinimum = $ageMinimum;
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
     */
    public function setDateDebut(DateTime $dateDebut): void
    {
        $this->dateDebut = $dateDebut;
    }

    /**
     * @return DateTime
     */
    public function getDateFin(): DateTime
    {
        return $this->dateFin;
    }

    /**
     * @param DateTime $dateFin
     */
    public function setDateFin(DateTime $dateFin): void
    {
        $this->dateFin = $dateFin;
    }

}




