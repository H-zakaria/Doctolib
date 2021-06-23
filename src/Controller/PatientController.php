<?php

namespace App\Controller;

use OpenApi\Annotations as OA;
use App\DTO\PatientDTO;
use App\Entity\Patient;
use App\Mapper\PatientMapper;
use FOS\RestBundle\View\View;
use App\Service\PatientService;
use FOS\RestBundle\Controller\Annotations\Get;
use FOS\RestBundle\Controller\Annotations\Post;
use FOS\RestBundle\Controller\Annotations\Put;
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
     * @OA\Get(
     *     path="/patients/{id}",
     *     operationId="getById",
     *     @OA\Parameter(
     *         description="ID of patient to return",
     *         in="path",
     *         name="id",
     *         required=true,
     *         @OA\Schema(
     *           type="integer",
     *           format="int64"
     *         )
     *     ),
     *     @OA\Response(
     *         response=404,
     *         description="Patient was not found"
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Patient was found"
     *     )
     * )
     * @Get("patients/{id}")
     * @return void
     */
    public function getById(Patient $patient)
    {
        $result =  $this->patientService->getById($patient);
        if ($result) {
            return View::create($result, 200, ["content-type" => "application/json"]);
        } else {
            return View::create($result, 404, ["content-type" => "application/json"]);
        }
    }

    /**
     * @OA\Post(
     *     path="/patients",
     *     operationId="createPatient",
     *     @OA\Response(
     *         response=418,
     *         description="Patient was not created"
     *     ),
     *     @OA\Response(
     *         response=201,
     *         description="Patient was created"
     *     ),
     * requestBody={"$ref"="#/components/requestBodies/patients"}
     * )
     * @Post("patients")
     * @ParamConverter("patientDTO", converter="fos_rest.request_body")
     * @return void
     */
    public function createPatient(PatientDTO $patientDTO)
    {
        if (!$this->patientService->createPatient($patientDTO)) {
            return View::create(null, 418);
        }
        return View::create(null, 200);
    }

    /** 
     * @Put("patients/{id}")
     * @ParamConverter("patientDTO", converter="fos_rest.request_body")
     * @return void
     */
    public function modifyPatient(PatientDTO $patientDTO, Patient $toAlter)
    {
        if (!$this->patientService->modifyPatient($patientDTO, $toAlter)) {
            return View::create(null, 418);
        }
    }


    /**
     * @OA\Delete(
     *     path="/patients/{id}",
     *     summary="Deletes a patient",
     *     description="",
     *     operationId="deletePatients",
     *     @OA\Parameter(
     *         description="Patient id to delete",
     *         in="path",
     *         name="id",
     *         required=true,
     *         @OA\Schema(
     *             type="integer",
     *             format="int64"
     *         )
     *     ),
     *     @OA\Header(
     *         header="api_key",
     *         description="Api key header",
     *         required=false,
     *         @OA\Schema(
     *             type="string"
     *         )
     *     ),
     *     @OA\Response(
     *         response=404,
     *         description="patient not found"
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="patient successful deletion"
     *     )
     * )
     * @Delete("patients/{id}")
     * @return void
     */
    public function deletePatient(Patient $patient)
    {
        if ($this->patientService->deletePatient($patient)) {
            return View::create(null, 404);
        }
        return View::create(null, 200);
    }
}
