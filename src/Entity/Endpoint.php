<?php

namespace App\Entity;

use App\Repository\EndpointRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=EndpointRepository::class)
 */
class Endpoint
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="text")
     */
    private $description;

    /**
     * @ORM\Column(type="text")
     */
    private $endpoint;

    /**
     * @ORM\ManyToOne(targetEntity=EnpointCategory::class, inversedBy="endpoints")
     * @ORM\JoinColumn(nullable=false)
     */
    private $enpointCategory;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getEndpoint(): ?string
    {
        return $this->endpoint;
    }

    public function setEndpoint(string $endpoint): self
    {
        $this->endpoint = $endpoint;

        return $this;
    }

    public function getEnpointCategory(): ?EnpointCategory
    {
        return $this->enpointCategory;
    }

    public function setEnpointCategory(?EnpointCategory $enpointCategory): self
    {
        $this->enpointCategory = $enpointCategory;

        return $this;
    }
}
