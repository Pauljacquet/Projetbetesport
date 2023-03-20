<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230316074912 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, username VARCHAR(180) NOT NULL, roles JSON NOT NULL, password VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_8D93D649F85E0677 (username), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE parieur ADD CONSTRAINT FK_D5CF4CE4FB88E14F FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE tournoi ADD user_id INT NOT NULL');
        $this->addSql('ALTER TABLE tournoi ADD CONSTRAINT FK_18AFD9DFFB88E14F FOREIGN KEY (use_id) REFERENCES user (id)');
        $this->addSql('CREATE INDEX IDX_18AFD9DFFB88E14F ON tournoi (user_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE parieur DROP FOREIGN KEY FK_D5CF4CE4FB88E14F');
        $this->addSql('ALTER TABLE tournoi DROP FOREIGN KEY FK_18AFD9DFFB88E14F');
        $this->addSql('DROP TABLE user');
        $this->addSql('DROP TABLE user');
        $this->addSql('DROP INDEX IDX_18AFD9DFFB88E14F ON tournoi');
        $this->addSql('ALTER TABLE tournoi DROP user_id');
    }
}
