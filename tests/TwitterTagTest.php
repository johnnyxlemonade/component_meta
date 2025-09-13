<?php declare(strict_types=1);

use PHPUnit\Framework\TestCase;
use Lemonade\Meta\Tag\TwitterTag;

final class TwitterTagTest extends TestCase
{
    public function testRenderTwitterTag(): void
    {
        $tag = new TwitterTag('twitter:title', 'Tweet Title');
        $this->assertSame('<meta name="twitter:title" content="Tweet Title">', $tag->render());
    }

    public function testRenderWithNullContent(): void
    {
        $tag = new TwitterTag('twitter:card', null);
        $this->assertSame('', $tag->render());
    }
}
