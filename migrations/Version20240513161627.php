<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240513161627 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE activation (id INT AUTO_INCREMENT NOT NULL, operation_id INT DEFAULT NULL, lieux_id INT DEFAULT NULL, objectif VARCHAR(255) NOT NULL, date DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', INDEX IDX_1C68607744AC3583 (operation_id), INDEX IDX_1C686077A2C806AC (lieux_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE application (id INT AUTO_INCREMENT NOT NULL, operation_id INT DEFAULT NULL, lien_application VARCHAR(255) NOT NULL, INDEX IDX_A45BDDC144AC3583 (operation_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE client (id INT AUTO_INCREMENT NOT NULL, user_id INT DEFAULT NULL, raison_social VARCHAR(255) NOT NULL, adresse VARCHAR(255) NOT NULL, secteur_activite VARCHAR(255) NOT NULL, logo VARCHAR(255) NOT NULL, url_acces VARCHAR(255) NOT NULL, couleurs VARCHAR(255) NOT NULL, gamme VARCHAR(255) NOT NULL, bio VARCHAR(255) NOT NULL, background VARCHAR(255) NOT NULL, INDEX IDX_C7440455A76ED395 (user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE goodies (id INT AUTO_INCREMENT NOT NULL, ressource_id INT DEFAULT NULL, nom VARCHAR(255) NOT NULL, quantite INT NOT NULL, image VARCHAR(255) NOT NULL, INDEX IDX_1379DF99FC6CD52A (ressource_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE lieux (id INT AUTO_INCREMENT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE logistiques (id INT AUTO_INCREMENT NOT NULL, ressource_id INT DEFAULT NULL, reference VARCHAR(255) NOT NULL, quantites INT NOT NULL, INDEX IDX_6F2DFF68FC6CD52A (ressource_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE operation (id INT AUTO_INCREMENT NOT NULL, user_id INT DEFAULT NULL, nom VARCHAR(255) NOT NULL, chef_projet VARCHAR(255) NOT NULL, url_acces VARCHAR(255) NOT NULL, region VARCHAR(255) NOT NULL, created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', INDEX IDX_1981A66DA76ED395 (user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE ressource (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE ressources (id INT AUTO_INCREMENT NOT NULL, activation_id INT DEFAULT NULL, nom VARCHAR(255) NOT NULL, INDEX IDX_6A2CD5C7116B3934 (activation_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE sondage (id INT AUTO_INCREMENT NOT NULL, operation_id INT DEFAULT NULL, formulaire VARCHAR(255) NOT NULL, INDEX IDX_7579C89F44AC3583 (operation_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, email VARCHAR(180) NOT NULL, roles JSON NOT NULL COMMENT \'(DC2Type:json)\', password VARCHAR(255) NOT NULL, nom VARCHAR(255) NOT NULL, prenom VARCHAR(255) NOT NULL, mobil VARCHAR(255) NOT NULL, photo VARCHAR(255) DEFAULT NULL, UNIQUE INDEX UNIQ_IDENTIFIER_EMAIL (email), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE messenger_messages (id BIGINT AUTO_INCREMENT NOT NULL, body LONGTEXT NOT NULL, headers LONGTEXT NOT NULL, queue_name VARCHAR(190) NOT NULL, created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', available_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', delivered_at DATETIME DEFAULT NULL COMMENT \'(DC2Type:datetime_immutable)\', INDEX IDX_75EA56E0FB7336F0 (queue_name), INDEX IDX_75EA56E0E3BD61CE (available_at), INDEX IDX_75EA56E016BA31DB (delivered_at), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE activation ADD CONSTRAINT FK_1C68607744AC3583 FOREIGN KEY (operation_id) REFERENCES operation (id)');
        $this->addSql('ALTER TABLE activation ADD CONSTRAINT FK_1C686077A2C806AC FOREIGN KEY (lieux_id) REFERENCES lieux (id)');
        $this->addSql('ALTER TABLE application ADD CONSTRAINT FK_A45BDDC144AC3583 FOREIGN KEY (operation_id) REFERENCES operation (id)');
        $this->addSql('ALTER TABLE client ADD CONSTRAINT FK_C7440455A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE goodies ADD CONSTRAINT FK_1379DF99FC6CD52A FOREIGN KEY (ressource_id) REFERENCES ressource (id)');
        $this->addSql('ALTER TABLE logistiques ADD CONSTRAINT FK_6F2DFF68FC6CD52A FOREIGN KEY (ressource_id) REFERENCES ressource (id)');
        $this->addSql('ALTER TABLE operation ADD CONSTRAINT FK_1981A66DA76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE ressources ADD CONSTRAINT FK_6A2CD5C7116B3934 FOREIGN KEY (activation_id) REFERENCES activation (id)');
        $this->addSql('ALTER TABLE sondage ADD CONSTRAINT FK_7579C89F44AC3583 FOREIGN KEY (operation_id) REFERENCES operation (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE activation DROP FOREIGN KEY FK_1C68607744AC3583');
        $this->addSql('ALTER TABLE activation DROP FOREIGN KEY FK_1C686077A2C806AC');
        $this->addSql('ALTER TABLE application DROP FOREIGN KEY FK_A45BDDC144AC3583');
        $this->addSql('ALTER TABLE client DROP FOREIGN KEY FK_C7440455A76ED395');
        $this->addSql('ALTER TABLE goodies DROP FOREIGN KEY FK_1379DF99FC6CD52A');
        $this->addSql('ALTER TABLE logistiques DROP FOREIGN KEY FK_6F2DFF68FC6CD52A');
        $this->addSql('ALTER TABLE operation DROP FOREIGN KEY FK_1981A66DA76ED395');
        $this->addSql('ALTER TABLE ressources DROP FOREIGN KEY FK_6A2CD5C7116B3934');
        $this->addSql('ALTER TABLE sondage DROP FOREIGN KEY FK_7579C89F44AC3583');
        $this->addSql('DROP TABLE activation');
        $this->addSql('DROP TABLE application');
        $this->addSql('DROP TABLE client');
        $this->addSql('DROP TABLE goodies');
        $this->addSql('DROP TABLE lieux');
        $this->addSql('DROP TABLE logistiques');
        $this->addSql('DROP TABLE operation');
        $this->addSql('DROP TABLE ressource');
        $this->addSql('DROP TABLE ressources');
        $this->addSql('DROP TABLE sondage');
        $this->addSql('DROP TABLE user');
        $this->addSql('DROP TABLE messenger_messages');
    }
}
