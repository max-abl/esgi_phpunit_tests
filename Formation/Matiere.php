<?php
/**
 * Created by PhpStorm.
 * User: maxime
 * Date: 28/06/2019
 * Time: 18:05
 */

class Matiere
{

    private $idMatiere;
    private $labelle;

    /**
     * @return mixed
     */
    public function getIdMatiere()
    {
        return $this->idMatiere;
    }

    /**
     * @param mixed $idMatiere
     */
    public function setIdMatiere($idMatiere): void
    {
        $this->idMatiere = $idMatiere;
    }

    /**
     * @return mixed
     */
    public function getLabelle()
    {
        return $this->labelle;
    }

    /**
     * @param mixed $labelle
     */
    public function setLabelle($labelle): void
    {
        $this->labelle = $labelle;
    }




}