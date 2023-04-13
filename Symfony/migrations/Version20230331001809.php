<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230331001809 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE utilisateur DROP name, DROP last_name, DROP user_name, DROP role, DROP image_path, DROP bio, DROP experience, DROP education, DROP total_jobs, DROP rating, DROP domaine, DROP info, DROP location, DROP nbe, DROP is_banned, CHANGE email email VARCHAR(180) NOT NULL');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_1D1C63B3E7927C74 ON utilisateur (email)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP INDEX UNIQ_1D1C63B3E7927C74 ON utilisateur');
        $this->addSql('ALTER TABLE utilisateur ADD name VARCHAR(255) DEFAULT NULL, ADD last_name VARCHAR(255) DEFAULT NULL, ADD user_name VARCHAR(255) DEFAULT NULL, ADD role VARCHAR(255) NOT NULL, ADD image_path VARCHAR(255) NOT NULL, ADD bio VARCHAR(255) DEFAULT NULL, ADD experience VARCHAR(255) DEFAULT NULL, ADD education VARCHAR(255) DEFAULT NULL, ADD total_jobs INT DEFAULT NULL, ADD rating INT DEFAULT NULL, ADD domaine VARCHAR(255) DEFAULT NULL, ADD info VARCHAR(255) DEFAULT NULL, ADD location VARCHAR(255) DEFAULT NULL, ADD nbe INT DEFAULT NULL, ADD is_banned INT NOT NULL, CHANGE email email VARCHAR(255) NOT NULL');
    }
}
