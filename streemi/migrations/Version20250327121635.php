<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250327121635 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE season (id INT AUTO_INCREMENT NOT NULL, serie_id INT NOT NULL, number VARCHAR(255) NOT NULL, INDEX IDX_F0E45BA9D94388BD (serie_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE upload (id INT AUTO_INCREMENT NOT NULL, uploaded_by_id INT NOT NULL, uploaded_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', url VARCHAR(255) NOT NULL, INDEX IDX_17BDE61FA2B28FE8 (uploaded_by_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE season ADD CONSTRAINT FK_F0E45BA9D94388BD FOREIGN KEY (serie_id) REFERENCES serie (id)');
        $this->addSql('ALTER TABLE upload ADD CONSTRAINT FK_17BDE61FA2B28FE8 FOREIGN KEY (uploaded_by_id) REFERENCES `user` (id)');
        $this->addSql('ALTER TABLE playlist_subscription_user DROP FOREIGN KEY FK_C8528656B2A122C2');
        $this->addSql('ALTER TABLE playlist_subscription_user DROP FOREIGN KEY FK_C8528656A76ED395');
        $this->addSql('ALTER TABLE playlist_media_media DROP FOREIGN KEY FK_50F8E392EA9FDD75');
        $this->addSql('ALTER TABLE playlist_media_media DROP FOREIGN KEY FK_50F8E39217421B18');
        $this->addSql('ALTER TABLE playlist_media_playlist DROP FOREIGN KEY FK_63FEBFA76BBD148');
        $this->addSql('ALTER TABLE playlist_media_playlist DROP FOREIGN KEY FK_63FEBFA717421B18');
        $this->addSql('ALTER TABLE watch_history_media DROP FOREIGN KEY FK_279C548CEA9FDD75');
        $this->addSql('ALTER TABLE watch_history_media DROP FOREIGN KEY FK_279C548C4D8CCBCC');
        $this->addSql('DROP TABLE playlist_subscription_user');
        $this->addSql('DROP TABLE playlist_media_media');
        $this->addSql('DROP TABLE playlist_media_playlist');
        $this->addSql('DROP TABLE watch_history_media');
        $this->addSql('ALTER TABLE category ADD nom VARCHAR(255) NOT NULL, DROP name, CHANGE label label VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE comment DROP FOREIGN KEY FK_9474526C5F0EBBFF');
        $this->addSql('ALTER TABLE comment DROP FOREIGN KEY FK_9474526CBF2AF943');
        $this->addSql('DROP INDEX IDX_9474526C5F0EBBFF ON comment');
        $this->addSql('ALTER TABLE comment ADD publisher_id INT NOT NULL, DROP user_comment_id, CHANGE media_id media_id INT NOT NULL');
        $this->addSql('ALTER TABLE comment ADD CONSTRAINT FK_9474526C40C86FCE FOREIGN KEY (publisher_id) REFERENCES `user` (id)');
        $this->addSql('ALTER TABLE comment ADD CONSTRAINT FK_9474526CBF2AF943 FOREIGN KEY (parent_comment_id) REFERENCES comment (id) ON DELETE CASCADE');
        $this->addSql('CREATE INDEX IDX_9474526C40C86FCE ON comment (publisher_id)');
        $this->addSql('ALTER TABLE episode DROP FOREIGN KEY FK_DDAA1CDA4EC001D1');
        $this->addSql('ALTER TABLE episode ADD released_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', DROP release_date, CHANGE season_id season_id INT NOT NULL, CHANGE duration duration INT NOT NULL');
        $this->addSql('ALTER TABLE episode ADD CONSTRAINT FK_DDAA1CDA4EC001D1 FOREIGN KEY (season_id) REFERENCES season (id)');
        $this->addSql('ALTER TABLE language ADD nom VARCHAR(255) NOT NULL, DROP name, CHANGE code code VARCHAR(3) NOT NULL');
        $this->addSql('ALTER TABLE media ADD mediaType VARCHAR(255) NOT NULL, DROP media_type, DROP discr, CHANGE release_date release_date DATETIME NOT NULL, CHANGE actor casting JSON NOT NULL');
        $this->addSql('ALTER TABLE playlist DROP FOREIGN KEY FK_D782112DAFA018DD');
        $this->addSql('DROP INDEX IDX_D782112DAFA018DD ON playlist');
        $this->addSql('ALTER TABLE playlist ADD creator_id INT NOT NULL, DROP user_playlist_id, CHANGE update_at updated_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\'');
        $this->addSql('ALTER TABLE playlist ADD CONSTRAINT FK_D782112D61220EA6 FOREIGN KEY (creator_id) REFERENCES `user` (id)');
        $this->addSql('CREATE INDEX IDX_D782112D61220EA6 ON playlist (creator_id)');
        $this->addSql('ALTER TABLE playlist_media ADD playlist_id INT NOT NULL, ADD media_id INT NOT NULL');
        $this->addSql('ALTER TABLE playlist_media ADD CONSTRAINT FK_C930B84F6BBD148 FOREIGN KEY (playlist_id) REFERENCES playlist (id)');
        $this->addSql('ALTER TABLE playlist_media ADD CONSTRAINT FK_C930B84FEA9FDD75 FOREIGN KEY (media_id) REFERENCES media (id)');
        $this->addSql('CREATE INDEX IDX_C930B84F6BBD148 ON playlist_media (playlist_id)');
        $this->addSql('CREATE INDEX IDX_C930B84FEA9FDD75 ON playlist_media (media_id)');
        $this->addSql('ALTER TABLE playlist_subscription ADD subscriber_id INT NOT NULL, CHANGE playlist_id playlist_id INT NOT NULL');
        $this->addSql('ALTER TABLE playlist_subscription ADD CONSTRAINT FK_832940C7808B1AD FOREIGN KEY (subscriber_id) REFERENCES `user` (id)');
        $this->addSql('CREATE INDEX IDX_832940C7808B1AD ON playlist_subscription (subscriber_id)');
        $this->addSql('ALTER TABLE subscription DROP FOREIGN KEY FK_A3C664D3DCE0C437');
        $this->addSql('DROP INDEX IDX_A3C664D3DCE0C437 ON subscription');
        $this->addSql('ALTER TABLE subscription DROP subscription_history_id, CHANGE name name VARCHAR(255) NOT NULL, CHANGE duration_in_months duration INT NOT NULL');
        $this->addSql('ALTER TABLE subscription_history DROP FOREIGN KEY FK_54AF90D065316D66');
        $this->addSql('DROP INDEX IDX_54AF90D065316D66 ON subscription_history');
        $this->addSql('ALTER TABLE subscription_history ADD subscriber_id INT NOT NULL, ADD subscription_id INT NOT NULL, ADD start_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', ADD end_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', DROP user_subscription_history_id, DROP start_date, DROP end_date');
        $this->addSql('ALTER TABLE subscription_history ADD CONSTRAINT FK_54AF90D07808B1AD FOREIGN KEY (subscriber_id) REFERENCES `user` (id)');
        $this->addSql('ALTER TABLE subscription_history ADD CONSTRAINT FK_54AF90D09A1887DC FOREIGN KEY (subscription_id) REFERENCES subscription (id)');
        $this->addSql('CREATE INDEX IDX_54AF90D07808B1AD ON subscription_history (subscriber_id)');
        $this->addSql('CREATE INDEX IDX_54AF90D09A1887DC ON subscription_history (subscription_id)');
        $this->addSql('ALTER TABLE user ADD profile_picture VARCHAR(255) NOT NULL, ADD roles JSON NOT NULL, CHANGE username username VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE watch_history DROP FOREIGN KEY FK_DE44EFD87C76EC8C');
        $this->addSql('DROP INDEX UNIQ_DE44EFD87C76EC8C ON watch_history');
        $this->addSql('ALTER TABLE watch_history ADD watcher_id INT NOT NULL, ADD media_id INT NOT NULL, ADD last_watched_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', DROP historic_user_id, DROP last_watched');
        $this->addSql('ALTER TABLE watch_history ADD CONSTRAINT FK_DE44EFD8C300AB5D FOREIGN KEY (watcher_id) REFERENCES `user` (id)');
        $this->addSql('ALTER TABLE watch_history ADD CONSTRAINT FK_DE44EFD8EA9FDD75 FOREIGN KEY (media_id) REFERENCES media (id)');
        $this->addSql('CREATE INDEX IDX_DE44EFD8C300AB5D ON watch_history (watcher_id)');
        $this->addSql('CREATE INDEX IDX_DE44EFD8EA9FDD75 ON watch_history (media_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE episode DROP FOREIGN KEY FK_DDAA1CDA4EC001D1');
        $this->addSql('CREATE TABLE playlist_subscription_user (playlist_subscription_id INT NOT NULL, user_id INT NOT NULL, INDEX IDX_C8528656A76ED395 (user_id), INDEX IDX_C8528656B2A122C2 (playlist_subscription_id), PRIMARY KEY(playlist_subscription_id, user_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE playlist_media_media (playlist_media_id INT NOT NULL, media_id INT NOT NULL, INDEX IDX_50F8E392EA9FDD75 (media_id), INDEX IDX_50F8E39217421B18 (playlist_media_id), PRIMARY KEY(playlist_media_id, media_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE playlist_media_playlist (playlist_media_id INT NOT NULL, playlist_id INT NOT NULL, INDEX IDX_63FEBFA717421B18 (playlist_media_id), INDEX IDX_63FEBFA76BBD148 (playlist_id), PRIMARY KEY(playlist_media_id, playlist_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE watch_history_media (watch_history_id INT NOT NULL, media_id INT NOT NULL, INDEX IDX_279C548CEA9FDD75 (media_id), INDEX IDX_279C548C4D8CCBCC (watch_history_id), PRIMARY KEY(watch_history_id, media_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE playlist_subscription_user ADD CONSTRAINT FK_C8528656B2A122C2 FOREIGN KEY (playlist_subscription_id) REFERENCES playlist_subscription (id) ON UPDATE NO ACTION ON DELETE CASCADE');
        $this->addSql('ALTER TABLE playlist_subscription_user ADD CONSTRAINT FK_C8528656A76ED395 FOREIGN KEY (user_id) REFERENCES user (id) ON UPDATE NO ACTION ON DELETE CASCADE');
        $this->addSql('ALTER TABLE playlist_media_media ADD CONSTRAINT FK_50F8E392EA9FDD75 FOREIGN KEY (media_id) REFERENCES media (id) ON UPDATE NO ACTION ON DELETE CASCADE');
        $this->addSql('ALTER TABLE playlist_media_media ADD CONSTRAINT FK_50F8E39217421B18 FOREIGN KEY (playlist_media_id) REFERENCES playlist_media (id) ON UPDATE NO ACTION ON DELETE CASCADE');
        $this->addSql('ALTER TABLE playlist_media_playlist ADD CONSTRAINT FK_63FEBFA76BBD148 FOREIGN KEY (playlist_id) REFERENCES playlist (id) ON UPDATE NO ACTION ON DELETE CASCADE');
        $this->addSql('ALTER TABLE playlist_media_playlist ADD CONSTRAINT FK_63FEBFA717421B18 FOREIGN KEY (playlist_media_id) REFERENCES playlist_media (id) ON UPDATE NO ACTION ON DELETE CASCADE');
        $this->addSql('ALTER TABLE watch_history_media ADD CONSTRAINT FK_279C548CEA9FDD75 FOREIGN KEY (media_id) REFERENCES media (id) ON UPDATE NO ACTION ON DELETE CASCADE');
        $this->addSql('ALTER TABLE watch_history_media ADD CONSTRAINT FK_279C548C4D8CCBCC FOREIGN KEY (watch_history_id) REFERENCES watch_history (id) ON UPDATE NO ACTION ON DELETE CASCADE');
        $this->addSql('ALTER TABLE season DROP FOREIGN KEY FK_F0E45BA9D94388BD');
        $this->addSql('ALTER TABLE upload DROP FOREIGN KEY FK_17BDE61FA2B28FE8');
        $this->addSql('DROP TABLE season');
        $this->addSql('DROP TABLE upload');
        $this->addSql('ALTER TABLE category ADD name VARCHAR(100) NOT NULL, DROP nom, CHANGE label label VARCHAR(100) NOT NULL');
        $this->addSql('ALTER TABLE media ADD discr VARCHAR(255) NOT NULL, CHANGE release_date release_date DATE NOT NULL, CHANGE casting actor JSON NOT NULL, CHANGE mediaType media_type VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE subscription_history DROP FOREIGN KEY FK_54AF90D07808B1AD');
        $this->addSql('ALTER TABLE subscription_history DROP FOREIGN KEY FK_54AF90D09A1887DC');
        $this->addSql('DROP INDEX IDX_54AF90D07808B1AD ON subscription_history');
        $this->addSql('DROP INDEX IDX_54AF90D09A1887DC ON subscription_history');
        $this->addSql('ALTER TABLE subscription_history ADD user_subscription_history_id INT DEFAULT NULL, ADD start_date DATE NOT NULL, ADD end_date DATE NOT NULL, DROP subscriber_id, DROP subscription_id, DROP start_at, DROP end_at');
        $this->addSql('ALTER TABLE subscription_history ADD CONSTRAINT FK_54AF90D065316D66 FOREIGN KEY (user_subscription_history_id) REFERENCES user (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('CREATE INDEX IDX_54AF90D065316D66 ON subscription_history (user_subscription_history_id)');
        $this->addSql('ALTER TABLE playlist DROP FOREIGN KEY FK_D782112D61220EA6');
        $this->addSql('DROP INDEX IDX_D782112D61220EA6 ON playlist');
        $this->addSql('ALTER TABLE playlist ADD user_playlist_id INT DEFAULT NULL, DROP creator_id, CHANGE updated_at update_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\'');
        $this->addSql('ALTER TABLE playlist ADD CONSTRAINT FK_D782112DAFA018DD FOREIGN KEY (user_playlist_id) REFERENCES user (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('CREATE INDEX IDX_D782112DAFA018DD ON playlist (user_playlist_id)');
        $this->addSql('ALTER TABLE language ADD name VARCHAR(100) NOT NULL, DROP nom, CHANGE code code VARCHAR(100) NOT NULL');
        $this->addSql('ALTER TABLE subscription ADD subscription_history_id INT DEFAULT NULL, CHANGE name name VARCHAR(100) NOT NULL, CHANGE duration duration_in_months INT NOT NULL');
        $this->addSql('ALTER TABLE subscription ADD CONSTRAINT FK_A3C664D3DCE0C437 FOREIGN KEY (subscription_history_id) REFERENCES subscription_history (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('CREATE INDEX IDX_A3C664D3DCE0C437 ON subscription (subscription_history_id)');
        $this->addSql('ALTER TABLE `user` DROP profile_picture, DROP roles, CHANGE username username VARCHAR(100) NOT NULL');
        $this->addSql('ALTER TABLE episode DROP FOREIGN KEY FK_DDAA1CDA4EC001D1');
        $this->addSql('ALTER TABLE episode ADD release_date DATE NOT NULL, DROP released_at, CHANGE season_id season_id INT DEFAULT NULL, CHANGE duration duration TIME NOT NULL');
        $this->addSql('ALTER TABLE episode ADD CONSTRAINT FK_DDAA1CDA4EC001D1 FOREIGN KEY (season_id) REFERENCES seasons (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('ALTER TABLE playlist_media DROP FOREIGN KEY FK_C930B84F6BBD148');
        $this->addSql('ALTER TABLE playlist_media DROP FOREIGN KEY FK_C930B84FEA9FDD75');
        $this->addSql('DROP INDEX IDX_C930B84F6BBD148 ON playlist_media');
        $this->addSql('DROP INDEX IDX_C930B84FEA9FDD75 ON playlist_media');
        $this->addSql('ALTER TABLE playlist_media DROP playlist_id, DROP media_id');
        $this->addSql('ALTER TABLE watch_history DROP FOREIGN KEY FK_DE44EFD8C300AB5D');
        $this->addSql('ALTER TABLE watch_history DROP FOREIGN KEY FK_DE44EFD8EA9FDD75');
        $this->addSql('DROP INDEX IDX_DE44EFD8C300AB5D ON watch_history');
        $this->addSql('DROP INDEX IDX_DE44EFD8EA9FDD75 ON watch_history');
        $this->addSql('ALTER TABLE watch_history ADD historic_user_id INT DEFAULT NULL, ADD last_watched DATETIME NOT NULL, DROP watcher_id, DROP media_id, DROP last_watched_at');
        $this->addSql('ALTER TABLE watch_history ADD CONSTRAINT FK_DE44EFD87C76EC8C FOREIGN KEY (historic_user_id) REFERENCES user (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_DE44EFD87C76EC8C ON watch_history (historic_user_id)');
        $this->addSql('ALTER TABLE comment DROP FOREIGN KEY FK_9474526C40C86FCE');
        $this->addSql('ALTER TABLE comment DROP FOREIGN KEY FK_9474526CBF2AF943');
        $this->addSql('DROP INDEX IDX_9474526C40C86FCE ON comment');
        $this->addSql('ALTER TABLE comment ADD user_comment_id INT DEFAULT NULL, DROP publisher_id, CHANGE media_id media_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE comment ADD CONSTRAINT FK_9474526C5F0EBBFF FOREIGN KEY (user_comment_id) REFERENCES user (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('ALTER TABLE comment ADD CONSTRAINT FK_9474526CBF2AF943 FOREIGN KEY (parent_comment_id) REFERENCES comment (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('CREATE INDEX IDX_9474526C5F0EBBFF ON comment (user_comment_id)');
        $this->addSql('ALTER TABLE playlist_subscription DROP FOREIGN KEY FK_832940C7808B1AD');
        $this->addSql('DROP INDEX IDX_832940C7808B1AD ON playlist_subscription');
        $this->addSql('ALTER TABLE playlist_subscription DROP subscriber_id, CHANGE playlist_id playlist_id INT DEFAULT NULL');
    }
}
