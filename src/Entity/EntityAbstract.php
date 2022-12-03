<?php declare(strict_types = 1);

namespace Lemonade\Meta\Entity;

abstract class EntityAbstract implements EntityInterface {
    
    /**
     * Data
     * @var array
     */
    protected $data = [];
    
    /**
     * Tab
     * @var string
     */
    protected $tab = "\t";
        
    /**
     *
     * @param array $data
     */
    public function __construct(array $data = []) {
        
        $this->data = $data;
    }
    
    /**
     * 
     * {@inheritDoc}
     * @see \Lemonade\Meta\Entity\EntityInterface::getOutput()
     */
    public function getOutput(): string {
               
        $code = "";        
        
        if(!empty($this->data)) {
            
            $code .= PHP_EOL;
            
            foreach($this->data as $key => $val) {
                                
                $func = \sprintf("_%s", $key);
                       
                if(method_exists($this, $func)) {
                    
                    if(is_string($val)) {
                        
                        if($this->_notEmpty($val)) {
                            
                            $code .= $this->$func($key, $val) . PHP_EOL;
                        }                        
                    }   
                    
                    if(is_array($val)) {
                        
                        $code .= $this->$func($key, $val);
                    }
                }
            }
            
        }
        
        return $code;
    }
    
    /**
     * Neni empty
     * @param string $value
     * @return boolean
     */
    protected function _notEmpty(string $value = null) {
    
        return (!empty($value) && $value <> "");
    }
    
    
    /**
     * Standardni meta
     * @return string
     */
    protected function _standardMeta() {
        
        return $this->tab . '<meta name="{key}" content="{val}" />';
    }
    
    
    
}