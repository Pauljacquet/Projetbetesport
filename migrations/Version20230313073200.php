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

        $this->addSql('ALTER TABLE mise ADD partie_id INT NOT NULL, ADD equipe_id INT NOT NULL');
        $this->addSql('ALTER TABLE mise ADD CONSTRAINT FK_96C4BF8FE075F7A4 FOREIGN KEY (partie_id) REFERENCES partie (id)');
        $this->addSql('ALTER TABLE mise ADD CONSTRAINT FK_96C4BF8F6D861B89 FOREIGN KEY (equipe_id) REFERENCES equipe (id)');
        $this->addSql('CREATE INDEX IDX_96C4BF8FE075F7A4 ON mise (partie_id)');
        $this->addSql('CREATE INDEX IDX_96C4BF8F6D861B89 ON mise (equipe_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE mise DROP FOREIGN KEY FK_96C4BF8F5B88835D');
        $this->addSql('ALTER TABLE mise DROP FOREIGN KEY FK_96C4BF8FE075F7A4');
        $this->addSql('ALTER TABLE mise DROP FOREIGN KEY FK_96C4BF8F6D861B89');
        $this->addSql('DROP INDEX IDX_96C4BF8FE075F7A4 ON mise');
        $this->addSql('DROP INDEX IDX_96C4BF8F6D861B89 ON mise');
        $this->addSql('ALTER TABLE mise DROP partie_id, DROP equipe_id');
        $this->addSql('DROP TABLE mise');
    }
}
