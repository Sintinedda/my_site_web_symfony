<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250306103945 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE domain_spell_table DROP th1, DROP th2, DROP tr1_td1, DROP tr2_td1, DROP tr3_td1, DROP tr4_td1, DROP tr5_td1');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE domain_spell_table ADD th1 VARCHAR(100) NOT NULL, ADD th2 VARCHAR(100) NOT NULL, ADD tr1_td1 VARCHAR(100) NOT NULL, ADD tr2_td1 VARCHAR(100) NOT NULL, ADD tr3_td1 VARCHAR(100) NOT NULL, ADD tr4_td1 VARCHAR(100) NOT NULL, ADD tr5_td1 VARCHAR(100) NOT NULL');
    }
}
