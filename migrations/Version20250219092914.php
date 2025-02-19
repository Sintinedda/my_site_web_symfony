<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250219092914 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE source_race (id INT AUTO_INCREMENT NOT NULL, race_id INT NOT NULL, name VARCHAR(255) DEFAULT NULL, source VARCHAR(255) NOT NULL, descr1 VARCHAR(1050) DEFAULT NULL, descr2 VARCHAR(1050) DEFAULT NULL, descr3 VARCHAR(1050) DEFAULT NULL, descr4 VARCHAR(1050) DEFAULT NULL, descr5 VARCHAR(1050) DEFAULT NULL, ability_inc VARCHAR(1050) DEFAULT NULL, type VARCHAR(1050) DEFAULT NULL, age VARCHAR(1050) DEFAULT NULL, alignment VARCHAR(1050) DEFAULT NULL, size VARCHAR(1050) DEFAULT NULL, speed VARCHAR(1050) DEFAULT NULL, language VARCHAR(1050) DEFAULT NULL, INDEX IDX_DBE53EAC6E59D40D (race_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE talent_source_race (talent_id INT NOT NULL, source_race_id INT NOT NULL, INDEX IDX_7DC433EF18777CEF (talent_id), INDEX IDX_7DC433EF27866C65 (source_race_id), PRIMARY KEY(talent_id, source_race_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE source_race ADD CONSTRAINT FK_DBE53EAC6E59D40D FOREIGN KEY (race_id) REFERENCES race (id)');
        $this->addSql('ALTER TABLE talent_source_race ADD CONSTRAINT FK_7DC433EF18777CEF FOREIGN KEY (talent_id) REFERENCES talent (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE talent_source_race ADD CONSTRAINT FK_7DC433EF27866C65 FOREIGN KEY (source_race_id) REFERENCES source_race (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE talent_race DROP FOREIGN KEY FK_3357677A6E59D40D');
        $this->addSql('ALTER TABLE talent_race DROP FOREIGN KEY FK_3357677A18777CEF');
        $this->addSql('DROP TABLE talent_race');
        $this->addSql('ALTER TABLE race DROP carac_up, DROP age, DROP height, DROP speed, DROP description, DROP language');
        $this->addSql('ALTER TABLE subrace DROP FOREIGN KEY FK_3DAC9246E59D40D');
        $this->addSql('DROP INDEX IDX_3DAC9246E59D40D ON subrace');
        $this->addSql('ALTER TABLE subrace ADD descr1 VARCHAR(1050) NOT NULL, ADD descr2 VARCHAR(1050) DEFAULT NULL, ADD descr3 VARCHAR(1050) DEFAULT NULL, ADD descr4 VARCHAR(1050) DEFAULT NULL, ADD descr5 VARCHAR(1050) DEFAULT NULL, ADD ability_inc VARCHAR(1050) DEFAULT NULL, ADD type VARCHAR(1050) DEFAULT NULL, ADD age VARCHAR(1050) DEFAULT NULL, ADD alignment VARCHAR(1050) DEFAULT NULL, ADD size VARCHAR(1050) DEFAULT NULL, ADD speed VARCHAR(1050) DEFAULT NULL, DROP description, DROP carac_up, CHANGE language language VARCHAR(1050) DEFAULT NULL, CHANGE race_id source_id INT NOT NULL');
        $this->addSql('ALTER TABLE subrace ADD CONSTRAINT FK_3DAC924953C1C61 FOREIGN KEY (source_id) REFERENCES source_race (id)');
        $this->addSql('CREATE INDEX IDX_3DAC924953C1C61 ON subrace (source_id)');
        $this->addSql('ALTER TABLE talent ADD descr1 VARCHAR(1050) NOT NULL, ADD descr2 VARCHAR(1050) DEFAULT NULL, ADD descr3 VARCHAR(1050) DEFAULT NULL, ADD descr4 VARCHAR(1050) DEFAULT NULL, ADD descr5 VARCHAR(1050) DEFAULT NULL, ADD descr6 VARCHAR(1050) DEFAULT NULL, ADD descr7 VARCHAR(1050) DEFAULT NULL, ADD descr8 VARCHAR(1050) DEFAULT NULL, ADD descr9 VARCHAR(1050) DEFAULT NULL, ADD descr10 VARCHAR(1050) DEFAULT NULL, DROP description');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE subrace DROP FOREIGN KEY FK_3DAC924953C1C61');
        $this->addSql('CREATE TABLE talent_race (talent_id INT NOT NULL, race_id INT NOT NULL, INDEX IDX_3357677A18777CEF (talent_id), INDEX IDX_3357677A6E59D40D (race_id), PRIMARY KEY(talent_id, race_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE talent_race ADD CONSTRAINT FK_3357677A6E59D40D FOREIGN KEY (race_id) REFERENCES race (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE talent_race ADD CONSTRAINT FK_3357677A18777CEF FOREIGN KEY (talent_id) REFERENCES talent (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE source_race DROP FOREIGN KEY FK_DBE53EAC6E59D40D');
        $this->addSql('ALTER TABLE talent_source_race DROP FOREIGN KEY FK_7DC433EF18777CEF');
        $this->addSql('ALTER TABLE talent_source_race DROP FOREIGN KEY FK_7DC433EF27866C65');
        $this->addSql('DROP TABLE source_race');
        $this->addSql('DROP TABLE talent_source_race');
        $this->addSql('ALTER TABLE race ADD carac_up VARCHAR(255) NOT NULL, ADD age VARCHAR(255) NOT NULL, ADD height VARCHAR(255) NOT NULL, ADD speed VARCHAR(255) NOT NULL, ADD description VARCHAR(255) NOT NULL, ADD language VARCHAR(255) NOT NULL');
        $this->addSql('DROP INDEX IDX_3DAC924953C1C61 ON subrace');
        $this->addSql('ALTER TABLE subrace ADD description VARCHAR(255) NOT NULL, ADD carac_up VARCHAR(255) DEFAULT NULL, DROP descr1, DROP descr2, DROP descr3, DROP descr4, DROP descr5, DROP ability_inc, DROP type, DROP age, DROP alignment, DROP size, DROP speed, CHANGE language language VARCHAR(255) DEFAULT NULL, CHANGE source_id race_id INT NOT NULL');
        $this->addSql('ALTER TABLE subrace ADD CONSTRAINT FK_3DAC9246E59D40D FOREIGN KEY (race_id) REFERENCES race (id)');
        $this->addSql('CREATE INDEX IDX_3DAC9246E59D40D ON subrace (race_id)');
        $this->addSql('ALTER TABLE talent ADD description VARCHAR(255) NOT NULL, DROP descr1, DROP descr2, DROP descr3, DROP descr4, DROP descr5, DROP descr6, DROP descr7, DROP descr8, DROP descr9, DROP descr10');
    }
}
