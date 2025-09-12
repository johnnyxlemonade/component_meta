<?php declare(strict_types=1);

namespace Lemonade\Meta\Tag;

final class DcTag extends AbstractTag
{
    protected function template(): string
    {
        return '<meta name="dcterms:%s" content="%s">';
    }
}
