<?php

namespace App\Entity;

use App\Repository\RdvRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass=RdvRepository::class)
 */
class Rdv
{
  /**
   * @ORM\Id
   * @ORM\GeneratedValue
   * @ORM\Column(type="integer")
   */
  private $id;

  /**
   * @ORM\Column(type="datetime", unique=true)
   */
  private $dateTime;

  /**
   * @ORM\ManyToOne(targetEntity=Patient::class, inversedBy="rdvs")
   * @ORM\JoinColumn(nullable=false)
   */
  private $patient;

  /**
   * @ORM\ManyToOne(targetEntity=Praticien::class, inversedBy="rdvs")
   * @ORM\JoinColumn(nullable=false)
   */
  private $Praticien;

  public function getId(): ?int
  {
    return $this->id;
  }

  public function getDateTime(): ?\DateTimeInterface
  {
    return $this->dateTime;
  }

  public function setDateTime(\DateTimeInterface $dateTime): self
  {
    $this->dateTime = $dateTime;

    return $this;
  }

  public function getPatient(): ?Patient
  {
    return $this->patient;
  }

  public function setPatient(?Patient $patient): self
  {
    $this->patient = $patient;

    return $this;
  }

  public function getPraticien(): ?Praticien
  {
    return $this->Praticien;
  }

  public function setPraticien(?Praticien $Praticien): self
  {
    $this->Praticien = $Praticien;

    return $this;
  }
}
