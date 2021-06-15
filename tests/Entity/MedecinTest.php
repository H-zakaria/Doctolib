<?php

namespace App\test\Entity;

use App\Entity\Rdv;
use App\Entity\Medecin;
use App\Entity\Patient;
use App\Entity\Specialite;
use function PHPUnit\Framework\assertEquals;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;

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
  public function testSetNom()
  {
    $Medecin = new Medecin;
    $Medecin->setNom('jp');

    $nom = $Medecin->getNom();
    assertEquals('jp', $nom, 'setNom marche pas');
  }
  public function testGetNom()
  {
    $Medecin = new Medecin;
    $Medecin->setNom('jp');

    $nom = $Medecin->getNom();
    assertEquals('jp', $nom, 'getNom marche pas');
  }
  public function testSetPrenom()
  {
    $Medecin = new Medecin;
    $Medecin->setPrenom('jp');

    $Prenom = $Medecin->getPrenom();
    assertEquals('jp', $Prenom, 'setPrenom marche pas');
  }
  public function testGetPrenom()
  {
    $Medecin = new Medecin;
    $Medecin->setPrenom('jp');

    $Prenom = $Medecin->getPrenom();
    assertEquals('jp', $Prenom, 'getPrenom marche pas');
  }
  public function testAddRDV()
  {
    $rdv = new Rdv();
    $toubib = new Medecin();
    $pat = new Patient();
    $pat->setNom('roberto');
    $rdv->setPatient($pat);
    $toubib->addRdv($rdv);
    $rdvs = $toubib->getRdvs();

    assertEquals('roberto', $rdvs[0]->getPatient()->getNom(), 'addRDV ne marche pas');
  }
  public function testRemoveRDV()
  {
    $rdv = new Rdv();
    $toubib = new Medecin();
    $pat = new Patient();
    $pat->setNom('roberto');
    $rdv->setPatient($pat);
    $toubib->addRdv($rdv);
    $rdvs = $toubib->getRdvs();

    assertEquals('roberto', $rdvs[0]->getPatient()->getNom(), 'addRDV ne marche pas');
  }

  public function testAddSpecialite()
  {
    $spe = new Specialite();
    $toubib = new Medecin();
    $spe->setDesignation('cardiologie');
    $toubib->addSpecialite($spe);

    assertEquals('cardiologie', $toubib->getSpecialites()[0]->getDesignation());
  }
  public function testGetSpecialite()
  {
    $spe = new Specialite();
    $toubib = new Medecin();
    $spe->setDesignation('cardiologie');
    $toubib->addSpecialite($spe);
    assertEquals('cardiologie', $toubib->getSpecialites()[0]->getDesignation());
  }
  public function testRemoveSpecialite()
  {
    $spe = new Specialite();
    $toubib = new Medecin();
    $spe->setDesignation('cardiologie');
    $toubib->addSpecialite($spe);
    $toubib->removeSpecialite($spe);
    $this->assertNull($toubib->getSpecialites()[0], 'removeSpecialite marche pas');
  }
}
