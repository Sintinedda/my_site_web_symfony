<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250223114157 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE sub_skill (id INT AUTO_INCREMENT NOT NULL, skill_id INT NOT NULL, title1 VARCHAR(255) NOT NULL, descr_one VARCHAR(1020) NOT NULL, descr_one2 VARCHAR(1020) DEFAULT NULL, UNIQUE INDEX UNIQ_B27980CE5585C142 (skill_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE sub_skill ADD CONSTRAINT FK_B27980CE5585C142 FOREIGN KEY (skill_id) REFERENCES skill (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE sub_skill DROP FOREIGN KEY FK_B27980CE5585C142');
        $this->addSql('DROP TABLE sub_skill');
    }
}
