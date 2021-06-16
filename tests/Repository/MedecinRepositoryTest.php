<?php

namespace App\test\Repository;

use App\DataFixtures\AppFixtures;
use App\Repository\MedecinRepository;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;
use Liip\TestFixturesBundle\Test\FixturesTrait;

class MedecinRepositoryTest extends KernelTestCase
{
    use FixturesTrait;

    public function testFind()
    {
        self::bootKernel();
        $repository = self::$container->get(MedecinRepository::class);
        $this->loadFixtures([AppFixtures::class]);
        $Medecin = $repository->find(1);
        $this->assertIsObject($Medecin, 'testFind pb');
        $this->assertEquals(1, $Medecin->getId(), 'testFind pb assertEquals');
    }

    public function testFindAll()
    {
        self::bootKernel();                                                                     // va permettre d'acceder au container (qui contient nos classes)
        $repository = self::$container->get(MedecinRepository::class);
        $this->loadFixtures([AppFixtures::class]);                                              //purge et inserre les data de test
        $Medecins = $repository->findAll();
        $this->assertCount(5, $Medecins);
    }

    public function testFindOneBy()
    {
        self::bootKernel();
        $repository = self::$container->get(MedecinRepository::class);
        $this->loadFixtures([AppFixtures::class]);
        $Medecin = $repository->findOneBy(['id' => 1]);
        $this->assertIsObject($Medecin, 'testFindOneBy pb');
        $this->assertEquals(1, $Medecin->getId(), 'testFindOneBy pb assertEquals');
    }


    public function testFindBy()
    {
        self::bootKernel();
        $repository = self::$container->get(MedecinRepository::class);
        $this->loadFixtures([AppFixtures::class]);
        $Medecins = $repository->findBy(['nom' => 'jj']);
        $this->assertCount(5, $Medecins, 'pb testFindBy');
    }
}
