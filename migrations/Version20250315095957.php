<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250315095957 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE action_part_monster DROP monster_id');
        $this->addSql('ALTER TABLE sb DROP spe_cac');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE action_part_monster ADD monster_id INT NOT NULL');
        $this->addSql('ALTER TABLE sb ADD spe_cac VARCHAR(255) DEFAULT NULL');
    }
}
