<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220902134304 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE reservation_personnel (reservation_id INT NOT NULL, personnel_id INT NOT NULL, INDEX IDX_BCFB9241B83297E7 (reservation_id), INDEX IDX_BCFB92411C109075 (personnel_id), PRIMARY KEY(reservation_id, personnel_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE reservation_personnel ADD CONSTRAINT FK_BCFB9241B83297E7 FOREIGN KEY (reservation_id) REFERENCES reservation (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE reservation_personnel ADD CONSTRAINT FK_BCFB92411C109075 FOREIGN KEY (personnel_id) REFERENCES personnel (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE reservation ADD room_id INT DEFAULT NULL, ADD date DATE NOT NULL, ADD state VARCHAR(255) NOT NULL, ADD period LONGTEXT NOT NULL COMMENT \'(DC2Type:array)\'');
        $this->addSql('ALTER TABLE reservation ADD CONSTRAINT FK_42C8495554177093 FOREIGN KEY (room_id) REFERENCES room (id)');
        $this->addSql('CREATE INDEX IDX_42C8495554177093 ON reservation (room_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE reservation_personnel DROP FOREIGN KEY FK_BCFB9241B83297E7');
        $this->addSql('ALTER TABLE reservation_personnel DROP FOREIGN KEY FK_BCFB92411C109075');
        $this->addSql('DROP TABLE reservation_personnel');
        $this->addSql('ALTER TABLE reservation DROP FOREIGN KEY FK_42C8495554177093');
        $this->addSql('DROP INDEX IDX_42C8495554177093 ON reservation');
        $this->addSql('ALTER TABLE reservation DROP room_id, DROP date, DROP state, DROP period');
    }
}
