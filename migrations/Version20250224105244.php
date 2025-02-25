<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250224105244 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE specialty_skill_table ADD tr9_td1 VARCHAR(255) DEFAULT NULL, ADD tr9_td2 VARCHAR(255) DEFAULT NULL, ADD tr10_td1 VARCHAR(255) DEFAULT NULL, ADD tr10_td2 VARCHAR(255) DEFAULT NULL, ADD tr11_td1 VARCHAR(255) DEFAULT NULL, ADD tr11_td2 VARCHAR(255) DEFAULT NULL, ADD tr12_td1 VARCHAR(255) DEFAULT NULL, ADD tr12_td2 VARCHAR(255) DEFAULT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE specialty_skill_table DROP tr9_td1, DROP tr9_td2, DROP tr10_td1, DROP tr10_td2, DROP tr11_td1, DROP tr11_td2, DROP tr12_td1, DROP tr12_td2');
    }
}
