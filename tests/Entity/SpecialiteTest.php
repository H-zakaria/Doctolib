<?php

namespace App\test\Entity;

use App\Entity\Specialite;
use App\Entity\Medecin;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;
use function PHPUnit\Framework\assertEquals;
use function PHPUnit\Framework\assertNotNull;

class SpecialiteTest extends KernelTestCase
{

    public function testSpecialiteIsInvalid()
    {
        $kernel = self::bootKernel();
        $validator = $kernel->getContainer()->get('validator');

        $medecin = new Medecin();
        $medecin->setNom("j")
            ->setPrenom("p");

        $specialite = new Specialite();
        $specialite->setDesignation("c")
            ->addMedecin($medecin);
        $errors = $validator->validate($specialite);

        $this->assertCount(1, $errors, "Une erreur est attendue car moins de 2 chars");
    }

    public function testSpecialiteIsValid()
    {
        $kernel = self::bootKernel();
        $validator = $kernel->getContainer()->get('validator');

        // $medecin = new Medecin();
        // $medecin->setNom("j")
        //     ->setPrenom("p");
        $medecin = null;

        $specialite = new Specialite();
        $specialite->setDesignation("c")
            ->addMedecin($medecin[]);
        $errors = $validator->validate($specialite);

        $this->assertCount(0, $errors, "Une erreur est attendue car plus de 2 chars");
    }
        //designation get/set
        //medecins get/add/remove
        public function testGetDesignation()
        {
        $spe = new Specialite;
        $spe->setDesignation('cardio');  
        assertEquals('cardio', $spe->getDesignation(), 'getDesignation ne marche pas');
        }
        public function testSetDesignation()
        {
            $spe = new Specialite;
            $spe->setDesignation('cardio');  
            assertNotNull($spe->getDesignation(), 'setDesignation ne marche pas');
        }                                                       
}
