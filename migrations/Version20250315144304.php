<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250315144304 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE specialty_skill_mtable (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(100) NOT NULL, th1 VARCHAR(100) NOT NULL, th2 VARCHAR(100) NOT NULL, tr1_td1 VARCHAR(100) NOT NULL, tr1_td2 VARCHAR(100) NOT NULL, tr2_td1 VARCHAR(100) DEFAULT NULL, tr2_td2 VARCHAR(100) DEFAULT NULL, tr3_td1 VARCHAR(100) DEFAULT NULL, tr3_td2 VARCHAR(100) DEFAULT NULL, tr4_td1 VARCHAR(100) DEFAULT NULL, tr4_td2 VARCHAR(100) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE specialty_skill_mtable_specialty_skill (specialty_skill_mtable_id INT NOT NULL, specialty_skill_id INT NOT NULL, INDEX IDX_973E76D41072CB63 (specialty_skill_mtable_id), INDEX IDX_973E76D435477A8B (specialty_skill_id), PRIMARY KEY(specialty_skill_mtable_id, specialty_skill_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE specialty_skill_mtable_specialty_skill ADD CONSTRAINT FK_973E76D41072CB63 FOREIGN KEY (specialty_skill_mtable_id) REFERENCES specialty_skill_mtable (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE specialty_skill_mtable_specialty_skill ADD CONSTRAINT FK_973E76D435477A8B FOREIGN KEY (specialty_skill_id) REFERENCES specialty_skill (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE specialty_skill_mtable_specialty_skill DROP FOREIGN KEY FK_973E76D41072CB63');
        $this->addSql('ALTER TABLE specialty_skill_mtable_specialty_skill DROP FOREIGN KEY FK_973E76D435477A8B');
        $this->addSql('DROP TABLE specialty_skill_mtable');
        $this->addSql('DROP TABLE specialty_skill_mtable_specialty_skill');
    }
}
