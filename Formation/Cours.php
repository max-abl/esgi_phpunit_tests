<?php
/**
 * Created by PhpStorm.
 * User: maxime
 * Date: 28/06/2019
 * Time: 18:05
 */

class Cours
{
    /**
     * @var int
     */
    private $idCours;

    /**
     * @var Formateur
     */
    private $formateur;

    /**
     * @var Matiere
     */
    private $matiere;

    /**
     * @var Salle
     */
    private $salle;

    /**
     * @var DateTime
     */
    private $date_debut;

    /**
     * @var DateTime
     */
    private $date_fin;


    // Constructor

    /**
     * Cours constructor.
     */
        

    // Getters and setters

    /**
     * @return mixed
     */
    public function getIdCours()
    {
        return $this->idCours;
    }

    /**
     * @param mixed $idCours
     * @return Cours
     */
    public function setIdCours($idCours)
    {
        $this->idCours = $idCours;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getIdFormateur()
    {
        return $this->idFormateur;
    }

    /**
     * @param mixed $idFormateur
     * @return Cours
     */
    public function setIdFormateur($idFormateur)
    {
        $this->idFormateur = $idFormateur;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getIdMatiere()
    {
        return $this->idMatiere;
    }

    /**
     * @param mixed $idMatiere
     * @return Cours
     */
    public function setIdMatiere($idMatiere)
    {
        $this->idMatiere = $idMatiere;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getIdSalle()
    {
        return $this->idSalle;
    }

    /**
     * @param mixed $idSalle
     * @return Cours
     */
    public function setIdSalle($idSalle)
    {
        $this->idSalle = $idSalle;
        return $this;
    }

    /**
     * @return DateTime
     */
    public function getDateDebut(): DateTime
    {
        return $this->date_debut;
    }

    /**
     * @param DateTime $date_debut
     * @return Formation
     */
    public function setDateDebut(DateTime $date_debut): Formation
    {
        $this->date_debut = $date_debut;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getDateFin()
    {
        return $this->date_fin;
    }

    /**
     * @param mixed $date_fin
     * @return Formation
     */
    public function setDateFin($date_fin)
    {
        $this->date_fin = $date_fin;
        return $this;
    }

    public function assignCours(Formateur $formateur, Matiere $matiere, Salle $salle) {
        $this->formateur = $formateur;
        $this->matiere = $matiere;
        $this->salle = $salle;
    }
    
}