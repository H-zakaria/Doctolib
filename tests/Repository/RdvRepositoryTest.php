<?php

namespace App\test\Repository;

use App\DataFixtures\AppFixtures;
use App\Repository\RdvRepository;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;
use Liip\TestFixturesBundle\Test\FixturesTrait;

class RdvRepositoryTest extends KernelTestCase
{
    use FixturesTrait;

    public function testFind()
    {
        self::bootKernel();
        $repository = self::$container->get(RdvRepository::class);
        $this->loadFixtures([AppFixtures::class]);
        $rdv = $repository->find(1);
        $this->assertIsObject($rdv, 'testFind pb');
        $this->assertEquals(1, $rdv->getId(), 'testFind pb assertEquals');
    }

    public function testFindAll()
    {
        self::bootKernel();                                                                     // va permettre d'acceder au container (qui contient nos classes)
        $repository = self::$container->get(RdvRepository::class);
        $this->loadFixtures([AppFixtures::class]);                                              //purge et inserre les data de test
        $rdvs = $repository->findAll();
        $this->assertCount(5, $rdvs);
    }

    public function testFindOneBy()
    {
        self::bootKernel();
        $repository = self::$container->get(RdvRepository::class);
        $this->loadFixtures([AppFixtures::class]);
        $rdv = $repository->findOneBy(['id' => 1]);
        $this->assertIsObject($rdv, 'testFindOneBy pb');
        $this->assertEquals(1, $rdv->getId(), 'testFindOneBy pb assertEquals');
    }


    public function testFindBy()
    {
        self::bootKernel();
        $repository = self::$container->get(RdvRepository::class);
        $this->loadFixtures([AppFixtures::class]);
        $rdvs = $repository->findBy(['nom' => 'jj']);
        $this->assertCount(5, $rdvs, 'pb testFindBy');
    }
}
