<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250315095119 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE action_part_monster DROP FOREIGN KEY FK_3870E5DFC5FF1223');
        $this->addSql('ALTER TABLE action_part_monster DROP FOREIGN KEY FK_3870E5DF9D32F035');
        $this->addSql('DROP INDEX UNIQ_3870E5DFC5FF1223 ON action_part_monster');
        $this->addSql('DROP INDEX UNIQ_3870E5DF9D32F035 ON action_part_monster');
        $this->addSql('ALTER TABLE action_part_monster DROP action_id, DROP monster_id');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE action_part_monster ADD action_id INT NOT NULL, ADD monster_id INT NOT NULL');
        $this->addSql('ALTER TABLE action_part_monster ADD CONSTRAINT FK_3870E5DFC5FF1223 FOREIGN KEY (monster_id) REFERENCES sb (id)');
        $this->addSql('ALTER TABLE action_part_monster ADD CONSTRAINT FK_3870E5DF9D32F035 FOREIGN KEY (action_id) REFERENCES sbaction (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_3870E5DFC5FF1223 ON action_part_monster (monster_id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_3870E5DF9D32F035 ON action_part_monster (action_id)');
    }
}
