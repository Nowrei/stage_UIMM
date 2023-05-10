<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230427122726 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE coordonees (id INT AUTO_INCREMENT NOT NULL, id_coordonees VARCHAR(255) NOT NULL, code_civilite INT NOT NULL, date_naissance VARCHAR(255) NOT NULL, tel1 VARCHAR(255) NOT NULL, tel2 VARCHAR(255) DEFAULT NULL, email VARCHAR(255) DEFAULT NULL, adr1 VARCHAR(255) DEFAULT NULL, adr2 VARCHAR(255) DEFAULT NULL, cp VARCHAR(255) DEFAULT NULL, ville VARCHAR(255) DEFAULT NULL, code_pays_naissance INT DEFAULT NULL, code_nationalite INT NOT NULL, lieu_naissance VARCHAR(255) DEFAULT NULL, dept_naissance VARCHAR(255) DEFAULT NULL, nom_apprenant VARCHAR(255) NOT NULL, nom_jeune_fille VARCHAR(255) DEFAULT NULL, prenom_apprenant VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE formations (id INT AUTO_INCREMENT NOT NULL, pole_formation VARCHAR(255) NOT NULL, intitule_formation VARCHAR(255) NOT NULL, type_cert_formation VARCHAR(255) DEFAULT NULL, date_debut_formation DATE DEFAULT NULL, date_fin_formation DATE DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE profesionnelle (id INT AUTO_INCREMENT NOT NULL, dernier_diplome VARCHAR(255) NOT NULL, niveau_qualification VARCHAR(255) DEFAULT NULL, date_obtention DATE NOT NULL, deja_experience TINYINT(1) NOT NULL, dernier_metier VARCHAR(255) NOT NULL, duree_experience INT DEFAULT NULL, entreprise_experience VARCHAR(255) NOT NULL, niveau_remuneration VARCHAR(255) DEFAULT NULL, salarie TINYINT(1) NOT NULL, statut VARCHAR(255) DEFAULT NULL, statut_salarie VARCHAR(255) DEFAULT NULL, statut_commentaire VARCHAR(255) DEFAULT NULL, entreprise_salarie VARCHAR(255) DEFAULT NULL, adresse_entreprise VARCHAR(255) DEFAULT NULL, ville_entreprise VARCHAR(255) DEFAULT NULL, cp_entreprise VARCHAR(255) DEFAULT NULL, nom_tuteur VARCHAR(255) DEFAULT NULL, prenom_tuteur VARCHAR(255) DEFAULT NULL, adresse_mail_tuteur VARCHAR(255) DEFAULT NULL, telephone_tuteur VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, user_coord_id INT DEFAULT NULL, user_prof_id INT DEFAULT NULL, email VARCHAR(180) NOT NULL, roles JSON NOT NULL, password VARCHAR(255) NOT NULL, token VARCHAR(255) DEFAULT NULL, is_verified TINYINT(1) NOT NULL, UNIQUE INDEX UNIQ_8D93D649E7927C74 (email), UNIQUE INDEX UNIQ_8D93D649F1C1D26B (user_coord_id), UNIQUE INDEX UNIQ_8D93D649F3CCE9F4 (user_prof_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user_formations (user_id INT NOT NULL, formations_id INT NOT NULL, INDEX IDX_E7F7E7DBA76ED395 (user_id), INDEX IDX_E7F7E7DB3BF5B0C2 (formations_id), PRIMARY KEY(user_id, formations_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE messenger_messages (id BIGINT AUTO_INCREMENT NOT NULL, body LONGTEXT NOT NULL, headers LONGTEXT NOT NULL, queue_name VARCHAR(190) NOT NULL, created_at DATETIME NOT NULL, available_at DATETIME NOT NULL, delivered_at DATETIME DEFAULT NULL, INDEX IDX_75EA56E0FB7336F0 (queue_name), INDEX IDX_75EA56E0E3BD61CE (available_at), INDEX IDX_75EA56E016BA31DB (delivered_at), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE user ADD CONSTRAINT FK_8D93D649F1C1D26B FOREIGN KEY (user_coord_id) REFERENCES coordonees (id)');
        $this->addSql('ALTER TABLE user ADD CONSTRAINT FK_8D93D649F3CCE9F4 FOREIGN KEY (user_prof_id) REFERENCES profesionnelle (id)');
        $this->addSql('ALTER TABLE user_formations ADD CONSTRAINT FK_E7F7E7DBA76ED395 FOREIGN KEY (user_id) REFERENCES user (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE user_formations ADD CONSTRAINT FK_E7F7E7DB3BF5B0C2 FOREIGN KEY (formations_id) REFERENCES formations (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE user DROP FOREIGN KEY FK_8D93D649F1C1D26B');
        $this->addSql('ALTER TABLE user DROP FOREIGN KEY FK_8D93D649F3CCE9F4');
        $this->addSql('ALTER TABLE user_formations DROP FOREIGN KEY FK_E7F7E7DBA76ED395');
        $this->addSql('ALTER TABLE user_formations DROP FOREIGN KEY FK_E7F7E7DB3BF5B0C2');
        $this->addSql('DROP TABLE coordonees');
        $this->addSql('DROP TABLE formations');
        $this->addSql('DROP TABLE profesionnelle');
        $this->addSql('DROP TABLE user');
        $this->addSql('DROP TABLE user_formations');
        $this->addSql('DROP TABLE messenger_messages');
    }
}
