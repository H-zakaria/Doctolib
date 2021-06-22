<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210622094453 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP INDEX UNIQ_10C31F864F4A11B1 ON rdv');
        $this->addSql('ALTER TABLE rdv ADD date_heure DATE NOT NULL, DROP date_time');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_10C31F86AB830034 ON rdv (date_heure)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP INDEX UNIQ_10C31F86AB830034 ON rdv');
        $this->addSql('ALTER TABLE rdv ADD date_time DATETIME NOT NULL, DROP date_heure');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_10C31F864F4A11B1 ON rdv (date_time)');
    }
}
