<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230606135251 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE formations (id INT AUTO_INCREMENT NOT NULL, user_id INT NOT NULL, pole_formation_id INT NOT NULL, intitule_formation VARCHAR(255) NOT NULL, type_cert_formation VARCHAR(255) DEFAULT NULL, date_debut_formation DATE DEFAULT NULL, date_fin_formation DATE DEFAULT NULL, INDEX IDX_40902137A76ED395 (user_id), INDEX IDX_40902137126AD435 (pole_formation_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE site_formation (id INT AUTO_INCREMENT NOT NULL, code_site VARCHAR(30) DEFAULT NULL, nom VARCHAR(255) DEFAULT NULL, ville VARCHAR(50) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, email VARCHAR(180) NOT NULL, roles JSON NOT NULL, password VARCHAR(255) NOT NULL, token VARCHAR(255) DEFAULT NULL, is_verified TINYINT(1) NOT NULL, code_civilite_apprenant INT DEFAULT NULL, nom_apprenant VARCHAR(255) DEFAULT NULL, nom_jf VARCHAR(255) DEFAULT NULL, prenom_apprenant VARCHAR(255) DEFAULT NULL, date_naissance VARCHAR(50) DEFAULT NULL, tel1_appr VARCHAR(20) DEFAULT NULL, tel2_appr VARCHAR(20) DEFAULT NULL, email_appr VARCHAR(100) DEFAULT NULL, adresse1_appr VARCHAR(255) DEFAULT NULL, adresse2_appr VARCHAR(255) DEFAULT NULL, cp_appr VARCHAR(20) DEFAULT NULL, ville_appr VARCHAR(100) DEFAULT NULL, lieu_naissance VARCHAR(100) DEFAULT NULL, id_pays VARCHAR(100) DEFAULT NULL, pays_naissance VARCHAR(50) DEFAULT NULL, id_nationalite VARCHAR(100) DEFAULT NULL, departement_naissance VARCHAR(100) DEFAULT NULL, id_formation_souhait1 VARCHAR(50) DEFAULT NULL, dernier_diplome VARCHAR(255) DEFAULT NULL, niveau_qualification VARCHAR(50) DEFAULT NULL, date_obtention VARCHAR(50) DEFAULT NULL, deja_experience TINYINT(1) DEFAULT NULL, dernier_metier VARCHAR(255) DEFAULT NULL, duree_experience INT DEFAULT NULL, entreprise_experience VARCHAR(255) DEFAULT NULL, niveau_remuneration VARCHAR(255) DEFAULT NULL, salarie TINYINT(1) DEFAULT NULL, statut VARCHAR(255) DEFAULT NULL, statut_salarie VARCHAR(50) DEFAULT NULL, statut_commentaire VARCHAR(255) DEFAULT NULL, entreprise_salarie VARCHAR(255) DEFAULT NULL, adresse_entreprise VARCHAR(255) DEFAULT NULL, ville_entreprise VARCHAR(100) DEFAULT NULL, cp_entreprise VARCHAR(50) DEFAULT NULL, nom_tuteur VARCHAR(255) DEFAULT NULL, prenom_tuteur VARCHAR(255) DEFAULT NULL, adresse_maill_tuteur VARCHAR(255) DEFAULT NULL, telephone_tuteur VARCHAR(20) DEFAULT NULL, UNIQUE INDEX UNIQ_8D93D649E7927C74 (email), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE messenger_messages (id BIGINT AUTO_INCREMENT NOT NULL, body LONGTEXT NOT NULL, headers LONGTEXT NOT NULL, queue_name VARCHAR(190) NOT NULL, created_at DATETIME NOT NULL, available_at DATETIME NOT NULL, delivered_at DATETIME DEFAULT NULL, INDEX IDX_75EA56E0FB7336F0 (queue_name), INDEX IDX_75EA56E0E3BD61CE (available_at), INDEX IDX_75EA56E016BA31DB (delivered_at), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE formations ADD CONSTRAINT FK_40902137A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE formations ADD CONSTRAINT FK_40902137126AD435 FOREIGN KEY (pole_formation_id) REFERENCES site_formation (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE formations DROP FOREIGN KEY FK_40902137A76ED395');
        $this->addSql('ALTER TABLE formations DROP FOREIGN KEY FK_40902137126AD435');
        $this->addSql('DROP TABLE formations');
        $this->addSql('DROP TABLE site_formation');
        $this->addSql('DROP TABLE user');
        $this->addSql('DROP TABLE messenger_messages');
    }
}
