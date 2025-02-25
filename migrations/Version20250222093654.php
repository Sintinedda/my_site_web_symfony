<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250222093654 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE specialty_item_table CHANGE specialty_id specialty_item_id INT NOT NULL');
        $this->addSql('ALTER TABLE specialty_item_table ADD CONSTRAINT FK_9A05F257605A4EC1 FOREIGN KEY (specialty_item_id) REFERENCES specialty_item (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_9A05F257605A4EC1 ON specialty_item_table (specialty_item_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE specialty_item_table DROP FOREIGN KEY FK_9A05F257605A4EC1');
        $this->addSql('DROP INDEX UNIQ_9A05F257605A4EC1 ON specialty_item_table');
        $this->addSql('ALTER TABLE specialty_item_table CHANGE specialty_item_id specialty_id INT NOT NULL');
    }
}
