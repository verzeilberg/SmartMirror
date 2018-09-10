<?php

namespace News\Service;

use Zend\ServiceManager\ServiceLocatorInterface;

class newsService implements newsServiceInterface {

    private $config;
    private $rssFeedLink;
    Private $filterWords;

    /**
     * Constructor.
     */
    public function __construct($config) {
        $this->config = $config;
        $this->rssFeeds = $config['newsSettings']['feeds'];
        $this->filterWords = $config['newsSettings']['filterWords'];
    }

    /**
     *
     * Get array of news items
     *
     * @return      array
     *
     */
    public function getNewsInfo() {
        $data = [];
        foreach ($this->rssFeeds AS $index => $feed) {

            $dateRssFeed = file_get_contents($feed);
            $xml = simplexml_load_string($dateRssFeed, "SimpleXMLElement", LIBXML_NOCDATA);
            $json = json_encode($xml);
            $array = json_decode($json, true);
            $newsItems = $array['channel']['item'];
            foreach ($newsItems AS $newsItem) {
                if (!$this->filterwords($newsItem['title'])) {
                    $data[]['title'] = $newsItem['title'] . ' (' . $index . ')';
                }
            }
        }
        shuffle($data);
        return $data;
    }

    /**
     *
     * Get one news item
     *
     * @return      array
     *
     */
    public function getNewsHeadline() {
        $newsData = file_get_contents($this->rssFeedLink);

        $xml = simplexml_load_string($newsData, "SimpleXMLElement", LIBXML_NOCDATA);
        $json = json_encode($xml);
        $array = json_decode($json, true);
        $newsItem = $array['channel']['item'][0];

        return $newsItem;
    }

    /**
     *
     * Filter strings on words
     *
     * @return      boolean
     *
     */
    public function filterwords($string) {
        $badWords = $this->filterWords;
        $badWordsFound = false;
        foreach ($badWords as $badWord) {
            if (preg_match("/$badWord/i", $string)) {
                $badWordsFound = true;
                break;
            }
        }
        return $badWordsFound;
    }

}
