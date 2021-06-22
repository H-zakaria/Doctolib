<?php

namespace App\Controller;

use App\DTO\PatientDTO;
use App\Entity\Patient;
use App\Mapper\PatientMapper;
use FOS\RestBundle\View\View;
use App\Service\PatientService;
use FOS\RestBundle\Controller\Annotations\Get;
use FOS\RestBundle\Controller\Annotations\Post;
use FOS\RestBundle\Controller\Annotations\Delete;
use FOS\RestBundle\Controller\AbstractFOSRestController;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;

class PatientController extends AbstractFOSRestController
{
    private $patientService;

    public function __construct(PatientService $patientService)
    {
        $this->patientService = $patientService;
    }

    /**
     * 
     * @Get("patients")
     * @return void
     */
    public function getAll()
    {
        $patientsDTO = $this->patientService->findAll();
        return View::create($patientsDTO, 200, ["content-type" => "application/json"]);
    }

    /**
     * 
     * @Get("patients/{id}")
     * @return void
     */
    public function getId(Patient $patientDTO)
    {
        return View::create($patientDTO, 200, ["content-type" => "application/json"]);
    }

    /**
     * 
     * @Post("patients")
     * @ParamConverter("patient", converter="fos_rest.request_body")
     * @return void
     */
    public function createPatient(PatientDTO $patientDTO)
    {
        // if (!$this->patientService->save($patientDTO)) {
            return View::create(null, 404);
        // }
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
