<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250219160106 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE spell ADD descr3 VARCHAR(1050) DEFAULT NULL, ADD descr4 VARCHAR(1050) DEFAULT NULL, ADD descr5 VARCHAR(1050) DEFAULT NULL, ADD descr6 VARCHAR(1050) DEFAULT NULL, ADD descr7 VARCHAR(1050) DEFAULT NULL, ADD descr8 VARCHAR(1050) DEFAULT NULL, ADD descr9 VARCHAR(1050) DEFAULT NULL, ADD descr10 VARCHAR(1050) DEFAULT NULL, CHANGE descr1 descr1 VARCHAR(1050) NOT NULL, CHANGE descr2 descr2 VARCHAR(1050) DEFAULT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE spell DROP descr3, DROP descr4, DROP descr5, DROP descr6, DROP descr7, DROP descr8, DROP descr9, DROP descr10, CHANGE descr1 descr1 VARCHAR(2040) NOT NULL, CHANGE descr2 descr2 VARCHAR(2040) DEFAULT NULL');
    }
}
