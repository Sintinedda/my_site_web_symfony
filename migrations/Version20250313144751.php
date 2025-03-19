<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250313144751 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE sb (id INT AUTO_INCREMENT NOT NULL, skill_id INT DEFAULT NULL, nom VARCHAR(50) NOT NULL, slug VARCHAR(50) NOT NULL, name VARCHAR(50) NOT NULL, category VARCHAR(50) NOT NULL, type VARCHAR(50) NOT NULL, type2 VARCHAR(50) DEFAULT NULL, sizes JSON NOT NULL COMMENT \'(DC2Type:json)\', size_inf TINYINT(1) NOT NULL, size_sup TINYINT(1) NOT NULL, alignment VARCHAR(50) DEFAULT NULL, ca INT NOT NULL, armor VARCHAR(50) DEFAULT NULL, pv INT NOT NULL, dv VARCHAR(50) NOT NULL, speed VARCHAR(50) NOT NULL, str INT NOT NULL, dex INT NOT NULL, con INT NOT NULL, intell INT NOT NULL, wis INT NOT NULL, cha INT NOT NULL, save VARCHAR(50) DEFAULT NULL, comp VARCHAR(50) DEFAULT NULL, res_damage JSON DEFAULT NULL COMMENT \'(DC2Type:json)\', res_state JSON DEFAULT NULL COMMENT \'(DC2Type:json)\', imm_damage JSON DEFAULT NULL COMMENT \'(DC2Type:json)\', imm_state JSON DEFAULT NULL COMMENT \'(DC2Type:json)\', sens JSON DEFAULT NULL COMMENT \'(DC2Type:json)\', pp INT DEFAULT NULL, language JSON DEFAULT NULL COMMENT \'(DC2Type:json)\', fp DOUBLE PRECISION DEFAULT NULL, bm INT DEFAULT NULL, touch_cac VARCHAR(50) DEFAULT NULL, range_cac VARCHAR(50) DEFAULT NULL, target_cac VARCHAR(50) DEFAULT NULL, damage_cac VARCHAR(50) DEFAULT NULL, touch_range VARCHAR(50) DEFAULT NULL, range_range VARCHAR(50) DEFAULT NULL, target_range VARCHAR(50) DEFAULT NULL, damage_range VARCHAR(50) DEFAULT NULL, descr VARCHAR(500) DEFAULT NULL, UNIQUE INDEX UNIQ_E67738BE5585C142 (skill_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE sbaction (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(50) NOT NULL, descr VARCHAR(500) DEFAULT NULL, type JSON DEFAULT NULL COMMENT \'(DC2Type:json)\', target JSON DEFAULT NULL COMMENT \'(DC2Type:json)\', PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE sbaction_sb (sbaction_id INT NOT NULL, sb_id INT NOT NULL, INDEX IDX_FB20EA26A26EB5C8 (sbaction_id), INDEX IDX_FB20EA26707F4EA8 (sb_id), PRIMARY KEY(sbaction_id, sb_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE sbreaction (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(50) NOT NULL, descr VARCHAR(500) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE sbreaction_sb (sbreaction_id INT NOT NULL, sb_id INT NOT NULL, INDEX IDX_7FD63B2C269864C2 (sbreaction_id), INDEX IDX_7FD63B2C707F4EA8 (sb_id), PRIMARY KEY(sbreaction_id, sb_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE sbskill (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(50) NOT NULL, descr VARCHAR(500) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE sbskill_sb (sbskill_id INT NOT NULL, sb_id INT NOT NULL, INDEX IDX_E588BE0ABCC6E1E4 (sbskill_id), INDEX IDX_E588BE0A707F4EA8 (sb_id), PRIMARY KEY(sbskill_id, sb_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE sb ADD CONSTRAINT FK_E67738BE5585C142 FOREIGN KEY (skill_id) REFERENCES specialty_skill (id)');
        $this->addSql('ALTER TABLE sbaction_sb ADD CONSTRAINT FK_FB20EA26A26EB5C8 FOREIGN KEY (sbaction_id) REFERENCES sbaction (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE sbaction_sb ADD CONSTRAINT FK_FB20EA26707F4EA8 FOREIGN KEY (sb_id) REFERENCES sb (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE sbreaction_sb ADD CONSTRAINT FK_7FD63B2C269864C2 FOREIGN KEY (sbreaction_id) REFERENCES sbreaction (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE sbreaction_sb ADD CONSTRAINT FK_7FD63B2C707F4EA8 FOREIGN KEY (sb_id) REFERENCES sb (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE sbskill_sb ADD CONSTRAINT FK_E588BE0ABCC6E1E4 FOREIGN KEY (sbskill_id) REFERENCES sbskill (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE sbskill_sb ADD CONSTRAINT FK_E588BE0A707F4EA8 FOREIGN KEY (sb_id) REFERENCES sb (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE stat_block DROP FOREIGN KEY FK_EF3C4A3435477A8B');
        $this->addSql('ALTER TABLE stat_block_action_stat_block DROP FOREIGN KEY FK_5917FF73DD806A3F');
        $this->addSql('ALTER TABLE stat_block_action_stat_block DROP FOREIGN KEY FK_5917FF7360DA539B');
        $this->addSql('ALTER TABLE stat_block_reaction_stat_block DROP FOREIGN KEY FK_873EA9660DA539B');
        $this->addSql('ALTER TABLE stat_block_reaction_stat_block DROP FOREIGN KEY FK_873EA966B09A313');
        $this->addSql('ALTER TABLE stat_block_skill_stat_block DROP FOREIGN KEY FK_132BFF643814ADA8');
        $this->addSql('ALTER TABLE stat_block_skill_stat_block DROP FOREIGN KEY FK_132BFF6460DA539B');
        $this->addSql('DROP TABLE stat_block');
        $this->addSql('DROP TABLE stat_block_action');
        $this->addSql('DROP TABLE stat_block_action_stat_block');
        $this->addSql('DROP TABLE stat_block_reaction');
        $this->addSql('DROP TABLE stat_block_reaction_stat_block');
        $this->addSql('DROP TABLE stat_block_skill');
        $this->addSql('DROP TABLE stat_block_skill_stat_block');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE stat_block (id INT AUTO_INCREMENT NOT NULL, specialty_skill_id INT DEFAULT NULL, name_fr VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, name_eng VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, type VARCHAR(50) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, alignement VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, armor VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, pv VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, speed VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, strenght INT NOT NULL, dexterity INT NOT NULL, constitution INT NOT NULL, intelligence INT NOT NULL, wisdow INT NOT NULL, charisma INT NOT NULL, competence VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, language VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, fp DOUBLE PRECISION DEFAULT NULL, bm VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, save VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, slug VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, touch_weapon_cac VARCHAR(100) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, range_weapon_cac VARCHAR(100) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, damage_weapon_cac VARCHAR(100) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, sens JSON DEFAULT NULL COMMENT \'(DC2Type:json)\', imm_damage JSON DEFAULT NULL COMMENT \'(DC2Type:json)\', imm_state JSON DEFAULT NULL COMMENT \'(DC2Type:json)\', pp VARCHAR(100) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, category VARCHAR(50) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, size_sup TINYINT(1) NOT NULL, size_inf TINYINT(1) NOT NULL, sizes JSON DEFAULT NULL COMMENT \'(DC2Type:json)\', source VARCHAR(100) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, type2 VARCHAR(100) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, ca INT DEFAULT NULL, UNIQUE INDEX UNIQ_EF3C4A3435477A8B (specialty_skill_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE stat_block_action (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, descr VARCHAR(1020) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, type VARCHAR(100) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, target VARCHAR(100) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE stat_block_action_stat_block (stat_block_action_id INT NOT NULL, stat_block_id INT NOT NULL, INDEX IDX_5917FF73DD806A3F (stat_block_action_id), INDEX IDX_5917FF7360DA539B (stat_block_id), PRIMARY KEY(stat_block_action_id, stat_block_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE stat_block_reaction (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, descr VARCHAR(500) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE stat_block_reaction_stat_block (stat_block_reaction_id INT NOT NULL, stat_block_id INT NOT NULL, INDEX IDX_873EA966B09A313 (stat_block_reaction_id), INDEX IDX_873EA9660DA539B (stat_block_id), PRIMARY KEY(stat_block_reaction_id, stat_block_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE stat_block_skill (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, descr VARCHAR(1020) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE stat_block_skill_stat_block (stat_block_skill_id INT NOT NULL, stat_block_id INT NOT NULL, INDEX IDX_132BFF643814ADA8 (stat_block_skill_id), INDEX IDX_132BFF6460DA539B (stat_block_id), PRIMARY KEY(stat_block_skill_id, stat_block_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE stat_block ADD CONSTRAINT FK_EF3C4A3435477A8B FOREIGN KEY (specialty_skill_id) REFERENCES specialty_skill (id)');
        $this->addSql('ALTER TABLE stat_block_action_stat_block ADD CONSTRAINT FK_5917FF73DD806A3F FOREIGN KEY (stat_block_action_id) REFERENCES stat_block_action (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE stat_block_action_stat_block ADD CONSTRAINT FK_5917FF7360DA539B FOREIGN KEY (stat_block_id) REFERENCES stat_block (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE stat_block_reaction_stat_block ADD CONSTRAINT FK_873EA9660DA539B FOREIGN KEY (stat_block_id) REFERENCES stat_block (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE stat_block_reaction_stat_block ADD CONSTRAINT FK_873EA966B09A313 FOREIGN KEY (stat_block_reaction_id) REFERENCES stat_block_reaction (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE stat_block_skill_stat_block ADD CONSTRAINT FK_132BFF643814ADA8 FOREIGN KEY (stat_block_skill_id) REFERENCES stat_block_skill (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE stat_block_skill_stat_block ADD CONSTRAINT FK_132BFF6460DA539B FOREIGN KEY (stat_block_id) REFERENCES stat_block (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE sb DROP FOREIGN KEY FK_E67738BE5585C142');
        $this->addSql('ALTER TABLE sbaction_sb DROP FOREIGN KEY FK_FB20EA26A26EB5C8');
        $this->addSql('ALTER TABLE sbaction_sb DROP FOREIGN KEY FK_FB20EA26707F4EA8');
        $this->addSql('ALTER TABLE sbreaction_sb DROP FOREIGN KEY FK_7FD63B2C269864C2');
        $this->addSql('ALTER TABLE sbreaction_sb DROP FOREIGN KEY FK_7FD63B2C707F4EA8');
        $this->addSql('ALTER TABLE sbskill_sb DROP FOREIGN KEY FK_E588BE0ABCC6E1E4');
        $this->addSql('ALTER TABLE sbskill_sb DROP FOREIGN KEY FK_E588BE0A707F4EA8');
        $this->addSql('DROP TABLE sb');
        $this->addSql('DROP TABLE sbaction');
        $this->addSql('DROP TABLE sbaction_sb');
        $this->addSql('DROP TABLE sbreaction');
        $this->addSql('DROP TABLE sbreaction_sb');
        $this->addSql('DROP TABLE sbskill');
        $this->addSql('DROP TABLE sbskill_sb');
    }
}
