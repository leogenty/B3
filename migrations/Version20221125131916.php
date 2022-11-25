<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20221125131916 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE lessons (id INT AUTO_INCREMENT NOT NULL, matter_id INT NOT NULL, titre VARCHAR(255) NOT NULL, desciption LONGTEXT NOT NULL, position INT NOT NULL, INDEX IDX_3F4218D9D614E59F (matter_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE matter (id INT AUTO_INCREMENT NOT NULL, title VARCHAR(255) NOT NULL, description LONGTEXT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE lessons ADD CONSTRAINT FK_3F4218D9D614E59F FOREIGN KEY (matter_id) REFERENCES matter (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE lessons DROP FOREIGN KEY FK_3F4218D9D614E59F');
        $this->addSql('DROP TABLE lessons');
        $this->addSql('DROP TABLE matter');
    }
}
