<?php

namespace App\Entity;

use App\Repository\RoomRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=RoomRepository::class)
 */
class Room
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
    private $Status;

    /**
     * @ORM\Column(type="decimal", precision=3, scale=2, nullable=true)
     */
    private $Korting;

    /**
     * @ORM\OneToOne(targetEntity=Klant::class, inversedBy="room", cascade={"persist", "remove"})
     * @ORM\JoinColumn(nullable=false)
     */
    private $Klant;

    /**
     * @ORM\OneToMany(targetEntity=AuPair::class, mappedBy="rooms")
     */
    private $AuPair;

    public function __construct()
    {
        $this->AuPair = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getStatus(): ?string
    {
        return $this->Status;
    }

    public function setStatus(string $Status): self
    {
        $this->Status = $Status;

        return $this;
    }

    public function getKorting(): ?string
    {
        return $this->Korting;
    }

    public function setKorting(?string $Korting): self
    {
        $this->Korting = $Korting;

        return $this;
    }

    public function getKlant(): ?Klant
    {
        return $this->Klant;
    }

    public function setKlant(Klant $Klant): self
    {
        $this->Klant = $Klant;

        return $this;
    }

    /**
     * @return Collection|AuPair[]
     */
    public function getAuPair(): Collection
    {
        return $this->AuPair;
    }

    public function addAuPair(AuPair $auPair): self
    {
        if (!$this->AuPair->contains($auPair)) {
            $this->AuPair[] = $auPair;
            $auPair->setRooms($this);
        }

        return $this;
    }

    public function removeAuPair(AuPair $auPair): self
    {
        if ($this->AuPair->removeElement($auPair)) {
            // set the owning side to null (unless already changed)
            if ($auPair->getRooms() === $this) {
                $auPair->setRooms(null);
            }
        }

        return $this;
    }
}
