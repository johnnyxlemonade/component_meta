<?php declare(strict_types=1);

namespace Lemonade\Meta;

use Stringable;
use Lemonade\Meta\Entity\Meta;
use Lemonade\Meta\Entity\Facebook;
use Lemonade\Meta\Entity\Twitter;
use Lemonade\Meta\Entity\Dc;
use Lemonade\Meta\Entity\MetaEntityInterface;

final class MetaFactory implements Stringable
{
    /** @var MetaEntityInterface[] */
    private array $entities;

    public function __construct(
        protected readonly MetaData $data
    ) {
        $this->entities = [
            new Meta($data),
            new Facebook($data),
            new Twitter($data),
            new Dc($data),
        ];
    }

    public function toHtml(): string
    {
        return PHP_EOL
            . implode('', array_map(fn($entity) => $entity->render(), $this->entities))
            . PHP_EOL;
    }

    public function __toString(): string
    {
        return $this->toHtml();
    }
}
