<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250317164619 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE spell_table ADD tr6_td1 VARCHAR(600) DEFAULT NULL, ADD tr6_td2 VARCHAR(600) DEFAULT NULL, ADD tr6_td3 VARCHAR(600) DEFAULT NULL, ADD tr6_td4 VARCHAR(600) DEFAULT NULL, ADD tr6_td5 VARCHAR(600) DEFAULT NULL, ADD tr6_td6 VARCHAR(600) DEFAULT NULL, ADD tr7_td1 VARCHAR(600) DEFAULT NULL, ADD tr7_td2 VARCHAR(600) DEFAULT NULL, ADD tr7_td3 VARCHAR(600) DEFAULT NULL, ADD tr7_td4 VARCHAR(600) DEFAULT NULL, ADD tr7_td5 VARCHAR(600) DEFAULT NULL, ADD tr7_td6 VARCHAR(600) DEFAULT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE spell_table DROP tr6_td1, DROP tr6_td2, DROP tr6_td3, DROP tr6_td4, DROP tr6_td5, DROP tr6_td6, DROP tr7_td1, DROP tr7_td2, DROP tr7_td3, DROP tr7_td4, DROP tr7_td5, DROP tr7_td6');
    }
}
