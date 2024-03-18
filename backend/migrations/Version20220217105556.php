<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220217105556 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE event (id INT AUTO_INCREMENT NOT NULL, id_user_id INT NOT NULL, id_event VARCHAR(255) NOT NULL, INDEX IDX_3BAE0AA779F37AE5 (id_user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE msg (id INT AUTO_INCREMENT NOT NULL, id_sender_id INT NOT NULL, id_reciever_id INT NOT NULL, message VARCHAR(255) NOT NULL, INDEX IDX_688A5FAF76110FBA (id_sender_id), INDEX IDX_688A5FAF454E5F7A (id_reciever_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, email VARCHAR(180) NOT NULL, roles JSON NOT NULL, password VARCHAR(255) NOT NULL, name VARCHAR(255) DEFAULT NULL, prenom VARCHAR(255) DEFAULT NULL, adresse VARCHAR(255) DEFAULT NULL, UNIQUE INDEX UNIQ_8D93D649E7927C74 (email), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE event ADD CONSTRAINT FK_3BAE0AA779F37AE5 FOREIGN KEY (id_user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE msg ADD CONSTRAINT FK_688A5FAF76110FBA FOREIGN KEY (id_sender_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE msg ADD CONSTRAINT FK_688A5FAF454E5F7A FOREIGN KEY (id_reciever_id) REFERENCES user (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE event DROP FOREIGN KEY FK_3BAE0AA779F37AE5');
        $this->addSql('ALTER TABLE msg DROP FOREIGN KEY FK_688A5FAF76110FBA');
        $this->addSql('ALTER TABLE msg DROP FOREIGN KEY FK_688A5FAF454E5F7A');
        $this->addSql('DROP TABLE event');
        $this->addSql('DROP TABLE msg');
        $this->addSql('DROP TABLE user');
    }
}
