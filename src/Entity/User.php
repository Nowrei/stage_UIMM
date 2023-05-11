<?php

namespace App\Entity;

use DateTime;
use Doctrine\ORM\Mapping as ORM;
use App\Repository\UserRepository;
use Doctrine\Common\Collections\Collection;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Security\Core\User\PasswordAuthenticatedUserInterface;

#[ORM\Entity(repositoryClass: UserRepository::class)]
#[UniqueEntity(fields: ['email'], message: 'There is already an account with this email')]
class User implements UserInterface, PasswordAuthenticatedUserInterface
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 180, unique: true)]
    private ?string $email = null;

    #[ORM\Column]
    private array $roles = [];

    /**
     * @var string The hashed password
     */
    #[ORM\Column]
    private ?string $password = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $token = null;

    #[ORM\Column(type: 'boolean')]
    private $isVerified = false;



    #[ORM\ManyToMany(targetEntity: Formations::class, inversedBy: 'users')]
    private Collection $user_form;

    #[ORM\Column(nullable: true)]
    private ?int $codeCiviliteApprenant = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $nomApprenant = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $nomJf = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $prenomApprenant = null;

    #[ORM\Column(length: 50, nullable: true)]
    private ?string $dateNaissance = null;

    #[ORM\Column(length: 20, nullable: true)]
    private ?string $tel1Appr = null;

    #[ORM\Column(length: 20, nullable: true)]
    private ?string $tel2Appr = null;

    #[ORM\Column(length: 100, nullable: true)]
    private ?string $emailAppr = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $adresse1Appr = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $adresse2Appr = null;

    #[ORM\Column(length: 20, nullable: true)]
    private ?string $cpAppr = null;

    #[ORM\Column(length: 100, nullable: true)]
    private ?string $villeAppr = null;

    #[ORM\Column(length: 100, nullable: true)]
    private ?string $lieuNaissance = null;

    #[ORM\Column(length: 100, nullable: true)]
    private ?string $idPays = null;

    #[ORM\Column(length: 50, nullable: true)]
    private ?string $paysNaissance = null;

    #[ORM\Column(length: 100, nullable: true)]
    private ?string $idNationalite = null;

    #[ORM\Column(length: 100, nullable: true)]
    private ?string $departementNaissance = null;

    #[ORM\Column(length: 50, nullable: true)]
    private ?string $idFormationSouhait1 = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $dernierDiplome = null;

    #[ORM\Column(length: 50, nullable: true)]
    private ?string $niveauQualification = null;

    #[ORM\Column(length: 50, nullable: true)]
    private ?string $dateObtention = null;

    #[ORM\Column(nullable: true)]
    private ?bool $dejaExperience = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $dernierMetier = null;

    #[ORM\Column(nullable: true)]
    private ?int $dureeExperience = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $entrepriseExperience = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $niveauRemuneration = null;

    #[ORM\Column(nullable: true)]
    private ?bool $salarie = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $statut = null;

    #[ORM\Column(length: 50, nullable: true)]
    private ?string $statutSalarie = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $statutCommentaire = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $entrepriseSalarie = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $adresseEntreprise = null;

    #[ORM\Column(length: 100, nullable: true)]
    private ?string $villeEntreprise = null;

    #[ORM\Column(length: 50, nullable: true)]
    private ?string $cpEntreprise = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $nomTuteur = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $prenomTuteur = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $adresseMaillTuteur = null;

    #[ORM\Column(length: 20, nullable: true)]
    private ?string $telephoneTuteur = null;

  

    public function __construct()
    {
        $this->user_form = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    /**
     * A visual identifier that represents this user.
     *
     * @see UserInterface
     */
    public function getUserIdentifier(): string
    {
        return (string) $this->email;
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
     * @see PasswordAuthenticatedUserInterface
     */
    public function getPassword(): string
    {
        return $this->password;
    }

    public function setPassword(string $password): self
    {
        $this->password = $password;

        return $this;
    }

    /**
     * @see UserInterface
     */
    public function eraseCredentials()
    {
        // If you store any temporary, sensitive data on the user, clear it here
        // $this->plainPassword = null;
    }

    public function getToken(): ?string
    {
        return $this->token;
    }

    public function setToken(?string $token): self
    {
        $this->token = $token;

        return $this;
    }

    public function isVerified(): bool
    {
        return $this->isVerified;
    }

    public function setIsVerified(bool $isVerified): self
    {
        $this->isVerified = $isVerified;

        return $this;
    }


    /**
     * @return Collection<int, Formations>
     */
    public function getUserForm(): Collection
    {
        return $this->user_form;
    }

    public function addUserForm(Formations $userForm): self
    {
        if (!$this->user_form->contains($userForm)) {
            $this->user_form->add($userForm);
        }

        return $this;
    }

    public function removeUserForm(Formations $userForm): self
    {
        $this->user_form->removeElement($userForm);

        return $this;
    }

    public function getCodeCiviliteApprenant(): ?int
    {
        return $this->codeCiviliteApprenant;
    }

    public function setCodeCiviliteApprenant(int $codeCiviliteApprenant): self
    {
        $this->codeCiviliteApprenant = $codeCiviliteApprenant;

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

    public function getNomJf(): ?string
    {
        return $this->nomJf;
    }

    public function setNomJf(?string $nomJf): self
    {
        $this->nomJf = $nomJf;

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

    public function getDateNaissance(): ?string
    {
        return $this->dateNaissance;
    }

    public function setDateNaissance(string $dateNaissance): self
    {
        $this->dateNaissance = $dateNaissance;

        return $this;
    }

    public function getTel1Appr(): ?string
    {
        return $this->tel1Appr;
    }

    public function setTel1Appr(string $tel1Appr): self
    {
        $this->tel1Appr = $tel1Appr;

        return $this;
    }

    public function getTel2Appr(): ?string
    {
        return $this->tel2Appr;
    }

    public function setTel2Appr(?string $tel2Appr): self
    {
        $this->tel2Appr = $tel2Appr;

        return $this;
    }

    public function getEmailAppr(): ?string
    {
        return $this->emailAppr;
    }

    public function setEmailAppr(string $emailAppr): self
    {
        $this->emailAppr = $emailAppr;

        return $this;
    }

    public function getAdresse1Appr(): ?string
    {
        return $this->adresse1Appr;
    }

    public function setAdresse1Appr(string $adresse1Appr): self
    {
        $this->adresse1Appr = $adresse1Appr;

        return $this;
    }

    public function getAdresse2Appr(): ?string
    {
        return $this->adresse2Appr;
    }

    public function setAdresse2Appr(?string $adresse2Appr): self
    {
        $this->adresse2Appr = $adresse2Appr;

        return $this;
    }

    public function getCpAppr(): ?string
    {
        return $this->cpAppr;
    }

    public function setCpAppr(string $cpAppr): self
    {
        $this->cpAppr = $cpAppr;

        return $this;
    }

    public function getVilleAppr(): ?string
    {
        return $this->villeAppr;
    }

    public function setVilleAppr(string $villeAppr): self
    {
        $this->villeAppr = $villeAppr;

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

    public function getIdPays(): ?string
    {
        return $this->idPays;
    }

    public function setIdPays(?string $idPays): self
    {
        $this->idPays = $idPays;

        return $this;
    }

    public function getPaysNaissance(): ?string
    {
        return $this->paysNaissance;
    }

    public function setPaysNaissance(string $paysNaissance): self
    {
        $this->paysNaissance = $paysNaissance;

        return $this;
    }

    public function getIdNationalite(): ?string
    {
        return $this->idNationalite;
    }

    public function setIdNationalite(string $idNationalite): self
    {
        $this->idNationalite = $idNationalite;

        return $this;
    }

    public function getDepartementNaissance(): ?string
    {
        return $this->departementNaissance;
    }

    public function setDepartementNaissance(?string $departementNaissance): self
    {
        $this->departementNaissance = $departementNaissance;

        return $this;
    }

    public function getIdFormationSouhait1(): ?string
    {
        return $this->idFormationSouhait1;
    }

    public function setIdFormationSouhait1(string $idFormationSouhait1): self
    {
        $this->idFormationSouhait1 = $idFormationSouhait1;

        return $this;
    }

    public function getDernierDiplome(): ?string
    {
        return $this->dernierDiplome;
    }

    public function setDernierDiplome(?string $dernierDiplome): self
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

    public function getDateObtention(): ?DateTime
    {
        $date   = new DateTime();                   //creation de objet date avec la date du jour aujourdhui
        if (!is_null($this->dateObtention)){   //si lobjet nest pas null on return lobjet obtenu depuis la bdd
            $date=date_create($this->dateObtention);
            return $date;
        }else{                                      //si lobjet est null on return la date daujourdhui
            return $date;
            //return $date->format("Y");
            
        }
        
    }

    public function setDateObtention(?DateTime $dateObtention): string
    {

        $date=$dateObtention;
        
        $this->dateObtention=date_format($date,"Y"); //ici on recoit un objet datetime depuis lutilisateur et on met le valeur dedans la propriete du objet this
        return ( $this->dateObtention  );   
        //die;                               // et on return lobjet pour etre ecrit dans la bdd
        
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

    public function setDernierMetier(?string $dernierMetier): self
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

    public function setEntrepriseExperience(?string $entrepriseExperience): self
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

    public function getAdresseMaillTuteur(): ?string
    {
        return $this->adresseMaillTuteur;
    }

    public function setAdresseMaillTuteur(?string $adresseMaillTuteur): self
    {
        $this->adresseMaillTuteur = $adresseMaillTuteur;

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
