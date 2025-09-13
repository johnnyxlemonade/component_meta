<?php declare(strict_types=1);

use PHPUnit\Framework\TestCase;
use Lemonade\Meta\MetaData;
use Lemonade\Meta\MetaFactory;

final class MetaFactoryTest extends TestCase
{
    public function testToHtmlReturnsNonEmptyString(): void
    {
        $data = new MetaData(
            websiteName: 'TestSite',
            title: 'Test Page',
            description: 'Some description',
            image: 'https://example.com/img.png'
        );

        $factory = new MetaFactory($data);
        $html = $factory->toHtml();

        $this->assertStringContainsString('Test Page', $html);
        $this->assertStringContainsString('og:title', $html);
        $this->assertStringContainsString('twitter:title', $html);
    }

    public function testToStringEqualsToHtml(): void
    {
        $data = new MetaData(websiteName: 'TestSite');
        $factory = new MetaFactory($data);

        $this->assertSame($factory->toHtml(), (string)$factory);
    }
}
