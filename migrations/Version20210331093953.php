<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210331093953 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE plateforme_jeuxvideo (plateforme_id INT NOT NULL, jeuxvideo_id INT NOT NULL, INDEX IDX_1AA99CDE391E226B (plateforme_id), INDEX IDX_1AA99CDE8FCB884A (jeuxvideo_id), PRIMARY KEY(plateforme_id, jeuxvideo_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE plateforme_jeuxvideo ADD CONSTRAINT FK_1AA99CDE391E226B FOREIGN KEY (plateforme_id) REFERENCES plateforme (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE plateforme_jeuxvideo ADD CONSTRAINT FK_1AA99CDE8FCB884A FOREIGN KEY (jeuxvideo_id) REFERENCES jeuxvideo (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE plateforme_jeuxvideo');
    }
}
