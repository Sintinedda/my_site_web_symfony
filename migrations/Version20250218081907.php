<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250218081907 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE classe CHANGE equipment equipment VARCHAR(510) NOT NULL');
        $this->addSql('ALTER TABLE classe_spell DROP FOREIGN KEY FK_994899B58F5EA509');
        $this->addSql('ALTER TABLE classe_spell ADD CONSTRAINT FK_994899B58F5EA509 FOREIGN KEY (classe_id) REFERENCES classe (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE classe CHANGE equipment equipment VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE classe_spell DROP FOREIGN KEY FK_994899B58F5EA509');
        $this->addSql('ALTER TABLE classe_spell ADD CONSTRAINT FK_994899B58F5EA509 FOREIGN KEY (classe_id) REFERENCES classe (id) ON DELETE CASCADE');
    }
}
