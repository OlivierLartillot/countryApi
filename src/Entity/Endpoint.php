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
     * @ORM\ManyToOne(targetEntity=EndpointCategory::class, inversedBy="endpoints")
     * @ORM\JoinColumn(nullable=false)
     */
    private $endpointCategory;

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

    public function getEndpointCategory(): ?EndpointCategory
    {
        return $this->endpointCategory;
    }

    public function setEndpointCategory(?EndpointCategory $endpointCategory): self
    {
        $this->endpointCategory = $endpointCategory;

        return $this;
    }


}
