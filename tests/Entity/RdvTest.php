<?php

namespace App\test\Entity;

use App\Entity\Rdv;
use App\Entity\Patient;
use App\Entity\Praticien;
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
        $Praticien = new Praticien();
        $rdv = new Rdv();
        $rdv->setDateTime($datetime)
            ->setPatient($patient)
            ->setPraticien($Praticien);
        $errors = $validator->validate($rdv);

        $this->assertCount(0, $errors, "Une erreur est attendue car objets inexistants");
    }
}
