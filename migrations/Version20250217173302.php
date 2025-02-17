<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250217173302 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE classe (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, dv VARCHAR(255) NOT NULL, armor VARCHAR(255) NOT NULL, weapon VARCHAR(255) NOT NULL, tool VARCHAR(255) DEFAULT NULL, save VARCHAR(255) NOT NULL, competence VARCHAR(255) NOT NULL, equipment VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE classe_spell (classe_id INT NOT NULL, spell_id INT NOT NULL, INDEX IDX_994899B58F5EA509 (classe_id), INDEX IDX_994899B5479EC90D (spell_id), PRIMARY KEY(classe_id, spell_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE classe_by_level (id INT AUTO_INCREMENT NOT NULL, classe_id INT NOT NULL, level INT NOT NULL, bm INT NOT NULL, rage VARCHAR(255) DEFAULT NULL, damage INT DEFAULT NULL, cantrip INT DEFAULT NULL, knowing_spells INT DEFAULT NULL, spell_one INT DEFAULT NULL, spell_two INT DEFAULT NULL, spell_three INT DEFAULT NULL, spell_four INT DEFAULT NULL, spell_five INT DEFAULT NULL, spell_six INT DEFAULT NULL, spell_seven INT DEFAULT NULL, spell_eight INT DEFAULT NULL, spell_nine INT DEFAULT NULL, sorcery_point INT DEFAULT NULL, martial_art VARCHAR(255) DEFAULT NULL, ki INT DEFAULT NULL, movement_without_armor VARCHAR(255) DEFAULT NULL, slot_space INT DEFAULT NULL, slot_level INT DEFAULT NULL, invocation_know INT DEFAULT NULL, sneak_attack VARCHAR(255) DEFAULT NULL, INDEX IDX_15C2A4D58F5EA509 (classe_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE race (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, carac_up VARCHAR(255) NOT NULL, age VARCHAR(255) NOT NULL, height VARCHAR(255) NOT NULL, speed VARCHAR(255) NOT NULL, description VARCHAR(255) NOT NULL, language VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE skill (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, description VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE skill_classe_by_level (skill_id INT NOT NULL, classe_by_level_id INT NOT NULL, INDEX IDX_2303D7405585C142 (skill_id), INDEX IDX_2303D7405202E88F (classe_by_level_id), PRIMARY KEY(skill_id, classe_by_level_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE spell (id INT AUTO_INCREMENT NOT NULL, name_fr VARCHAR(255) NOT NULL, name_eng VARCHAR(255) NOT NULL, level INT NOT NULL, school VARCHAR(255) NOT NULL, casting_time VARCHAR(255) NOT NULL, range_effect VARCHAR(255) NOT NULL, components VARCHAR(255) NOT NULL, components_ingredients VARCHAR(255) DEFAULT NULL, duration VARCHAR(255) NOT NULL, description VARCHAR(255) NOT NULL, upper_level VARCHAR(255) DEFAULT NULL, source VARCHAR(255) NOT NULL, ritual TINYINT(1) NOT NULL, concentration TINYINT(1) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE subrace (id INT AUTO_INCREMENT NOT NULL, race_id INT NOT NULL, name VARCHAR(255) NOT NULL, description VARCHAR(255) NOT NULL, carac_up VARCHAR(255) DEFAULT NULL, language VARCHAR(255) DEFAULT NULL, INDEX IDX_3DAC9246E59D40D (race_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE talent (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, description VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE talent_race (talent_id INT NOT NULL, race_id INT NOT NULL, INDEX IDX_3357677A18777CEF (talent_id), INDEX IDX_3357677A6E59D40D (race_id), PRIMARY KEY(talent_id, race_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE talent_subrace (talent_id INT NOT NULL, subrace_id INT NOT NULL, INDEX IDX_8D170C9B18777CEF (talent_id), INDEX IDX_8D170C9B253B7CC2 (subrace_id), PRIMARY KEY(talent_id, subrace_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE messenger_messages (id BIGINT AUTO_INCREMENT NOT NULL, body LONGTEXT NOT NULL, headers LONGTEXT NOT NULL, queue_name VARCHAR(190) NOT NULL, created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', available_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', delivered_at DATETIME DEFAULT NULL COMMENT \'(DC2Type:datetime_immutable)\', INDEX IDX_75EA56E0FB7336F0 (queue_name), INDEX IDX_75EA56E0E3BD61CE (available_at), INDEX IDX_75EA56E016BA31DB (delivered_at), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE classe_spell ADD CONSTRAINT FK_994899B58F5EA509 FOREIGN KEY (classe_id) REFERENCES classe (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE classe_spell ADD CONSTRAINT FK_994899B5479EC90D FOREIGN KEY (spell_id) REFERENCES spell (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE classe_by_level ADD CONSTRAINT FK_15C2A4D58F5EA509 FOREIGN KEY (classe_id) REFERENCES classe (id)');
        $this->addSql('ALTER TABLE skill_classe_by_level ADD CONSTRAINT FK_2303D7405585C142 FOREIGN KEY (skill_id) REFERENCES skill (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE skill_classe_by_level ADD CONSTRAINT FK_2303D7405202E88F FOREIGN KEY (classe_by_level_id) REFERENCES classe_by_level (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE subrace ADD CONSTRAINT FK_3DAC9246E59D40D FOREIGN KEY (race_id) REFERENCES race (id)');
        $this->addSql('ALTER TABLE talent_race ADD CONSTRAINT FK_3357677A18777CEF FOREIGN KEY (talent_id) REFERENCES talent (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE talent_race ADD CONSTRAINT FK_3357677A6E59D40D FOREIGN KEY (race_id) REFERENCES race (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE talent_subrace ADD CONSTRAINT FK_8D170C9B18777CEF FOREIGN KEY (talent_id) REFERENCES talent (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE talent_subrace ADD CONSTRAINT FK_8D170C9B253B7CC2 FOREIGN KEY (subrace_id) REFERENCES subrace (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE classe_spell DROP FOREIGN KEY FK_994899B58F5EA509');
        $this->addSql('ALTER TABLE classe_spell DROP FOREIGN KEY FK_994899B5479EC90D');
        $this->addSql('ALTER TABLE classe_by_level DROP FOREIGN KEY FK_15C2A4D58F5EA509');
        $this->addSql('ALTER TABLE skill_classe_by_level DROP FOREIGN KEY FK_2303D7405585C142');
        $this->addSql('ALTER TABLE skill_classe_by_level DROP FOREIGN KEY FK_2303D7405202E88F');
        $this->addSql('ALTER TABLE subrace DROP FOREIGN KEY FK_3DAC9246E59D40D');
        $this->addSql('ALTER TABLE talent_race DROP FOREIGN KEY FK_3357677A18777CEF');
        $this->addSql('ALTER TABLE talent_race DROP FOREIGN KEY FK_3357677A6E59D40D');
        $this->addSql('ALTER TABLE talent_subrace DROP FOREIGN KEY FK_8D170C9B18777CEF');
        $this->addSql('ALTER TABLE talent_subrace DROP FOREIGN KEY FK_8D170C9B253B7CC2');
        $this->addSql('DROP TABLE classe');
        $this->addSql('DROP TABLE classe_spell');
        $this->addSql('DROP TABLE classe_by_level');
        $this->addSql('DROP TABLE race');
        $this->addSql('DROP TABLE skill');
        $this->addSql('DROP TABLE skill_classe_by_level');
        $this->addSql('DROP TABLE spell');
        $this->addSql('DROP TABLE subrace');
        $this->addSql('DROP TABLE talent');
        $this->addSql('DROP TABLE talent_race');
        $this->addSql('DROP TABLE talent_subrace');
        $this->addSql('DROP TABLE messenger_messages');
    }
}
