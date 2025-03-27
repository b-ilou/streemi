<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250131150026 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        $this->addSql('DROP INDEX id ON category');
        $this->addSql('ALTER TABLE category CHANGE id id INT AUTO_INCREMENT NOT NULL');
        $this->addSql('DROP INDEX id ON comment');
        $this->addSql('ALTER TABLE comment CHANGE id id INT AUTO_INCREMENT NOT NULL, CHANGE content content LONGTEXT NOT NULL');
        $this->addSql('ALTER TABLE comment ADD CONSTRAINT FK_9474526C5F0EBBFF FOREIGN KEY (user_comment_id) REFERENCES `user` (id)');
        $this->addSql('ALTER TABLE comment ADD CONSTRAINT FK_9474526CEA9FDD75 FOREIGN KEY (media_id) REFERENCES media (id)');
        $this->addSql('ALTER TABLE comment ADD CONSTRAINT FK_9474526CBF2AF943 FOREIGN KEY (parent_comment_id) REFERENCES comment (id)');
        $this->addSql('ALTER TABLE media_category ADD CONSTRAINT FK_92D377312469DE2 FOREIGN KEY (category_id) REFERENCES category (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE movie ADD CONSTRAINT FK_1D5EF26FBF396750 FOREIGN KEY (id) REFERENCES media (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE playlist ADD CONSTRAINT FK_D782112DAFA018DD FOREIGN KEY (user_playlist_id) REFERENCES `user` (id)');
        $this->addSql('ALTER TABLE playlist_media_playlist ADD CONSTRAINT FK_63FEBFA717421B18 FOREIGN KEY (playlist_media_id) REFERENCES playlist_media (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE playlist_media_playlist ADD CONSTRAINT FK_63FEBFA76BBD148 FOREIGN KEY (playlist_id) REFERENCES playlist (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE playlist_media_media ADD CONSTRAINT FK_50F8E39217421B18 FOREIGN KEY (playlist_media_id) REFERENCES playlist_media (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE playlist_media_media ADD CONSTRAINT FK_50F8E392EA9FDD75 FOREIGN KEY (media_id) REFERENCES media (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE playlist_subscription ADD CONSTRAINT FK_832940C6BBD148 FOREIGN KEY (playlist_id) REFERENCES playlist (id)');
        $this->addSql('ALTER TABLE playlist_subscription_user ADD CONSTRAINT FK_C8528656B2A122C2 FOREIGN KEY (playlist_subscription_id) REFERENCES playlist_subscription (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE playlist_subscription_user ADD CONSTRAINT FK_C8528656A76ED395 FOREIGN KEY (user_id) REFERENCES `user` (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE seasons ADD CONSTRAINT FK_B4F4301CD94388BD FOREIGN KEY (serie_id) REFERENCES serie (id)');
        $this->addSql('ALTER TABLE serie ADD CONSTRAINT FK_AA3A9334BF396750 FOREIGN KEY (id) REFERENCES media (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE subscription ADD CONSTRAINT FK_A3C664D3DCE0C437 FOREIGN KEY (subscription_history_id) REFERENCES subscription_history (id)');
        $this->addSql('ALTER TABLE subscription_history ADD CONSTRAINT FK_54AF90D065316D66 FOREIGN KEY (user_subscription_history_id) REFERENCES `user` (id)');
        $this->addSql('ALTER TABLE user ADD CONSTRAINT FK_8D93D649DDE45DDE FOREIGN KEY (current_subscription_id) REFERENCES subscription (id)');
        $this->addSql('ALTER TABLE watch_history ADD CONSTRAINT FK_DE44EFD87C76EC8C FOREIGN KEY (historic_user_id) REFERENCES `user` (id)');
        $this->addSql('ALTER TABLE watch_history_media ADD CONSTRAINT FK_279C548C4D8CCBCC FOREIGN KEY (watch_history_id) REFERENCES watch_history (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE watch_history_media ADD CONSTRAINT FK_279C548CEA9FDD75 FOREIGN KEY (media_id) REFERENCES media (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        $this->addSql('ALTER TABLE movie DROP FOREIGN KEY FK_1D5EF26FBF396750');
        $this->addSql('ALTER TABLE playlist DROP FOREIGN KEY FK_D782112DAFA018DD');
        $this->addSql('ALTER TABLE media_category DROP FOREIGN KEY FK_92D377312469DE2');
        $this->addSql('ALTER TABLE playlist_media_media DROP FOREIGN KEY FK_50F8E39217421B18');
        $this->addSql('ALTER TABLE playlist_media_media DROP FOREIGN KEY FK_50F8E392EA9FDD75');
        $this->addSql('ALTER TABLE playlist_media_playlist DROP FOREIGN KEY FK_63FEBFA717421B18');
        $this->addSql('ALTER TABLE playlist_media_playlist DROP FOREIGN KEY FK_63FEBFA76BBD148');
        $this->addSql('ALTER TABLE playlist_subscription DROP FOREIGN KEY FK_832940C6BBD148');
        $this->addSql('ALTER TABLE playlist_subscription_user DROP FOREIGN KEY FK_C8528656B2A122C2');
        $this->addSql('ALTER TABLE playlist_subscription_user DROP FOREIGN KEY FK_C8528656A76ED395');
        $this->addSql('ALTER TABLE seasons DROP FOREIGN KEY FK_B4F4301CD94388BD');
        $this->addSql('ALTER TABLE serie DROP FOREIGN KEY FK_AA3A9334BF396750');
        $this->addSql('ALTER TABLE subscription DROP FOREIGN KEY FK_A3C664D3DCE0C437');
        $this->addSql('ALTER TABLE category CHANGE id id BIGINT UNSIGNED AUTO_INCREMENT NOT NULL');
        $this->addSql('CREATE UNIQUE INDEX id ON category (id)');
        $this->addSql('ALTER TABLE comment DROP FOREIGN KEY FK_9474526C5F0EBBFF');
        $this->addSql('ALTER TABLE comment DROP FOREIGN KEY FK_9474526CEA9FDD75');
        $this->addSql('ALTER TABLE comment DROP FOREIGN KEY FK_9474526CBF2AF943');
        $this->addSql('ALTER TABLE comment CHANGE id id BIGINT UNSIGNED AUTO_INCREMENT NOT NULL, CHANGE content content TEXT NOT NULL');
        $this->addSql('CREATE UNIQUE INDEX id ON comment (id)');
        $this->addSql('ALTER TABLE watch_history_media DROP FOREIGN KEY FK_279C548C4D8CCBCC');
        $this->addSql('ALTER TABLE watch_history_media DROP FOREIGN KEY FK_279C548CEA9FDD75');
        $this->addSql('ALTER TABLE watch_history DROP FOREIGN KEY FK_DE44EFD87C76EC8C');
        $this->addSql('ALTER TABLE `user` DROP FOREIGN KEY FK_8D93D649DDE45DDE');
        $this->addSql('ALTER TABLE subscription_history DROP FOREIGN KEY FK_54AF90D065316D66');
    }
}
