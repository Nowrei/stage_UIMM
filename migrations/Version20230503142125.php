<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230503142125 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE user ADD code_civilite_apprenant INT NOT NULL, ADD nom_apprenant VARCHAR(255) DEFAULT NULL, ADD nom_jf VARCHAR(255) DEFAULT NULL, ADD prenom_apprenant VARCHAR(255) DEFAULT NULL, ADD date_naissance VARCHAR(50) DEFAULT NULL, ADD tel1_appr VARCHAR(20) DEFAULT NULL, ADD tel2_appr VARCHAR(20) DEFAULT NULL, ADD email_appr VARCHAR(100) DEFAULT NULL, ADD adresse1_appr VARCHAR(255) DEFAULT NULL, ADD adresse2_appr VARCHAR(255) DEFAULT NULL, ADD cp_appr VARCHAR(20) DEFAULT NULL, ADD ville_appr VARCHAR(100) DEFAULT NULL, ADD lieu_naissance VARCHAR(100) DEFAULT NULL, ADD id_pays VARCHAR(100) DEFAULT NULL, ADD pays_naissance VARCHAR(50) DEFAULT NULL, ADD id_nationalite VARCHAR(100) DEFAULT NULL, ADD departement_naissance VARCHAR(100) DEFAULT NULL, ADD id_formation_souhait1 VARCHAR(50) DEFAULT NULL, ADD dernier_diplome VARCHAR(255) DEFAULT NULL, ADD niveau_qualification VARCHAR(50) DEFAULT NULL, ADD date_obtention VARCHAR(50) DEFAULT NULL, ADD deja_experience TINYINT(1) DEFAULT NULL, ADD dernier_metier VARCHAR(255) DEFAULT NULL, ADD duree_experience INT DEFAULT NULL, ADD entreprise_experience VARCHAR(255) DEFAULT NULL, ADD niveau_remuneration VARCHAR(255) DEFAULT NULL, ADD salarie TINYINT(1) DEFAULT NULL, ADD statut VARCHAR(255) DEFAULT NULL, ADD statut_salarie VARCHAR(50) DEFAULT NULL, ADD statut_commentaire VARCHAR(255) DEFAULT NULL, ADD entreprise_salarie VARCHAR(255) DEFAULT NULL, ADD adresse_entreprise VARCHAR(255) DEFAULT NULL, ADD ville_entreprise VARCHAR(100) DEFAULT NULL, ADD cp_entreprise VARCHAR(50) DEFAULT NULL, ADD nom_tuteur VARCHAR(255) DEFAULT NULL, ADD prenom_tuteur VARCHAR(255) DEFAULT NULL, ADD adresse_maill_tuteur VARCHAR(255) DEFAULT NULL, ADD telephone_tuteur VARCHAR(20) DEFAULT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE user DROP code_civilite_apprenant, DROP nom_apprenant, DROP nom_jf, DROP prenom_apprenant, DROP date_naissance, DROP tel1_appr, DROP tel2_appr, DROP email_appr, DROP adresse1_appr, DROP adresse2_appr, DROP cp_appr, DROP ville_appr, DROP lieu_naissance, DROP id_pays, DROP pays_naissance, DROP id_nationalite, DROP departement_naissance, DROP id_formation_souhait1, DROP dernier_diplome, DROP niveau_qualification, DROP date_obtention, DROP deja_experience, DROP dernier_metier, DROP duree_experience, DROP entreprise_experience, DROP niveau_remuneration, DROP salarie, DROP statut, DROP statut_salarie, DROP statut_commentaire, DROP entreprise_salarie, DROP adresse_entreprise, DROP ville_entreprise, DROP cp_entreprise, DROP nom_tuteur, DROP prenom_tuteur, DROP adresse_maill_tuteur, DROP telephone_tuteur');
    }
}
