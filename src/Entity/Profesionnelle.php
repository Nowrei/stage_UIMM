<?php

namespace App\Entity;

use App\Repository\ProfesionnelleRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ProfesionnelleRepository::class)]
class Profesionnelle
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $dernierDiplome = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $niveauQualification = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $dateObtention = null;

    #[ORM\Column]
    private ?bool $dejaExperience = null;

    #[ORM\Column(length: 255)]
    private ?string $dernierMetier = null;

    #[ORM\Column(nullable: true)]
    private ?int $dureeExperience = null;

    #[ORM\Column(length: 255)]
    private ?string $entrepriseExperience = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $niveauRemuneration = null;

    #[ORM\Column]
    private ?bool $salarie = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $statut = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $statutSalarie = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $statutCommentaire = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $entrepriseSalarie = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $adresseEntreprise = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $villeEntreprise = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $cpEntreprise = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $nomTuteur = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $prenomTuteur = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $adresseMailTuteur = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $telephoneTuteur = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDernierDiplome(): ?string
    {
        return $this->dernierDiplome;
    }

    public function setDernierDiplome(string $dernierDiplome): self
    {
        $this->dernierDiplome = $dernierDiplome;

        return $this;
    }

    public function getNiveauQualification(): ?string
    {
        return $this->niveauQualification;
    }

    public function setNiveauQualification(?string $niveauQualification): self
    {
        $this->niveauQualification = $niveauQualification;

        return $this;
    }

    public function getDateObtention(): ?\DateTimeInterface
    {
        return $this->dateObtention;
    }

    public function setDateObtention(\DateTimeInterface $dateObtention): self
    {
        $this->dateObtention = $dateObtention;

        return $this;
    }

    public function isDejaExperience(): ?bool
    {
        return $this->dejaExperience;
    }

    public function setDejaExperience(bool $dejaExperience): self
    {
        $this->dejaExperience = $dejaExperience;

        return $this;
    }

    public function getDernierMetier(): ?string
    {
        return $this->dernierMetier;
    }

    public function setDernierMetier(string $dernierMetier): self
    {
        $this->dernierMetier = $dernierMetier;

        return $this;
    }

    public function getDureeExperience(): ?int
    {
        return $this->dureeExperience;
    }

    public function setDureeExperience(?int $dureeExperience): self
    {
        $this->dureeExperience = $dureeExperience;

        return $this;
    }

    public function getEntrepriseExperience(): ?string
    {
        return $this->entrepriseExperience;
    }

    public function setEntrepriseExperience(string $entrepriseExperience): self
    {
        $this->entrepriseExperience = $entrepriseExperience;

        return $this;
    }

    public function getNiveauRemuneration(): ?string
    {
        return $this->niveauRemuneration;
    }

    public function setNiveauRemuneration(?string $niveauRemuneration): self
    {
        $this->niveauRemuneration = $niveauRemuneration;

        return $this;
    }

    public function isSalarie(): ?bool
    {
        return $this->salarie;
    }

    public function setSalarie(bool $salarie): self
    {
        $this->salarie = $salarie;

        return $this;
    }

    public function getStatut(): ?string
    {
        return $this->statut;
    }

    public function setStatut(?string $statut): self
    {
        $this->statut = $statut;

        return $this;
    }

    public function getStatutSalarie(): ?string
    {
        return $this->statutSalarie;
    }

    public function setStatutSalarie(?string $statutSalarie): self
    {
        $this->statutSalarie = $statutSalarie;

        return $this;
    }

    public function getStatutCommentaire(): ?string
    {
        return $this->statutCommentaire;
    }

    public function setStatutCommentaire(?string $statutCommentaire): self
    {
        $this->statutCommentaire = $statutCommentaire;

        return $this;
    }

    public function getEntrepriseSalarie(): ?string
    {
        return $this->entrepriseSalarie;
    }

    public function setEntrepriseSalarie(?string $entrepriseSalarie): self
    {
        $this->entrepriseSalarie = $entrepriseSalarie;

        return $this;
    }

    public function getAdresseEntreprise(): ?string
    {
        return $this->adresseEntreprise;
    }

    public function setAdresseEntreprise(?string $adresseEntreprise): self
    {
        $this->adresseEntreprise = $adresseEntreprise;

        return $this;
    }

    public function getVilleEntreprise(): ?string
    {
        return $this->villeEntreprise;
    }

    public function setVilleEntreprise(?string $villeEntreprise): self
    {
        $this->villeEntreprise = $villeEntreprise;

        return $this;
    }

    public function getCpEntreprise(): ?string
    {
        return $this->cpEntreprise;
    }

    public function setCpEntreprise(?string $cpEntreprise): self
    {
        $this->cpEntreprise = $cpEntreprise;

        return $this;
    }

    public function getNomTuteur(): ?string
    {
        return $this->nomTuteur;
    }

    public function setNomTuteur(?string $nomTuteur): self
    {
        $this->nomTuteur = $nomTuteur;

        return $this;
    }

    public function getPrenomTuteur(): ?string
    {
        return $this->prenomTuteur;
    }

    public function setPrenomTuteur(?string $prenomTuteur): self
    {
        $this->prenomTuteur = $prenomTuteur;

        return $this;
    }

    public function getAdresseMailTuteur(): ?string
    {
        return $this->adresseMailTuteur;
    }

    public function setAdresseMailTuteur(?string $adresseMailTuteur): self
    {
        $this->adresseMailTuteur = $adresseMailTuteur;

        return $this;
    }

    public function getTelephoneTuteur(): ?string
    {
        return $this->telephoneTuteur;
    }

    public function setTelephoneTuteur(?string $telephoneTuteur): self
    {
        $this->telephoneTuteur = $telephoneTuteur;

        return $this;
    }
}
