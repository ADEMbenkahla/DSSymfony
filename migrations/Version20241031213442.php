<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20241031213442 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP INDEX `primary` ON `show`');
        $this->addSql('ALTER TABLE `show` CHANGE id num_show INT NOT NULL');
        $this->addSql('ALTER TABLE `show` ADD PRIMARY KEY (num_show)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP INDEX `PRIMARY` ON `show`');
        $this->addSql('ALTER TABLE `show` CHANGE num_show id INT NOT NULL');
        $this->addSql('ALTER TABLE `show` ADD PRIMARY KEY (id)');
    }
}
