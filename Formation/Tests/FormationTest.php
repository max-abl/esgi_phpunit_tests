<?php

declare(strict_types=1);

use PHPUnit\Framework\TestCase;

class FormationTest extends TestCase
{

    /**
     * @var Formation
     */
    private $formation;

    /**
     * @var Institut
     */
    private $institut;


    /**
     * @throws ReflectionException
     */
    public function setUp(): void
    {

        // Mock stagiaire 1
        $stagiaire_1 = $this->createMock(Stagiaire::class);
        $stagiaire_1->expects($this->any())->method('getIdStagiaire')->willReturn(1);

        // Mock stagiaire 2
        $stagiaire_2 = $this->createMock(Stagiaire::class);
        $stagiaire_2->expects($this->any())->method('getIdStagiaire')->willReturn(1);
        $stagiaires = [$stagiaire_1, $stagiaire_2];

        // Institut
        $this->institut = $this->createMock(Institut::class);

        // Dates
        $beginDate = new DateTime();
        $beginDate->modify("+1 day");
        $endDate = new DateTime();
        $endDate->modify("+2 day");

        // Initialisation
        $this->formation = new Formation(1);
        $this->formation->setName("BTS Info");
        $this->formation->setStagiaires($stagiaires);
        $this->formation->setDateDebut($beginDate);
        $this->formation->setDateFin($endDate);
        $this->formation->setAgeMinimum(16);
    }

    public function testIsDateValid()
    {
        $this->assertTrue($this->formation->dateIsValid());
    }

    public function testIsNotDateValid()
    {
        $beginDate = new DateTime();
        $beginDate->modify("+2 day");
        $this->formation->setDateDebut($beginDate);

        $endDate = new DateTime();
        $endDate->modify("+1 day");
        $this->formation->setDateFin($endDate);

        $this->assertFalse($this->formation->dateIsValid());
    }


    public function testIsValid()
    {
        $this->formation->setInstitut($this->institut);
        $this->assertTrue($this->formation->isValid());
    }

    public function testIsNotValidFormationNull()
    {
        $this->expectException("TypeError");
        $this->assertFalse($this->formation->isValid());
    }

    public function testIsNotValidFormationDates()
    {
        $this->formation->setInstitut($this->institut);
        $this->formation->beginDate = new DateTime();
        $this->formation->endDate = (new DateTime())->modify("+1 week");
        $this->assertFalse(!$this->formation->isValid());
    }

}