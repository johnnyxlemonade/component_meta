<?php declare(strict_types = 1);

namespace Lemonade\Meta\Entity;

final class Twitter extends EntityAbstract {
    
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
        
        return \str_replace(["{key}", "{val}"], ["twitter:title", $name], $this->_propertyMeta());
    }
    
    /**
     * appName
     * @param string $key
     * @param string $val
     * @return mixed
     */
    protected function _appName(string $key, string $val = null) {
        
        $code = str_replace(["{key}", "{val}"], ["twitter:card", "summary"], $this->_propertyMeta());
        
        return $code;
    }
    
    /**
     * Author
     * @param string $key
     * @param string $val
     * @return mixed
     */
    protected function _appAuthor(string $key, string $val = null) {
        
        return \str_replace(["{key}", "{val}"], ["twitter:creator", $val], $this->_propertyMeta());
    }
    
    /**
     * Image
     * @param string $key
     * @param string $url
     * @return string
     */
    protected function _appImage(string $key, string $url = null) {
        
        return \str_replace(["{key}", "{val}"], ["twitter:image", $url], $this->_propertyMeta());
    }
    
    /**
     * Description
     * @param string $key
     * @param string $val
     * @return mixed
     */
    protected function _appDescription(string $key, string $val = null) {
        
        return \str_replace(["{key}", "{val}"], ["twitter:description", $val], $this->_propertyMeta());
    }
    
}