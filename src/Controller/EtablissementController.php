<?php

namespace App\Controller;

use FOS\RestBundle\Controller\AbstractFOSRestController;
use App\Entity\Etablissement;
use App\Repository\EtablissementRepository;
use FOS\RestBundle\View\View;
use FOS\RestBundle\Controller\Annotations\Get;

class EtablissementController extends AbstractFOSRestController
{
    private $rep;
    public function __construct(EtablissementRepository $rep)
    {
        $this->rep = $rep;
    }

    /**
     * 
     * @Get("etablissements")
     * @return void
     */
    public function getAll()
    {
        $etablissement = $this->rep->findAll();
        return View::create($etablissement, 200, ["content-type" => "application/json"]);
    }

    /**
     * 
     * @Get("etablissements/{id}")
     * @return void
     */

    public function getId(Etablissement $etablissement)
    {
        return View::create($etablissement, 200, ["content-type" => "application/json"]);
    }
}
