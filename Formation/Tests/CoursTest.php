<?php

declare(strict_types=1);

use PHPUnit\Framework\TestCase;

class CoursTest extends TestCase
{

    /**
     * @var Matiere
     */
    private $matiere;

    /**
     * @var Formateur
     */
    private $formateur;

    /**
     * @var Salle
     */
    private $salle;

    /**
     * @var Cours
     */
    private $cours;

    /**
     * @throws ReflectionException
     */
    public function setUp(): void
    {
        // Mock matiere
        $matiere = $this->createMock(Matiere::class);
        $matiere->expects($this->any())->method('getIdMatiere')->willReturn(1);
        $this->matiere = $matiere;

        // Mock formateur
        $formateur = $this->createMock(Formateur::class);
        $formateur->expects($this->any())->method('getIdFormateur')->willReturn(1);
        $this->formateur = $formateur;

        // Mock salle
        $salle = $this->createMock(Salle::class);
        $salle->expects($this->any())->method('getIdSalle')->willReturn(1);
        $this->salle = $salle;


        // Initialisation
        $this->cours = new Cours();
        $this->cours->setMatiere($matiere);
        $this->cours->setFormateur($formateur);
        $this->cours->setSalle($salle);
    }

    public function testIsAssignCours()
    {
        $this->cours->assignCours($this->formateur, $this->matiere, $this->salle);
        $this->assertTrue($this->cours->getMatiere()->getIdMatiere() == $this->matiere->getIdMatiere());
        $this->assertTrue($this->cours->getFormateur()->getIdFormateur() == $this->formateur->getIdFormateur());
        $this->assertTrue($this->cours->getSalle()->getIdSalle() == $this->salle->getIdSalle());

    }

}