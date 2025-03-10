<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250310084949 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE stat_block ADD touch_weapon_cac VARCHAR(100) DEFAULT NULL, ADD range_weapon_cac VARCHAR(100) DEFAULT NULL, ADD damage_weapon_cac VARCHAR(100) DEFAULT NULL');
        $this->addSql('ALTER TABLE stat_block_action ADD type VARCHAR(100) DEFAULT NULL, CHANGE descr descr VARCHAR(1020) DEFAULT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE stat_block DROP touch_weapon_cac, DROP range_weapon_cac, DROP damage_weapon_cac');
        $this->addSql('ALTER TABLE stat_block_action DROP type, CHANGE descr descr VARCHAR(1020) NOT NULL');
    }
}
