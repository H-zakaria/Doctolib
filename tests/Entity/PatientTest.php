<?php

namespace App\test\Entity;

use PHPUnit\Framework\TestCase;
use App\Entity\Patient;

use function PHPUnit\Framework\assertEquals;

class PatientTest extends TestCase
{

  public function testSetNom()
  {
    $patient = new Patient;
    $patient->setNom('jp');

    $nom = $patient->getNom();
    assertEquals('jp', $nom, 'enjfojeoijfief');
  }
  public function testGetNom()
  {
    $patient = new Patient;
    $patient->setNom('jp');

    $nom = $patient->getNom();
    assertEquals('jp', $nom, 'enjfojeoijfief');
  }
  public function testSetPrenom()
  {
    $patient = new Patient;
    $patient->setPrenom('jp');

    $Prenom = $patient->getPrenom();
    assertEquals('jp', $Prenom, 'enjfojeoijfief');
  }
  public function testGetPrenom()
  {
    $patient = new Patient;
    $patient->setPrenom('jp');

    $Prenom = $patient->getPrenom();
    assertEquals('jp', $Prenom, 'enjfojeoijfief');
  }
  public function testSetAdresse()
  {
    $patient = new Patient;
    $patient->setAdresse('jp');

    $Adresse = $patient->getAdresse();
    assertEquals('jp', $Adresse, 'enjfojeoijfief');
  }
  public function testGetAdresse()
  {
    $patient = new Patient;
    $patient->setAdresse('jp');

    $Adresse = $patient->getAdresse();
    assertEquals('jp', $Adresse, 'enjfojeoijfief');
  }
  // public function testSetRdvs()
  // {
  //   $patient = new Patient;

  //   $patient->addRdv()

  //   $Adresse = $patient->getAdresse();
  //   assertEquals('jp', $Adresse, 'enjfojeoijfief');
  // }
  // public function testGetRdvs()
  // {
  //   $patient = new Patient;
  //   $patient->setAdresse('jp');

  //   $Adresse = $patient->getAdresse();
  //   assertEquals('jp', $Adresse, 'enjfojeoijfief');
  // }
}
