<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20221214143331 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE `group` DROP FOREIGN KEY FK_6DC044C5A6CC7B2');
        $this->addSql('DROP INDEX IDX_6DC044C5A6CC7B2 ON `group`');
        $this->addSql('ALTER TABLE `group` DROP eleve_id');
        $this->addSql('ALTER TABLE user DROP FOREIGN KEY FK_8D93D6497A45358C');
        $this->addSql('DROP INDEX IDX_8D93D6497A45358C ON user');
        $this->addSql('ALTER TABLE user DROP groupe_id');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE `group` ADD eleve_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE `group` ADD CONSTRAINT FK_6DC044C5A6CC7B2 FOREIGN KEY (eleve_id) REFERENCES user (id)');
        $this->addSql('CREATE INDEX IDX_6DC044C5A6CC7B2 ON `group` (eleve_id)');
        $this->addSql('ALTER TABLE user ADD groupe_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE user ADD CONSTRAINT FK_8D93D6497A45358C FOREIGN KEY (groupe_id) REFERENCES `group` (id)');
        $this->addSql('CREATE INDEX IDX_8D93D6497A45358C ON user (groupe_id)');
    }
}
