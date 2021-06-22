<?php

namespace App\Mapper;

use App\DTO\RdvDTO;
use App\Entity\Rdv;

class RdvMapper
{
    public function convertRdvEntityToRdvDTO(Rdv $rdv): RdvDTO
    {
        $rdvDTO = (new RdvDTO)->setId($rdv->getId())->setPraticienDTO((new PraticienMapper)->convertPraticienToPraticienDTO($rdv->getPraticien(), true));
        return $rdvDTO;
    }
}
