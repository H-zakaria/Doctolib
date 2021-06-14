<?php

namespace App\Entity;

use App\Repository\RdvRepository;
use Doctrine\ORM\Mapping as ORM;

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
   * @ORM\ManyToOne(targetEntity=Medecin::class, inversedBy="rdvs")
   * @ORM\JoinColumn(nullable=false)
   */
  private $medecin;

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

  public function getMedecin(): ?Medecin
  {
      return $this->medecin;
  }

  public function setMedecin(?Medecin $medecin): self
  {
      $this->medecin = $medecin;

      return $this;
  }
}
