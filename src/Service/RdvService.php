<?php

namespace App\Service;

use DateTime;
use App\Entity\Rdv;
use App\DTO\PatientDTO;
use App\Entity\Patient;
use App\Entity\Praticien;
use App\Mapper\RdvMapper;
use App\Repository\PatientRepository;
use App\Repository\RdvRepository;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\Common\Collections\ArrayCollection;

class RdvService
{
  private $em;
  private $rep;
  private $patientRep;

  public function __construct(EntityManagerInterface $em, RdvRepository $rep, PatientRepository $patientRep)
  {
    $this->em = $em;
    $this->rep = $rep;
    $this->patientRep = $patientRep;
  }

  public function getAllRdvsOfOnePatient(Patient $patient)
  {
    $rdvs = $patient->getRdvs();
    $rdvsDTOs = new ArrayCollection;
    $rdvMapper = new RdvMapper;
    foreach ($rdvs as $rdv) {
      $rdvDTO = $rdvMapper->convertRdvEntityToRdvDTO($rdv);
      $rdvsDTOs->add($rdvDTO);
    }
    return $rdvsDTOs;
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
