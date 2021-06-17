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

    public function testSetDateTime()
    {
        $rdv = new Rdv;
        $date = new \DateTime("2018-05-01 00:00:00");
        $rdv->setDateTime($date);

        $datetime = $rdv->getDateTime();
        assertEquals($date, $datetime, 'setDateTime ne marche pas');
    }

    public function testGetDateTime()
    {
        $rdv = new Rdv;
        $date = new \DateTime("2018-05-01 00:00:00");
        $rdv->setDateTime($date);

        $datetime = $rdv->getDateTime();
        assertEquals($date, $datetime, 'getDateTime ne marche pas');
    }

    public function testSetPatient()
    {
        $rdv = new Rdv;
        $patient = new Patient();
        $rdv->setPatient($patient);

        $getPatient = $rdv->getPatient();
        assertEquals($patient, $getPatient, 'setPatient ne marche pas');
    }

    public function testGetPatient()
    {
        $rdv = new Rdv;
        $patient = new Patient();
        $rdv->setPatient($patient);

        $getPatient = $rdv->getPatient();
        assertEquals($patient, $getPatient, 'getPatient ne marche pas');
    }

    public function testSetPraticien()
    {
        $rdv = new Rdv;
        $praticien = new Praticien();
        $rdv->setPraticien($praticien);

        $getPraticien = $rdv->getPraticien();
        assertEquals($praticien, $getPraticien, 'setPraticien ne marche pas');
    }

    public function testGetPraticien()
    {
        $rdv = new Rdv;
        $praticien = new Praticien();
        $rdv->setPraticien($praticien);

        $getPraticien = $rdv->getPraticien();
        assertEquals($praticien, $getPraticien, 'getPraticien ne marche pas');
    }
}
