<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20241101000000 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE theatre_show (num_show INT NOT NULL, theatre_play_id INT DEFAULT NULL, nbrsrat INT NOT NULL, dateshow DATETIME NOT NULL, INDEX IDX_6885CFCCDAD2878B (theatre_play_id), PRIMARY KEY(num_show)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE theatre_show ADD CONSTRAINT FK_6885CFCCDAD2878B FOREIGN KEY (theatre_play_id) REFERENCES theatre_play (id)');
        $this->addSql('ALTER TABLE `show` DROP FOREIGN KEY FK_320ED901DAD2878B');
        $this->addSql('DROP TABLE `show`');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE `show` (num_show INT NOT NULL, theatre_play_id INT DEFAULT NULL, nbrsrat INT NOT NULL, dateshow DATETIME NOT NULL, INDEX IDX_320ED901DAD2878B (theatre_play_id), PRIMARY KEY(num_show)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE `show` ADD CONSTRAINT FK_320ED901DAD2878B FOREIGN KEY (theatre_play_id) REFERENCES theatre_play (id)');
        $this->addSql('ALTER TABLE theatre_show DROP FOREIGN KEY FK_6885CFCCDAD2878B');
        $this->addSql('DROP TABLE theatre_show');
    }
}
