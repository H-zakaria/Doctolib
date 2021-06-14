<?php

namespace App\Entity;

use App\Repository\MedecinRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=MedecinRepository::class)
 */
class Medecin
{
  /**
   * @ORM\Id
   * @ORM\GeneratedValue
   * @ORM\Column(type="integer")
   */
  private $id;

  /**
   * @ORM\Column(type="string", length=255)
   */
  private $nom;

  /**
   * @ORM\Column(type="string", length=255)
   */
  private $prenom;

  /**
   * @ORM\ManyToMany(targetEntity=Specialite::class, mappedBy="medecins")
   */
  private $specialites;

  /**
   * @ORM\OneToMany(targetEntity=Rdv::class, mappedBy="medecin", orphanRemoval=true)
   */
  private $rdvs;

  /**
   * @ORM\ManyToMany(targetEntity=Etablissement::class, mappedBy="medecins")
   */
  private $etablissements;

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

  /**
   * @return Collection|Specialite[]
   */
  public function getSpecialites(): Collection
  {
    return $this->specialites;
  }

  public function addSpecialite(Specialite $specialite): self
  {
    if (!$this->specialites->contains($specialite)) {
      $this->specialites[] = $specialite;
      $specialite->addMedecin($this);
    }

    return $this;
  }

  public function removeSpecialite(Specialite $specialite): self
  {
    if ($this->specialites->removeElement($specialite)) {
      $specialite->removeMedecin($this);
    }

    return $this;
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
      $rdv->setMedecin($this);
    }

    return $this;
  }

  public function removeRdv(Rdv $rdv): self
  {
    if ($this->rdvs->removeElement($rdv)) {
      // set the owning side to null (unless already changed)
      if ($rdv->getMedecin() === $this) {
        $rdv->setMedecin(null);
      }
    }

    return $this;
  }

  /**
   * @return Collection|Etablissement[]
   */
  public function getEtablissements(): Collection
  {
    return $this->etablissements;
  }

  public function addEtablissement(Etablissement $etablissement): self
  {
    if (!$this->etablissements->contains($etablissement)) {
      $this->etablissements[] = $etablissement;
      $etablissement->addMedecin($this);
    }

    return $this;
  }

  public function removeEtablissement(Etablissement $etablissement): self
  {
    if ($this->etablissements->removeElement($etablissement)) {
      $etablissement->removeMedecin($this);
    }

    return $this;
  }
}
