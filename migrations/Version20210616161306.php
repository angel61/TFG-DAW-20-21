<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210616161306 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE comentarios ADD padre_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE comentarios ADD CONSTRAINT FK_F54B3FC0613CEC58 FOREIGN KEY (padre_id) REFERENCES comentarios (id)');
        $this->addSql('CREATE INDEX IDX_F54B3FC0613CEC58 ON comentarios (padre_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE comentarios DROP FOREIGN KEY FK_F54B3FC0613CEC58');
        $this->addSql('DROP INDEX IDX_F54B3FC0613CEC58 ON comentarios');
        $this->addSql('ALTER TABLE comentarios DROP padre_id');
    }
}
