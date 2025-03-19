<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250317120138 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE spell_list ADD spell_id INT NOT NULL');
        $this->addSql('ALTER TABLE spell_list ADD CONSTRAINT FK_7AB3AD49479EC90D FOREIGN KEY (spell_id) REFERENCES spell (id)');
        $this->addSql('CREATE INDEX IDX_7AB3AD49479EC90D ON spell_list (spell_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE spell_list DROP FOREIGN KEY FK_7AB3AD49479EC90D');
        $this->addSql('DROP INDEX IDX_7AB3AD49479EC90D ON spell_list');
        $this->addSql('ALTER TABLE spell_list DROP spell_id');
    }
}
