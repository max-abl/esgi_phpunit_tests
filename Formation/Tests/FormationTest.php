<?php

declare(strict_types=1);

use PHPUnit\Framework\TestCase;

 class FormationTest extends TestCase {

    /**
     * @var Formation
     */
    private $formation;

    private $institut;

    public function setUp(): void
    {                
        
        // Mock stagiaire 1
        $stagiaire_1 = $this->createMock(Stagiaire::class);
        $stagiaire_1->expects($this->any())->method('getIdStagiaire')->willReturn(1);
        
        // Mock stagiaire 2
        $stagiaire_2 = $this->createMock(Stagiaire::class);
        $stagiaire_2->expects($this->any())->method('getIdStagiaire')->willReturn(1);

        $this->$institut = $this->createMock(Institut::class);

        $stagiaires = [$stagiaire_1, $stagiaire_2];

        $beginDate = new DateTime();
        $beginDate->modify("+1 day");

        $endDate = new DateTime();
        $endDate->modify("+2 day");

        // Initialisation
        $this->formation = new Formation(1);
        $this->formation->setNom("BTS Info")
            ->setStagiaires($stagiaires)
            ->setDateDebut($beginDate)
            ->setDateFin($endDate)
            ->setAgeMinimum(16)
            ->setInstitut($this->institut);
    }

    // Test assert that date is valid
    public function testIsDateValid()
    {
        $this->assertTrue($this->formation->dateIsValid());
    }

    // Test assert that date is not valid
    public function testIsNotDateValid()
    {
        $beginDate = new DateTime();
        $beginDate->modify("+2 day");

        $endDate = new DateTime();
        $endDate->modify("+1 day");

        $this->assertTrue(!$this->formation->dateIsValid());
    }


    public function testIsValid(){
        $this->assertTrue(!$this->formation->isValid());       
    }

    public function testIsNotValidFormationNull(){
        $this->formation->setInstitut(null);
        $this->assertFalse(!$this->formation->isValid());       
    }

    public function testIsNotValidFormationDates(){
        $this->formation->beginDate = new DateTime();
        $this->formation->endDate = (new DateTime())->modify("+1 week");
        $this->assertFalse(!$this->formation->isValid());       
    }
    
}