<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
/**
 * @ORM\Entity()
 */
class Doctor
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue
     */
    public $id;
    /**
     * @ORM\Column(type="integer")
     */
    public $crm;
    /**
     * @ORM\Column(type="string")
     */
    public $name;

    /**
     * @ORM\ManyToOne(targetEntity=Speciality::class)
     * @ORM\JoinColumn(nullable=false)
     */
    private $speciality;

    public function getSpeciality(): ?Speciality
    {
        return $this->speciality;
    }

    public function setSpeciality(?Speciality $speciality): self
    {
        $this->speciality = $speciality;

        return $this;
    }

}

