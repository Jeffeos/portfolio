<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200722160632 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE picture ADD updated_at DATETIME DEFAULT NULL');
        $this->addSql('ALTER TABLE picture RENAME INDEX idx_8f7c2fc0166d1f9c TO IDX_16DB4F89166D1F9C');
        $this->addSql('ALTER TABLE picture RENAME INDEX uniq_8f7c2fc064727bfc TO UNIQ_16DB4F8964727BFC');
        $this->addSql('ALTER TABLE picture RENAME INDEX uniq_8f7c2fc0a76ed395 TO UNIQ_16DB4F89A76ED395');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE picture DROP updated_at');
        $this->addSql('ALTER TABLE picture RENAME INDEX idx_16db4f89166d1f9c TO IDX_8F7C2FC0166D1F9C');
        $this->addSql('ALTER TABLE picture RENAME INDEX uniq_16db4f8964727bfc TO UNIQ_8F7C2FC064727BFC');
        $this->addSql('ALTER TABLE picture RENAME INDEX uniq_16db4f89a76ed395 TO UNIQ_8F7C2FC0A76ED395');
    }
}
