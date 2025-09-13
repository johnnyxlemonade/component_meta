<?php declare(strict_types=1);

use PHPUnit\Framework\TestCase;
use Lemonade\Meta\Tag\DcTag;

final class DcTagTest extends TestCase
{
    public function testRenderDcTag(): void
    {
        $tag = new DcTag('title', 'Document Title');
        $this->assertSame('<meta name="dcterms:title" content="Document Title">', $tag->render());
    }

    public function testNullContentProducesEmptyString(): void
    {
        $tag = new DcTag('keywords', null);
        $this->assertSame('', $tag->render());
    }
}
