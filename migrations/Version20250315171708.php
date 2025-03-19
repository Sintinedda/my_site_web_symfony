<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250315171708 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE specialty_item_table (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(100) DEFAULT NULL, th1 VARCHAR(100) NOT NULL, th2 VARCHAR(100) NOT NULL, tr1_td1 VARCHAR(100) NOT NULL, tr1_td2 VARCHAR(500) NOT NULL, tr2_td1 VARCHAR(100) DEFAULT NULL, tr2_td2 VARCHAR(500) DEFAULT NULL, tr3_td1 VARCHAR(100) DEFAULT NULL, tr3_td2 VARCHAR(500) DEFAULT NULL, tr4_td1 VARCHAR(100) DEFAULT NULL, tr4_td2 VARCHAR(500) DEFAULT NULL, place VARCHAR(50) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE specialty_item_table_specialty_item (specialty_item_table_id INT NOT NULL, specialty_item_id INT NOT NULL, INDEX IDX_F6A8ABF59528A2F (specialty_item_table_id), INDEX IDX_F6A8ABF605A4EC1 (specialty_item_id), PRIMARY KEY(specialty_item_table_id, specialty_item_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE specialty_skill_table (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(100) DEFAULT NULL, th1 VARCHAR(100) NOT NULL, th2 VARCHAR(100) NOT NULL, tr1_td1 VARCHAR(100) NOT NULL, tr1_td2 VARCHAR(500) NOT NULL, tr2_td1 VARCHAR(100) DEFAULT NULL, tr2_td2 VARCHAR(500) DEFAULT NULL, tr3_td1 VARCHAR(100) DEFAULT NULL, tr3_td2 VARCHAR(500) DEFAULT NULL, tr4_td1 VARCHAR(100) DEFAULT NULL, tr4_td2 VARCHAR(500) DEFAULT NULL, tr5_td1 VARCHAR(100) DEFAULT NULL, tr5_td2 VARCHAR(500) DEFAULT NULL, tr6_td1 VARCHAR(100) DEFAULT NULL, tr6_td2 VARCHAR(500) DEFAULT NULL, tr7_td1 VARCHAR(100) DEFAULT NULL, tr7_td2 VARCHAR(500) DEFAULT NULL, tr8_td1 VARCHAR(100) DEFAULT NULL, tr8_td2 VARCHAR(500) DEFAULT NULL, tr9_td1 VARCHAR(100) DEFAULT NULL, tr9_td2 VARCHAR(500) DEFAULT NULL, tr10_td1 VARCHAR(100) DEFAULT NULL, tr10_td2 VARCHAR(500) DEFAULT NULL, tr11_td1 VARCHAR(100) DEFAULT NULL, tr11_td2 VARCHAR(500) DEFAULT NULL, tr12_td1 VARCHAR(100) DEFAULT NULL, tr12_td2 VARCHAR(500) DEFAULT NULL, place VARCHAR(50) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE specialty_skill_table_specialty_skill (specialty_skill_table_id INT NOT NULL, specialty_skill_id INT NOT NULL, INDEX IDX_43EDC96B34DE7A (specialty_skill_table_id), INDEX IDX_43EDC935477A8B (specialty_skill_id), PRIMARY KEY(specialty_skill_table_id, specialty_skill_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE specialty_item_table_specialty_item ADD CONSTRAINT FK_F6A8ABF59528A2F FOREIGN KEY (specialty_item_table_id) REFERENCES specialty_item_table (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE specialty_item_table_specialty_item ADD CONSTRAINT FK_F6A8ABF605A4EC1 FOREIGN KEY (specialty_item_id) REFERENCES specialty_item (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE specialty_skill_table_specialty_skill ADD CONSTRAINT FK_43EDC96B34DE7A FOREIGN KEY (specialty_skill_table_id) REFERENCES specialty_skill_table (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE specialty_skill_table_specialty_skill ADD CONSTRAINT FK_43EDC935477A8B FOREIGN KEY (specialty_skill_id) REFERENCES specialty_skill (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE specialty_item_table_specialty_item DROP FOREIGN KEY FK_F6A8ABF59528A2F');
        $this->addSql('ALTER TABLE specialty_item_table_specialty_item DROP FOREIGN KEY FK_F6A8ABF605A4EC1');
        $this->addSql('ALTER TABLE specialty_skill_table_specialty_skill DROP FOREIGN KEY FK_43EDC96B34DE7A');
        $this->addSql('ALTER TABLE specialty_skill_table_specialty_skill DROP FOREIGN KEY FK_43EDC935477A8B');
        $this->addSql('DROP TABLE specialty_item_table');
        $this->addSql('DROP TABLE specialty_item_table_specialty_item');
        $this->addSql('DROP TABLE specialty_skill_table');
        $this->addSql('DROP TABLE specialty_skill_table_specialty_skill');
    }
}
