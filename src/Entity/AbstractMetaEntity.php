<?php declare(strict_types=1);

namespace Lemonade\Meta\Entity;

use Lemonade\Meta\MetaData;
use Lemonade\Meta\Tag\TagInterface;

abstract class AbstractMetaEntity
{
    protected MetaData $data;

    public function __construct(MetaData $data)
    {
        $this->data = $data;
    }

    protected function renderTags(array $tags): string
    {
        $html = array_map(fn(TagInterface $tag) => $tag->render(), $tags);
        $html = array_filter($html, fn(string $tag) => $tag !== '');

        return implode(PHP_EOL, $html) . PHP_EOL;
    }

    abstract public function render(): string;
}
