<?php

namespace App\Service;

use App\DTO\PraticienDTO;
use App\Entity\Praticien;
use App\Entity\Etablissement;
use App\Mapper\PatientMapper;
use FOS\RestBundle\View\View;
use App\Mapper\PraticienMapper;
use App\Repository\PraticienRepository;
use Doctrine\ORM\EntityManagerInterface;

class PraticienService
{
    private $rep;
    private $em;

    public function __construct(PraticienRepository $rep, EntityManagerInterface $em)
    {
        $this->rep = $rep;
        $this->em = $em;
    }


    public function createPrat(PraticienDTO $praticienDTO)
    {

        $etablissements = $this->rep->find($praticienDTO->getEtablissements());
        $specialites = $this->rep->find($praticienDTO->getSpecialites());
        if ($etablissements == null || $specialites == null) {
            return false;
        }
        $pratToCreate = (new PraticienMapper)->convertpraticienDTOToPraticienEntity($praticienDTO);
        // $pratToCreate->addEtablissement();
        $this->entityManager->persist($pratToCreate);
        $this->entityManager->flush();
        return true;
    }
}
