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
   * @ORM\Column(type="datetime")
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
  private $praticien;

  /**
   * @ORM\Column(type="string", length=255)
   */
  private $ville;

  /**
   * @ORM\Column(type="string", length=255)
   */
  private $rue;


  public function getId(): ?int
  {
    return $this->id;
  }

  public function getdateTime(): ?\dateTimeInterface
  {
    return $this->dateTime;
  }

  public function setdateTime(\dateTimeInterface $dateTime): self
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
    return $this->praticien;
  }

  public function setPraticien(?Praticien $praticien): self
  {
    $this->praticien = $praticien;

    return $this;
  }

  public function getVille(): ?string
  {
      return $this->ville;
  }

  public function setVille(string $ville): self
  {
      $this->ville = $ville;

      return $this;
  }

  public function getRue(): ?string
  {
      return $this->rue;
  }

  public function setRue(string $rue): self
  {
      $this->rue = $rue;

      return $this;
  }
}
