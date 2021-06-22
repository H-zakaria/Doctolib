<?php

namespace App\Service;

use App\DTO\PatientDTO;
use App\Entity\Patient;
use App\Mapper\PatientMapper;
use App\Repository\PatientRepository;
use Doctrine\ORM\EntityManagerInterface;

class PatientService
{
  private $patientRepository;
  private $em;

  public function __construct(PatientRepository $repo, EntityManagerInterface $em)
  {
    $this->patientRepository = $repo;
    $this->em = $em;
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
  public function getById(Patient $patient)
  {
    $pat = $this->patientRepository->find($patient);
    if ($pat == null) {
      return false;
    } else {
      return (new PatientMapper)->convertPatientEntityToPatientDTO($pat);
    }
  }

  public function createPatient(PatientDTO $pDTO)
  {
    $patient = (new PatientMapper)->convertPatientDTOToPatientEntity($pDTO);
    $this->em->persist($patient);
    $this->em->flush();
    if (!$this->patientRepository->find($patient)) {
      return false;
    } else {
      return true;
    }
  }
  public function modifyPatient(PatientDTO $pDTO)
  {
    $patient = (new PatientMapper)->convertPatientDTOToPatientEntity($pDTO);
    $this->em->persist($patient);
    $this->em->flush();
    if (!$this->patientRepository->find($patient)) {
      return false;
    } else {
      return true;
    }
  }
}
