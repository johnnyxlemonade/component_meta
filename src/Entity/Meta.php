<?php declare(strict_types = 1);

namespace Lemonade\Meta\Entity;

final class Meta extends EntityAbstract {

    /**
     * Charset
     * @param string $string
     * @return string
     */
    protected function _appCharset(string $key, string $charset) {
        
        return $this->tab . '<meta charset="'.$charset.'">' . PHP_EOL;
    }

    /**
     * Title
     * @param string $key
     * @param string $name
     * @return string
     */
    protected function _appName(string $key, string $name = null) {
                
        if(!empty($title = $this->data["appTitle"])) {
            $name = sprintf("%s - %s", $title, $name);
        } 
        
        return $this->tab . '<title>'. $name. '</title>'. PHP_EOL;
    }
    
    /**
     * Canonical Url
     * @param string $key
     * @param string $url
     * @return string
     */
    protected function _appCanonical(string $key, string $url = null) {
        
        return $this->tab . '<link rel="canonical" href="'.$url.'" />';
    }
    
    /**
     * image_src
     * @param string $key
     * @param string $url
     * @return string
     */
    protected function _appImage(string $key, string $url = null) {
        
        return $this->tab . '<link rel="image_src" href="'.$url.'" />' . PHP_EOL;
    }
    
    /**
     * Viewport
     * @param string $key
     * @param string $val
     * @return mixed
     */
    protected function _appViewport(string $key, string $val = null) {
        
        return \str_replace(["{key}", "{val}"], ["viewport", $val], $this->_standardMeta());
    }
    
    /**
     * Keywords
     * @param string $key
     * @param string $val
     * @return mixed
     */
    protected function _appKeywords(string $key, string $val = null) {
        
        return \str_replace(["{key}", "{val}"], ["keywords", $val], $this->_standardMeta());
    }
    
    /**
     * Description
     * @param string $key
     * @param string $val
     * @return mixed
     */
    protected function _appDescription(string $key, string $val = null) {
        
        return \str_replace(["{key}", "{val}"], ["description", $val], $this->_standardMeta());
    }
    
    /**
     * Author
     * @param string $key
     * @param string $val
     * @return mixed
     */
    protected function _appAuthor(string $key, string $val = null) {
        
        return \str_replace(["{key}", "{val}"], ["author", $val], $this->_standardMeta());
    }
    
    /**
     * Generator
     * @param string $key
     * @param string $val
     * @return mixed
     */
    protected function _appGenerator(string $key, string $val = null) {
        
        return \str_replace(["{key}", "{val}"], ["generator", $val], $this->_standardMeta());
    }
    
    /**
     * Rating
     * @param string $key
     * @param string $val
     * @return mixed
     */
    protected function _appRating(string $key, string $val = null) {
        
        return \str_replace(["{key}", "{val}"], ["rating", $val], $this->_standardMeta());
    }
    
    /**
     * Web Author
     * @param string $key
     * @param string $val
     * @return mixed
     */
    protected function _appWebAuthor(string $key, string $val = null) {
        
        return \str_replace(["{key}", "{val}"], ["web_author", $val], $this->_standardMeta());
    }
    
    
    /**
     * Vlastni meta tagy
     * @param string $key
     * @param array $data
     * @return string|mixed
     */
    protected function _appCustom(string $key, array $data = []) {
        
        $code = "";
        
        if(!empty($data)) {
            
            $code .= PHP_EOL;
            
            foreach ($data as $key => $val) {
                if($this->_notEmpty($val)) {
                    $code .= \str_replace(["{key}", "{val}"], [$key, $val], $this->_standardMeta()) . PHP_EOL;
                }
            }
        }
        
        return $code;       
    }

}