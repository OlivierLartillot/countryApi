<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * @ORM\Entity(repositoryClass="App\Repository\CityRepository")
 */
class City
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     * @Groups({"cities", "cities_details"})
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups({"cities", "cities_details"})
     */
    private $name;

    /**
     * @ORM\Column(type="integer", nullable=true)
     * @Groups({"cities_details"})
     */
    private $populationNumber;

    /**
     * @ORM\ManyToOne(targetEntity=Department::class, inversedBy="cities")
     * @Groups({"cities_details"})
     */
    private $department;

    public function getId(): ?int
    {
        return $this->id;
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

    public function getPopulationNumber(): ?int
    {
        return $this->populationNumber;
    }

    public function setPopulationNumber(?int $populationNumber): self
    {
        $this->populationNumber = $populationNumber;

        return $this;
    }

    public function getDepartment(): ?Department
    {
        return $this->department;
    }

    public function setDepartment(?Department $department): self
    {
        $this->department = $department;

        return $this;
    }
}
