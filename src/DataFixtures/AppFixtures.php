<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\Patient;
use DateTime;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        // $product = new Product();
        // $manager->persist($product);
        for ($i = 0; $i < 5; $i++) {
            $manager->persist((new Patient())->setNom('jj')->setPrenom($i)->setRue('zdzd')->setVille('efe')->setDateNaissance((new DateTime('now'))));
        }
        $manager->flush();
    }
}
