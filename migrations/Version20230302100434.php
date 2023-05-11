<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230302100434 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE participation (id INT AUTO_INCREMENT NOT NULL, num_equipe TINYINT(1) NOT NULL, resultat INT NOT NULL, cote INT NOT NULL, is_gagnant TINYINT(1) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE participation ADD equipe_id INT NOT NULL');
        $this->addSql('ALTER TABLE participation ADD CONSTRAINT FK_2449BA156ACE3B73 FOREIGN KEY (equipe_id) REFERENCES equipe (id)');
        $this->addSql('CREATE INDEX IDX_2449BA156ACE3B73 ON participation (equipe_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE equipe DROP FOREIGN KEY FK_2449BA156ACE3B73');
        $this->addSql('DROP TABLE participation');
        $this->addSql('DROP INDEX IDX_2449BA156ACE3B73 ON equipe');
        $this->addSql('ALTER TABLE equipe DROP participation_id');
    }
}
