<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210617120347 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE etablissement_medecin DROP FOREIGN KEY FK_1FCB4C054F31A84');
        $this->addSql('ALTER TABLE rdv DROP FOREIGN KEY FK_10C31F864F31A84');
        $this->addSql('ALTER TABLE specialite_medecin DROP FOREIGN KEY FK_24D341424F31A84');
        $this->addSql('CREATE TABLE etablissement_praticien (etablissement_id INT NOT NULL, praticien_id INT NOT NULL, INDEX IDX_6045AABAFF631228 (etablissement_id), INDEX IDX_6045AABA2391866B (praticien_id), PRIMARY KEY(etablissement_id, praticien_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE praticien (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(50) NOT NULL, prenom VARCHAR(50) NOT NULL, mail VARCHAR(255) NOT NULL, mdp VARCHAR(255) NOT NULL, tel INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE specialite_praticien (specialite_id INT NOT NULL, praticien_id INT NOT NULL, INDEX IDX_A1CC34DD2195E0F0 (specialite_id), INDEX IDX_A1CC34DD2391866B (praticien_id), PRIMARY KEY(specialite_id, praticien_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE etablissement_praticien ADD CONSTRAINT FK_6045AABAFF631228 FOREIGN KEY (etablissement_id) REFERENCES etablissement (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE etablissement_praticien ADD CONSTRAINT FK_6045AABA2391866B FOREIGN KEY (praticien_id) REFERENCES praticien (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE specialite_praticien ADD CONSTRAINT FK_A1CC34DD2195E0F0 FOREIGN KEY (specialite_id) REFERENCES specialite (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE specialite_praticien ADD CONSTRAINT FK_A1CC34DD2391866B FOREIGN KEY (praticien_id) REFERENCES praticien (id) ON DELETE CASCADE');
        $this->addSql('DROP TABLE etablissement_medecin');
        $this->addSql('DROP TABLE medecin');
        $this->addSql('DROP TABLE specialite_medecin');
        $this->addSql('ALTER TABLE etablissement ADD ville VARCHAR(70) NOT NULL, CHANGE nom nom VARCHAR(70) NOT NULL, CHANGE adresse rue VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE patient ADD ville VARCHAR(70) NOT NULL, ADD date_naissance DATE NOT NULL, ADD mail VARCHAR(255) NOT NULL, ADD mdp VARCHAR(255) NOT NULL, ADD tel INT NOT NULL, CHANGE nom nom VARCHAR(50) NOT NULL, CHANGE prenom prenom VARCHAR(50) NOT NULL, CHANGE adresse rue VARCHAR(255) NOT NULL');
        $this->addSql('DROP INDEX IDX_10C31F864F31A84 ON rdv');
        $this->addSql('ALTER TABLE rdv CHANGE medecin_id praticien_id INT NOT NULL');
        $this->addSql('ALTER TABLE rdv ADD CONSTRAINT FK_10C31F862391866B FOREIGN KEY (praticien_id) REFERENCES praticien (id)');
        $this->addSql('CREATE INDEX IDX_10C31F862391866B ON rdv (praticien_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE etablissement_praticien DROP FOREIGN KEY FK_6045AABA2391866B');
        $this->addSql('ALTER TABLE rdv DROP FOREIGN KEY FK_10C31F862391866B');
        $this->addSql('ALTER TABLE specialite_praticien DROP FOREIGN KEY FK_A1CC34DD2391866B');
        $this->addSql('CREATE TABLE etablissement_medecin (etablissement_id INT NOT NULL, medecin_id INT NOT NULL, INDEX IDX_1FCB4C054F31A84 (medecin_id), INDEX IDX_1FCB4C05FF631228 (etablissement_id), PRIMARY KEY(etablissement_id, medecin_id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE medecin (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, prenom VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE specialite_medecin (specialite_id INT NOT NULL, medecin_id INT NOT NULL, INDEX IDX_24D341424F31A84 (medecin_id), INDEX IDX_24D341422195E0F0 (specialite_id), PRIMARY KEY(specialite_id, medecin_id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE etablissement_medecin ADD CONSTRAINT FK_1FCB4C054F31A84 FOREIGN KEY (medecin_id) REFERENCES medecin (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE etablissement_medecin ADD CONSTRAINT FK_1FCB4C05FF631228 FOREIGN KEY (etablissement_id) REFERENCES etablissement (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE specialite_medecin ADD CONSTRAINT FK_24D341422195E0F0 FOREIGN KEY (specialite_id) REFERENCES specialite (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE specialite_medecin ADD CONSTRAINT FK_24D341424F31A84 FOREIGN KEY (medecin_id) REFERENCES medecin (id) ON DELETE CASCADE');
        $this->addSql('DROP TABLE etablissement_praticien');
        $this->addSql('DROP TABLE praticien');
        $this->addSql('DROP TABLE specialite_praticien');
        $this->addSql('ALTER TABLE etablissement DROP ville, CHANGE nom nom VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE rue adresse VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE patient ADD adresse VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, DROP ville, DROP rue, DROP date_naissance, DROP mail, DROP mdp, DROP tel, CHANGE nom nom VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE prenom prenom VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('DROP INDEX IDX_10C31F862391866B ON rdv');
        $this->addSql('ALTER TABLE rdv CHANGE praticien_id medecin_id INT NOT NULL');
        $this->addSql('ALTER TABLE rdv ADD CONSTRAINT FK_10C31F864F31A84 FOREIGN KEY (medecin_id) REFERENCES medecin (id)');
        $this->addSql('CREATE INDEX IDX_10C31F864F31A84 ON rdv (medecin_id)');
    }
}
