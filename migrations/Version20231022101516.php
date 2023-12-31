<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20231022101516 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE image DROP is_primary');
        $this->addSql('ALTER TABLE trick ADD primary_image_id INT NOT NULL');
        $this->addSql('ALTER TABLE trick ADD CONSTRAINT FK_D8F0A91E1CDA489C FOREIGN KEY (primary_image_id) REFERENCES image (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_D8F0A91E1CDA489C ON trick (primary_image_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE trick DROP FOREIGN KEY FK_D8F0A91E1CDA489C');
        $this->addSql('DROP INDEX UNIQ_D8F0A91E1CDA489C ON trick');
        $this->addSql('ALTER TABLE trick DROP primary_image_id');
        $this->addSql('ALTER TABLE image ADD is_primary TINYINT(1) NOT NULL');
    }
}
