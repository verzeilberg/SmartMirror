<?php

namespace News\Service;

interface newsServiceInterface {

    /**
     *
     * Get array of news
     *
     * @return      array
     *
     */
    public function getNewsInfo();
    
        /**
     *
     * Get one news item
     *
     * @return      array
     *
     */
    public function getNewsHeadline();
    
        /**
     *
     * Filter string on words
     *
     * @return      string
     *
     */
    public function filterwords($string);
    
}
