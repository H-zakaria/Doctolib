<?php

namespace App\test\Repository;

use App\Repository\PatientRepository;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;

class PatientRepositoryTest extends KernelTestCase
{

    public function testFindAll()
    {
        self::bootKernel();
        $repository = self::$container->get(PatientRepository::class);

        $patients = $repository->findAll();

        $this->assertCount(0, $patients);
    }
}
