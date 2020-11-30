<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20201129222942 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE room');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE room (id INT AUTO_INCREMENT NOT NULL, klant_id INT NOT NULL, au_pair_id INT DEFAULT NULL, status VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, korting NUMERIC(3, 2) DEFAULT NULL, UNIQUE INDEX UNIQ_729F519B8490D15 (au_pair_id), INDEX IDX_729F519B3C427B2F (klant_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE room ADD CONSTRAINT FK_729F519B3C427B2F FOREIGN KEY (klant_id) REFERENCES klant (id)');
        $this->addSql('ALTER TABLE room ADD CONSTRAINT FK_729F519B8490D15 FOREIGN KEY (au_pair_id) REFERENCES au_pair (id)');
    }
}
