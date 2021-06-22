<?php

namespace App\Service;

use App\Entity\Etablissement;
use Doctrine\ORM\EntityManagerInterface;
use App\Repository\EtablissementRepository;

class EtablissementService
{
    private $rep;
    private $em;

    public function __construct(EtablissementRepository $rep, EntityManagerInterface $em)
    {
        $this->rep = $rep;
        $this->em = $em;
    }
    public function createEtablissement(Etablissement $e)
    {
    }
}
