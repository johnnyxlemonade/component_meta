<?php declare(strict_types=1);

use PHPUnit\Framework\TestCase;
use Lemonade\Meta\Tag\LinkTag;

final class LinkTagTest extends TestCase
{
    public function testRenderLinkTag(): void
    {
        $tag = new LinkTag('canonical', 'https://example.com');
        $this->assertSame('<link rel="canonical" href="https://example.com">', $tag->render());
    }

    public function testNullHrefReturnsEmptyString(): void
    {
        $tag = new LinkTag('canonical', null);
        $this->assertSame('', $tag->render());
    }
}
