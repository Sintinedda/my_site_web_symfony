<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250317163534 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE spell_list CHANGE l1 l1 VARCHAR(600) NOT NULL, CHANGE l2 l2 VARCHAR(600) NOT NULL, CHANGE l3 l3 VARCHAR(600) DEFAULT NULL, CHANGE l4 l4 VARCHAR(600) DEFAULT NULL, CHANGE l5 l5 VARCHAR(600) DEFAULT NULL, CHANGE l6 l6 VARCHAR(600) DEFAULT NULL, CHANGE l7 l7 VARCHAR(600) DEFAULT NULL, CHANGE l8 l8 VARCHAR(600) DEFAULT NULL, CHANGE l9 l9 VARCHAR(600) DEFAULT NULL, CHANGE l10 l10 VARCHAR(600) DEFAULT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE spell_list CHANGE l1 l1 VARCHAR(500) NOT NULL, CHANGE l2 l2 VARCHAR(500) NOT NULL, CHANGE l3 l3 VARCHAR(500) DEFAULT NULL, CHANGE l4 l4 VARCHAR(500) DEFAULT NULL, CHANGE l5 l5 VARCHAR(500) DEFAULT NULL, CHANGE l6 l6 VARCHAR(500) DEFAULT NULL, CHANGE l7 l7 VARCHAR(500) DEFAULT NULL, CHANGE l8 l8 VARCHAR(500) DEFAULT NULL, CHANGE l9 l9 VARCHAR(500) DEFAULT NULL, CHANGE l10 l10 VARCHAR(500) DEFAULT NULL');
    }
}
