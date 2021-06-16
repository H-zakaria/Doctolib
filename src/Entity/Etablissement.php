<?php

namespace App\Entity;

use App\Repository\EtablissementRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass=EtablissementRepository::class)
 */
class Etablissement
{
  /**
   * @ORM\Id
   * @ORM\GeneratedValue
   * @ORM\Column(type="integer")
   */
  private $id;

  /**
   * @ORM\Column(type="string", length=70)
   * @Assert\Length(
   *      min = 2,
   *      max = 70,
   *      minMessage = "Le nom de l'etablissement doit faire au moins {{ limit }} carractères",
   *      maxMessage = "Le nom de l'etablissement ne doit pas dépasser {{ limit }} carractères",
   *      allowEmptyString = false
   *      * )
   * @Assert\NotNull;
   */
  private $nom;

  /**
   * @ORM\ManyToMany(targetEntity=Medecin::class, inversedBy="etablissements")
   */
  private $medecins;

  /**
   * @ORM\Column(type="string", length=70)
   * @Assert\Length(
   *      min = 2,
   *      max = 70,
   *      minMessage = "Le nom de la ville doit faire au moins {{ limit }} carractères",
   *      maxMessage = "Le nom de la ville ne doit pas dépasser {{ limit }} carractères",
   *      allowEmptyString = false
   *      * )
   * @Assert\Regex(
   *     pattern="/\d/",
   *     match=false,
   *     message="Votre ville ne peut pas contenir de chiffre"
   *     * )
   * @Assert\NotNull;
   */
  private $ville;

  /**
   * @ORM\Column(type="string", length=255)
   * @Assert\Length(
   *      min = 2,
   *      max = 255,
   *      minMessage = "Le nom de la rue doit faire au moins {{ limit }} carractères",
   *      maxMessage = "Le nom de la rue ne doit pas dépasser {{ limit }} carractères",
   *      allowEmptyString = false
   *      * )
   * @Assert\NotNull;
   */
  private $rue;

  public function __construct()
  {
    $this->medecins = new ArrayCollection();
  }

  public function getId(): ?int
  {
    return $this->id;
  }

  public function getNom(): ?string
  {
    return $this->nom;
  }

  public function setNom(string $nom): self
  {
    $this->nom = $nom;

    return $this;
  }

  /**
   * @return Collection|Medecin[]
   */
  public function getMedecins(): Collection
  {
    return $this->medecins;
  }

  public function addMedecin(Medecin $medecin): self
  {
    if (!$this->medecins->contains($medecin)) {
      $this->medecins[] = $medecin;
    }

    return $this;
  }

  public function removeMedecin(Medecin $medecin): self
  {
    $this->medecins->removeElement($medecin);

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
