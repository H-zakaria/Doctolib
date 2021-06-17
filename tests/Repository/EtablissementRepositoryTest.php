<?php

namespace App\test\Repository;

use App\DataFixtures\AppFixtures;
use App\Repository\EtablissementRepository;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;
use Liip\TestFixturesBundle\Test\FixturesTrait;

class EtablissementRepositoryTest extends KernelTestCase
{
    use FixturesTrait;

    public function testFind()
    {
        self::bootKernel();
        $repository = self::$container->get(EtablissementRepository::class);
        $this->loadFixtures([AppFixtures::class]);
        $patient = $repository->find(1);
        $this->assertIsObject($patient, 'testFind pb');
        $this->assertEquals(1, $patient->getId(), 'testFind pb assertEquals');
    }

    public function testFindAll()
    {
        self::bootKernel();                                                                     // va permettre d'acceder au container (qui contient nos classes)
        $repository = self::$container->get(EtablissementRepository::class);
        $this->loadFixtures([AppFixtures::class]);                                              //purge et inserre les data de test
        $patients = $repository->findAll();
        $this->assertCount(5, $patients);
    }

    public function testFindOneBy()
    {
        self::bootKernel();
        $repository = self::$container->get(EtablissementRepository::class);
        $this->loadFixtures([AppFixtures::class]);
        $patient = $repository->findOneBy(['id' => 1]);
        $this->assertIsObject($patient, 'testFindOneBy pb');
        $this->assertEquals(1, $patient->getId(), 'testFindOneBy pb assertEquals');
    }


    public function testFindBy()
    {
        self::bootKernel();
        $repository = self::$container->get(EtablissementRepository::class);
        $this->loadFixtures([AppFixtures::class]);
        $patients = $repository->findBy(['nom' => 'jj']);
        $this->assertCount(5, $patients, 'pb testFindBy');
    }
}
