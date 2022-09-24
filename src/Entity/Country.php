<?php

namespace App\Entity;

use App\Repository\CountryRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=CountryRepository::class)
 */
class Country
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
    private $name;

    /**
     * @ORM\OneToMany(targetEntity=Department::class, mappedBy="country")
     */
    private $departements;

    public function __construct()
    {
        $this->departements = new ArrayCollection();
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

    /**
     * @return Collection<int, Department>
     */
    public function getDepartements(): Collection
    {
        return $this->departements;
    }

    public function addDepartement(Department $departement): self
    {
        if (!$this->departements->contains($departement)) {
            $this->departements[] = $departement;
            $departement->setCountry($this);
        }

        return $this;
    }

    public function removeDepartement(Department $departement): self
    {
        if ($this->departements->removeElement($departement)) {
            // set the owning side to null (unless already changed)
            if ($departement->getCountry() === $this) {
                $departement->setCountry(null);
            }
        }

        return $this;
    }

    public function __toString()
    {
        return $this->name;
    }
}
