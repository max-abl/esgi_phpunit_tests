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

    /**
     * @param Formateur $formateur
     * @param Matiere $matiere
     * @param Salle $salle
     */
    public function assignCours(Formateur $formateur, Matiere $matiere, Salle $salle) {
        $this->formateur = $formateur;
        $this->matiere = $matiere;
        $this->salle = $salle;
    }

    /**
     * @return int
     */
    public function getIdCours(): int
    {
        return $this->idCours;
    }

    /**
     * @param int $idCours
     */
    public function setIdCours(int $idCours): void
    {
        $this->idCours = $idCours;
    }

    /**
     * @return Formateur
     */
    public function getFormateur(): Formateur
    {
        return $this->formateur;
    }

    /**
     * @param Formateur $formateur
     */
    public function setFormateur(Formateur $formateur): void
    {
        $this->formateur = $formateur;
    }

    /**
     * @return Matiere
     */
    public function getMatiere(): Matiere
    {
        return $this->matiere;
    }

    /**
     * @param Matiere $matiere
     */
    public function setMatiere(Matiere $matiere): void
    {
        $this->matiere = $matiere;
    }

    /**
     * @return Salle
     */
    public function getSalle(): Salle
    {
        return $this->salle;
    }

    /**
     * @param Salle $salle
     */
    public function setSalle(Salle $salle): void
    {
        $this->salle = $salle;
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
     */
    public function setDateDebut(DateTime $date_debut): void
    {
        $this->date_debut = $date_debut;
    }

    /**
     * @return DateTime
     */
    public function getDateFin(): DateTime
    {
        return $this->date_fin;
    }

    /**
     * @param DateTime $date_fin
     */
    public function setDateFin(DateTime $date_fin): void
    {
        $this->date_fin = $date_fin;
    }
    
}