<?php declare(strict_types=1);

use PHPUnit\Framework\TestCase;
use Lemonade\Meta\MetaData;

final class MetaDataTest extends TestCase
{
    public function testGettersReturnExpectedValues(): void
    {
        $data = new MetaData(
            websiteName: 'MySite',
            title: 'My Page',
            description: 'Page description',
            keywords: 'php, meta',
            author: 'John Doe',
            robots: 'index,follow',
            canonical: 'https://example.com',
            image: 'https://example.com/img.png',
            custom: [
                'og:type' => 'website',
            ]
        );

        $this->assertSame('MySite', $data->websiteName);
        $this->assertSame('My Page', $data->title);
        $this->assertSame('Page description', $data->description);
        $this->assertSame('php, meta', $data->keywords);
        $this->assertSame('John Doe', $data->author);
        $this->assertSame('website', $data->custom['og:type']);
    }

    public function testGetTitleAddsWebsiteName(): void
    {
        $data = new MetaData(
            websiteName: 'MySite',
            title: 'My Page',
            description: null
        );

        $this->assertSame('My Page - MySite', $data->getTitle());
    }

    public function testGetTitleWithoutPageTitleReturnsWebsiteNameOnly(): void
    {
        $data = new MetaData(
            websiteName: 'MySite',
            title: null
        );

        $this->assertSame('MySite', $data->getTitle());
    }

    public function testNullValuesAreHandled(): void
    {
        $data = new MetaData(
            websiteName: 'MySite',
            title: null,
            description: null,
            keywords: null,
            author: null
        );

        $this->assertNull($data->description);
        $this->assertNull($data->keywords);
        $this->assertNull($data->author);
    }
}
