<?php

namespace App\DTO;

use Doctrine\Common\Collections\Collection;
use Doctrine\Common\Collections\ArrayCollection;
use OpenApi\Annotations as OA;

/** 
 * @OA\Schema(
 *     description="Le PatientDTO",
 *     title="Le PatientDTO",
 *     required={"nom"},
 * )
 */

class PatientDTO
{
    private $id;

    /**
     * @OA\Property(
     *     description="PatientDTO nom",
     *     title="nom",
     * )
     */
    private $nom;
    private $prenom;
    private $rdvsDTO;
    private $ville;
    private $rue;
    private $date_naissance;
    private $mail;
    private $mdp;
    private $tel;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function setId(int $id): self
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
        $this->rdvsDTO = new ArrayCollection();
    }
    /**
     * @return Collection|Rdv[]
     */
    public function getRdvsDTO(): Collection
    {
        return $this->rdvsDTO;
    }

    public function addRdvDTO(RdvDTO $rdvDTO): self
    {
        if (!$this->rdvsDTO->contains($rdvDTO)) {
            $this->rdvsDTO[] = $rdvDTO;
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
