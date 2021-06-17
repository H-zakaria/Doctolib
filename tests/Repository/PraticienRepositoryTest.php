<?php

namespace App\test\Repository;

use App\DataFixtures\AppFixtures;
use App\Repository\PraticienRepository;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;
use Liip\TestFixturesBundle\Test\FixturesTrait;

class PraticienRepositoryTest extends KernelTestCase
{
    use FixturesTrait;

    public function testFind()
    {
        self::bootKernel();
        $repository = self::$container->get(PraticienRepository::class);
        $this->loadFixtures([AppFixtures::class]);
        $Praticien = $repository->find(1);
        $this->assertIsObject($Praticien, 'testFind pb');
        $this->assertEquals(1, $Praticien->getId(), 'testFind pb assertEquals');
    }

    public function testFindAll()
    {
        self::bootKernel();                                                                     // va permettre d'acceder au container (qui contient nos classes)
        $repository = self::$container->get(PraticienRepository::class);
        $this->loadFixtures([AppFixtures::class]);                                              //purge et inserre les data de test
        $Praticiens = $repository->findAll();
        $this->assertCount(5, $Praticiens);
    }

    public function testFindOneBy()
    {
        self::bootKernel();
        $repository = self::$container->get(PraticienRepository::class);
        $this->loadFixtures([AppFixtures::class]);
        $Praticien = $repository->findOneBy(['id' => 1]);
        $this->assertIsObject($Praticien, 'testFindOneBy pb');
        $this->assertEquals(1, $Praticien->getId(), 'testFindOneBy pb assertEquals');
    }


    public function testFindBy()
    {
        self::bootKernel();
        $repository = self::$container->get(PraticienRepository::class);
        $this->loadFixtures([AppFixtures::class]);
        $Praticiens = $repository->findBy(['nom' => 'jj']);
        $this->assertCount(5, $Praticiens, 'pb testFindBy');
    }
}
