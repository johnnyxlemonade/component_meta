<?php declare(strict_types = 1);

namespace Lemonade\Meta\Entity;

final class Meta extends EntityAbstract
{
    /**
     * Pomocná metoda pro generování meta tagů.
     */
    private function generateMetaTag(string $key, ?string $val, string $template): string
    {
        return \str_replace(["{key}", "{val}"], [$key, $val], $template);
    }

    /**
     * Charset
     */
    protected function _appCharset(string $key, string $charset): string
    {
        return $this->tab . '<meta charset="' . $charset . '">' . PHP_EOL;
    }

    /**
     * Title
     */
    protected function _appName(string $key, ?string $name): string
    {
        if (!empty($this->data["appTitle"])) {
            $name = sprintf("%s - %s", $this->data["appTitle"], $name);
        }
        return $this->tab . '<title>' . $name . '</title>' . PHP_EOL;
    }

    /**
     * Canonical URL
     */
    protected function _appCanonical(string $key, ?string $url): string
    {
        return $this->tab . '<link rel="canonical" href="' . $url . '" />';
    }

    /**
     * Image src
     */
    protected function _appImage(string $key, ?string $url): string
    {
        return $this->tab . '<link rel="image_src" href="' . $url . '" />' . PHP_EOL;
    }

    /**
     * Viewport
     */
    protected function _appViewport(string $key, ?string $val): string
    {
        return $this->generateMetaTag('viewport', $val, $this->_standardMeta());
    }

    /**
     * Keywords
     */
    protected function _appKeywords(string $key, ?string $val): string
    {
        return $this->generateMetaTag('keywords', $val, $this->_standardMeta());
    }

    /**
     * Description
     */
    protected function _appDescription(string $key, ?string $val): string
    {
        return $this->generateMetaTag('description', $val, $this->_standardMeta());
    }

    /**
     * Author
     */
    protected function _appAuthor(string $key, ?string $val): string
    {
        return $this->generateMetaTag('author', $val, $this->_standardMeta());
    }

    /**
     * Generator
     */
    protected function _appGenerator(string $key, ?string $val): string
    {
        return $this->generateMetaTag('generator', $val, $this->_standardMeta());
    }

    /**
     * Rating
     */
    protected function _appRating(string $key, ?string $val): string
    {
        return $this->generateMetaTag('rating', $val, $this->_standardMeta());
    }

    /**
     * Web Author
     */
    protected function _appWebAuthor(string $key, ?string $val): string
    {
        return $this->generateMetaTag('web_author', $val, $this->_standardMeta());
    }

    /**
     * Custom meta tags
     */
    protected function _appCustom(string $key, array $data = []): string
    {
        $code = "";

        if (!empty($data)) {
            $code .= PHP_EOL;
            foreach ($data as $key => $val) {
                if ($this->_notEmpty($val)) {
                    $code .= $this->generateMetaTag($key, $val, $this->_standardMeta()) . PHP_EOL;
                }
            }
        }

        return $code;
    }
}
