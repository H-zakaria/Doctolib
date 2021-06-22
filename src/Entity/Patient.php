<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;


/**
 * @ORM\Entity(repositoryClass=PatientRepository::class)
 */
class Patient
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
   * )
   * @Assert\NotNull;
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
   * )
   * @Assert\NotNull;
   */
  private $prenom;

  /**
   * @ORM\OneToMany(targetEntity=Rdv::class, mappedBy="patient", orphanRemoval=true)
   */
  private $rdvs;

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

  /**
   * @ORM\Column(type="date")
   * @Assert\NotNull;
   */
  private $date_naissance;

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
  public function __construct()
  {
    $this->rdvs = new ArrayCollection();
  }
  /**
   * @return Collection|Rdv[]
   */
  public function getRdvs(): Collection
  {
    return $this->rdvs;
  }

  public function addRdv(Rdv $rdv): self
  {
    if (!$this->rdvs->contains($rdv)) {
      $this->rdvs[] = $rdv;
      $rdv->setPatient($this);
    }

    return $this;
  }

  public function removeRdv(Rdv $rdv): self
  {
    if ($this->rdvs->removeElement($rdv)) {
      if ($rdv->getPatient() === $this) {
        $rdv->setPatient(null);
      }
    }

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

  public function getDateNaissance(): ?\DateTimeInterface
  {
    return $this->date_naissance;
  }

  public function setDateNaissance(\DateTimeInterface $date_naissance): self
  {
    $this->date_naissance = $date_naissance;

    return $this;
  }

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
