<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210329123034 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE categorie_jeuxvideo (categorie_id INT NOT NULL, jeuxvideo_id INT NOT NULL, INDEX IDX_F9D4E35DBCF5E72D (categorie_id), INDEX IDX_F9D4E35D8FCB884A (jeuxvideo_id), PRIMARY KEY(categorie_id, jeuxvideo_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE commentaire (id INT AUTO_INCREMENT NOT NULL, user_id INT NOT NULL, comment LONGTEXT NOT NULL, INDEX IDX_67F068BCA76ED395 (user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE categorie_jeuxvideo ADD CONSTRAINT FK_F9D4E35DBCF5E72D FOREIGN KEY (categorie_id) REFERENCES categorie (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE categorie_jeuxvideo ADD CONSTRAINT FK_F9D4E35D8FCB884A FOREIGN KEY (jeuxvideo_id) REFERENCES jeuxvideo (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE commentaire ADD CONSTRAINT FK_67F068BCA76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('DROP TABLE image_jeuxvideo');
        $this->addSql('DROP TABLE plateforme_jeuxvideo');
        $this->addSql('ALTER TABLE categorie CHANGE image picture VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE image DROP FOREIGN KEY FK_C53D045FA76ED395');
        $this->addSql('DROP INDEX IDX_C53D045FA76ED395 ON image');
        $this->addSql('ALTER TABLE image ADD jeuxvideo_id INT NOT NULL, DROP user_id');
        $this->addSql('ALTER TABLE image ADD CONSTRAINT FK_C53D045F8FCB884A FOREIGN KEY (jeuxvideo_id) REFERENCES jeuxvideo (id)');
        $this->addSql('CREATE INDEX IDX_C53D045F8FCB884A ON image (jeuxvideo_id)');
        $this->addSql('ALTER TABLE jeuxvideo DROP FOREIGN KEY FK_548BEC5ABCF5E72D');
        $this->addSql('DROP INDEX IDX_548BEC5ABCF5E72D ON jeuxvideo');
        $this->addSql('ALTER TABLE jeuxvideo DROP categorie_id');
        $this->addSql('ALTER TABLE plateforme ADD user_id INT NOT NULL, ADD name VARCHAR(255) NOT NULL, ADD picture VARCHAR(255) NOT NULL, DROP console, DROP image');
        $this->addSql('ALTER TABLE plateforme ADD CONSTRAINT FK_3C020C11A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('CREATE INDEX IDX_3C020C11A76ED395 ON plateforme (user_id)');
        $this->addSql('ALTER TABLE user DROP FOREIGN KEY FK_8D93D649391E226B');
        $this->addSql('DROP INDEX IDX_8D93D649391E226B ON user');
        $this->addSql('ALTER TABLE user ADD gender TINYINT(1) NOT NULL, ADD is_verified TINYINT(1) NOT NULL, DROP plateforme_id');
        $this->addSql('ALTER TABLE video DROP FOREIGN KEY FK_7CC7DA2CA76ED395');
        $this->addSql('DROP INDEX IDX_7CC7DA2CA76ED395 ON video');
        $this->addSql('ALTER TABLE video DROP user_id, DROP description, CHANGE jeuxvideo_id jeuxvideo_id INT NOT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE image_jeuxvideo (image_id INT NOT NULL, jeuxvideo_id INT NOT NULL, INDEX IDX_8C09370E8FCB884A (jeuxvideo_id), INDEX IDX_8C09370E3DA5256D (image_id), PRIMARY KEY(image_id, jeuxvideo_id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE plateforme_jeuxvideo (plateforme_id INT NOT NULL, jeuxvideo_id INT NOT NULL, INDEX IDX_1AA99CDE8FCB884A (jeuxvideo_id), INDEX IDX_1AA99CDE391E226B (plateforme_id), PRIMARY KEY(plateforme_id, jeuxvideo_id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE image_jeuxvideo ADD CONSTRAINT FK_8C09370E3DA5256D FOREIGN KEY (image_id) REFERENCES image (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE image_jeuxvideo ADD CONSTRAINT FK_8C09370E8FCB884A FOREIGN KEY (jeuxvideo_id) REFERENCES jeuxvideo (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE plateforme_jeuxvideo ADD CONSTRAINT FK_1AA99CDE391E226B FOREIGN KEY (plateforme_id) REFERENCES plateforme (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE plateforme_jeuxvideo ADD CONSTRAINT FK_1AA99CDE8FCB884A FOREIGN KEY (jeuxvideo_id) REFERENCES jeuxvideo (id) ON DELETE CASCADE');
        $this->addSql('DROP TABLE categorie_jeuxvideo');
        $this->addSql('DROP TABLE commentaire');
        $this->addSql('ALTER TABLE categorie CHANGE picture image VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE image DROP FOREIGN KEY FK_C53D045F8FCB884A');
        $this->addSql('DROP INDEX IDX_C53D045F8FCB884A ON image');
        $this->addSql('ALTER TABLE image ADD user_id INT DEFAULT NULL, DROP jeuxvideo_id');
        $this->addSql('ALTER TABLE image ADD CONSTRAINT FK_C53D045FA76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('CREATE INDEX IDX_C53D045FA76ED395 ON image (user_id)');
        $this->addSql('ALTER TABLE jeuxvideo ADD categorie_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE jeuxvideo ADD CONSTRAINT FK_548BEC5ABCF5E72D FOREIGN KEY (categorie_id) REFERENCES categorie (id)');
        $this->addSql('CREATE INDEX IDX_548BEC5ABCF5E72D ON jeuxvideo (categorie_id)');
        $this->addSql('ALTER TABLE plateforme DROP FOREIGN KEY FK_3C020C11A76ED395');
        $this->addSql('DROP INDEX IDX_3C020C11A76ED395 ON plateforme');
        $this->addSql('ALTER TABLE plateforme ADD console VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, ADD image VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, DROP user_id, DROP name, DROP picture');
        $this->addSql('ALTER TABLE user ADD plateforme_id INT DEFAULT NULL, DROP gender, DROP is_verified');
        $this->addSql('ALTER TABLE user ADD CONSTRAINT FK_8D93D649391E226B FOREIGN KEY (plateforme_id) REFERENCES plateforme (id)');
        $this->addSql('CREATE INDEX IDX_8D93D649391E226B ON user (plateforme_id)');
        $this->addSql('ALTER TABLE video ADD user_id INT DEFAULT NULL, ADD description LONGTEXT CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE jeuxvideo_id jeuxvideo_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE video ADD CONSTRAINT FK_7CC7DA2CA76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('CREATE INDEX IDX_7CC7DA2CA76ED395 ON video (user_id)');
    }
}
