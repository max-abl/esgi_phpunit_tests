<?php

declare(strict_types=1);

use PHPUnit\Framework\TestCase;

 class StagiaireTest extends TestCase {

    public function testSetClasseStagiaire($formation): Boolean
    {
        if($formation->ageMinimum > $this->ageStagiaire && !$this->formationStagiaire){
            $this->formationStagiaire = $formation;
            return true;
        }else{
            return false;
        }
    }

}