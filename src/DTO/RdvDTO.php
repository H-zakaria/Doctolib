<?php

namespace App\DTO;

class RdvDTO
{

  private $id;
  private $dateTime;
  private $praticienDTO;
  private $patientDTO;



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
   * Get the value of dateTime
   */
  public function getDateTime()
  {
    return $this->dateTime;
  }

  /**
   * Set the value of dateTime
   *
   * @return  self
   */
  public function setDateTime($dateTime)
  {
    $this->dateTime = $dateTime;

    return $this;
  }

  /**
   * Get the value of praticienDTO
   */
  public function getPraticienDTO()
  {
    return $this->praticienDTO;
  }

  /**
   * Set the value of praticienDTO
   *
   * @return  self
   */
  public function setPraticienDTO($praticienDTO)
  {
    $this->praticienDTO = $praticienDTO;

    return $this;
  }

  /**
   * Get the value of patientDTO
   */
  public function getPatientDTO()
  {
    return $this->patientDTO;
  }

  /**
   * Set the value of patientDTO
   *
   * @return  self
   */
  public function setPatientDTO($patientDTO)
  {
    $this->patientDTO = $patientDTO;

    return $this;
  }
}
