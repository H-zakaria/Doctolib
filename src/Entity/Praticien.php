<?php

namespace App\Entity;

use App\Repository\PraticienRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass=PraticienRepository::class)
 */
class Praticien
{
  /**
   * @ORM\Id
   * @ORM\GeneratedValue
   * @ORM\Column(type="integer")
   */
  private $id;

  /**
   * @ORM\Column(type="string", length=50)
   * @Assert\Length(
   *      min = 2,
   *      max = 50,
   *      minMessage = "Votre nom doit faire au moins {{ limit }} carractères",
   *      maxMessage = "Votre nom ne doit pas dépasser {{ limit }} carractères",
   *      allowEmptyString = false
   *      * )
   * @Assert\Regex(
   *     pattern="/\d/",
   *     match=false,
   *     message="Votre nom ne peut pas contenir de chiffre"
   *     * )
   */
  private $nom;

  /**
   * @ORM\Column(type="string", length=50)
   * @Assert\Length(
   *      min = 2,
   *      max = 50,
   *      minMessage = "Votre prenom doit faire au moins {{ limit }} carractères",
   *      maxMessage = "Votre prenom ne doit pas dépasser {{ limit }} carractères",
   *      allowEmptyString = false
   *      * )
   * @Assert\Regex(
   *     pattern="/\d/",
   *     match=false,
   *     message="Votre prenom ne peut pas contenir de chiffre"
   *     * )
   */
  private $prenom;

  // /**
  //  * @ORM\ManyToMany(targetEntity=Specialite::class, mappedBy="Praticiens")
  //  * @Assert\NotNull;
  //  */
  // private $specialites;

  // /**
  //  * @ORM\OneToMany(targetEntity=Rdv::class, mappedBy="Praticien", orphanRemoval=true)
  //  * @Assert\NotNull;
  //  */
  // private $rdvs;

  // /**
  //  * @ORM\ManyToMany(targetEntity=Etablissement::class, mappedBy="Praticiens")
  //  */
  // private $etablissements;

  /**
   * @ORM\Column(type="string", length=255)
   */
  private $mail;

  /**
   * @ORM\Column(type="string", length=255)
   */
  private $mdp;

  /**
   * @ORM\Column(type="integer")
   */
  private $tel;

  public function __construct()
  {
    $this->specialites = new ArrayCollection();
    $this->rdvs = new ArrayCollection();
    $this->etablissements = new ArrayCollection();
  }

  public function getId(): ?int
  {
    return $this->id;
  }

  public function setId(string $id): self
  {
    $this->id = $id;

    return $this;
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

  public function getPrenom(): ?string
  {
    return $this->prenom;
  }

  public function setPrenom(string $prenom): self
  {
    $this->prenom = $prenom;

    return $this;
  }

  // /**
  //  * @return Collection|Specialite[]
  //  */
  // public function getSpecialites(): Collection
  // {
  //   return $this->specialites;
  // }

  // public function addSpecialite(Specialite $specialite): self
  // {
  //   if (!$this->specialites->contains($specialite)) {
  //     $this->specialites[] = $specialite;
  //     $specialite->addPraticien($this);
  //   }

  //   return $this;
  // }

  // public function removeSpecialite(Specialite $specialite): self
  // {
  //   if ($this->specialites->removeElement($specialite)) {
  //     $specialite->removePraticien($this);
  //   }

  //   return $this;
  // }

  // /**
  //  * @return Collection|Rdv[]
  //  */
  // public function getRdvs(): Collection
  // {
  //   return $this->rdvs;
  // }

  // public function addRdv(Rdv $rdv): self
  // {
  //   if (!$this->rdvs->contains($rdv)) {
  //     $this->rdvs[] = $rdv;
  //     $rdv->setPraticien($this);
  //   }

  //   return $this;
  // }

  // public function removeRdv(Rdv $rdv): self
  // {
  //   if ($this->rdvs->removeElement($rdv)) {
  //     // set the owning side to null (unless already changed)
  //     if ($rdv->getPraticien() === $this) {
  //       $rdv->setPraticien(null);
  //     }
  //   }

  //   return $this;
  // }

  // /**
  //  * @return Collection|Etablissement[]
  //  */
  // public function getEtablissements(): Collection
  // {
  //   return $this->etablissements;
  // }

  // public function addEtablissement(Etablissement $etablissement): self
  // {
  //   if (!$this->etablissements->contains($etablissement)) {
  //     $this->etablissements[] = $etablissement;
  //     $etablissement->addPraticien($this);
  //   }

  //   return $this;
  // }

  // public function removeEtablissement(Etablissement $etablissement): self
  // {
  //   if ($this->etablissements->removeElement($etablissement)) {
  //     $etablissement->removePraticien($this);
  //   }

  //   return $this;
  // }

  public function getMail(): ?string
  {
    return $this->mail;
  }

  public function setMail(string $mail): self
  {
    $this->mail = $mail;

    return $this;
  }

  public function getMdp(): ?string
  {
    return $this->mdp;
  }

  public function setMdp(string $mdp): self
  {
    $this->mdp = $mdp;

    return $this;
  }

  public function getTel(): ?int
  {
    return $this->tel;
  }

  public function setTel(int $tel): self
  {
    $this->tel = $tel;

    return $this;
  }
}
