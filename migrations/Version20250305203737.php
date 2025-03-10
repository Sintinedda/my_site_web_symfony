<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250305203737 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE spell ADD descr11 VARCHAR(1000) DEFAULT NULL, ADD descr12 VARCHAR(1000) DEFAULT NULL, ADD descr13 VARCHAR(1000) DEFAULT NULL, CHANGE name_fr name_fr VARCHAR(100) NOT NULL, CHANGE name_eng name_eng VARCHAR(100) NOT NULL, CHANGE slug slug VARCHAR(100) NOT NULL, CHANGE casting_time casting_time VARCHAR(100) NOT NULL, CHANGE range_effect range_effect VARCHAR(100) NOT NULL, CHANGE components components VARCHAR(100) NOT NULL, CHANGE components_ingredients components_ingredients VARCHAR(250) DEFAULT NULL, CHANGE duration duration VARCHAR(100) NOT NULL, CHANGE upper_level upper_level VARCHAR(1000) DEFAULT NULL, CHANGE source source VARCHAR(100) NOT NULL, CHANGE descr1 descr1 VARCHAR(1000) NOT NULL, CHANGE descr2 descr2 VARCHAR(1000) DEFAULT NULL, CHANGE descr3 descr3 VARCHAR(1000) DEFAULT NULL, CHANGE descr4 descr4 VARCHAR(1000) DEFAULT NULL, CHANGE descr5 descr5 VARCHAR(1000) DEFAULT NULL, CHANGE descr6 descr6 VARCHAR(1000) DEFAULT NULL, CHANGE descr7 descr7 VARCHAR(1000) DEFAULT NULL, CHANGE descr8 descr8 VARCHAR(1000) DEFAULT NULL, CHANGE descr9 descr9 VARCHAR(1000) DEFAULT NULL, CHANGE descr10 descr10 VARCHAR(1000) DEFAULT NULL, CHANGE short_descr short_descr VARCHAR(250) NOT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE spell DROP descr11, DROP descr12, DROP descr13, CHANGE name_fr name_fr VARCHAR(255) NOT NULL, CHANGE name_eng name_eng VARCHAR(255) NOT NULL, CHANGE casting_time casting_time VARCHAR(255) NOT NULL, CHANGE range_effect range_effect VARCHAR(255) NOT NULL, CHANGE components components VARCHAR(255) NOT NULL, CHANGE components_ingredients components_ingredients VARCHAR(255) DEFAULT NULL, CHANGE duration duration VARCHAR(255) NOT NULL, CHANGE descr1 descr1 VARCHAR(1050) NOT NULL, CHANGE upper_level upper_level VARCHAR(1050) DEFAULT NULL, CHANGE source source VARCHAR(255) NOT NULL, CHANGE descr2 descr2 VARCHAR(1050) DEFAULT NULL, CHANGE descr3 descr3 VARCHAR(1050) DEFAULT NULL, CHANGE descr4 descr4 VARCHAR(1050) DEFAULT NULL, CHANGE descr5 descr5 VARCHAR(1050) DEFAULT NULL, CHANGE descr6 descr6 VARCHAR(1050) DEFAULT NULL, CHANGE descr7 descr7 VARCHAR(1050) DEFAULT NULL, CHANGE descr8 descr8 VARCHAR(1050) DEFAULT NULL, CHANGE descr9 descr9 VARCHAR(1050) DEFAULT NULL, CHANGE descr10 descr10 VARCHAR(1050) DEFAULT NULL, CHANGE slug slug VARCHAR(255) NOT NULL, CHANGE short_descr short_descr VARCHAR(500) NOT NULL');
    }
}
