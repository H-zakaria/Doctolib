<?php

namespace App\test\Entity;

use App\Entity\Patient;
use App\Entity\Praticien;
use App\Entity\Rdv;
use DateTime;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;
use function PHPUnit\Framework\assertEquals;

class PatientTest extends KernelTestCase
{
  public function testPatientIsInvalid()
  {
    $kernel = self::bootKernel();
    $validator = $kernel->getContainer()->get('validator');
    $patient = new Patient();
    $patient->setNom("j")
      ->setPrenom("p")
      ->setVille("a")
      ->setRue("z");
    $errors = $validator->validate($patient);

    $this->assertCount(5, $errors, "Une erreur est attendue car moins de 2 chars");
  }

  public function testPatientIsValid()
  {
    $kernel = self::bootKernel();
    $validator = $kernel->getContainer()->get('validator');
    $patient = new Patient();
    $patient->setNom("jean")
      ->setPrenom("patrick")
      ->setVille("azerty")
      ->setRue("zoum")
      ->setDateNaissance(new DateTime("now"));
    $errors = $validator->validate($patient);

    $this->assertCount(0, $errors, "Une erreur est attendue car plus de 2 chars");
  }

  public function testSetNom()
  {
    $patient = new Patient;
    $patient->setNom('jp');

    $nom = $patient->getNom();
    assertEquals('jp', $nom, 'setNom marche pas');
  }
  public function testGetNom()
  {
    $patient = new Patient;
    $patient->setNom('jp');

    $nom = $patient->getNom();
    assertEquals('jp', $nom, 'getNom marche pas');
  }

  public function testSetPrenom()
  {
    $patient = new Patient;
    $patient->setPrenom('jp');

    $Prenom = $patient->getPrenom();
    assertEquals('jp', $Prenom, 'setPrenom marche pas');
  }
  public function testGetPrenom()
  {
    $patient = new Patient;
    $patient->setPrenom('jp');

    $Prenom = $patient->getPrenom();
    assertEquals('jp', $Prenom, 'getPrenom marche pas');
  }
  public function testSetRue()
  {
    $patient = new Patient;

    $patient->setRue('touraine');

    $rue = $patient->getRue();
    assertEquals('touraine', $rue, 'setRue ne marche pas');
  }
  public function testGetRue()
  {
    $patient = new Patient;
    $patient->setRue('touraine');

    $rue = $patient->getRue();
    assertEquals('touraine', $rue, 'getRue ne marche pas');
  }
  public function testAddRDV()
  {
    $rdv = new Rdv();
    $toubib = new Praticien();
    $toubib->setNom('roberto');
    $rdv->setPraticien($toubib);
    $pat = new Patient();
    $pat->addRdv($rdv);
    $rdvs = $pat->getRdvs();

    assertEquals('roberto', $rdvs[0]->getPraticien()->getNom(), 'addRDV ne marche pas');
  }
  public function testRemoveRDV()
  {
    $rdv = new Rdv();
    $toubib = new Praticien();
    $toubib->setNom('roberto');
    $rdv->setPraticien($toubib);
    $pat = new Patient();
    $pat->addRdv($rdv);
    if (!$pat->getRdvs()->isEmpty()) {
      $pat->removeRdv($rdv);
      $this->assertNull($pat->getRdvs()[0], 'removeRdv marche pas');
    }
  }
  public function testSetVille()
  {
    $patient = new Patient;

    $patient->setVille('tours');

    $ville = $patient->getVille();
    assertEquals('tours', $ville, 'setVille ne marche pas');
  }
  public function testGetVille()
  {
    $patient = new Patient;

    $patient->setVille('tours');

    $ville = $patient->getVille();
    assertEquals('tours', $ville, 'getVille ne marche pas');
  }
}
