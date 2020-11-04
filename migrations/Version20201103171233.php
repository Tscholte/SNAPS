<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20201103171233 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE au_pair DROP FOREIGN KEY FK_791F9D321494450');
        $this->addSql('DROP INDEX IDX_791F9D321494450 ON au_pair');
        $this->addSql('ALTER TABLE au_pair CHANGE klant_id_id klant_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE au_pair ADD CONSTRAINT FK_791F9D323C427B2F FOREIGN KEY (klant_id) REFERENCES klant (id)');
        $this->addSql('CREATE INDEX IDX_791F9D323C427B2F ON au_pair (klant_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE au_pair DROP FOREIGN KEY FK_791F9D323C427B2F');
        $this->addSql('DROP INDEX IDX_791F9D323C427B2F ON au_pair');
        $this->addSql('ALTER TABLE au_pair CHANGE klant_id klant_id_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE au_pair ADD CONSTRAINT FK_791F9D321494450 FOREIGN KEY (klant_id_id) REFERENCES klant (id)');
        $this->addSql('CREATE INDEX IDX_791F9D321494450 ON au_pair (klant_id_id)');
    }
}
