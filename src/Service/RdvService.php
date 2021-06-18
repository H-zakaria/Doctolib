<?php

namespace App\Service;

use App\Entity\Praticien;
use App\Entity\Patient;
use App\Entity\Rdv;
use App\Repository\RdvRepository;
use DateTime;
use Doctrine\ORM\EntityManagerInterface;

class RdvService
{
  private $em;
  private $rep;

  public function __construct(EntityManagerInterface $em, RdvRepository $rep)
  {
    $this->em = $em;
    $this->rep = $rep;
  }

  public function prendreRdv(Praticien $praticien, DateTime $dateTime, Patient $patient)
  {
    $rdv = new Rdv;
    $rdv->setPraticien($praticien)->setDateTime($dateTime);
    $patient->addRdv($rdv);
    if ($this::rdvIsValid($rdv)) {
      $this->em->persist($patient);
      $this->em->flush();
    }
  }

  private static function rdvIsValid(Rdv $rdv)
  {
    //recup les rdvs du prat 
    $dateTime = $rdv->getDateTime();
    $date = $dateTime->format('d-m-Y');
    $prat = $rdv->getPraticien();
    $pratRdvs = ($prat->getRdvs())->toArray();
    //recup les rdvs qui qui ont lieu le mm jour
    // $mmJour = array_filter($pratRdvs, function ($d) {
    //   //formatter pour exclure h-m-s
    //   return $date == $d->format('d-m-Y'); //convertir $d en date ? $d = strtotime($d);
    // });
  }

  public function annulerRdv(Rdv $rdv)
  {
    $patient =  $rdv->getPatient();
    $patient->removeRdv($rdv);
    $this->em->persist($patient);
    $this->em->flush;
  }
}
