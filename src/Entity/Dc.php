<?php declare(strict_types = 1);

namespace Lemonade\Meta\Entity;

final class Dc extends EntityAbstract {
    
    /**
     * Title
     * @param string $key
     * @param string $name
     * @return string
     */
    protected function _appName(string $key, string $name = null) {
        
        if(!empty($title = $this->data["appTitle"])) {
            $name = sprintf("%s - %s", $title, $this->data["appName"]);
        }
        
        return \str_replace(["{key}", "{val}"], ["dcterms.title", $name], $this->_standardMeta());
    }
    
    /**
     * Description
     * @param string $key
     * @param string $val
     * @return mixed
     */
    protected function _appDescription(string $key, string $val = null) {
        
        return \str_replace(["{key}", "{val}"], ["dcterms.description", $val], $this->_standardMeta());
    }
    
    /**
     * Keywords
     * @param string $key
     * @param string $val
     * @return mixed
     */
    protected function _appKeywords(string $key, string $val = null) {
        
        return \str_replace(["{key}", "{val}"], ["dcterms.keywords", $val], $this->_standardMeta());
    }
        
    /**
     * contributor/rights/publisher/created
     * @param string $key
     * @param string $val
     * @return mixed
     */
    protected function _appAuthor(string $key, string $val = null) {
        
        $code = \str_replace(["{key}", "{val}"], ["dcterms.contributor", $val], $this->_standardMeta()) . PHP_EOL;
        $code .= \str_replace(["{key}", "{val}"], ["dcterms.rights", $val], $this->_standardMeta()) . PHP_EOL;
        $code .= \str_replace(["{key}", "{val}"], ["dcterms.publisher", $val], $this->_standardMeta()) . PHP_EOL;
        $code .= \str_replace(["{key}", "{val}"], ["dcterms.creator", $val], $this->_standardMeta());
        
        return $code;
    }

}