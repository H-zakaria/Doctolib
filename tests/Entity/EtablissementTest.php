<?php

namespace App\test\Entity;

use App\Entity\Etablissement;
use App\Entity\Medecin;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;
use function PHPUnit\Framework\assertEquals;
use function PHPUnit\Framework\assertNotNull;
use function PHPUnit\Framework\assertNull;

class EtablissementTest extends KernelTestCase
{
  public function testEtablissementIsInvalid()
  {
    $kernel = self::bootKernel();
    $validator = $kernel->getContainer()->get('validator');
    $Etablissement = new Etablissement();
    $Etablissement->setNom("j")
      ->setVille("p1")
      ->setRue("a");
    $errors = $validator->validate($Etablissement);

    $this->assertCount(3, $errors, "Une erreur est attendue car moins de 2 chars et un chiffre dans la ville");
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


  public function testSetGetNom()
  {
    $et = new Etablissement;
    $et->setNom('n');
    assertEquals('n', $et->getNom(), 'set/getNom pb');
  }


  public function testGetMedecins()
  {
    $et = new Etablissement;
    $m = new Medecin;
    $m->setNom('a');
    $et->addMedecin($m);
    assertEquals('a', $et->getMedecins()[0]->getNom(), 'getMedecins pb');
  }

  public function testAddMedecin()
  {
    $et = new Etablissement;
    $m = new Medecin;
    $et->addMedecin($m);
    assertNotNull($et->getMedecins(), 'addMedecins pb');
  }

  public function testRemoveMedecin()
  {
    $et = new Etablissement;
    $m = new Medecin;
    $et->addMedecin($m);
    if (!$et->getMedecins()->isEmpty()) {
      $et->removeMedecin($m);
      assertNull($et->getMedecins());
    }
  }

  public function testSetGetVille()
  {
    $et = new Etablissement;
    $et->setVille("tours");
    assertEquals('tours', $et->getVille());
  }


  public function testSetGetRue()
  {
    $et = new Etablissement;
    $et->setRue("tours");
    assertEquals('tours', $et->getRue());
  }

  public function setRue(string $rue): self
  {
    $this->rue = $rue;

    return $this;
  }
}
