<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210331094946 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE commentaire ADD jeuxvideo_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE commentaire ADD CONSTRAINT FK_67F068BC8FCB884A FOREIGN KEY (jeuxvideo_id) REFERENCES jeuxvideo (id)');
        $this->addSql('CREATE INDEX IDX_67F068BC8FCB884A ON commentaire (jeuxvideo_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE commentaire DROP FOREIGN KEY FK_67F068BC8FCB884A');
        $this->addSql('DROP INDEX IDX_67F068BC8FCB884A ON commentaire');
        $this->addSql('ALTER TABLE commentaire DROP jeuxvideo_id');
    }
}
