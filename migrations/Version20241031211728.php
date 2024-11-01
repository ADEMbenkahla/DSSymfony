<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20241031211728 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE `show` ADD theatre_play_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE `show` ADD CONSTRAINT FK_320ED901DAD2878B FOREIGN KEY (theatre_play_id) REFERENCES theatre_play (id)');
        $this->addSql('CREATE INDEX IDX_320ED901DAD2878B ON `show` (theatre_play_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE `show` DROP FOREIGN KEY FK_320ED901DAD2878B');
        $this->addSql('DROP INDEX IDX_320ED901DAD2878B ON `show`');
        $this->addSql('ALTER TABLE `show` DROP theatre_play_id');
    }
}
