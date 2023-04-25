<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230424124642 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE coordonees (id INT AUTO_INCREMENT NOT NULL, id_coordonees VARCHAR(255) NOT NULL, code_civilite INT NOT NULL, date_naissance VARCHAR(255) NOT NULL, tel1 VARCHAR(255) NOT NULL, tel2 VARCHAR(255) DEFAULT NULL, email VARCHAR(255) DEFAULT NULL, adr1 VARCHAR(255) DEFAULT NULL, adr2 VARCHAR(255) DEFAULT NULL, cp VARCHAR(255) DEFAULT NULL, ville VARCHAR(255) DEFAULT NULL, code_pays_naissance INT DEFAULT NULL, code_nationalite INT NOT NULL, lieu_naissance VARCHAR(255) DEFAULT NULL, dept_naissance VARCHAR(255) DEFAULT NULL, nom_apprenant VARCHAR(255) NOT NULL, nom_jeune_fille VARCHAR(255) DEFAULT NULL, prenom_apprenant VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE coordonees');
    }
}
