<?php declare(strict_types=1);

namespace Lemonade\Meta\Tag;

final class LinkTag implements TagInterface
{
    use HtmlAttributeTrait;

    public function __construct(
        private string $rel,
        private ?string $href
    ) {}

    public function render(): string
    {
        return $this->renderTagWithAttribute(
            '<link rel="%s" href="%s">',
            $this->rel,
            $this->href
        );
    }
}
