<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250306201116 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE specialty_skill_specialty_item (specialty_skill_id INT NOT NULL, specialty_item_id INT NOT NULL, INDEX IDX_86895AA835477A8B (specialty_skill_id), INDEX IDX_86895AA8605A4EC1 (specialty_item_id), PRIMARY KEY(specialty_skill_id, specialty_item_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE specialty_skill_specialty_item ADD CONSTRAINT FK_86895AA835477A8B FOREIGN KEY (specialty_skill_id) REFERENCES specialty_skill (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE specialty_skill_specialty_item ADD CONSTRAINT FK_86895AA8605A4EC1 FOREIGN KEY (specialty_item_id) REFERENCES specialty_item (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE specialty_skill DROP FOREIGN KEY FK_FD4BC15B9A353316');
        $this->addSql('DROP INDEX IDX_FD4BC15B9A353316 ON specialty_skill');
        $this->addSql('ALTER TABLE specialty_skill DROP specialty_id');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE specialty_skill_specialty_item DROP FOREIGN KEY FK_86895AA835477A8B');
        $this->addSql('ALTER TABLE specialty_skill_specialty_item DROP FOREIGN KEY FK_86895AA8605A4EC1');
        $this->addSql('DROP TABLE specialty_skill_specialty_item');
        $this->addSql('ALTER TABLE specialty_skill ADD specialty_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE specialty_skill ADD CONSTRAINT FK_FD4BC15B9A353316 FOREIGN KEY (specialty_id) REFERENCES specialty_item (id)');
        $this->addSql('CREATE INDEX IDX_FD4BC15B9A353316 ON specialty_skill (specialty_id)');
    }
}
