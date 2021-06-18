<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210618075917 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE etablissement (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(70) NOT NULL, ville VARCHAR(70) NOT NULL, rue VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE etablissement_praticien (etablissement_id INT NOT NULL, praticien_id INT NOT NULL, INDEX IDX_6045AABAFF631228 (etablissement_id), INDEX IDX_6045AABA2391866B (praticien_id), PRIMARY KEY(etablissement_id, praticien_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE patient (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(50) NOT NULL, prenom VARCHAR(50) NOT NULL, ville VARCHAR(70) NOT NULL, rue VARCHAR(255) NOT NULL, date_naissance DATE NOT NULL, mail VARCHAR(255) NOT NULL, mdp VARCHAR(255) NOT NULL, tel INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE praticien (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(50) NOT NULL, prenom VARCHAR(50) NOT NULL, mail VARCHAR(255) NOT NULL, mdp VARCHAR(255) NOT NULL, tel INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE rdv (id INT AUTO_INCREMENT NOT NULL, patient_id INT NOT NULL, praticien_id INT NOT NULL, date_time DATETIME NOT NULL, UNIQUE INDEX UNIQ_10C31F864F4A11B1 (date_time), INDEX IDX_10C31F866B899279 (patient_id), INDEX IDX_10C31F862391866B (praticien_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE specialite (id INT AUTO_INCREMENT NOT NULL, designation VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE specialite_praticien (specialite_id INT NOT NULL, praticien_id INT NOT NULL, INDEX IDX_A1CC34DD2195E0F0 (specialite_id), INDEX IDX_A1CC34DD2391866B (praticien_id), PRIMARY KEY(specialite_id, praticien_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE etablissement_praticien ADD CONSTRAINT FK_6045AABAFF631228 FOREIGN KEY (etablissement_id) REFERENCES etablissement (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE etablissement_praticien ADD CONSTRAINT FK_6045AABA2391866B FOREIGN KEY (praticien_id) REFERENCES praticien (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE rdv ADD CONSTRAINT FK_10C31F866B899279 FOREIGN KEY (patient_id) REFERENCES patient (id)');
        $this->addSql('ALTER TABLE rdv ADD CONSTRAINT FK_10C31F862391866B FOREIGN KEY (praticien_id) REFERENCES praticien (id)');
        $this->addSql('ALTER TABLE specialite_praticien ADD CONSTRAINT FK_A1CC34DD2195E0F0 FOREIGN KEY (specialite_id) REFERENCES specialite (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE specialite_praticien ADD CONSTRAINT FK_A1CC34DD2391866B FOREIGN KEY (praticien_id) REFERENCES praticien (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE etablissement_praticien DROP FOREIGN KEY FK_6045AABAFF631228');
        $this->addSql('ALTER TABLE rdv DROP FOREIGN KEY FK_10C31F866B899279');
        $this->addSql('ALTER TABLE etablissement_praticien DROP FOREIGN KEY FK_6045AABA2391866B');
        $this->addSql('ALTER TABLE rdv DROP FOREIGN KEY FK_10C31F862391866B');
        $this->addSql('ALTER TABLE specialite_praticien DROP FOREIGN KEY FK_A1CC34DD2391866B');
        $this->addSql('ALTER TABLE specialite_praticien DROP FOREIGN KEY FK_A1CC34DD2195E0F0');
        $this->addSql('DROP TABLE etablissement');
        $this->addSql('DROP TABLE etablissement_praticien');
        $this->addSql('DROP TABLE patient');
        $this->addSql('DROP TABLE praticien');
        $this->addSql('DROP TABLE rdv');
        $this->addSql('DROP TABLE specialite');
        $this->addSql('DROP TABLE specialite_praticien');
    }
}
