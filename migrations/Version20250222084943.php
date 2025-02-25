<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250222084943 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE classe ADD rage TINYINT(1) NOT NULL, ADD damage TINYINT(1) NOT NULL, ADD cantrip TINYINT(1) NOT NULL, ADD knowing_spells TINYINT(1) NOT NULL, ADD spell TINYINT(1) NOT NULL, ADD sorcery_point TINYINT(1) NOT NULL, ADD martial_art TINYINT(1) NOT NULL, ADD ki TINYINT(1) NOT NULL, ADD movement_without_armor TINYINT(1) NOT NULL, ADD slot_space TINYINT(1) NOT NULL, ADD slot_level TINYINT(1) NOT NULL, ADD invocation_know TINYINT(1) NOT NULL, ADD sneak_attack TINYINT(1) NOT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE classe DROP rage, DROP damage, DROP cantrip, DROP knowing_spells, DROP spell, DROP sorcery_point, DROP martial_art, DROP ki, DROP movement_without_armor, DROP slot_space, DROP slot_level, DROP invocation_know, DROP sneak_attack');
    }
}
