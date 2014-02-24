<?php

namespace PetreP\StarmateBundle\Service;


use PetreP\StarmateBundle\Entity\AhglPlayer;
use Symfony\Component\DomCrawler\Crawler;

class AhglService
{

    const LEAGUE_BASE_URL = 'http://afterhoursgaming.tv';

    /**
     * @var Crawler
     */
    protected $_crawler;

    public function __construct()
    {
        $this->_crawler = new Crawler();
    }

    /**
     * Crawl the team web page and return the list of players.
     *
     * @param string $webpage The team AHGL webpage.
     * @return array
     */
    public function crawlTeamWebPageAndReturnPlayerList($webpage = 'http://afterhoursgaming.tv/starcraft-2-season-4/teams/cegeka/')
    {
        $this->_crawler->addHtmlContent(file_get_contents($webpage), 'UTF-8');

        $playerList = array();
        $playerNodes = $this->_crawler->filter('.player-list-1 li');

        foreach ($playerNodes as $player) {
            $playerEntity = new AhglPlayer();

            $playerEntity->setAhglProfileUrl($player->childNodes->item(0)->getAttribute('href'))
                ->setIngameName($player->childNodes->item(2)->nodeValue);

            $playerList[] = $playerEntity;

        }

        $this->_crawler->clear();
        return $playerList;
    }

    /**
     * Get some individual details from a player's page.
     *
     * @param AhglPlayer $player
     * @return AhglPlayer
     */
    public function retrieveDetailsFromPlayerPage(AhglPlayer $player)
    {
        $webpage = self::LEAGUE_BASE_URL . $player->getAhglProfileUrl();
        $this->_crawler->addHtmlContent(file_get_contents($webpage), 'UTF-8');

        $playerDataNode = $this->_crawler->filter('.content-section-1')->getNode(0);

        $player->setAhglRecord($playerDataNode->childNodes->item(9)->nodeValue);

        sleep(0.3);
        return $player;
    }

    /**
     * @param \Symfony\Component\DomCrawler\Crawler $crawler
     * @return $this
     */
    public function setCrawler(Crawler $crawler)
    {
        $this->_crawler = $crawler;
        return $this;
    }

    /**
     * @return \Symfony\Component\DomCrawler\Crawler
     */
    public function getCrawler()
    {
        return $this->_crawler;
    }
}