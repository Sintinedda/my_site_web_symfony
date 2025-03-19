<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250319095555 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE sb DROP source');
        $this->addSql('ALTER TABLE source_race DROP source');
        $this->addSql('ALTER TABLE specialty_item DROP source');
        $this->addSql('ALTER TABLE spell DROP source, DROP ua_part');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE sb ADD source VARCHAR(100) NOT NULL');
        $this->addSql('ALTER TABLE source_race ADD source VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE specialty_item ADD source VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE spell ADD source VARCHAR(100) NOT NULL, ADD ua_part VARCHAR(50) DEFAULT NULL');
    }
}
