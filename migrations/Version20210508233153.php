<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210508233153 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE autores (id INT AUTO_INCREMENT NOT NULL, nombre VARCHAR(25) NOT NULL, apellidos VARCHAR(50) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE editoriales (id INT AUTO_INCREMENT NOT NULL, nombre VARCHAR(100) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE libros (id INT AUTO_INCREMENT NOT NULL, id_autor_id INT NOT NULL, id_editorial_id INT NOT NULL, nombre VARCHAR(150) NOT NULL, url_compra VARCHAR(150) NOT NULL, isbn VARCHAR(13) NOT NULL, ean VARCHAR(13) NOT NULL, paginas INT NOT NULL, descripcion_corta LONGTEXT NOT NULL, descripcion LONGTEXT NOT NULL, descripcion_larga LONGTEXT NOT NULL, fecha_publicacion DATE NOT NULL, idioma VARCHAR(30) NOT NULL, destacado SMALLINT NOT NULL, precio DOUBLE PRECISION NOT NULL, activo SMALLINT NOT NULL, inicio_descuento DATE NOT NULL, fin_descuento DATE NOT NULL, descuento NUMERIC(5, 2) NOT NULL, top_ventas SMALLINT NOT NULL, INDEX IDX_B7E5AFE6440FB72B (id_autor_id), INDEX IDX_B7E5AFE69930D73F (id_editorial_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE libros ADD CONSTRAINT FK_B7E5AFE6440FB72B FOREIGN KEY (id_autor_id) REFERENCES autores (id)');
        $this->addSql('ALTER TABLE libros ADD CONSTRAINT FK_B7E5AFE69930D73F FOREIGN KEY (id_editorial_id) REFERENCES editoriales (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE libros DROP FOREIGN KEY FK_B7E5AFE6440FB72B');
        $this->addSql('ALTER TABLE libros DROP FOREIGN KEY FK_B7E5AFE69930D73F');
        $this->addSql('DROP TABLE autores');
        $this->addSql('DROP TABLE editoriales');
        $this->addSql('DROP TABLE libros');
    }
}
