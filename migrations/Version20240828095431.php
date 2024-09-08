<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240828095431 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE intervention CHANGE date date DATETIME DEFAULT NULL');
        $this->addSql('ALTER TABLE technicien CHANGE prenom prenom VARCHAR(255) DEFAULT NULL, CHANGE matricule matricule VARCHAR(255) DEFAULT NULL, CHANGE email email VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE users ADD noms VARCHAR(255) NOT NULL, ADD prenoms VARCHAR(255) DEFAULT NULL, ADD nom_utilisateur VARCHAR(255) NOT NULL, ADD matricule VARCHAR(255) DEFAULT NULL, ADD service VARCHAR(255) DEFAULT NULL, CHANGE roles roles JSON NOT NULL, CHANGE fonction fonction VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE messenger_messages CHANGE delivered_at delivered_at DATETIME DEFAULT NULL COMMENT \'(DC2Type:datetime_immutable)\'');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE intervention CHANGE date date DATETIME DEFAULT \'NULL\'');
        $this->addSql('ALTER TABLE messenger_messages CHANGE delivered_at delivered_at DATETIME DEFAULT \'NULL\' COMMENT \'(DC2Type:datetime_immutable)\'');
        $this->addSql('ALTER TABLE technicien CHANGE prenom prenom VARCHAR(255) DEFAULT \'NULL\', CHANGE matricule matricule VARCHAR(255) DEFAULT \'NULL\', CHANGE email email VARCHAR(255) DEFAULT \'NULL\'');
        $this->addSql('ALTER TABLE users DROP noms, DROP prenoms, DROP nom_utilisateur, DROP matricule, DROP service, CHANGE roles roles LONGTEXT NOT NULL COLLATE `utf8mb4_bin`, CHANGE fonction fonction VARCHAR(255) DEFAULT \'NULL\'');
    }
}
