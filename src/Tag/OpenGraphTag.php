<?php declare(strict_types=1);

namespace Lemonade\Meta\Tag;

final class OpenGraphTag implements TagInterface
{
    use HtmlAttributeTrait;

    public function __construct(
        private string $property,
        private ?string $content
    ) {}

    public function render(): string
    {
        return $this->renderTagWithAttribute(
            '<meta property="%s" content="%s">',
            $this->property,
            $this->content
        );
    }
}
