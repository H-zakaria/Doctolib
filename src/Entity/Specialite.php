<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass=SpecialiteRepository::class)
 */
class Specialite
{
  /**
   * @ORM\Id
   * @ORM\GeneratedValue
   * @ORM\Column(type="integer")
   */
  private $id;


  /**
   * @ORM\Column(type="string", length=255)
   * @Assert\Length(
   *      min = 2,
   *      max = 255,
   *      minMessage = "Le nom de la specialité doit faire au moins {{ limit }} carractères",
   *      maxMessage = "Le nom de la specialité ne doit pas dépasser {{ limit }} carractères",
   *      allowEmptyString = false
   *      * )
   * @Assert\NotNull;
   */
  private $designation;

  /**
   * @ORM\ManyToMany(targetEntity=Praticien::class, inversedBy="specialites")
   */
  private $Praticiens;

  public function __construct()
  {
    $this->Praticiens = new ArrayCollection();
  }

  public function getId(): ?int
  {
    return $this->id;
  }

  public function getDesignation(): ?string
  {
    return $this->designation;
  }

  public function setDesignation(string $designation): self
  {
    $this->designation = $designation;

    return $this;
  }

  /**
   * @return Collection|Praticien[]
   */
  public function getPraticiens(): Collection
  {
    return $this->Praticiens;
  }

  public function addPraticien(Praticien $Praticien): self
  {
    if (!$this->Praticiens->contains($Praticien)) {
      $this->Praticiens[] = $Praticien;
    }

    return $this;
  }

  public function removePraticien(Praticien $Praticien): self
  {
    $this->Praticiens->removeElement($Praticien);

    return $this;
  }
}
