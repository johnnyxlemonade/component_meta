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
    /** @var array<int, array<class-string<MetaEntityInterface>, MetaEntityInterface>> */
    private array $entities = [];

    public function __construct(
        protected readonly MetaData $data
    ) {
        $this
            ->addEntity(new Meta($this->data), 10)
            ->addEntity(new Dc($this->data), 20)
            ->addEntity(new Facebook($this->data), 30)
            ->addEntity(new Twitter($this->data), 40);
    }

    public function addEntity(MetaEntityInterface $entity, int $priority = 0): self
    {
        $this->entities[$priority][get_class($entity)] = $entity;
        return $this;
    }

    public function removeEntity(string $entityClassName): self
    {
        foreach ($this->entities as $priority => $group) {
            if (isset($group[$entityClassName])) {
                unset($this->entities[$priority][$entityClassName]);
                return $this;
            }
        }
        return $this;
    }

    public function toHtml(): string
    {
        ksort($this->entities);

        return PHP_EOL
            . implode('', array_map(
                fn(MetaEntityInterface $entity) => $entity->render(),
                array_merge(...array_values($this->entities))
            ))
            . PHP_EOL;
    }

    public function __toString(): string
    {
        return $this->toHtml();
    }
}
