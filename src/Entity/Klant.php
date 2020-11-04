<?php

namespace App\Entity;

use App\Repository\KlantRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\UserInterface;

/**
 * @ORM\Entity(repositoryClass=KlantRepository::class)
 */
class Klant implements UserInterface
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=180, unique=true)
     */
    private $username;

    /**
     * @ORM\Column(type="json")
     */
    private $roles = [];

    /**
     * @var string The hashed password
     * @ORM\Column(type="string")
     */
    private $password;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Family;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Surname;

    /**
     * @ORM\Column(type="decimal", precision=3, scale=2, nullable=true)
     */
    private $Korting;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Status;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $Postcode;

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
     * @ORM\OneToMany(targetEntity=AuPair::class, mappedBy="klant")
     */
    private $AuPair;

    public function __construct()
    {
        $this->AuPair_Id = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * A visual identifier that represents this user.
     *
     * @see UserInterface
     */
    public function getUsername(): string
    {
        return (string) $this->username;
    }

    public function setUsername(string $username): self
    {
        $this->username = $username;

        return $this;
    }

    /**
     * @see UserInterface
     */
    public function getRoles(): array
    {
        $roles = $this->roles;
        // guarantee every user at least has ROLE_USER
        $roles[] = 'ROLE_USER';

        return array_unique($roles);
    }

    public function setRoles(array $roles): self
    {
        $this->roles = $roles;

        return $this;
    }

    /**
     * @see UserInterface
     */
    public function getPassword(): string
    {
        return (string) $this->password;
    }

    public function setPassword(string $password): self
    {
        $this->password = $password;

        return $this;
    }

    public function getFamily(): ?string
    {
        return $this->Family;
    }

    public function setFamily(string $Family): self
    {
        $this->Family = $Family;

        return $this;
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

    public function getKorting(): ?string
    {
        return $this->Korting;
    }

    public function setKorting(?string $Korting): self
    {
        $this->Korting = $Korting;

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

    public function getPostcode(): ?int
    {
        return $this->Postcode;
    }

    public function setPostcode(?int $Postcode): self
    {
        $this->Postcode = $Postcode;

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
            $auPair->setKlant($this);
        }

        return $this;
    }

    public function removeAuPair(AuPair $auPair): self
    {
        if ($this->AuPair->removeElement($auPair)) {
            // set the owning side to null (unless already changed)
            if ($auPair->getKlant() === $this) {
                $auPair->setKlant(null);
            }
        }

        return $this;
    }

    /**
     * @see UserInterface
     */
    public function getSalt()
    {
        // not needed when using the "bcrypt" algorithm in security.yaml
    }

    /**
     * @see UserInterface
     */
    public function eraseCredentials()
    {
        // If you store any temporary, sensitive data on the user, clear it here
        // $this->plainPassword = null;
    }
}
