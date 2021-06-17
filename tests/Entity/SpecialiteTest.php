<?php

namespace App\test\Entity;

use App\Entity\Specialite;
use App\Entity\Praticien;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;
use function PHPUnit\Framework\assertEquals;
use function PHPUnit\Framework\assertNotNull;
use function PHPUnit\Framework\assertCount;

class SpecialiteTest extends KernelTestCase
{
    public function testSpecialiteIsInvalid()
    {
        $kernel = self::bootKernel();
        $validator = $kernel->getContainer()->get('validator');

        $specialite = new Specialite();
        $specialite->setDesignation("c");
        $errors = $validator->validate($specialite);

        $this->assertCount(1, $errors, "Une erreur est attendue car moins de 2 chars");
    }

    public function testSpecialiteIsValid()
    {
        $kernel = self::bootKernel();
        $validator = $kernel->getContainer()->get('validator');

        $specialite = new Specialite();
        $specialite->setDesignation("ceci est une designation");
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

    public function testGetPraticiens()
    {
        $et = new Specialite;
        $m = new Praticien;
        $m->setNom('a');
        $et->addPraticien($m);
        assertEquals('a', $et->getPraticiens()[0]->getNom(), 'getPraticiens pb');
    }

    public function testAddPraticien()
    {
        $et = new Specialite;
        $m = new Praticien;
        $et->addPraticien($m);
        assertNotNull($et->getPraticiens(), 'addPraticiens pb');
    }

    public function testRemovePraticien()
    {
        $et = new Specialite;
        $m = new Praticien;
        $m->setNom('fred');
        $et->addPraticien($m);
        $et->removePraticien($m);
        assertCount(0, $et->getPraticiens());
    }
}
