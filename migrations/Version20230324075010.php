<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230324075010 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE parieur DROP FOREIGN KEY FK_D5CF4CE4FB88E14F');
        $this->addSql('DROP INDEX UNIQ_D5CF4CE4FB88E14F ON parieur');
        $this->addSql('ALTER TABLE parieur CHANGE utilisateur_id user_id INT NOT NULL');
        $this->addSql('ALTER TABLE parieur ADD CONSTRAINT FK_D5CF4CE4A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_D5CF4CE4A76ED395 ON parieur (user_id)');
        $this->addSql('ALTER TABLE tournoi DROP FOREIGN KEY FK_18AFD9DFFB88E14F');
        $this->addSql('DROP INDEX IDX_18AFD9DFFB88E14F ON tournoi');
        $this->addSql('ALTER TABLE tournoi CHANGE utilisateur_id user_id INT NOT NULL');
        $this->addSql('ALTER TABLE tournoi ADD CONSTRAINT FK_18AFD9DFA76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('CREATE INDEX IDX_18AFD9DFA76ED395 ON tournoi (user_id)');
        $this->addSql('ALTER TABLE user DROP email, CHANGE is_admin is_verified TINYINT(1) NOT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE tournoi DROP FOREIGN KEY FK_18AFD9DFA76ED395');
        $this->addSql('DROP INDEX IDX_18AFD9DFA76ED395 ON tournoi');
        $this->addSql('ALTER TABLE tournoi CHANGE user_id utilisateur_id INT NOT NULL');
        $this->addSql('ALTER TABLE tournoi ADD CONSTRAINT FK_18AFD9DFFB88E14F FOREIGN KEY (utilisateur_id) REFERENCES utilisateur (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('CREATE INDEX IDX_18AFD9DFFB88E14F ON tournoi (utilisateur_id)');
        $this->addSql('ALTER TABLE parieur DROP FOREIGN KEY FK_D5CF4CE4A76ED395');
        $this->addSql('DROP INDEX UNIQ_D5CF4CE4A76ED395 ON parieur');
        $this->addSql('ALTER TABLE parieur CHANGE user_id utilisateur_id INT NOT NULL');
        $this->addSql('ALTER TABLE parieur ADD CONSTRAINT FK_D5CF4CE4FB88E14F FOREIGN KEY (utilisateur_id) REFERENCES utilisateur (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_D5CF4CE4FB88E14F ON parieur (utilisateur_id)');
        $this->addSql('ALTER TABLE user ADD email VARCHAR(255) NOT NULL, CHANGE is_verified is_admin TINYINT(1) NOT NULL');
    }
}
