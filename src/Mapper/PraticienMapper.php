<?php

namespace App\Mapper;

use App\DTO\PraticienDTO;
use App\Entity\Praticien;

class PraticienMapper
{

    public function convertPraticienToPraticienDTO(Praticien $praticien, bool $b): PraticienDTO
    {
        if ($b) {
            return (new PraticienDTO)->setId($praticien->getId())->setNom($praticien->getNom())->setPrenom($praticien->getPrenom())->setMail($praticien->getMail())->setMdp($praticien->getMdp())->setTel($praticien->getTel());
        } else {
            return (new PraticienDTO)->setId($praticien->getId())->setNom($praticien->getNom())->setPrenom($praticien->getPrenom())->setMail($praticien->getMail())->setEtablissements($praticien->getEtablissements())->setSpecialites($praticien->getSpecialites())->setMdp($praticien->getMdp())->setTel($praticien->getTel());
        }
    }
    public function convertPraticienDTOToPraticienEntity(PraticienDTO $praticienDTO): Praticien
    {
        return (new Praticien)->setId($praticienDTO->getId())->setNom($praticienDTO->getNom())->setPrenom($praticienDTO->getPrenom())->setMail($praticienDTO->getMail())->setMdp($praticienDTO->getMdp())->setTel($praticienDTO->getTel());
    }
}
