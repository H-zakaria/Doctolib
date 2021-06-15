<?php

namespace App\test\Entity;

use App\Entity\Medecin;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;
use function PHPUnit\Framework\assertEquals;

class MedecinTest extends KernelTestCase
{

    public function testMedecinIsInvalid()
    {
        $kernel = self::bootKernel();
        $validator = $kernel->getContainer()->get('validator');
        $medecin = new Medecin();
        $medecin->setNom("j")
            ->setPrenom("p");
        $errors = $validator->validate($medecin);

        $this->assertCount(2, $errors, "Une erreur est attendue car moins de 2 chars");
    }

    public function testMedecinIsValid()
    {
        $kernel = self::bootKernel();
        $validator = $kernel->getContainer()->get('validator');
        $medecin = new Medecin();
        $medecin->setNom("jean")
            ->setPrenom("patrick");
        $errors = $validator->validate($medecin);

        $this->assertCount(0, $errors, "Une erreur est attendue car plus de 2 chars");
    }
}
