<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240217145048 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE authtoken (idtoken INT UNSIGNED AUTO_INCREMENT NOT NULL, iduser INT UNSIGNED DEFAULT NULL, token VARCHAR(255) NOT NULL, dateT DATE NOT NULL, INDEX IDX_2C3431945E5C27E9 (iduser), PRIMARY KEY(idtoken)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE project (iduser INT UNSIGNED DEFAULT NULL, idProject INT UNSIGNED AUTO_INCREMENT NOT NULL, description VARCHAR(255) NOT NULL, title VARCHAR(255) NOT NULL, issup TINYINT(1) DEFAULT NULL, repeats TINYINT(1) DEFAULT NULL, INDEX IDX_2FB3D0EE5E5C27E9 (iduser), PRIMARY KEY(idProject)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE projecthisto (idHisto INT UNSIGNED AUTO_INCREMENT NOT NULL, histo VARCHAR(255) NOT NULL, idProject INT UNSIGNED DEFAULT NULL, INDEX fk_project_histo (idProject), PRIMARY KEY(idHisto)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE projectstate (idProjectState INT UNSIGNED AUTO_INCREMENT NOT NULL, idState INT UNSIGNED DEFAULT NULL, idProject INT UNSIGNED DEFAULT NULL, INDEX fk_projectState_project (idProject), INDEX fk_projectState_state (idState), PRIMARY KEY(idProjectState)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE task (idtask INT UNSIGNED AUTO_INCREMENT NOT NULL, tasks VARCHAR(255) NOT NULL, dateS DATE, dateF DATE, dateE DATE, isdone TINYINT(1) DEFAULT NULL, idProject INT UNSIGNED DEFAULT NULL, idState INT UNSIGNED DEFAULT NULL, INDEX fk_project_task (idProject), INDEX fk_state_task (idState), PRIMARY KEY(idtask)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE taskstate (idState INT UNSIGNED AUTO_INCREMENT NOT NULL, states VARCHAR(255) NOT NULL, issup TINYINT(1) DEFAULT NULL, color VARCHAR(255) NOT NULL, PRIMARY KEY(idState)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user (iduser INT UNSIGNED AUTO_INCREMENT NOT NULL, username VARCHAR(255) NOT NULL, password VARCHAR(255) NOT NULL, usedark TINYINT(1) DEFAULT NULL, issup TINYINT(1) DEFAULT NULL, PRIMARY KEY(iduser)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE messenger_messages (id BIGINT AUTO_INCREMENT NOT NULL, body LONGTEXT NOT NULL, headers LONGTEXT NOT NULL, queue_name VARCHAR(190) NOT NULL, created_at DATETIME NOT NULL, available_at DATETIME NOT NULL, delivered_at DATETIME DEFAULT NULL, INDEX IDX_75EA56E0FB7336F0 (queue_name), INDEX IDX_75EA56E0E3BD61CE (available_at), INDEX IDX_75EA56E016BA31DB (delivered_at), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE authtoken ADD CONSTRAINT FK_2C3431945E5C27E9 FOREIGN KEY (iduser) REFERENCES user (iduser)');
        $this->addSql('ALTER TABLE project ADD CONSTRAINT FK_2FB3D0EE5E5C27E9 FOREIGN KEY (iduser) REFERENCES user (iduser)');
        $this->addSql('ALTER TABLE projecthisto ADD CONSTRAINT FK_8D13DD293F0ABB1C FOREIGN KEY (idProject) REFERENCES project (idProject)');
        $this->addSql('ALTER TABLE projectstate ADD CONSTRAINT FK_C7276AF8B45791E6 FOREIGN KEY (idState) REFERENCES taskstate (idState)');
        $this->addSql('ALTER TABLE projectstate ADD CONSTRAINT FK_C7276AF83F0ABB1C FOREIGN KEY (idProject) REFERENCES project (idProject)');
        $this->addSql('ALTER TABLE task ADD CONSTRAINT FK_527EDB253F0ABB1C FOREIGN KEY (idProject) REFERENCES project (idProject)');
        $this->addSql('ALTER TABLE task ADD CONSTRAINT FK_527EDB25B45791E6 FOREIGN KEY (idState) REFERENCES taskstate (idState)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE authtoken DROP FOREIGN KEY FK_2C3431945E5C27E9');
        $this->addSql('ALTER TABLE project DROP FOREIGN KEY FK_2FB3D0EE5E5C27E9');
        $this->addSql('ALTER TABLE projecthisto DROP FOREIGN KEY FK_8D13DD293F0ABB1C');
        $this->addSql('ALTER TABLE projectstate DROP FOREIGN KEY FK_C7276AF8B45791E6');
        $this->addSql('ALTER TABLE projectstate DROP FOREIGN KEY FK_C7276AF83F0ABB1C');
        $this->addSql('ALTER TABLE task DROP FOREIGN KEY FK_527EDB253F0ABB1C');
        $this->addSql('ALTER TABLE task DROP FOREIGN KEY FK_527EDB25B45791E6');
        $this->addSql('DROP TABLE authtoken');
        $this->addSql('DROP TABLE project');
        $this->addSql('DROP TABLE projecthisto');
        $this->addSql('DROP TABLE projectstate');
        $this->addSql('DROP TABLE task');
        $this->addSql('DROP TABLE taskstate');
        $this->addSql('DROP TABLE user');
        $this->addSql('DROP TABLE messenger_messages');
    }
}
