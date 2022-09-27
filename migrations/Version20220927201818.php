<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220927201818 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE endpoint DROP FOREIGN KEY FK_C4420F7B9C9E57BA');
        $this->addSql('CREATE TABLE endpoint_category (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('DROP TABLE enpoint_category');
        $this->addSql('DROP INDEX IDX_C4420F7B9C9E57BA ON endpoint');
        $this->addSql('ALTER TABLE endpoint CHANGE enpoint_category_id endpoint_category_id INT NOT NULL');
        $this->addSql('ALTER TABLE endpoint ADD CONSTRAINT FK_C4420F7BF5BF7BF9 FOREIGN KEY (endpoint_category_id) REFERENCES endpoint_category (id)');
        $this->addSql('CREATE INDEX IDX_C4420F7BF5BF7BF9 ON endpoint (endpoint_category_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE endpoint DROP FOREIGN KEY FK_C4420F7BF5BF7BF9');
        $this->addSql('CREATE TABLE enpoint_category (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('DROP TABLE endpoint_category');
        $this->addSql('DROP INDEX IDX_C4420F7BF5BF7BF9 ON endpoint');
        $this->addSql('ALTER TABLE endpoint CHANGE endpoint_category_id enpoint_category_id INT NOT NULL');
        $this->addSql('ALTER TABLE endpoint ADD CONSTRAINT FK_C4420F7B9C9E57BA FOREIGN KEY (enpoint_category_id) REFERENCES enpoint_category (id)');
        $this->addSql('CREATE INDEX IDX_C4420F7B9C9E57BA ON endpoint (enpoint_category_id)');
    }
}
