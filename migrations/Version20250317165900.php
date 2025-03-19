<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250317165900 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE specialty_skill_list (id INT AUTO_INCREMENT NOT NULL, skill_id INT NOT NULL, number INT NOT NULL, place INT NOT NULL, l1 VARCHAR(600) NOT NULL, l2 VARCHAR(600) DEFAULT NULL, l3 VARCHAR(600) DEFAULT NULL, l4 VARCHAR(600) DEFAULT NULL, l5 VARCHAR(600) DEFAULT NULL, INDEX IDX_4502026B5585C142 (skill_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE specialty_skill_list ADD CONSTRAINT FK_4502026B5585C142 FOREIGN KEY (skill_id) REFERENCES specialty_skill (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE specialty_skill_list DROP FOREIGN KEY FK_4502026B5585C142');
        $this->addSql('DROP TABLE specialty_skill_list');
    }
}
