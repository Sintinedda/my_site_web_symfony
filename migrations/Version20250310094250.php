<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250310094250 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE stat_block ADD senss JSON DEFAULT NULL COMMENT \'(DC2Type:json)\', ADD imm_damage JSON DEFAULT NULL COMMENT \'(DC2Type:json)\', ADD imm_state JSON DEFAULT NULL COMMENT \'(DC2Type:json)\', DROP sens, DROP immunity_damage, DROP immunity_condition, DROP pp');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE stat_block ADD sens VARCHAR(255) DEFAULT NULL, ADD immunity_damage VARCHAR(255) DEFAULT NULL, ADD immunity_condition VARCHAR(255) DEFAULT NULL, ADD pp INT NOT NULL, DROP senss, DROP imm_damage, DROP imm_state');
    }
}
