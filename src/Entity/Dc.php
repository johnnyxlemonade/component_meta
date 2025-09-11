<?php declare(strict_types = 1);

namespace Lemonade\Meta\Entity;

final class Dc extends EntityAbstract
{
    /**
     * Pomocná metoda pro generování dcterms meta tagů.
     */
    private function generateDcMetaTag(string $key, ?string $val, string $metaType): string
    {
        return \str_replace(["{key}", "{val}"], [$metaType, $val], $this->_standardMeta());
    }

    /**
     * Title
     */
    protected function _appName(string $key, ?string $name): string
    {
        if (!empty($this->data["appTitle"])) {
            $name = sprintf("%s - %s", $this->data["appTitle"], $this->data["appName"]);
        }
        return $this->generateDcMetaTag($key, $name, "dcterms.title");
    }

    /**
     * Description
     */
    protected function _appDescription(string $key, ?string $val): string
    {
        return $this->generateDcMetaTag($key, $val, "dcterms.description");
    }

    /**
     * Keywords
     */
    protected function _appKeywords(string $key, ?string $val): string
    {
        return $this->generateDcMetaTag($key, $val, "dcterms.keywords");
    }

    /**
     * contributor/rights/publisher/created
     */
    protected function _appAuthor(string $key, ?string $val): string
    {
        // Tagy pro dcterms: contributor, rights, publisher, creator
        $tags = [
            "dcterms.contributor",
            "dcterms.rights",
            "dcterms.publisher",
            "dcterms.creator"
        ];

        $code = '';
        foreach ($tags as $metaType) {
            $code .= $this->generateDcMetaTag($key, $val, $metaType) . PHP_EOL;
        }

        return $code;
    }
}
