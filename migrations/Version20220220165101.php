<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220220165101 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE lease (id INT AUTO_INCREMENT NOT NULL, property_id INT DEFAULT NULL, type VARCHAR(255) NOT NULL, renting_amount DOUBLE PRECISION NOT NULL, leased_at DATETIME NOT NULL, duration INT NOT NULL, irl_date VARCHAR(255) DEFAULT NULL, irl DOUBLE PRECISION DEFAULT NULL, security_deposit DOUBLE PRECISION NOT NULL, date_of_payment INT NOT NULL, guarantor LONGTEXT DEFAULT NULL COMMENT \'(DC2Type:array)\', UNIQUE INDEX UNIQ_E6C77495549213EC (property_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE lease ADD CONSTRAINT FK_E6C77495549213EC FOREIGN KEY (property_id) REFERENCES property (id)');
        $this->addSql('ALTER TABLE property ADD owner_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE property ADD CONSTRAINT FK_8BF21CDE7E3C61F9 FOREIGN KEY (owner_id) REFERENCES owner (id)');
        $this->addSql('CREATE INDEX IDX_8BF21CDE7E3C61F9 ON property (owner_id)');
        $this->addSql('ALTER TABLE tenant ADD lease_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE tenant ADD CONSTRAINT FK_4E59C462D3CA542C FOREIGN KEY (lease_id) REFERENCES lease (id)');
        $this->addSql('CREATE INDEX IDX_4E59C462D3CA542C ON tenant (lease_id)');
        $this->addSql('ALTER TABLE user ADD tenant_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE user ADD CONSTRAINT FK_8D93D6499033212A FOREIGN KEY (tenant_id) REFERENCES tenant (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_8D93D6499033212A ON user (tenant_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE tenant DROP FOREIGN KEY FK_4E59C462D3CA542C');
        $this->addSql('DROP TABLE lease');
        $this->addSql('ALTER TABLE property DROP FOREIGN KEY FK_8BF21CDE7E3C61F9');
        $this->addSql('DROP INDEX IDX_8BF21CDE7E3C61F9 ON property');
        $this->addSql('ALTER TABLE property DROP owner_id');
        $this->addSql('DROP INDEX IDX_4E59C462D3CA542C ON tenant');
        $this->addSql('ALTER TABLE tenant DROP lease_id');
        $this->addSql('ALTER TABLE user DROP FOREIGN KEY FK_8D93D6499033212A');
        $this->addSql('DROP INDEX UNIQ_8D93D6499033212A ON user');
        $this->addSql('ALTER TABLE user DROP tenant_id');
    }
}
