<?php declare(strict_types = 1);

namespace Lemonade\Meta;

final class ApiHelper {
    
    /**
     * Plain
     * @param string $text
     * @return string|NULL
     */
    public static function plain(string $text = null) {
        
        if(!empty($text)) {
            
            return \trim(\str_replace('"', '&quot;', \preg_replace("/[\r\n\s]+/", " ", \strip_tags($text))));
        }
        
        return null;        
    }
    
    
}