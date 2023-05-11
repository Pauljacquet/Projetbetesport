<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230223144623 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE tournoi (id INT AUTO_INCREMENT NOT NULL, user_id INT NOT NULL, jeu_id INT NOT NULL, titre VARCHAR(255) NOT NULL, nb_equipes INT NOT NULL, date DATETIME NOT NULL, INDEX IDX_18AFD9DFFB88E14F (user_id), INDEX IDX_18AFD9DF8C9E392E (jeu_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');

        $this->addSql('ALTER TABLE tournoi ADD CONSTRAINT FK_18AFD9DFFB88E14F FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE tournoi ADD CONSTRAINT FK_18AFD9DF8C9E392E FOREIGN KEY (jeu_id) REFERENCES jeu (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE tournoi DROP FOREIGN KEY FK_18AFD9DFFB88E14F');
        $this->addSql('ALTER TABLE tournoi DROP FOREIGN KEY FK_18AFD9DF8C9E392E');
        $this->addSql('DROP TABLE tournoi');
    }
}
