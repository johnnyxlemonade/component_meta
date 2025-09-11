<?php declare(strict_types = 1);

namespace Lemonade\Meta;

use Lemonade\Meta\Entity\Meta;
use Lemonade\Meta\Entity\Dc;
use Lemonade\Meta\Entity\Facebook;
use Lemonade\Meta\Entity\Twitter;

final class MetaFactory
{
    use ApiHelper; // Používáme ApiHelper trait

    protected array $meta = [
        "appCharset" => "UTF-8",
        "appName" => null,
        "appCanonical" => null,
        "appImage" => null,
        "appViewport" => "width=device-width, initial-scale=1",
        "appDescription" => null,
        "appKeywords" => null,
        "appAuthor" => null,
        "appGenerator" => "Lemonade CMS [lemonadeframework.cz]",
        "appRating" => "General",
        "appWebAuthor" => "lemonadeframework.cz",
        "appFacebookApiId" => "868376616653178",
        "appLocale" => "cs_CZ",
        "appTitle" => null,
        "appCustom" => []
    ];

    // Konstruktor pro nastavení závislostí (pokud máš nějaké)
    public function __construct(?string $appName = null)
    {
        if ($appName) {
            $this->meta["appName"] = $this->plain($appName);
        }
    }

    /**
     * Nastaví název
     */
    public function setTitle(?string $title): void
    {
        $this->meta["appTitle"] = $this->plain($title);
    }

    /**
     * Nastaví autora
     */
    public function setAuthor(?string $author): void
    {
        $this->meta["appAuthor"] = $this->plain($author);
    }

    /**
     * Nastaví popis
     */
    public function setDescription(?string $description): void
    {
        $this->meta["appDescription"] = $this->plain($description);
    }

    /**
     * Nastaví klíčová slova
     */
    public function setKeywords(?string $keywords): void
    {
        $this->meta["appKeywords"] = $this->plain($keywords);
    }

    /**
     * Nastaví obrázek
     */
    public function setImage(?string $image): void
    {
        $this->meta["appImage"] = $this->plain($image);
    }

    /**
     * Nastaví kanonickou URL
     */
    public function setCanonical(?string $url): void
    {
        $this->meta["appCanonical"] = $this->plain($url);
    }

    /**
     * Nastaví Google verifikaci
     */
    public function setGoogleVerification(?string $code): void
    {
        $this->meta["appCustom"]["google-site-verification"] = $this->plain($code);
    }

    /**
     * Nastaví Seznam verifikaci
     */
    public function setSeznamVerification(?string $code): void
    {
        $this->meta["appCustom"]["seznam-wmt"] = $this->plain($code);
    }

    /**
     * Přidá vlastní meta tag
     */
    public function addCustomMeta(string $key, ?string $value): void
    {
        $this->meta["appCustom"][$key] = $this->plain($value);
    }

    /**
     * Vygeneruje HTML výstup
     */
    public function toHtml(): string
    {
        return implode("", [
            (new Meta($this->meta))->getOutput(),
            (new Dc($this->meta))->getOutput(),
            (new Facebook($this->meta))->getOutput(),
            (new Twitter($this->meta))->getOutput()
        ]);
    }

    /**
     * Stringová reprezentace objektu
     */
    public function __toString(): string
    {
        return $this->toHtml();
    }
}
