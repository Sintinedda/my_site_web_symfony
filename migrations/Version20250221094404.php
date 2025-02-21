<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250221094404 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE specialty (id INT AUTO_INCREMENT NOT NULL, classe_id INT DEFAULT NULL, name VARCHAR(255) NOT NULL, descr1 VARCHAR(1020) NOT NULL, UNIQUE INDEX UNIQ_E066A6EC8F5EA509 (classe_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE specialty_item (id INT AUTO_INCREMENT NOT NULL, specialty_id INT DEFAULT NULL, name VARCHAR(255) NOT NULL, descr1 VARCHAR(1020) NOT NULL, INDEX IDX_D53E7D7C9A353316 (specialty_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE specialty_skill (id INT AUTO_INCREMENT NOT NULL, specialty_id INT DEFAULT NULL, name VARCHAR(255) NOT NULL, descr1 VARCHAR(1020) NOT NULL, INDEX IDX_FD4BC15B9A353316 (specialty_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE specialty ADD CONSTRAINT FK_E066A6EC8F5EA509 FOREIGN KEY (classe_id) REFERENCES classe (id)');
        $this->addSql('ALTER TABLE specialty_item ADD CONSTRAINT FK_D53E7D7C9A353316 FOREIGN KEY (specialty_id) REFERENCES specialty (id)');
        $this->addSql('ALTER TABLE specialty_skill ADD CONSTRAINT FK_FD4BC15B9A353316 FOREIGN KEY (specialty_id) REFERENCES specialty_item (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE specialty DROP FOREIGN KEY FK_E066A6EC8F5EA509');
        $this->addSql('ALTER TABLE specialty_item DROP FOREIGN KEY FK_D53E7D7C9A353316');
        $this->addSql('ALTER TABLE specialty_skill DROP FOREIGN KEY FK_FD4BC15B9A353316');
        $this->addSql('DROP TABLE specialty');
        $this->addSql('DROP TABLE specialty_item');
        $this->addSql('DROP TABLE specialty_skill');
    }
}
