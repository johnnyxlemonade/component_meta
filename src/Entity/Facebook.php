<?php declare(strict_types = 1);

namespace Lemonade\Meta\Entity;

final class Facebook extends EntityAbstract
{
    /**
     * Pomocná metoda pro generování og meta tagů.
     */
    private function generateOgMetaTag(string $key, ?string $val, string $metaType): string
    {
        return str_replace(["{key}", "{val}"], [$metaType, $val], $this->_propertyMeta());
    }

    /**
     * Title
     */
    protected function _appTitle(string $key, ?string $name): string
    {
        if (!empty($this->data["appTitle"])) {
            $name = sprintf("%s - %s", $this->data["appTitle"], $this->data["appName"]);
        }
        return $this->generateOgMetaTag($key, $name, "og:title");
    }

    /**
     * appName
     */
    protected function _appName(string $key, ?string $val): string
    {
        return $this->generateOgMetaTag($key, $val, "og:sitename") . PHP_EOL
            . $this->generateOgMetaTag($key, "website", "og:type");
    }

    /**
     * Canonical URL
     */
    protected function _appCanonical(string $key, ?string $url): string
    {
        return $this->generateOgMetaTag($key, $url, "og:url");
    }

    /**
     * Image
     */
    protected function _appImage(string $key, ?string $url): string
    {
        return $this->generateOgMetaTag($key, $url, "og:image");
    }

    /**
     * Api Id
     */
    protected function _appFacebookApiId(string $key, ?string $val): string
    {
        return $this->generateOgMetaTag($key, $val, "fb:app_id");
    }

    /**
     * Description
     */
    protected function _appDescription(string $key, ?string $val): string
    {
        return $this->generateOgMetaTag($key, $val, "og:description");
    }

    /**
     * Keywords
     */
    protected function _appKeywords(string $key, ?string $val): string
    {
        return $this->generateOgMetaTag($key, $val, "og:keywords");
    }

    /**
     * Locale
     */
    protected function _appLocale(string $key, ?string $val): string
    {
        return $this->generateOgMetaTag($key, $val, "og:locale");
    }
}
