<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20201126172611 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE promotion (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, description LONGTEXT DEFAULT NULL, group_picture VARCHAR(255) DEFAULT NULL, course_links LONGTEXT DEFAULT NULL COMMENT \'(DC2Type:array)\', slack_link VARCHAR(255) DEFAULT NULL, google_drive_link VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE promotion_student (promotion_id INT NOT NULL, student_id INT NOT NULL, INDEX IDX_EF5E5909139DF194 (promotion_id), INDEX IDX_EF5E5909CB944F1A (student_id), PRIMARY KEY(promotion_id, student_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE promotion_student ADD CONSTRAINT FK_EF5E5909139DF194 FOREIGN KEY (promotion_id) REFERENCES promotion (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE promotion_student ADD CONSTRAINT FK_EF5E5909CB944F1A FOREIGN KEY (student_id) REFERENCES student (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE promotion_student DROP FOREIGN KEY FK_EF5E5909139DF194');
        $this->addSql('DROP TABLE promotion');
        $this->addSql('DROP TABLE promotion_student');
    }
}
