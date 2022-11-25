<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20221125135156 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE lesson_section (id INT AUTO_INCREMENT NOT NULL, lesson_section_id INT NOT NULL, name VARCHAR(255) NOT NULL, INDEX IDX_D80F2848D52AAAAB (lesson_section_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE lesson_section ADD CONSTRAINT FK_D80F2848D52AAAAB FOREIGN KEY (lesson_section_id) REFERENCES lessons (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE lesson_section DROP FOREIGN KEY FK_D80F2848D52AAAAB');
        $this->addSql('DROP TABLE lesson_section');
    }
}
