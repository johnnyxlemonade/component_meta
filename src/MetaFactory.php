<?php declare(strict_types = 1);

namespace Lemonade\Meta;

use Lemonade\Meta\Entity\Meta;
use Lemonade\Meta\Entity\Dc;
use Lemonade\Meta\Entity\Facebook;
use Lemonade\Meta\Entity\Twitter;

final class MetaFactory {
    
    /**
     * Meta data
     * @var array
     */
    protected $meta = [        
        "appCharset" => "UTF-8",
        "appName" => null,
        "appCanonical" => null, 
        "appImage" => null, 
        "appViewport" => "width=device-width, initial-scale=1",
        "appDescription" => null, 
        "appKeywords" => null,
        "appAuthor" => null,         
        "appGenerator" => "Lemonade CMS [core1.agency]",
        "appRating" => "General",
        "appWebAuthor" => "core1.agency",
        "appFacebookApiId" => "868376616653178",        
        "appLocale" => "cs_CZ",
        "appTitle" => null,
        "appCustom" => []
    ];
    
    /**
     * Html vystup
     * @var string
     */
    protected $html = "";
    
    /**
     * Parsovani data
     * @var array
     */
    protected $data = [];
    
    /**
     * Nazev webu
     * @var string
     */
    protected $appName;
    
    /**
     * Constructor
     * @param string $title
     */
    public function __construct(string $appName = null) {
        
        $this->meta["appName"] = ApiHelper::plain($appName);
    }
    
    /**
     * Nastavi název
     * @param string $title
     */
    public function setTitle(string $title = null) {
        
        $this->meta["appTitle"] = ApiHelper::plain($title);
    }
    
    /**
     * Nastavi autora
     * @param string $author
     */
    public function setAuthor(string $author = null) {
        
        $this->meta["appAuthor"] = ApiHelper::plain($author);
    }
    
    /**
     * Popis
     * @param string $keywords
     */
    public function setDescription(string $keywords = null) {
        
        $this->meta["appDescription"] = ApiHelper::plain($keywords);
    }
    
    /**
     * Klicova slova
     * @param string $keywords
     */
    public function setKeywords(string $keywords = null) {
        
        $this->meta["appKeywords"] = ApiHelper::plain($keywords);
    }
    
    /**
     * Image
     * @param string $image
     */
    public function setImage(string $image = null) {
        
        $this->meta["appImage"] = ApiHelper::plain($image);
    }
    
    /**
     * Url
     * @param string $image
     */
    public function setCanonical(string $url = null) {
        
        $this->meta["appCanonical"] = ApiHelper::plain($url);
    }
    
    /**
     * Google Verifikace
     * @param string $code
     */
    public function setGoogleVerification(string $code = null) {
        
        $this->meta["appCustom"]["google-site-verification"] = ApiHelper::plain($code);
        
    }
        
    /**
     * Seznam Verifikace
     * @param string $code
     */
    public function setSeznamVerification(string $code = null) {
        
        $this->meta["appCustom"]["seznam-wmt"] = ApiHelper::plain($code);
        
    }
    
    /**
     * Vlastni meta
     * @param string $key
     * @param string $value
     */
    public function addCustomMeta(string $key, string $value = null) {
        
        $this->meta["appCustom"][$key] = ApiHelper::plain($value);
    }
    
    /**
     * Pole vlastnosti
     * @return string
     */
    public function toHtml() {
        
        $this->data[Meta::class] = (new Meta($this->meta))->getOutput();
        $this->data[Dc::class] = (new Dc($this->meta))->getOutput();
        $this->data[Facebook::class] = (new Facebook($this->meta))->getOutput();
        $this->data[Twitter::class] = (new Twitter($this->meta))->getOutput();
        
        return implode("", $this->data);
    }
        
    /**
     * 
     * @return string
     */
    public function __toString() {
        
        return $this->toHtml();
    }

}