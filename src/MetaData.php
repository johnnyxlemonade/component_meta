<?php declare(strict_types=1);

namespace Lemonade\Meta;

final class MetaData
{
    /**
     * @param array<string, string|null> $custom
     * @param array<string, string|null>|null $extraParams
     * @param array<string, string>|null $alternates
     */
    public function __construct(
        public string $charset = "UTF-8",
        public string $viewport = "width=device-width, initial-scale=1",
        public string $rating = "General",
        public ?string $websiteName = "website",
        public ?string $title = null,
        public ?string $description = null,
        public ?string $keywords = null,
        public ?string $author = null,
        public ?string $robots = null,
        public ?string $canonical = null,
        public ?string $image = null,
        public array $custom = [],
        public ?array $extraParams = null,
        public ?array $alternates = null,
    ) {}

    // Přidání parametrů do canonical URL
    public function addParam(string $key, ?string $value): void
    {
        if ($this->extraParams === null) {
            $this->extraParams = [];
        }
        $this->extraParams[$key] = $value;
    }

    // Generování canonical URL s parametry
    public function getCanonicalUrl(): string
    {
        if (empty($this->extraParams)) {
            return $this->canonical ?? '';
        }

        $queryParams = http_build_query($this->extraParams);
        return $this->canonical . '?' . $queryParams;
    }

    // vrátí dynamický title s názvem webu
    public function getTitle(): string
    {
        if (!empty($this->title)) {
            return $this->title . ' - ' . $this->websiteName;
        }

        return $this->websiteName ?? '';
    }
}
