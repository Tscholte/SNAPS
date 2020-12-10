<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20201209141437 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE au_pair DROP FOREIGN KEY FK_791F9D328E2368AB');
        $this->addSql('DROP INDEX IDX_791F9D328E2368AB ON au_pair');
        $this->addSql('ALTER TABLE au_pair CHANGE rooms_id room_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE au_pair ADD CONSTRAINT FK_791F9D3254177093 FOREIGN KEY (room_id) REFERENCES room (id)');
        $this->addSql('CREATE INDEX IDX_791F9D3254177093 ON au_pair (room_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE au_pair DROP FOREIGN KEY FK_791F9D3254177093');
        $this->addSql('DROP INDEX IDX_791F9D3254177093 ON au_pair');
        $this->addSql('ALTER TABLE au_pair CHANGE room_id rooms_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE au_pair ADD CONSTRAINT FK_791F9D328E2368AB FOREIGN KEY (rooms_id) REFERENCES room (id)');
        $this->addSql('CREATE INDEX IDX_791F9D328E2368AB ON au_pair (rooms_id)');
    }
}
