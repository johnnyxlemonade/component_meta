<?php declare(strict_types = 1);

namespace Lemonade\Meta\Entity;

final class Twitter extends EntityAbstract
{
    /**
     * Pomocná metoda pro generování Twitter meta tagů.
     */
    private function generateTwitterMetaTag(string $key, ?string $val, string $metaType): string
    {
        return \str_replace(["{key}", "{val}"], [$metaType, $val], $this->_propertyMeta());
    }

    /**
     * Title
     */
    protected function _appTitle(string $key, ?string $name): string
    {
        if (!empty($this->data["appTitle"])) {
            $name = sprintf("%s - %s", $this->data["appTitle"], $this->data["appName"]);
        }
        return $this->generateTwitterMetaTag($key, $name, "twitter:title");
    }

    /**
     * appName
     */
    protected function _appName(string $key, ?string $val): string
    {
        return $this->generateTwitterMetaTag($key, "summary", "twitter:card");
    }

    /**
     * Author
     */
    protected function _appAuthor(string $key, ?string $val): string
    {
        return $this->generateTwitterMetaTag($key, $val, "twitter:creator");
    }

    /**
     * Image
     */
    protected function _appImage(string $key, ?string $url): string
    {
        return $this->generateTwitterMetaTag($key, $url, "twitter:image");
    }

    /**
     * Description
     */
    protected function _appDescription(string $key, ?string $val): string
    {
        return $this->generateTwitterMetaTag($key, $val, "twitter:description");
    }
}
