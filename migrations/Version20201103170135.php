<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20201103170135 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE admin (id INT AUTO_INCREMENT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE au_pair (id INT AUTO_INCREMENT NOT NULL, klant_id_id INT DEFAULT NULL, name VARCHAR(255) NOT NULL, nationality VARCHAR(255) NOT NULL, birthday DATE NOT NULL, email VARCHAR(255) DEFAULT NULL, mobile VARCHAR(11) DEFAULT NULL, whats_app VARCHAR(15) DEFAULT NULL, skype VARCHAR(255) DEFAULT NULL, instagram VARCHAR(255) DEFAULT NULL, facebook VARCHAR(255) DEFAULT NULL, city VARCHAR(255) DEFAULT NULL, INDEX IDX_791F9D321494450 (klant_id_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE klant (id INT AUTO_INCREMENT NOT NULL, family VARCHAR(255) NOT NULL, surname VARCHAR(255) NOT NULL, korting NUMERIC(3, 2) DEFAULT NULL, status VARCHAR(255) NOT NULL, postcode INT DEFAULT NULL, email VARCHAR(255) DEFAULT NULL, email2 VARCHAR(255) DEFAULT NULL, mobile VARCHAR(11) DEFAULT NULL, mobile2 VARCHAR(11) DEFAULT NULL, opmerking TINYTEXT DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE au_pair ADD CONSTRAINT FK_791F9D321494450 FOREIGN KEY (klant_id_id) REFERENCES klant (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE au_pair DROP FOREIGN KEY FK_791F9D321494450');
        $this->addSql('DROP TABLE admin');
        $this->addSql('DROP TABLE au_pair');
        $this->addSql('DROP TABLE klant');
    }
}
