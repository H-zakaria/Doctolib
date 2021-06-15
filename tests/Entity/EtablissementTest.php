<?php

namespace App\test\Entity;

use App\Entity\Etablissement;
use App\Entity\Medecin;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;
use function PHPUnit\Framework\assertEquals;

class EtablissementTest extends KernelTestCase
{

    public function testEtablissementIsInvalid()
    {
        $kernel = self::bootKernel();
        $validator = $kernel->getContainer()->get('validator');
        $Etablissement = new Etablissement();
        $Etablissement->setNom("j")
            ->setVille("p")
            ->setRue("a");
        $errors = $validator->validate($Etablissement);

        $this->assertCount(3, $errors, "Une erreur est attendue car moins de 2 chars");
    }

    public function testEtablissementIsValid()
    {
        $kernel = self::bootKernel();
        $validator = $kernel->getContainer()->get('validator');
        $Etablissement = new Etablissement();
        $Etablissement->setNom("nom")
            ->setVille("ville")
            ->setRue("rue");
        $errors = $validator->validate($Etablissement);

        $this->assertCount(0, $errors, "Une erreur est attendue car plus de 2 chars");
    }
}
