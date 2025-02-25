<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250225150233 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE skill_table ADD skill_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE skill_table ADD CONSTRAINT FK_D3011C7A5585C142 FOREIGN KEY (skill_id) REFERENCES skill (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_D3011C7A5585C142 ON skill_table (skill_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE skill_table DROP FOREIGN KEY FK_D3011C7A5585C142');
        $this->addSql('DROP INDEX UNIQ_D3011C7A5585C142 ON skill_table');
        $this->addSql('ALTER TABLE skill_table DROP skill_id');
    }
}
