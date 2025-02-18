<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250218141552 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE classe ADD equipment1 VARCHAR(255) NOT NULL, ADD equipment2 VARCHAR(255) DEFAULT NULL, ADD equipment3 VARCHAR(255) DEFAULT NULL, ADD equipment4 VARCHAR(255) DEFAULT NULL, ADD equipment5 VARCHAR(255) DEFAULT NULL, DROP equipment, CHANGE dv dv INT NOT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE classe ADD equipment VARCHAR(510) NOT NULL, DROP equipment1, DROP equipment2, DROP equipment3, DROP equipment4, DROP equipment5, CHANGE dv dv VARCHAR(255) NOT NULL');
    }
}
