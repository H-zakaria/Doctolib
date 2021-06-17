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
        $etablissement = $repository->find(1);
        $this->assertIsObject($etablissement, 'testFind pb');
        $this->assertEquals(1, $etablissement->getId(), 'testFind pb assertEquals');
    }

    public function testFindAll()
    {
        self::bootKernel();                                                                     // va permettre d'acceder au container (qui contient nos classes)
        $repository = self::$container->get(EtablissementRepository::class);
        $this->loadFixtures([AppFixtures::class]);                                              //purge et inserre les data de test
        $etablissements = $repository->findAll();
        $this->assertCount(5, $etablissements);
    }

    public function testFindOneBy()
    {
        self::bootKernel();
        $repository = self::$container->get(EtablissementRepository::class);
        $this->loadFixtures([AppFixtures::class]);
        $etablissement = $repository->findOneBy(['id' => 1]);
        $this->assertIsObject($etablissement, 'testFindOneBy pb');
        $this->assertEquals(1, $etablissement->getId(), 'testFindOneBy pb assertEquals');
    }


    public function testFindBy()
    {
        self::bootKernel();
        $repository = self::$container->get(EtablissementRepository::class);
        $this->loadFixtures([AppFixtures::class]);
        $etablissements = $repository->findBy(['nom' => 'cabinet']);
        $this->assertCount(5, $etablissements, 'pb testFindBy');
    }
}
