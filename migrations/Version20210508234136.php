<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210508234136 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE libros CHANGE destacado destacado TINYINT(1) NOT NULL, CHANGE activo activo TINYINT(1) NOT NULL, CHANGE top_ventas top_ventas TINYINT(1) NOT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE libros CHANGE destacado destacado SMALLINT NOT NULL, CHANGE activo activo SMALLINT NOT NULL, CHANGE top_ventas top_ventas SMALLINT NOT NULL');
    }
}
