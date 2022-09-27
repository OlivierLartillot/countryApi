<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220927195806 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE endpoint (id INT AUTO_INCREMENT NOT NULL, enpoint_category_id INT NOT NULL, description LONGTEXT NOT NULL, endpoint LONGTEXT NOT NULL, INDEX IDX_C4420F7B9C9E57BA (enpoint_category_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE enpoint_category (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE endpoint ADD CONSTRAINT FK_C4420F7B9C9E57BA FOREIGN KEY (enpoint_category_id) REFERENCES enpoint_category (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE endpoint DROP FOREIGN KEY FK_C4420F7B9C9E57BA');
        $this->addSql('DROP TABLE endpoint');
        $this->addSql('DROP TABLE enpoint_category');
    }
}
