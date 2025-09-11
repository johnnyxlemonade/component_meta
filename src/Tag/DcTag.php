<?php declare(strict_types=1);

namespace Lemonade\Meta\Tag;

final class DcTag implements TagInterface
{
    use HtmlAttributeTrait;

    public function __construct(
        private string $name,
        private ?string $content
    ) {}

    public function render(): string
    {
        return $this->renderTagWithAttribute(
            '<meta name="dcterms:%s" content="%s">',
            $this->name,
            $this->content
        );
    }
}
