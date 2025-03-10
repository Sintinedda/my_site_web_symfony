<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250309161151 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE stat_block_action_stat_block (stat_block_action_id INT NOT NULL, stat_block_id INT NOT NULL, INDEX IDX_5917FF73DD806A3F (stat_block_action_id), INDEX IDX_5917FF7360DA539B (stat_block_id), PRIMARY KEY(stat_block_action_id, stat_block_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE stat_block_reaction_stat_block (stat_block_reaction_id INT NOT NULL, stat_block_id INT NOT NULL, INDEX IDX_873EA966B09A313 (stat_block_reaction_id), INDEX IDX_873EA9660DA539B (stat_block_id), PRIMARY KEY(stat_block_reaction_id, stat_block_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE stat_block_skill_stat_block (stat_block_skill_id INT NOT NULL, stat_block_id INT NOT NULL, INDEX IDX_132BFF643814ADA8 (stat_block_skill_id), INDEX IDX_132BFF6460DA539B (stat_block_id), PRIMARY KEY(stat_block_skill_id, stat_block_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE stat_block_action_stat_block ADD CONSTRAINT FK_5917FF73DD806A3F FOREIGN KEY (stat_block_action_id) REFERENCES stat_block_action (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE stat_block_action_stat_block ADD CONSTRAINT FK_5917FF7360DA539B FOREIGN KEY (stat_block_id) REFERENCES stat_block (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE stat_block_reaction_stat_block ADD CONSTRAINT FK_873EA966B09A313 FOREIGN KEY (stat_block_reaction_id) REFERENCES stat_block_reaction (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE stat_block_reaction_stat_block ADD CONSTRAINT FK_873EA9660DA539B FOREIGN KEY (stat_block_id) REFERENCES stat_block (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE stat_block_skill_stat_block ADD CONSTRAINT FK_132BFF643814ADA8 FOREIGN KEY (stat_block_skill_id) REFERENCES stat_block_skill (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE stat_block_skill_stat_block ADD CONSTRAINT FK_132BFF6460DA539B FOREIGN KEY (stat_block_id) REFERENCES stat_block (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE stat_block_action DROP FOREIGN KEY FK_A6DDC7B360DA539B');
        $this->addSql('DROP INDEX IDX_A6DDC7B360DA539B ON stat_block_action');
        $this->addSql('ALTER TABLE stat_block_action DROP stat_block_id');
        $this->addSql('ALTER TABLE stat_block_reaction DROP FOREIGN KEY FK_C9466B1D795F14E8');
        $this->addSql('DROP INDEX IDX_C9466B1D795F14E8 ON stat_block_reaction');
        $this->addSql('ALTER TABLE stat_block_reaction DROP statblock_id');
        $this->addSql('ALTER TABLE stat_block_skill DROP FOREIGN KEY FK_41EEDD3C795F14E8');
        $this->addSql('DROP INDEX IDX_41EEDD3C795F14E8 ON stat_block_skill');
        $this->addSql('ALTER TABLE stat_block_skill DROP statblock_id');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE stat_block_action_stat_block DROP FOREIGN KEY FK_5917FF73DD806A3F');
        $this->addSql('ALTER TABLE stat_block_action_stat_block DROP FOREIGN KEY FK_5917FF7360DA539B');
        $this->addSql('ALTER TABLE stat_block_reaction_stat_block DROP FOREIGN KEY FK_873EA966B09A313');
        $this->addSql('ALTER TABLE stat_block_reaction_stat_block DROP FOREIGN KEY FK_873EA9660DA539B');
        $this->addSql('ALTER TABLE stat_block_skill_stat_block DROP FOREIGN KEY FK_132BFF643814ADA8');
        $this->addSql('ALTER TABLE stat_block_skill_stat_block DROP FOREIGN KEY FK_132BFF6460DA539B');
        $this->addSql('DROP TABLE stat_block_action_stat_block');
        $this->addSql('DROP TABLE stat_block_reaction_stat_block');
        $this->addSql('DROP TABLE stat_block_skill_stat_block');
        $this->addSql('ALTER TABLE stat_block_action ADD stat_block_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE stat_block_action ADD CONSTRAINT FK_A6DDC7B360DA539B FOREIGN KEY (stat_block_id) REFERENCES stat_block (id)');
        $this->addSql('CREATE INDEX IDX_A6DDC7B360DA539B ON stat_block_action (stat_block_id)');
        $this->addSql('ALTER TABLE stat_block_reaction ADD statblock_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE stat_block_reaction ADD CONSTRAINT FK_C9466B1D795F14E8 FOREIGN KEY (statblock_id) REFERENCES stat_block (id)');
        $this->addSql('CREATE INDEX IDX_C9466B1D795F14E8 ON stat_block_reaction (statblock_id)');
        $this->addSql('ALTER TABLE stat_block_skill ADD statblock_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE stat_block_skill ADD CONSTRAINT FK_41EEDD3C795F14E8 FOREIGN KEY (statblock_id) REFERENCES stat_block (id)');
        $this->addSql('CREATE INDEX IDX_41EEDD3C795F14E8 ON stat_block_skill (statblock_id)');
    }
}
