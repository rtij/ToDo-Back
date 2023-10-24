<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230810121344 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE authtoken (idtoken INT UNSIGNED AUTO_INCREMENT NOT NULL, idutilisateur BIGINT UNSIGNED DEFAULT NULL, token VARCHAR(255) NOT NULL, dateT DATE NOT NULL, INDEX fk_authtoken_utilisateur (idutilisateur), PRIMARY KEY(idtoken)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE autreService (idAutreS INT UNSIGNED AUTO_INCREMENT NOT NULL, libelle VARCHAR(255) DEFAULT NULL, tarif NUMERIC(20, 2) DEFAULT NULL, issup TINYINT(1) DEFAULT NULL, PRIMARY KEY(idAutreS)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE chambre (idchambre INT UNSIGNED AUTO_INCREMENT NOT NULL, num VARCHAR(255) NOT NULL, nbrP INT UNSIGNED DEFAULT NULL, issup TINYINT(1) DEFAULT NULL, idTypeC INT UNSIGNED DEFAULT NULL, INDEX fk_chambre_typechambre (idTypeC), PRIMARY KEY(idchambre)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE charge (idcharge INT UNSIGNED AUTO_INCREMENT NOT NULL, libelle VARCHAR(255) DEFAULT NULL, montant NUMERIC(20, 2) DEFAULT NULL, PRIMARY KEY(idcharge)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE client (IDClient INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) DEFAULT \'NULL\', adresse VARCHAR(255) DEFAULT \'NULL\', email VARCHAR(255) DEFAULT \'NULL\', nationalite VARCHAR(255) DEFAULT \'NULL\', emailag VARCHAR(255) DEFAULT \'NULL\', tel VARCHAR(255) DEFAULT \'NULL\', nif VARCHAR(255) DEFAULT \'NULL\', stat VARCHAR(255) DEFAULT \'NULL\', rc VARCHAR(255) DEFAULT \'NULL\', compte NUMERIC(24, 2) DEFAULT \'0.000\', agent VARCHAR(255) DEFAULT \'NULL\', agence TINYINT(1) DEFAULT NULL, fidele TINYINT(1) DEFAULT NULL, issup TINYINT(1) DEFAULT NULL, PRIMARY KEY(IDClient)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE depense (iddepense INT UNSIGNED AUTO_INCREMENT NOT NULL, idtyped INT UNSIGNED DEFAULT NULL, idutilisateur BIGINT UNSIGNED DEFAULT NULL, dateD DATE NOT NULL, reference VARCHAR(255) DEFAULT NULL, libelle VARCHAR(255) DEFAULT NULL, montant NUMERIC(20, 2) DEFAULT NULL, issup TINYINT(1) DEFAULT NULL, INDEX fk_depense_typed (idtyped), INDEX fk_depense_utilisateur (idutilisateur), PRIMARY KEY(iddepense)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE detailE (iddetaile INT UNSIGNED AUTO_INCREMENT NOT NULL, identree INT UNSIGNED DEFAULT NULL, idstock BIGINT DEFAULT NULL, qte NUMERIC(20, 2) DEFAULT \'0.000\', prixa NUMERIC(20, 2) DEFAULT \'0.000\', INDEX IDX_BD9C9E133D3EDA0A (identree), INDEX IDX_BD9C9E139D333A79 (idstock), PRIMARY KEY(iddetaile)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE detailreservation (idDetailR INT AUTO_INCREMENT NOT NULL, tarif NUMERIC(20, 2) NOT NULL, Mont NUMERIC(20, 2) NOT NULL, Remise NUMERIC(20, 2) NOT NULL, puescompte NUMERIC(20, 2) NOT NULL, Nbr INT NOT NULL, idTypeC INT UNSIGNED DEFAULT NULL, idReservation INT DEFAULT NULL, INDEX IDX_9A9909FB682DFA81 (idTypeC), INDEX IDX_9A9909FB295B62D (idReservation), PRIMARY KEY(idDetailR)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE details (idsortie INT UNSIGNED DEFAULT NULL, idstock BIGINT DEFAULT NULL, iddetailS INT UNSIGNED AUTO_INCREMENT NOT NULL, qte NUMERIC(20, 2) DEFAULT \'0.000\', affectation VARCHAR(255) DEFAULT NULL, INDEX IDX_72260B8A58827E5E (idsortie), INDEX IDX_72260B8A9D333A79 (idstock), PRIMARY KEY(iddetailS)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE detautreservice (iddetautre INT AUTO_INCREMENT NOT NULL, duree NUMERIC(20, 2) NOT NULL, tarif NUMERIC(20, 2) NOT NULL, montant NUMERIC(20, 2) NOT NULL, Nbr INT NOT NULL, remise NUMERIC(20, 2) NOT NULL, idReservation INT DEFAULT NULL, idAutreS INT UNSIGNED DEFAULT NULL, INDEX IDX_942D2F25295B62D (idReservation), INDEX IDX_942D2F257989AE20 (idAutreS), PRIMARY KEY(iddetautre)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE detrestauration (iddetrestauration INT AUTO_INCREMENT NOT NULL, idreservation INT DEFAULT NULL, nbr NUMERIC(20, 2) NOT NULL, duree NUMERIC(20, 2) NOT NULL, montant NUMERIC(20, 2) NOT NULL, remise NUMERIC(20, 2) NOT NULL, INDEX IDX_9FFC0CAF840939FA (idreservation), PRIMARY KEY(iddetrestauration)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE enregistrement (idenregistrement INT UNSIGNED AUTO_INCREMENT NOT NULL, idchambre INT UNSIGNED DEFAULT NULL, DateA DATE NOT NULL, DateD DATE NOT NULL, DateN DATE NOT NULL, Adresse VARCHAR(255) DEFAULT NULL, NomPrenom VARCHAR(255) DEFAULT NULL, nationalite VARCHAR(255) DEFAULT NULL, CIN VARCHAR(255) DEFAULT NULL, Profession VARCHAR(255) DEFAULT NULL, AllantA VARCHAR(255) DEFAULT NULL, VenatnD VARCHAR(255) DEFAULT NULL, Duree INT NOT NULL, ValiditeV INT NOT NULL, INDEX IDX_15FA02F1A0DB691 (idchambre), PRIMARY KEY(idenregistrement)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE entrestock (identree INT UNSIGNED AUTO_INCREMENT NOT NULL, numE VARCHAR(255) NOT NULL, dateE DATE NOT NULL, PRIMARY KEY(identree)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE famille (idfamille INT UNSIGNED AUTO_INCREMENT NOT NULL, libelle VARCHAR(255) NOT NULL, issup TINYINT(1) DEFAULT NULL, PRIMARY KEY(idfamille)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE histoinventaire (idhistoi INT UNSIGNED AUTO_INCREMENT NOT NULL, idstock BIGINT DEFAULT NULL, datei DATE NOT NULL, qtet NUMERIC(20, 2) DEFAULT \'0.000\', qter NUMERIC(20, 2) DEFAULT \'0.000\', observation VARCHAR(255) DEFAULT \'NULL\', INDEX IDX_4BB27A439D333A79 (idstock), PRIMARY KEY(idhistoi)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE histostock (idstock BIGINT DEFAULT NULL, idHistoStock INT UNSIGNED AUTO_INCREMENT NOT NULL, libelle VARCHAR(150) DEFAULT \'NULL\', dateh DATE NOT NULL, Entree NUMERIC(20, 2) DEFAULT \'0.000\', Sortie NUMERIC(20, 2) DEFAULT \'0.000\', Stock NUMERIC(20, 2) DEFAULT \'0.000\', numBon VARCHAR(150) DEFAULT \'NULL\', INDEX IDX_9F3465B49D333A79 (idstock), PRIMARY KEY(idHistoStock)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE ingredient (idingredient BIGINT AUTO_INCREMENT NOT NULL, idproduit BIGINT DEFAULT NULL, idmatiere BIGINT DEFAULT NULL, qte NUMERIC(20, 2) DEFAULT \'0.000\', INDEX IDX_6BAF7870F6A1BE49 (idproduit), INDEX IDX_6BAF78704F100524 (idmatiere), PRIMARY KEY(idingredient)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE planning (idchambre INT UNSIGNED DEFAULT NULL, idPlanning INT AUTO_INCREMENT NOT NULL, issup TINYINT(1) DEFAULT NULL, DateD DATE NOT NULL, DateA DATE NOT NULL, HeureD TIME DEFAULT \'00:00:00\', HeureA TIME DEFAULT \'00:00:00\', idReservation INT DEFAULT NULL, INDEX IDX_D499BFF6295B62D (idReservation), INDEX IDX_D499BFF61A0DB691 (idchambre), PRIMARY KEY(idPlanning)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE reservation (idclient INT DEFAULT NULL, idutilisateur BIGINT UNSIGNED DEFAULT NULL, idReservation INT AUTO_INCREMENT NOT NULL, titre VARCHAR(255) DEFAULT \'NULL\', note VARCHAR(255) DEFAULT \'NULL\', color VARCHAR(255) DEFAULT \'NULL\', nbAd INT NOT NULL, nbEnf INT NOT NULL, nbChambre INT NOT NULL, nbSalle INT NOT NULL, issup TINYINT(1) DEFAULT NULL, avecP TINYINT(1) DEFAULT NULL, state TINYINT(1) DEFAULT NULL, DateR DATE NOT NULL, INDEX IDX_42C84955A3F9A9F9 (idclient), INDEX IDX_42C84955DBDD131C (idutilisateur), PRIMARY KEY(idReservation)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE restauration (idrestauration INT UNSIGNED AUTO_INCREMENT NOT NULL, libelle VARCHAR(255) NOT NULL, tarif NUMERIC(20, 2) DEFAULT NULL, issup TINYINT(1) DEFAULT NULL, PRIMARY KEY(idrestauration)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE sortie (idsortie INT UNSIGNED AUTO_INCREMENT NOT NULL, numBs VARCHAR(255) NOT NULL, DateS DATE NOT NULL, PRIMARY KEY(idsortie)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE stock (idstock BIGINT AUTO_INCREMENT NOT NULL, idfamille INT UNSIGNED DEFAULT NULL, idunite INT UNSIGNED DEFAULT NULL, code VARCHAR(150) DEFAULT \'NULL\', DESIGNATION VARCHAR(200) DEFAULT \'NULL\', PrA NUMERIC(20, 2) DEFAULT \'0.000\', Pvu NUMERIC(20, 2) DEFAULT \'0.000\', qte NUMERIC(20, 2) DEFAULT \'0.000\', seuil INT DEFAULT NULL, type TINYINT(1) DEFAULT NULL, enstock TINYINT(1) DEFAULT NULL, transformer TINYINT(1) DEFAULT NULL, issup TINYINT(1) DEFAULT NULL, INDEX IDX_4B365660FB77A07D (idfamille), INDEX IDX_4B365660CB61AD01 (idunite), PRIMARY KEY(idstock)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE taable (idtable INT UNSIGNED AUTO_INCREMENT NOT NULL, num VARCHAR(255) NOT NULL, PRIMARY KEY(idtable)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE typechambre (idTypeC INT UNSIGNED AUTO_INCREMENT NOT NULL, typec TINYINT(1) DEFAULT NULL, libelle VARCHAR(255) NOT NULL, tarif NUMERIC(20, 2) DEFAULT NULL, issup TINYINT(1) DEFAULT NULL, PRIMARY KEY(idTypeC)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE typedepense (idtyped INT UNSIGNED AUTO_INCREMENT NOT NULL, typedepense VARCHAR(255) NOT NULL, PRIMARY KEY(idtyped)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE unite (idunite INT UNSIGNED AUTO_INCREMENT NOT NULL, unite VARCHAR(255) NOT NULL, PRIMARY KEY(idunite)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE utilisateur (idutilisateur BIGINT UNSIGNED AUTO_INCREMENT NOT NULL, username VARCHAR(255) NOT NULL, password VARCHAR(255) NOT NULL, issup TINYINT(1) DEFAULT NULL, sideopen TINYINT(1) DEFAULT NULL, attribution VARCHAR(255) NOT NULL, PRIMARY KEY(idutilisateur)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE messenger_messages (id BIGINT AUTO_INCREMENT NOT NULL, body LONGTEXT NOT NULL, headers LONGTEXT NOT NULL, queue_name VARCHAR(190) NOT NULL, created_at DATETIME NOT NULL, available_at DATETIME NOT NULL, delivered_at DATETIME DEFAULT NULL, INDEX IDX_75EA56E0FB7336F0 (queue_name), INDEX IDX_75EA56E0E3BD61CE (available_at), INDEX IDX_75EA56E016BA31DB (delivered_at), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE authtoken ADD CONSTRAINT FK_2C343194DBDD131C FOREIGN KEY (idutilisateur) REFERENCES utilisateur (idutilisateur)');
        $this->addSql('ALTER TABLE chambre ADD CONSTRAINT FK_C509E4FF682DFA81 FOREIGN KEY (idTypeC) REFERENCES typechambre (idTypeC)');
        $this->addSql('ALTER TABLE depense ADD CONSTRAINT FK_34059757CE660EE FOREIGN KEY (idtyped) REFERENCES typedepense (idtyped)');
        $this->addSql('ALTER TABLE depense ADD CONSTRAINT FK_34059757DBDD131C FOREIGN KEY (idutilisateur) REFERENCES utilisateur (idutilisateur)');
        $this->addSql('ALTER TABLE detailE ADD CONSTRAINT FK_BD9C9E133D3EDA0A FOREIGN KEY (identree) REFERENCES entrestock (identree)');
        $this->addSql('ALTER TABLE detailE ADD CONSTRAINT FK_BD9C9E139D333A79 FOREIGN KEY (idstock) REFERENCES stock (idstock)');
        $this->addSql('ALTER TABLE detailreservation ADD CONSTRAINT FK_9A9909FB682DFA81 FOREIGN KEY (idTypeC) REFERENCES typechambre (idTypeC)');
        $this->addSql('ALTER TABLE detailreservation ADD CONSTRAINT FK_9A9909FB295B62D FOREIGN KEY (idReservation) REFERENCES reservation (idReservation)');
        $this->addSql('ALTER TABLE details ADD CONSTRAINT FK_72260B8A58827E5E FOREIGN KEY (idsortie) REFERENCES sortie (idsortie)');
        $this->addSql('ALTER TABLE details ADD CONSTRAINT FK_72260B8A9D333A79 FOREIGN KEY (idstock) REFERENCES stock (idstock)');
        $this->addSql('ALTER TABLE detautreservice ADD CONSTRAINT FK_942D2F25295B62D FOREIGN KEY (idReservation) REFERENCES reservation (idReservation)');
        $this->addSql('ALTER TABLE detautreservice ADD CONSTRAINT FK_942D2F257989AE20 FOREIGN KEY (idAutreS) REFERENCES autreService (idAutreS)');
        $this->addSql('ALTER TABLE detrestauration ADD CONSTRAINT FK_9FFC0CAF840939FA FOREIGN KEY (idreservation) REFERENCES reservation (idReservation)');
        $this->addSql('ALTER TABLE enregistrement ADD CONSTRAINT FK_15FA02F1A0DB691 FOREIGN KEY (idchambre) REFERENCES chambre (idchambre)');
        $this->addSql('ALTER TABLE histoinventaire ADD CONSTRAINT FK_4BB27A439D333A79 FOREIGN KEY (idstock) REFERENCES stock (idstock)');
        $this->addSql('ALTER TABLE histostock ADD CONSTRAINT FK_9F3465B49D333A79 FOREIGN KEY (idstock) REFERENCES stock (idstock)');
        $this->addSql('ALTER TABLE ingredient ADD CONSTRAINT FK_6BAF7870F6A1BE49 FOREIGN KEY (idproduit) REFERENCES stock (idstock)');
        $this->addSql('ALTER TABLE ingredient ADD CONSTRAINT FK_6BAF78704F100524 FOREIGN KEY (idmatiere) REFERENCES stock (idstock)');
        $this->addSql('ALTER TABLE planning ADD CONSTRAINT FK_D499BFF6295B62D FOREIGN KEY (idReservation) REFERENCES reservation (idReservation)');
        $this->addSql('ALTER TABLE planning ADD CONSTRAINT FK_D499BFF61A0DB691 FOREIGN KEY (idchambre) REFERENCES chambre (idchambre)');
        $this->addSql('ALTER TABLE reservation ADD CONSTRAINT FK_42C84955A3F9A9F9 FOREIGN KEY (idclient) REFERENCES client (idclient)');
        $this->addSql('ALTER TABLE reservation ADD CONSTRAINT FK_42C84955DBDD131C FOREIGN KEY (idutilisateur) REFERENCES utilisateur (idutilisateur)');
        $this->addSql('ALTER TABLE stock ADD CONSTRAINT FK_4B365660FB77A07D FOREIGN KEY (idfamille) REFERENCES famille (idfamille)');
        $this->addSql('ALTER TABLE stock ADD CONSTRAINT FK_4B365660CB61AD01 FOREIGN KEY (idunite) REFERENCES unite (idunite)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE authtoken DROP FOREIGN KEY FK_2C343194DBDD131C');
        $this->addSql('ALTER TABLE chambre DROP FOREIGN KEY FK_C509E4FF682DFA81');
        $this->addSql('ALTER TABLE depense DROP FOREIGN KEY FK_34059757CE660EE');
        $this->addSql('ALTER TABLE depense DROP FOREIGN KEY FK_34059757DBDD131C');
        $this->addSql('ALTER TABLE detailE DROP FOREIGN KEY FK_BD9C9E133D3EDA0A');
        $this->addSql('ALTER TABLE detailE DROP FOREIGN KEY FK_BD9C9E139D333A79');
        $this->addSql('ALTER TABLE detailreservation DROP FOREIGN KEY FK_9A9909FB682DFA81');
        $this->addSql('ALTER TABLE detailreservation DROP FOREIGN KEY FK_9A9909FB295B62D');
        $this->addSql('ALTER TABLE details DROP FOREIGN KEY FK_72260B8A58827E5E');
        $this->addSql('ALTER TABLE details DROP FOREIGN KEY FK_72260B8A9D333A79');
        $this->addSql('ALTER TABLE detautreservice DROP FOREIGN KEY FK_942D2F25295B62D');
        $this->addSql('ALTER TABLE detautreservice DROP FOREIGN KEY FK_942D2F257989AE20');
        $this->addSql('ALTER TABLE detrestauration DROP FOREIGN KEY FK_9FFC0CAF840939FA');
        $this->addSql('ALTER TABLE enregistrement DROP FOREIGN KEY FK_15FA02F1A0DB691');
        $this->addSql('ALTER TABLE histoinventaire DROP FOREIGN KEY FK_4BB27A439D333A79');
        $this->addSql('ALTER TABLE histostock DROP FOREIGN KEY FK_9F3465B49D333A79');
        $this->addSql('ALTER TABLE ingredient DROP FOREIGN KEY FK_6BAF7870F6A1BE49');
        $this->addSql('ALTER TABLE ingredient DROP FOREIGN KEY FK_6BAF78704F100524');
        $this->addSql('ALTER TABLE planning DROP FOREIGN KEY FK_D499BFF6295B62D');
        $this->addSql('ALTER TABLE planning DROP FOREIGN KEY FK_D499BFF61A0DB691');
        $this->addSql('ALTER TABLE reservation DROP FOREIGN KEY FK_42C84955A3F9A9F9');
        $this->addSql('ALTER TABLE reservation DROP FOREIGN KEY FK_42C84955DBDD131C');
        $this->addSql('ALTER TABLE stock DROP FOREIGN KEY FK_4B365660FB77A07D');
        $this->addSql('ALTER TABLE stock DROP FOREIGN KEY FK_4B365660CB61AD01');
        $this->addSql('DROP TABLE authtoken');
        $this->addSql('DROP TABLE autreService');
        $this->addSql('DROP TABLE chambre');
        $this->addSql('DROP TABLE charge');
        $this->addSql('DROP TABLE client');
        $this->addSql('DROP TABLE depense');
        $this->addSql('DROP TABLE detailE');
        $this->addSql('DROP TABLE detailreservation');
        $this->addSql('DROP TABLE details');
        $this->addSql('DROP TABLE detautreservice');
        $this->addSql('DROP TABLE detrestauration');
        $this->addSql('DROP TABLE enregistrement');
        $this->addSql('DROP TABLE entrestock');
        $this->addSql('DROP TABLE famille');
        $this->addSql('DROP TABLE histoinventaire');
        $this->addSql('DROP TABLE histostock');
        $this->addSql('DROP TABLE ingredient');
        $this->addSql('DROP TABLE planning');
        $this->addSql('DROP TABLE reservation');
        $this->addSql('DROP TABLE restauration');
        $this->addSql('DROP TABLE sortie');
        $this->addSql('DROP TABLE stock');
        $this->addSql('DROP TABLE taable');
        $this->addSql('DROP TABLE typechambre');
        $this->addSql('DROP TABLE typedepense');
        $this->addSql('DROP TABLE unite');
        $this->addSql('DROP TABLE utilisateur');
        $this->addSql('DROP TABLE messenger_messages');
    }
}
