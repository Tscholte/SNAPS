<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20201121234629 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE au_pair ADD id INT AUTO_INCREMENT NOT NULL, ADD status VARCHAR(255) NOT NULL, CHANGE Name name VARCHAR(255) NOT NULL, CHANGE Nationality nationality VARCHAR(255) NOT NULL, CHANGE Birthday birthday DATE NOT NULL, CHANGE Email email VARCHAR(255) DEFAULT NULL, CHANGE Mobile mobile VARCHAR(11) DEFAULT NULL, CHANGE whats_app whats_app VARCHAR(15) DEFAULT NULL, CHANGE Skype skype VARCHAR(255) DEFAULT NULL, CHANGE instagram instagram VARCHAR(255) DEFAULT NULL, CHANGE Facebook facebook VARCHAR(255) DEFAULT NULL, CHANGE City city VARCHAR(255) DEFAULT NULL, ADD PRIMARY KEY (id)');
        $this->addSql('ALTER TABLE klant DROP Korting, DROP Status, CHANGE Surname surname VARCHAR(255) NOT NULL, CHANGE Firstname firstname VARCHAR(255) NOT NULL, CHANGE City city VARCHAR(255) NOT NULL, CHANGE Postcode postcode INT DEFAULT NULL, CHANGE Adress adress VARCHAR(255) NOT NULL, CHANGE Email email VARCHAR(255) DEFAULT NULL, CHANGE Email2 email2 VARCHAR(255) DEFAULT NULL, CHANGE Mobile mobile VARCHAR(11) DEFAULT NULL, CHANGE Mobile2 mobile2 VARCHAR(11) DEFAULT NULL');
        $this->addSql('ALTER TABLE room ADD korting NUMERIC(3, 2) DEFAULT NULL');
        $this->addSql('ALTER TABLE room ADD CONSTRAINT FK_729F519B8490D15 FOREIGN KEY (au_pair_id) REFERENCES au_pair (id)');
        $this->addSql('ALTER TABLE user ADD CONSTRAINT FK_8D93D6493C427B2F FOREIGN KEY (klant_id) REFERENCES klant (id)');
        $this->addSql('ALTER TABLE user ADD CONSTRAINT FK_8D93D6498490D15 FOREIGN KEY (au_pair_id) REFERENCES au_pair (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE au_pair MODIFY id INT NOT NULL');
        $this->addSql('ALTER TABLE au_pair DROP PRIMARY KEY');
        $this->addSql('ALTER TABLE au_pair DROP id, DROP status, CHANGE name Name VARCHAR(50) CHARACTER SET utf8 DEFAULT NULL COLLATE `utf8_general_ci`, CHANGE nationality Nationality VARCHAR(50) CHARACTER SET utf8 DEFAULT NULL COLLATE `utf8_general_ci`, CHANGE birthday Birthday DATE DEFAULT NULL, CHANGE email Email VARCHAR(50) CHARACTER SET utf8 DEFAULT NULL COLLATE `utf8_general_ci`, CHANGE mobile Mobile VARCHAR(50) CHARACTER SET utf8 DEFAULT NULL COLLATE `utf8_general_ci`, CHANGE whats_app whats_app VARCHAR(50) CHARACTER SET utf8 DEFAULT NULL COLLATE `utf8_general_ci`, CHANGE skype Skype VARCHAR(50) CHARACTER SET utf8 DEFAULT NULL COLLATE `utf8_general_ci`, CHANGE instagram instagram VARCHAR(50) CHARACTER SET utf8 DEFAULT NULL COLLATE `utf8_general_ci`, CHANGE facebook Facebook VARCHAR(50) CHARACTER SET utf8 DEFAULT NULL COLLATE `utf8_general_ci`, CHANGE city City VARCHAR(50) CHARACTER SET utf8 DEFAULT NULL COLLATE `utf8_general_ci`');
        $this->addSql('ALTER TABLE klant ADD Korting NUMERIC(3, 2) DEFAULT NULL, ADD Status VARCHAR(12) CHARACTER SET utf8 DEFAULT NULL COLLATE `utf8_general_ci`, CHANGE surname Surname VARCHAR(30) CHARACTER SET utf8 DEFAULT NULL COLLATE `utf8_general_ci`, CHANGE firstname Firstname VARCHAR(22) CHARACTER SET utf8 DEFAULT NULL COLLATE `utf8_general_ci`, CHANGE city City VARCHAR(255) CHARACTER SET utf8 DEFAULT NULL COLLATE `utf8_general_ci`, CHANGE postcode Postcode VARCHAR(8) CHARACTER SET utf8 DEFAULT NULL COLLATE `utf8_general_ci`, CHANGE adress Adress VARCHAR(31) CHARACTER SET utf8 DEFAULT NULL COLLATE `utf8_general_ci`, CHANGE email Email VARCHAR(62) CHARACTER SET utf8 DEFAULT NULL COLLATE `utf8_general_ci`, CHANGE email2 Email2 VARCHAR(31) CHARACTER SET utf8 DEFAULT NULL COLLATE `utf8_general_ci`, CHANGE mobile Mobile VARCHAR(12) CHARACTER SET utf8 DEFAULT NULL COLLATE `utf8_general_ci`, CHANGE mobile2 Mobile2 VARCHAR(15) CHARACTER SET utf8 DEFAULT NULL COLLATE `utf8_general_ci`');
        $this->addSql('ALTER TABLE room DROP FOREIGN KEY FK_729F519B8490D15');
        $this->addSql('ALTER TABLE room DROP korting');
        $this->addSql('ALTER TABLE user DROP FOREIGN KEY FK_8D93D6493C427B2F');
        $this->addSql('ALTER TABLE user DROP FOREIGN KEY FK_8D93D6498490D15');
    }
}
