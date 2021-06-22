<?php

namespace App\Mapper;

use App\DTO\PatientDTO;
use App\Entity\Patient;

class PatientMapper
{

    public function convertPatientEntityToPatientDTO(Patient $patient): PatientDTO
    {
        $patientDTO = (new PatientDTO())->setId($patient->getId())
            ->setNom($patient->getNom())
            ->setPrenom($patient->getPrenom())
            ->setVille($patient->getVille())
            ->setRue($patient->getRue())
            ->setDateNaissance($patient->getDateNaissance())
            ->setMail($patient->getMail())
            ->setMdp($patient->getMdp())
            ->setTel($patient->getTel());
        return $patientDTO;
    }
}
