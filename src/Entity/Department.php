<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * @ORM\Entity(repositoryClass="App\Repository\DepartmentRepository")
 */
class Department
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     * @Groups({"countries_details"})
     * @Groups({"departments", "departments_details"})
     * @Groups({"department"})
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups({"countries_details"})
     * @Groups({"departments", "departments_details"})
     * @Groups({"department"})
     * @Groups({"cities_details"})
     */
    private $name;

    /**
     * @ORM\Column(type="integer")
     * @Groups({"countries_details"})
     * @Groups({"department", "departments_details"})
     */
    private $code;

    /**
     * @ORM\ManyToOne(targetEntity=Country::class, inversedBy="departements")
     * @ORM\JoinColumn(nullable=true)
     * @Groups({"cities_details"})
     * @Groups({"departments_details"})
     */
    private $country;

    /**
     * @ORM\OneToMany(targetEntity=City::class, mappedBy="department")
     * @Groups({"countries_details"})
     * @Groups({"departments_details"})
     */
    private $cities;

    public function __construct()
    {
        $this->cities = new ArrayCollection();
    }

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

    public function getCode(): ?int
    {
        return $this->code;
    }

    public function setCode(int $code): self
    {
        $this->code = $code;

        return $this;
    }

    public function getCountry(): ?Country
    {
        return $this->country;
    }

    public function setCountry(?Country $country): self
    {
        $this->country = $country;

        return $this;
    }

    /**
     * @return Collection<int, City>
     */
    public function getCities(): Collection
    {
        return $this->cities;
    }

    public function addCity(City $city): self
    {
        if (!$this->cities->contains($city)) {
            $this->cities[] = $city;
            $city->setDepartment($this);
        }

        return $this;
    }

    public function removeCity(City $city): self
    {
        if ($this->cities->removeElement($city)) {
            // set the owning side to null (unless already changed)
            if ($city->getDepartment() === $this) {
                $city->setDepartment(null);
            }
        }

        return $this;
    }
    public function __toString()
    {
        return $this->name;
    }

    /**
     * Renvoie le nombre de villes dans un département
     * @Groups({"countries_details"})
     * @Groups({"departments","departments_details"})
     */
    public function getCountCities() 
    {
        return count($this->cities);
    }

}
