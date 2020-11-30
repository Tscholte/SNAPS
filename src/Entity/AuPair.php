<?php

namespace App\Entity;

use App\Repository\AuPairRepository;
use Doctrine\ORM\Mapping as ORM;
/**
 * @ORM\Entity(repositoryClass=AuPairRepository::class)
 */
class AuPair
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
    private $Name;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Status;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Nationality;

    /**
     * @ORM\Column(type="date")
     */
    private $Birthday;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $Email;

    /**
     * @ORM\Column(type="string", length=11, nullable=true)
     */
    private $Mobile;

    /**
     * @ORM\Column(type="string", length=15, nullable=true)
     */
    private $WhatsApp;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $Skype;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $Instagram;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $Facebook;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $City;

    /**
     * @ORM\OneToOne(targetEntity=User::class, mappedBy="AuPair", cascade={"persist", "remove"})
     */
    private $user;

    /**
     * @ORM\OneToOne(targetEntity=Room::class, mappedBy="AuPair", cascade={"persist", "remove"})
     */
    private $room;

    /**
     * @ORM\Column(type="text", length=255, nullable=true)
     */
    private $Opmerking;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->Name;
    }

    public function setName(string $Name): self
    {
        $this->Name = $Name;

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

    public function getNationality(): ?string
    {
        return $this->Nationality;
    }

    public function setNationality(string $Nationality): self
    {
        $this->Nationality = $Nationality;

        return $this;
    }

    public function getBirthday(): ?\DateTimeInterface
    {
        return $this->Birthday;
    }

    public function setBirthday(\DateTimeInterface $Birthday): self
    {
        $this->Birthday = $Birthday;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->Email;
    }

    public function setEmail(?string $Email): self
    {
        $this->Email = $Email;

        return $this;
    }

    public function getMobile(): ?string
    {
        return $this->Mobile;
    }

    public function setMobile(?string $Mobile): self
    {
        $this->Mobile = $Mobile;

        return $this;
    }

    public function getWhatsApp(): ?string
    {
        return $this->WhatsApp;
    }

    public function setWhatsApp(?string $WhatsApp): self
    {
        $this->WhatsApp = $WhatsApp;

        return $this;
    }

    public function getSkype(): ?string
    {
        return $this->Skype;
    }

    public function setSkype(?string $Skype): self
    {
        $this->Skype = $Skype;

        return $this;
    }

    public function getInstagram(): ?string
    {
        return $this->Instagram;
    }

    public function setInstagram(?string $Instagram): self
    {
        $this->Instagram = $Instagram;

        return $this;
    }

    public function getFacebook(): ?string
    {
        return $this->Facebook;
    }

    public function setFacebook(?string $Facebook): self
    {
        $this->Facebook = $Facebook;

        return $this;
    }

    public function getCity(): ?string
    {
        return $this->City;
    }

    public function setCity(?string $City): self
    {
        $this->City = $City;

        return $this;
    }

    public function getUser(): ?User
    {
        return $this->user;
    }

    public function setUser(?User $user): self
    {
        $this->user = $user;

        // set (or unset) the owning side of the relation if necessary
        $newAuPair = null === $user ? null : $this;
        if ($user->getAuPair() !== $newAuPair) {
            $user->setAuPair($newAuPair);
        }

        return $this;
    }

    public function getRoom(): ?Room
    {
        return $this->room;
    }

    public function setRoom(?Room $room): self
    {
        $this->room = $room;

        // set (or unset) the owning side of the relation if necessary
        $newAuPair = null === $room ? null : $this;
        if ($room->getAuPair() !== $newAuPair) {
            $room->setAuPair($newAuPair);
        }

        return $this;
    }

    public function getOpmerking(): ?string
    {
        return $this->Opmerking;
    }

    public function setOpmerking(?string $Opmerking): self
    {
        $this->Opmerking = $Opmerking;

        return $this;
    }
}


