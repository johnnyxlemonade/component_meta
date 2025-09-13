<?php declare(strict_types=1);

use PHPUnit\Framework\TestCase;
use Lemonade\Meta\Tag\MetaTag;

final class MetaTagTest extends TestCase
{
    public function testRenderWithValidContent(): void
    {
        $tag = new MetaTag('description', 'Hello world');
        $this->assertSame('<meta name="description" content="Hello world">', $tag->render());
    }

    public function testRenderWithNullContentReturnsEmptyString(): void
    {
        $tag = new MetaTag('keywords', null);
        $this->assertSame('', $tag->render());
    }
}
