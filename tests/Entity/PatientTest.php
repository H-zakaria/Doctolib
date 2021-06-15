<?php

namespace App\test\Entity;

use App\Entity\Medecin;
use PHPUnit\Framework\TestCase;
use App\Entity\Patient;
use App\Entity\Rdv;

use function PHPUnit\Framework\assertEquals;

class PatientTest extends TestCase
{

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
    $toubib = new Medecin();
    $toubib->setNom('roberto');
    $rdv->setMedecin($toubib);
    $pat = new Patient();
    $pat->addRdv($rdv);
    $rdvs = $pat->getRdvs();

    assertEquals('roberto', $rdvs[0]->getMedecin()->getNom(), 'addRDV ne marche pas');
  }
  public function testRemoveRDV()
  {
    $rdv = new Rdv();
    $toubib = new Medecin();
    $toubib->setNom('roberto');
    $rdv->setMedecin($toubib);
    $pat = new Patient();
    $pat->addRdv($rdv);
    $rdvs = $pat->getRdvs();
    $pat->removeRdv($rdv); //ça marche
    assertEquals('roberto', $rdvs[0]->getMedecin()->getNom(), '');
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
