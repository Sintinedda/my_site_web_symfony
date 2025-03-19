<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250314093508 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE action_part_monster (id INT AUTO_INCREMENT NOT NULL, action_id INT NOT NULL, monster_id INT NOT NULL, descr VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_3870E5DF9D32F035 (action_id), UNIQUE INDEX UNIQ_3870E5DFC5FF1223 (monster_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE action_part_monster ADD CONSTRAINT FK_3870E5DF9D32F035 FOREIGN KEY (action_id) REFERENCES sbaction (id)');
        $this->addSql('ALTER TABLE action_part_monster ADD CONSTRAINT FK_3870E5DFC5FF1223 FOREIGN KEY (monster_id) REFERENCES sb (id)');
        $this->addSql('ALTER TABLE sb ADD spe_cac VARCHAR(255) DEFAULT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE action_part_monster DROP FOREIGN KEY FK_3870E5DF9D32F035');
        $this->addSql('ALTER TABLE action_part_monster DROP FOREIGN KEY FK_3870E5DFC5FF1223');
        $this->addSql('DROP TABLE action_part_monster');
        $this->addSql('ALTER TABLE sb DROP spe_cac');
    }
}
