<?php

namespace News\Service;

use Zend\ServiceManager\ServiceLocatorInterface;

class newsService implements newsServiceInterface {

    private $config;
    private $rssFeedLink;

    /**
     * Constructor.
     */
    public function __construct($config) {
        $this->config = $config;
        $this->rssFeedLink = $config['newsSettings']['RSS-Feed-Link'];
    }

    /**
     *
     * Get array of news items
     *
     * @return      array
     *
     */
    public function getNewsInfo() {
        $newsData = file_get_contents($this->rssFeedLink);
        $xml = simplexml_load_string($newsData, "SimpleXMLElement", LIBXML_NOCDATA);
        $json = json_encode($xml);
        $array = json_decode($json, true);
        $newsItems = $array['channel']['item'];

        return $newsItems;
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

}
