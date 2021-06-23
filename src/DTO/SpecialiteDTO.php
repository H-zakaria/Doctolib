<?php

namespace App\DTO;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use OpenApi\Annotations as OA;

/** 
 * @OA\Schema(
 *     description="La SpecialitetDTO",
 *     title="La SpecialitetDTO",
 *     required={"designation"},
 * )
 */
class SpecialiteDTO
{
    private $id;

    /**
     * @OA\Property(
     *     description="SpecialitetDTO designation",
     *     title="designation",
     * )
     */
    private $designation;
    private $praticienDTO;

    public function __construct()
    {
        $this->praticienDTO = new ArrayCollection();
    }

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
     * Get the value of designation
     */
    public function getDesignation()
    {
        return $this->designation;
    }

    /**
     * Set the value of designation
     *
     * @return  self
     */
    public function setDesignation($designation)
    {
        $this->designation = $designation;

        return $this;
    }

    /**
     * @return Collection|Praticien[]
     */
    public function getPraticiensDTO(): Collection
    {
        return $this->praticienDTO;
    }

    public function addPraticienDTO(PraticienDTO $praticienDTO): self
    {
        if (!$this->praticienDTO->contains($praticienDTO)) {
            $this->praticienDTO[] = $praticienDTO;
        }

        return $this;
    }

    public function removePraticienDTO(PraticienDTO $praticienDTO): self
    {
        $this->praticienDTO->removeElement($praticienDTO);

        return $this;
    }
}
