<?php

namespace App\Service;

use App\Mapper\PatientMapper;
use App\Repository\PatientRepository;
use Doctrine\ORM\EntityManagerInterface;

class PatientService
{
  private $patientRepository;

  public function __construct(PatientRepository $repo)
  {
    $this->patientRepository = $repo;
  }

  public function findAll()
  {
    $patients = $this->patientRepository->findAll();
    $patientDTOs = [];
    foreach ($patients as $patient) {
      $mapper = new PatientMapper();
      $patientDTO = $mapper->convertPatientEntityToPatientDTO($patient);
      $patientDTOs[] = $patientDTO;
    }
    return $patientDTOs;
  }
}
