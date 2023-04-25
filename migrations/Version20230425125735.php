<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230425125735 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE user_formations (user_id INT NOT NULL, formations_id INT NOT NULL, INDEX IDX_E7F7E7DBA76ED395 (user_id), INDEX IDX_E7F7E7DB3BF5B0C2 (formations_id), PRIMARY KEY(user_id, formations_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE user_formations ADD CONSTRAINT FK_E7F7E7DBA76ED395 FOREIGN KEY (user_id) REFERENCES user (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE user_formations ADD CONSTRAINT FK_E7F7E7DB3BF5B0C2 FOREIGN KEY (formations_id) REFERENCES formations (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE user ADD user_coord_id INT DEFAULT NULL, ADD user_prof_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE user ADD CONSTRAINT FK_8D93D649F1C1D26B FOREIGN KEY (user_coord_id) REFERENCES coordonees (id)');
        $this->addSql('ALTER TABLE user ADD CONSTRAINT FK_8D93D649F3CCE9F4 FOREIGN KEY (user_prof_id) REFERENCES profesionnelle (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_8D93D649F1C1D26B ON user (user_coord_id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_8D93D649F3CCE9F4 ON user (user_prof_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE user_formations DROP FOREIGN KEY FK_E7F7E7DBA76ED395');
        $this->addSql('ALTER TABLE user_formations DROP FOREIGN KEY FK_E7F7E7DB3BF5B0C2');
        $this->addSql('DROP TABLE user_formations');
        $this->addSql('ALTER TABLE user DROP FOREIGN KEY FK_8D93D649F1C1D26B');
        $this->addSql('ALTER TABLE user DROP FOREIGN KEY FK_8D93D649F3CCE9F4');
        $this->addSql('DROP INDEX UNIQ_8D93D649F1C1D26B ON user');
        $this->addSql('DROP INDEX UNIQ_8D93D649F3CCE9F4 ON user');
        $this->addSql('ALTER TABLE user DROP user_coord_id, DROP user_prof_id');
    }
}
