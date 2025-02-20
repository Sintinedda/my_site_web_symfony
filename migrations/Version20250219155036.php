<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250219155036 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE spell_classe (spell_id INT NOT NULL, classe_id INT NOT NULL, INDEX IDX_37264883479EC90D (spell_id), INDEX IDX_372648838F5EA509 (classe_id), PRIMARY KEY(spell_id, classe_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE spell_classe ADD CONSTRAINT FK_37264883479EC90D FOREIGN KEY (spell_id) REFERENCES spell (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE spell_classe ADD CONSTRAINT FK_372648838F5EA509 FOREIGN KEY (classe_id) REFERENCES classe (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE classe_spell DROP FOREIGN KEY FK_994899B5479EC90D');
        $this->addSql('ALTER TABLE classe_spell DROP FOREIGN KEY FK_994899B58F5EA509');
        $this->addSql('DROP TABLE classe_spell');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE classe_spell (classe_id INT NOT NULL, spell_id INT NOT NULL, INDEX IDX_994899B58F5EA509 (classe_id), INDEX IDX_994899B5479EC90D (spell_id), PRIMARY KEY(classe_id, spell_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE classe_spell ADD CONSTRAINT FK_994899B5479EC90D FOREIGN KEY (spell_id) REFERENCES spell (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE classe_spell ADD CONSTRAINT FK_994899B58F5EA509 FOREIGN KEY (classe_id) REFERENCES classe (id)');
        $this->addSql('ALTER TABLE spell_classe DROP FOREIGN KEY FK_37264883479EC90D');
        $this->addSql('ALTER TABLE spell_classe DROP FOREIGN KEY FK_372648838F5EA509');
        $this->addSql('DROP TABLE spell_classe');
    }
}
