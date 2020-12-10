<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20201209141056 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE room DROP FOREIGN KEY FK_729F519B3C427B2F');
        $this->addSql('ALTER TABLE room DROP FOREIGN KEY FK_729F519B8490D15');
        $this->addSql('DROP INDEX UNIQ_729F519B8490D15 ON room');
        $this->addSql('DROP INDEX IDX_729F519B3C427B2F ON room');
        $this->addSql('ALTER TABLE room DROP klant_id, DROP au_pair_id');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE room ADD klant_id INT NOT NULL, ADD au_pair_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE room ADD CONSTRAINT FK_729F519B3C427B2F FOREIGN KEY (klant_id) REFERENCES klant (id)');
        $this->addSql('ALTER TABLE room ADD CONSTRAINT FK_729F519B8490D15 FOREIGN KEY (au_pair_id) REFERENCES au_pair (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_729F519B8490D15 ON room (au_pair_id)');
        $this->addSql('CREATE INDEX IDX_729F519B3C427B2F ON room (klant_id)');
    }
}
