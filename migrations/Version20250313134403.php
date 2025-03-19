<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250313134403 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE stat_block ADD category VARCHAR(50) NOT NULL, ADD size_sup TINYINT(1) NOT NULL, ADD size_inf TINYINT(1) NOT NULL, ADD sizes JSON DEFAULT NULL COMMENT \'(DC2Type:json)\', CHANGE type type VARCHAR(50) NOT NULL, CHANGE fp fp DOUBLE PRECISION DEFAULT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE stat_block DROP category, DROP size_sup, DROP size_inf, DROP sizes, CHANGE type type VARCHAR(255) DEFAULT NULL, CHANGE fp fp VARCHAR(255) DEFAULT NULL');
    }
}
