<?php

namespace APP\Service;

use App\Entity\Praticien;
use App\Entity\Patient;
use App\Entity\Rdv;
use App\Repository\PatientRepository;
use DateTime;
use Doctrine\ORM\EntityManagerInterface;

class PatientService
{
    private $em;
    private $rep;

    public function __construct(EntityManagerInterface $em, PatientRepository $rep)
    {
        $this->em = $em;
        $this->rep = $rep;
    }
}
