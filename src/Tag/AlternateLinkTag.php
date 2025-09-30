<?php declare(strict_types=1);

namespace Lemonade\Meta\Tag;

final class AlternateLinkTag extends AbstractTag
{
    protected function template(): string
    {
        return '<link rel="alternate" hreflang="%s" href="%s">';
    }
}
