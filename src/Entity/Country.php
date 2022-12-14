<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * @ORM\Entity(repositoryClass="App\Repository\CountryRepository")
 */
class Country
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     * @Groups({"country"})
     * @Groups({"countries", "countries_details"})
     * @Groups({"departments_details"})
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups({"countries", "countries_details"})
     * @Groups({"country"})
     * @Groups({"departments_details"})
     * @Groups({"cities_details"})
     * 
     */
    private $name;

    /**
     * @ORM\OneToMany(targetEntity=Department::class, mappedBy="country")
     * @Groups({"countries_details"})  
     * @Groups({"show_ajax_departements"})
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

    /**
    * Renvoie le nombre de d??partements associ??s ?? un pays:
    * La fonction est un simple count sur la propri??t?? d??partement de la classe 
    * @Groups({"countries"})
    */
    public function getCountDepartments() 
    {
        return count($this->departements);
    }

    /**
    * Renvoie le nombre de ville d'un pays:  
    * pour chaque d??partement d'un pays, compte le nombre de villes associ??es
    * et additione le tout.
    * On additione donc la fonction countCities se trouvant dans l'entit?? Department
    * @Groups({"countries"})
    */
    public function getCountCities() 
    {
        $countCities = 0;
        foreach ($this->departements as $department) {
            $countCities += $department->getCountCities();
        }

        return $countCities;
    }


}
