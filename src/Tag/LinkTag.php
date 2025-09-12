<?php declare(strict_types=1);

namespace Lemonade\Meta\Tag;

final class LinkTag extends AbstractTag
{
    protected function template(): string
    {
        return '<link rel="%s" href="%s">';
    }
}
