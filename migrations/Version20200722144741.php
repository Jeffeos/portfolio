<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200722144741 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE picture (id INT AUTO_INCREMENT NOT NULL, project_id INT DEFAULT NULL, tech_id INT DEFAULT NULL, user_id INT DEFAULT NULL, name VARCHAR(50) DEFAULT NULL, url VARCHAR(255) NOT NULL, INDEX IDX_8F7C2FC0166D1F9C (project_id), UNIQUE INDEX UNIQ_8F7C2FC064727BFC (tech_id), UNIQUE INDEX UNIQ_8F7C2FC0A76ED395 (user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE picture ADD CONSTRAINT FK_8F7C2FC0166D1F9C FOREIGN KEY (project_id) REFERENCES project (id)');
        $this->addSql('ALTER TABLE picture ADD CONSTRAINT FK_8F7C2FC064727BFC FOREIGN KEY (tech_id) REFERENCES tech (id)');
        $this->addSql('ALTER TABLE picture ADD CONSTRAINT FK_8F7C2FC0A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE picture');
    }
}
