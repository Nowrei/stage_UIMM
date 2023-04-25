<?php

namespace App\Entity;

use App\Repository\CoordoneesRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CoordoneesRepository::class)]
class Coordonees
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $idCoordonees = null;

    #[ORM\Column]
    private ?int $codeCivilite = null;

    #[ORM\Column(length: 255)]
    private ?string $dateNaissance = null;

    #[ORM\Column(length: 255)]
    private ?string $tel1 = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $tel2 = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $email = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $adr1 = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $adr2 = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $cp = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $ville = null;

    #[ORM\Column(nullable: true)]
    private ?int $codePaysNaissance = null;

    #[ORM\Column]
    private ?int $codeNationalite = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $lieuNaissance = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $deptNaissance = null;

    #[ORM\Column(length: 255)]
    private ?string $nomApprenant = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $nomJeuneFille = null;

    #[ORM\Column(length: 255)]
    private ?string $prenomApprenant = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getIdCoordonees(): ?string
    {
        return $this->idCoordonees;
    }

    public function setIdCoordonees(string $idCoordonees): self
    {
        $this->idCoordonees = $idCoordonees;

        return $this;
    }

    public function getCodeCivilite(): ?int
    {
        return $this->codeCivilite;
    }

    public function setCodeCivilite(int $codeCivilite): self
    {
        $this->codeCivilite = $codeCivilite;

        return $this;
    }

    public function getDateNaissance(): ?string
    {
        return $this->dateNaissance;
    }

    public function setDateNaissance(string $dateNaissance): self
    {
        $this->dateNaissance = $dateNaissance;

        return $this;
    }

    public function getTel1(): ?string
    {
        return $this->tel1;
    }

    public function setTel1(string $tel1): self
    {
        $this->tel1 = $tel1;

        return $this;
    }

    public function getTel2(): ?string
    {
        return $this->tel2;
    }

    public function setTel2(?string $tel2): self
    {
        $this->tel2 = $tel2;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(?string $email): self
    {
        $this->email = $email;

        return $this;
    }

    public function getAdr1(): ?string
    {
        return $this->adr1;
    }

    public function setAdr1(?string $adr1): self
    {
        $this->adr1 = $adr1;

        return $this;
    }

    public function getAdr2(): ?string
    {
        return $this->adr2;
    }

    public function setAdr2(?string $adr2): self
    {
        $this->adr2 = $adr2;

        return $this;
    }

    public function getCp(): ?string
    {
        return $this->cp;
    }

    public function setCp(?string $cp): self
    {
        $this->cp = $cp;

        return $this;
    }

    public function getVille(): ?string
    {
        return $this->ville;
    }

    public function setVille(?string $ville): self
    {
        $this->ville = $ville;

        return $this;
    }

    public function getCodePaysNaissance(): ?int
    {
        return $this->codePaysNaissance;
    }

    public function setCodePaysNaissance(?int $codePaysNaissance): self
    {
        $this->codePaysNaissance = $codePaysNaissance;

        return $this;
    }

    public function getCodeNationalite(): ?int
    {
        return $this->codeNationalite;
    }

    public function setCodeNationalite(int $codeNationalite): self
    {
        $this->codeNationalite = $codeNationalite;

        return $this;
    }

    public function getLieuNaissance(): ?string
    {
        return $this->lieuNaissance;
    }

    public function setLieuNaissance(?string $lieuNaissance): self
    {
        $this->lieuNaissance = $lieuNaissance;

        return $this;
    }

    public function getDeptNaissance(): ?string
    {
        return $this->deptNaissance;
    }

    public function setDeptNaissance(?string $deptNaissance): self
    {
        $this->deptNaissance = $deptNaissance;

        return $this;
    }

    public function getNomApprenant(): ?string
    {
        return $this->nomApprenant;
    }

    public function setNomApprenant(string $nomApprenant): self
    {
        $this->nomApprenant = $nomApprenant;

        return $this;
    }

    public function getNomJeuneFille(): ?string
    {
        return $this->nomJeuneFille;
    }

    public function setNomJeuneFille(?string $nomJeuneFille): self
    {
        $this->nomJeuneFille = $nomJeuneFille;

        return $this;
    }

    public function getPrenomApprenant(): ?string
    {
        return $this->prenomApprenant;
    }

    public function setPrenomApprenant(string $prenomApprenant): self
    {
        $this->prenomApprenant = $prenomApprenant;

        return $this;
    }
}
