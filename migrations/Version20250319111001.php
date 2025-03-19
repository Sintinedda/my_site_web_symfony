<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250319111001 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE source_specialty_item (source_id INT NOT NULL, specialty_item_id INT NOT NULL, INDEX IDX_764711D9953C1C61 (source_id), INDEX IDX_764711D9605A4EC1 (specialty_item_id), PRIMARY KEY(source_id, specialty_item_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE source_specialty_item ADD CONSTRAINT FK_764711D9953C1C61 FOREIGN KEY (source_id) REFERENCES source (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE source_specialty_item ADD CONSTRAINT FK_764711D9605A4EC1 FOREIGN KEY (specialty_item_id) REFERENCES specialty_item (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE sb ADD source_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE sb ADD CONSTRAINT FK_E67738BE953C1C61 FOREIGN KEY (source_id) REFERENCES source (id)');
        $this->addSql('CREATE INDEX IDX_E67738BE953C1C61 ON sb (source_id)');
        $this->addSql('ALTER TABLE source_race ADD source_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE source_race ADD CONSTRAINT FK_DBE53EAC953C1C61 FOREIGN KEY (source_id) REFERENCES source (id)');
        $this->addSql('CREATE INDEX IDX_DBE53EAC953C1C61 ON source_race (source_id)');
        $this->addSql('ALTER TABLE spell ADD source_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE spell ADD CONSTRAINT FK_D03FCD8D953C1C61 FOREIGN KEY (source_id) REFERENCES source (id)');
        $this->addSql('CREATE INDEX IDX_D03FCD8D953C1C61 ON spell (source_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE source_specialty_item DROP FOREIGN KEY FK_764711D9953C1C61');
        $this->addSql('ALTER TABLE source_specialty_item DROP FOREIGN KEY FK_764711D9605A4EC1');
        $this->addSql('DROP TABLE source_specialty_item');
        $this->addSql('ALTER TABLE sb DROP FOREIGN KEY FK_E67738BE953C1C61');
        $this->addSql('DROP INDEX IDX_E67738BE953C1C61 ON sb');
        $this->addSql('ALTER TABLE sb DROP source_id');
        $this->addSql('ALTER TABLE source_race DROP FOREIGN KEY FK_DBE53EAC953C1C61');
        $this->addSql('DROP INDEX IDX_DBE53EAC953C1C61 ON source_race');
        $this->addSql('ALTER TABLE source_race DROP source_id');
        $this->addSql('ALTER TABLE spell DROP FOREIGN KEY FK_D03FCD8D953C1C61');
        $this->addSql('DROP INDEX IDX_D03FCD8D953C1C61 ON spell');
        $this->addSql('ALTER TABLE spell DROP source_id');
    }
}
