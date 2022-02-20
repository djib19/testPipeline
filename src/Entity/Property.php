<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\PropertyRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ApiResource()
 * @ORM\Entity(repositoryClass=PropertyRepository::class)
 */
class Property
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
    private $title;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $type;

    /**
     * @ORM\Column(type="float", length=255)
     */
    private $area;

    /**
     * @ORM\Column(type="integer")
     */
    private $numberOfRooms;

    /**
     * @ORM\Column(type="integer")
     */
    private $numberOfBedrooms;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $ecoNote;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $gesNote;

    /**
     * @ORM\OneToOne(targetEntity=Address::class, cascade={"persist", "remove"})
     */
    private $address;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $description;

    /**
     * @ORM\Column(type="array", nullable=true)
     */
    private $criteria = [];

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $status;

    /**
     * @ORM\ManyToOne(targetEntity=Owner::class, inversedBy="properties")
     */
    private $owner;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $title): self
    {
        $this->title = $title;

        return $this;
    }

    public function getType(): ?string
    {
        return $this->type;
    }

    public function setType(string $type): self
    {
        $this->type = $type;

        return $this;
    }

    public function getNumberOfRooms(): ?int
    {
        return $this->numberOfRooms;
    }

    public function setNumberOfRooms(int $numberOfRooms): self
    {
        $this->numberOfRooms = $numberOfRooms;

        return $this;
    }

    public function getNumberOfBedrooms(): ?int
    {
        return $this->numberOfBedrooms;
    }

    public function setNumberOfBedrooms(int $numberOfBedrooms): self
    {
        $this->numberOfBedrooms = $numberOfBedrooms;

        return $this;
    }

    public function getEcoNote(): ?string
    {
        return $this->ecoNote;
    }

    public function setEcoNote(string $ecoNote): self
    {
        $this->ecoNote = $ecoNote;

        return $this;
    }

    public function getGesNote(): ?string
    {
        return $this->gesNote;
    }

    public function setGesNote(?string $gesNote): self
    {
        $this->gesNote = $gesNote;

        return $this;
    }

    public function getAddress(): ?Address
    {
        return $this->address;
    }

    public function setAddress(?Address $address): self
    {
        $this->address = $address;

        return $this;
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

    public function getCriteria(): ?array
    {
        return $this->criteria;
    }

    public function setCriteria(array $criteria): self
    {
        $this->criteria = $criteria;

        return $this;
    }

    public function getStatus(): ?string
    {
        return $this->status;
    }

    public function setStatus(string $status): self
    {
        $this->status = $status;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getArea()
    {
        return $this->area;
    }

    /**
     * @param mixed $area
     */
    public function setArea($area): void
    {
        $this->area = $area;
    }

    public function getOwner(): ?Owner
    {
        return $this->owner;
    }

    public function setOwner(?Owner $owner): self
    {
        $this->owner = $owner;

        return $this;
    }

}
