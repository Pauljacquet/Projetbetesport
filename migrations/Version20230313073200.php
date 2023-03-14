<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230313073200 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE mise (id INT AUTO_INCREMENT NOT NULL, parieurs_id INT NOT NULL, montant INT NOT NULL, gain INT NOT NULL, INDEX IDX_96C4BF8F5B88835D (parieurs_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE mise ADD CONSTRAINT FK_96C4BF8F5B88835D FOREIGN KEY (parieurs_id) REFERENCES parieur (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE mise DROP FOREIGN KEY FK_96C4BF8F5B88835D');
        $this->addSql('DROP TABLE mise');
    }
}
