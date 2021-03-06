<?php

namespace App\DTO;

use OpenApi\Annotations as OA;

/** 
 * @OA\Schema(
 *     description="Le PraticientDTO",
 *     title="Le PraticientDTO",
 *     required={"id", "nom", "prenom", "etablissements", "specialites", "mail", "mdp", "tel"},
 * )
 */
class PraticienDTO
{
    /**
     * @OA\Property(format="int64")
     * @var int
     */
    private $id;

    /**
     * @OA\Property(
     *     description="PraticienDTO nom",
     *     title="nom",
     * )
     * @var string
     */
    private $nom;

    /**
     * @OA\Property(
     *     description="PraticienDTO prenom",
     *     title="prenom",
     * )
     * @var string
     */
    private $prenom;

    /**
     * @OA\Property(
     *     description="PraticienDTO etablissements",
     *     title="etablissements",
     * )
     */
    private $etablissements = array();

    /**
     * @OA\Property(
     *     description="PraticienDTO spcecialites",
     *     title="spcecialites",
     * )
     */
    private $specialites = array();

    /**
     * @OA\Property(
     *     description="PraticienDTO mail",
     *     title="mail",
     * )
     * @var string
     */
    private $mail;

    /**
     * @OA\Property(
     *     description="PraticienDTO mdp",
     *     title="mdp",
     * )
     * @var string
     */
    private $mdp;

    /**
     * @OA\Property(
     *     description="PraticienDTO tel",
     *     title="tel",
     * )
     * @var int
     */
    private $tel;

    /**
     * Get the value of id
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set the value of id
     *
     * @return  self
     */
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Get the value of nom
     */
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * Set the value of nom
     *
     * @return  self
     */
    public function setNom($nom)
    {
        $this->nom = $nom;

        return $this;
    }

    /**
     * Get the value of prenom
     */
    public function getPrenom()
    {
        return $this->prenom;
    }

    /**
     * Set the value of prenom
     *
     * @return  self
     */
    public function setPrenom($prenom)
    {
        $this->prenom = $prenom;

        return $this;
    }

    /**
     * Get the value of etablissements
     */
    public function getEtablissements()
    {
        return $this->etablissements;
    }

    /**
     * Set the value of etablissements
     *
     * @return  self
     */
    public function setEtablissements($etablissements)
    {
        $this->etablissements = $etablissements;

        return $this;
    }

    /**
     * Get the value of mail
     */
    public function getMail()
    {
        return $this->mail;
    }

    /**
     * Set the value of mail
     *
     * @return  self
     */
    public function setMail($mail)
    {
        $this->mail = $mail;

        return $this;
    }

    /**
     * Get the value of mdp
     */
    public function getMdp()
    {
        return $this->mdp;
    }

    /**
     * Set the value of mdp
     *
     * @return  self
     */
    public function setMdp($mdp)
    {
        $this->mdp = $mdp;

        return $this;
    }

    /**
     * Get the value of tel
     */
    public function getTel()
    {
        return $this->tel;
    }

    /**
     * Set the value of tel
     *
     * @return  self
     */
    public function setTel($tel)
    {
        $this->tel = $tel;

        return $this;
    }

    /**
     * Get the value of specialites
     */
    public function getSpecialites()
    {
        return $this->specialites;
    }

    /**
     * Set the value of specialites
     *
     * @return  self
     */
    public function setSpecialites($specialite)
    {
        $this->specialites = $specialite;

        return $this;
    }
}
