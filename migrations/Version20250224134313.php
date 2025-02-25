<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250224134313 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE specialty_item_specialty (specialty_item_id INT NOT NULL, specialty_id INT NOT NULL, INDEX IDX_29DF2BC8605A4EC1 (specialty_item_id), INDEX IDX_29DF2BC89A353316 (specialty_id), PRIMARY KEY(specialty_item_id, specialty_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE specialty_item_specialty ADD CONSTRAINT FK_29DF2BC8605A4EC1 FOREIGN KEY (specialty_item_id) REFERENCES specialty_item (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE specialty_item_specialty ADD CONSTRAINT FK_29DF2BC89A353316 FOREIGN KEY (specialty_id) REFERENCES specialty (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE specialty_item DROP FOREIGN KEY FK_D53E7D7C9A353316');
        $this->addSql('DROP INDEX IDX_D53E7D7C9A353316 ON specialty_item');
        $this->addSql('ALTER TABLE specialty_item DROP specialty_id');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE specialty_item_specialty DROP FOREIGN KEY FK_29DF2BC8605A4EC1');
        $this->addSql('ALTER TABLE specialty_item_specialty DROP FOREIGN KEY FK_29DF2BC89A353316');
        $this->addSql('DROP TABLE specialty_item_specialty');
        $this->addSql('ALTER TABLE specialty_item ADD specialty_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE specialty_item ADD CONSTRAINT FK_D53E7D7C9A353316 FOREIGN KEY (specialty_id) REFERENCES specialty (id)');
        $this->addSql('CREATE INDEX IDX_D53E7D7C9A353316 ON specialty_item (specialty_id)');
    }
}
