<?php declare(strict_types=1);

namespace Lemonade\Meta\Tag;

final class TitleTag implements TagInterface
{
    use SimpleTagTrait;

    public function __construct(
        private ?string $title
    ) {}

    public function render(): string
    {
        return $this->renderSimpleTag(
            '<title>%s</title>',
            $this->title
        );
    }
}
