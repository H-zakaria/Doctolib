<?php

namespace App\Mapper;

use App\DTO\PatientDTO;
use App\DTO\PraticienDTO;
use App\DTO\RdvDTO;
use App\Entity\Patient;

class PatientMapper
{

  public function convertPatientEntityToPatientDTO(Patient $patient): PatientDTO
  {
    $patientDTO = (new PatientDTO)->setId($patient->getId())
      ->setNom($patient->getNom())
      ->setPrenom($patient->getPrenom())
      ->setVille($patient->getVille())
      ->setRue($patient->getRue())
      ->setDateNaissance($patient->getDateNaissance())
      ->setMail($patient->getMail())
      ->setMdp($patient->getMdp())
      ->setTel($patient->getTel());
    // $rdvs = $patient->getRdvs();
    // foreach ($rdvs as $rdv) {
    //     $patientDTO->addRdvDTO((new RdvMapper)->convertRdvEntityToRdvDTO($rdv));
    // }
    return $patientDTO;
  }
  public function convertPatientDTOToPatientEntity(PatientDTO $patientDTO, Patient $alteredPatient = null): Patient
  {
    //pour modification d'un patient
    if ($alteredPatient !== null) {
      $alteredPatient
        ->setNom($patientDTO->getNom())
        ->setPrenom($patientDTO->getPrenom())
        ->setVille($patientDTO->getVille())
        ->setRue($patientDTO->getRue())
        ->setDateNaissance($patientDTO->getDateNaissance())
        ->setMail($patientDTO->getMail())
        ->setMdp($patientDTO->getMdp())
        ->setTel($patientDTO->getTel());

      return $alteredPatient;
    } else {
      //pour creation d'un patient
      $patientEntity = (new Patient)
        ->setNom($patientDTO->getNom())
        ->setPrenom($patientDTO->getPrenom())
        ->setVille($patientDTO->getVille())
        ->setRue($patientDTO->getRue())
        ->setDateNaissance($patientDTO->getDateNaissance())
        ->setMail($patientDTO->getMail())
        ->setMdp($patientDTO->getMdp())
        ->setTel($patientDTO->getTel());
      return $patientEntity;
    }
  }
}
