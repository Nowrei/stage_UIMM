<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230425081707 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE profesionnelle (id INT AUTO_INCREMENT NOT NULL, dernier_diplome VARCHAR(255) NOT NULL, niveau_qualification VARCHAR(255) DEFAULT NULL, date_obtention DATE NOT NULL, deja_experience TINYINT(1) NOT NULL, dernier_metier VARCHAR(255) NOT NULL, duree_experience INT DEFAULT NULL, entreprise_experience VARCHAR(255) NOT NULL, niveau_remuneration VARCHAR(255) DEFAULT NULL, salarie TINYINT(1) NOT NULL, statut VARCHAR(255) DEFAULT NULL, statut_salarie VARCHAR(255) DEFAULT NULL, statut_commentaire VARCHAR(255) DEFAULT NULL, entreprise_salarie VARCHAR(255) DEFAULT NULL, adresse_entreprise VARCHAR(255) DEFAULT NULL, ville_entreprise VARCHAR(255) DEFAULT NULL, cp_entreprise VARCHAR(255) DEFAULT NULL, nom_tuteur VARCHAR(255) DEFAULT NULL, prenom_tuteur VARCHAR(255) DEFAULT NULL, adresse_mail_tuteur VARCHAR(255) DEFAULT NULL, telephone_tuteur VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE profesionnelle');
    }
}
