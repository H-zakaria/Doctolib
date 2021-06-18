<?php

namespace App\Service;

use App\Entity\Praticien;
use FOS\RestBundle\View\View;
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

    public function creerPrat(Praticien $praticien)
    {
        $this->em->persist($praticien);
        $this->em->flush();
        return View::create(null, 200, ["content-type" => "application/json"]);
    }
}
