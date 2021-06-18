<?php

namespace App\Controller;

use App\Entity\Praticien;
use FOS\RestBundle\View\View;
use App\Repository\PraticienRepository;
use App\Service\PraticienService;
use FOS\RestBundle\Controller\AbstractFOSRestController;
use FOS\RestBundle\Controller\Annotations\Get;
use FOS\RestBundle\Controller\Annotations\Post;

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
    // /**
    //  * @GET("praticiens")
    //  * @return void
    //  */
    // public function getAll()
    // {
    //     $praticiens = $this->rep->findAll();
    //     return View::create($praticiens, 200, ["content-type" => "application/json"]);
    // }
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
     * @return void
     */
    public function creerPrat(Praticien $praticien)
    {
        return $this->serv->creerPrat($praticien);
    }
}
