<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250223162619 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE stat_block (id INT AUTO_INCREMENT NOT NULL, name_fr VARCHAR(255) NOT NULL, name_eng VARCHAR(255) NOT NULL, type VARCHAR(255) DEFAULT NULL, alignement VARCHAR(255) DEFAULT NULL, armor VARCHAR(255) DEFAULT NULL, pv VARCHAR(255) DEFAULT NULL, speed VARCHAR(255) DEFAULT NULL, strenght INT NOT NULL, dexterity INT NOT NULL, constitution INT NOT NULL, intelligence INT NOT NULL, wisdow INT NOT NULL, charisma INT NOT NULL, competence VARCHAR(255) DEFAULT NULL, sens VARCHAR(255) DEFAULT NULL, language VARCHAR(255) DEFAULT NULL, fp VARCHAR(255) DEFAULT NULL, bm VARCHAR(255) DEFAULT NULL, immunity_damage VARCHAR(255) DEFAULT NULL, immunity_condition VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE stat_block_action (id INT AUTO_INCREMENT NOT NULL, stat_block_id INT DEFAULT NULL, name VARCHAR(255) NOT NULL, descr VARCHAR(1020) NOT NULL, INDEX IDX_A6DDC7B360DA539B (stat_block_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE stat_block_skill (id INT AUTO_INCREMENT NOT NULL, statblock_id INT DEFAULT NULL, name VARCHAR(255) NOT NULL, descr VARCHAR(1020) NOT NULL, INDEX IDX_41EEDD3C795F14E8 (statblock_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE stat_block_action ADD CONSTRAINT FK_A6DDC7B360DA539B FOREIGN KEY (stat_block_id) REFERENCES stat_block (id)');
        $this->addSql('ALTER TABLE stat_block_skill ADD CONSTRAINT FK_41EEDD3C795F14E8 FOREIGN KEY (statblock_id) REFERENCES stat_block (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE stat_block_action DROP FOREIGN KEY FK_A6DDC7B360DA539B');
        $this->addSql('ALTER TABLE stat_block_skill DROP FOREIGN KEY FK_41EEDD3C795F14E8');
        $this->addSql('DROP TABLE stat_block');
        $this->addSql('DROP TABLE stat_block_action');
        $this->addSql('DROP TABLE stat_block_skill');
    }
}
