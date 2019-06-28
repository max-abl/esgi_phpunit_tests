<?php

declare(strict_types=1);

use PHPUnit\Framework\TestCase;

class StagiaireTest extends TestCase
{

    /**
     * @var Stagiaire
     */
    private $stagiaire;

    /**
     * @var Formation
     */
    private $formation;

    /**
     * @throws ReflectionException
     */
    public function setUp(): void
    {
        // Mock => Stagiaire
        $this->stagiaire = new Stagiaire();

        // Mock Formation
        $this->formation = $this->createMock(Formation::class);
        $this->formation->expects($this->any())->method("getAgeMinimum")->willReturn(18);
    }

    /**
     * @param $formation
     */
    public function testSetFormationOk()
    {
        $this->stagiaire->setAgeStagiaire(20);
        $this->assertTrue($this->stagiaire->setFormationStagiaire($this->formation));
    }

    /**
     * @param $formation
     */
    public function testSetFormationStagiaireFailureAge()
    {
        $this->stagiaire->setAgeStagiaire(15);
        $this->assertFalse($this->stagiaire->setFormationStagiaire($this->formation));
    }

    public function testSetFormationStagiaireFailureFormation()
    {
        $this->stagiaire->setFormationStagiaire($this->formation);
        $this->assertFalse($this->stagiaire->setFormationStagiaire($this->formation));
    }


    /**
     * @throws ReflectionException
     * @throws Exception
     */
    public function testSaveFalseBecauseNoFormation()
    {
        $dbconnection = $this->createMock(BDConnection::class);
        $dbconnection->expects($this->never())->method('saveStagiaire')->willReturn(true);

        $this->stagiaire->setDatabase($dbconnection);
        $this->assertFalse($this->stagiaire->saveStagiaire());
    }

}