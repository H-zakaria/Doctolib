<?php

namespace APP\Service;

use App\Entity\Praticien;
use App\Entity\Patient;
use App\Entity\Rdv;
use App\Repository\RdvRepository;
use DateTime;
use Doctrine\ORM\EntityManagerInterface;

class RdvService
{
    private $em;
    private $rep;

    public function __construct(EntityManagerInterface $em, RdvRepository $rep)
    {
        $this->em = $em;
        $this->rep = $rep;
    }

    public function prendreRdv(Praticien $praticien, DateTime $dateTime, Patient $patient)
    {

        //trouver la date et l'heure des rdvs les plus proches du praticien;
        $rdvsDuPrat =  ($praticien->getRdvs())->toArray();
        $rdvPrev = $rdvsDuPrat[0];
        $rdvSuivant = $rdvsDuPrat[0];
        // array_filter($rdvsDuPrat, function());



        $rdv = new Rdv;
        $rdv->setPraticien($praticien)->setDateTime($dateTime);
        $patient->addRdv($rdv);
        $this->em->persist($patient);
        $this->em->flush();
    }

    public function annulerRdv(Rdv $rdv)
    {
        $patient =  $rdv->getPatient();
        $patient->removeRdv($rdv);
        $this->em->persist($patient);
        $this->em->flush;
    }
}
