<?php

namespace App\test\Repository;

use App\DataFixtures\AppFixtures;
use App\Repository\SpecialiteRepository;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;
use Liip\TestFixturesBundle\Test\FixturesTrait;

class SpecialiteRepositoryTest extends KernelTestCase
{
    use FixturesTrait;

    public function testFind()
    {
        self::bootKernel();
        $repository = self::$container->get(SpecialiteRepository::class);
        $this->loadFixtures([AppFixtures::class]);
        $Specialite = $repository->find(1);
        $this->assertIsObject($Specialite, 'testFind pb');
        $this->assertEquals(1, $Specialite->getId(), 'testFind pb assertEquals');
    }

    public function testFindAll()
    {
        self::bootKernel();                                                                     // va permettre d'acceder au container (qui contient nos classes)
        $repository = self::$container->get(SpecialiteRepository::class);
        $this->loadFixtures([AppFixtures::class]);                                              //purge et inserre les data de test
        $Specialites = $repository->findAll();
        $this->assertCount(5, $Specialites);
    }

    public function testFindOneBy()
    {
        self::bootKernel();
        $repository = self::$container->get(SpecialiteRepository::class);
        $this->loadFixtures([AppFixtures::class]);
        $Specialite = $repository->findOneBy(['id' => 1]);
        $this->assertIsObject($Specialite, 'testFindOneBy pb');
        $this->assertEquals(1, $Specialite->getId(), 'testFindOneBy pb assertEquals');
    }


    public function testFindBy()
    {
        self::bootKernel();
        $repository = self::$container->get(SpecialiteRepository::class);
        $this->loadFixtures([AppFixtures::class]);
        $Specialites = $repository->findBy(['nom' => 'jj']);
        $this->assertCount(5, $Specialites, 'pb testFindBy');
    }
}
