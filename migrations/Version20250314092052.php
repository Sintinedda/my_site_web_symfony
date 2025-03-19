<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250314092052 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE sb DROP target_cac, DROP target_range, CHANGE nom nom VARCHAR(100) NOT NULL, CHANGE slug slug VARCHAR(100) NOT NULL, CHANGE name name VARCHAR(100) NOT NULL, CHANGE category category VARCHAR(100) NOT NULL, CHANGE type type VARCHAR(100) NOT NULL, CHANGE type2 type2 VARCHAR(100) DEFAULT NULL, CHANGE armor armor VARCHAR(100) DEFAULT NULL, CHANGE speed speed VARCHAR(100) NOT NULL, CHANGE save save VARCHAR(100) DEFAULT NULL, CHANGE comp comp VARCHAR(100) DEFAULT NULL, CHANGE bm bm VARCHAR(100) DEFAULT NULL, CHANGE touch_cac touch_cac VARCHAR(200) DEFAULT NULL, CHANGE range_cac range_cac VARCHAR(200) DEFAULT NULL, CHANGE damage_cac damage_cac VARCHAR(200) DEFAULT NULL, CHANGE touch_range touch_range VARCHAR(200) DEFAULT NULL, CHANGE range_range range_range VARCHAR(200) DEFAULT NULL, CHANGE damage_range damage_range VARCHAR(200) DEFAULT NULL, CHANGE align align VARCHAR(100) DEFAULT NULL, CHANGE language language VARCHAR(100) DEFAULT NULL, CHANGE source source VARCHAR(100) NOT NULL, CHANGE pp2 pp2 VARCHAR(100) DEFAULT NULL');
        $this->addSql('ALTER TABLE sbaction ADD target VARCHAR(100) DEFAULT NULL, ADD part VARCHAR(50) DEFAULT NULL, ADD part_descr VARCHAR(255) DEFAULT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE sb ADD target_cac VARCHAR(50) DEFAULT NULL, ADD target_range VARCHAR(50) DEFAULT NULL, CHANGE nom nom VARCHAR(50) NOT NULL, CHANGE slug slug VARCHAR(50) NOT NULL, CHANGE name name VARCHAR(50) NOT NULL, CHANGE category category VARCHAR(50) NOT NULL, CHANGE type type VARCHAR(50) NOT NULL, CHANGE type2 type2 VARCHAR(50) DEFAULT NULL, CHANGE armor armor VARCHAR(50) DEFAULT NULL, CHANGE speed speed VARCHAR(50) NOT NULL, CHANGE save save VARCHAR(50) DEFAULT NULL, CHANGE comp comp VARCHAR(50) DEFAULT NULL, CHANGE bm bm VARCHAR(50) DEFAULT NULL, CHANGE touch_cac touch_cac VARCHAR(50) DEFAULT NULL, CHANGE range_cac range_cac VARCHAR(50) DEFAULT NULL, CHANGE damage_cac damage_cac VARCHAR(50) DEFAULT NULL, CHANGE touch_range touch_range VARCHAR(50) DEFAULT NULL, CHANGE range_range range_range VARCHAR(50) DEFAULT NULL, CHANGE damage_range damage_range VARCHAR(50) DEFAULT NULL, CHANGE align align VARCHAR(50) DEFAULT NULL, CHANGE language language VARCHAR(50) DEFAULT NULL, CHANGE source source VARCHAR(50) NOT NULL, CHANGE pp2 pp2 VARCHAR(50) DEFAULT NULL');
        $this->addSql('ALTER TABLE sbaction DROP target, DROP part, DROP part_descr');
    }
}
