<?php

namespace App\Mapper;

use App\DTO\EtablissementDTO;
use App\Entity\Etablissement;

class EtablissementMapper
{
    public function convertEtablissementToEtablissementDTO(Etablissement $et): EtablissementDTO
    {

        $etablissementDTO = (new EtablissementDTO)
            ->setId($et->getId())
            ->setNom($et->getNom())
            ->setVille($et->getVille())
            ->setRue($et->getRue());
        return $etablissementDTO;
    }
    public function convertEtablissementDTOToEtablissement(EtablissementDTO $et): Etablissement
    {

        $etablissement = (new Etablissement)
            ->setId($et->getId())
            ->setNom($et->getNom())
            ->setVille($et->getVille())
            ->setRue($et->getRue());
        return $etablissement;
    }
}
