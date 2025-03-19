<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250317101618 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE spell_table (id INT AUTO_INCREMENT NOT NULL, spell_id INT NOT NULL, name VARCHAR(100) DEFAULT NULL, show_name TINYINT(1) NOT NULL, number INT NOT NULL, th1 VARCHAR(100) NOT NULL, th2 VARCHAR(100) NOT NULL, th3 VARCHAR(100) DEFAULT NULL, th4 VARCHAR(100) DEFAULT NULL, th5 VARCHAR(100) DEFAULT NULL, th6 VARCHAR(100) DEFAULT NULL, tr1_td1 VARCHAR(255) NOT NULL, tr1_td2 VARCHAR(255) NOT NULL, tr1_td3 VARCHAR(255) DEFAULT NULL, tr1_td4 VARCHAR(255) DEFAULT NULL, tr1_td5 VARCHAR(255) DEFAULT NULL, tr1_td6 VARCHAR(255) DEFAULT NULL, tr2_td1 VARCHAR(255) DEFAULT NULL, tr2_td2 VARCHAR(255) DEFAULT NULL, tr2_td3 VARCHAR(255) DEFAULT NULL, tr2_td4 VARCHAR(255) DEFAULT NULL, tr2_td5 VARCHAR(255) DEFAULT NULL, tr2_td6 VARCHAR(255) DEFAULT NULL, tr3_td1 VARCHAR(255) DEFAULT NULL, tr3_td2 VARCHAR(255) DEFAULT NULL, tr3_td3 VARCHAR(255) DEFAULT NULL, tr3_td4 VARCHAR(255) DEFAULT NULL, tr3_td5 VARCHAR(255) DEFAULT NULL, tr3_td6 VARCHAR(255) DEFAULT NULL, tr4_td1 VARCHAR(255) DEFAULT NULL, tr4_td2 VARCHAR(255) DEFAULT NULL, tr4_td3 VARCHAR(255) DEFAULT NULL, tr4_td4 VARCHAR(255) DEFAULT NULL, tr4_td5 VARCHAR(255) DEFAULT NULL, tr4_td6 VARCHAR(255) DEFAULT NULL, tr5_td1 VARCHAR(255) DEFAULT NULL, tr5_td2 VARCHAR(255) DEFAULT NULL, tr5_td3 VARCHAR(255) DEFAULT NULL, tr5_td4 VARCHAR(255) DEFAULT NULL, tr5_td5 VARCHAR(255) DEFAULT NULL, tr5_td6 VARCHAR(255) DEFAULT NULL, place INT NOT NULL, INDEX IDX_EA7B9571479EC90D (spell_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE spell_table ADD CONSTRAINT FK_EA7B9571479EC90D FOREIGN KEY (spell_id) REFERENCES spell (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE spell_table DROP FOREIGN KEY FK_EA7B9571479EC90D');
        $this->addSql('DROP TABLE spell_table');
    }
}
