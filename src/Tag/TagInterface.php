<?php declare(strict_types=1);

namespace Lemonade\Meta\Tag;

interface TagInterface
{
    public function render(): string;
}
