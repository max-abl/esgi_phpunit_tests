<?php
/**
 * Created by PhpStorm.
 * User: maxime
 * Date: 28/06/2019
 * Time: 18:06
 */

class Formation
{
    
    private $idFormation;
    private $idMatiere;
    private $date_debut;
    private $date_fin;

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
     * @return mixed
     */
    public function getIdMatiere()
    {
        return $this->idMatiere;
    }

    /**
     * @param mixed $idMatiere
     * @return Formation
     */
    public function setIdMatiere($idMatiere)
    {
        $this->idMatiere = $idMatiere;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getDateDebut()
    {
        return $this->date_debut;
    }

    /**
     * @param mixed $date_debut
     * @return Formation
     */
    public function setDateDebut($date_debut)
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


}




