<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250225150102 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE skill_table (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(100) DEFAULT NULL, th1 VARCHAR(100) NOT NULL, th2 VARCHAR(100) NOT NULL, th3 VARCHAR(100) DEFAULT NULL, th4 VARCHAR(100) DEFAULT NULL, tr1_td1 VARCHAR(100) NOT NULL, tr1_td2 VARCHAR(255) NOT NULL, tr2_td1 VARCHAR(100) DEFAULT NULL, tr2_td2 VARCHAR(255) DEFAULT NULL, tr1_td3 VARCHAR(255) DEFAULT NULL, tr1_td4 VARCHAR(255) DEFAULT NULL, tr2_td3 VARCHAR(255) DEFAULT NULL, tr2_td4 VARCHAR(255) DEFAULT NULL, tr3_td1 VARCHAR(100) DEFAULT NULL, tr3_td2 VARCHAR(255) DEFAULT NULL, tr3_td3 VARCHAR(255) DEFAULT NULL, tr3_td4 VARCHAR(255) DEFAULT NULL, tr4_td1 VARCHAR(100) DEFAULT NULL, tr4_td2 VARCHAR(255) DEFAULT NULL, tr4_td3 VARCHAR(255) DEFAULT NULL, tr4_td4 VARCHAR(255) DEFAULT NULL, tr5_td1 VARCHAR(100) DEFAULT NULL, tr5_td2 VARCHAR(255) DEFAULT NULL, tr5_td3 VARCHAR(255) DEFAULT NULL, tr5_td4 VARCHAR(255) DEFAULT NULL, start TINYINT(1) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE skill_table');
    }
}
