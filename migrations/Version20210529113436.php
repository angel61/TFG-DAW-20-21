<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210529113436 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE admin (id INT AUTO_INCREMENT NOT NULL, email VARCHAR(180) NOT NULL, roles LONGTEXT NOT NULL COMMENT \'(DC2Type:json)\', password VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_880E0D76E7927C74 (email), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE libros_autores (libros_id INT NOT NULL, autores_id INT NOT NULL, INDEX IDX_66DC967432D1DF44 (libros_id), INDEX IDX_66DC9674C5CD6563 (autores_id), PRIMARY KEY(libros_id, autores_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE libros_autores ADD CONSTRAINT FK_66DC967432D1DF44 FOREIGN KEY (libros_id) REFERENCES libros (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE libros_autores ADD CONSTRAINT FK_66DC9674C5CD6563 FOREIGN KEY (autores_id) REFERENCES autores (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE libros DROP FOREIGN KEY FK_B7E5AFE614D45BBE');
        $this->addSql('DROP INDEX IDX_B7E5AFE614D45BBE ON libros');
        $this->addSql('ALTER TABLE libros DROP autor_id');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE admin');
        $this->addSql('DROP TABLE libros_autores');
        $this->addSql('ALTER TABLE libros ADD autor_id INT NOT NULL');
        $this->addSql('ALTER TABLE libros ADD CONSTRAINT FK_B7E5AFE614D45BBE FOREIGN KEY (autor_id) REFERENCES autores (id)');
        $this->addSql('CREATE INDEX IDX_B7E5AFE614D45BBE ON libros (autor_id)');
    }
}
