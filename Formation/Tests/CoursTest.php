<?php

declare(strict_types=1);

use PHPUnit\Framework\TestCase;

 class CoursTest extends TestCase {

    private $formation;
    private $matiere;
    private $formateur;
    private $salle;
    private $cours;

    public function setUp(): void
    {
        // Mock Stagiaire
        $formation = $this->createMock(Formation::class);
        $formation->expects($this->any())->method('getIdFormation')->willReturn(1);
        // Mock matiere
        $matiere = $this->createMock(Matiere::class);
        $matiere->expects($this->any())->method('getIdMatiere')->willReturn(1);
        // Mock formateur
        $formateur = $this->createMock(Formateur::class);
        $formateur->expects($this->any())->method('getIdFormateur')->willReturn(1);
        // Mock salle
        $salle = $this->createMock(Salle::class);
        $salle->expects($this->any())->method('getIdSalle')->willReturn(1);


        // Initialisation
        $this->cours = new Cours();
        $this->cours->setFormation($formation);
        $this->cours->setMatiere($matiere);
        $this->cours->setFormateur($formateur);
        $this->cours->setSalle($salle);        
    }

    public function testIsAssignCours()
    {
        // A remplir
        $this->cours->assignCours($formation, $matiere, $formateur, $salle);

        $this->assertTrue($this->cours->getFormation()->getIdFormation() == $formation->getIdFormation());
        $this->assertTrue($this->cours->getMatiere()->getIdMatiere() == $matiere->getIdMatiere());
        $this->assertTrue($this->cours->getFormateur()->getIdFormateur() == $formateur->getIdFormateur());
        $this->assertTrue($this->cours->getSalle()->getIdSalle() == $salle->getIdSalle());

    }

}