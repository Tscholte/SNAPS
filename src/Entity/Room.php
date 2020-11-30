<?php

namespace App\Entity;

use App\Repository\RoomRepository;
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
     * @ORM\ManyToOne(targetEntity=Klant::class, inversedBy="rooms")
     * @ORM\JoinColumn(nullable=false)
     */
    private $Klant;

    /**
     * @ORM\OneToOne(targetEntity=AuPair::class, inversedBy="room", cascade={"persist", "remove"})
     */
    private $AuPair;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Status;

    /**
     * @ORM\Column(type="decimal", precision=3, scale=2, nullable=true)
     */
    private $Korting;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getKlant(): ?Klant
    {
        return $this->Klant;
    }

    public function setKlant(?Klant $Klant): self
    {
        $this->Klant = $Klant;

        return $this;
    }

    public function getAuPair(): ?AuPair
    {
        return $this->AuPair;
    }

    public function setAuPair(?AuPair $AuPair): self
    {
        $this->AuPair = $AuPair;

        return $this;
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
}
