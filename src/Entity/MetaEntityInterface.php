<?php declare(strict_types=1);

namespace Lemonade\Meta\Entity;

interface MetaEntityInterface
{
    public function render(): string;
}
