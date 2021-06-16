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
    public function testRdvIsValid()
    {
        $kernel = self::bootKernel();
        $validator = $kernel->getContainer()->get('validator');

        $datetime = new DateTime();
        $patient = new Patient();
        $medecin = new Medecin();
        $rdv = new Rdv();
        $rdv->setDateTime($datetime)
            ->setPatient($patient)
            ->setMedecin($medecin);
        $errors = $validator->validate($rdv);

        $this->assertCount(0, $errors, "Une erreur est attendue car objets inexistants");
    }
}
