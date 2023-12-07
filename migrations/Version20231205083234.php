<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20231205083234 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE contact (id INT AUTO_INCREMENT NOT NULL, nom_contact VARCHAR(255) NOT NULL, prenom_contact VARCHAR(255) NOT NULL, telephone VARCHAR(255) NOT NULL, email VARCHAR(255) NOT NULL, disponibilite_contact LONGTEXT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE equipement (id INT AUTO_INCREMENT NOT NULL, gite_id INT NOT NULL, lave_vaisselle TINYINT(1) NOT NULL, lave_linge TINYINT(1) NOT NULL, climatisation TINYINT(1) NOT NULL, television TINYINT(1) NOT NULL, terasse TINYINT(1) NOT NULL, barbecue TINYINT(1) NOT NULL, piscine_privee TINYINT(1) NOT NULL, piscine_collective TINYINT(1) NOT NULL, tennis TINYINT(1) NOT NULL, ping_pong TINYINT(1) NOT NULL, wifi TINYINT(1) NOT NULL, UNIQUE INDEX UNIQ_B8B4C6F3652CAE9B (gite_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE gite (id INT AUTO_INCREMENT NOT NULL, proprietaire_id INT NOT NULL, contact_id INT DEFAULT NULL, nom_gite VARCHAR(255) NOT NULL, superficie INT NOT NULL, nombre_chambre INT NOT NULL, nombre_couchage INT NOT NULL, adresse VARCHAR(255) NOT NULL, cp INT NOT NULL, ville VARCHAR(255) NOT NULL, departement VARCHAR(255) NOT NULL, region VARCHAR(255) NOT NULL, INDEX IDX_B638C92C76C50E4A (proprietaire_id), INDEX IDX_B638C92CE7A1254A (contact_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE proprietaire (id INT AUTO_INCREMENT NOT NULL, nom_proprietaire VARCHAR(255) NOT NULL, prenom_proprietaire VARCHAR(255) NOT NULL, telephone VARCHAR(255) NOT NULL, email VARCHAR(255) NOT NULL, disponibilite_proprietaire LONGTEXT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE service_payant (id INT AUTO_INCREMENT NOT NULL, nom_service VARCHAR(255) NOT NULL, disponibilite_service TINYINT(1) NOT NULL, supplement NUMERIC(10, 2) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE service_payant_gite (service_payant_id INT NOT NULL, gite_id INT NOT NULL, INDEX IDX_415E4913B37DE6D6 (service_payant_id), INDEX IDX_415E4913652CAE9B (gite_id), PRIMARY KEY(service_payant_id, gite_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE tarif (id INT AUTO_INCREMENT NOT NULL, gite_id INT NOT NULL, nom_periode VARCHAR(255) NOT NULL, date_debut DATE NOT NULL, date_fin DATE NOT NULL, prix NUMERIC(10, 2) NOT NULL, INDEX IDX_E7189C9652CAE9B (gite_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE messenger_messages (id BIGINT AUTO_INCREMENT NOT NULL, body LONGTEXT NOT NULL, headers LONGTEXT NOT NULL, queue_name VARCHAR(190) NOT NULL, created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', available_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', delivered_at DATETIME DEFAULT NULL COMMENT \'(DC2Type:datetime_immutable)\', INDEX IDX_75EA56E0FB7336F0 (queue_name), INDEX IDX_75EA56E0E3BD61CE (available_at), INDEX IDX_75EA56E016BA31DB (delivered_at), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE equipement ADD CONSTRAINT FK_B8B4C6F3652CAE9B FOREIGN KEY (gite_id) REFERENCES gite (id)');
        $this->addSql('ALTER TABLE gite ADD CONSTRAINT FK_B638C92C76C50E4A FOREIGN KEY (proprietaire_id) REFERENCES proprietaire (id)');
        $this->addSql('ALTER TABLE gite ADD CONSTRAINT FK_B638C92CE7A1254A FOREIGN KEY (contact_id) REFERENCES contact (id)');
        $this->addSql('ALTER TABLE service_payant_gite ADD CONSTRAINT FK_415E4913B37DE6D6 FOREIGN KEY (service_payant_id) REFERENCES service_payant (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE service_payant_gite ADD CONSTRAINT FK_415E4913652CAE9B FOREIGN KEY (gite_id) REFERENCES gite (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE tarif ADD CONSTRAINT FK_E7189C9652CAE9B FOREIGN KEY (gite_id) REFERENCES gite (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE equipement DROP FOREIGN KEY FK_B8B4C6F3652CAE9B');
        $this->addSql('ALTER TABLE gite DROP FOREIGN KEY FK_B638C92C76C50E4A');
        $this->addSql('ALTER TABLE gite DROP FOREIGN KEY FK_B638C92CE7A1254A');
        $this->addSql('ALTER TABLE service_payant_gite DROP FOREIGN KEY FK_415E4913B37DE6D6');
        $this->addSql('ALTER TABLE service_payant_gite DROP FOREIGN KEY FK_415E4913652CAE9B');
        $this->addSql('ALTER TABLE tarif DROP FOREIGN KEY FK_E7189C9652CAE9B');
        $this->addSql('DROP TABLE contact');
        $this->addSql('DROP TABLE equipement');
        $this->addSql('DROP TABLE gite');
        $this->addSql('DROP TABLE proprietaire');
        $this->addSql('DROP TABLE service_payant');
        $this->addSql('DROP TABLE service_payant_gite');
        $this->addSql('DROP TABLE tarif');
        $this->addSql('DROP TABLE messenger_messages');
    }
}
