<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210508233917 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE categorias (id INT AUTO_INCREMENT NOT NULL, nombre VARCHAR(100) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE categorias_libros (categorias_id INT NOT NULL, libros_id INT NOT NULL, INDEX IDX_E260C0D25792B277 (categorias_id), INDEX IDX_E260C0D232D1DF44 (libros_id), PRIMARY KEY(categorias_id, libros_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE categorias_libros ADD CONSTRAINT FK_E260C0D25792B277 FOREIGN KEY (categorias_id) REFERENCES categorias (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE categorias_libros ADD CONSTRAINT FK_E260C0D232D1DF44 FOREIGN KEY (libros_id) REFERENCES libros (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE categorias_libros DROP FOREIGN KEY FK_E260C0D25792B277');
        $this->addSql('DROP TABLE categorias');
        $this->addSql('DROP TABLE categorias_libros');
    }
}
