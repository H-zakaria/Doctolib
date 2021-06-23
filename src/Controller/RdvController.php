<?php

namespace App\Controller;

use App\Entity\Rdv;
use App\Entity\Patient;
use App\Entity\Praticien;
use FOS\RestBundle\View\View;
use App\Repository\RdvRepository;
use App\Service\RdvService;
use FOS\RestBundle\Controller\Annotations\Get;
use FOS\RestBundle\Controller\Annotations\Post;
use FOS\RestBundle\Controller\Annotations\Delete;
use FOS\RestBundle\Controller\AbstractFOSRestController;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;

class RdvController extends AbstractFOSRestController
{
  private $serv;
  public function __construct(RdvService $serv)
  {
    $this->serv = $serv;
  }

  /**
   * 
   * @Get("rdvs/{id}")
   * @return void
   */
  public function getAllRdvsOfOnePatient(Patient $patient)
  {
    $rdvs = $this->serv->getAllRdvsOfOnePatient($patient);
    return View::create($rdvs, 200, ["content-type" => "application/json"]);
  }

  /**
   * 
   * @Get("rdvs/{id}")
   * @return void
   */
  public function getId(Rdv $rdv)
  {
    return View::create($rdv, 200, ["content-type" => "application/json"]);
  }

  /**
   * 
   * @Post("rdvs")
   * @ParamConverter("rdv", converter="fos_rest.request_body")
   * @return void
   */
  public function createRdv(Rdv $rdv)
  {
    $manager = $this->getDoctrine()->getManager();
    $repo1 = $this->getDoctrine()->getRepository(Patient::class);
    $repo2 = $this->getDoctrine()->getRepository(Praticien::class);

    if ($repo1->find($rdv->getPatient()->getId()) == null || $repo2->find($rdv->getPraticien()->getId()) == null) {
      $manager->persist($rdv->getPatient());
      $manager->persist($rdv->getPraticien());
    } else {
      $patient = $repo1->find($rdv->getPatient()->getId());
      $praticien = $repo2->find($rdv->getPraticien()->getId());
      $rdv->setPatient($patient);
      $rdv->setPraticien($praticien);
    }

    $manager->persist($rdv);
    $manager->flush();
    return View::create(null, 200);
  }

  /**
   * 
   * @Delete("patients/{id}")
   * @return void
   */
  public function deletePatient()
  {
  }
}
