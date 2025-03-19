<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250319111547 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE part_specialty_item (part_id INT NOT NULL, specialty_item_id INT NOT NULL, INDEX IDX_CF1494D64CE34BEC (part_id), INDEX IDX_CF1494D6605A4EC1 (specialty_item_id), PRIMARY KEY(part_id, specialty_item_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE part_specialty_item ADD CONSTRAINT FK_CF1494D64CE34BEC FOREIGN KEY (part_id) REFERENCES part (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE part_specialty_item ADD CONSTRAINT FK_CF1494D6605A4EC1 FOREIGN KEY (specialty_item_id) REFERENCES specialty_item (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE sb ADD source_part_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE sb ADD CONSTRAINT FK_E67738BE53CF384 FOREIGN KEY (source_part_id) REFERENCES part (id)');
        $this->addSql('CREATE INDEX IDX_E67738BE53CF384 ON sb (source_part_id)');
        $this->addSql('ALTER TABLE source_race ADD source_part_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE source_race ADD CONSTRAINT FK_DBE53EAC53CF384 FOREIGN KEY (source_part_id) REFERENCES part (id)');
        $this->addSql('CREATE INDEX IDX_DBE53EAC53CF384 ON source_race (source_part_id)');
        $this->addSql('ALTER TABLE spell ADD source_part_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE spell ADD CONSTRAINT FK_D03FCD8D53CF384 FOREIGN KEY (source_part_id) REFERENCES part (id)');
        $this->addSql('CREATE INDEX IDX_D03FCD8D53CF384 ON spell (source_part_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE part_specialty_item DROP FOREIGN KEY FK_CF1494D64CE34BEC');
        $this->addSql('ALTER TABLE part_specialty_item DROP FOREIGN KEY FK_CF1494D6605A4EC1');
        $this->addSql('DROP TABLE part_specialty_item');
        $this->addSql('ALTER TABLE sb DROP FOREIGN KEY FK_E67738BE53CF384');
        $this->addSql('DROP INDEX IDX_E67738BE53CF384 ON sb');
        $this->addSql('ALTER TABLE sb DROP source_part_id');
        $this->addSql('ALTER TABLE source_race DROP FOREIGN KEY FK_DBE53EAC53CF384');
        $this->addSql('DROP INDEX IDX_DBE53EAC53CF384 ON source_race');
        $this->addSql('ALTER TABLE source_race DROP source_part_id');
        $this->addSql('ALTER TABLE spell DROP FOREIGN KEY FK_D03FCD8D53CF384');
        $this->addSql('DROP INDEX IDX_D03FCD8D53CF384 ON spell');
        $this->addSql('ALTER TABLE spell DROP source_part_id');
    }
}
