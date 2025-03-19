<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250317115758 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE spell_list (id INT AUTO_INCREMENT NOT NULL, place INT NOT NULL, l1 VARCHAR(500) NOT NULL, l2 VARCHAR(500) NOT NULL, l3 VARCHAR(500) DEFAULT NULL, l4 VARCHAR(500) DEFAULT NULL, l5 VARCHAR(500) DEFAULT NULL, l6 VARCHAR(500) DEFAULT NULL, l7 VARCHAR(500) DEFAULT NULL, l8 VARCHAR(500) DEFAULT NULL, l9 VARCHAR(500) DEFAULT NULL, l10 VARCHAR(500) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE spell_list');
    }
}
