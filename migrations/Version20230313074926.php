<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230313074926 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE participation ADD partie_id INT NOT NULL');
        $this->addSql('ALTER TABLE participation ADD CONSTRAINT FK_AB55E24FE075F7A4 FOREIGN KEY (partie_id) REFERENCES partie (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_AB55E24FE075F7A4 ON participation (partie_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE participation DROP FOREIGN KEY FK_AB55E24FE075F7A4');
        $this->addSql('DROP INDEX UNIQ_AB55E24FE075F7A4 ON participation');
        $this->addSql('ALTER TABLE participation DROP partie_id');
    }
}
