<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250305171647 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE domain_spell_table ADD domain_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE domain_spell_table ADD CONSTRAINT FK_EC5CA272115F0EE5 FOREIGN KEY (domain_id) REFERENCES specialty_item (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_EC5CA272115F0EE5 ON domain_spell_table (domain_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE domain_spell_table DROP FOREIGN KEY FK_EC5CA272115F0EE5');
        $this->addSql('DROP INDEX UNIQ_EC5CA272115F0EE5 ON domain_spell_table');
        $this->addSql('ALTER TABLE domain_spell_table DROP domain_id');
    }
}
