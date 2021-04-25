<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
/**
 * @ORM\Entity()
 */
class Doctor implements \JsonSerializable
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue
     */
    private $id;
    /**
     * @ORM\Column(type="integer")
     */
    private $crm;
    /**
     * @ORM\Column(type="string")
     */
    private $name;
    /**
     * @ORM\ManyToOne(targetEntity=Speciality::class)
     * @ORM\JoinColumn(nullable=false)
     */
    private $speciality;

    public function getId(): ?int
    {
        return $this->id;
    }


    public function getCrm(): ?int
    {
        return $this->crm;
    }

    public function setCrm(int $crm): self
    {
        $this->crm= $crm;
        return $this;
    }

    public function getName(): ?string
    {
        return $this->name;
    }
   
    public function setName(string $name): self
    {
        $this->name = $name;
        return $this;
    }

    public function getSpeciality(): ?Speciality
    {
        return $this->speciality;
    }

    public function setSpeciality(?Speciality $speciality): self
    {
        $this->speciality = $speciality;

        return $this;
    }

    public function jsonSerialize()
    {
        return [
            'id' => $this->getId(),
            'name' => $this->getName(),
            'crm' => $this->getCrm(),
            'specialityId' => $this->getSpeciality()->getId()
        ];
    }
}

