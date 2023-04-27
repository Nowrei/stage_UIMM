<?php

namespace App\Entity;

use App\Repository\FormationsRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: FormationsRepository::class)]
class Formations
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $poleFormation = null;

    #[ORM\Column(length: 255)]
    private ?string $intituleFormation = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $typeCertFormation = null;

    #[ORM\Column(type: Types::DATE_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $dateDebutFormation = null;

    #[ORM\Column(type: Types::DATE_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $dateFinFormation = null;

    #[ORM\ManyToMany(targetEntity: User::class, mappedBy: 'user_form')]
    private Collection $users;

    public function __construct()
    {
        $this->users = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPoleFormation(): ?string
    {
        return $this->poleFormation;
    }

    public function setPoleFormation(string $poleFormation): self
    {
        $this->poleFormation = $poleFormation;

        return $this;
    }

    public function getIntituleFormation(): ?string
    {
        return $this->intituleFormation;
    }

    public function setIntituleFormation(string $intituleFormation): self
    {
        $this->intituleFormation = $intituleFormation;

        return $this;
    }

    public function getTypeCertFormation(): ?string
    {
        return $this->typeCertFormation;
    }

    public function setTypeCertFormation(?string $typeCertFormation): self
    {
        $this->typeCertFormation = $typeCertFormation;

        return $this;
    }

    public function getDateDebutFormation(): ?\DateTimeInterface
    {
        return $this->dateDebutFormation;
    }

    public function setDateDebutFormation(?\DateTimeInterface $dateDebutFormation): self
    {
        $this->dateDebutFormation = $dateDebutFormation;

        return $this;
    }

    public function getDateFinFormation(): ?\DateTimeInterface
    {
        return $this->dateFinFormation;
    }

    public function setDateFinFormation(?\DateTimeInterface $dateFinFormation): self
    {
        $this->dateFinFormation = $dateFinFormation;

        return $this;
    }

    /**
     * @return Collection<int, User>
     */
    public function getUsers(): Collection
    {
        return $this->users;
    }

    public function addUser(User $user): self
    {
        if (!$this->users->contains($user)) {
            $this->users->add($user);
            $user->addUserForm($this);
        }

        return $this;
    }

    public function removeUser(User $user): self
    {
        if ($this->users->removeElement($user)) {
            $user->removeUserForm($this);
        }

        return $this;
    }
}
