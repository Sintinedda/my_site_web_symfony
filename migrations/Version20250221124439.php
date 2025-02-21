<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250221124439 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE incantation (id INT AUTO_INCREMENT NOT NULL, classe_id INT NOT NULL, descr VARCHAR(1020) NOT NULL, title1 VARCHAR(255) NOT NULL, descr_one1 VARCHAR(1020) NOT NULL, title2 VARCHAR(255) NOT NULL, descr_two1 VARCHAR(1020) NOT NULL, descr_two2 VARCHAR(1020) DEFAULT NULL, desc_two3 VARCHAR(1020) DEFAULT NULL, title3 VARCHAR(255) DEFAULT NULL, descr_three1 VARCHAR(1020) DEFAULT NULL, title4 VARCHAR(255) NOT NULL, descr_four1 VARCHAR(1020) NOT NULL, capacity VARCHAR(255) NOT NULL, title5 VARCHAR(255) NOT NULL, descr_five1 VARCHAR(1020) NOT NULL, title6 VARCHAR(255) NOT NULL, descr_six1 VARCHAR(1020) NOT NULL, UNIQUE INDEX UNIQ_F2C3EA178F5EA509 (classe_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE incantation ADD CONSTRAINT FK_F2C3EA178F5EA509 FOREIGN KEY (classe_id) REFERENCES classe (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE incantation DROP FOREIGN KEY FK_F2C3EA178F5EA509');
        $this->addSql('DROP TABLE incantation');
    }
}
