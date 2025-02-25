<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250225094400 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE stat_block_reaction (id INT AUTO_INCREMENT NOT NULL, statblock_id INT DEFAULT NULL, name VARCHAR(255) NOT NULL, descr VARCHAR(500) NOT NULL, INDEX IDX_C9466B1D795F14E8 (statblock_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE stat_block_reaction ADD CONSTRAINT FK_C9466B1D795F14E8 FOREIGN KEY (statblock_id) REFERENCES stat_block (id)');
        $this->addSql('ALTER TABLE stat_block ADD save VARCHAR(255) DEFAULT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE stat_block_reaction DROP FOREIGN KEY FK_C9466B1D795F14E8');
        $this->addSql('DROP TABLE stat_block_reaction');
        $this->addSql('ALTER TABLE stat_block DROP save');
    }
}
