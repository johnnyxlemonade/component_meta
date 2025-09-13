<?php declare(strict_types=1);

use PHPUnit\Framework\TestCase;
use Lemonade\Meta\Tag\TitleTag;

final class TitleTagTest extends TestCase
{
    public function testRenderTitleTag(): void
    {
        $tag = new TitleTag('My Title');
        $this->assertSame('<title>My Title</title>', $tag->render());
    }

    public function testNullTitleReturnsEmptyString(): void
    {
        $tag = new TitleTag(null);
        $this->assertSame('', $tag->render());
    }
}
