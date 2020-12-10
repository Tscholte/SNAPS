<?php

namespace App\Entity;

use App\Repository\KlantRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=KlantRepository::class)
 */
class Klant
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
    private $Surname;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Firstname;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $City;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $Postcode;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $adress;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $Email;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $Email2;

    /**
     * @ORM\Column(type="string", length=11, nullable=true)
     */
    private $Mobile;

    /**
     * @ORM\Column(type="string", length=11, nullable=true)
     */
    private $Mobile2;

    /**
     * @ORM\Column(type="text", length=255, nullable=true)
     */
    private $Opmerking;

    /**
     * @ORM\OneToOne(targetEntity=User::class, mappedBy="Klant", cascade={"persist", "remove"})
     */
    private $user;

    /**
     * @ORM\OneToOne(targetEntity=Room::class, mappedBy="Klant", cascade={"persist", "remove"})
     */
    private $room;

    public function __construct()
    {
        $this->rooms = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getSurname(): ?string
    {
        return $this->Surname;
    }

    public function setSurname(string $Surname): self
    {
        $this->Surname = $Surname;

        return $this;
    }

    public function getFirstname(): ?string
    {
        return $this->Firstname;
    }

    public function setFirstname(string $Firstname): self
    {
        $this->Firstname = $Firstname;

        return $this;
    }

    public function getCity(): ?string
    {
        return $this->City;
    }

    public function setCity(string $City): self
    {
        $this->City = $City;

        return $this;
    }

    public function getPostcode(): ?int
    {
        return $this->Postcode;
    }

    public function setPostcode(?int $Postcode): self
    {
        $this->Postcode = $Postcode;

        return $this;
    }

    public function getAdress(): ?string
    {
        return $this->adress;
    }

    public function setAdress(string $adress): self
    {
        $this->adress = $adress;

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

    public function getEmail2(): ?string
    {
        return $this->Email2;
    }

    public function setEmail2(?string $Email2): self
    {
        $this->Email2 = $Email2;

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

    public function getMobile2(): ?string
    {
        return $this->Mobile2;
    }

    public function setMobile2(?string $Mobile2): self
    {
        $this->Mobile2 = $Mobile2;

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

    public function getUser(): ?User
    {
        return $this->user;
    }

    public function setUser(?User $user): self
    {
        $this->user = $user;

        // set (or unset) the owning side of the relation if necessary
        $newKlant = null === $user ? null : $this;
        if ($user->getKlant() !== $newKlant) {
            $user->setKlant($newKlant);
        }

        return $this;
    }

    public function getRoom(): ?Room
    {
        return $this->room;
    }

    public function setRoom(Room $room): self
    {
        // set the owning side of the relation if necessary
        if ($room->getKlant() !== $this) {
            $room->setKlant($this);
        }

        $this->room = $room;

        return $this;
    }
}
