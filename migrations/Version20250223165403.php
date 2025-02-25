<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250223165403 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE stat_block ADD specialty_skill_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE stat_block ADD CONSTRAINT FK_EF3C4A3435477A8B FOREIGN KEY (specialty_skill_id) REFERENCES specialty_skill (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_EF3C4A3435477A8B ON stat_block (specialty_skill_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE stat_block DROP FOREIGN KEY FK_EF3C4A3435477A8B');
        $this->addSql('DROP INDEX UNIQ_EF3C4A3435477A8B ON stat_block');
        $this->addSql('ALTER TABLE stat_block DROP specialty_skill_id');
    }
}
