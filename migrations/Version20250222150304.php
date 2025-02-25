<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250222150304 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE specialty_skill_table (id INT AUTO_INCREMENT NOT NULL, specialty_skill_id INT NOT NULL, name VARCHAR(255) NOT NULL, th1 VARCHAR(255) NOT NULL, th2 VARCHAR(255) NOT NULL, tr1_td1 VARCHAR(255) NOT NULL, tr1_td2 VARCHAR(255) NOT NULL, tr2_td1 VARCHAR(255) DEFAULT NULL, tr2_td2 VARCHAR(255) DEFAULT NULL, tr3_td1 VARCHAR(255) DEFAULT NULL, tr3_td2 VARCHAR(255) DEFAULT NULL, tr4_td1 VARCHAR(255) DEFAULT NULL, tr4_td2 VARCHAR(255) DEFAULT NULL, tr5_td1 VARCHAR(255) DEFAULT NULL, tr5_td2 VARCHAR(255) DEFAULT NULL, tr6_td1 VARCHAR(255) DEFAULT NULL, tr6_td2 VARCHAR(255) DEFAULT NULL, tr7_td1 VARCHAR(255) DEFAULT NULL, tr7_td2 VARCHAR(255) DEFAULT NULL, tr8_td1 VARCHAR(255) DEFAULT NULL, tr8_td2 VARCHAR(255) DEFAULT NULL, UNIQUE INDEX UNIQ_3F24653A35477A8B (specialty_skill_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE specialty_skill_table ADD CONSTRAINT FK_3F24653A35477A8B FOREIGN KEY (specialty_skill_id) REFERENCES specialty_skill (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE specialty_skill_table DROP FOREIGN KEY FK_3F24653A35477A8B');
        $this->addSql('DROP TABLE specialty_skill_table');
    }
}
