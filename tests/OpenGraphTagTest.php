<?php declare(strict_types=1);

use PHPUnit\Framework\TestCase;
use Lemonade\Meta\Tag\OpenGraphTag;

final class OpenGraphTagTest extends TestCase
{
    public function testRenderOpenGraphTag(): void
    {
        $tag = new OpenGraphTag('og:title', 'My OG Title');
        $this->assertSame('<meta property="og:title" content="My OG Title">', $tag->render());
    }

    public function testRenderEmptyContentReturnsNothing(): void
    {
        $tag = new OpenGraphTag('og:description', null);
        $this->assertSame('', $tag->render());
    }

    public function testRenderEscapesSpecialChars(): void
    {
        $tag = new OpenGraphTag('og:title', '"Quoted & Special"');
        $this->assertSame(
            '<meta property="og:title" content="&quot;Quoted &amp; Special&quot;">',
            $tag->render()
        );
    }
}
