<?php declare(strict_types = 1);

namespace Lemonade\Meta\Entity;

final class Facebook extends EntityAbstract {
    
    /**
     * Title
     * @param string $key
     * @param string $name
     * @return string
     */
    protected function _appTitle(string $key, string $name = null) {
        
        if(!empty($title = $this->data["appTitle"])) {
            $name = sprintf("%s - %s", $title, $this->data["appName"]);
        }
        
        return \str_replace(["{key}", "{val}"], ["og:title", $name], $this->_propertyMeta());
    }
    
    /**
     * appName
     * @param string $key
     * @param string $val
     * @return mixed
     */
    protected function _appName(string $key, string $val = null) {
        
        $code = str_replace(["{key}", "{val}"], ["og:sitename", $val], $this->_propertyMeta()) . PHP_EOL;
        $code .= str_replace(["{key}", "{val}"], ["og:type", "website"], $this->_propertyMeta());
        
        return $code;
    }
    
    /**
     * Canonical Url
     * @param string $key
     * @param string $url
     * @return string
     */
    protected function _appCanonical(string $key, string $url = null) {
        
        return \str_replace(["{key}", "{val}"], ["og:url", $url], $this->_propertyMeta());
    }
    
    /**
     * Image
     * @param string $key
     * @param string $url
     * @return string
     */
    protected function _appImage(string $key, string $url = null) {
        
        return \str_replace(["{key}", "{val}"], ["og:image", $url], $this->_propertyMeta());
    }
    
    /**
     * Api Id
     * @param string $key
     * @param string $val
     * @return mixed
     */
    protected function _appFacebookApiId(string $key, string $val = null) {
        
        return \str_replace(["{key}", "{val}"], ["fb:app_id", $val], $this->_propertyMeta());
    }
    
    /**
     * Description
     * @param string $key
     * @param string $val
     * @return mixed
     */
    protected function _appDescription(string $key, string $val = null) {
        
        return \str_replace(["{key}", "{val}"], ["og:description", $val], $this->_propertyMeta());
    }
    
    /**
     * Keywords
     * @param string $key
     * @param string $val
     * @return mixed
     */
    protected function _appKeywords(string $key, string $val = null) {
        
        return \str_replace(["{key}", "{val}"], ["og:keywords", $val], $this->_propertyMeta());
    }
    
    /**
     * Locale
     * @param string $key
     * @param string $val
     * @return mixed
     */
    protected function _appLocale(string $key, string $val = null) {
        
        return \str_replace(["{key}", "{val}"], ["og:locale", $val], $this->_propertyMeta());
    }
    
    
}
