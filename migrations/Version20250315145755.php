<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250315145755 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE specialty_skill_table_specialty_skill (specialty_skill_table_id INT NOT NULL, specialty_skill_id INT NOT NULL, INDEX IDX_43EDC96B34DE7A (specialty_skill_table_id), INDEX IDX_43EDC935477A8B (specialty_skill_id), PRIMARY KEY(specialty_skill_table_id, specialty_skill_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE specialty_skill_table_specialty_skill ADD CONSTRAINT FK_43EDC96B34DE7A FOREIGN KEY (specialty_skill_table_id) REFERENCES specialty_skill_table (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE specialty_skill_table_specialty_skill ADD CONSTRAINT FK_43EDC935477A8B FOREIGN KEY (specialty_skill_id) REFERENCES specialty_skill (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE specialty_skill_mtable_specialty_skill DROP FOREIGN KEY FK_973E76D41072CB63');
        $this->addSql('ALTER TABLE specialty_skill_mtable_specialty_skill DROP FOREIGN KEY FK_973E76D435477A8B');
        $this->addSql('DROP TABLE specialty_skill_mtable');
        $this->addSql('DROP TABLE specialty_skill_mtable_specialty_skill');
        $this->addSql('ALTER TABLE specialty_skill_table DROP FOREIGN KEY FK_3F24653A35477A8B');
        $this->addSql('DROP INDEX UNIQ_3F24653A35477A8B ON specialty_skill_table');
        $this->addSql('ALTER TABLE specialty_skill_table CHANGE specialty_skill_id number INT NOT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE specialty_skill_mtable (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(100) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, th1 VARCHAR(100) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, th2 VARCHAR(100) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, tr1_td1 VARCHAR(100) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, tr1_td2 VARCHAR(100) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, tr2_td1 VARCHAR(100) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, tr2_td2 VARCHAR(100) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, tr3_td1 VARCHAR(100) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, tr3_td2 VARCHAR(100) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, tr4_td1 VARCHAR(100) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, tr4_td2 VARCHAR(100) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE specialty_skill_mtable_specialty_skill (specialty_skill_mtable_id INT NOT NULL, specialty_skill_id INT NOT NULL, INDEX IDX_973E76D41072CB63 (specialty_skill_mtable_id), INDEX IDX_973E76D435477A8B (specialty_skill_id), PRIMARY KEY(specialty_skill_mtable_id, specialty_skill_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE specialty_skill_mtable_specialty_skill ADD CONSTRAINT FK_973E76D41072CB63 FOREIGN KEY (specialty_skill_mtable_id) REFERENCES specialty_skill_mtable (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE specialty_skill_mtable_specialty_skill ADD CONSTRAINT FK_973E76D435477A8B FOREIGN KEY (specialty_skill_id) REFERENCES specialty_skill (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE specialty_skill_table_specialty_skill DROP FOREIGN KEY FK_43EDC96B34DE7A');
        $this->addSql('ALTER TABLE specialty_skill_table_specialty_skill DROP FOREIGN KEY FK_43EDC935477A8B');
        $this->addSql('DROP TABLE specialty_skill_table_specialty_skill');
        $this->addSql('ALTER TABLE specialty_skill_table CHANGE number specialty_skill_id INT NOT NULL');
        $this->addSql('ALTER TABLE specialty_skill_table ADD CONSTRAINT FK_3F24653A35477A8B FOREIGN KEY (specialty_skill_id) REFERENCES specialty_skill (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_3F24653A35477A8B ON specialty_skill_table (specialty_skill_id)');
    }
}
