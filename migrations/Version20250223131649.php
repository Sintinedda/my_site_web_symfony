<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250223131649 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE spell ADD school_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE spell ADD CONSTRAINT FK_D03FCD8DC32A47EE FOREIGN KEY (school_id) REFERENCES spell_school (id)');
        $this->addSql('CREATE INDEX IDX_D03FCD8DC32A47EE ON spell (school_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE spell DROP FOREIGN KEY FK_D03FCD8DC32A47EE');
        $this->addSql('DROP INDEX IDX_D03FCD8DC32A47EE ON spell');
        $this->addSql('ALTER TABLE spell DROP school_id');
    }
}
