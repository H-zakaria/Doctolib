<?php

namespace App\test\Entity;

use App\Entity\Rdv;
use App\Entity\Patient;
use App\Entity\Medecin;
use DateTime;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;
use function PHPUnit\Framework\assertEquals;

class RdvTest extends KernelTestCase
{

    public function testRdvIsInvalid()
    {
        $kernel = self::bootKernel();
        $validator = $kernel->getContainer()->get('validator');

        $patient = new Patient();
        $patient->setNom("jean")
            ->setPrenom("patrick")
            ->setVille("azerty")
            ->setRue("zoum")
            ->setDateNaissance(new DateTime("now"));

        $medecin = new Medecin();
        $medecin->setNom("j")
            ->setPrenom("p");

        $rdv = new Rdv();
        $rdv->setPatient($patient)
            ->setMedecin($medecin);
        $errors = $validator->validate($rdv);

        $this->assertCount(3, $errors, "Une erreur est attendue car moins de 2 chars");
    }

    public function testRdvIsValid()
    {
        $kernel = self::bootKernel();
        $validator = $kernel->getContainer()->get('validator');

        $patient = new Patient();
        $patient->setNom("jean")
            ->setPrenom("patrick")
            ->setVille("azerty")
            ->setRue("zoum")
            ->setDateNaissance(new DateTime("now"));

        $medecin = new Medecin();
        $medecin->setNom("dupont")
            ->setPrenom("pontdu");

        $rdv = new Rdv();
        $rdv->setPatient($patient)
            ->setMedecin($medecin);
        $errors = $validator->validate($rdv);

        $this->assertCount(0, $errors, "Une erreur est attendue car plus de 2 chars");
    }
}
