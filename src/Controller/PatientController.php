<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use FOS\RestBundle\View\View;
use FOS\RestBundle\Controller\Annotations\Get;
use FOS\RestBundle\Controller\Annotations\Post;
use FOS\RestBundle\Controller\AbstractFOSRestController;
use App\Entity\Patient;
use App\Repository\PatientRepository;

class PatientController extends AbstractFOSRestController
{
    private $rep;
    public function __construct(PatientRepository $rep)
    {
        $this->rep = $rep;
    }

    /**
     * 
     * @Get("patientss")
     * @return void
     */
    public function getAll()
    {
        $patients = $this->rep->findAll();
        return View::create($patients, 200, ["content-type" => "application/json"]);
    }

    /**
     * 
     * @Get("patients/{id}")
     * @return void
     */
    public function getId(Patient $patient)
    {
        return View::create($patient, 200, ["content-type" => "application/json"]);
    }


    /***CreatePatient.
     * @Post("/patient")*
     * 
     * @returnResponse
     */
    public function postPatient(Request $request)
    {
        $patient = new Patient();
        $form = $this->createForm(PatientType::class, $patient);
        $data = json_decode($request->getContent(), true);
        $form->submit($data);
        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($patient);
            $em->flush();
            return $this->handleView($this->view(['status' => 'ok'], Response::HTTP_CREATED));
        }
        return $this->handleView($this->view($form->getErrors()));
    }

    /***CreatePatient.
     * @Post("/patients")*
     */
    public function createPatient(Patient $patient)
    {
        $manager = $this->getDoctrine()->getManager();
        $manager->persist($patient);
        $manager->flush();
        return View::create(null, 200);
    }
}
