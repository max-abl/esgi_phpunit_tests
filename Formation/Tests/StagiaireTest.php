<?php

declare(strict_types=1);

use PHPUnit\Framework\TestCase;

 class StagiaireTest extends TestCase {

    private $stagiaire;
    private $formation;

    public function setUp(): void
    {
        // Mock => Stagiaire
        $stagiaire = $this->createMock(Stagiaire::class);
        $stagiaire->setAgeStagiaire(21);

        // Mock Formation
        $formation = $this->createMock(Formation::class);
        $formation->setAgeMinimum(16);
    }

    public function testSetFormationStagiaireSuccess($formation): Boolean
    {
        $this->assertTrue($this->stagiaire->setClasseStagiaire());
    }

    public function testSetFormationStagiaireFailureAge($formation): Boolean
    {
        $this->stagiaire->setAgeStagiaire(15);
        $this->assertFalse($this->stagiaire->setFormationStagiaire());
    }

    public function testSetFormationStagiaireFailureFormation($formation): Boolean
    {
        $this->formation = null;
        $this->assertFalse($this->stagiaire->setFormationStagiaire());
    }

    public function testSave(){
        $dbconnection = $this->createMock(BDConnection::class);
        $dbconnection->expects($this->once())->method('saveStagiaire')->willReturn(true);
        $stagiaire->setDatabases($dbconnection);
        $stagiaire->saveStagiaire();
    }

}