<?php

namespace App\DataFixtures;

use App\Entity\Etablissement;
use App\Entity\Praticien;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\Patient;
use App\Entity\Rdv;
use App\Entity\Specialite;
use DateTime;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        // creation 5 patients, specialité, Praticiens, etablissements, rdv
        for ($i = 0; $i < 5; $i++) {
            $patient =   new Patient();
            $patient->setNom('jj')->setPrenom($i)->setRue('zdzd')->setVille('efe')->setDateNaissance(new DateTime('now'))->setMdp('mdp')->setMail('asiasij')->setTel('0612345678');
            $manager->persist($patient);

            $spe = new Specialite;
            $spe->setDesignation('cardio');
            $et = new Etablissement;
            $et->setNom('cabinet');
            $et->setVille('ashsdzdzu');
            $et->setRue('ashsdzdzu');
            $manager->persist($et);
            $med =   new Praticien();
            $med->setNom('jj')->setPrenom($i)->addEtablissement($et)->addSpecialite($spe)->setMdp('mdp')->setMail('asiasij')->setTel('0612345678');
            $spe->addPraticien($med);
            $manager->persist($spe);
            $manager->persist($med);

            $d = "20-10-190" . $i;
            $date = new DateTime($d);
            $rdv = new Rdv;
            $rdv->setPatient($patient)->setPraticien($med)->setDateTime($date);
            $manager->persist($rdv);
        }
        $manager->flush();
    }
}
