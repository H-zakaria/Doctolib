<?php

namespace App\DataFixtures;

use App\Entity\Etablissement;
use App\Entity\Medecin;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\Patient;
use App\Entity\Rdv;
use DateTime;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        for ($i = 0; $i < 5; $i++) {
            $patient =   new Patient();
            $patient->setNom('jj')->setPrenom($i)->setRue('zdzd')->setVille('efe')->setDateNaissance(new DateTime('now'));
            $manager->persist($patient);

            $et = new Etablissement;
            $et->setNom('ashsu');
            $et->setVille('ashsdzdzu');
            $et->setRue('ashsdzdzu');
            $manager->persist($et);
            $med =   new Medecin();
            $med->setNom('jj')->setPrenom($i)->addEtablissement($et);
            $manager->persist($med);

            $d = "20-10-190" . $i;
            $date = new DateTime($d);
            $rdv = new Rdv;
            $rdv->setPatient($patient)->setMedecin($med)->setDateTime($date);
            $manager->persist($rdv);
        }
        $manager->flush();
    }
}
