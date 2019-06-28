<?php
/**
 * Created by PhpStorm.
 * User: maxime
 * Date: 28/06/2019
 * Time: 18:05
 */

class Salle
{

    private $idSalle;  
    private $numSalle;

    /**
     * @return mixed
     */
    public function getIdSalle()
    {
        return $this->idSalle;
    }

    /**
     * @param mixed $idSalle
     * @return Salle
     */
    public function setIdSalle($idSalle)
    {
        $this->idSalle = $idSalle;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getNumSalle()
    {
        return $this->numSalle;
    }

    /**
     * @param mixed $numSalle
     * @return Salle
     */
    public function setNumSalle($numSalle)
    {
        $this->numSalle = $numSalle;
        return $this;
    }



}