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
   * @ORM\Column(type="date")
   */
  private $dateHeure;

  /**
   * @ORM\ManyToOne(targetEntity=Patient::class, inversedBy="rdvs")
   * @ORM\JoinColumn(nullable=false)
   */
  private $patient;

  /**
   * @ORM\ManyToOne(targetEntity=Praticien::class, inversedBy="rdvs")
   * @ORM\JoinColumn(nullable=false)
   */
  private $praticien;

  public function getId(): ?int
  {
    return $this->id;
  }

  public function getdateHeure(): ?\dateTimeInterface
  {
    return $this->dateHeure;
  }

  public function setdateHeure(\dateTimeInterface $dateHeure): self
  {
    $this->dateHeure = $dateHeure;

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
    return $this->praticien;
  }

  public function setPraticien(?Praticien $praticien): self
  {
    $this->praticien = $praticien;

    return $this;
  }
}
