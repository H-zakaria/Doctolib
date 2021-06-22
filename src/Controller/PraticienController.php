<?php

namespace App\Controller;

use App\DTO\PraticienDTO;
use App\Entity\Praticien;
use FOS\RestBundle\View\View;
use App\Service\PraticienService;
use App\Repository\PraticienRepository;
use FOS\RestBundle\Controller\Annotations\Get;
use FOS\RestBundle\Controller\Annotations\Post;
use FOS\RestBundle\Controller\AbstractFOSRestController;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;

// = un webservice
class PraticienController extends AbstractFOSRestController
{
    private $rep;
    private $serv;
    public function __construct(PraticienRepository $rep, PraticienService $service)
    {
        $this->rep = $rep;
        $this->serv = $service;
    }
    /**
     * @GET("praticiens")
     * @return void
     */
    public function getAll()
    {
        $praticiens = $this->rep->findAll();
        return View::create($praticiens, 200, ["content-type" => "application/json"]);
    }
    /**
     * @GET("praticiens/{id}")
     * 
     * @param int $id
     * @return void
     */
    public function getByID($id)
    {
        $praticiens = $this->rep->find($id);
        return View::create($praticiens, 200, ["content-type" => "application/json"]); //indique que ce qui est reçu est au format json
    }
    //post envoie infos vers serv; comment les generer?

    /**
     * @Post("/praticiens")
     * @ParamConverter("praticien", converter="fos_rest.request_body")
     * @return void
     */
    public function creerPrat(PraticienDTO $praticienDTO)
    {
        $this->serv->createPrat($praticienDTO);
        return View::create(null, 200, ["content-type" => "application/json"]);
    }
}
