<?php

namespace App\DTO;

use Doctrine\Common\Collections\Collection;
use Doctrine\Common\Collections\ArrayCollection;
use OpenApi\Annotations as OA;

/** 
 * @OA\Schema(
 *     description="Le PatientDTO",
 *     title="Le PatientDTO",
 *     required={"id", "nom", "prenom", "rdvsDTO", "ville", "rue", "date_naissance", "mail", "mdp", "tel"},
 * )
 */
class PatientDTO
{
    /**
     * @OA\Property(format="int64")
     * @var int
     */
    private $id;

    /**
     * @OA\Property(
     *     description="PatientDTO nom",
     *     title="nom",
     * )
     * @var string
     */
    private $nom;

    /**
     * @OA\Property(
     *     description="PatientDTO prenom",
     *     title="prenom",
     * )
     * @var string
     */
    private $prenom;

    /**
     * @OA\Property(
     *     description="PatientDTO rdvsDTO",
     *     title="rdvsDTO",
     * )
     * @var Collection
     */
    private $rdvsDTO;

    /**
     * @OA\Property(
     *     description="PatientDTO ville",
     *     title="ville",
     * )
     * @var string
     */
    private $ville;

    /**
     * @OA\Property(
     *     description="PatientDTO rue",
     *     title="rue",
     * )
     * @var string
     */
    private $rue;

    /**
     * @OA\Property(
     *     description="PatientDTO dateNaissance",
     *     title="dateNaissance",
     * )
     */
    private $date_naissance;

    /**
     * @OA\Property(
     *     description="PatientDTO mail",
     *     title="mail",
     * )
     * @var string
     */
    private $mail;

    /**
     * @OA\Property(
     *     description="PatientDTO mdp",
     *     title="mdp",
     * )
     * @var string
     */
    private $mdp;

    /**
     * @OA\Property(
     *     description="PatientDTO tel",
     *     title="tel",
     * )
     * @var int
     */
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

    public function removeRdv(RdvDTO $rdvDTO): self
    {
        if ($this->rdvs->removeElement($rdvDTO)) {
            if ($rdvDTO->getPatientDTO() === $this) {
                $rdvDTO->setPatientDTO(null);
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
