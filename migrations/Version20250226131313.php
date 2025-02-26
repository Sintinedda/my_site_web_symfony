<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250226131313 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE talent_table (id INT AUTO_INCREMENT NOT NULL, talent_id INT DEFAULT NULL, name VARCHAR(100) DEFAULT NULL, th1 VARCHAR(100) NOT NULL, th2 VARCHAR(100) NOT NULL, th3 VARCHAR(100) DEFAULT NULL, tr1_td1 VARCHAR(100) NOT NULL, tr1_td2 VARCHAR(255) NOT NULL, tr1_td3 VARCHAR(255) DEFAULT NULL, tr2_td1 VARCHAR(100) DEFAULT NULL, tr2_td2 VARCHAR(255) DEFAULT NULL, tr2_td3 VARCHAR(255) DEFAULT NULL, tr3_td1 VARCHAR(100) DEFAULT NULL, tr3_td2 VARCHAR(255) DEFAULT NULL, tr3_td3 VARCHAR(255) DEFAULT NULL, tr4_td1 VARCHAR(255) DEFAULT NULL, tr4_td2 VARCHAR(255) DEFAULT NULL, tr4_td3 VARCHAR(255) DEFAULT NULL, tr5_td1 VARCHAR(100) DEFAULT NULL, tr5_td2 VARCHAR(255) DEFAULT NULL, tr5_td3 VARCHAR(255) DEFAULT NULL, tr6_td1 VARCHAR(100) DEFAULT NULL, tr6_td2 VARCHAR(255) DEFAULT NULL, tr6_td3 VARCHAR(255) DEFAULT NULL, tr7_td1 VARCHAR(100) DEFAULT NULL, tr7_td2 VARCHAR(255) DEFAULT NULL, tr7_td3 VARCHAR(255) DEFAULT NULL, tr8_td1 VARCHAR(100) DEFAULT NULL, tr8_td2 VARCHAR(255) DEFAULT NULL, tr8_td3 VARCHAR(255) DEFAULT NULL, tr9_td1 VARCHAR(100) DEFAULT NULL, tr9_td2 VARCHAR(255) DEFAULT NULL, tr9_td3 VARCHAR(255) DEFAULT NULL, tr10_td1 VARCHAR(100) DEFAULT NULL, tr10_td2 VARCHAR(255) DEFAULT NULL, tr10_td3 VARCHAR(255) DEFAULT NULL, UNIQUE INDEX UNIQ_7991C118777CEF (talent_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE talent_table ADD CONSTRAINT FK_7991C118777CEF FOREIGN KEY (talent_id) REFERENCES talent (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE talent_table DROP FOREIGN KEY FK_7991C118777CEF');
        $this->addSql('DROP TABLE talent_table');
    }
}
